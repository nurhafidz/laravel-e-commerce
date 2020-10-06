@extends('layouts.app')

@section('content')
<livewire:navbar>

<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <div class="container mx-auto px-5 mb-5">
        <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
        <div class="flex flex-col lg:flex-row mt-8">
            <div class="w-full  order-2">
                <div class="flex items-center">
                    <button class="flex text-sm text-blue-500 focus:outline-none"><span class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">1</span> Contacts</button>
                    <button class="flex text-sm text-gray-700 ml-8 focus:outline-none"><span class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">2</span> Shipping</button>
                    <button class="flex text-sm text-gray-500 ml-8 focus:outline-none" disabled><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">3</span> Payments</button>
                </div>
                <form class="mt-8">
                    <div>
                        <h4 class="text-sm text-gray-500 font-medium">Delivery method</h4>
                        <div class="mt-6">
                            <label class="block w-1/2">
                                <select class="form-select text-gray-700 mt-1 block w-full">
                                    <option>JNE</option>
                                    <option>SI Cepat</option>
                                    <option>go jek</option>
                                    <option>asa</option>
                                </select>
                            </label>
                            
                        </div>
                    </div>
                    <div class="mt-8">
                        <h4 class="text-sm text-gray-500 font-medium">Delivery address</h4>
                        <div class="mt-6 flex">
                            <label class="block w-3/12">
                                <select class="form-select text-gray-700 mt-1 block w-full">
                                    <option>NY</option>
                                    <option>DC</option>
                                    <option>MH</option>
                                    <option>MD</option>
                                </select>
                            </label>
                            <label class="block flex-1 ml-3">
                                <input type="text" class="form-input mt-1 block w-full text-gray-700" placeholder="Address">
                            </label>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h4 class="text-sm text-gray-500 font-medium">Date</h4>
                        <div class="mt-6 flex">
                            <label class="block flex-1">
                                <input type="date" class="form-input mt-1 block w-full text-gray-700" placeholder="Date">
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-8">
                        <button class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path></svg>
                            <span class="mx-2">Back step</span>
                        </button>
                        <button class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Payment</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>

<livewire:footer>
@endsection