<div class="bg-white p-3 shadow-xl rounded-sm mb-5">
    <form action="{{url('/profil/update')}}" method="post">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap -mx-1 overflow-hidden">
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Nama depan</div>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 mb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md  @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="Nama" value="{{Auth::user()->first_name}}">
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Nama belakang</div>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 mb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md  @error('last_name') is-invalid @enderror" name="last_name" id="last_name" placeholder="Nama" value="{{Auth::user()->last_name}}">
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Jenis Kelamin</div>
                <select name="gender" id="gender" class="bg-white shadow border rounded w-full py-2 mb-2 px-3 text-gray-700 focus:outline-none focus:shadow-md  @error('gender') is-invalid @enderror" name="gender">
                    <option value="{{Auth::user()->jenis_kelamin}}">@if (Auth::user()->jenis_kelamin == "L")
                        Laki Laki
                    @else
                        Perempuan
                    @endif</option>
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Provinsi</div>
                <select class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md mb-3 js-states form-control" name="province" id="province">
                    <option value="{{Auth::user()->district->city->province->id}}">{{Auth::user()->district->city->province->name}}</option>
                    @foreach ($province as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Kota / Kabupaten</div>
                <select class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md mb-3" name="city" id="city">
                    <option value="{{Auth::user()->district->city->id}}">{{Auth::user()->district->city->name}}</option>
                </select>
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Kecamatan</div>
                <select class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md mb-3" name="district" id="district">
                    <option value="{{Auth::user()->district->id}}">{{Auth::user()->district->name}}</option>
                </select>
            </div>
            <div class="my-1 px-1 w-full md:w-1/2 overflow-hidden">
                <div class="text-base mb-2">Kode Pos</div>
                <input type="number" class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md mb-3 @error('kode') is-invalid @enderror" name="kode" id="kode" placeholder="Kode pos" value="{{ Auth::user()->kode_pos }}">
            </div>
            <div class="my-1 px-1 w-full overflow-hidden">
                <div class="text-base mb-2">Alamat lengkap</div>
                <textarea class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-md mb-3 @error('address') is-invalid @enderror" name="address" id="address" placeholder="Alamat" >{{ Auth::user()->alamat_lengkap }}</textarea>
            </div>
            <div class="my-1 px-1 w-full overflow-hidden flex justify-end">
                <button class="p-2 bg-red-500 hover:bg-red-700 rounded-md text-white" type="submit">Simpan</button>
            </div>
        </div>
    </form>
</div>
