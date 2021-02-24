<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Phonecode;
use Illuminate\Support\Facades\Http;

class OTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phone=Phonecode::all();
        return view('publik.index',compact('phone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otp = rand(100000, 999999);
        
        $sid    = "AC180d354f6652dd8a1e7d3303dc306a14"; 
        $token  = "0140d227a53fba84dc4c687426c159c1"; 
        $twilio = new Client($sid, $token); 
        
        $message = $twilio->messages 
        ->create("whatsapp:+6285624617860", // to 
                array( 
                    "from" => "whatsapp:+14155238886",       
                    "body" => "kontol ini kode verifikasi anda adalah ".$otp." ,harap di rahasia kan." 
                ) 
        ); 
        print($message->sid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
