<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Order;
use App\Models\OrderDetail;
use Xendit\Xendit;
use GuzzleHttp\Client;

class PesananController extends Controller
{
    public function index($storename)
    {
        # code...
        $c =str_replace('-', ' ', $storename);
        $data['toko'] = Store::where('name',$c)->firstOrFail();
        $data['orderdetail'] = OrderDetail::where('store_id',$data['toko']->id)->latest()->get();
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
        
        if(count($data['orderdetail']) != 0)
        {

            foreach($data['orderdetail'] as $abc)
            {
                $invoice = $abc->order->invoice;
                $getInvoice = \Xendit\Invoice::retrieve($invoice);
                $getInvoice2[] = $getInvoice;
            }
            $data['getinvoice'] = $getInvoice2;
        }
        //$abc = array_combine($data['orderdetail'],$data['getinvoice']);
        return view('seller.pesanan.index',$data);
    }
    public function show($storename,$orderid)
    {
        # code...
    $c =str_replace('-', ' ', $storename);
    $data['toko'] = Store::where('name',$c)->firstOrFail();
    $data['orderdetail'] = OrderDetail::findorfail($orderid);
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
    
    $invoice = $data['orderdetail']->order->invoice;
    $getInvoice = \Xendit\Invoice::retrieve($invoice);
    
    $data['getinvoice'] = $getInvoice;
    $url = 'https://ruangapi.com/api/v1/waybill';
    $client = new Client();
    $response = $client->request('POST', $url, [
        'headers' => [
            'Authorization' => 'p4w1NZY2m1Fcqnge6Z6EnSw2pSh837fghNLOke37'
        ],
        'form_params' => [
            'waybill' => $data['orderdetail']->tracking_number,
            'courier' => $data['orderdetail']->shipping,
        ]
    ]);

    $data['respon'] = json_decode($response->getBody(), true);
    //dd($data['respon']);

    return view('seller.pesanan.show',$data);
    }
}