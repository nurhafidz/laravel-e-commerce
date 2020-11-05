@extends('layouts.app')

@section('content')


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <livewire:servicesnav>
    <main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto mt-auto grid">
    <h2 class="my-6 lg:mt-5 text-2xl font-semibold text-gray-700 dark:text-gray-200"> {{$user->first_name}} </h2>
 
    </div>                
    </main>
    </div>
</div>
@endsection
