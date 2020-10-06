<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Facades\Cart;

class Detailproduct extends Component
{
    public $slug;
    public $get;
    public $product;
    public $listeners = ['showproduct'];
    
    

    public function render()
    {
        return view('livewire.detailproduct');
    }
    public function addToCart(int $productId)
    {
        Cart::add(Product::where('id',$productId)->first());

        $this->emit('cartAdded'); 
    }
    
}
