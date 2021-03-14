@extends('layouts.app')
@section('content')
<livewire:navbar>

<div class=" container mx-auto px-5 mb-5 overflow-hidden">
	<div class="card w-full flex flex-col mx-auto shadow-lg m-5">
		<img class="max-h-32 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/h0Vxgz5tyXA/download?force=true&w=640" alt="" />
		<div class="profile w-full flex m-14 ml-4 text-white">
			<img class="w-28 h-28 p-1 bg-white rounded-full" src="https://images.pexels.com/photos/61100/pexels-photo-61100.jpeg?crop=faces&fit=crop&h=200&w=200&auto=compress&cs=tinysrgb" alt="" />
			<div class="title mt-11 ml-3 font-bold flex flex-col">
				<div class="name break-words">{{$store->name}}</div>
				<!--  add [dark] class for bright background -->
				<div class="add font-semibold text-sm text-black pt-2">Model</div>
			</div>
		</div>
		<div class="buttons flex absolute bottom-0 font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">
			<div class="add border rounded-full border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Contact</div>
			<!-- <div class="add border rounded-r-2xl rounded-l-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Bio</div> -->
		</div>
	</div>
	<!-- card end -->
    <div class="grid overflow-hidden grid-cols-2 gap-2 shadow-lg mb-5">
        <div class="box">
            <a type="button" href="#halmana-1" class="p-3 scrollitem border-b-4 border-red-500 box flex justify-center text-black" >
                Pilihan
            </a>
        </div>
            
        <div class="box">
            <a type="button" href="#halmana-2" class="p-3 scrollitem flex justify-center text-black" >
                Produk
            </a>
        </div>
    </div>
</div>

<div class="px-5 mb-5 overflow-hidden">
    <div class="slider">
        <div id="halmana-1" class="halmana w-full">
            <div class="container mx-auto ">
                @foreach ($result as $item)
                    <div class="flex flex-col bg-white m-auto p-auto">
                        <h1 class="flex py-5 px-2 mx-5 font-bold text-xl text-gray-800 uppercase">{{$item['categori'][0]->name}}</h1>
                        <div class="flex overflow-x-auto pb-10 hide-scroll-bar">
                            <div class="flex flex-nowrap">
                                @foreach ($item['produkcat'][0] as $produk)
                                <div class="inline-block px-3">
                                        <div class=" w-44 h-64 max-w-xs">
                                        @php
                                            $get = $produk->name;
                                            $b = $produk->store->name;
                                            $slug = str_replace(' ','-',$get);
                                            $storename = str_replace(' ','-',$b);
                                        @endphp
                                        <a href="{{ url('/shop/'.$storename.'/'.$slug) }}">
                                            @php
                                                $ex = count(explode('|', $produk->image));
                                            @endphp
                                            @if($ex != 1)
                                                @php
                                                    $x =explode('|', $produk->image,$ex);
                                                @endphp
                                                <img class="hover:grow hover:shadow-lg"
                                                    src="{{ asset('image/product/'.$x[0]) }}">
                                            @else
                                                <img class="hover:grow hover:shadow-lg"
                                                    src="{{ asset('image/product/'.$produk->image) }}">
                                            @endif
                                            <div class="pt-3 flex items-center justify-between">
                                                <p class="">{{ $produk->name }}</p>
                                                <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                                </svg>
                                            </div>
                                            <p class="pt-1 text-gray-900">Rp {{ number_format($produk->harga) }}</p>
                                        </a>
                                    </div>
                                </div>
                                    @endforeach
                                </div>
                            </div>
                                        </div>
                    {{-- <div class="bg-black p-10 text-white">{{$item['categori'][0]->name}}</> --}}
                @endforeach
            </div>
        </div>
        <div id="halmana-2" class="halmana w-full hidden">
            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12 ">
                
                @forelse($product as $products)
                <div class="w-1/2 md:w-1/3 lg:w-1/6 p-6 flex flex-col">
                    @php
                        $get = $products->name;
                        $b = $products->store->name;
                        $slug = str_replace(' ','-',$get);
                        $storename = str_replace(' ','-',$b);
                    @endphp
                    <a href="{{ url('/shop/'.$storename.'/'.$slug) }}">
                        @php
                            $ex = count(explode('|', $products->image));
                        @endphp
                        @if($ex != 1)
                            @php
                                $x =explode('|', $products->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg"
                                src="{{ asset('image/product/'.$x[0]) }}">
                        @else
                            <img class="hover:grow hover:shadow-lg"
                                src="{{ asset('image/product/'.$products->image) }}">
                        @endif
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $products->name }}</p>
                            <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                            </svg>
                        </div>
                        <p class="pt-1 text-gray-900">Rp {{ number_format($products->harga) }}</p>
                    </a>
                </div>
            @empty
                tidak ada barang
            @endforelse
            </div>
            <div class="w-full overflow-hidden items-center">
                {{ $product->links() }}
            </div>
        </div>
    </div>
</div>

<livewire:footer>

<style>
.halmana {
    float: left;
}
.hide-scroll-bar::-webkit-scrollbar {
    display: visible;
    height: 5px;
}
.hide-scroll-bar::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
/* Handle */
.hide-scroll-bar::-webkit-scrollbar-thumb {
    background: #888; 
}

/* Handle on hover */
.hide-scroll-bar::-webkit-scrollbar-thumb:hover {
    background: #555; 
}

@media(max-width: 600px){
    .hide-scroll-bar::-webkit-scrollbar {
    display: none;
}
}
</style>
<script>
$(document).ready(function() {
    var slideNum = $('.halmana').length,
    wrapperWidth = 100 * slideNum,
    slideWidth = 100 / slideNum;
    $('.slider').width(wrapperWidth + '%');
    $('.halmana').width(slideWidth + '%');

    $('a.scrollitem').click(function() {
    $('a.scrollitem').removeClass('border-b-4 border-red-500');
    $(this).addClass('border-b-4 border-red-500');


    var slideNumber = $($(this).attr('href')).index('.halmana'),margin = slideNumber * -0 + '%';
    if(slideNumber == 0){
        $('#halmana-1').removeClass('hidden');
        $('#halmana-2').addClass('hidden');
    }
    if(slideNumber == 1){
        $('#halmana-1').addClass('hidden');
        $('#halmana-2').removeClass('hidden');
    }
    $('.slider').animate({
        marginLeft: margin
    }, 1000);
    return false;
    });
});
</script>
@endsection