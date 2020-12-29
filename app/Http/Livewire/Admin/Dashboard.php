<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User as UserModel;
use App\Models\Product as ProductModel;
use App\Models\Transactions as TransactionModel;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $countUsers, $countTransactions, $countProducts, $countEarnings;

    public function toggleMenu(){
        $this->dispatchBrowserEvent('toggleSidebar');
    }
    
    public function render()
    {
        $this->countUsers = UserModel::count();
        $this->countProducts = ProductModel::where('is_active', 1)->count();
        $this->countTransactions = TransactionModel::count();
        $this->countEarnings = DB::table('orders')
        ->where('status',1)
        ->sum('price_total');
        
        return view('livewire.admin.dashboard');
    }
}
