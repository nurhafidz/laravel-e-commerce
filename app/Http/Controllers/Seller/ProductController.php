<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Store;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storename)
    {
        $checkuser = Auth::user()->store->name;
        $c =str_replace('-', ' ', $storename);
        if($checkuser == $c){
            $b = Store::where('name',$c)->firstOrFail();
            $data['products'] = Product::where('store_id',$b->id)->latest()->paginate(12);
            return view('seller.productindex',$data);
        }
        else{
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($storename)
    {
        $checkuser = Auth::user()->store->name;
        $c =str_replace('-', ' ', $storename);
        if($checkuser == $c){
            $data['category'] = Category::all();
            return view('seller.product.create',$data);
        }
        else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$storename)
    {
        $checkuser = Auth::user()->store->name;
        $c =str_replace('-', ' ', $storename);
        if($checkuser == $c){
            $product = new Product;
            if($request->hasfile('image'))
            {
                foreach($request->file('image') as $key=>$file)
                {
                    $name1 = $key+time().'.'.$file->extension();
                    $name = $storename.'-'.$name1;
                    $resize_image = Image::make($file->getRealPath());
                    $resize_image->resize(700, 700)->save(public_path().'/image/product/'. $name);
                    
                    $data[] = $name;  
                }
            }
            $imagename = implode("|",$data);
            $product->name =$request->name;
            $product->image =$imagename;
            $product->store_id =Auth::user()->store->id;
            $product->status = "1" ;
            $product->status_product = $request->status_product ;
            $product->stock =$request->stock;
            $product->weight =$request->weight;
            $product->harga =$request->price;
            $product->description =$request->desc;
            $product->category_id =$request->category;

            $product->save();
            return redirect()->route('product.index',$storename);

            
        }
        else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($storename,$brandname)
    {
        $c =str_replace('-', ' ', $storename);
        $b = Store::where('name',$c)->firstOrFail();
        $get = str_replace('-', ' ', $brandname);
        $data['product'] = Product::where('store_id',$b->id)->where('name', $get)->firstOrFail();
        return view('seller.product.show',$data);
    }
    public function changestatus(Request $request,$storename,$id)
    {
        $c =str_replace('-', ' ', $storename);
        $b = Store::where('name',$c)->firstOrFail();
        $data['product'] = OrderDetail::where('store_id',$b->id)->where('id', $id)->firstOrFail();
        $data['product']->status=$request->status;
        $data['product']->tracking_number=$request->tracking_number;
        $data['product']->update();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
