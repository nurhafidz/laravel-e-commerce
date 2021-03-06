<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Province;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Store;
use App\Models\Phonecode;
use App\Models\Review;
use App\Models\User;
use Alert;
use File;
use Barryvdh\DomPDF\Facade as PDF;
use Xendit\Xendit;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    public function detail()
    {
        
        $check = Auth::user()->alamat_lengkap;

        if($check == Null){
            // $data['province']= Province::all();
            $province = Province::pluck("name", "id");
            $phone=Phonecode::all();
            return view('publik.profil.detail',compact('province','phone'));
        }
        else{
            return abort(404);
        }
    }
    public function getCity($id)
    {
        $city = City::where("province_id", $id)->get();
        return json_encode($city);
    }
    public function getDistrict($id)
    {
        $district = District::where("city_id", $id)->pluck("name", "id");
        return json_encode($district);
    }
    public function myorder()
    {
        //$data['order'] = Order::where('user_id',$z)->latest()->get();
        $data['order'] = OrderDetail::where('user_id',Auth::user()->id)->latest()->get();
        
        if(count($data['order']) != 0)
        {

            Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
            foreach($data['order'] as $abc)
            {
                $invoice = $abc->order->invoice;
                $getInvoice = \Xendit\Invoice::retrieve($invoice);
                $getInvoice2[] = $getInvoice;
                
            }
            $data['getinvoice'] = $getInvoice2;
        }
        
        // dd($data);
        return view('publik.myorder',$data);
    }
    public function orderdetail($orderid)
    {
        
        
        $data['order_detail'] = OrderDetail::where('id',$orderid)->where('user_id',Auth::user()->id)->first();
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
        $id = $data['order_detail']->order->invoice;
        $data['invoice'] = \Xendit\Invoice::retrieve($id);
        $url = 'https://ruangapi.com/api/v1/waybill';
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'E2RVXwXbh4AODgLOAAaBm6PSDJ5QMVZN6dwZsxgw'
            ],
            'form_params' => [
                'waybill' => $data['order_detail']->tracking_number,
                'courier' => $data['order_detail']->shipping,
            ]
        ]);

        $data['respon'] = json_decode($response->getBody(), true);
        // dd($data['respon']);
        return view('publik.myorderdetail',$data);
        
    }
    
    
    public function detailupdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $a = $request->jenis_kelamin;
        $user->jenis_kelamin = $a;
        $user->tempat_lahir = $request->tmp_lahir;
        $user->tanggal_lahir = $request->tgl_lahir;
        $user->alamat_lengkap = $request->alamat;
        $user->district_id = $request->district;
        $user->kode_pos = $request->kode;
        $user->phonecode_id = $request->phonecode;
        $user->telepon = $request->phonenumber;
        $user->update();
        return redirect()->route('home.guest');
    }

    public function changestatus(Request $request, $orderid)
    {
        $data['order_detail'] = OrderDetail::where('id',$orderid)->where('user_id',Auth::user()->id)->first();
        $saldo=$data['order_detail']->price;
        $store=$data['order_detail']->store_id;
        $data['store'] = Store::findorfail($store);
        $data['store']->saldo=$saldo;
        $data['order_detail']->status=$request->status;
        $data['order_detail']->update();
        $data['store']->update();
        return redirect()->back();
    }

    public function cetak($invoice)
    {
        $order = Order::where('user_id',Auth::user()->id)->where('invoice',$invoice)->first();
        $orderdetail = OrderDetail::where('order_id',$order->id)->get();
        
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
        $invoice = $order->invoice;
        $getInvoice = \Xendit\Invoice::retrieve($invoice);
        $data = ['title' => 'Welcome to belajarphp.net'];
        $pdf = PDF::loadView('publik.nota', compact('data'));
        return $pdf->stream();
    
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storereview(Request $request,$iduser,$orderid)
    {
        $validated = $request->validate([
        'rating' => 'required',
        // 'gambarrev' => 'size:20000',
        ]);
        $userid=Crypt::decryptString($iduser);
        $data['order_detail'] = OrderDetail::where('id',$orderid)->where('user_id',$userid)->first();

        $x1=$request->rating;
        $x2=$request->reviewtext;
        if($request->hasfile('gambarrev'))
            {
                foreach($request->file('gambarrev') as $key=>$gambar)
                {
                    $name1 = $key+time().'.'.$gambar->extension();
                    $name = Auth::user()->first_name.'-'.$name1;
                    $resize_image = Image::make($gambar->getRealPath());
                    $resize_image->save(public_path().'/image/review/'. $name);
                    $datagambar[] = $name;  
                }
                $imagename = implode("|",$datagambar);
            }
        if($request->hasfile('videorev'))
            {
                foreach($request->file('videorev') as $key=>$video)
                {
                    $name1 = $key+time().'.'.$video->extension();
                    
                    $name = Auth::user()->first_name.'-'.$name1;
                    $file = $video;
                    $path = public_path().'/video/review/';
                    $file->move($path, $name);
                    $datavideo[] = $name;  
                }
                $videoname = implode("|",$datavideo);
            }
            
        $y=array(
            
        );
        $x = new Review;
        $x->product_id=$data['order_detail']->product_id;
        $x->user_id=$userid;
        $x->score=$x1;
        $x->review=$x2;
        if($request->hasfile('gambarrev')){
            $x->gambar=$imagename;
        }
        if($request->hasfile('videorev')){
            $x->video=$videoname;
        }
        $x->save();

        $rev=Review::where('product_id',$data['order_detail']->product_id)->where('user_id',$userid)->where('created_at',date("Y-m-d h:i:s"))->first();
        $data['order_detail']->review_id=$rev->id;
        $data['order_detail']->update();

        // $data['order_detail2'] = OrderDetail::where('product_id',$data['order_detail']->product_id)->where('user_id',Auth::user()->id)->first();
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $province = Province::pluck("name", "id");
        return view('publik.profil.profil',compact('province'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request)
    {
        $user= User::findorfail(Auth::user()->id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->district_id=$request->district;
        $user->kode_pos=$request->kode;
        $user->alamat_lengkap=$request->address;
        $user->save();
        Alert::success('Your data has been updated', 'Success');
        return redirect()->back();
    }
    public function updateimage(Request $request)
    {
        $user= User::findorfail(Auth::user()->id);
        if (request()->hasFile('photoa')) {
            $g=$request->File('photoa');
            
            if ($user->foto != null) {
                $name1 = time().'.'.$g->getClientOriginalExtension();
                $g->move(public_path().'/image/profil/', $name1);
                File::delete(public_path().'/image/profil/'.$user->foto);
                $user->foto=$name1;
            } else {
                $name1 = time().'.'.$g->getClientOriginalExtension();
                $g->move(public_path().'/image/profil/', $name1);
                $user->foto=$name1;
            }
        }
        $user->update();
        Alert::success('Your data has been updated', 'Success');
        return redirect()->back();
        
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
