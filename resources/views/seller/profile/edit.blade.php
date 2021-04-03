@extends('layouts.app')

@section('content')
<livewire:navbar>

    <!-- component -->
    <div x-data="{ open: false }" @click.away="open = false">
        <div class="flex">
            <div class="md:w-2/12">
                <livewire:sellerside>

            </div>
            <div class="w-full md:w-10/12">
                <div class=" max-h-56 w-full bg-cover bg-no-repeat bg-center"
                    style=" background-image: url(https://pbs.twimg.com/profile_banners/2161323234/1585151401/600x200);">
                    <img class="opacity-0 " src="https://pbs.twimg.com/profile_banners/2161323234/1585151401/600x200"
                        alt="">
                </div>
                <div class="p-4">
                    <div class="relative flex w-full">
                        <!-- Avatar -->
                        <div class="flex flex-1">
                            <div style="margin-top: -6rem;">
                                <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                    <img style="height:9rem; width:9rem;"
                                        class="md rounded-full relative border-4 border-gray-900"
                                        src="https://pbs.twimg.com/profile_images/1254779846615420930/7I4kP65u_400x400.jpg"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid overflow-hidden grid-cols-3 gap-2 shadow-lg mb-5">
                    <div class="box">
                        <a type="button" href="#halmana-1"
                            class="p-3 scrollitem border-b-4 border-red-500 box flex justify-center text-black">
                            Basic information
                        </a>
                    </div>

                    <div class="box">
                        <a type="button" href="#halmana-2" class="p-3 scrollitem flex justify-center text-black">
                            Place information
                        </a>
                    </div>
                    <div class="box">
                        <a type="button" href="#halmana-3" class="p-3 scrollitem flex justify-center text-black">
                            Photo information
                        </a>
                    </div>
                </div>
                <div class=" overflow-hidden">

                    <div class="slider">
                        <div id="halmana-1" class="halmana w-full">
                            <div class="col-span-12  h-full pb-12 md:col-span-10">
                                <div class="px-4 pt-4">
                                    <form action="#" class="flex flex-col space-y-8">

                                        <div>
                                            <h3 class="text-2xl font-semibold">Basic Information</h3>
                                            <hr>
                                        </div>

                                        <div class="form-item">
                                            <label class="text-xl ">Full Name</label>
                                            <input type="text" value="Antonia P. Howell"
                                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200"
                                                enable>
                                        </div>

                                        <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                                            <div class="form-item w-full">
                                                <label class="text-xl ">Username</label>
                                                <input type="text" value="antonia"
                                                    class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                                    enable>
                                            </div>
                                        </div>



                                        <div class="form-item w-full">
                                            <label class="text-xl ">Description</label>
                                            <textarea cols="30" rows="10"
                                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                                enable>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem natus nobis odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet fugiat? Explicabo assumenda dignissimos quisquam perspiciatis corporis sint commodi cumque rem tempora!</textarea>
                                        </div>


                                        <div>
                                            <h3 class="text-2xl font-semibold">My Social Media</h3>
                                            <hr>
                                        </div>


                                        <div class="form-item">
                                            <label class="text-xl ">Instagram</label>
                                            <input type="text" value="https://instagram.com/"
                                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                                enable>
                                        </div>
                                        <div class="form-item">
                                            <label class="text-xl ">Facebook</label>
                                            <input type="text" value="https://facebook.com/"
                                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 "
                                                enable>
                                        </div>
                                        <div class="form-item">
                                            <label class="text-xl ">Twitter</label>
                                            <input type="text" value="https://twitter.com/"
                                                class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  "
                                                enable>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div id="halmana-2" class="halmana w-full hidden">
                            <div>
                                <h3 class="text-2xl font-semibold">Place Information</h3>
                                <hr>
                            </div>
                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Provinsi</div>
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2 js-states form-control"
                                        name="province" id="province">
                                        <option value="">Provinsi</option>
                                        @foreach($province as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kota / Kabupaten</div>
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2"
                                        name="city" id="city">
                                        <option value="">Kota / Kabupaten</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kecamatan</div>
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2"
                                        name="district" id="district">
                                        <option value="">kecamatan</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kode Pos</div>
                                    <input type="number"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kode') is-invalid @enderror"
                                        name="kode" id="kode" placeholder="Kode pos"
                                        value="{{ old('kode') }}">
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Alamat lengkap</div>
                                    <textarea
                                        class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full  border shadow rounded leading-tight focus:outline-none focus:shadow-outline  @error('alamat') is-invalid @enderror"
                                        name="alamat" id="alamat" type="text" placeholder="Alamat lengkap"
                                        value="{{ old('alamat') }}" required></textarea>
                                    <div class="mt-5" id="demo3"></div>
                                </div>
                            </div>

                        </div>
                        <div id="halmana-3" class="halmana w-full hidden">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <livewire:footer>
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

            <blade media|(max-width%3A%20600px)%7B%0D>.hide-scroll-bar::-webkit-scrollbar {
                display: none;
            }
            }

        </style>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                var slideNum = $('.halmana').length,
                    wrapperWidth = 100 * slideNum,
                    slideWidth = 100 / slideNum;
                $('.slider').width(wrapperWidth + '%');
                $('.halmana').width(slideWidth + '%');

                $('a.scrollitem').click(function () {
                    $('a.scrollitem').removeClass('border-b-4 border-red-500');
                    $(this).addClass('border-b-4 border-red-500');


                    var slideNumber = $($(this).attr('href')).index('.halmana'),
                        margin = slideNumber * -0 + '%';
                    if (slideNumber == 0) {
                        $('#halmana-1').removeClass('hidden');
                        $('#halmana-2').addClass('hidden');
                        $('#halmana-3').addClass('hidden');
                    }
                    if (slideNumber == 1) {
                        $('#halmana-1').addClass('hidden');
                        $('#halmana-2').removeClass('hidden');
                        $('#halmana-3').addClass('hidden');
                    }
                    if (slideNumber == 2) {
                        $('#halmana-1').addClass('hidden');
                        $('#halmana-2').addClass('hidden');
                        $('#halmana-3').removeClass('hidden');
                    }
                    $('.slider').animate({
                        marginLeft: margin
                    }, 1000);
                    return false;
                });
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.select2').select2();
            });

        </script>

        <script type="text/javascript">
            //Select2


            //Ajax Wilayah 
            jQuery(document).ready(function () {
                jQuery('select[name="province"]').on('change', function () {
                    var provinceID = jQuery(this).val();

                    if (provinceID) {
                        jQuery.ajax({
                            url: '/detailuser/getcity/' + provinceID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="city"]').empty();
                                jQuery.each(data, function (key, value) {
                                    $('select[name="city"]').append(
                                        '<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="city"]').empty();
                    }
                });
            });
            jQuery(document).ready(function () {
                jQuery('select[name="city"]').on('change', function () {
                    var regencyID = jQuery(this).val();
                    if (regencyID) {
                        jQuery.ajax({
                            url: '/detailuser/getdistrict/' + regencyID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                jQuery('select[name="district"]').empty();
                                jQuery.each(data, function (key, value) {
                                    $('select[name="district"]').append(
                                        '<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="district"]').empty();
                    }
                });
            });

        </script>





        @endsection
