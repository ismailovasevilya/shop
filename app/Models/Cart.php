<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'user_id', 'session_key', 'user_email'];

    // public function order_items() {
    //     return $this->hasMany('App\Models\OrderItem');
    // }
}
