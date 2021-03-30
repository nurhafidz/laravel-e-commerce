@extends('layouts.app')

@section('content')
<style>
    .gambaraja{
        width: 350px; 
        height: 350px;
    }
    @media(max-width: 720px){
        .gambaraja{
            width: 280px; 
            height: 280px;
        }
    }
</style>
<section class="text-gray-700 body-font container mx-auto">
    <div class="container px-5 py-24 mx-auto flex flex-wrap flex-col ">
        <div class="flex mx-auto flex-wrap mb-20 shadow-2xl">
            
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none bg-gray-100 border-indigo-500 text-indigo-500 tracking-wider" id="list1">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="7" r="4" />  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>LANGKAH 1
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list2">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />  <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />  <line x1="10" y1="9" x2="14" y2="9" />  <line x1="12" y1="7" x2="12" y2="11" />
                </svg>LANGKAH 2
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list3">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>LANGKAH 3
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list4">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>LANGKAH 4
            </a>
            
        </div>
        <form action="{{ route('detail.update',Auth::user()->id) }}" method="post">
            @csrf
            <div id="myDIV1" >
                
                <div class="flex justify-center">
                    
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            
                            <lottie-player src="https://assets10.lottiefiles.com/datafiles/RzKl3dNS5JLA14D/data.json" class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded gambaraja" mode="bounce" background="transparent"  speed="0.8" loop  autoplay></lottie-player>
                            <div class="font-bold text-xl mb-2">Jenis Kelamin</div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-red-500">{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="flex flex-wrap -mx-1 overflow-hidden">
                                <div class="my-1 px-1 w-1/2 overflow-hidden">
                                    <label for="gender1">
                                    <input type="radio" id="gender1" value="P" name="jenis_kelamin" class="checked:bg-gray-900 checked:border-transparent">
                                    Perempuan
                                    </label>
                                </div>
                                <div class="my-1 px-1 w-1/2 overflow-hidden">
                                    <label for="gender2">
                                    <input type="radio" id="gender2" value="L" name="jenis_kelamin" class="checked:bg-gray-900 checked:border-transparent">
                                    Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div id="demo"></div>
                            
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction1()">next</a>
                </div>
            </div >
            <div id="myDIV2" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_UTtnTR.json" class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" mode="bounce" background="transparent"  speed="0.8"  style="width: 250px; height: 250px;" loop  autoplay></lottie-player>
                            {{-- <div class="font-bold text-xl mb-2">Tempat </div> --}}
                            <div class="flex flex-wrap -mx-2 overflow-hidden">

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    @error('tmp_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="font-bold text-xl mb-2">Tempat lahir</div>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tmp_lahir') is-invalid @enderror" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat lahir" value="{{ old('tmp_lahir') }}">
                                    
                                </div>

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="font-bold text-xl mb-2">Tanggal lahir</div>
                                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal lahir" value="{{ old('tgl_lahir') }}"> 
                                </div>

                            </div>
                            <p id="demo2"></p>
                            
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction1()">back</a>
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction2()">next</a>
                </div>
            </div>
            <div id="myDIV3" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <lottie-player src="https://assets9.lottiefiles.com/temp/lf20_EVDaJ0.json" class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" mode="bounce" background="transparent"  speed="0.75"  style="width: 250px; height: 250px;"  loop  autoplay></lottie-player>
                            <div class="font-bold text-xl mb-2">Alamat</div>
                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Provinsi</div>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2 js-states form-control" name="province" id="province">
                                        <option value="">Provinsi</option>
                                        @foreach ($province as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kota / Kabupaten</div>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2" name="city" id="city">
                                        <option value="">Kota / Kabupaten</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kecamatan</div>
                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2" name="district" id="district">
                                        <option value="">Kecamatan</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kode Pos</div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kode') is-invalid @enderror" name="kode" id="kode" placeholder="Kode pos" value="{{ old('kode') }}">
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Alamat lengkap</div>
                                    <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full  border shadow rounded focus:outline-none focus:shadow-outline  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" type="text" placeholder="Alamat lengkap" value="{{ old('alamat') }}" required></textarea>
                                    <div class="mt-5" id="demo3"></div>
                                </div>
                                <p>
	                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction2()">back</a>
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction3()">next</a>
                </div>
            </div>
            <div id="myDIV4" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <lottie-player id="firstLottie" src="https://assets3.lottiefiles.com/packages/lf20_ajeGMi.json" class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" mode="bounce" background="transparent"  speed="0.8"  style="width: 250px; height: 250px;" loop  autoplay></lottie-player>
                            <div class="inline-flex flex-wrap -mx-2 overflow-hidden" id="otpin">
                                <div id="tutor" class="my-2 px-2 w-full md:w-full overflow-hidden">
                                    <div class="inline-flex flex-wrap -mx-2 overflow-hidden">

                                        <div class="flex flex-col justify-center m-auto">
                                            <div class="flex md:flex-row flex-col justify-center md:text-left text-center">
                                                
                                                <div class="px-1 py-5 flex flex-col justify-center max-w-2xl rounded w-full">
                                                    <div class="text-xs uppercase font-bold">Tahap 1 </div>
                                                    <div class="md:text-lg text-base font-bold">Klik link berikut untuk mendapatkan kode otp: <a href="https://api.whatsapp.com/send/?phone=%2B14155238886&text=join+fact-proud&app_absent=0" class="text-blue-500 hover:text-blue-700" target="_blank">klik disini</a> .</div>
                                                    
                                                </div>
                                            </div>
                                            <div class="flex md:flex-row flex-col justify-center md:text-left text-center">
                                                <div class="px-1 py-5 flex flex-col justify-center max-w-2xl rounded w-full">
                                                    <div class="text-xs uppercase font-bold">Tahap 2 </div>
                                                    <div class="md:text-lg text-base font-bold">Kemudian ketikkan "join fact-proud" ke pesan di atas.</div>
                                                </div>
                                            </div>
                                            <div class="flex md:flex-row flex-col justify-center md:text-left text-center">
                                                
                                                <div class="px-1 py-5 flex flex-col justify-center max-w-2xl rounded w-full">
                                                    <div class="text-xs uppercase font-bold">Tahap 3</div>
                                                    <div class="md:text-lg text-base font-bold">Masukkan no telepon anda yang terhubung dengan whatsapp :</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2 px-2 w-full md:w-1/3 overflow-hidden">
                                            <select class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="phonecode" id="phonecode">
                                                <option value="62" selected="selected">Indonesia (+62)</option>
                                                @foreach($phone as $item)
                                                <option value="" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/NYCS-bull-trans-B.svg/480px-NYCS-bull-trans-B.svg.png">
                                                    {{$item->name}} (+{{$item->phonecode}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="my-2 px-2 w-full md:w-2/3 overflow-hidden">
                                            <input type="number" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="phonenumber" id="phonenumber" placeholder="898 xxx xxx xxx" value="" maxlength="15">
                                        </div>
                                        <div class="my-2 px-2 w-full md:w-2/3 overflow-hidden">
                                            <button type="button" id="ajaxBtn">Kirim otp</button>
                                        </div>
                                        <div class="my-2 px-2 w-full md:w-1/3 overflow-hidden">
                                            <p id="demo2"></p>
                                        </div>
                                        <div class="my-2 px-2 w-full md:w-full overflow-hidden">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="tutor2" style="display: none" class="my-2 px-2 w-full md:w-full overflow-hidden">
                                    <div id="alerter" style="display: none">
                                        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                                            <div class="flex">
                                                <div class="py-1">
                                                <svg class=" h-6 w-6 text-red-500 mr-4"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="15" y1="9" x2="9" y2="15" />  <line x1="9" y1="9" x2="15" y2="15" /></svg></div>
                                                <div>
                                                <p class="font-bold">Gagal</p>
                                                <p class="text-sm">Otp gagal atau kadaluarsa</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-xl text-gray-600 text-center mb-5">Periksa kode verifikasi kmu!</p>
                                    <div class="flex flex-wrap -mx-1 overflow-hidden font-sans" id="countdown">
                                        <div class="my-1 px-1 w-1/2 overflow-hidden flex justify-center transform transition duration-500 hover:scale-110">
                                            <div class="bg-gray-700 p-2 text-gray-100 w-24 text-center m-2 rounded-md shadow-md">
                                                <p class="minutes text-xl"></p>
                                                <p class="m-2">Minutes</p>
                                            </div>
                                        </div>
                                        <div class="my-1 px-1 w-1/2 overflow-hidden flex justify-center transform transition duration-500 hover:scale-110">
                                            <div class="bg-gray-700 p-2 text-gray-100 w-24 text-center m-2 rounded-md shadow-md">
                                                <p class="seconds text-xl"></p>
                                                <p class="m-2">Seconds</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p>buka whatsapp pada no +621xxxxxxx92 kemudian masukkan kode berikut </p>
                                    <div class="mt-4 flex items-center justify-center" id="otp" >
                                    <input
                                        class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2 "
                                        type="number" name="otp0" id="first" maxlength="1" />
                                    <input
                                        class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                        type="number" name="otp1" id="second" maxlength="1" />
                                    <input
                                        class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                        type="number" name="otp2" id="third" maxlength="1" />
                                    <input
                                        class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                        type="number" name="otp3" id="fourth" maxlength="1" />
                                    <input
                                        class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                        type="number" name="otp4" id="fifth" maxlength="1" />
                                    <input
                                        class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                        type="number" name="otp5" id="sixth" maxlength="1" />
                                    </div>
                                    <div class="mt-8 justify-between">
                                        <button type="button" id="btnotp" class="bg-gray-700 text-white font-bold py-2 px-4 mx-5 rounded hover:bg-gray-600">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="otput" style="display: none">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5" id="simpan1">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction3()">back</a>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
</section>





<livewire:footer>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="{{ asset('js/detailuser.js') }}" data-turbolinks-track="true"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#ajaxBtn').click(function(){
        var code = $( "#phonecode" ).val();
        var no = $( "#phonenumber" ).val();
        $.get('/otp/create',   // url
            { pcode:code,pno:no}, // data to be submit
            function(data, status, jqXHR) {// success callback
                    $('#demo2').append('status: ' + status);
            });
            $("#ajaxBtn").attr("disabled", "disabled");
            setTimeout(function() {
                $("#ajaxBtn").removeAttr("disabled");
            }, 10 * 60 * 1000);
            
        });
    });
</script>
<script>
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        
        return {
        'total': t,
        'minutes': minutes,
        'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
        var t = getTimeRemaining(endtime);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    $('#ajaxBtn').click(function(){
        var deadline = new Date(Date.parse(new Date()) + 10 * 60 * 1000);
        initializeClock('countdown', deadline); 
        $("#tutor").css("display","none");
        $("#tutor2").css("display","block");
        setTimeout(function() {
            $('#tutor').show()
        }, 10 * 60 * 1000);
        setTimeout(function() {
            $('#tutor2').hide()
        }, 10 * 60 * 1000);
    });
</script>
<script>
    function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keydown', function (event) {
                if (event.key === "Backspace") {
                    inputs[i].value = '';
                    if (i !== 0)
                        inputs[i - 1].focus();
                } else {
                    if (i === inputs.length - 1 && inputs[i].value !== '') {
                        return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                        inputs[i].value = event.key;
                        if (i !== inputs.length - 1)
                            inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                        inputs[i].value = String.fromCharCode(event.keyCode);
                        if (i !== inputs.length - 1)
                            inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }
    }
    OTPInput();

</script>
<script>
    $('#btnotp').click(function(){
        if ($('input[name=otp0]').val().length > 0){
            if ($('input[name=otp1]').val().length > 0){
                if ($('input[name=otp2]').val().length > 0){
                    if ($('input[name=otp3]').val().length > 0){
                        if ($('input[name=otp4]').val().length > 0){
                            if ($('input[name=otp5]').val().length > 0){
                                var a = $("input[name=otp0]").val();
                                var c = $("input[name=otp2]").val();
                                var b = $("input[name=otp1]").val();
                                var d = $("input[name=otp3]").val();
                                var e = $("input[name=otp4]").val();
                                var f = $("input[name=otp5]").val();
                                $.ajax({
                                    type: "POST",
                                    url: '/otp/check',
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    data: {a:a,b:b,c:c,d:d,e:e,f:f},
                                    dataType: "json",
                                    success: function(data) {
                                        console.log(data);
                                        if (data['status'] == 1) {
                                            $("#otput").show();
                                            $("#otput").html('<div class="my-2 px-2 w-full md:w-full overflow-hidden"><div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert"><div class="flex"><div class="py-1"><svg class=" h-6 w-6 text-teal-500 mr-4"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />  <polyline points="22 4 12 14.01 9 11.01" /></svg></div><div><p class="font-bold">Sukses</p><p class="text-sm">No Telepon sudah terhubung</p></div></div></div</div>');
                                            $("#otpin").hide();
                                            $("#simpan1").html('<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" required>Simpan</button>');
                                        } else {
                                            $('#alerter').show();
                                        }
                                    }
                                });
                            }
                        }
                    }
                }
            }
        }
    });
    
    
</script>
@endpush