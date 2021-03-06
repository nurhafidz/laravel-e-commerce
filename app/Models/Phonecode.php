<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonecode extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->haOne("App\Models\User");
    }
}
