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
    public function editstatus($id)
    {
        $data=User::findorFail($id);
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
