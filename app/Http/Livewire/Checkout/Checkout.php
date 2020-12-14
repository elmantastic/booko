<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User as UserModel;
use App\Models\UserAddress as AddressModel;
use App\Models\Transactions as TransactionModel;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{    
    public $order;
    public $currentUser;
    public $addressList = [];
    public $countAddress;
    public $noHP;

    public $defaultAddress;

    public $name,
    $province,
    $city,
    $postal_code,
    $detail;

    //for checkout
    public $checkoutAddress,
    $total_pay;


    public function addNoHP(){
        $this->validate([
            'noHP' => 'required',
        ]);

        $this->currentUser->noHP = $this->noHP;
        $this->currentUser->update();

    }

    public function addAddress(){
        $this->validate([
            'province' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'detail' => 'required',

        ]);

        $count= DB::table('user_addresses')->where('user_id', Auth::user()->id)->count();
        $setDefault = false;
        if($count == 0){
            $setDefault = true;
        }
        
        AddressModel::create([
            'user_id' => $this->currentUser->id,
            'name' => $this->name,
            'province' => $this->province,
            'city' => $this->city,
            'address_detail' => $this->detail,
            'postal_code' => $this->postal_code,
            'set_default' => $setDefault,
        ]);

        session()->flash('info', 'Address added');

        $this->name = '';
        $this->province = '';
        $this->city = '';
        $this->postal_code = '';
        $this->detail = '';

        $this->dispatchBrowserEvent('saveAddress');
    }

    public function setDefaultAddress($id){
        $addresses = DB::table('user_addresses')->where('user_id', Auth::user()->id)->update(array('set_default' => 0));
        
        $this->defaultAddress = AddressModel::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $this->defaultAddress->set_default = true;
        $this->defaultAddress->update();
    }

    public function checkout(){

        $this->noHP = $this->currentUser->noHP;

        $this->checkoutAddress = $this->defaultAddress->address_detail .', '. $this->defaultAddress->city .', '. $this->defaultAddress->province .', '. $this->defaultAddress->postal_code .', '. $this->currentUser->noHP;

        $this->validate([
            'noHP' => 'required',
            'defaultAddress' => 'required',
        ]);

        TransactionModel::create([
            'order_id' => $this->order->id,
            'user_id' => $this->currentUser->id,
            'shipping_address' => $this->checkoutAddress,
        ]);

        $detailOrder = DB::table('order_details')->where('order_id', $this->order->id)->get();

        foreach($detailOrder as $detail){
            $currentProduct = DB::table('products')->where('id', $detail->product_id)->first();

            $currentProduct->stock -= $detail->qty;
        }

        //update cart / order
        $this->order->status = 1;
        $this->order->update();

        $this->emit('addedToCart');

        session()->flash('info', 'Product added successfully');

        return redirect()->to('/checkout/finish');
    }

    public function mount(){
        $this->order = OrderModel::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($this->order)){
            
        } else{
            return redirect(RouteServiceProvider::HOME);
        }

    }

    public function render()
    {
        $this->countAddress= DB::table('user_addresses')->where('user_id', Auth::user()->id)->count();

        $this->addressList= DB::table('user_addresses')->where('user_id', Auth::user()->id)->get();

        if($this->countAddress != 0){
            $this->defaultAddress = AddressModel::where('user_id', Auth::user()->id)->where('set_default', true)->first();
        }


        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();

        $this->total_pay = $this->order->price_total + $this->order->unique_code;

        return view('livewire.checkout.checkout');
    }
}
