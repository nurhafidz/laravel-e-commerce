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
               <p class="text-gray-700 text-base">id invoice       :</p>
               <p class="text-gray-700 text-base">Tanggal transaksi:</p>
               <p class="text-gray-700 text-base">Alamat pengirimin:</p>
               <p class="text-gray-700 text-base">Status Pembayaran:</p>
            </div>
         </div>
      </div>
   </div>
   <div class="row-span-3">
      <div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg relatuve">
         <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://asset-a.grid.id/crop/0x0:0x0/x/photo/nationalgeographic/201604201342795_b.jpg')" title="SABU SABU"> </div>
         <div class=" bg-white rounded p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
               <div class="text-gray-900 font-bold text-xl mb-2">Ganja</div>
               
                <div class="grid grid-cols-2 gap-4">
                    
                    <div class="col-span-1 "><p class="text-gray-700 text-base">Status Barang  :</p></div>
                    <div class="col-span-1 "><p class="text-gray-700 text-base">Status Barang  :</p></div>
                    <div class="col-span-1 "><p class="text-gray-700 text-base">Harga          :</p></div>
                    <div class="col-span-1 "><p class="text-gray-700 text-base">Jumlah Barang  :</p></div>
                    <div class="col-span-1 "><p class="text-gray-700 text-base">Jumlah Harga   :</p></div>

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