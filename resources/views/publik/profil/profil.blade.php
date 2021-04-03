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
                            <div x-data="{photoName: null, photoPreview: null}" class="">
                                <form action="{{url('/profil/update/image')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <input type="file" class="hidden abcde" x-ref="photo" name="photoa" x-on:change="photoName = $refs.photo.files[0].name; const reader = new FileReader();reader.onload = (e) => { photoPreview = e.target.result;};reader.readAsDataURL($refs.photo.files[0]);">
    
                                    <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                                        Profile Photo <span class="text-red-600"> </span>
                                    </label>
                                    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                                    <script>
                                        
                                        $('input[name=photoa]').change(function(e){
                                            $('#btnpho').removeClass('w-full');
                                            $('#btnpho').addClass('w-1/2');
                                            $('#divsub').show();
                                            $('#btnsub').prop("disabled", false);
                                        });
                                    </script>
                                    
                                    <div class="text-center">
                                        <!-- Current Profile Photo -->
                                        @if (Auth::user()->foto != Null)
                                        <div class="mt-2" x-show="! photoPreview">
                                            <img src="{{ asset('/image/profil/'.Auth::user()->foto) }}" class=" w-72 h-72 m-auto rounded-full shadow">
                                        </div>
                                        @else
                                        <div  x-show="! photoPreview" class="mt-2 w-72 h-72 m-auto rounded-full shadow bg-red-500 items-center text-6xl md:text-9xl text-white uppercase flex justify-center">
                                            <p>{{ Str::limit(Auth::user()->first_name, 1,'') }}</p>
                                        </div>
                                        @endif
                                        <!-- New Profile Photo Preview -->
                                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                                            <span class="block w-72 h-72 rounded-full m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                            </span>
                                        </div>
                                        <div class="flex flex-wrap">
                                            <div class="w-full" id="btnpho">
                                                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                                                    Pilih foto
                                                </button>
                                            </div>
                                            <div class="w-1/2" style="display:none" id="divsub">
                                                <button type="submit" id="btnsub" disabled class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    <!-- Photo File Input -->
                                    </div>
                                </form>
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center">{{Auth::user()->first_name}}</h1>
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
                                    <span>Bergabung sejak</span>
                                    <span class="ml-auto">{{Auth::user()->created_at->format('m/d/Y')}}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 md:mx-2">
                        <div class="grid overflow-hidden grid-cols-2 gap-2 shadow-lg mb-5">
                            <div class="box">
                                <a type="button" href="#halmana-1" class="p-3 scrollitem border-b-4 border-red-500 box flex justify-center text-black" >
                                    Profil
                                </a>
                            </div>
                                
                            <div class="box">
                                <a type="button" href="#halmana-2" class="p-3 scrollitem flex justify-center text-black" >
                                    Edit
                                </a>
                            </div>
                        </div>
                        <!-- Profile tab -->
                        <div class="overflow-hidden p-3 ">

                            <div class="slider">
                                <div id="halmana-1" class="halmana w-full mb-5">
                                    <!-- About Section -->
                                    <div class="bg-white p-3 shadow-xl rounded-sm ">
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
                                </div>
                                <div id="halmana-2" class="halmana w-full hidden">
                                    @include('publik.profil.edit') 

                                </div>
                            </div>
                        </div>
                        <!-- End of profile tab -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>


<style>
.halmana {
    float: left;
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
<script>
$(document).ready(function() {
    var slideNum = $('.halmana').length,
    wrapperWidth = 100 * slideNum,
    slideWidth = 100 / slideNum;
    $('.slider').width(wrapperWidth + '%');
    $('.halmana').width(slideWidth + '%');

    $('a.scrollitem').click(function() {
    $('a.scrollitem').removeClass('border-b-4 border-red-500');
    $(this).addClass('border-b-4 border-red-500');


    var slideNumber = $($(this).attr('href')).index('.halmana'),margin = slideNumber * -0 + '%';
    if(slideNumber == 0){
        $('#halmana-1').removeClass('hidden');
        $('#halmana-2').addClass('hidden');
    }
    if(slideNumber == 1){
        $('#halmana-1').addClass('hidden');
        $('#halmana-2').removeClass('hidden');
    }
    $('.slider').animate({
        marginLeft: margin
    }, 1000);
    return false;
    });
});
</script>
<script>
    $(document).ready(function() {
    $(".select2").select2();
});

jQuery(document).ready(function() {
    jQuery('select[name="province"]').on("change", function() {
        var provinceID = jQuery(this).val();

        if (provinceID) {
            jQuery.ajax({
                url: "/detailuser/getcity/" + provinceID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="city"]').empty();
                    jQuery.each(data, function(key, value) {
                        $('select[name="city"]').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.type +
                                " " +
                                value.name +
                                "</option>"
                        );
                    });
                }
            });
        } else {
            $('select[name="city"]').empty();
        }
    });
});
jQuery(document).ready(function() {
    jQuery('select[name="city"]').on("change", function() {
        var regencyID = jQuery(this).val();
        if (regencyID) {
            jQuery.ajax({
                url: "/detailuser/getdistrict/" + regencyID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    jQuery('select[name="district"]').empty();
                    jQuery.each(data, function(key, value) {
                        $('select[name="district"]').append(
                            '<option value="' + key + '">' + value + "</option>"
                        );
                    });
                }
            });
        } else {
            $('select[name="district"]').empty();
        }
    });
});
</script>
<livewire:footer>
@endsection