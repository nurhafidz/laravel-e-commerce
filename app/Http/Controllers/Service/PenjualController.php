<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PenjualController extends Controller
{
    public function index()
    {
        $data['user']=User::where('role_id','3')->paginate(10);
        return view('service.sellerindex',$data);
    }
}
