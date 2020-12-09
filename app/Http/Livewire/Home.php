<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    public function render()
    {
        
        $popular_categories = DB::table('products')
        ->Join('categories','categories.id','=','products.category_id')
        ->select('categories.id','categories.name',DB::raw('COUNT(products.category_id) AS cc'))
        ->orderBy('cc','DESC')
        ->groupBy('products.category_id')
        ->limit(4)
        ->get();

        $products = ProductModel::orderBy('created_at', 'DESC')->take(10)->get();


        return view('livewire.home', compact('popular_categories', 'products'));
    }
}
