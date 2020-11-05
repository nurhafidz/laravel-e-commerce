@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
    <div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
        <livewire:sidebarseller>
        <div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
        <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Account balance
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    $ 46,760.89
                  </p>
                </div>
              </div>

        <form class="w-full max-w-lg">
      
        <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        nama rekening
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
    </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        no rekening
      </label>
      <input class="shadow appearance-none border rounded w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="no rek">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        jumlah uang
      </label>
      <input class="shadow appearance-none border rounded w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-jumlah" type="text" placeholder="Rp10,000">
    </div>
  </div>
  
              
              <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
               Tarik
              </a>
   </form>
   </div>


        </div>
    </div>
</div>


<livewire:footer>
@endsection
