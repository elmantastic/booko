<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Product as ProductModel;

class ProductDetail extends Component
{
    public $product;
    public $qty=1;

    public function mount($id){
        $productDetail =  ProductModel::find($id);

        if($productDetail){
            $this->product = $productDetail;
        }

    }

    public function incrementQty(){
        if($this->qty < $this->product->stock){
            $this->qty++;
        };
    }
    public function decrementQty(){
        if($this->qty>1){
            $this->qty--;
        }
    }


    public function render()
    {
        return view('livewire.post.product-detail');
    }
}
