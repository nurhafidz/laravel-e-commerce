@extends('layouts.app')

@section('content')


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <livewire:adminnav>
        <main class="h-full overflow-y-auto">
                <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="container px-6 mx-auto grid">
                <div class="container grid px-6 mx-auto mb-10 mt-5">
                    <!-- component -->
                    <div class="my-2 px-2 md:w-1/2 overflow-hidden">
                        <p class="text-xl dark:text-gray-200">Tambah</p>
                    </div>
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-2">
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Nama depan</span>
                                    <input name="first_name" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Nama belakang</span>
                                    <input name="last_name" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Doe" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Email</span>
                                    <input name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="example@abc.com" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Password</span>
                                    <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="password" />
                                </label>
                            </div>
                        </div>
                        
                        
                        <div class="mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">
                                    Jenis kelamin
                                    </span>
                            <div class="mt-2">
                                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="accountType" value="L" /> <span class="ml-2">Laki laki</span>
                                </label>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="accountType" value="P" /> <span class="ml-2">Perempuan</span>
                                </label>
                            </div>
                        </div>
    
                        <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-2">
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Tempat lahir</span>
                                    <input name="tempat_lahir" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Bandung" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                                    <input name="tgl_lahir" type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Doe" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">No telepon</span>
                                    <input name="telepon" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="62 xxx xxx xxx" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Foto</span>
                                    <input name="foto" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Doe" />
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">Role</span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="role">
                                        <option value="">Pilih role</option>
                                        @foreach ($role as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">Status</span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="status">
                                        <option value="">Pilih status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak aktif</option>
                                    </select>
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">Provinsi</span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray select2" name="province">
                                        <option value="">Pilih provinsi</option>
                                        @foreach ($province as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">Kota / kabupaten</span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray select2" name="city" id="city">
                                        <option value="">Pilih kota / kabupaten</option>
                                    </select>
                                </label>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <label class="block mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">Kecamatan</span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray select2" name="district" id="district">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </label>
                            </div>
                            
                        </div>
                        <label class="block text-sm"> <span class="text-gray-700 dark:text-gray-400">Kode pos</span>
                            <input name="kode_pos" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="12345" />
                        </label>
                        <label class="block mt-4 text-sm"> <span class="text-gray-700 dark:text-gray-400">Alamat lengkap</span>
                            <textarea name="alamat_lengkap" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Jln merdeka no 5"></textarea>
                        </label>
                        <div class="flex mt-6 text-sm">
                            <label class="flex items-center dark:text-gray-400">
                                <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required/> <span class="ml-2">
                                        I agree to the
                                        <span class="underline">privacy policy</span>
                                </span>
                            </label>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-5 justify-items-end">
                            <div class="col-span-3">
                                <a @click="openModal" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Pemberitahuan</p>
                    <!-- Modal description -->
                    <p class="text-sm text-gray-700 dark:text-gray-400 normal-case">Apakah anda sudah memasukan data dengan benar ?
                    </p>
                </div>
                <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <a @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Tidak</a>
                    <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Ya</button>
                </footer>
            </div>
        </div>
    </form>
    </div>
</div>
<style>
    .select2-container--default .select2-selection--single {
    height: 40px !important;
    -webkit-appearance: none;
        -moz-appearance: none;
            appearance: none;
    -webkit-print-color-adjust: exact;
            color-adjust: exact;
    background-repeat: no-repeat;
    background-color: #ffffff;
    border-color: #d2d6dc;
    padding-top: 0.5rem;
    padding-right: 2.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 1px;
    
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    top: 85% !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 26px !important;
}
.select2-container--default .select2-selection--single {
    border: 1px solid #CCC !important;
    
    transition: border-color 0.15s ease-in-out 0s, 
}
</style>
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

@endsection
