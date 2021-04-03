<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'price',
        'qty',
        'product_id',
        'store_id',
        'weight',
        'shipping',
        'shipping_detail',
        'user_id',
        'note',
        'cost'
    ];
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function review()
    {
        return $this->belongsTo('App\Models\Review');
    }
}
