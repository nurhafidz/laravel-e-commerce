<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$orderdetail->product->name}}</title>
    
    {{-- $data['toko']
    $data['orderdetail']
    $data['getinvoice']
    $data['respon'] --}}
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        th{
            background-color: rgb(206, 206, 206);
        }
        table, th, td {
            padding: 2px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        p{
            margin-top: -20px;
        }
        .-mt-2{
            margin-top: -3px;
        }
    </style>
    
</head>
<body>
    <h1 style="text-align: center">XATORE</h1>
    <table style="width: 100%">
        <thead>
            <tr>
                <th colspan="9">Invoice-{{$orderdetail->order->invoice}}</th>
                <th>{{date("d/m/Y", strtotime($orderdetail->created_at))}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5" style="width: 50%">
                    <div >
                        <h4 class="-mt-2">From :</h4>
                        <p>{{$orderdetail->product->store->name}}</p>
                        <p>{{$orderdetail->product->store->alamat}} ,{{$orderdetail->product->store->district->name}} ,{{$orderdetail->product->store->district->city->name}} ,{{$orderdetail->product->store->district->city->province->name}}</p>
                        <p>{{$orderdetail->product->store->user->phonecode->phonecode}}{{$orderdetail->product->store->user->telepon}}</p>
                    </div>
                </td>
                <td colspan="5" style="width: 50%">
                    <div >
                        <h4 class="-mt-2">To :</h4>
                        <p>{{$orderdetail->user->name}}</p>
                        <p>{{$orderdetail->user->first_name}} {{$orderdetail->user->last_name}}</p>
                        <p>{{$orderdetail->user->alamat_lengkap}} ,{{$orderdetail->user->district->name}} ,{{$orderdetail->user->district->city->name}} ,{{$orderdetail->user->district->city->province->name}}</p>
                        <p>{{$orderdetail->user->phonecode->phonecode}}{{$orderdetail->user->telepon}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="4">Product</th>
                <th colspan="2">Price Product</th>
                <th colspan="2" style="width: 5%">Qty</th>
                <th colspan="2">Total</th>
            </tr>
            <tr>
                <td colspan="4">{{$orderdetail->product->name}}</td>
                <td colspan="2">Rp {{number_format($orderdetail->product->harga,0)}}</td>
                <td colspan="2">{{$orderdetail->qty}}</td>
                <td colspan="2">Rp {{number_format($orderdetail->qty*$orderdetail->product->harga)}}</td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>