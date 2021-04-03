@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{asset('/css/gambarzoom.css')}}">
@endpush

@section('content')
<livewire:navbar>

<section class="bg-white py-8">
    <div class="container mx-auto">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 md:row-span-1 md:col-span-1">
                <div class=" rounded overflow-hidden shadow-lg mb-5 ">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Invoice</div>
                        {{-- <p class="text-gray-700 text-base">
                        sad
                        </p> --}}
                    </div>
                    <div class="px-6">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Id Invoice :</span>
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{$order_detail->order->invoice}}</span>
                    </div>
                    <div class="px-6">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Tanggal transaksi :</span>
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Str::limit($order_detail->created_at,10,'')}}</span>
                    </div>
                    <div class="px-6">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Alamat pengiriman :</span>
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Auth::user()->alamat_lengkap}}, {{Auth::user()->district->name}} {{Auth::user()->kode_pos}}, {{Auth::user()->district->city->name}}, {{Auth::user()->district->city->province->name}}</span>
                    </div>
                    <div class="px-6 mb-3">
                        <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Status pembayaran :</span>
                        @if ($invoice['status'] == "PENDING")
                            <span class="inline-block text-orange-600 bg-orange-200 rounded-full px-3 py-1 text-sm font-semibold  mr-2 mb-2">{{$invoice['status']}}</span>
                            <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Batas pembayaran :</span>
                    <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">{{Str::limit($invoice['expiry_date'],10,'')}} pukul : {{substr($invoice['expiry_date'], 11, -8)}}</span>
                        @endif
                        @if ($invoice['status'] == "PAID" || $invoice['status']=="SETTLED")
                            <span class="inline-block text-green-600 bg-green-200 rounded-full px-3 py-1 text-sm font-semibold  mr-2 mb-2">{{$invoice['status']}}</span>
                        @endif
                        @if ($invoice['status'] == "EXPIRED")
                            <span class="inline-block text-red-600 bg-red-200 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">{{$invoice['status']}}</span>
                        @endif
                    </div>
                    @if ($invoice['status'] == "PAID")
                    <div class="px-6 mb-3">
                            <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">Status barang :</span>
                            <span class="inline-block text-sm font-semibold text-gray-700 mr-2 mb-2">
                                @if ($order_detail->status == 1)
                                    Menunggu konfirmasi
                                @endif
                                @if ($order_detail->status == 2)
                                    Sedang di proses
                                @endif
                                @if ($order_detail->status == 3)
                                    Sedang di kirim
                                @endif
                                @if ($order_detail->status == 4)
                                    Barang sampai
                                @endif
                            </span>
                    </div>
                    @endif
                    <div class="px-6 mb-3">
                        @if ($invoice['status'] == "PENDING")
                            <a class="inline-block text-center text-sm font-semibold w-full mr-2 mb-2 bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-full" href="{{url('https://checkout-staging.xendit.co/web/'.$order_detail->order->invoice)}}">Bayar</a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-span-3 md:col-span-2 md:row-span-2">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3">
                        <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                            @php
                                $ex = count(explode('|', $order_detail->product->image));
                            @endphp
                            @if ($ex != 1)
                            @php
                                $x =explode('|', $order_detail->product->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$x[0])}}')" title="Woman holding a mug">
                            </div>
                            @else
                            <img class="hover:grow hover:shadow-lg">
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{asset('image/product/'.$order_detail->product->image)}}')" title="Woman holding a mug">
                            </div>
                            @endif
                            
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2">{{$order_detail->product->name}}</div>
                                    <div class="flex flex-wrap -mx-2 overflow-hidden">
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">harga : Rp {{number_format($order_detail->price)}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">Qty : {{$order_detail->qty}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full md:w-1/2 overflow-hidden">
                                            <p class="text-gray-700 text-base">Jumlah harga : Rp {{number_format($order_detail->qty*$order_detail->price)}}</p>
                                        </div>
                                        <div class="my-1 px-2 w-full overflow-hidden">
                                            <div class="flex flex-wrap -mx-2 overflow-hidden">
                                            <div class=" px-2 w-1/2 overflow-hidden">
                                                @if ($invoice['status'] =="PAID" || $invoice['status']=="SETTLED")
                                                    @if ($order_detail->tracking_number!=Null)
                                                    <p class="text-gray-700 text-base">No resi : {{$order_detail->tracking_number}}</p>
                                                    </div>
                                                    <div class=" px-2 w-1/2 overflow-hidden">
                                                        <p class="text-gray-700 text-base">Tipe pengiriman : {{$respon['data']['courier']['name']}}</p>
                                                    </div>
                                                    @else
                                                    <p class="text-gray-700 text-base">No resi : -</p></div>
                                                    <div class=" px-2 w-1/2 overflow-hidden">
                                                    </div>
                                                    @endif
                                                @else
                                                <p class="text-gray-700 text-base">No resi : -</p></div>
                                                <div class=" px-2 w-1/2 overflow-hidden">
                                                </div>
                                                @endif
                                            </div>
                                            @if ($order_detail->status == 3)
                                            <div class="mt-3 px-2 w-1/2 overflow-hidden">
                                                @php
                                                    
                                                    
                                                    $idorder=$order_detail->id;
                                                @endphp
                                                <form action="{{url('/myorder/detail/'.$idorder.'/changestatus')}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button class="text-green-500 hover:text-white hover:bg-green-500 border border-green-500 text-xs px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1" style="transition: all .15s ease" name="status" value="4" type="submit">
                                                        Sudah sampai
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                            @if ($order_detail->status == 4)
                                            @if ($order_detail->review_id == NULL)
                                                @include('publik.detail.ulas') 
                                            @endif
                                            
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                                {{-- <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                                    <div class="text-sm">
                                        <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                                        <p class="text-gray-600">Aug 18</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @if ($order_detail->review_id != NULL)
                        <div class="col-span-3">
                            <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                                <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                    <h2 class="text-lg text-bold">Review</h2>
                                    <p>{{$order_detail->review->review}}</p>
                                    <div class="flex flex-wrap -mx-1 overflow-hidden md:-mx-2">
                                        @php
                                            $g=explode('|',$order_detail->review->gambar);
                                            $v=explode('|',$order_detail->review->video);
                                            $o=0;
                                        @endphp
                                        <input type="hidden" id="gambar" value="{{count($g)}}">
                                        <input type="hidden" id="video" value="{{count($v)}}">
                                        <div class="my-1 px-1 w-full overflow-hidden md:my-2 md:px-2 md:w-1/2">
                                            @foreach ($g as $key=>$gambar)
                                                <img id="myImg" src="{{asset('/image/review/'.$gambar)}}" alt="Snow" style="width:100%;max-width:300px" onclick="openModal()">
                                                <div id="main-modal{{$o}}" class=" fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"style="background: rgba(0,0,0,.7);">
                                                    <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-xl mx-auto rounded z-50 overflow-y-auto">
                                                        <div class="modal-content py-4 text-left px-6">
                                                            <!--Title-->
                                                            <div class="flex justify-between items-center pb-3">
                                                                <div id="modal-close{{$o++}}" class=" cursor-pointer z-50">
                                                                    <svg class="fill-current text-black"
                                                                        xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                                            viewBox="0 0 18 18">
                                                                        <path
                                                                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <!--Body-->
                                                            <div class="my-5">
                                                                <img src="{{asset('/image/review/'.$gambar)}}" class=" max-w-xl max-h-lg" alt="{{$gambar}}">
                                                                
                                                            </div>
                                                            <!--Footer-->
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            @endforeach
                                        </div>
                                        <div class="my-1 px-1 w-full overflow-hidden md:my-2 md:px-2 md:w-1/2">
                                            <!-- Column Content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($order_detail->tracking_number != NUll)
                    
                    <div class="col-span-3">
                        <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <h2 class="text-lg text-bold">Track</h2>
                                
                                <input type="hidden" id="hitung" value="{{ $x=count($respon['data']['details']) }}">
                                <div class="flex flex-wrap -mx-2 reverse overflow-hidden" >
                                    
                                @foreach ($respon['data']['details'] as $key=>$track)
                                    <div class="my-2 px-2 w-full overflow-hidden ax" @if($key >1) id="box{{ $key }}" style="display: none;"@endif>
                                        <div class="border-b-2 border-gray-400">
                                            <p> [{{$track['city_name']}}] {{$track['shipping_date']}} {{Str::limit($track['shipping_time'],5,'')}}, 
                                            @if ($track['shipping_code'] == 1 || $track['shipping_code'] == 3)
                                                {{$track['shipping_description']}} di {{$track['city_name']}}
                                            @endif
                                            @if ($track['shipping_code'] == 2)
                                                {{$track['shipping_description']}} dari {{$track['city_name']}}
                                            @endif
                                            @if ($track['shipping_code'] == 4)
                                                {{$track['shipping_description']}} menuju alamat
                                            @endif
                                            @if ($track['shipping_code'] == 5)
                                                Paket di terima oleh {{$respon['data']['delivery_status']['pod_name']}}
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                

                                <div class="my-2 px-2 w-full overflow-hidden">
                                    <button id="tombol_hide" hidden>Hide</button>
                                    <button id="tombol_show">Show</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/create-file-list"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<style>
		.animated {
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		.animated.faster {
			-webkit-animation-duration: 500ms;
			animation-duration: 500ms;
		}

		.fadeIn {
			-webkit-animation-name: fadeIn;
			animation-name: fadeIn;
		}

		.fadeOut {
			-webkit-animation-name: fadeOut;
			animation-name: fadeOut;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@keyframes fadeOut {
			from {
				opacity: 1;
			}

			to {
				opacity: 0;
			}
		}
	</style>
<script>
    var dots = document.getElementsByClassName("ax");
        $("#tombol_hide").click(function(){
            for(j=1;j<=dots.length;j++){
                if(j >= 3){
                $("#box"+j).slideUp("slow");
                }
            }
            $("#tombol_hide").hide();
            $("#tombol_show").show();
        });
        $("#tombol_show").click(function(){
            for(j=1;j<=dots.length;j++){
                if(j >= 3){
                $("#box"+j).slideDown("slow");
                }
            }
            $("#tombol_hide").show();
            $("#tombol_show").hide();
        });
    
</script>
<script>
        $("#hide-gambar").click(function(){
            $("#gambar-riv").slideUp("slow");
            $("#hide-gambar").hide();
            $("#show-gambar").show();
        });
        $("#show-gambar").click(function(){
            $("#gambar-riv").slideDown("slow");
            $("#hide-gambar").show();
            $("#show-gambar").hide();
        });
    
</script>
<script>
function dataFileDnD() {
    return {
        files: [],
        fileDragging: null,
        fileDropping: null,
        humanFileSize(size) {
            const i = Math.floor(Math.log(size) / Math.log(1024));
            return (
                (size / Math.pow(1024, i)).toFixed(2) * 1 +
                " " +
                ["B", "kB", "MB", "GB", "TB"][i]
            );
        },
        remove(index) {
            let files = [...this.files];
            files.splice(index, 1);

            this.files = createFileList(files);
        },
        drop(e) {
            let removed, add;
            let files = [...this.files];

            removed = files.splice(this.fileDragging, 1);
            files.splice(this.fileDropping, 0, ...removed);

            this.files = createFileList(files);

            this.fileDropping = null;
            this.fileDragging = null;
        },
        dragenter(e) {
            let targetElem = e.target.closest("[draggable]");

            this.fileDropping = targetElem.getAttribute("data-index");
        },
        dragstart(e) {
            this.fileDragging = e.target
                .closest("[draggable]")
                .getAttribute("data-index");
            e.dataTransfer.effectAllowed = "move";
        },
        loadFile(file) {
            const preview = document.querySelectorAll(".preview");
            const blobUrl = URL.createObjectURL(file);

            preview.forEach(elem => {
                elem.onload = () => {
                    URL.revokeObjectURL(elem.src); // free memory
                };
            });

            return blobUrl;
        },
        addFiles(e) {
            const files = createFileList([...this.files], [...e.target.files]);
            this.files = files;
            this.form.formData.files = [...files];
        }
    };
}
</script>
<script>
    var b=$('#gambar').val();
for(g=0;g<b;g++){
    console.log(g);

    const modal = document.querySelector('#main-modal'+g);
    const closeButton = document.querySelectorAll('#modal-close'+g);

    const modalClose = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }

    const openModal = () => {
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }

    for (let i = 0; i < closeButton.length; i++) {
        const elements = closeButton[i];

        elements.onclick = (e) => modalClose();

        modal.style.display = 'none';

        window.onclick = function (event) {
            if (event.target == modal) modalClose();
        }

    }
}
</script>
<livewire:footer>
@endsection