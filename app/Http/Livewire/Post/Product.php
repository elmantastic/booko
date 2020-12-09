<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product as ProductModel;

class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $updateQuerySearch = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        if($this->search){
            $products = ProductModel::where('title', 'like', '%'.$this->search.'%')->paginate(10);
        } else{
            $products = ProductModel::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('livewire.post.product', compact('products'));
    }
}
