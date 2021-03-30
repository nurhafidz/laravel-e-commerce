<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role_id',
        'gender',
        'email',
        'password',
        'status',
        'phonecode_id',
        'telepon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function store()
    {
        return $this->hasOne('App\Models\Store');
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Roles');
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
    public function message() {
        return $this->hasMany("App\Models\Message");
    }
    public function otp()
    {
        return $this->hasMany("App\Models\Otp");
    }
    public function review()
    {
        return $this->hasMany("App\Models\Review");
    }
    public function phonecode()
    {
        return $this->hasMany("App\Models\Phonecode");
    }
}
