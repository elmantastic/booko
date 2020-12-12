<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Checkout extends Component
{    
    public $order;
    
    public function mount(){

        $this->order = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($this->order)){
            
        } else{
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function render()
    {
        return view('livewire.checkout.checkout');
    }
}
