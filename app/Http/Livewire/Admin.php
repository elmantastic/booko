<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class Admin extends Component
{
    public $currentUser;

    public function render()
    {
        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();
        return view('livewire.admin');
    }
}
