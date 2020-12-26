<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Models\Transactions as TransactionModel;
use App\Models\Order as OrderModel;
use App\Models\OrderDetail as DetailModel;
use Illuminate\Support\Facades\DB;

class Transactions extends Component
{
    public $currentUser;
    // list transaction
    public $transactionList = [];
    public $countTransaction;
    public $detailTransaction = [];
    public $details= [];

    public $resi= [];

    public function mount(){
        $this->countTransaction= DB::table('transactions')->count();
        $this->transactionList= TransactionModel::orderBy('created_at')->get();

        foreach($this->transactionList as $list){
            $this->detailTransaction[$list->order->id] = DetailModel::where('order_id', $list->order->id)->get();
            $this->resi[$list->id] = '';
        }
    }

    public function loadDetails($order_id){
        $this->details[$order_id] = DetailModel::where('order_id', $order_id)->get();

    }

    public function confirmPayment($id){
        $currentTransaction = TransactionModel::where('id', $id)->first();
        $currentTransaction->status_id = 2;
        $currentTransaction->update();
    }

    public function confirmDelivery($id){

        if($this->resi[$id] != ''){
            $currentTransaction = TransactionModel::where('id', $id)->first();
            $currentTransaction->resi_code = $this->resi[$id];
            $currentTransaction->status_id = 3;
            $currentTransaction->update();
            session()->flash('message', 'No Resi Confirmed');

        }else{
            session()->flash('warning', 'Failed! Please fill the resi first');
        }
    }

    public function render()
    {
        $this->countTransaction= DB::table('transactions')->count();
        $this->transactionList= TransactionModel::orderBy('created_at')->get();

        foreach($this->transactionList as $list){
            $this->detailTransaction[$list->order->id] = DetailModel::where('order_id', $list->order->id)->get();
        }

        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();
        return view('livewire.admin.transactions');
    }
}
