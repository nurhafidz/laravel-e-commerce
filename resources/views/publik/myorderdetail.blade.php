@extends('layouts.app')

@section('content')
<livewire:navbar>
<style>


.rating {
  display: flex;
  width: 100%;
  justify-content: center;
  overflow: hidden;
  flex-direction: row-reverse;
  height: 150px;
  position: relative;
}

.rating-0 {
  filter: grayscale(100%);
}

.rating > input {
  display: none;
}

.rating > label {
  cursor: pointer;
  width: 40px;
  height: 40px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}

.rating > input:checked ~ label,
.rating > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.rating > input:not(:checked) ~ label:hover,
.rating > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}

.emoji-wrapper {
  width: 100%;
  text-align: center;
  height: 100px;
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
}

.emoji-wrapper:before,
.emoji-wrapper:after{
  content: "";
  height: 15px;
  width: 100%;
  position: absolute;
  left: 0;
  z-index: 1;
}

.emoji-wrapper:before {
  top: 0;
  background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji-wrapper:after{
  bottom: 0;
  background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: .3s;
}

.emoji > svg {
  margin: 15px 0; 
  width: 70px;
  height: 70px;
  flex-shrink: 0;
}

#rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
#rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
#rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
#rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
#rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }

.feedback {
  max-width: 360px;
  background-color: #fff;
  width: 100%;
  padding: 30px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  box-shadow: 0 4px 30px rgba(0,0,0,.05);
}

}
</style>
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
                                                    $data=Auth::user()->id;
                                                    
                                                    $idorder=$order_detail->id;
                                                @endphp
                                                <form action="{{url('/myorder/'.\Crypt::encrypt($data).'/detail/'.$idorder.'/changestatus')}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button class="text-green-500 hover:text-white hover:bg-green-500 border border-green-500 text-xs px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1" style="transition: all .15s ease" name="status" value="4" type="submit">
                                                        Sudah sampai
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                            @if ($order_detail->status == 4)
                                            <div class="mt-3 px-2 w-1/2 overflow-hidden">
                                                <button class="flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded main_btn"  @click="openModal" type="button" >Ulas barang</button>
                                            </div>
                                            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                                <!-- Modal -->
                                                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl md:mb-0" role="dialog" id="modal">
                                                    <form action="{{url('/storereview/'.Crypt::encryptString(Auth::user()->id))}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')
                                                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                                    <header class="flex justify-end">
                                                        <a class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                            </svg>
                                                        </a>
                                                    </header>
                                                    
                                                    <!-- Modal body -->
                                                    <div class="mt-4 mb-6">
                                                        <!-- Modal title -->
                                                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Review</p>
                                                        <div class="rating">
                                                            <input type="radio" name="rating" id="rating-5">
                                                                <label for="rating-5"></label>
                                                            <input type="radio" name="rating" id="rating-4">
                                                                <label for="rating-4"></label>
                                                            <input type="radio" name="rating" id="rating-3" required>
                                                                <label for="rating-3"></label>
                                                            <input type="radio" name="rating" id="rating-2">
                                                                <label for="rating-2"></label>
                                                            <input type="radio" name="rating" id="rating-1">
                                                                <label for="rating-1"></label>
                                                            <div class="emoji-wrapper">
                                                                <div class="emoji">
                                                                    <svg class="rating-0"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                        <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                                                        <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                                                        <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                                        <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                                        <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                                                        <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                                        <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                                        <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                                                    </svg>
                                                                    <svg class="rating-1"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                        <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                                                        <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                                                        <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                                                        <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                                                        <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                                                        <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                                                        <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                                                        <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                                                        <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                                                    </svg>
                                                                    <svg class="rating-2"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                        <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                                                        <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                                                        <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                                                        <g fill="#fff">
                                                                            <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                                            <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                                                        </g>
                                                                        <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                                                        <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                                                    </svg>
                                                                    <svg class="rating-3"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                        <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                        <g fill="#fff">
                                                                            <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                                                            <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                                                        </g>
                                                                        <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                                        <g fill="#fff">
                                                                            <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                                                            <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                                                        </g>
                                                                        <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                                        <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                                                    </svg>
                                                                    <svg class="rating-4"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                                        <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                                        <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                                                        <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                                        <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                                        <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                                                        <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                                        <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                                                        <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                                                    </svg>
                                                                    <svg class="rating-5"
                                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                        <g fill="#ffd93b">
                                                                            <circle cx="256" cy="256" r="256"/>
                                                                            <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                                                        </g>
                                                                        <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                                                        <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                                                        <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                                                        <g fill="#38c0dc">
                                                                            <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                                                        </g>
                                                                        <g fill="#d23f77">
                                                                            <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                                                        </g>
                                                                        <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                                                        <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                                                        <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            @error('rating')
                                                                <div class="alert alert-danger">disini</div>
                                                            @enderror
                                                            
                                                        </div>
                                                    
                                                        <p class="text-sm text-gray-700 dark:text-gray-400 normal-case"></p>
                                                        <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray " rows="3" placeholder="Barang sampai dengan aman sentosa" name="reviewtext" required value="{{ old('reviewtext')}}"></textarea>
                                                        @error('reviewtext')
                                                            <div class="alert alert-danger">disiniiii</div>
                                                        @enderror
                                                        
                                                        <div class="flex items-center justify-end mt-2">
                                                            <div class="flex items-center">
                                                                <button type="button" id="hide-gambar" class="text-blue-500 hover:text-blue-700" style="display: none;">Batalkan</button>
                                                                <button type="button" id="show-gambar" class="text-blue-500 hover:text-blue-700">Tambah gambar</button>
                                                            </div>
                                                        </div>
                                                        <div class="bg-white p7 rounded w-full mt-2 mx-auto flex" id="gambar-riv" style="display: none;">
                                                            <div x-data="dataFileDnD()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded w-1/2">
                                                                <div x-ref="dnd" class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                                                    <input accept="*" name="gambarrev[]" type="file" multiple
                                                                    class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                                                    @change="addFiles($event)"
                                                                    @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                                                    @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                                    @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                                    title="" />
                                                                    <div class="flex flex-col items-center justify-center py-10 text-center">
                                                                        <svg class="w-6 h-6 mr-1 text-current-50"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                        <p class="m-0">Drag your photo here or click in this area.</p>
                                                                    </div>
                                                                </div>
                                                                <template x-if="files.length > 0">
                                                                    <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                                                                    @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                                                        <template x-for="(_, index) in Array.from({ length: files.length })">
                                                                            <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                                            style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
                                                                            :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">
                                                                                <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                                                                                    <svg class="w-4 h-4 text-gray-700"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                    </svg>
                                                                                </button>
                                                                                <template x-if="files[index].type.includes('audio/')">
                                                                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                                                    </svg>
                                                                                </template>
                                                                                <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                                    </svg>
                                                                                </template>
                                                                                <template x-if="files[index].type.includes('image/')">
                                                                                    <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                                                    x-bind:src="loadFile(files[index])" />
                                                                                </template>
                                                                                <template x-if="files[index].type.includes('video/')">
                                                                                    <video
                                                                                    class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                                                        <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                                                                        </video>
                                                                                    </template>
                                                                                    <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                                                        <span class="w-full font-bold text-gray-900 truncate"
                                                                                    x-text="files[index].name">Loading</span>
                                                                                        <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
                                                                                    </div>
                                                                                    <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)"
                                                                                @dragleave="fileDropping = null"
                                                                                :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}"></div>
                                                                                </div>
                                                                            </template>
                                                                        </div>
                                                                    </template>
                                                                </div>
                                                            
                                                            @error('gambarrev')
                                                                <div class="alert alert-danger">disini</div>
                                                            @enderror
                                                            <div x-data="dataFileDnD()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded w-1/2">
                                                                <div x-ref="dnd" class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                                                    <input accept="*" name="videorev[]" type="file" multiple
                                                                    class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                                                    @change="addFiles($event)"
                                                                    @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                                                    @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                                    @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                                    title="" />
                                                                    <div class="flex flex-col items-center justify-center py-10 text-center">
                                                                        <svg class="w-6 h-6 mr-1 text-current-50"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                        </svg>
                                                                        <p class="m-0">Drag your video here or click in this area.</p>
                                                                    </div>
                                                                </div>
                                                                <template x-if="files.length > 0">
                                                                    <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                                                                    @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                                                        <template x-for="(_, index) in Array.from({ length: files.length })">
                                                                            <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                                            style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
                                                                            :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">
                                                                                <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                                                                                    <svg class="w-4 h-4 text-gray-700"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                    </svg>
                                                                                </button>
                                                                                <template x-if="files[index].type.includes('audio/')">
                                                                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                                                    </svg>
                                                                                </template>
                                                                                <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                                                    <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                                    </svg>
                                                                                </template>
                                                                                <template x-if="files[index].type.includes('image/')">
                                                                                    <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                                                    x-bind:src="loadFile(files[index])" />
                                                                                </template>
                                                                                <template x-if="files[index].type.includes('video/')">
                                                                                    <video
                                                                                    class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                                                        <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                                                                        </video>
                                                                                    </template>
                                                                                    <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                                                        <span class="w-full font-bold text-gray-900 truncate"
                                                                                    x-text="files[index].name">Loading</span>
                                                                                        <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
                                                                                    </div>
                                                                                    <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)"
                                                                                @dragleave="fileDropping = null"
                                                                                :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}"></div>
                                                                                </div>
                                                                            </template>
                                                                        </div>
                                                                    </template>
                                                                </div>
                                                            
                                                            @error('videorev')
                                                                <div class="alert alert-danger">disini</div>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                    <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                                        <button type="button" @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:w-auto sm:px-4 sm:py-2 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Batal</button>
                                                        
                                                            <button type="submit" data-turbolinks="true" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Ya</button>
                                                        
                                                    </footer>
                                                    </form>
                                                </div>
                                            </div>
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
                    @if ($order_detail->tracking_number != NUll)
                    
                    <div class="col-span-3">
                        <div class="rounded overflow-hidden shadow-lg mb-5 w-full lg:max-w-full lg:flex">
                            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <h2 class="text-lg">Track</h2>
                                
                                <input type="hidden" id="hitung" value="{{ $x=count($respon['data']['details']) }}">
                                <div class="flex flex-wrap -mx-2 overflow-hidden" >
                                @foreach ($respon['data']['details'] as $key=>$track)
                                    <div class="my-2 px-2 w-full overflow-hidden" @if($key >1)id="box{{ $key }}" style="display: none;"@endif>
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
                                    <button id="tombol_hide"hidden>Hide</button>
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
<script>
    $(document).ready(function() {
    
    var x = $("#hitung").val();
        $("#tombol_hide").click(function() {
            for(i=0;i<x;i++){
                $("#box"+i).slideUp("slow");
            }
            $("#tombol_hide").hide();
            $("#tombol_show").show();
        })
    
        $("#tombol_show").click(function() {
            for(i=0;i<x;i++){
                $("#box"+i).slideDown("slow");
            }
            $("#tombol_hide").show();
            $("#tombol_show").hide();
        })
    
    });
</script>
<script>
    $(document).ready(function(){
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
<livewire:footer>
@endsection