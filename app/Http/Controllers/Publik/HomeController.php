<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    

    public function index()
    {
        return view('home');
    }
    
    public function show($slug)
    {
        $get = str_replace('-', ' ', $slug);
        $data['product'] = Product::where('name', $get)->firstOrFail();
        return view('detail',$data);
    }
}
