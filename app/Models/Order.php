<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'product_number', 'product_title',
                            'product_price', 'tot_price', 'user_id'] ;

    public function cart() {
        return $this->belongsTo('App\Models\Cart');
    }

}
