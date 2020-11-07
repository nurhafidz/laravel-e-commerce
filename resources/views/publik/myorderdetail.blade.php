@extends('layouts.app')

@section('content')
<livewire:navbar>

<section class="bg-white py-8">
    <div class="container mx-auto">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 md:row-span-1 md:col-span-1">
                <div class=" rounded overflow-hidden shadow-lg mb-5 ">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Invoice</div>
                        {{-- <p class="text-gray-700 text-base">
                        sad
                        </p> --}}
                    </div>
                    <div class="px-6">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Id Invoice :</span>
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{$order_detail->order->invoice}}</span>
                    </div>
                    <div class="px-6">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Tanggal transaksi :</span>
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Str::limit($order_detail->created_at,10,'')}}</span>
                    </div>
                    <div class="px-6">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Alamat pengiriman :</span>
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Auth::user()->alamat_lengkap}}, {{Auth::user()->district->name}} {{Auth::user()->kode_pos}}, {{Auth::user()->district->city->name}}, {{Auth::user()->district->city->province->name}}</span>
                    </div>
                    <div class="px-6 mb-3">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Status pembayaran :</span>
                        @if ($invoice['status'] == "PENDING")
                            <span class="inline-block text-orange-600 bg-orange-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$invoice['status']}}</span>
                            <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Batas pembayaran :</span>
                    <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Str::limit($invoice['expiry_date'],10,'')}} pukul : {{substr($invoice['expiry_date'], 11, -8)}}</span>
                        @endif
                        @if ($invoice['status'] == "PAID")
                            <span class="inline-block text-green-600 bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$invoice['status']}}</span>
                        @endif
                        @if ($invoice['status'] == "EXPIRED")
                            <span class="inline-block text-red-600 bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$invoice['status']}}</span>
                        @endif
                    </div>
                    @if ($invoice['status'] == "PAID")
                    <div class="px-6 mb-3">
                            <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Status barang :</span>
                            <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">
                                @if ($order_detail->status == 1)
                                    Menunggu konfirmasi
                                @endif
                                @if ($order_detail->status == 2)
                                    Sedang di proses
                                @endif
                                @if ($order_detail->status == 3)
                                    Sedang di kirim
                                @endif
                                @if ($order_detail->status == 4)
                                    Barang sampai
                                @endif
                            </span>
                    </div>
                    @endif
                    <div class="px-6 mb-3">
                        @if ($invoice['status'] == "PENDING")
                            <a class="inline-block text-center text-sm font-semibold w-full mr-2 mb-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" href="{{url('https://checkout-staging.xendit.co/web/'.$order_detail->order->invoice)}}">Bayar</a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-span-3 md:col-span-2 md:row-span-2">
                <div class="grid grid-cols-3 gap-4">
                    
                    <div class="col-span-3">
                        <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                            @php
                                $ex = count(explode('|', $order_detail->product->image));
                            @endphp
                            @if ($ex != 1)
                            @php
                                $x =explode('|', $order_detail->product->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$x[0])}}')" title="Woman holding a mug">
                            </div>
                            @else
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$order_detail->product->image)}}')" title="Woman holding a mug">
                            </div>
                            @endif
                            
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2">{{$order_detail->product->name}}</div>
                                    <div class="flex flex-wrap -mx-2 overflow-hidden">
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">harga : Rp {{number_format($order_detail->price)}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">Qty : {{$order_detail->qty}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">Jumlah harga : Rp {{number_format($order_detail->qty*$order_detail->price)}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full overflow-hidden">
                                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                            <div class=" px-2 w-1/2 overflow-hidden">
                                                @if ($invoice['status'] =="PAID" )
                                                    @if ($order_detail->tracking_number!=Null)
                                                    <p class="text-gray-700 text-base">No resi : {{$order_detail->tracking_number}}</p>
                                                    </div>
                                                    <div class=" px-2 w-1/2 overflow-hidden">
                                                        <p class="text-gray-700 text-base">Tipe pengiriman : {{$respon['data']['courier']['name']}}</p>
                                                    </div>
                                                    @else
                                                    <p class="text-gray-700 text-base">No resi : -</p></div>
                                                    <div class=" px-2 w-1/2 overflow-hidden">
                                                    </div>
                                                    @endif
                                                @else
                                                <p class="text-gray-700 text-base">No resi : -</p></div>
                                                <div class=" px-2 w-1/2 overflow-hidden">
                                                </div>
                                                @endif
                                            </div>
                                            <div class="mt-3 px-2 w-1/2 overflow-hidden">
                                                <button class="text-green-500 hover:text-white hover:bg-green-500 border border-green-500 text-xs px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease">
                                                    Sudah sampai
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                                {{-- <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                                    <div class="text-sm">
                                        <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                                        <p class="text-gray-600">Aug 18</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @if ($order_detail->tracking_number != NUll)
                    <div class="col-span-3">
                        <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <h2 class="text-lg">Track</h2>
                                <div class="flex flex-wrap -mx-2 overflow-hidden">
                                @foreach ($respon['data']['details'] as $track)
                                    <div class="my-2 px-2 w-full overflow-hidden">
                                        <div class="border-b-2 border-gray-400">
                                            <p>[{{$track['city_name']}}] {{$track['shipping_date']}} {{Str::limit($track['shipping_time'],5,'')}}, 
                                            @if ($track['shipping_code'] == 1 || $track['shipping_code'] == 3)
                                                {{$track['shipping_description']}} di {{$track['city_name']}}
                                            @endif
                                            @if ($track['shipping_code'] == 2)
                                                {{$track['shipping_description']}} dari {{$track['city_name']}}
                                            @endif
                                            @if ($track['shipping_code'] == 4)
                                                {{$track['shipping_description']}} menuju alamat
                                            @endif
                                            @if ($track['shipping_code'] == 5)
                                                Paket di terima oleh {{$respon['data']['delivery_status']['pod_name']}}
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <!-- Column Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<livewire:footer>
@endsection