<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;

class User extends Component
{
    public $currentUser;

    public $province,
    $city,
    $postal_code,
    $detail;

    public function render()
    {
        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();

        return view('livewire.user');
    }
}
