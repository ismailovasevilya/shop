<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'phone_number', 
                            'status', 'user_id', 'session_key', 
                            'total_qty', 'total_price', 'address'] ;

    public function order_item() {
        return $this->HasMany('App\Models\OrderItem');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
