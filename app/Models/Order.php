<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    use HasFactory;

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactions(){
        return $this->hasOne(Order::class, 'order_id', 'id');
    }
}
