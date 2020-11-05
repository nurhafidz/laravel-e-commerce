<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Xendit\Xendit;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class CartController extends Controller
{
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        $carts = $this->getCarts();
        if ($carts && array_key_exists($request->product_id, $carts)) {
            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_store' => $product->store_id,
                'product_name' => $product->name,
                'product_price' => $product->harga,
                'product_image' => $product->image,
                'product_place' => $product->store->district_id,
                'weight' => $product->weight
            ];
        }

        $cookie = cookie('carts', json_encode($carts), 2880);
        return redirect()->back()->with(['success' => 'Produk Ditambahkan ke Keranjang'])->cookie($cookie);
    }
    public function listCart()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        $brgtotal = collect($carts)->sum(function($q) {
            return $q['qty'];
        });
        return view('publik.orderlist', compact('carts', 'subtotal','brgtotal'));
    }

    public function updateCart(Request $request)
    {
        $carts = $this->getCarts();
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

    public function checkout()
    {
    $provinces = Province::pluck("name", "id");
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        $weight = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['weight'];
        });
        
    return view('publik.checkout', compact('provinces', 'carts', 'subtotal', 'weight'));
    }

    public function getCourier(Request $request)
    {
        $this->validate($request, [
            'destination' => 'required',
            'weight' => 'required|integer'
        ]);


        $url = 'https://ruangapi.com/api/v1/shipping';
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'p4w1NZY2m1Fcqnge6Z6EnSw2pSh837fghNLOke37'
            ],
            'form_params' => [
                'origin' => $request->origin,
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => 'jnt,tiki,sicepat'
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body;
    }
    
    public function waybill(Request $request)
    {
        // $this->validate($request, [
        //     'destination' => 'required',
        //     'weight' => 'required|integer'
        // ]);


        $url = 'https://ruangapi.com/api/v1/waybill';
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'p4w1NZY2m1Fcqnge6Z6EnSw2pSh837fghNLOke37'
            ],
            'form_params' => [
                'waybill' => 'JP8786802938',
                'courier' => 'jnt',
                
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body;
    }
    
    public function processCheckout(Request $request)
    {
        $this->validate($request, [
            'courier' => 'required'
        ]);
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });
        $shipping = explode('-', $request->courier);
        $total = $subtotal+$shipping[3];
        $user = User::findorFail($request->user_id);
        $email = $user->email;
        
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

        $params = [
            'external_id' => Str::random(4) . '-' . time(),
            'payer_email' => $email,
            'description' => 'Bealajar',
            'amount' => $total,
            'failure_redirect_url'=>'http://localhost:8000/payment/fail',
            'success_redirect_url'=>'http://localhost:8000/payment/success'
        ];

        $createInvoice = \Xendit\Invoice::create($params);

        $order = Order::create([
                'invoice' => $createInvoice['id'],
                'external_id' => $createInvoice['external_id'],
                'user_id' => $user->id,
                'store_id' => $user->id,
                'subtotal' => $subtotal,
                'cost' => $shipping[3],
                'status' => 1,
                'shipping' => $shipping[0] . '-' . $shipping[1],
                
            ]);

        foreach ($carts as $row) {
            $product = Product::find($row['product_id']);
            $orderdetail=OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'store_id' => $product->store_id,
                    'price' => $row['product_price'],
                    'qty' => $row['qty'],
                    'weight' => $product->weight
                ]);
        }
        $order->save();
        $orderdetail->save();
        $carts = [];
        $cookie = cookie('cart', json_encode($carts), 2880);
        Cookie::queue(Cookie::forget('cart'));
        return redirect('https://checkout-staging.xendit.co/web/'.$createInvoice['id']);
    }
    
}
