<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Order as OrderModel;
use App\Models\OrderDetail as DetailModel;
use Illuminate\Support\Facades\Auth;

class CartDialog extends Component
{
    public $countCart = 0;

    protected $listeners = [
        'addedToCart' => 'updateCart'
    ];

    public function updateCart(){
        if(Auth::user()){
            $order = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
        
            if($order){
                $this->countCart = DetailModel::where('order_id', $order->id)->count();
            }
        }
    }

    public function mount(){
        if(Auth::user()){
            $order = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
        
            if($order){
                $this->countCart = DetailModel::where('order_id', $order->id)->count();
            }
        }
    }
    public function render()
    {
        $count = $this->countCart;
        return view('livewire.cart.cart-dialog', compact('count'));
    }
}
