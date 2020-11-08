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
    public function show($id)

    {
        $user=User::findorfail($id);

        return view('service.servicesellershow',compact('user'));
    }
    public function editstatus($id)
    {
        $data=Product::findorFail($id);
        $stat = $data->status;
        if($stat == 1)
        {
            $data->status=0;
        }
        if($stat == 0)
        {
            $data->status=1;
        }
        else{
            $data->status=0;
        }
        $data->update();
     
         return redirect()->back();
}
}
