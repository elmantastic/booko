<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->paginate(20);
        return view('livewire.post.product', compact('products'));
    }
}
