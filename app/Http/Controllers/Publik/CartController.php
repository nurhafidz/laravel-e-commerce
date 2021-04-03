<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use Xendit\Xendit;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Auth;


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
        $ker2 = Cart::where('product_id', $request->product_id)->first();
        
        $product = Product::find($request->product_id);
        $ker = Cart::where('user_id', auth()->id())->first();
        if ($ker != NULL) {
            $ker2 = Cart::where('product_id', $request->product_id)->first();
            if ($ker2 != NULL) {
                
                if ($ker2 != "2") {
                    
                    $jml=$ker2->qty+$request->qty;
                    $keranjang=Cart::findorFail($ker2->id);
                    $keranjang->user_id= auth()->id();
                    $keranjang->product_id= $request->product_id;
                    $keranjang->qty = $jml;
                    $keranjang->note = $request->note;
                    $keranjang->weight = $product->weight;
                    $keranjang->status = 1;
                    $keranjang->save();
                    
                } else {
                    $keranjang=Cart::create([
                    'user_id'=> auth()->id(),
                    'product_id'=> $product->id,
                    'qty'=> $request->qty,
                    'note'=> $request->note,
                    'weight'=> $product->weight,
                    'status'=> 1,
                    ]);
                    
                    $keranjang->save();
                }
            } else {
                $keranjang=Cart::create([
                    'user_id'=> auth()->id(),
                    'product_id'=> $product->id,
                    'qty'=> $request->qty,
                    'note'=> $request->note,
                    'weight'=> $product->weight,
                    'status'=> 1,
                    ]);
                    $keranjang->save();
            }
            
            
            
        } else {
            $keranjang=Cart::create([
            'user_id'=> auth()->id(),
            'product_id'=> $product->id,
            'qty'=> $request->qty,
            'note'=> $request->note,
            'weight'=> $product->weight,
            'status'=> 1,
            ]);
            
            $keranjang->save();
        }
        
        // $carts = $this->getCarts();
        // if ($carts && array_key_exists($request->product_id, $carts)) {
        //     $carts[$request->product_id]['qty'] += $request->qty;
        // } else {
            
        //     // $carts[$request->product_id] = [
        //     //     'qty' => $request->qty,
        //     //     'note' => $request->note,
        //     //     'product_id' => $product->id,
        //     //     'product_store' => $product->store_id,
        //     //     'product_store_name' => $product->store->name,
        //     //     'product_name' => $product->name,
        //     //     'product_price' => $product->harga,
        //     //     'product_image' => $product->image,
        //     //     'product_place' => $product->store->district_id,
        //     //     'weight' => $product->weight
        //     // ];
            
            
        // }

        
         return redirect()->back()->with(['success' => 'Produk Ditambahkan ke Keranjang']);
    }
    public function listCart()
    {
        
        $carts = Cart::where('user_id', auth()->id())->where('status', 1)->get();

        $subtotal = 0;
        foreach($carts as $key=>$value)
        {
            
            $qty=$value->qty;
            $harga=$value->product->harga;
            $a=$qty*$harga;
            $subtotal+= $a;
        }
        
        $brgtotal = Cart::where('user_id', auth()->id())->where('status', 1)->get()->sum('qty');
        
        // dd($keranjang);
        // $subtotal = $keranjang->qty * $keranjang->product->harga;
        // $brgtotal = collect($carts)->sum(function($q) {
        //     return $q['qty'];
        // });
        return view('publik.orderlist', compact('carts', 'subtotal','brgtotal'));
    }

    public function updateCart(Request $request)
    {
        
        foreach($request->product_id as $key=>$item){
            if ($request->qty[$key] == 0) {
                $carts=Cart::findorFail($request->id[$key]);
                $carts->delete();
            } else {
                $carts=Cart::findorFail($request->id[$key]);
                $carts->qty = $request->qty[$key];
                $carts->save();
            }
        }
        return redirect()->back();
    }

    public function checkout()
    {
    $provinces = Province::pluck("name", "id");

    $carts = Cart::where('user_id', auth()->id())->where('status', 1)->get();

    $subtotal = 0;
    $weight = 0;

    $kurir = array();
    $url = 'https://ruangapi.com/api/v1/shipping';
    $client = new Client();
    foreach($carts as $key=>$value)
    {
        $qty=$value->qty;
        $harga=$value->product->harga;
        $a=$qty*$harga;
        $subtotal+= $a;
        $we=$value->weight;
        $w = $we * $qty;
        $weight+= $w;

        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'E2RVXwXbh4AODgLOAAaBm6PSDJ5QMVZN6dwZsxgw'
            ],
            'form_params' => [
                'origin' => $value->product->store->district_id,
                'destination' => $value->user->district_id,
                'weight' => $value->weight*$qty,
                'courier' => 'jnt,tiki,sicepat'
            ]
        ]);
        $kurir[]=json_decode($response->getBody(), true)['data']['results'];
        
        // dd($kurir[0]['data']['results']);
        
    }
    return view('publik.checkout', compact('provinces', 'carts', 'subtotal', 'weight','kurir'));
    }

    public function getCourier($id)  
    {
        $data = Cart::findorfail($id);
        $url = 'https://ruangapi.com/api/v1/shipping';
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'E2RVXwXbh4AODgLOAAaBm6PSDJ5QMVZN6dwZsxgw'
            ],
            'form_params' => [
                'origin' => $data->product->store->district_id,
                'destination' => $data->user->district_id,
                'weight' => $data->weight,
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
                'Authorization' => 'E2RVXwXbh4AODgLOAAaBm6PSDJ5QMVZN6dwZsxgw'
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
        
        $carts = Cart::where('user_id', auth()->id())->where('status', 1)->get();

        $subtotal = 0;
        $ongkir2 = 0;
        foreach($carts as $key=>$value)
        {
            
            $qty=$value->qty;
            $harga=$value->product->harga;
            $a=$qty*$harga;
            $subtotal+= $a;
        }
        foreach($request->courier as $kurir){
            $shipping = explode('-', $kurir);
            if(count($shipping) == 3){
                $ongkir = $shipping[2];
            }
            if(count($shipping) == 4){
                $ongkir = $shipping[3];
                
            }
            $shipping2[]=$shipping;
            $ongkir2 += $ongkir;
        }
        
        
        $total = $subtotal + $ongkir2;
        
        // $shipping = explode('-', $request->courier);
        // if(count($shipping) == 3){
        //     $total = $subtotal+$shipping[2];
        // }
        // if(count($shipping) == 4){
        //     $total = $subtotal+$shipping[3];
        // }
        
        $user = User::findorFail(Auth::user()->id);
        $email = $user->email;
        
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

        $params = [
            'external_id' => Str::random(4) . '-' . time(),
            'payer_email' => $email,
            'description' => 'Bealajar',
            'merchant_profile_picture_url' => env('APP_URL').'logo.png',
            'amount' => $total,
            'failure_redirect_url'=>env('APP_URL').'payment/fail',
            'success_redirect_url'=>env('APP_URL').'payment/success'
        ];
        

        $createInvoice = \Xendit\Invoice::create($params);

        $order = Order::create([
                'invoice' => $createInvoice['id'],
                'external_id' => $createInvoice['external_id'],
                'user_id' => $user->id,
                'store_id' => $user->id,
                'subtotal' => $subtotal,
            ]);
            
        foreach ($carts as $key=>$row) {
            $product = Product::find($row->product->id);
            if(count($shipping2[$key]) == 3){
            $a =$shipping2[$key][1];
            $b =strtolower($shipping2[$key][0]);
            $productqty=$product->stock;
            $jumlahqty=$productqty - $row->qty;
            $product->stock=$jumlahqty;
            $keranjang=Cart::findorFail($row->id);
            $keranjang->status=2;
            $keranjang->update();
            $orderdetail=OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row->product->id,
                    'user_id' => Auth::user()->id,
                    'store_id' => $product->store_id,
                    'price' => $row->product->harga,
                    'qty' => $row->qty,
                    'shipping' => $b,
                    'shipping_detail' => $a,
                    'cost' => $shipping2[$key][2],
                    'status' => 1,
                    'weight' => $product->weight,
                    'note'=>$row->note
                ]);
                // $orderdetail->save();
                // $product->update();
            }
            if(count($shipping2[$key]) == 4){
            $a =$shipping2[$key][2].'-'.$shipping2[$key][1];
            $b =strtolower($shipping2[$key][0]);
            $productqty=$product->stock;
            $jumlahqty=$productqty - $row->qty;
            $product->stock=$jumlahqty;
            $keranjang=Cart::findorFail($row->id);
            $keranjang->status=2;
            $keranjang->update();
            $orderdetail=OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row->product->id,
                    'user_id' => Auth::user()->id,
                    'store_id' => $product->store_id,
                    'price' => $row->product->harga,
                    'qty' => $row->qty,
                    'shipping' => $b,
                    'shipping_detail' => $a,
                    'cost' => $shipping2[$key][3],
                    'status' => 1,
                    'weight' => $product->weight,
                    'note'=>$row->note
                ]);
                
                $orderdetail->save();
                $product->update();
            }
            
        }
        $order->save();
        
        return redirect('https://checkout-staging.xendit.co/web/'.$createInvoice['id'])->withCookie(Cookie::forget('carts'));
    }
    
}
