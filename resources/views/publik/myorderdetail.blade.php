@extends('layouts.app')

@section('content')
<livewire:navbar>

<section class="bg-white py-8">
    <div class="container mx-auto">
        <div class="grid grid-cols-3 gap-6">
            <div class=" rounded overflow-hidden shadow-lg mb-5 col-span-3 lg:col-span-1">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Invoice </div>
                    {{-- <p class="text-gray-700 text-base">
                    sad
                    </p> --}}
                </div>
                <div class="px-6">
                    <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Id Invoice :</span>
                    <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{$order->invoice}}</span>
                </div>
                <div class="px-6">
                    <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Tanggal transaksi :</span>
                    <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Str::limit($order->created_at,10,'')}}</span>
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
                            @if ($order->status == 1)
                                Menunggu konfirmasi
                            @endif
                            @if ($order->status == 2)
                                Sedang di proses
                            @endif
                            @if ($order->status == 3)
                                Sedang di kirim
                            @endif
                            @if ($order->status == 4)
                                Barang sampai
                            @endif
                        </span>
                </div>
                @endif
                <div class="px-6 mb-3">
                    @if ($invoice['status'] == "PENDING")
                        <a class="inline-block text-center text-sm font-semibold w-full mr-2 mb-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" href="{{url('https://checkout-staging.xendit.co/web/'.$order->invoice)}}">Bayar</a>
                    @endif
                </div>
            </div>
            <div class="col-span-3 lg:col-span-2">
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($order_detail as $item)
                    <div class="col-span-3">
                        <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                            @php
                                $ex = count(explode('|', $item->product->image));
                            @endphp
                            @if ($ex != 1)
                            @php
                                $x =explode('|', $item->product->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$x[0])}}')" title="Woman holding a mug">
                            </div>
                            @else
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$item->product->image)}}')" title="Woman holding a mug">
                            </div>
                            @endif
                            
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2">{{$item->product->name}}</div>
                                    <div class="flex flex-wrap -mx-2 overflow-hidden">
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">harga : Rp {{number_format($item->price)}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">Qty : {{$item->qty}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">Jumlah harga : Rp {{number_format($item->qty*$item->price)}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full overflow-hidden">
                                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                            <div class=" px-2 w-1/2 overflow-hidden">
                                                @if ($invoice['status'] =="PAID" )
                                                    @if ($order->tracking_number!=Null)
                                                    <p class="text-gray-700 text-base">No resi : {{$item->resi}}</p>
                                                    </div>
                                            <div class=" px-2 w-1/2 overflow-hidden"><a class="text-green-500 hover:text-white hover:bg-green-500 border border-green-500 text-xs font-semibold rounded-full px-4  leading-normal" href="#">Lacak</a></div>
                                                    @else
                                                    <p class="text-gray-700 text-base">No resi : -</p></div>
                                                    @endif
                                                @else
                                                <p class="text-gray-700 text-base">No resi : -</p></div>
                                                @endif
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<livewire:footer>
@endsection