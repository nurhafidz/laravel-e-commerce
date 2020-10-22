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

    private function getCarts()
    {
        $carts = json_decode(request()->cookie('carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function mount()
    {
        $carts = $this->getCarts();
        $brgtotal = collect($carts)->sum(function($q) {
            return $q['qty'];
        });
        $this->cartTotal = $brgtotal;
    }

    public function render()
    {
        return view('livewire.navbar');
    }

    public function updateCartTotal()
    {
        $carts = $this->getCarts();
        $brgtotal = collect($carts)->sum(function($q) {
            return $q['qty'];
        });
        $this->cartTotal = $brgtotal;
        

    }
}
