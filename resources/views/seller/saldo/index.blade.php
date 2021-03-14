@extends('layouts.app')

@section('content')
<livewire:navbar>

    <!-- component -->
    <div x-data="{ open: false }" @click.away="open = false">
        <div class="flex">
            <div class="md:w-2/12">
                <livewire:sellerside>
            </div>
            <div class="w-full md:w-10/12">


                <div class="md:p-12 bg-indigo-100 flex flex-row flex-wrap">
                    @php
                        $b = $toko->name;

                        $storename = str_replace(' ','-',$b);
                    @endphp
                    <form class="md:w-1/2-screen m-0 p-5 bg-white w-full tw-h-full shadow md:rounded-lg"
                        action="{{ url('/seller/'.$storename.'/saldo/create') }}"
                        method="POST">

                        @method('post')
                        @csrf
                        <div class="col-span-12 sm:col-span-6 md:col-span-3">
                            <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col flex-grow ml-4">
                                    <div class="text-sm text-gray-500">Saldo</div>
                                    <div class="font-bold text-lg">Rp {{ $toko->saldo }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Nominal</label>
                            <input type="n.a umber"
                                class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200"
                                placeholder="200000" name="nominal" required>
                        </div>

                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Kode bank</label>
                            <select class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200"
                                placeholder="BCA" name="kode">
                                <option></option>
                                @foreach($bank as $item)
                                    <option value="{{ $item->kode }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Alias</label>
                            <input type="text" class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200"
                                placeholder="Rojali Anwar" name="alias" required>
                        </div>

                        <div class="flex-col flex py-3">
                            <label class="pb-2 text-gray-700 font-semibold">Nomor Rekening</label>
                            <input type="number"
                                class="p-2 shadow rounded-lg bg-gray-100 outline-none focus:bg-gray-200"
                                placeholder="xxxx-xx" name="norek" required>

                            <div class="mt-2">
                                <button class="p-3 bg-indigo-400 text-white w-full hover:bg-indigo-300">Submit
                                    Form</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <livewire:footer>
        @endsection
