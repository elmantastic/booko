<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product as ProductModel;
use App\Models\Category as CategoryModel;

class ProductCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $category;

    protected $updateQuerySearch = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function mount($categoryId){
        $cid =  CategoryModel::find($categoryId);

        if($cid){
            $this->category = $cid;
        }

    }
    
    public function render()
    {
        if($this->search){
            $products = ProductModel::where('category_id', $this->category->id)->where('title', 'like', '%'.$this->search.'%')->paginate(10);
        } else{
            $products = ProductModel::where('category_id', $this->category->id)->orderBy('created_at', 'DESC')->paginate(10);
        }
        $title = $this->category->name.' Books List';
        return view('livewire.post.product-category', compact('products','title'));
    }

}
