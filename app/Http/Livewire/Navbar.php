<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Facades\Cart;
use App\Models\Cart;
use App\Models\Category;
use Auth;

class Navbar extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'cartAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
    ];

    

    public function mount()
    {
        
        $carts = Cart::where('user_id', auth()->id())->where('status', 1)->get()->sum('qty');
        $this->cartTotal = $carts;
    }

    public function render()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('livewire.navbar',compact('categories'));
    }

    
}
