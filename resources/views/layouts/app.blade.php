<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta name="turbolinks-cache-control" content="no-cache">


        <title>{{ config('app.name', 'Shopplifter') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" data-turbolinks-track="reload">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@0.9.x/dist/styled.css" rel="stylesheet" type="text/css" data-turbolinks-track="true"/>
        <link data-turbolinks-track="true" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
        
        <link data-turbolinks-track="true" rel="preconnect" href="https://fonts.gstatic.com">
        <link data-turbolinks-track="true" href='https://fonts.googleapis.com/css?family=Montserrat Subrayada' rel='stylesheet'>

        {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
        @livewireStyles
        <!-- Scripts -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Arbutus Slab' rel='stylesheet'>

        @stack('style')
        
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css"> --}}

        {{-- <script data-turbolinks-track="true" src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script> --}}
        @include('sweetalert::alert')
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        
<style>
    .nulis{
            font-family: 'Arbutus Slab';

    }
</style>
</head>
<body class="nulis antialiased">
    <div id="loading" class="fixed top-0 left-0 z-50 w-screen h-screen flex items-center justify-center bg-white">
        <div class=" bg-gray-100 shadow-md py-2 px-5 rounded-lg flex items-center flex-col ">
            <div class="loader-dots block relative w-20 h-5 mt-2">
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-red-200"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-red-300"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-red-400"></div>
            <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-red-500"></div>
            </div>
            <div class="text-gray-500 text-xs mt-2 text-center">
            Please wait...
            </div>
        </div>
    </div>
    
    <div class="page">

        @stack('head')
        @yield('content')
        
    </div>
    @livewireScripts 
    
    @stack('script')
    


    {{-- <script data-turbolinks-track="true" src="https://cdn.jsdelivr.netd4epp=/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    
    <script>
        function onReady(callback) {
            var intervalId = window.setInterval(function() {
                if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalId);
                callback.call(this);
                }
            }, 1000);
            }

        function setVisible(selector, visible) {
        document.querySelector(selector).style.display = visible ? 'block' : 'none';
        }
        onReady(function() {
        
        $('#loading').css({opacity: 1.0, visibility: "hidden"}).animate({opacity: 0}, 200);
        $('.page').css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 200);
        });
    </script>

    <script data-turbolinks-track="true"  src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <script data-turbolinks-track="true" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <link data-turbolinks-track="true" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script data-turbolinks-track="true" src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script data-turbolinks-track="true" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script data-turbolinks-track="true" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script data-turbolinks-track="true" defer src="{{asset('js/app.js')}}"></script>
    <script data-turbolinks-track="true" src="{{asset('js/init-alpine.js')}}"></script>
    <script data-turbolinks-track="true" src="{{asset('js/focus-trap.js')}}"></script>
    <script data-turbolinks-track="true" src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script data-turbolinks-track="true" defer src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script data-turbolinks-track="true" defer src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
</body>
</html>

