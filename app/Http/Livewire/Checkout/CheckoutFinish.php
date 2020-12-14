<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;
use App\Models\Order as OrderModel;
use App\Models\Transactions as TransactionModel;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CheckoutFinish extends Component
{
    public $order;
    public $currentTransaction;

    public $totalPay;
    
    public function mount(){
        $this->order = OrderModel::where('user_id', Auth::user()->id)->where('status', 1)->orderBy('created_at', 'DESC')->first();

        $this->currentTransaction = TransactionModel::where('order_id', $this->order->id)->first();

        $this->totalPay = $this->order->price_total + $this->order->unique_code;
    }

    public function render()
    {
        return view('livewire.checkout.checkout-finish');
    }
}
