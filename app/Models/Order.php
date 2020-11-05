<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice',
        'external_id',
        'user_id',
        'subtotal',
        'cost'
    ];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
