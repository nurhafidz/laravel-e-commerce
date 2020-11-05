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
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Invoice</th>
                      <th class="px-4 py-3">Nama</th>
                      <th class="px-4 py-3">Alamat</th>
                      <th class="px-4 py-3">Subtotal</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3"></th>
                    </tr>
                  </thead>
                  <tbody
                  class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    <tr class="text-gray-700 dark:text-gray-400">

                    <td class="px-4 py-3 text-sm">
                        $ 863.45
                      </td>
                      
                      <td class="px-4 text-sm">
                      Muhammad Hilmi Fahrezi
                       
                      </td>
                      
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          Approved
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        6/10/2020
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          Approved
                        </span>
                      </td>
                      <td > 
                     @php
                    $a = Auth::user()->store->name;
                    $storename = str_replace(' ','-',$a)
                     @endphp
                      <a href="{{route('seller.pesanan.show',$storename)}}" class="bg-green-500 hover:bg-green-700 text-white  px-4 rounded-full">
                        Confirm
                      </a> 
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
              </div>
</div>
</div>
        <livewire:footer>
@endsection