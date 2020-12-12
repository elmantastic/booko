<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User as UserModel;
use App\Models\UserAddress as AddressModel;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{    
    public $order;
    public $currentUser;
    public $addressList = [];
    public $countAddress;

    public $defaultAddress;

    public $name,
    $province,
    $city,
    $postal_code,
    $detail;

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

        session()->flash('info', 'Product added successfully');

        $this->name = '';
        $this->province = '';
        $this->city = '';
        $this->postal_code = '';
        $this->detail = '';
    }

    public function setDefaultAddress($id){
        $addresses = DB::table('user_addresses')->where('user_id', Auth::user()->id)->update(array('set_default' => 0));
        
        $defaultAddress = AddressModel::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $defaultAddress->set_default = true;
        $defaultAddress->update();
        
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

        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();

        return view('livewire.checkout.checkout');
    }
}