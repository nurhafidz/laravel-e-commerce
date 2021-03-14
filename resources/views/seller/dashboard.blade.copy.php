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

                   
                   </div>


                        
p
                        </div>

                        <div class="my-1 px-2 w-full overflow-hidden md:w-1/2">
                            <div class="w-screen bg-white flex flex-row flex-wrap">
                    <div class=" w-full md:w-5/12">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-1">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-1"><canvas id="chartjs-4" class="chartjs" width="200px"></canvas>
                            <script>
                            new Chart(document.getElementById("chartjs-4"), {
                                "type": "doughnut",
                                "data": {
                                    "labels": ["P1", "P2", "P3"],
                                    "datasets": [{
                                        "label": "Issues",
                                        "data": [300, 50, 100],
                                        "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
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
    </div>


    <livewire:footer>
        @endsection
