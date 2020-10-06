<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart;

class Navbar extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'cartAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
    ];

    public function mount()
    {
        $a = Cart::get()['product'];
        $b = array_column($a, 'id');
        $c = array_count_values($b);
        $this->cartTotal = count($c);
    }

    public function render()
    {
        return view('livewire.navbar');
    }

    public function updateCartTotal()
    {
        $a = Cart::get()['product'];
        $b = array_column($a, 'id');
        $c = array_count_values($b);
        $this->cartTotal = count($c);

    }
}
