@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gradient-to-r from-teal-400 to-blue-500">
	<div class="content-center w-full max-w-2xl mt-5">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('detail.update',Auth::user()->id) }}">
            @csrf
            <h1 class="card-header text-3xl">Selamat datang</h1>
            <h1 class="card-header text-md">Sebelum melanjutkan ke halaman utama lengkapi data data berikut</h1>
            <br>
            <h1 class="card-header text-md">Data Diri</h1>
            <div class="mb-4">
                
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    {{ __('Jenis Kelamin') }}
                </label>
                <div class="py-1">
                    <label for="gender1">
                        <input type="radio" id="gender1" value="P" name="jenis_kelamin" class="checked:bg-gray-900 checked:border-transparent">
                        Perempuan
                    </label>
                </div>
                <div class="py-1">
                    <label for="gender2">
                        <input type="radio" id="gender2" value="L" name="jenis_kelamin" class="checked:bg-gray-900 checked:border-transparent">
                        Laki-laki
                    </label>
                </div>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                @error('tmp_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Tempat lahir') }}
                </label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tmp_lahir') is-invalid @enderror" name="tmp_lahir" placeholder="Tempat lahir" value="{{ old('tmp_lahir') }}">
            </div>
            <div class="mb-4">
                @error('tgl_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Tanggal lahir') }}
                </label>
                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" placeholder="Tanggal lahir" value="{{ old('tgl_lahir') }}">
            </div>
            <br>
            <h1 class="card-header text-md">Alamat</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Provinsi') }}
                </label>
                <select class="shadow form-select text-gray-700 mt-1 block w-full " name="province" >
                    <option value="">Provinsi</option>
                    @foreach ($province as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Kota / Kabupaten') }}
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2" name="city" id="city">
                    <option value="">Kota / Kabupaten</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Kecamatan') }}
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline select2" name="district" id="district">
                    <option value="">kecamatan</option>
                    
                </select>
            </div>
            
            <div class="mb-4">
                @error('kode')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Kode Pos') }}
                </label>
                <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kode') is-invalid @enderror" name="kode" placeholder="Kode pos" value="{{ old('kode') }}">
            </div>
            <div class="mb-4">
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Alamat lengkap') }}
                </label>
                <textarea class="autoexpand tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full  border shadow rounded focus:outline-none focus:shadow-outline  @error('alamat') is-invalid @enderror" name="alamat" id="alamat" type="text" placeholder="Alamat lengkap" value="{{ old('alamat') }}" required></textarea>
            </div>
            
            <div class="flex items-center justify-between">
            
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Next
            </button>
            </div>
        </form>
        
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    
    
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
</div>
@endsection