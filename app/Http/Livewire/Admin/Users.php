<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\User as UserModel;
use App\Models\UserAddress as AddressModel;
use Illuminate\Support\Facades\Storage;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $updateQuerySearch = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public $addressList = [];

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
        $this->dispatchBrowserEvent('updateModal');
    }

    public function resetInputFields(){
        $this->name='';
        $this->email='';
        $this->avatar='';
        $this->avatarUpdate='';
        $this->noHP='';
    }

    public function render()
    {
        if($this->search){
            $users = UserModel::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        } else{
            $users = UserModel::orderBy('created_at', 'DESC')->paginate(10);
        }
        
        $addresses = AddressModel::where('set_default', 1)->get();

        foreach($addresses as $list){
            // $this->detailTransaction[$list->order->id] = DetailModel::where('order_id', $list->order->id)->get();
            $this->addressList[$list->user_id] = $list->address_detail .', '. $list->city .', '. $list->province .', '. $list->postal_code;
        }

        return view('livewire.admin.users', compact('users'));
    }
}
