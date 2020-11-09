@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
    <div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
        <livewire:sidebarseller>
        <div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
        <div class="flex flex-wrap -mx-3 overflow-hidden">
        <div class="flex flex-wrap -mx-4 overflow-hidden">

  <div class="my-4 px-4 w-full overflow-hidden">
  <a href="{{url('/seller/'.$storename.'/product/create')}}" class="bg-green-500 inline-block hover:bg-green-600 text-white ml-4 py-2 px-4 rounded-md">
                    <svg class="h-6 w-6 inline-block"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
                    <p class="inline-block align-middle">Tambah Product</p>
                
    </a>

  <div class="my-4 px-4 w-full overflow-hidden">
    <!-- Column Content -->
  </div>

  <div class="my-4 px-4 w-full overflow-hidden">
  <div class=" lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
					<div class="mb-8">
						<p class="text-sm text-gray-600 flex items-center">
							<svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
								<path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
							</svg>
							{{$product->store->name}}
						</p>
						<div class="text-gray-900 font-bold text-xl mb-2">{{$product->name}}</div>
						<div class="flex flex-wrap -mx-5 overflow-hidden">
							<div class="my-5 px-5 w-full overflow-hidden md:w-1/2 font-bold" >
								Rp.{{number_format($product->harga)}}
							</div>
							<div class="px-4 py-3 text-xs">
								@if($product->status_product == "1")
								<span
									class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
									>
								baru
								</span>
								@else
								<span
									class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
									>
								bekas
								</span>
								@endif
							</div>
							<div class="px-4 py-3 text-xs">
								@if($product->status == "1")
								<span
									class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
									>
								aktif
								</span>
								@else
								<span
									class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
									>
								tidak aktif
								</span>
								@endif
							</div>
							<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
								<strong>Stock:</strong>{{$product->stock}}
							</div>
							<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
								<strong>Kategori:</strong>{{$product->category->name}}
							</div>
							<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
								<strong>Berat:</strong>{{$product->weight}}
							</div>
							<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
								{{Str::limit($product->created_at,10,'')}}
							</div>
							<div class="my-5 px-5 w-full overflow-hidden text-left">
								{{$product->description}}
							</div>
						</div>
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
