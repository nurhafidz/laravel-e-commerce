<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;

class SaldoController extends Controller
{
    public function index($storename)
    {
        # code...
        $c =str_replace('-', ' ', $storename);
        $data['toko'] = Store::where('name',$c)->firstOrFail();


        return view('seller.saldo.index',$data);
    }
}
