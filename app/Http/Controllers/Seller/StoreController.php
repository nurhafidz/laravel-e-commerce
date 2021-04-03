<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($storename)
    {
        $checkuser = Auth::user()->store->name;
        $c =str_replace('-', ' ', $storename);
        if($checkuser == $c){
            return view('seller.dashboard');
        }
        else{
            return abort(404);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['province'] = Province::pluck("name", "id");
        return view('seller.store.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->decsription = $request->decsription;
        $store->user_id = $request->user_id;
        $store->district_id = $request->district;
        $store->alamat = $request->alamat;
        $store->status = 1;
        $user = User::findorFail($request->user_id);
        $user->role_id = 3;
        $store->save();
        $user->save();

        return view('seller.dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($storename)
    {
        $checkuser = Auth::user()->store->name;
        $c =str_replace('-', ' ', $storename);
        if($checkuser == $c){
            $province=Province::pluck("name", "id");
            return view('seller.profile.edit',compact('province'));
        }
        else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
