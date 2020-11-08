@extends('layouts.app')

@section('content')


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <livewire:servicesnav>
    <main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto mt-auto grid">
    <div class="col-span-3 lg:col-span-2">
    <div class="col-span-3 lg:col-span-1">
			<div class="flex flex-wrap -mx-2 overflow-hidden bg-white p-2 shadow rounded-lg dark:divide-gray-700 dark:bg-gray-800">
				<div class="my-2 px-2 md:w-1/2 overflow-hidden">
					<p class="text-xl dark:text-gray-200">Detail service</p>
				</div>
				<div class="my-2 px-2 md:w-1/2 overflow-hidden grid justify-items-end">
					<div class="grid grid-cols-2 gap-1">
						<div class="col-span-1">
							<button @click="openModal" class="flex items-center justify-between px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" id="change status">
								<svg class="h-5 w-5 text-white-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
								</svg>
							</button>
						</div>
						<div class="col-span-1">
						</div>
					</div>
				</div>
			</div>
		</div>

                        <div class="flex flex-col bg-white p-4 shadow rounded-lg dark:divide-gray-700 dark:bg-gray-800">
                            <div class="flex flex-col items-center">
                                <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&w=128&h=128&q=60&facepad=2" alt="" class="h-full w-full">
                                </div>
                                <h2 class="mt-4 font-bold text-xl dark:text-gray-200">{{$user->first_name}} {{$user->last_name}}</h2>
                                <h6 class="mt-2 text-sm font-medium dark:text-gray-200">{{$user->role->name}}</h6>
                            </div>
                            <div class="flex mt-3 flex-wrap -mx-1 overflow-hidden sm:-mx-2">

                                <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                    <p class="text-gray-500 dark:text-gray-200"><strong>Email : </strong>{{$user->email}}</p>
                                </div>

                                <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                    <p class="text-gray-500 dark:text-gray-200"><strong>Status : </strong>@if ($user->status == 1)
                                        <span class="px-3 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="px-3 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            Tidak aktif
                                        </span>
                                    @endif
                                    </p>
                                </div>

                                <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                    <p class="text-gray-500 dark:text-gray-200"> <strong>Jenis kelamin :</strong> 
                                    @if ($user->jenis_kelamin == "L")
                                    Laki laki
                                    @else
                                    Perempuan
                                    @endif
                                    </p>
                                </div>

                                <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                    <p class="text-gray-500 dark:text-gray-200"><strong>Tempat, tanggal lahir : </strong>{{$user->tempat_lahir}}, {{$user->tanggal_lahir}}</p>
                                </div>
                                <div class="my-1 px-1 w-full overflow-hidden sm:my-2 sm:px-2 sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                    <p class="text-gray-500 dark:text-gray-200"><strong>No telepon : </strong>{{$user->telepon}}</p>
                                </div>
                                <div class="my-1 px-1 w-full overflow-hidden ">
                                    <p class="text-gray-500 dark:text-gray-200"><strong>Alamat :</strong></p>
                                    <p class="text-gray-500 dark:text-gray-200">{{$user->alamat_lengkap}}, {{$user->district->name}}, {{$user->district->city->name}},  {{$user->district->city->province->name}} {{$user->kode_pos}}</p>
                                </div>

                            </div>
                            
                            
                        </div>
                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
	<!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Pemberitahuan</p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400 normal-case">Apakah anda yakin akan @if ($user->status == 0)
                    mengaktifkan @else menonaktifkan @endif {{$user->name}} ini ?
                </p>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <a @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">Tidak</a>
                <form action="{{url('/services/pengguna/'.$user->id.'/editstatus')}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Ya</button>
                </form>
            </footer>
        </div>
    </div>
                    </div>
 
    </div>                
    </main>
    </div>
    
</div>
@endsection
