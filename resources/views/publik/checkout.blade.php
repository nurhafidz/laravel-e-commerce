@extends('layouts.app')

@section('content')
<livewire:navbar>

<div class="container mx-auto px-5 mb-5">
    <div class="flex flex-wrap -mx-2 overflow-hidden">
        <div class="my-2 px-2 md:w-2/3 w-full overflow-hidden">
            <div class="my-2 px-2 w-full overflow-hidden">
                <!-- Column Content -->
                <div class="mt-6">
                @forelse ($carts as $key=>$row)
                <input type="hidden" value="{{ $row['product_store'] }}" name="toko">
                
                <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                    <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-red-100 text-red-500 flex-shrink-0">
                        @php
                            $ex = count(explode('|', $row['product_image']));
                        @endphp
                        @if ($ex != 1)
                        @php
                            $x =explode('|', $row['product_image'],$ex);
                        @endphp
                        <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$x[0])}}">
                        @else
                        <img class="hover:grow hover:shadow-lg" src="{{asset('image/product/'.$row['product_image'])}}">
                        @endif
                    </div>
                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{$row['product_name']}}</h2>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">
                                
                                <p class="leading-relaxed text-base">Jumlah barang : {{$row['qty']}}</p>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2 ">
                                <p class="leading-relaxed text-base">Harga : Rp {{ number_format($row['product_price'] * $row['qty']) }}</p>
                            </div>
                            <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-2 lg:px-2 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2 ">
                                <p class="leading-relaxed text-base">Berat : {{ number_format($row['weight'] * $row['qty']) }} g</p>
                            </div>
                            
                            {{-- <button wire:click="removeItem({{$id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">hapus </button> --}}
                            <input type="hidden" name="origin_id" id="origin_id" value="{{$row['product_place']}}">
                            
                            <input type="hidden" name="district_id" id="district_id" value="{{Auth::user()->district_id}}">
                                <input type="hidden" name="weight" id="weight" value="{{ $weight }}">
                                <select class="form-select text-gray-700 mt-1 block w-full"  name="courier[]" id="courier" >
                                    <option>pilih kurir</option>
                                </select>
                        </div>
                        <span id="total">Rp {{ number_format($subtotal) }}</span>
                    </div>
                    @empty
                    @php
                        $key=Null;
                    @endphp
                    <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                        <p class="text-gray-900 title-font font-medium mb-2">Tidak ada belanjaan</p>
                    </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
        <div class="my-2 px-2 md:w-1/3 w-full overflow-hidden">
            <div class="max-w-xs rounded overflow-hidden shadow-md my-2">
                <div class="px-6 py-4 sticky top-0">
                    <div class="font-bold text-xl mb-2">Alamat tujuan</div>
                    <label class="inline-flex items-center mt-3">
                        <input type="radio" class="form-radio h-5 w-5 text-gray-600" checked><p class="ml-5 text-grey-darker text-base">
                        {{Auth::user()->alamat_lengkap}}
                        {{Auth::user()->district->name}} {{Auth::user()->kode_pos}}, 
                        {{Auth::user()->district->city->name}}, {{Auth::user()->district->city->province->name}}
                        </p>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({

        url: "{{ url('/api/cost') }}",
        type: "POST",
        data: { origin: $('#origin_id').val(), destination: $('#district_id').val(), weight: $('#weight').val() },
        success: function(html){
            console.log(html);
            $('#courier').empty()
            $('#courier').append('<option value="">Pilih Kurir</option>')
            $.each(html.data.results, function(key, item) {
                let courier = item.courier + ' - ' + item.service + ' (Rp '+ item.cost +')'
                let value = item.courier + '-' + item.service + '-'+ item.cost
                $('#courier').append('<option value="'+value+'">' + courier + '</option>')
            })
        }
    });
    
    $('#courier').on('change', function() {
        let split = $(this).val().split('-')
        $('#ongkir').text('Rp ' + split[2])

        let subtotal = "{{ $subtotal }}"
        let total = parseInt(subtotal) + parseInt(split['2'])
        $('#total').text('Rp' + total)
    })
</script>



<livewire:footer>
@endsection