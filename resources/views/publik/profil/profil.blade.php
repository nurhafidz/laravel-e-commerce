@extends('layouts.app')

@section('content')
<livewire:navbar>
    
    <section class="bg-white py-8">
        <div class="container mx-auto items-center pt-4 pb-5 p-3">
            <div class="flex items-center justify-center">
                @if (Auth::user()->foto != Null)
                <div class="flex relative w-32 h-32 bg-orange-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white"><img class="rounded-full" alt="A" src="https://randomuser.me/api/portraits/men/62.jpg">
                </div>
                @else
                <div class="flex relative w-32 h-32 bg-red-500 justify-center items-center m-1 mr-2 text-6xl rounded-full text-white uppercase"><p>{{ Str::limit(Auth::user()->first_name, 1,'') }}</p></div>
                @endif
            </div>
            <h1 class="card-header text-lg mt-2">Data diri</h1>
            <div class="flex flex-wrap -mx-2 overflow-hidden m-5 sm:-mx-2 md:-mx-2 lg:-mx-2 xl:-mx-2">

                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    Nama depan : {{Auth::user()->first_name}}
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    Nama belakang : {{Auth::user()->last_name}}
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    Jenis Kelamin :@if (Auth::user()->jenis_kelamin == "L")
                        Laki Laki
                    @else
                        Perempuan
                    @endif
                    
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    Tempat, tanggal lahir : {{Auth::user()->tempat_lahir}}, {{Auth::user()->tanggal_lahir}}
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    No Telephone : {{Auth::user()->telepon}}
                </div>
            </div>
            <h1 class="card-header text-lg mt-2">Alamat Pengiriman</h1>
            <div class="flex flex-wrap -mx-2 overflow-hidden m-5 sm:-mx-2 md:-mx-2 lg:-mx-2 xl:-mx-2">
                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                    Alamat : {{Auth::user()->alamat_lengkap}} 
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:my-2 md:px-2 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2 capitalize ">
                    Daerah pengriman : 
                    {{Auth::user()->district->name}} {{Auth::user()->kode_pos}}, 
                    {{Auth::user()->district->city->name}}, {{Auth::user()->district->city->province->name}}
                </div>
            </div>
        </div>
    </section>

<livewire:footer>
@endsection