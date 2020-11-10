@extends('layouts.app')

@section('content')
<livewire:navbar>

<section class="bg-white text-gray-700 body-font">
    {{-- <livewire:orderlist> --}}
    <div class="container px-5 py-24 mx-auto">
        <form action="{{ route('front.update_cart') }}" method="post">
        @csrf
        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
            Keranjang
        </a>
        @forelse ($carts as $key=>$row)
            
        <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
            <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-red-100 text-red-500 flex-shrink-0">
                @php
                    $ex = count(explode('|', $row['product_image']));
                @endphp
                @if ($ex != 1)
                @php
                    $x =explode('|', $row['product_image'],$ex);
                @endphp
                <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$x[0])}}">
                @else
                <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$row['product_image'])}}">
                @endif
                
            </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{$row['product_name']}}</h2>
                    <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-2 xl:-mx-2">
                        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                            <div class="flex ml-6 items-center">
                                <p class="leading-relaxed text-base">Jumlah barang :</p>
                                <div class="flex bg-transparent w-32">
                                    <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control">
                                <button onclick="var result = document.getElementById('sst{{$key}}'); var sst{{$key}} = result.value; if( !isNaN( sst{{$key}} ) &amp;&amp; sst{{$key}} > 0 ) result.value--;return false;" class=" text-gray-600 hover:text-gray-700 hover:bg-gray-100 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input type="number" class="outline-none focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="qty[]" id="sst{{$key}}" value="{{ $row['qty'] }}" title="Quantity:"></input>
                                    <button onclick="var result = document.getElementById('sst{{$key}}'); var sst{{$key}} = result.value; if( !isNaN( sst{{$key}} )) result.value++;return false;" class=" text-gray-600 hover:text-gray-700 hover:bg-gray-100 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2 ">
                            <p class="leading-relaxed text-base mt-2">Harga : Rp {{ number_format($row['product_price'] * $row['qty']) }}</p>
                        </div>
                        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                            {{-- <p class="leading-relaxed text-base">Jumlah Harga : Rp {{number_format($jmlhrg)}}</p> --}}
                        </div>
                        
                    </div>
                    {{-- <button wire:click="removeItem({{$id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">hapus </button> --}}
                    
                    @php
                        $get = $row['product_name'];
                        $b = $row['product_store_name'];
                        $slug = str_replace(' ','-',$get);
                        $storename = str_replace(' ','-',$b);
                    @endphp
                    
                    <a href="{{url('/shop/'.$storename.'/'.$slug)}}" class="mt-3 text-red-500 inline-flex items-center">Lihat barang
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                    </a>
                </div>
            </div>
            @empty
            @php
                $key=Null;
            @endphp
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                <p class="text-gray-900 title-font font-medium mb-2">Tidak ada belanjaan</p>
            </div>
            @endforelse
            @if ($key != Null)
            <button type="submit" class=" mt-5 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Update Keranjang</button>
            @endif
        </form>
        
        <div class="flex flex-wrap -mx-3 overflow-hidden sm:-mx-3 md:-mx-3 lg:-mx-3 xl:-mx-3 ">
            <div class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-3 md:px-3 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
                <h1>Jumlah Barang : {{$brgtotal}}</h1>
            </div>
            <div class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-3 md:px-3 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2 ">
                <h1>Jumlah Harga : Rp {{ number_format($subtotal) }}</h1>
            </div>
        </div>
        <hr>
        <div class="flex">
            <a href="{{url('/checkout')}}" class=" mt-5 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Checkout</a>
        </div>
        
    </div>
</section>

<livewire:footer>


@endsection