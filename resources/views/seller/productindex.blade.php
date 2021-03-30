@extends('layouts.app')

@section('content')
<livewire:navbar>

    <!-- component -->
    <div x-data="{ open: false }" @click.away="open = false">
        <div class="flex">
            <div class="md:w-2/12">
                <livewire:sellerside>
            </div>
            @php
                $b = Auth::user()->store->name;
                $storename = str_replace(' ','-',$b);
            @endphp
            <div class="w-full md:w-10/12">
                <div class="border-b p-1">
                    <div class="flex flex-wrap overflow-hidden p-5">
                        <div class="w-1/2 flex justify-start">
                            <h5 class="font-bold text-2xl uppercase text-gray-600">Produk</h5>
                        </div>
                        <div class="w-1/2 flex justify-end">
                            <a class="p-2 text-white px-4 w-auto h-10 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{url('/seller/'.$storename.'/product/create')}}">
                                <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block mr-1">
                                    <path fill="#FFFFFF" d="M17.19,4.155c-1.672-1.534-4.383-1.534-6.055,0L10,5.197L8.864,4.155c-1.672-1.534-4.382-1.534-6.054,0 c-1.881,1.727-1.881,4.52,0,6.246L10,17l7.19-6.599C19.07,8.675,19.07,5.881,17.19,4.155z"/>
                                </svg>
                                <span>Extended</span>
                            </a>
                        </div>

                    </div>
                </div>
        
                <div class="flex items-center flex-wrap">

                    @foreach($products as $product)
                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-6 flex flex-col">
                            @php
                                $get = $product->name;
                                $slug = str_replace(' ','-',$get);
                            @endphp
                            <a href="{{ url('/seller/'.$storename.'/product/'.$slug) }}"
                                data-turbolinks="true">
                                @php
                                    $ex = count(explode('|', $product->image));
                                @endphp
                                @if($ex != 1)
                                    @php
                                        $x =explode('|', $product->image,$ex);
                                    @endphp
                                    <img class="hover:grow hover:shadow-lg"
                                        src="{{ asset('image/product/'.$x[0]) }}">
                                @else
                                    <img class="hover:grow hover:shadow-lg"
                                        src="{{ asset('image/product/'.$product->image) }}">
                                @endif
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">{{ $product->name }}</p>
                                </div>
                                <p class="pt-1 text-gray-900">Rp {{ number_format($product->harga) }}</p>

                            </a>
                        </div>
                    @endforeach
                    <div class="w-full overflow-hidden items-center m-5">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <livewire:footer>
        @endsection
