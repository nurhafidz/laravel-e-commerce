@extends('layouts.app')

@section('content')


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <livewire:adminnav>
        <main class="h-full overflow-y-auto ">
            <div class="container grid px-6 mx-auto mb-10">
                <h2 class="my-6 lg:mt-5 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Tables services
                </h2>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Gender</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Date join</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($customer as $customers)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                @if ($customers->foto)
                                                    <img
                                                    class="object-cover w-full h-full rounded-full"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                    alt=""
                                                    loading="lazy"
                                                />
                                                @else
                                                    <div class="flex relative w-8 h-8 bg-red-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white rounded-full border border-gray-100 uppercase">{{ Str::limit($customers->first_name, 1,'') }}</div>
                                                @endif
                                                
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{$customers->first_name}}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    {{$customers->first_name}} {{$customers->last_name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($customers->jenis_kelamin == "L")
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Approved
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{Str::limit($customers->created_at,10,'')}}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit" href="{{route('admin.customer.show',$customers->id)}}">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                     <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" />
                                                </svg>
                                            </a>
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="event.preventDefault();document.getElementById('delete-user').submit();">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"
                                                    ></path>
                                                </svg>
                                            </button>
                                            <form id="delete-user" action="{{ route('admin.customer.destroy',$customers->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        
                        <span class="flex items-center col-span-3">
                            @php
                                $a=$customer->currentPage();
                                $b=$customer->Total();
                                $z=$a*10;
                                $q=$z-10;
                            @endphp
                            @if ($z > 10)
                            Showing 1-{{ $z }} of {{ $customer->Total() }}
                            @endif
                            @if ($z == 10 && $z < $b)
                                Showing {{ $q }}-{{ $z }} of {{ $customer->Total() }}
                            @endif
                            
                            @if ($z < $b)
                            Showing {{ $q }}-{{ $customer->Total() }} of {{ $customer->Total() }}
                            
                            @endif
                        </span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        {{ $customer->links('pagination.default') }}
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</div>
@endsection
