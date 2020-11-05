<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $user=User::where('role_id','4')->paginate(1);

        return view('service.pengguna',compact('user'));
    
    }
    public function show($id)

    {
        $user=User::findorfail($id);

        return view('service.penggunashow',compact('user'));
    }
}
