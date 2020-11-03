<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Xendit;
use GuzzleHttp\Client;

class SaldoAdminController extends Controller
{
    public function index()
    {
        Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

        $responseObject = \Xendit\Balance::getBalance('CASH');
        return view('admin.dashboard',compact('responseObject'));
    }
    public function getBalance()
    {
        
//   Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

//   $params = [ 
//     'external_id' => 'asad',
//     'payer_email' => 'alfina@xendit.co',
//     'description' => 'Bealajar',
//     'amount' => 50000
//   ];

//   $createInvoice = \Xendit\Invoice::create($params);x
//   dd($createInvoice);

//   Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

//   $id = '5fa13ec5a76c2d2c21b6579f';
//   $getInvoice = \Xendit\Invoice::retrieve($id);
//   dd($getInvoice);

// Xendit::setApiKey('xnd_development_cASCUDlOtp2rosqt0HJCSOFBDTr2hA06kQmrmXjrBcIrvOgLFSB7yzaaEVumzlY');

//   $id = '5fa1377ea76c2d2c21b65756';
//   $expireInvoice = \Xendit\Invoice::expireInvoice($id);
//   dd($expireInvoice);
    }
}
