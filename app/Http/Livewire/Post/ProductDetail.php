<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Product as ProductModel;

class ProductDetail extends Component
{
    public $product;

    public function mount($id){
        $productDetail =  ProductModel::find($id);

        if($productDetail){
            $this->product = $productDetail;
        }

    }

    public function render()
    {
        return view('livewire.post.product-detail');
    }
}
