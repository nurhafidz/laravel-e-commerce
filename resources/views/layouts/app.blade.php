<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}


        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css"> --}}

        <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('js/init-alpine.js')}}"></script>

        <style>
        .worksans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3, 
        #carousel-4:checked ~ .control-4, 
        #carousel-5:checked ~ .control-5, 
        #carousel-6:checked ~ .control-6, 
        #carousel-7:checked ~ .control-7, 
        #carousel-8:checked ~ .control-8, 
        #carousel-9:checked ~ .control-9, 
        #carousel-10:checked ~ .control-10 {
            display: block;
        }
        
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet,
        #carousel-4:checked ~ .control-4 ~ .carousel-indicators li:nth-child(4) .carousel-bullet,
        #carousel-5:checked ~ .control-5 ~ .carousel-indicators li:nth-child(5) .carousel-bullet,
        #carousel-6:checked ~ .control-6 ~ .carousel-indicators li:nth-child(6) .carousel-bullet,
        #carousel-7:checked ~ .control-7 ~ .carousel-indicators li:nth-child(7) .carousel-bullet,
        #carousel-8:checked ~ .control-8 ~ .carousel-indicators li:nth-child(8) .carousel-bullet,
        #carousel-9:checked ~ .control-9 ~ .carousel-indicators li:nth-child(9) .carousel-bullet,
        #carousel-10:checked ~ .control-10 ~ .carousel-indicators li:nth-child(10) .carousel-bullet{
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
        .carousel-open:checked + .carousel-item {
        position: static;
        opacity: 100;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
        .inset-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-57%, 20%);
        }
        input:checked + svg {
            display: block;
        }
    </style>
</head>
<body class="font-sans antialiased">
    @stack('head')
    

    @yield('content')

    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireScripts
    
    @stack('script')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
