<div class="container px-5 py-24 mx-auto">
    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
        Keranjang
    </a>
    @php
        
    @endphp
    @forelse ($cart as $key=>$products)
    @php
    if ($products != null) {
        # code...
        $l0= trim($products[0], '{"id"');
        $l1= trim($products[1], '"name"');
        $l2= trim($products[2], '"harga');
        $l3= trim($products[3], '"stock"');
        $l4= trim($products[4], '"description"');
        $l5= trim($products[5], '"image"');
        $id= trim($l0, ':"');
        $nama= trim($l1, ':"');
        $harga= trim($l2, ':"');
        $stock= trim($l3, ':"');
        $description= trim($l4, ':"');
        $image= trim($l5, ':"');
    }
    // $jmlhrg = $products[11] * floatval($harga);
    
    //  dd($products);
    @endphp
    
    <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
        <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-red-100 text-red-500 flex-shrink-0">
            @php
                $ex = count(explode('|', $image));
            @endphp
            @if ($ex != 1)
            @php
                $x =explode('|', $image,$ex);
            @endphp
            <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$x[0])}}">
            @else
            <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$product->image)}}">
            @endif
            
        </div>
        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{$nama}}</h2>
            <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-2 xl:-mx-2">
                <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    <div class="flex ml-6 items-center">
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <button data-action="decrement" wire:click="removeItem({{$id}})" class=" text-gray-600 hover:text-gray-700 hover:bg-gray-100 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input type="number" class="outline-none focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="jumlah" value="{{$products[11]}}"></input>
                                
                                <button data-action="increment" class=" text-gray-600 hover:text-gray-700 hover:bg-gray-100 h-full w-20 rounded-r cursor-pointer" wire:click="addToCart({{$id}})">
                                <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="demo" id="demo"></div>
                    <p class="leading-relaxed text-base">Jumlah barang :</p>
                </div>
                <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    <p class="leading-relaxed text-base">Harga barang : Rp {{number_format($harga)}}</p>
                </div>
                <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    {{-- <p class="leading-relaxed text-base">Jumlah Harga : Rp {{number_format($jmlhrg)}}</p> --}}
                </div>
                
            </div>
            <button wire:click="removeItem({{$id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">hapus </button>
            
            

            @php
            $get = $nama;
            $slug = str_replace('','-',$get);
            @endphp

            <a href="{{url('detail',$slug)}}" class="mt-3 text-red-500 inline-flex items-center">Lihat barang
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
            </a>
        </div>
    </div>
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
            if(value < {{$stock}}){
            value++;
            target.value = value;
            }
            if(value > {{$stock}}){
                document.getElementById("demo").innerHTML = "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative' role='alert'><span class='block sm:inline'>Maaf stock hanya {{$stock}}</span></div>";
                target.value = {{$stock}};
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
    @empty
        
    @endforelse
    <div class="flex flex-wrap -mx-3 overflow-hidden sm:-mx-3 md:-mx-3 lg:-mx-3 xl:-mx-3 ">

        <div class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-3 md:px-3 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
            <h1>Jumlah Barang :</h1>
        </div>

        <div class="my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 sm:w-1/2 md:my-3 md:px-3 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2 ">
            <h1>Jumlah Harga :</h1>
        </div>

    </div>
    <hr>
    <div class="flex">
        <a href="{{url('/checkout')}}" class=" mt-5 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Checkout</a>
    </div>
    
</div>

