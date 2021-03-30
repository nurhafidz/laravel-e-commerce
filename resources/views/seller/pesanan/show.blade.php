@extends('layouts.app')

@section('content')
<livewire:navbar>
    <!-- component -->
    <div x-data="{ open: false }" @click.away="open = false">
        <div class="flex">
            <div class="md:w-2/12">
                <livewire:sellerside>
            </div>
            <div class="w-full md:w-10/12">
				<div class="grid grid-rows-3 gap-4">
               @if ($orderdetail->status == "2" || $orderdetail->status == "1")
               
					<div class="row-span-3">
						<div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg ">
                     @php $a = Auth::user()->store->name; $storename = str_replace(' ','-',$a) @endphp
                     @if ($getinvoice['status'] == "PAID")
                     <div class=" bg-white rounded p-4 flex flex-col justify-between leading-normal">
                        <div class="grid grid-cols-3 gap-4 justify-items-end">
                        @switch($orderdetail->status)
                           @case(1)
                              <div class="flex justify-center items-center">
                                 <form action="{{url('/seller/'.$storename.'/product/'.$orderdetail->id.'/changestatus')}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="flex items-center justify-between px-4 text-md font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" id="change status" value="2" name="status">
                                    Konfirmasi pesanan
                                    </button>
                                 </form>
                              </div>
                              @break
                           @case(2)
                              <div class="flex justify-center items-center">
                                 <form action="{{url('/seller/'.$storename.'/product/'.$orderdetail->id.'/changestatus')}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1">

                                       <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 block text-sm">
                                          <span class="text-gray-700 dark:text-gray-400">No resi</span>
                                          <input name="tracking_number" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="12345" />
                                       </div>

                                       <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2">
                                          <button class="flex items-center justify-between px-4 text-md font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" id="change status" name="status" value="3">
                                             Pesanan di kirim
                                          </button>
                                       </div>

                                    </div>
                                    
                                    
                                 </form>
                              </div>
                              @break
                           @default
                           
                           </div>
                        @endswitch
                        @endif
                        </div>
							</div>
						</div>
					</div>
               @endif
					<div class="row-span-3">
						<div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg">
							<div class=" bg-white rounded p-4 flex flex-col justify-between leading-normal">
								<div class="mb-8">
									<div class="text-gray-900 font-bold text-xl mb-2">Invoice</div>
									<div class="grid grid-cols-2 gap-4">
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Id invoice : {{$orderdetail->order->invoice}}</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Tanggal transaksi : {{Str::limit($orderdetail->order->created_at,10,'')}}</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Status Pembayaran : <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                 {{$getinvoice['status']}}
                              </span>
											</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Status Pemesanan : @switch($orderdetail->status) @case(1) <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                       Menunggu konfirmasi
                                       </span>
												@break @case(2) <span class="px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:bg-teal-700 dark:text-teal-100">
                                       Sedang di proses
                                       </span>
												@break @case(3) <span class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-full dark:bg-indigo-700 dark:text-indigo-100">
                                       Sedang dalam perjalanan
                                       </span>
												@break @case(4) <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                       Selesai
                                       </span>
												@break @default @endswitch</p>
										</div>
										<div class="col-span-2">
											<p class="text-gray-700 text-base">Nama Lengkap : {{$orderdetail->order->user->first_name}} {{$orderdetail->order->user->last_name}}</p>
										</div>
										<div class="col-span-2">
											<p class="text-gray-700 text-base">Alamat pengirimin : {{$orderdetail->order->user->alamat_lengkap}} , {{$orderdetail->order->user->district->name}} {{$orderdetail->order->user->kode_pos}}, {{$orderdetail->order->user->district->city->name}}, {{$orderdetail->order->user->district->city->province->name}}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row-span-3">
						<div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg ">
							@php
                                $ex = count(explode('|', $orderdetail->product->image));
                            @endphp
                            @if ($ex != 1)
                            @php
                                $x =explode('|', $orderdetail->product->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$x[0])}}')" title="Woman holding a mug">
                            </div>
                            @else
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$orderdetail->product->image)}}')" title="Woman holding a mug">
                            </div>
                            @endif
							<div class=" bg-white rounded p-4 flex flex-col justify-between leading-normal">
								<div class="mb-8">
									<div class="text-gray-900 font-bold text-xl mb-2">{{$orderdetail->product->name}}</div>
									<div class="grid grid-cols-2 gap-4">
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Status Barang :</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Harga : Rp {{number_format($orderdetail->product->harga)}}</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Jumlah Barang : {{$orderdetail->qty}}</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Jumlah harga : Rp {{number_format($orderdetail->product->harga*$orderdetail->qty)}}</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Tipe pengiriman : {{$orderdetail->shipping}}, {{$orderdetail->shipping_detail}}</p>
										</div>
										<div class="md:col-span-1 col-span-2">
											<p class="text-gray-700 text-base">Ongkos kirim : {{$orderdetail->cost}}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row-span-3">@if ($orderdetail->tracking_number != NUll)
						<div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
							<div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
								<h2 class="text-lg">Track</h2>
								<p class="text-md">No resi : {{$orderdetail->tracking_number}}</p>
								<div class="flex flex-wrap -mx-2 overflow-hidden">@foreach ($respon['data']['details'] as $track)
									<div class="my-2 px-2 w-full overflow-hidden">
										<div class="border-b-2 border-gray-400">
											<p>[{{$track['city_name']}}] {{$track['shipping_date']}} {{Str::limit($track['shipping_time'],5,'')}}, @if ($track['shipping_code'] == 1 || $track['shipping_code'] == 3) {{$track['shipping_description']}} di {{$track['city_name']}} @endif @if ($track['shipping_code'] == 2) {{$track['shipping_description']}} dari {{$track['city_name']}} @endif @if ($track['shipping_code'] == 4) {{$track['shipping_description']}} menuju alamat @endif @if ($track['shipping_code'] == 5) Paket di terima oleh {{$respon['data']['delivery_status']['pod_name']}} @endif</p>
										</div>
									</div>@endforeach</div>
								<div class="my-2 px-2 w-full overflow-hidden">
									<!-- Column Content -->
								</div>
							</div>
                  </div>@endif
               </div>
				</div>
         </div>
         
	</div>
</div>
<livewire:footer>
@endsection