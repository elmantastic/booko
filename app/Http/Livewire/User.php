<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Models\UserAddress as AddressModel;

use Illuminate\Support\Facades\DB;

class User extends Component
{
    public $currentUser;

    public $addressList = [];
    public $countAddress;

    public $noHP;

    // address
    public $defaultAddress;

    public $name,
    $province,
    $city,
    $postal_code,
    $detail;

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

        session()->flash('info', 'Product added successfully');

        $this->name = '';
        $this->province = '';
        $this->city = '';
        $this->postal_code = '';
        $this->detail = '';
    }

    public function setDefaultAddress($id){
        $addresses = DB::table('user_addresses')->where('user_id', Auth::user()->id)->update(array('set_default' => 0));
        
        $this->defaultAddress = AddressModel::where('user_id', Auth::user()->id)->where('id', $id)->first();

        $this->defaultAddress->set_default = true;
        $this->defaultAddress->update();
        
    }

    public function render()
    {
        $this->countAddress= DB::table('user_addresses')->where('user_id', Auth::user()->id)->count();

        $this->addressList= DB::table('user_addresses')->where('user_id', Auth::user()->id)->get();

        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();

        return view('livewire.user');
    }
}
