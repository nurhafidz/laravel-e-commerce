<nav id="header" class="w-full z-30 top-0 py-1 border-b-2 border-black">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3 ">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li><a class="inline-block active:underline hover:text-black hover:underline py-2 px-4 {{ Request::routeIs('home.guest') ?  'underline' : ''}} " href="/" >Home</a></li>
                    <li><a class="inline-block hover:text-black hover:underline py-2 px-4 {{ Request::routeIs('shop') ?  'underline' : ''}}" href="/shop">Shop</a></li>
                    <li><a class="inline-block hover:text-black hover:underline py-2 px-4 {{ Request::routeIs('about') ?  'underline' : ''}}" href="#">About</a></li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-2">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                Si PIN
            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">
            <div x-data="{ dropdownOpen2: false }" class="relative">
            <button @click="dropdownOpen2 = !dropdownOpen2" class="relative z-10 block rounded-md bg-white focus:outline-none m-1">
                <svg class="h-5 w-5 text-black-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" >  
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />  
                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
            </button>

            <div x-show="dropdownOpen2" @click="dropdownOpen2 = false" class="fixed inset-0 h-full w-full z-10"></div>

                <div x-show="dropdownOpen2" class="absolute inset-center mt-2 w-96 bg-white rounded-md shadow-xl z-20">
                    <a href="#" class="block py-2 text-sm capitalize text-gray-700 hover:text-white">
                        <div class=" border-t border-b border-black-500 text-green-400 px-4 py-3" role="alert">
                            <p class="font-bold">Informational message</p>
                            <p class="text-sm">Some additional text to explain said message.</p>
                        </div>
                    </a>
                </div>
            </div>
            <a class="pl-3 inline-block no-underline hover:text-black mr-3" href="/keranjang">
                <svg class="inline-block fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                    
                </svg>
                
                <p class="inline-block align-middle">{{$cartTotal}}</p>
            </a>
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                    @guest
                    @if (Route::has('register'))
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <circle fill="none" cx="12" cy="7" r="3" />
                            <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                        </svg>
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        @endif
                        @else
                        <div class="relative w-10">
                            <div class="flex relative w-8 h-8 bg-red-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white rounded-full border border-gray-100 uppercase">{{ Str::limit(Auth::user()->first_name, 1,'') }}</div>
                        </div>
                    @endguest
                    
                </button>
            
            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    @guest
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                    {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        {{ __('Register') }}
                        </a>
                    @endif
                    @else
                    @php
                        $verify = Auth::user()->email_verified_at;
                    @endphp
                    @if ($verify != Null)
                        <P class="block px-4 py-2 text-sm capitalize text-gray-700">
                        {{ Auth::user()->first_name }}
                        </P>
                        <a href="/profil" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        Profil
                        </a>
                        @php
                            $a = Auth::user()->store->name;
                            $storename = str_replace(' ','-',$a)
                        @endphp
                        <a href="/dashboard/{{$storename}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        My store
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        Settings
                        </a>
                        <a  href="{{ route('logout') }}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <a  href="{{ route('logout') }}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                    @endguest
                </div>
    
            </div>
        </div>
    </div>
</nav>
