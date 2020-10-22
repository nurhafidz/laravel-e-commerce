<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class HomeController extends Controller
{
    

    public function index()
    {
        return view('publik.home');
    }
    
    public function show($storename,$slug)
    {
        $a = $storename;
        $c =str_replace('-', ' ', $storename);
        $b = Store::where('name',$c)->firstOrFail();
        $get = str_replace('-', ' ', $slug);
        $data['product'] = Product::where('store_id',$b->id)->where('name', $get)->firstOrFail();
        
        return view('publik.detail',$data);
    }
}
