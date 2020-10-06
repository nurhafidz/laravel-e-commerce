<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    public $searchTerm;
    use WithPagination;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $data['products'] = Product::where('name', 'like', $searchTerm)->latest()->paginate(20);
        return view('livewire.shop',$data);
    }
}
