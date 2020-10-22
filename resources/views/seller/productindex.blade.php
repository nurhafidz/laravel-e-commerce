@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
    <div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
        
        <livewire:sidebarseller>

        <div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
            <div class="bg-white text-center flex justify-between my-4 mx-auto container  p-2  ">
                @php
                    $b=Auth::user()->store->name;
                    $storename = str_replace(' ','-',$b);
                @endphp
                <a href="{{url('/dashboard/'.$storename.'/product/create')}}" class="bg-green-500 inline-block hover:bg-green-600 text-white ml-4 py-2 px-4 rounded-md">
                    <svg class="h-6 w-6 inline-block"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
                    <p class="inline-block align-middle">Tambah Product</p>
                
                </a>
            </div>
            <div class="mx-auto flex items-center flex-wrap pt-4 pb-12">
                @foreach ($products as $product)
                <div class="w-full sm:w-1/2 md:w-1/3 p-6 flex flex-col">
                    @php
                        $get = $product->name;
                        $slug = str_replace(' ','-',$get);
                        $b = $product->store->name;
                        $storename = str_replace(' ','-',$b);
                    @endphp
                    <a href="{{url('/shop/'.$storename.'/'.$slug)}}">
                        @php
                            $ex = count(explode('|', $product->image));
                        @endphp
                        @if ($ex != 1)
                        @php
                            $x =explode('|', $product->image,$ex);
                        @endphp
                        <img class="hover:grow hover:shadow-lg" src="{{$x[0]}}">
                        @else
                        <img class="hover:grow hover:shadow-lg" src="{{$product->image}}">
                        @endif
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{$product->name}}</p>
                            
                        </div>
                        <p class="pt-1 text-gray-900">Rp {{number_format($product->harga)}}</p>
                    </a>
                </div>
                @endforeach
                <div class="w-full overflow-hidden items-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<livewire:footer>
@endsection
