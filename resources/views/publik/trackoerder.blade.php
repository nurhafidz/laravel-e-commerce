@extends('layouts.app')

@section('content')
<livewire:navbar>

<section class="bg-white py-8">
    <div class="container mx-auto">
        
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-3">
                <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                    
                    
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <div class="text-gray-900 font-bold text-xl mb-2">{{$item->product->name}}</div>
                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                    <p class="text-gray-700 text-base">harga : Rp {{number_format($item->price)}}</p>
                                </div>
                                <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                    <p class="text-gray-700 text-base">Qty : {{$item->qty}}</p>
                                </div>
                                <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                    <p class="text-gray-700 text-base">Jumlah harga : Rp {{number_format($item->qty*$item->price)}}</p>
                                </div>
                                <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                    <p class="text-gray-700 text-base">No resi : {{$item->order->tracking_number}}</p>
                                </div>
                                
                            </div>
                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                @foreach ($respon['data']['details'] as $track)
                                    <div class="my-2 px-2 w-full overflow-hidden">
                                        <div class="border-b-2 border-gray-600">
                                            <p>[{{$track['city_name']}}] {{$track['shipping_date']}} ,{{$track['shipping_description']}} di {{$track['city_name']}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <!-- Column Content -->
                                </div>

                            </div>
                        </div>
                        {{-- <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                                <p class="text-gray-600">Aug 18</p>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
                
            
            
        </div>
    </div>
</section>


<livewire:footer>
@endsection