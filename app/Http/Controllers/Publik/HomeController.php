<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use App\Models\Review;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $kategori = Category::with('children')->whereNull('parent_id')->paginate(20);
        
        return view('publik.home',compact('categories','kategori'));
    }
    
    public function show($storename,$slug)
    {
        $c =str_replace('-', ' ', $storename);
        $b = Store::where('name',$c)->firstOrFail();
        $get = str_replace('-', ' ', $slug);
        $data['product'] = Product::where('store_id',$b->id)->whereNotIn('status',[3])->where('name', $get)->firstOrFail();
        $data['review'] =Review::where('product_id',$data['product']->id)->with('children')->whereNull('parent_id')->get();
        $data['produk'] =Product::where('category_id',$data['product']->category_id)->inRandomOrder()->paginate(15);
        $i=0;
        $m=0;
        foreach ($data['review'] as $v) {
            $n=$v->score;
            $m+=$n;
            $i++;
        }
        if($i!=0){
            $o=ceil($m/$i);
        }
        else{
            $o=0;
        }
        $data['hasil']=array(
            0=>$i,
            1=>$m,
            2=>$o
        );
        return view('publik.detail',$data);
    }
    public function search(Request $request)
    {
        $cari = $request->search;
        
        $get=$request->sortir;
        switch ($get) {
                case "Suitable":
                $data['result'] = Product::where('name','like',"%".$cari."%")->whereNotIn('status',[3,1])->paginate(20);
                break;
                case "expensive":
                    $data['result'] = Product::where('name','like',"%".$cari."%")->whereNotIn('status',[3,1])->orderBy('harga', 'desc')->paginate(20);
                break;
                case "Cheapest":
                $data['result'] = Product::where('name','like',"%".$cari."%")->whereNotIn('status',[3,1])->orderBy('harga', 'asc')->paginate(20);
                break;
            
            default:
                $data['result'] = Product::where('name','like',"%".$cari."%")->whereNotIn('status',[3,1])->paginate(20);
            break;
        }
        return view('publik.shop',$data);
    }
    public function catmain(Request $request,$parent)
    {
        $v=null;
        $c =str_replace('-', ' ', $parent);
        $b = Category::where('name',$c)->firstOrFail();
        $child = Category::where('parent_id',$b->id)->get();
        $data['category2']=$b;
        foreach($child as $x){
            $v[]=$x->id;
        }
        
        $get=$request->sortir;
        switch ($get) {
            
                case "Suitable":
                if ($v != Null) {
                $data['product'] =Product::wherein('category_id',[$b->id,$v])->whereNotIn('status',[3,1])->paginate(20);
                } else {
                    $data['product'] =Product::wherein('category_id',[$b->id])->whereNotIn('status',[3,1])->paginate(20);
                }
                break;
                case "expensive":
                if ($v != Null) {
                $data['product'] =Product::wherein('category_id',[$b->id,$v])->whereNotIn('status',[3,1])->orderBy('harga','desc')->paginate(20);
                } else {
                    $data['product'] =Product::wherein('category_id',[$b->id])->whereNotIn('status',[3,1])->orderBy('harga','desc')->paginate(20);
                }
                break;
                case "Cheapest":
                if ($v != Null) {
                $data['product'] =Product::wherein('category_id',[$b->id,$v])->whereNotIn('status',[3,1])->orderBy('harga','asc')->paginate(20);
                } else {
                    $data['product'] =Product::wherein('category_id',[$b->id])->whereNotIn('status',[3,1])->orderBy('harga','asc')->paginate(20);
                }
                break;
            
            default:
                if ($v != Null) {
                $data['product'] =Product::wherein('category_id',[$b->id,$v])->whereNotIn('status',[3,1])->paginate(20);
                } else {
                    $data['product'] =Product::wherein('category_id',[$b->id])->whereNotIn('status',[3,1])->paginate(20);
                }
            break;
        }
        
        
        return view('publik.category.index',$data);
    }
    public function catchild(Request $request,$parent,$child)
    {
        $c =str_replace('-', ' ', $parent);
        $b = Category::where('name',$c)->firstOrFail();
        $get=$request->sortir;
        switch ($get) {
                case "Suitable":
                $data['product'] =Product::where('category_id', [$b->id])->whereNotIn('status',[3,1])->paginate(20);
                break;
                case "expensive":
                $data['product'] =Product::where('category_id', [$b->id])->whereNotIn('status',[3,1])->orderBy('harga', 'desc')->paginate(20);
                break;
                case "Cheapest":
                $data['product'] =Product::where('category_id', [$b->id])->whereNotIn('status',[3,1])->orderBy('harga', 'asc')->paginate(20);
                break;
            
            default:
                $data['product'] =Product::where('category_id', [$b->id])->whereNotIn('status',[3,1])->paginate(20);
            break;
        }
        
        return view('publik.category.show',$data);
    }
    public function homestore($storename)
    {
        $c =str_replace('-', ' ', $storename);
        $data['store'] = Store::where('name',$c)->firstOrFail();
        $data['product'] =Product::where('store_id',[$data['store']->id])->whereNotIn('status',[3,1])->paginate(20);
        foreach($data['product'] as $x){
            $v[]=$x->category_id;
        }
        
        $l=0;
        foreach(array_unique($v) as $h){

            $data['productcat'.$l] =Product::where('store_id',[$data['store']->id])->whereNotIn('status',[3,1])->where('category_id',$h)->paginate(15);
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
