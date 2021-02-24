<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = "carts";
    use HasFactory;
    protected $fillable =[
        'user_id',
        'product_id',
        'qty',
        'note',
        'weight',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
