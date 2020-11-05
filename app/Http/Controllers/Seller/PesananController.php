<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Order;
use App\Models\OrderDetail;
use Xendit\Xendit;

class PesananController extends Controller
{
    public function index($storename)
    {
        # code...
        $c =str_replace('-', ' ', $storename);
        $data['toko'] = Store::where('name',$c)->firstOrFail();
        $data['orderdetail'] = OrderDetail::where('store_id',$data['toko']->id)->get();
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
        
        foreach($data['orderdetail'] as $abc)
        {
            $invoice = $abc->order->invoice;
            $getInvoice = \Xendit\Invoice::retrieve($invoice);
            $getInvoice2[] = $getInvoice;
        }
        $data['getinvoice'] = $getInvoice2;
        //$abc = array_combine($data['orderdetail'],$data['getinvoice']);
        return view('seller.pesanan.index',$data);
    }
    public function show($storename)
    {
        # code...
    $c =str_replace('-', ' ', $storename);
    $data['toko'] = Store::where('name',$c)->firstOrFail();


        return view('seller.pesanan.show',$data);
    }
}