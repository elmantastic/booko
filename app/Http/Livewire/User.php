<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Models\UserAddress as AddressModel;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class User extends Component
{
    use WithFileUploads;

    public $currentUser;

    public $addressList = [];
    public $countAddress;

    // address
    public $defaultAddress;

    public $nameaddress,
    $province,
    $city,
    $postal_code,
    $detail;

    public  $name,
    $email,
    $avatar,
    $noHP,
    $avatarUpdate,
    $currentUserId;

    public function edit($id){
        $currentUser = UserModel::findOrFail($id);
        $this->avatarUpdate = $currentUser->avatar;
        $this->currentUserId = $currentUser->id;
        $this->name = $currentUser->name;
        $this->email = $currentUser->email;
        $this->noHP = $currentUser->noHP;
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'noHP'=> 'required'
        ]);

        $data = UserModel::find($this->currentUserId);
        $avatarName = $this->avatarUpdate;

        if($this->avatar){
            $newName = str_replace(' ','_',$this->name);
            $avatarName = $newName.'.'.$this->avatar->extension();

            Storage::putFileAs(
                'public/images/users',
                $this->avatar,
                $avatarName
            );
        }
        $data->update([
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $avatarName,
            'noHP' => $this->noHP
        ]);

        session()->flash('message', 'Data User Update Successfully.');
        $this->resetInputFields();
        
        $this->emit('updateImageProfile');

        $this->dispatchBrowserEvent('updateModal');
    }

    public function resetInputFields(){
        $this->name='';
        $this->email='';
        $this->avatar='';
        $this->avatarUpdate='';
        $this->noHP='';
    }

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
            'nameaddress' => 'required',

        ]);

        $count= DB::table('user_addresses')->where('user_id', Auth::user()->id)->count();
        $setDefault = false;
        if($count == 0){
            $setDefault = true;
        }
        AddressModel::create([
            'user_id' => $this->currentUser->id,
            'name' => $this->nameaddress,
            'province' => $this->province,
            'city' => $this->city,
            'address_detail' => $this->detail,
            'postal_code' => $this->postal_code,
            'set_default' => $setDefault,
        ]);

        session()->flash('info', 'Product added successfully');

        $this->nameaddress = '';
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
