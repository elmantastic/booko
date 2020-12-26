<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as UserModel;
use App\Models\UserAddress as AddressModel;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $updateQuerySearch = ['search'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public $addressList = [];

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
