<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProdukSellerController extends Controller
{
   public function show($id)
   {
    {
        $product=Product::findorfail($id);

        return view('service.produkshow',compact('product'));
    }
   }
    public function index()

    {
        $product=Product::all();

        return view('service.produk',compact('product'));
    }
}
