<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function seller()
    {
        return $this->hasOne('App\Models\User');
    }
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
