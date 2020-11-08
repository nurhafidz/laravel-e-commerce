@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
<!-- Desktop sidebar -->
<livewire:servicesnav>
<main class="h-full overflow-y-auto ">
<div class="container grid px-6 mx-auto mb-10 mt-5">
	<!-- component -->
	<div class="grid grid-cols-3 gap-4">
		<div class="col-span-3 lg:col-span-1">
			<div class="flex flex-wrap -mx-2 overflow-hidden bg-white p-2 shadow rounded-lg dark:divide-gray-700 dark:bg-gray-800">
				<div class="my-2 px-2 md:w-1/2 overflow-hidden">
					<p class="text-xl dark:text-gray-200">Detail service</p>
				</div>
				<div class="my-2 px-2 md:w-1/2 overflow-hidden grid justify-items-end">
					<div class="grid grid-cols-2 gap-1">
						<div class="col-span-1">
							<button @click="openModal" class="flex items-center justify-between px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="change status">
								<svg class="h-5 w-5 text-white-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
								</svg>
							</button>
						</div>
						<div class="col-span-1">
						</div>
					</div>
				</div>
			</div>
		</div>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
	<!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Pemberitahuan</p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400 normal-case">Apakah anda yakin akan @if ($product->status == 0)
                    mengaktifkan @else menonaktifkan @endif {{$product->name}} ini ?
                </p>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <a @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Tidak</a>
                <form action="{{url('/services/produk/'.$product->id.'/editstatus')}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Ya</button>
                </form>
            </footer>
        </div>
    </div>
</div>
@endsection