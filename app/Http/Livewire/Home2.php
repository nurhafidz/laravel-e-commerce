<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home2 extends Component
{
    public function render()
    {
        $data['products'] = Product::latest()->paginate(8);
        return view('livewire.home2',$data);
    }
}
