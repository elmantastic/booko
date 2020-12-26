<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product as ProductModel;
use App\Models\Category as CategoryModel;
use Illuminate\Support\Facades\Storage;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $updateQuerySearch = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }

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
        
        $categoryId = CategoryModel::where('name', $this->category)->first();
        $newTitle = str_replace(' ', '_', $this->title);
        $imageName = $newTitle.'.'.$this->image->extension();

        Storage::putFileAs(
            'public/images/products',
            $this->image,
            $imageName
        );

        // $this->image->storeAs('public/assets/images/products', $imageName);

        ProductModel::create([
            'title' => $this->title,
            'image' => $imageName,
            'description' => $this->description,
            'category_id' => $categoryId->id,
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

        $this->dispatchBrowserEvent('saveProduct');
    }

    public function render()
    {
        if($this->search){
            $products = ProductModel::where('title', 'like', '%'.$this->search.'%')->paginate(10);
        } else{
            $products = ProductModel::orderBy('created_at', 'DESC')->paginate(10);
        }
        // $products = ProductModel::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.products',compact('products'));
    }
}
