@extends('layouts.app')
@section('content')
<livewire:navbar>

<section class="text-gray-700 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <div class="carousel lg:w-1/2 w-full lg:h-auto object-none object-center rounded">
                <div class="carousel-inner shadow-2xl bg-white relative overflow-hidden w-full">
                    @php
                        $no=1;
                        $ex=count(explode('|', $product->image));
                    @endphp
                    @foreach (explode('|', $product->image) as $a=>$products)
                    
                    @if ($no == 1)
                        <input class="carousel-open" type="radio" id="carousel-{{$no}}" name="carousel" aria-hidden="true" hidden="" checked="checked">
                    @else
                        <input class="carousel-open" type="radio" id="carousel-{{$no}}" name="carousel" aria-hidden="true" hidden="">
                    @endif
                <img alt="ecommerce" class="carousel-item absolute opacity-0 h-fill w-full" src="{{asset('image/product/'.$products)}}">
                    @if ($ex != 1)
                        @if ($no == 1)
                        <label for="carousel-{{$ex}}" class="prev control-{{$no}} w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-{{$no+1}}" class="next control-{{$no}} w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> 
                        @endif
                        @if ($no != 1 && $no != $ex)
                        <label for="carousel-{{$no-1}}" class="prev control-{{$no}} w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-{{$no+1}}" class="next control-{{$no}} w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> 
                        @endif
                        @if ($no == $ex)
                        <label for="carousel-{{$no-1}}" class="prev control-{{$no}} w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                        <label for="carousel-1" class="next control-{{$no}} w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> 
                        @endif
                        <?php $no++ ?>
                    @endif
                    @endforeach
                    
                    <!-- Add additional indicators for each slide-->
                    <ol class="carousel-indicators">
                    @if ($ex != 1)
                    @for ($i = 1; $i <= $ex; $i++)
                        <li class="inline-block mr-3">
                            <label for="carousel-{{$i}}" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                        </li>
                    @endfor
                    @endif
                    </ol>
                    
                </div>
            </div>
        
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <a href="{{url('/detail-toko/'.str_replace(' ', '-', $product->store->name))}}" class="text-sm title-font text-gray-500 hover:text-gray-700 tracking-widest">{{$product->store->name}}</a>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
            <div class="flex mb-4">
            <span class="flex items-center">
                @for($i=1;$i<=$hasil[2];$i++)
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                @endfor
                @for ($i=1;$i<=5-($hasil[2]);$i++)
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                </svg>
                @endfor
                <span class="text-gray-600 ml-3">{{$hasil[0]}} Reviews</span>
            </span>
            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
                </a>
                <a class="ml-2 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
                </a>
                <a class="ml-2 text-gray-500" href="{{url('/inbox/'.$product->store->user_id)}}">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
                </a>
            </span>
            </div>
            <div class="">
                <div class="flex flex-wrap -mx-2 overflow-hidden border-b-2 md:border-b-0 mb-5 md:mb-0">
                    <div class="my-2 px-2 w-1/2 overflow-hidden">
                        <p class="leading-relaxed ">Kategori : {{$product->category->name}}</p>
                    </div>
                    <div class="my-2 px-2 w-1/2 overflow-hidden">
                        <p class="leading-relaxed">Stock : {{$product->stock}}</p>
                    </div>
                    <div class="my-2 px-2 w-1/2 overflow-hidden">
                        <p class="leading-relaxed">Kodisi barang : @if ($product->status_product == 1)Baru @else Bekas @endif</p>
                    </div>
                    <div class="my-2 px-2 w-1/2 overflow-hidden">
                        <p class="leading-relaxed">Berat barang : {{$product->weight}} gr</p>
                    </div>
                </div>
                <div class="md:invisible visible">
                    <p class="md:hidden block">{{$product->description}}</p>
                </div>
                
            </div>
            <form action="{{ url('/tambakekeranjang') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                    <div class="flex ml-6 items-center">
                        <div class="custom-number-input h-10 w-32">
                            <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control">
                            <input type="hidden" id="prod" value="{{ $product->stock }}" class="form-control">
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;" class=" text-gray-600 hover:text-gray-700 hover:bg-gray-100 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="number" class=" focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="qty"  id="sst" value="1" title="Quantity:"></input>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )&amp;&amp; sst < {{ $product->stock }}) result.value++;return false;" class=" text-gray-600 hover:text-gray-700 hover:bg-gray-100 h-full w-20 rounded-r cursor-pointer">
                                <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="demo" id="demo"></div>
                </div>
                <div class="flex">
                <span class="title-font font-medium text-2xl text-gray-900">Rp {{ number_format($product->harga)}}</span>
                
                <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded main_btn"  @click="openModal" type="button" id="btnk" >Tambah ke <br> Keranjang</button>
                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                <!-- Modal -->
                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl md:mb-0" role="dialog" id="modal">
                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                    <header class="flex justify-end">
                        <a class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </header>
                    <!-- Modal body -->
                    <div class="mt-4 mb-6">
                        <!-- Modal title -->
                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Catatan untuk penjual</p>
                        <!-- Modal description -->
                        <p class="text-sm text-gray-700 dark:text-gray-400 normal-case"></p>
                        <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray " rows="3" placeholder="Ukuran XL" name="note"></textarea>
                    </div>
                    <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button type="button" @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:w-auto sm:px-4 sm:py-2 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Batal</button>
                        
                            <button type="submit" data-turbolinks="true" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Ya</button>
                        
                    </footer>
                </div>
            </div>

            </form>
            <a class="rounded-full w-10 h-10 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                <svg class="h-6 w-6 fill-current text-red-500 hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                    <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                </svg>
            </a>
        </div>
        @if (session('success'))
        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 mt-3">
            <span class="text-xl inline-block mr-5 align-middle">
                <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

            </span>
            <span class="inline-block align-middle mr-8">
                {{ session('success') }}
            </span>
            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                <span>×</span>

            </button>
        </div>
        
        <script>
        function closeAlert(event){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
        </script>
        @endif
        
    </div>
    <div class="invisible md:visible">
        <div class="mt-0 md:mt-5 lg:mt-10">
            <p class="hidden md:block">{{$product->description}}</p>
        </div>
    </div>
    <div class="w-full mt-5 bg-white p-4 border-t-2 border-black">
        <div class="pl-2">
            REVIEW
        </div>
        <!-- component -->
        @forelse ($review as $key=>$reviews)
        <div class= flex items-start">
            <div class="flex-shrink-0 ">
                <div class="inline-block relative">
                    <div class="relative w-16 h-16 rounded-full overflow-hidden">
                        <img class="absolute top-0 left-0 w-full h-full bg-cover object-fit object-cover" src="https://picsum.photos/id/646/200/200" alt="Profile picture">
                            <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner"></div>
                        </div>
                    </div>
                </div>
                <div class="ml-6 w-full">
                    <p class="flex items-baseline">
                        <span class="text-gray-600 font-bold">{{$reviews->user->last_name}}</span>
                    </p>
                    <div class="flex items-center mt-1">
                        
                        <span class="flex items-center">
                            @for($i=1;$i<=$reviews->score;$i++)
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            @endfor
                            @for ($i=1;$i<=5-($reviews->score);$i++)
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            @endfor
                        </span>
                        
                    </div>
                    
                    <div class="mt-3">
                        @if (strlen($reviews->review) <= 300)
                            <p class="mt-1" id="rwcs1{{$key}}">{{ $reviews->review }}</p>
                        @else
                            <p class="mt-1" id="rwcs1{{$key}}">{{ Str::limit($reviews->review,300) }} <a class="text-blue-500 hover:text-blue-800" id="btn1{{$key}}">baca selanjutnya ...</a></p>
                            <p class="mt-1" id="rwcs2{{$key}}" style="display: none;" >{{$reviews->review}} <a class="text-blue-500 hover:text-blue-800" id="btn2{{$key}}">baca lebih sedikit</a></p>
                        @endif
                    </div>
                    
                    <div class="flex items-center justify-end mt-4 text-sm text-gray-600 fill-current">
                        <div class="flex items-center">
                            <button id="btnb1{{$key}}" type="button" class="text-blue-500 hover:text-blue-800">Balas Review</button>
                            <button id="btnb2{{$key}}" style="display: none;" type="button" class="text-blue-500 hover:text-blue-800">Batal</button>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6" id="brw1{{$key}}" style="display: none;">
                        <p>Balas review</p>
                        <div class="relative w-full appearance-none label-floating">
                            <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                id="message" type="text" placeholder="Message..."></textarea>
                                <label for="message" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">Message...
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            Tidak ada Review
            @endforelse
        </div>
            
        <div class="border-black border-t-2 container px-5 py-2 mx-auto">
            <h1 class="text-lg">Rekomendasi</h1>
            <div class="flex overflow-x-auto pb-10 hide-scroll-bar py-10">
                <div class="flex flex-nowrap">
                    @foreach ($produk as $produk)
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
                                    
                                </div>
                                <p class="pt-1 text-gray-900">Rp {{ number_format($produk->harga) }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


</section>

<style>


    /* FLOATING LABEL */
    .label-floating input:not(:placeholder-shown),
    .label-floating textarea:not(:placeholder-shown) {
        padding-top: 1.4rem;
    }
    .label-floating input:not(:placeholder-shown) ~ label,
    .label-floating textarea:not(:placeholder-shown) ~ label {
        font-size: 0.8rem;
        transition: all 0.2s ease-in-out;
        color: #1f9d55;
        opacity: 1;
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

<livewire:footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $('#btnk').on('click',function(){
        var c = $('#sst').val();
        var b = $('#prod').val();
        if (c > b) {
            $('#sst').val(b);
        }
    });
</script>
<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value > 0){
        value--;
        target.value = value;
        }
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if(value < {{$product->stock}}){
        value++;
        target.value = value;
        }
        if(value > {{$product->stock}}){
            document.getElementById("demo").innerHTML = "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative' role='alert'><span class='block sm:inline'>Maaf stock hanya {{$product->stock}}</span></div>";
            target.value = {{$product->stock}};
        }
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>

<script> 
  
// Access the array elements 
var passedArray =  <?php echo json_encode($review); ?>; 
    // Display the array elements 
    for (let i = 0; i < passedArray.length; ++i) {
    $(document).ready(function(){
        $("#btn1"+i).click(function(){
            $("#rwcs1"+i).hide();
            $("#rwcs2"+i).show();
        });
        $("#btn2"+i).click(function(){
            $("#rwcs1"+i).show();
            $("#rwcs2"+i).hide();
        });
    });
    $(document).ready(function(){
        $("#btnb1"+i).click(function(){
            $("#brw1"+i).slideDown();
            $("#btnb2"+i).show();
            $("#btnb1"+i).hide();
        });
        $("#btnb2"+i).click(function(){
            $("#brw1"+i).slideUp();
            $("#btnb2"+i).hide();
            $("#btnb1"+i).show();
        });
    });
    }

</script> 
@endsection