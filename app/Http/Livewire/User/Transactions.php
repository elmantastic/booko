<?php

namespace App\Http\Livewire\User;

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

    public function mount(){
        $this->countTransaction= DB::table('transactions')->where('user_id', Auth::user()->id)->count();
        $this->transactionList= TransactionModel::where('user_id', Auth::user()->id)->get();

        foreach($this->transactionList as $list){
            $this->detailTransaction[$list->order->id] = DetailModel::where('order_id', $list->order->id)->get();
        }

        // dd($this->detailTransaction);

        // foreach($this->detailTransaction as $detail){
        //     dd($detail);
        // }


        // @foreach($details as $key => $detail)
        //     @if($key == $transaction->order->id)
        //     <p>assa{{$detail->id}}</p>
        //     <p>{{$detail->product->price}}</p>
        //     @endif
        // @endforeach
    }

    public function loadDetails($order_id){
        $this->details[$order_id] = DetailModel::where('order_id', $order_id)->get();

    }

    public function confirmArrived($id){
        $currentTransaction = TransactionModel::where('id', $id)->first();
        $currentTransaction->status_id = 5;
        $currentTransaction->update();

        session()->flash('message', 'Order has been completed successfully');
    }

    public function render()
    {
        $this->countTransaction= DB::table('transactions')->where('user_id', Auth::user()->id)->count();
        $this->transactionList= TransactionModel::where('user_id', Auth::user()->id)->get();

        foreach($this->transactionList as $list){
            $this->detailTransaction[$list->order->id] = DetailModel::where('order_id', $list->order->id)->get();
        }

        $this->currentUser = UserModel::where('id', Auth::user()->id)->first();
        return view('livewire.user.transactions');
    }
}
