@extends('layouts.app')

@section('content')


<livewire:navbar>
    <section class="bg-white py-8">
        <div class="container mx-auto">
            <div class="md:flex md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 shadow-xl">
                        <div class="image overflow-hidden">
                            @if (Auth::user()->foto != Null)
                            <img class="h-auto w-full mx-auto rounded-full"
                                    src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                    alt="">
                            </div>
                            @else
                            <div class="flex justify-center relative w-64 h-64 lg:h-72 md:w-72 bg-red-500 items-center m-1 mr-2 text-6xl md:text-9xl rounded-full text-white uppercase"><p>{{ Str::limit(Auth::user()->first_name, 1,'') }}</p></div>
                            @endif
                            
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Jane Doe</h1>
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto">
                                        <span
                                            class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span>
                                    </span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Member since</span>
                                    <span class="ml-auto">Nov 07, 2016</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-xl rounded-sm">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">About</span>
                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">First Name</div>
                                        <div class="px-4 py-2">{{Auth::user()->first_name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Last Name</div>
                                        <div class="px-4 py-2">{{Auth::user()->last_name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Gender</div>
                                        <div class="px-4 py-2">@if (Auth::user()->jenis_kelamin == "L")
                                                Laki Laki
                                            @else
                                                Perempuan
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                                        <div class="px-4 py-2">{{Auth::user()->telepon}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Current Address</div>
                                        <div class="px-4 py-2">{{Auth::user()->alamat_lengkap}} </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                        <div class="px-4 py-2">{{Auth::user()->district->name}} {{Auth::user()->kode_pos}}, 
                                            {{Auth::user()->district->city->name}}, {{Auth::user()->district->city->province->name}}
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Email.</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800">{{Auth::user()->email}}</a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Birthday</div>
                                        <div class="px-4 py-2">{{Auth::user()->tempat_lahir}}, {{Auth::user()->tanggal_lahir}}</div>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                                Full Information</button>
                        </div>
                        <!-- End of about section -->
                        <div class="my-4"></div>
                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-xl rounded-sm">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">About</span>
                            </div>
                            <div class="grid overflow-hidden grid-cols-2 md:grid-cols-4 gap-2 justify-items-center">
                                <div class="box">
                                    <div class="flex flex-wrap -mx-1 overflow-hidden">
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                            <svg class="h-20 w-20 text-orange-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                aasdasdasdasdasd
                                </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="flex flex-wrap -mx-1 overflow-hidden">
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                            <svg class="h-20 w-20 text-orange-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                                                <polyline points="21 8 21 21 3 21 3 8" />
                                                <rect x="1" y="3" width="22" height="5" />
                                                <line x1="10" y1="12" x2="14" y2="12" />
                                            </svg>
                                        </div>
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                aasdasdasdasdasd
                                </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="flex flex-wrap -mx-1 overflow-hidden">
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                            <svg class="h-20 w-20 text-orange-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <circle cx="7" cy="17" r="2" />
                                                <circle cx="17" cy="17" r="2" />
                                                <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                            </svg>
                                        </div>
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                aasdasdasdasdasd
                                </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="flex flex-wrap -mx-1 overflow-hidden">
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                            <svg class="h-20 w-20 text-orange-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="8.5" cy="7" r="4" />
                                                <polyline points="17 11 19 13 23 9" />
                                            </svg>
                                        </div>
                                        <div class="my-1 px-1 w-full overflow-hidden flex justify-center">
                                            <a href="">aasdasdasdasdasd</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of profile tab -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<livewire:footer>
@endsection