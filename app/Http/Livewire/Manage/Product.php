<?php

namespace App\Http\Livewire\Manage;

use Livewire\Component;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->get();
        return view('livewire.manage.product', [
            'products' => $products
        ]);
    }
}
