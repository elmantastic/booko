<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    // digunakan untuk assignment data agar bisa masuk
    // karena secara default datanya diproteksi oleh laravel
    // bisa pakai seperti yang dibawah atau protected village
    // lalu dipilih attribut mana saja yang diperbolehkan
    protected $guarded = []; 
    
    use HasFactory;

    public function status(){
        return $this->belongsTo(TransactionsStatus::class, 'status_id', 'id');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
