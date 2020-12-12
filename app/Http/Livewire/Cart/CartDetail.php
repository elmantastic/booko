<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order as OrderModel;
use App\Models\OrderDetail as DetailModel;
use Illuminate\Support\Facades\DB;


class CartDetail extends Component
{

    public $order;
    public $orderDetails = [];


    public function incrementQty($id){
        $pQty = DetailModel::where('order_id', $this->order->id)->where('id', $id)->first();

        if($pQty->qty < $pQty->product->stock){
            $pQty->qty++;
        }

        $pQty->update();
        
        $this->updateSummary();
    }
    public function decrementQty($id){
        $pQty = DetailModel::where('order_id', $this->order->id)->where('id', $id)->first();

        if($pQty->qty > 1){
            $pQty->qty--;
        }

        $pQty->update();
        
        $this->updateSummary();
    }

    public function updateSummary(){
        $currentOrder = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if($currentOrder){
            $sumQty= DetailModel::where('order_id', $currentOrder->id)->sum('qty');

            $sumPrice = DB::table('order_details')->where('order_id', $currentOrder->id)
            ->Join('products', 'order_details.product_id', '=', 'products.id')
            ->sum(DB::raw('order_details.qty * products.price'));

            $currentOrder->qty_products = $sumQty;
            $currentOrder->price_total = $sumPrice;

            $currentOrder->update();
        }
        
    }


    public function destroy($id){
        $currentDetail = DetailModel::find($id);
        if(!empty($currentDetail)){
            $currentOrder = OrderModel::where('id', $currentDetail->order_id)->first();
            $countDetail = DetailModel::where('order_id', $currentOrder->id)->count();
            if($countDetail == 1){
                $currentOrder->delete();
                $this->orderDetails = [];
            }
            $currentDetail->delete();
        }
        $this->updateSummary();
        $this->emit('addedToCart');
        session()->flash('message', 'Product deleted successfully');
    }

    public function render()
    {
        if(Auth::user()){
            $this->order = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($this->order){
                $this->orderDetails = DetailModel::where('order_id', $this->order->id)->get();
            }
        }

        return view('livewire.cart.cart-detail', [
            'order' => $this->order,
            'orderDetail' =>$this->orderDetails,
        ]);
    }

   
}
