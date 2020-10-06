<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;
use App\Models\Product;


class Orderlist extends Component
{
    public $cart;

    public function mount()
    {
        
        $a = Cart::get()['product'];
        if($a != Null){
            $b = array_column($a, 'id');
            $c = array_count_values($b);
            $iOne = array_combine(range(1, count($c)), array_values($c));
            $itwo = array_combine(range(1, count($a)), array_values($a));
            //$z = array_search('a',$a)
            // $z = array_combine($a,$c);

            for ($i = 1; $i <= count($c); $i++) {
                $d[$i] = $itwo[$i] . ',' . $iOne[$i]; // gabungkan masing" isi array dg (,)
                $d[$i] = explode(',', $d[$i]); // explode/jadikan array berdasarkan pemisah (,)
            }
            $this->cart = $d;
        }
        else{
            $this->cart = $a;
        }
    }
    
    public function render()
    {
        return view('livewire.orderlist');
    }
    
    public function removeItem($productId)
    {
        
        Cart::remove($productId);
        $this->cart = Cart::get();
        $this->emit('productRemoved');
    }
    public function addToCart(int $productId)
    {
        Cart::add(Product::where('id', $productId)->first());

        $this->emit('cartAdded');
    }
}
