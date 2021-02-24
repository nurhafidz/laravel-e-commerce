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
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Xendit\Xendit;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
            return view('publik.profil.detail',compact('province'));
        }
        else{
            return abort(404);
        }
    }
    public function getCity($id)
    {
        $city = City::where("province_id", $id)->pluck("name", "id","type");
        return json_encode($city);
    }
    public function getDistrict($id)
    {
        $district = District::where("city_id", $id)->pluck("name", "id");
        return json_encode($district);
    }
    public function myorder($id)
    {
        $z = Crypt::decrypt($id);
        
        //$data['order'] = Order::where('user_id',$z)->latest()->get();
        $data['order'] = OrderDetail::where('user_id',$z)->latest()->get();
        
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
    public function orderdetail($id,$orderid)
    {
        $z = Crypt::decrypt($id);
        
        $data['order_detail'] = OrderDetail::where('id',$orderid)->where('user_id',$z)->first();
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
        $user->update();
        return redirect()->route('home.guest');
    }

    public function changestatus(Request $request, $id,$orderid)
    {
        $z = Crypt::decrypt($id);
        
        $data['order_detail'] = OrderDetail::where('id',$orderid)->where('user_id',$z)->first();
        $saldo=$data['order_detail']->price;
        $store=$data['order_detail']->store_id;
        $data['store'] = Store::findorfail($store);
        $data['store']->saldo=$saldo;
        $data['order_detail']->status=$request->status;
        $data['order_detail']->update();
        $data['store']->update();
        return redirect()->back();
    }

    public function cetak($id,$invoice)
    {
        $order = Order::where('user_id',$id)->where('invoice',$invoice)->first();
        $orderdetail = OrderDetail::where('order_id',$order->id)->get();
        
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');
        $invoice = $order->invoice;
        $getInvoice = \Xendit\Invoice::retrieve($invoice);
        $data = ['title' => 'Welcome to belajarphp.net'];
        $pdf = PDF::loadView('publik.nota', compact('data'));
        return $pdf->stream();
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
