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

    public $categoryList = [];

    public $title,
            $image,
            $description,
            $category,
            $stock,
            $price,
            $author,
            $publisher,
            $year,
            $pages,
            $imageUpdate,
            $currentProductId;

    public $deletedProductId;


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

        $this->resetInputFields();

        $this->dispatchBrowserEvent('saveProduct');
    }

    public function edit($id)
    {
        $currentProduct = ProductModel::findOrFail($id);

        $this->imageUpdate = $currentProduct->image;

        $this->currentProductId = $currentProduct->id;
        $this->title = $currentProduct->title;
        $this->description = $currentProduct->description;
        $this->category = $currentProduct->category->name;
        $this->stock = $currentProduct->stock;
        $this->price = $currentProduct->price;
        $this->author = $currentProduct->author;
        $this->publisher = $currentProduct->publisher;
        $this->year = $currentProduct->year;
        $this->pages = $currentProduct->pages;

    }

    public function update()
    {
        $validate = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'pages' => 'required'
        ]);

        $data = ProductModel::find($this->currentProductId);
        $imageName = $this->imageUpdate;
        $categoryId = CategoryModel::where('name', $this->category)->first();
        
        if($this->image){
            $path = base_path().'/public/storage/images/products/';
            $oldFile = $path.$imageName;
            unlink($oldFile);

            $newTitle = str_replace(' ', '_', $this->title);
            $imageName = $newTitle.'.'.$this->image->extension();
    
            Storage::putFileAs(
                'public/images/products',
                $this->image,
                $imageName
            );
        }


        $data->update([
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

        session()->flash('message', 'Data Updated Successfully.');

        $this->resetInputFields();

        $this->dispatchBrowserEvent('updateModal');
    }

    public function remove($id){
        $currentProduct = ProductModel::findOrFail($id);

        $this->deletedProductId = $currentProduct->id;
    }

    public function delete(){
        ProductModel::where('id', $this->deletedProductId)->delete();

        session()->flash('message', 'Data Deleted Successfully.');
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function resetInputFields(){
        $this->title = '';
        $this->image = '';
        $this->imageUpdate = '';
        $this->description = '';
        $this->category = '';
        $this->stock = '';
        $this->price = '';
        $this->author = '';
        $this->publisher = '';
        $this->year = '';
        $this->pages = '';
    }

    public function render()
    {
        if($this->search){
            $products = ProductModel::where('title', 'like', '%'.$this->search.'%')->paginate(10);
        } else{
            $products = ProductModel::orderBy('created_at', 'DESC')->paginate(10);
        }
        $this->categoryList = CategoryModel::orderBy('created_at', 'DESC')->get();

        return view('livewire.admin.products',compact('products'));
    }
}
