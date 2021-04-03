@extends('layouts.app')

@section('content')
<livewire:navbar>

<div class="container max-w-full mx-auto px-6">
    <div class="font-sans">
    <div class=" mx-auto px-6">
        <div class="relative flex flex-wrap justify-center">
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_jhgfgv8n.json"  background="transparent"  speed="1" class="w-52 md:w-96"   loop  autoplay></lottie-player>
            <div class="w-full relative">
                <div class="mb-6">
                    <div class="  py-2 ">
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
