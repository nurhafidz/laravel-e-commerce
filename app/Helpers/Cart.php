<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    public function __construct()
    {
        if($this->get() === Null){
            $this->set($this->empty());
        }
    }

    public function empty()
    {
        return[
            'product' => [],
        ];
    }

    public function add(Product $product)
    {
        $cart = $this->get(); 
        array_push($cart['product'],$product);
        $this->set($cart);
    }
    
    public function get()
    {
        return session()->get('cart');
    }
    
    public function set($cart)
    {
        session()->put('cart',$cart);
    }

    public function remove(int $productId)
    {
        $cart = $this->get();

        array_splice($cart['product'],array_search($productId,array_column($cart['product'],'id')),1);

        $this->set($cart);
    }
}