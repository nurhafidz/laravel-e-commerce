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
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 flex justify-start">
                            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl uppercase">
                                {{ $product->name }}</h2>
                        </div> 
                        <div class="w-full md:w-1/2 flex justify-end">
                            @php
                                $a = Auth::user()->store->name;
                                $storename = str_replace(' ','-',$a);
                                $get = $product->name;
                                $slug = str_replace(' ','-',$get);
                            @endphp
                            <form action="{{url('/seller/'.$storename.'/product/'.$product->id.'/delete')}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit">Hapus Produk</button>
                            </form>
                            
                            
                            <a type="button" href="{{url('/seller/'.$storename.'/product/'.$slug.'/edit')}}" class="bg-green-500 h-3/4 p-1 rounded-full px-10 text-white">Edit</a>
                        </div>

                    </div>
                    <div class="flex flex-col md:flex-row ">
                        <section class="mx-auto">
                            <div class="carousel-inner shadow-2xl bg-white relative overflow-hidden w-full">
                            @php
                                $no=1;
                                $ex=count(explode('|', $product->image));
                            @endphp
                            <div class="shadow-2xl relative">
                                    <!-- large image on slides -->
                                @foreach (explode('|', $product->image) as $a=>$products)
                                <div class="mySlides hidden">
                                    <div class="w-full object-cover"
                                        style="content: url('{{asset('image/product/'.$products)}}')">
                                    </div>
                                </div>
                                @endforeach

                                <!-- butttons -->
                                <a class="absolute left-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold"
                                    onclick="plusSlides(-1)">❮</a>
                                <a class="absolute right-0 inset-y-0 flex items-center -mt-32 px-4 text-white hover:text-gray-800 cursor-pointer text-3xl font-extrabold"
                                    onclick="plusSlides(1)">❯</a>

                                <!-- image description -->


                                <!-- smaller images under description -->
                                <div class="flex">
                                    @foreach (explode('|', $product->image) as $a=>$products)
                                    <div>
                                        <img class="description h-24 opacity-50 hover:opacity-100 cursor-pointer"
                                            style="content: url('{{asset('image/product/'.$products)}}')"
                                            src="#" onclick="currentSlide({{$no}})" alt="produk{{$no++}}">
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </section>
                        <div class="md:flex-1 px-4">
                            
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
        @push('script')
            <script>
                //JS to switch slides and replace text in bar//
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("description");
                    var captionText = document.getElementById("caption");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" opacity-100", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " opacity-100";
                    captionText.innerHTML = dots[slideIndex - 1].alt;
                }

            </script>
        @endpush
