<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ServiceController extends Controller
{
    public function index()
    {
        $data['user']=User::all();
        return view('service.dashboard',$data);
    }
}
