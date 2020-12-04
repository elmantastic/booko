<?php

namespace App\Http\Livewire\Manage;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;

class Product extends Component
{

    use WithFileUploads;

    public $title,
            $image,
            $description,
            $category,
            $stock,
            $price,
            $author,
            $publisher,
            $year,
            $pages;


            
    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->get();
        return view('livewire.manage.product', [
            'products' => $products
        ]);
    }

    public function previewImage(){
        $this->validate([
            'image' => 'image|max:2048'
        ]);
    }

}
