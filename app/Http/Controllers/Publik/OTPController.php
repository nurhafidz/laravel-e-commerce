<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Phonecode;
use Illuminate\Support\Facades\Http;
use App\Models\Otp;
use Auth;

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
    public function test()
    {
        $phone=Phonecode::all();
        return view('publik.index2',compact('phone'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $otp = rand(100000, 999999);
        
        $sid    = "AC180d354f6652dd8a1e7d3303dc306a14"; 
        $token  = "e38fb477951206aba4485f6c23c63373"; 
        $twilio = new Client($sid, $token);
        $request->pcode;
        $request->pno;


        $saveotp = new Otp;
        $saveotp->otp=$otp;
        $saveotp->user_id=Auth::user()->id;
        $saveotp->status=1;
        $waktu1=strtotime(date("h:i"));
        $waktu2=date("Y:m:d h:i:s",strtotime('+10 minutes', $waktu1));
        $waktu3=date("a");
        if($waktu3 == "am"){
            $saveotp->type_expire=1;
        }else{
            $saveotp->type_expire=0;
        }
        $saveotp->expire_time=$waktu2;
        $saveotp->save();
        $message = $twilio->messages 
        ->create("whatsapp:+".$request->pcode.$request->pno, // to 6289516087135 
                array( 
                    "from" => "whatsapp:+14155238886",       
                    "body" => "kode verifikasi anda adalah ".$otp." ,harap di rahasia kan." 
                ) 
        ); 
        print($waktu2.'<br>');
        print($waktu1);
    }
    public function otpcheck(Request $request)
    {
        // $otp=$request->otp;
        $a=$request->a;
        $b=$request->b;
        $c=$request->c;
        $d=$request->d;
        $e=$request->e;
        $f=$request->f;
        $otp=$a.$b.$c.$d.$e.$f;
        $get=Otp::where('otp',$otp)->where('user_id',Auth()->user()['id'])->where('status',1)->get();
        if( count($get) != 0){
            foreach($get as $otp2){
                $x=Otp::findorfail($otp2->id);
                $x->status=2;
                $x->save();
            }
            $y=array(
                'message'=>'success',
                'status'=>'1'
            );
        }
        else{
            $y=array(
                'message'=>'otp gagal atau kadaluarsa',
                'status'=>'0'
            );
        }
        return json_encode($y);
    }

    public function checkstatus()
    {
        $x = Otp::where('status','1')->get();
        foreach($x as $y){
            $t=strtotime($y->expire_time)-strtotime(date("Y:m:d h:i:s"));
            
            
            if($y->type_expire == 0){
                $v=$y->expire_time;
                if($v > date("Y:m:d h:i:s")){
                    $m=Otp::find($y->id);
                    $m->status=0;
                    $m->save();
                }
            }
            if($y->type_expire==1){
                $v=$y->expire_time.'am';
                if($v > date("Y:m:d h:i:sa")){
                    $m=Otp::find($y->id);
                    $m->status=0;
                    $m->save();
                }
            }
        }
    }
    
}
