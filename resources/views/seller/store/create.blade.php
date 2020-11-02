@extends('layouts.app')

@section('content')
    
<section class="text-gray-700 body-font container mx-auto">
    <div class="container px-5 py-24 mx-auto flex flex-wrap flex-col ">
        <div class="flex mx-auto flex-wrap mb-20 shadow-2xl">
            
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none bg-gray-100 border-indigo-500 text-indigo-500 tracking-wider" id="list1">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="7" r="4" />  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>STEP 1
            </a>
            
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list2">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />  <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />  <line x1="10" y1="9" x2="14" y2="9" />  <line x1="12" y1="7" x2="12" y2="11" />
                </svg>STEP 2
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list3">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>STEP 3
            </a>
            <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider" id="list4">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>STEP 4
            </a>
            
        </div>
        <form action="{{ route('store.seller') }}" method="post">
            @csrf
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
            <div id="myDIV1" class="">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <img class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                            {{-- <div class="font-bold text-xl mb-2">Tempat </div> --}}
                            <div class="flex flex-wrap -mx-2 overflow-hidden">

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    @error('tmp_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="font-bold text-xl mb-2">Nama Toko</div>
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Toko" value="{{ old('name') }}">
                                    
                                </div>
                            </div>
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
                                        <option value="">kecamatan</option>
                                    </select>
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Kode Pos</div>
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kode') is-invalid @enderror" name="kode" id="kode" placeholder="Kode pos" value="{{ old('kode') }}">
                                </div>
                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <div class="font-bold mb-2">Alamat lengkap</div>
                                    <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full  border shadow rounded leading-tight focus:outline-none focus:shadow-outline  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" type="text" placeholder="Alamat lengkap" value="{{ old('alamat') }}" required></textarea>
                                    <div class="mt-5" id="demo3"></div>
                                </div>
                            </div>
                        </div>
                            <p id="demo2"></p>
                            
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction3()">back</a>
                    <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" required>Simpan</button>
                </div>
            </div>
            <div id="myDIV3" class="hidden">
                <div class="flex justify-center">
                    <div class="max-w-xl rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <img class=" w-2/3 block mx-auto mb-5 mt-5 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                            
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="myFunction3()">back</a>
                    <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" required>Simpan</button>
                </div>
            </div>
            
            </div>
            </form>
        </div>
    </div>
</section>
<livewire:footer>
@endsection

@push('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
function myFunction1() {
    var option=document.getElementsByName('jenis_kelamin');

    if (!(option[0].checked || option[1].checked)) {
        document.getElementById("demo").innerHTML = "<p class='text-red-600'>Pilih Jenis kelamin</p>";
        
        return false;
    }
    else{
        var x = document.getElementById("myDIV1");
        var y = document.getElementById("myDIV2");
        var v = document.getElementById("list2"); 
        var u = document.getElementById("list1"); 
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            v.classList.remove("bg-gray-100"); 
            v.classList.remove("border-indigo-500"); 
            v.classList.remove("text-indigo-500"); 
            u.classList.add("border-indigo-500"); 
            u.classList.add("text-indigo-500"); 
            
        } else {
            v.classList.add("bg-gray-100"); 
            v.classList.add("border-indigo-500"); 
            v.classList.add("text-indigo-500"); 
            u.classList.add("border-gray-200"); 
            u.classList.remove("border-indigo-500"); 
            u.classList.remove("text-indigo-500");
            x.style.display = "none";
            y.style.display = "block";
            
        }
    }
}
function myFunction2() {
    var tmp=document.getElementById('tmp_lahir');
    var tgl=document.getElementById('tgl_lahir');
    if(tmp.value == "" && tgl.value == ""){
        document.getElementById("demo2").innerHTML = "<p class='text-red-600'>Isi data</p>";
        return false;
    }
    if(tmp.value == ""){
        document.getElementById("demo2").innerHTML = "<p class='text-red-600'>Isi tempat lahir</p>";
        return false;
    }
    if(tgl.value == ""){
        document.getElementById("demo2").innerHTML = "<p class='text-red-600'>Isi tanggal lahir</p>";
        return false;
    }
    else{
        var x = document.getElementById("myDIV2");
        var y = document.getElementById("myDIV3");
        var v = document.getElementById("list2"); 
        var j = document.getElementById("list3"); 
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            j.classList.remove("bg-gray-100"); 
            j.classList.remove("border-indigo-500"); 
            j.classList.remove("text-indigo-500"); 
            v.classList.add("border-indigo-500"); 
            v.classList.add("text-indigo-500"); 
        } else {
            x.style.display = "none";
            y.style.display = "block";
            j.classList.add("bg-gray-100"); 
            j.classList.add("border-indigo-500"); 
            j.classList.add("text-indigo-500"); 
            v.classList.remove("border-indigo-500"); 
            v.classList.remove("text-indigo-500"); 
        }
    }
}
function myFunction3() {
    var a=document.getElementById('province');
    var b=document.getElementById('city');
    var c=document.getElementById('district');
    var d=document.getElementById('kode');
    var e=document.getElementById('alamat');
    if(a.value != "" && b.value != "" && c.value != "" && d.value != "" && e.value != ""){
        var x = document.getElementById("myDIV3");
        var y = document.getElementById("myDIV4");
        var v = document.getElementById("list3"); 
        var j = document.getElementById("list4"); 
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            j.classList.remove("bg-gray-100"); 
            j.classList.remove("border-indigo-500"); 
            j.classList.remove("text-indigo-500"); 
            v.classList.add("border-indigo-500"); 
            v.classList.add("text-indigo-500"); 
        } else {
            x.style.display = "none";
            y.style.display = "block";
            j.classList.add("bg-gray-100"); 
            j.classList.add("border-indigo-500"); 
            j.classList.add("text-indigo-500"); 
            v.classList.remove("border-indigo-500"); 
            v.classList.remove("text-indigo-500"); 
        }
    }
    if (!(a.value != "" || b.value != "" || c.value != "" || d.value != "" || e.value != "")) {
        document.getElementById("demo3").innerHTML = "<p class='text-red-600'>Isi data</p>";
        
        return false;
    }
    
    
}
function myFunction4() {
    var x = document.getElementById("myDIV4");
    var y = document.getElementById("myDIV5");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script type="text/javascript">
     //Select2
    

    //Ajax Wilayah 
    jQuery(document).ready(function ()
    {
        jQuery('select[name="province"]').on('change',function(){
            var provinceID = jQuery(this).val();
            
            if(provinceID)
            {
                jQuery.ajax({
                    url : '/detailuser/getcity/' +provinceID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('select[name="city"]').empty();
                    jQuery.each(data, function(key,value){
                        $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="city"]').empty();
            }
        });
    });
    jQuery(document).ready(function ()
    {
        jQuery('select[name="city"]').on('change',function(){
            var regencyID = jQuery(this).val();
            if(regencyID)
            {
                jQuery.ajax({
                    url : '/detailuser/getdistrict/' +regencyID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('select[name="district"]').empty();
                    jQuery.each(data, function(key,value){
                        $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    }
                });
            }
            else
            {
                $('select[name="district"]').empty();
            }
        });
    });

    


</script>
@endpush