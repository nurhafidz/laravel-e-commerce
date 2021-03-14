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

			<div class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden my-10">
  <div class="px-4 py-2">
    <h1 class="text-gray-900 font-bold text-3xl uppercase">NIKE AIR</h1>
    <p class="text-gray-600 text-sm mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quos quidem sequi illum facere recusandae voluptatibus</p>
  </div>
  <img class="h-56 w-full object-cover mt-2" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="NIKE AIR">
  <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
           
            <a href="#" class="cursor-pointer hover:text-green-600 text-blue-100 py-3/2 px-2 rounded-lg inline-flex items-center">
    <svg class="h-5 w-5 hover:text-green-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
</svg>
<span><b>Edit</b></span>
</a>
        <a href="#" class="cursor-pointer hover:text-blue-600 text-blue-100 py-3/2 px-2 rounded-lg inline-flex items-center">
   <svg class="h-5 w-5 hover:text-blue-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
</svg>

<span><b>Detail</b></span>
</a>
            
  </div>
</div>
               
            </div>
        </div>
    </div>
    </div>


    <livewire:footer>
        @endsection
