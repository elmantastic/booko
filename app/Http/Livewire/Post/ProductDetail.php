<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;
use App\Models\Order as OrderModel;
use App\Models\OrderDetail as DetailModel;

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

    public function addToCart(){

        // validate if user not logged in
        if(!Auth::user()){
            return redirect()->route('login');
        }

        //Count Total Price
        $subTotalPrice = $this->product->price * $this->qty;

        // check if the user already have active order cart
        $order = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // update order data
        if(empty($order)){
            OrderModel::create([
                'user_id' => Auth::user()->id,
                'price_total' => $subTotalPrice,
                'qty_products' => $this->qty,
                'unique_code' => mt_rand(100,999),
            ]);
            $order->update();
        } else {
            $order->price_total += $subTotalPrice;
            $order->qty_products += $this->qty;
            $order->update();
        }

        // add to order detail
        DetailModel::create([
            'qty' => $this->qty,
            'subtotal_price' => $subTotalPrice,
            'product_id' => $this->product->id,
            'order_id' => $order->id,
        ]);

        $this->emit('addedToCart');

        return redirect()->back()->with('success', 'Product added to your cart');
    }


    public function render()
    {
        return view('livewire.post.product-detail');
    }
}
