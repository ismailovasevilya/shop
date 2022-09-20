<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'product_number', 'product_title', 'user_email',
                            'product_price', 'tot_price', 'user_id', 'session_key', 'cart_id', 'order_id'] ;

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }

    public function cart() {
        return $this->belongsTo('App\Models\Cart');
    }
    
}

