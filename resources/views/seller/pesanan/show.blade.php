@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
    <div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
        <livewire:sidebarseller>
        <div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
        <div class="grid grid-rows-3 gap-4">
            <div class="row-span-3">
               <div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg">
                  <div class=" bg-white rounded p-4 flex flex-col justify-between leading-normal">
                     <div class="mb-8">
                        <div class="text-gray-900 font-bold text-xl mb-2">Invoice</div>
                        <div class="grid grid-cols-2 gap-4">
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Id invoice : {{$orderdetail->order->invoice}}</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Tanggal transaksi : {{Str::limit($orderdetail->order->created_at,10,'')}}</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Status Pembayaran : 
                              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                 {{$getinvoice['status']}}
                              </span>
                           </p></div>
                           <div class="col-span-2"><p class="text-gray-700 text-base">Nama Lengkap : {{$orderdetail->order->user->first_name}} {{$orderdetail->order->user->last_name}}</p></div>
                           <div class="col-span-2"><p class="text-gray-700 text-base">Alamat pengirimin : 
                              {{$orderdetail->order->user->alamat_lengkap}} ,
                           {{$orderdetail->order->user->district->name}} {{$orderdetail->order->user->kode_pos}}, 
                           {{$orderdetail->order->user->district->city->name}}, {{$orderdetail->order->user->district->city->province->name}}
                              </p></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row-span-3">
               <div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg relatuve">
                  <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://id-test-11.slatic.net/original/68ae5dbfe3526ecdffc416065fb751c7.jpg')" title="SABU SABU"> </div>
                  <div class=" bg-white rounded p-4 flex flex-col justify-between leading-normal">
                     <div class="mb-8">
                        <div class="text-gray-900 font-bold text-xl mb-2">{{$orderdetail->product->name}}</div>
                        
                        <div class="grid grid-cols-2 gap-4">
                           
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Status Barang  :</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Harga          : Rp {{number_format($orderdetail->product->harga)}}</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Jumlah Barang  : {{$orderdetail->qty}}</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Jumlah harga   : {{number_format($orderdetail->product->harga*$orderdetail->qty)}}</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Tipe pengiriman : {{}}</p></div>
                           <div class="md:col-span-1 col-span-2"><p class="text-gray-700 text-base">Ongkos kirim   :</p></div>

                        </div>
                        <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white px-4 border border-red-500 hover:border-transparent rounded absolute
                        lg:right-32 mt-5 lg:mt-1">
                        Button
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
        <livewire:footer>
@endsection