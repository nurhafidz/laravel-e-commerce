@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
	<div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
		<livewire:sidebarseller>
    <div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
      <div class="flex flex-wrap -mx-3 overflow-hidden">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3">Nama</th>
                  <th class="px-4 py-3">Barang</th>
                  <th class="px-4 py-3">Qty</th>
                  <th class="px-4 py-3">Subtotal</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3"></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($orderdetail as $key=>$item)
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">{{Str::limit($item->order->user->first_name,15)}}</td>
                    <td class="px-4 text-sm">{{$item->product->name}}</td>
                    <td class="px-4 text-sm">{{$item->qty}}</td>
                    
                    <td class="px-4 py-3 text-sm">{{$item->price*$item->qty}}</td>
                    <td class="px-4 py-3 text-xs"> 
                      @php
                          $s = $getinvoice[$key]['status'];
                          $s2 = $item->status;
                      @endphp
                      @if ($s == "PENDING")
                      <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange-100">
                        Menunggu pembayaran
                      </span>
                      @endif
                      @if ($s == "PAID")
                      @switch($s2)
                          @case(1)
                              <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                Menunggu konfirmasi
                              </span>
                              @break
                          @case(2)
                              <span class="px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:bg-teal-700 dark:text-teal-100">
                                Sedang di proses
                              </span>
                              @break
                          @case(3)
                              <span class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-full dark:bg-indigo-700 dark:text-indigo-100">
                                Sedang dalam perjalanan
                              </span>
                              @break
                          @case(4)
                              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Selesai
                              </span>
                              @break
                          @default
                              
                      @endswitch
                      @endif
                      @if ($s == "EXPIRED")
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                        Di batalkan
                      </span>
                      @endif
                    </td>
                    <td>
                      @if ($s == "PAID")
                      @php $a = Auth::user()->store->name; $storename = str_replace(' ','-',$a) @endphp <a 
                      href="{{url('/seller/'.$storename.'/pesanan/'.$item->id)}}" class="bg-green-500 hover:bg-green-700 text-white  px-4 rounded-full">
                        Detail
                      </a> 
                      @endif
                      
                      
                    </td>
                  </tr>
                @empty
                    
                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<livewire:footer>
@endsection