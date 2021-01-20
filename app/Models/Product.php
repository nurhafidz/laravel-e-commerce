<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'status'
    ];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function orderdetail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
