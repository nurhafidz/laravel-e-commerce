<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Bank;
use Xendit\Xendit;


class SaldoController extends Controller
{
    public function index($storename)
    {
        # code...
        $c =str_replace('-', ' ', $storename);
        $data['toko'] = Store::where('name',$c)->firstOrFail();

        $data['bank']=Bank::all();

        return view('seller.saldo.index',$data);
    }
    public function create(Request $Request)
    {
        
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

        $params = [
        'external_id' => '12345',
        'amount' => 1000,
        'bank_code' => 'BCA',
        'account_holder_name' => 'RAIDY WIJAYA',
        'account_number' => '1234567890',
        'description' => 'Disbursement from Example',

        ];
        

        $createInvoice = \Xendit\Disbursements::create($params);
        dd($createInvoice);
    }
}
