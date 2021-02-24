<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Shopplifter') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" data-turbolinks-track="true">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@0.9.x/dist/styled.css" rel="stylesheet" type="text/css" data-turbolinks-track="true"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

        {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
        @livewireStyles
        <!-- Scripts -->
        <script data-turbolinks-track="true" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
        <script data-turbolinks-track="true" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script data-turbolinks-track="true" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
        <link data-turbolinks-track="true" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
        <script data-turbolinks-track="true" src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script data-turbolinks-track="true" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
        
        
        
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css"> --}}

        <script data-turbolinks-track="true" src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
        <script data-turbolinks-track="true" src="{{asset('js/init-alpine.js')}}"></script>
        @include('sweetalert::alert')
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        

        <style>
            
    </style>
</head>
<body class="font-sans antialiased">
    @stack('head')
    @yield('content')
    
    @livewireScripts 
    
    @stack('script')
    {{-- <script data-turbolinks-track="true" src="https://cdn.jsdelivr.netd4epp=/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <script data-turbolinks-track="true" src="{{asset('js/app.js')}}"></script>
    <script data-turbolinks-track="true" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script data-turbolinks-track="true" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
</body>
</html>
