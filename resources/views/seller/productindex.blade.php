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
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Produk</h5>
                </div>
                <div class="flex items-center flex-wrap">

                    @foreach($products as $product)
                        <div class="w-1/2 md:w-1/3 lg:w-1/4 p-6 flex flex-col">
                            @php
                                $get = $product->name;
                                $b = $product->store->name;
                                $slug = str_replace(' ','-',$get);
                                $storename = str_replace(' ','-',$b);
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
