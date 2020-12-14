<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsStatus extends Model
{
    protected $table = 'transactions_status';
    protected $guarded = [];

    use HasFactory;

    public function transactions(){
        return $this->hasMany(Transactions::class, 'status_id', 'id');
    }
}
