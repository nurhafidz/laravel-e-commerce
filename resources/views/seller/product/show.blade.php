@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
<div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
	<livewire:sidebarseller>
	<div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
		<div class="flex flex-wrap -mx-3 overflow-hidden">
			<div class="flex flex-wrap -mx-4 overflow-hidden">
				<div class="my-4 px-4 w-full overflow-hidden">
                    <div class=" rounded w-full shadow-lg">
                        
                        <div class="px-6 py-4">
                            <div class="grid grid-cols-2 justify-content-between">
                                    
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
  Button
</button>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
  Button
</button>
                            </div>
                            
                        </div>
                </div>
                <div class="my-4 px-4 w-full overflow-hidden">
                    <div class="carousel lg:w-1/2 w-full lg:h-auto object-none object-center rounded">
                        <div class="carousel-inner bg-white relative overflow-hidden w-full">
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
                </div>
					
					<div class="my-4 px-4 w-full overflow-hidden">
						<div class="shadow-lg bg-white rounded p-4 flex flex-col justify-between leading-normal">
							<div class="mb-8">
								<p class="text-sm text-gray-600 flex items-center">
									
									{{$product->store->name}}
								</p>
								<div class="text-gray-900 font-bold text-xl mb-2">{{$product->name}}</div>
								<div class="flex flex-wrap -mx-5 overflow-hidden">
									<div class="my-5 px-5 w-full overflow-hidden md:w-1/2 font-bold" >
										Rp.{{number_format($product->harga)}}
									</div>
									
                                    <div class=" my-5 px-5 w-full overflow-hidden md:w-1/2">
                                        <p class=" font-bold"> Status :
										@if($product->status == "1")
										<span
											class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
											>
										aktif
										</span>
										@else
										<span
											class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
											>
										tidak aktif
										</span>
                                        @endif
                                        </p>
                                    </div>
                                    
                                    <div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
                                        <p class=" font-bold"> Kondisi barang :
										@if($product->status_product == "1")
										<span
											class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
											>
										baru
										</span>
										@else
										<span
											class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"
											>
										bekas
										</span>
										@endif
									</div>
									<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
										<strong>Stock:</strong>{{$product->stock}}
									</div>
									<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
										<strong>Kategori:</strong>{{$product->category->name}}
									</div>
									<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
										<strong>Berat:</strong>{{$product->weight}}
									</div>
									<div class="my-5 px-5 w-full overflow-hidden md:w-1/2">
										{{Str::limit($product->created_at,10,'')}}
									</div>
									<div class="my-5 px-5 w-full overflow-hidden text-left">
										{{$product->description}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<livewire:footer>
@endsection
