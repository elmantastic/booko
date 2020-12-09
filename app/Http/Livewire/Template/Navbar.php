<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use App\Models\Category as CategoryModel;


class Navbar extends Component
{

    public function render()
    {
        $categories = CategoryModel::all();
        return view('livewire.template.navbar', compact('categories'));
    }
}
