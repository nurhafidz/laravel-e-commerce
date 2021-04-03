<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id', 'product_id','user_id','score','review'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function detail()
    {
        return $this->hasManu('App\Models\OrderDetail');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Review', 'parent_id');
    }
}
