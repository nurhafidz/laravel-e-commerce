@extends('layouts.app')

@section('content')
<livewire:navbar>

    <!-- component -->
    <div x-data="{ open: false }" @click.away="open = false">
        <div class="flex">
            <div class="md:w-2/12">
                <livewire:sellerside>
            </div>


            <div class="md:w-10/12">
                <div class="flex flex-wrap -mx-3 overflow-hidden">
                    <div class=" w-full overflow-hidden">
                        <div class=" px-3 w-full overflow-hidden">
                            <div class=" max-h-56 w-full bg-cover bg-no-repeat bg-center"
                                style=" background-image: url(https://pbs.twimg.com/profile_banners/2161323234/1585151401/600x200);">
                                <img class="opacity-0 w-full h-full"
                                    src="https://pbs.twimg.com/profile_banners/2161323234/1585151401/600x200" alt="">
                            </div>
                            <div class="p-4">
                                <div class="relative flex w-full">
                                    <!-- Avatar -->
                                    <div class="flex flex-1">
                                        <div style="margin-top: -6rem;">
                                            <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                                <img style="height:9rem; width:9rem;"
                                                    class="md rounded-full relative border-4 border-gray-900"
                                                    src="https://pbs.twimg.com/profile_images/1254779846615420930/7I4kP65u_400x400.jpg"
                                                    alt="">
                                                <div class="absolute"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Follow Button -->
                                    <div class="flex flex-col text-right">
                                        <button
                                            class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded-full border bg-transparent border-red-500 text-red-500 hover:border-red-800 hover:border-red-800 flex items-center hover:shadow-lg py-2 px-4 rounded-full mr-0 ml-auto">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Edit</span>
                                        </button>
                                    </div>
                                </div>
    
                                <!-- Profile info -->
                                <div class="space-y-1 justify-center w-full mt-3 ml-3">
                                    <!-- User basic-->
                                    <div>
                                        <h2 class="text-xl leading-6 font-bold">NAMA TOKO</h2>
                                        <p class="text-sm leading-5 font-medium text-gray-600">@NAMA USER</p>
                                    </div>
                                    <!-- Description and others -->
                                    <div class="mt-3">
                                        <p class="leading-tight mb-2">MAKANAN / FASHION / ELEKTRONIK <br>Toko yang bersedia
                                            melakukan apapun <b>YOI</b> </p>
                                        <div class="text-gray-600 flex">
                                            <span class="flex mr-2"><svg class="h-5 w-5 text-gray-700" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" /></svg>
                                                <g>
                                                    <path
                                                        d="M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z">
                                                    </path>
                                                    <path
                                                        d="M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z">
                                                    </path>
                                                </g></svg> <a href="https://ricardoribeirodev.com/personal/" target="#"
                                                    class="leading-5 ml-1 text-blue-400">www.RicardoRibeiroDEV.com</a>
                                            </span>
                                            <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon">
                                                    <g>
                                                        <path
                                                            d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z">
                                                        </path>
                                                        <circle cx="7.032" cy="8.75" r="1.285"></circle>
                                                        <circle cx="7.032" cy="13.156" r="1.285"></circle>
                                                        <circle cx="16.968" cy="8.75" r="1.285"></circle>
                                                        <circle cx="16.968" cy="13.156" r="1.285"></circle>
                                                        <circle cx="12" cy="8.75" r="1.285"></circle>
                                                        <circle cx="12" cy="13.156" r="1.285"></circle>
                                                        <circle cx="7.032" cy="17.486" r="1.285"></circle>
                                                        <circle cx="12" cy="17.486" r="1.285"></circle>
                                                    </g>
                                                </svg> <span class="leading-5 ml-1">Joined December, 2019</span></span>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <hr class="border-gray-400">
                        </div>
    
    
                    </div>
    
                    <div class="my-3 px-3 w-full overflow-hidden md:w-1/2">
                        <div class="w-screen bg-white flex flex-row flex-wrap">
                            <div class="w-full md:w-5/12">
                                <div class="bg-white rounded shadow">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Grafik penghasilan</h5>
                                    </div>
                                    <div class="p-5">
                                        <canvas id="chartjs-0" class="chartjs" width="undefined"
                                            height="undefined"></canvas>
                                        <script>
                                            new Chart(document.getElementById("chartjs-0"), {
                                                "type": "line",
                                                "data": {
                                                    "labels": ["January", "February", "March", "April", ],
                                                    "datasets": [{
                                                        "label": "Views",
                                                        "data": [65, 59, 80, 81, ],
                                                        "fill": false,
                                                        "borderColor": "rgb(239, 68, 68)",
                                                        "lineTension": 0.1
                                                    }]
                                                },
                                                "options": {}
                                            });
    
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 px-3 w-full overflow-hidden md:w-1/2">
                        <div class="w-screen bg-white flex flex-row flex-wrap">
                            <div class=" w-full md:w-5/12">
                                <!--Graph Card-->
                                <div class="bg-white rounded">
                                    <div class="border-b p-3">
                                        <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                                    </div>
                                    <div class="p-1"><canvas id="chartjs-4" class="chartjs" width="200px"></canvas>
                                        <script>
                                            new Chart(document.getElementById("chartjs-4"), {
                                                "type": "doughnut",
                                                "data": {
                                                    "labels": ["fashion", "makanan", "elektronik"],
                                                    "datasets": [{
                                                        "label": "Issues",
                                                        "data": [300, 50, 100],
                                                        "backgroundColor": ["rgb(255, 99, 132)",
                                                            "rgb(54, 162, 235)", "rgb(255, 205, 86)"
                                                        ]
                                                    }]
                                                }
                                            });
    
                                        </script>
                                    </div>
                                </div>
                                <!--/Graph Card-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <livewire:footer>
        @endsection
