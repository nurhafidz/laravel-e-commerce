@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <livewire:adminnav>
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto ">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Banner
            </h2>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                
                
            </div>
            </div>
        </main>
    </div>
</div>
@endsection
