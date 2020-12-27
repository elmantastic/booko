<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use App\Models\Category as CategoryModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;


class Navbar extends Component
{
    public $currentUser;

    protected $listeners = [
        'updateImageProfile' => 'updateImage'
    ];

    public function updateImage(){
        if(Auth::user()){
            $this->currentUser = UserModel::where('id', Auth::user()->id)->first();
        }
        $this->currentUser->update();
    }

    public function render()
    {
        if(Auth::user()){
            $this->currentUser = UserModel::where('id', Auth::user()->id)->first();
        }
        $categories = CategoryModel::all();
        return view('livewire.template.navbar', compact('categories'));
    }
}
