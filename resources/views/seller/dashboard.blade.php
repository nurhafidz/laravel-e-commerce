@extends('layouts.app')

@section('content')
<livewire:navbar>
<!-- component -->
<div x-data="{ open: false }" @click.away="open = false">
    <div class="w-full container mx-auto grid grid-cols-1 md:grid-cols-7 items-center mt-0 px-6 py-3">
        <livewire:sidebarseller>
        <div class="col-span-1 md:col-span-5 text-gray-700 px-4 py-2 m-2">
            
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<script>
var speedCanvas = document.getElementById('myChart');

var dataFirst = {
    label: "penjualan",
    data: [0, 5, 7, 20, 20, 15, 25],
    lineTension: 0,
    fill: false,
    borderColor: 'green'
};

var dataSecond = {
    label: "Car B - Speed (mph)",
    data: [20, 15, 60, 60, 65, 30, 70],
    lineTension: 0,
    fill: false,
    borderColor: 'blue'
};

var speedData = {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli"],
    datasets: [dataFirst]
};

var chartOptions = {
    legend: {
        display: true,
        position: 'top',
        labels: {
        boxWidth: 80,
        fontColor: 'black'
        }
    }
};

var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions
});
</script>

<livewire:footer>
@endsection
