<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Province;
use Alert;
use File;
use Illuminate\Support\Facades\Storage;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $data['customer']=User::where('role_id', '4')->paginate(10);
        
        return view('admin.customer.index',$data);
    }
    public function show($id)
    {
        $data['customer']=User::findorFail($id);
        return view('admin.customer.show',$data);
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
        $data->update();
        Alert::alert('Title', 'Message', 'Type');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $file_path = storage_path().'/image/user/'.$user->foto;
        unlink($file_path);
        User::where('id',$id)->delete();
        return redirect()->back();
    }
}
