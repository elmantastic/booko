<?php

namespace App\Http\Livewire\Manage;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;

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

    public $category2;

            
    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->where('is_active', 1)->get();
        return view('livewire.manage.product', [
            'products' => $products
        ]);
    }

    public function previewImage(){
        $this->validate([
            'image' => 'image|max:2048'
        ]);
    }

    public function addProduct(){
        $this->validate([
            'title' => 'required',
            'image' => 'image|max:2048|required',
            'description' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'pages' => 'required'
        ]);
        
        // rename image
        $imageName = md5($this->image.microtime().'.'.$this->image->extension());

        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName
        );

        ProductModel::create([
            'title' => $this->title,
            'image' => $imageName,
            'description' => $this->description,
            'category' => $this->category,
            'stock' => $this->stock,
            'price' => $this->price,
            'author' => $this->author,
            'publisher' => $this->publisher,
            'year' => $this->year,
            'pages' => $this->pages
        ]);

        session()->flash('info', 'Product added successfully');

        $this->title = '';
        $this->image = '';
        $this->description = '';
        $this->category = '';
        $this->stock = '';
        $this->price = '';
        $this->author = '';
        $this->publisher = '';
        $this->year = '';
        $this->pages = '';
    }

}
