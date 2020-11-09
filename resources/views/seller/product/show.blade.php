@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
<!-- Desktop sidebar -->
<livewire:servicesnav>
<main class="h-full overflow-y-auto ">
<div class="container grid px-6 mx-auto mb-10 mt-5">
	<!-- component -->
	<div class="grid grid-cols-3 gap-4">
		
		<div class="col-span-3">
			<div class="max-w-sm w-full lg:max-w-full lg:flex shadow-lg">
				@php
				$ex = count(explode('|', $product->image));
				@endphp
				@if ($ex != 1)
				@php
				$x =explode('|', $product->image,$ex);
				@endphp
				<img class="hover:grow hover:shadow-lg">
				<div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$x[0])}}')" title="Woman holding a mug">
				</div>
				@else
				<img class="hover:grow hover:shadow-lg">
				<div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$product->image)}}')" title="Woman holding a mug">
				</div>
				@endif
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
                            <div class="my-5 px-5 w-full overflow-hidden text-left">
                            <a href="{{url('/product/editproduk',$product->id)}}"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          > 
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection