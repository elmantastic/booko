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
            $products = ProductModel::where('title', 'like', '%'.$this->search.'%')->where('is_active', 1)->paginate(10);
        } else{
            $products = ProductModel::orderBy('created_at', 'DESC')->where('is_active', 1)->paginate(10);
        }
        $title = 'Books List';

        return view('livewire.post.product', compact('products', 'title'));
    }
}
