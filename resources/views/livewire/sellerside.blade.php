@php
    $a = Auth::user()->store->name;
    $storename = str_replace(' ','-',$a)
@endphp

<div class="bg-white border-r-2 h-full hidden md:block">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-64  bg-white">

            <nav class="mt-10">
                <a class="flex items-center py-2 px-8 {{ \Request::routeIs('dashboard.seller') ? 'bg-gray-200 text-gray-700 border-r-4 border-gray-700' : 'text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700' }} " href="{{url('/dashboard/'.$storename)}}">
                    <svg class="h-5 w-5 text-black inline-block" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="3" y1="21" x2="21" y2="21" />
                        <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                        <path d="M5 21v-10.15" />
                        <path d="M19 21v-10.15" />
                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg>

                    <span class="mx-4 font-medium">Dashboard</span>
                </a>

                <a class="flex items-center mt-5 py-2 px-8 {{ \Request::routeIs('product.index','product.create','product.show','product.edit') ? 'bg-gray-200 text-gray-700 border-r-4 border-gray-700' : 'text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700' }}" href="{{url('/seller/'.$storename.'/product')}}">
                    <svg class="h-5 w-5 text-black inline-block" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
                    </svg>

                    <span class="mx-4 font-medium">Produk</span>
                </a>

                <a class="flex items-center mt-5 py-2 px-8 {{ \Request::routeIs('seller.pesanan','seller.pesanan.show') ? 'bg-gray-200 text-gray-700 border-r-4 border-gray-700' : 'text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700' }}" href="{{url('/seller/'.$storename.'/pesanan')}}">
                    <svg class="h-5 w-5 text-black inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>

                    <span class="mx-4 font-medium">Pesanan</span>
                </a>

                <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700" href="{{url('seller/'.$storename.'/saldo')}}">
                    <svg class="h-5 w-5 text-black inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span class="mx-4 font-medium">Saldo</span>
                </a>
                <a class="flex items-center mt-5 py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700" href="{{url('seller/'.$storename.'/saldo')}}">
                    <svg class="h-5 w-5 text-black inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>

                    <span class="mx-4 font-medium">Chat</span>
                </a>
            </nav>

            
        </div>

        
    </div>
</div>
<div
    class="w-full bg-white md:bg-white px-2 text-center fixed md:static bottom-0 md:pt-8 md:top-0 md:left-0 h-16 md:h-full md:border-r-4  md:border-gray-600 block md:hidden z-30">
    <div class="md:relative mx-auto lg:float-right lg:px-6">
        <ul class="list-reset flex flex-row md:flex-col text-center md:text-left">
            <li class=" flex-1">
                <a href="{{url('/dashboard/'.$storename)}}"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline md:hover:text-red-500 ">
                    <svg class="h-8 w-8 text-gray-500 hover:text-red-500 inline-block" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="3" y1="21" x2="21" y2="21" />
                        <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                        <path d="M5 21v-10.15" />
                        <path d="M19 21v-10.15" />
                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg>
                    <span
                        class="pb-1 md:pb-0 text-xs md:block md:text-base text-gray-600 hover:text-red-500 md:text-gray-400 block">Toko</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{url('/seller/'.$storename.'/product')}}"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-red-500 ">
                    <svg class="h-8 w-8 text-gray-500 hover:text-red-500 inline-block" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
                    </svg>
                    <span
                        class="pb-1 md:pb-0 text-xs md:block md:text-base text-gray-600 md:text-gray-400 block">Produk</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{url('/seller/'.$storename.'/pesanan')}}"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-red-500  ">
                    <svg class="h-8 w-8 text-gray-500 hover:text-red-500 inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span
                        class="pb-1 md:pb-0 text-xs md:block md:text-base text-gray-600 md:text-gray-400 block">Pesanan</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{url('seller/'.$storename.'/saldo')}}"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-red-500  ">
                    <svg class="h-8 w-8 text-gray-500 hover:text-red-500 inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span
                        class="pb-1 md:pb-0 text-xs md:block md:text-base text-gray-600 md:text-gray-400 block">Saldo</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="#"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-red-500 ">
                    <svg class="h-8 w-8 text-gray-500 hover:text-red-500 inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span
                        class="pb-1 md:pb-0 text-xs md:block md:text-base text-gray-600 md:text-gray-400 block">Chat</span>
                </a>
            </li>
        </ul>
    </div>
</div>
