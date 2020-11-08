<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Models\Roles;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Province;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function index()
    {
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

        $responseObject = \Xendit\Balance::getBalance('CASH');
        return view('admin.dashboard',compact('responseObject'));
    }
    public function create()
    {
        $data['role'] = Roles::all();
        $data['province'] = Province::pluck("name", "id");
        return view('admin.create',$data);
    }
    public function store(Request $request)
    {
        $user = new User;
        $file = $request->file('foto');
        $name1 = time().'.'.$file->extension();
        $name = $request->first_name.$request->last_name.'-'.$name1;
        $resize_image = Image::make($file->getRealPath());
        $resize_image->resize(700, 700)->save(storage_path().'/image/user/'. $name);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jenis_kelamin = $request->accountType;
        $user->alamat_lengkap = $request->alamat_lengkap;
        $user->district_id = $request->district;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tgl_lahir;
        $user->telepon = $request->telepon;
        $user->foto = $name;
        $user->kode_pos = $request->kode_pos;
        $user->status = $request->status;
        $user->role_id = $request->role;

        $user->save();
        return redirect()->route('admin.dashboard');
    }
}
