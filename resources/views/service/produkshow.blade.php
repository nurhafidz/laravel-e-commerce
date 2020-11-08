@extends('layouts.app')
@section('content')
<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
	<!-- Desktop sidebar -->
	<livewire:servicesnav>
	<main class="h-full overflow-y-auto ">
	<div class="container grid px-6 mx-auto mb-10 mt-5">
		<!-- component -->
		<div class="grid grid-cols-3 gap-4">
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
			<div class="col-span-3">
            	<div class="max-w-sm w-full lg:max-w-full lg:flex">
					<div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
					</div>
					<div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
						<div class="mb-8">
						<p class="text-sm text-gray-600 flex items-center">
							<svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
							<path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
							</svg>
							Members only
						</p>
						<div class="text-gray-900 font-bold text-xl mb-2">Can coffee make you a better developer?</div>
						<p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
						</div>
						<div class="flex items-center">
						<img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
						<div class="text-sm">
							<p class="text-gray-900 leading-none">Jonathan Reinink</p>
							<p class="text-gray-600">Aug 18</p>
						</div>
						</div>
					</div>
					</div>
		</div>
	</div>
</div>
@endsection