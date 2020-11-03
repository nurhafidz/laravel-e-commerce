@extends('layouts.app')

@section('content')
<livewire:navbar>

<div class="container max-w-full mx-auto px-6">
    <div class="font-sans">
    <div class="max-w-sm mx-auto px-6">
        <div class="relative flex flex-wrap">
            <div class="w-full relative">
                <div class="mb-6">
                    <div class="text-center py-2 ">
                        <svg class="h-64 w-64 text-black-500 mx-auto"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-center py-2">
                        <h1 class="text-2xl">Terima kasih ,pesanan anda akan kami proses</h1>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<livewire:footer>
@endsection
