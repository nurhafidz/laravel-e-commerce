<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Order;

class PesananController extends Controller
{
    public function index($storename)
    {
          # code...
          $c =str_replace('-', ' ', $storename);
              $data['toko'] = Store::where('name',$c)->firstOrFail();
             // $data['order'] = Order::where('')


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