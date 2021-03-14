<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        
        return view('publik.home',compact('categories'));
    }
    
    public function show($storename,$slug)
    {
        $c =str_replace('-', ' ', $storename);
        $b = Store::where('name',$c)->firstOrFail();
        $get = str_replace('-', ' ', $slug);
        $data['product'] = Product::where('store_id',$b->id)->where('name', $get)->firstOrFail();
        
        return view('publik.detail',$data);
    }
    public function search(Request $request)
    {
        $cari = $request->search;
        $data['result'] = Product::where('name','like',"%".$cari."%")->paginate(20);
        return view('publik.shop',$data);
    }
    public function catmain($parent)
    {
        $v=null;
        $c =str_replace('-', ' ', $parent);
        $b = Category::where('name',$c)->firstOrFail();
        $child = Category::where('parent_id',$b->id)->get();
        foreach($child as $x){
            $v[]=$x->id;
        }
        if ($v != Null) {
            $data['product'] =Product::wherein('category_id',[$b->id,$v])->paginate(20);
        } else {
            $data['product'] =Product::wherein('category_id',[$b->id])->paginate(20);
        }
        return view('publik.category.index',$data);
    }
    public function catchild($parent,$child)
    {
        $c =str_replace('-', ' ', $parent);
        $b = Category::where('name',$c)->firstOrFail();
        $data['product'] =Product::where('category_id',[$b->id])->paginate(20);
        return view('publik.category.show',$data);
    }
    public function homestore($storename)
    {
        $c =str_replace('-', ' ', $storename);
        $data['store'] = Store::where('name',$c)->firstOrFail();
        $data['product'] =Product::where('store_id',[$data['store']->id])->paginate(20);
        foreach($data['product'] as $x){
            $v[]=$x->category_id;
        }
        
        $l=0;
        foreach(array_unique($v) as $h){

            $data['productcat'.$l] =Product::where('store_id',[$data['store']->id])->where('category_id',$h)->paginate(15);
            $b = Category::findorfail($h);
            $n[]=$data['productcat'.$l];
            $k[]=$b;
            $result[$l]=array(
                'categori'=>array($b),
                'produkcat'=>array($data['productcat'.$l])
            );
            
            $l++;
        }
        $data['result']=$result;
        
        // foreach($result[0]['produkcat'][0] as $produk){
        //     dd($produk->harga);
        // }
        return view('publik.store.detail',$data);
    }
}
