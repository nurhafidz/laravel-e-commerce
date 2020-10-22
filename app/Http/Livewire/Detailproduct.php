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
}
