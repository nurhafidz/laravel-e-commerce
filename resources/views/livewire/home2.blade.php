<div class="container mx-auto flex items-center flex-wrap pb-12">

    <nav id="store" class="w-full z-30 top-0 px-6 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                Latest Product
                
            </a>

        </div>
    </nav>

    @foreach ($products as $product)
    <div class="w-1/2 md:w-1/3 lg:w-1/4 p-6 flex flex-col">
        @php
            $get = $product->name;
            $b = $product->store->name;
            $slug = str_replace(' ','-',$get);
            $storename = str_replace(' ','-',$b);
        @endphp
        <a href="{{url('/shop/'.$storename.'/'.$slug)}}" data-turbolinks="true">
            @php
                $ex = count(explode('|', $product->image));
            @endphp
            @if ($ex != 1)
            @php
                $x =explode('|', $product->image,$ex);
            @endphp
            <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$x[0])}}">
            @else
            <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$product->image)}}">
            @endif
            <div class="pt-3 flex items-center justify-between">
                <p class="">{{$product->name}}</p>
                
            </div>
            <p class="pt-1 text-gray-900">Rp {{number_format($product->harga)}}</p>
        </a>
    </div>
    @endforeach

</div>