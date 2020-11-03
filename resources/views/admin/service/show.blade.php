@extends('layouts.app')

@section('content')


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <livewire:adminnav>
        <main class="h-full overflow-y-auto ">
            <div class="container grid px-6 mx-auto mb-10 mt-5">
                <!-- component -->
                <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
                    <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&w=128&h=128&q=60&facepad=2" alt="" class="h-full w-full">
                    </div>
                    <h2 class="mt-4 font-bold text-xl">{{$service->first_name}} {{$service->last_name}}</h2>
                    <h6 class="mt-2 text-sm font-medium">{{$service->role->name}}</h6>

                    <p class="text-xs text-gray-500 text-center mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab enim molestiae nulla.
                    </p>

                    <ul class="flex flex-row mt-4 space-x-2">
                        <li>
                            <a href="" class="flex items-center justify-center h-8 w-8 border rounded-full text-gray-800 border-gray-800">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center justify-center h-8 w-8 border rounded-full text-gray-800 border-gray-800">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center justify-center h-8 w-8 border rounded-full text-gray-800 border-gray-800">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
