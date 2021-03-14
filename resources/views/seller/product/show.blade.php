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

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                    <div class="flex flex-col md:flex-row -mx-4">
                        <div class="md:flex-1 px-4">
                            <div x-data="{ image: 1 }" x-cloak>

                                <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex flex-nowrap">
                                    <div class="flex overflow-x-auto pb-10 hide-scroll-bar w-full">
                                        <div class="flex flex-nowrap">
                                            @for($b=1;$b<10;$b++)
                                                <div class="inline-block px-3 ">

                                                    <div x-show="image === {{ $b }}"
                                                        class=" md:h-80 rounded-lg bg-gray-100 mb-4 items-center justify-center  w-44 h-64 max-w-xs">
                                                        <span class="text-5xl">{{$b}}</span>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>

                                </div>

                                <div class="flex -mx-2 mb-4">
                                    <template x-for="i in 4">
                                        <div class="flex-1 px-2">
                                            <button x-on:click="image = i"
                                                :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }"
                                                class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                                <span x-text="i" class="text-2xl"></span>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex-1 px-4">
                            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                                {{ $product->name }}</h2>
                            <div class="flex items-center space-x-4 my-4">
                                <div>
                                    <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                        <span class="text-indigo-400 mr-1 mt-1">Rp</span>
                                        <span class=" text-red-500 text-3xl">{{ $product->harga }}</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-green-500 text-xl font-bold">@if ($product->status==1)
                                        Dijual
                                    @else
                                        Tidak Dijual
                                        @endif
                                      </p>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-2 overflow-hidden">

                                <div class="my-2 px-2 w-1/2 overflow-hidden">
                                    <p class="text-gray-500 text-md font-bold">Kategori:
                                        {{ $product->category->name }}</p>

                                </div>
                                <div class="my-2 px-2 w-1/2 overflow-hidden">
                                    <p class="text-gray-500 text-md font-bold">Berat Barang: {{ $product->weight }}gr
                                    </p>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 overflow-hidden">

                                <div class="my-2 px-2 w-1/2 overflow-hidden">
                                    <p class="text-gray-500 text-md font-bold">Kondisi Barang:
                                        @if($product->status_product==1)
                                        Baru
                                    @else
                                        Bekas
                                        @endif</p>
                                </div>

                                <div class="my-2 px-2 w-1/2 overflow-hidden">
                                    <p class="text-gray-500 text-md font-bold">Stok Barang: {{ $product->stock }}</p>
                                </div>
                            </div>

                            <p class="text-gray-500">{{ $product->description }}</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
    <style>
        .hide-scroll-bar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scroll-bar::-webkit-scrollbar {
            display: none;
        }

    </style>

    <livewire:footer>
        @endsection
