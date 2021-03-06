<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    // digunakan untuk assignment data agar bisa masuk
    // karena secara default datanya diproteksi oleh laravel
    // bisa pakai seperti yang dibawah atau protected village
    // lalu dipilih attribut mana saja yang diperbolehkan
    protected $guarded = []; 
    
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
}
