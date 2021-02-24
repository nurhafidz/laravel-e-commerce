@extends('layouts.app')

@section('content')
<div class="flex flex-col h-screen bg-gray-100">
    <!-- Auth Card Container -->
    <div class="grid place-items-center mx-2 my-20 sm:my-auto">
        <!-- component -->

        <div class="flex overflow-hidden w-11/12 sm:w-8/12 md:w-6/12 lg:w-8/12 
            
            bg-white rounded-lg shadow-md lg:shadow-lg">
            <div class="w-full p-8">

                <p class="text-xl text-gray-600 text-center mb-5">Masukkan no telepon kmu</p>
                <p>Masukkan no telepon anda yang terhubung dengan whatsapp</p>
                <form action="" method="post">
                    <div class="flex flex-wrap -mx-2 overflow-hidden">

                        <div class="my-2 px-2 w-2/12 overflow-hidden">
                            <select class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none " name="province" id="province">
                                <option value="">Provinsi</option>
                                @foreach($phone as $item)
                                <option value="">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 px-2 w-10/12 overflow-hidden">
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat lahir" value="">
                        </div>
                    </div>
                    
                </form>

                <div class="mt-8 justify-between">
                    <a href="#" class="text-xs text-red-500 uppercase mx-5">salah nomor?</a>
                    <button
                        class="bg-gray-700 text-white font-bold py-2 px-4 mx-5 rounded hover:bg-gray-600">Login</button>
                </div>
                <div class="mt-4 flex items-center justify-between">

                </div>
            </div>
        </div>
        
        
        <select name="" id="basic" data-input-name="country">
            
        </select>

        <div>


        </div>
    </div>
</div>
@endsection
