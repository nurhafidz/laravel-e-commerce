@extends('layouts.app')

@section('content')
<livewire:navbar>

<section class="bg-white py-8">
    <div class="container mx-auto">
        <h1 class="text-3xl">Daftar belanjaan</h1>
        <!-- component -->
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8 mb-10">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg ">
                <table class="min-w-full " id="datatable">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider" style="width:5%">No</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Barang</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider" style="width:5%">Jumlah barang</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider" style="width:10%">Jumlah Harga</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider" style="width:10%">Tanggal transaksi</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider" style="width:25%">#</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $m=1;
                        @endphp
                        
                        @foreach ($order as $key=>$item)
                        <tr class="">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800">#{{$m}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{Str::limit($item->product->name,30)}}</div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$item->qty}}</td>
                            <td class="items-center px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">Rp {{number_format($item->price)}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                @php
                                $s = $getinvoice[$key]['status'];
                                $s2 = $item->status;
                                
                            @endphp

                            @if ($s == "PENDING")
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-700 dark:text-orange-100">
                                Menunggu pembayaran
                            </span>
                            @endif
                            @if ($s == "PAID" || $s=="SETTLED")
                            @switch($s2)
                                @case(1)
                                    <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                        Menunggu konfirmasi
                                    </span>
                                    @break
                                @case(2)
                                    <span class="px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:bg-teal-700 dark:text-teal-100">
                                        Sedang di proses
                                    </span>
                                    @break
                                @case(3)
                                    <span class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-full dark:bg-indigo-700 dark:text-indigo-100">
                                        Sedang dalam perjalanan
                                    </span>
                                    @break
                                @case(4)
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Telah di terima
                                    </span>
                                    @break
                                @default
                                    
                            @endswitch
                            @endif
                            @if ($s == "EXPIRED")
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Di batalkan
                            </span>
                            @endif
                            </td>
                            <td class=" px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">{{Str::limit($item->created_at,10,'')}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                @php
                                    
                                    $idorder=$item->id;
                                    $m++;
                                @endphp
                                <a class="px-2 py-1 border-blue-500 border-0 text-blue-500 rounded-full transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" href="{{url('/myorder/detail/'.$idorder)}}">View Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans mb-5">
        </div>
               
        
        
    </div>
</section>
 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
 <style>
		
		/*Overrides for Tailwind CSS */
		
		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568; 			/*text-gray-700*/
			padding-left: 0.25rem; 		/*pl-4*/
			padding-right: 0.25rem; 		/*pl-4*/
			padding-top: .1rem; 		/*pl-2*/
			padding-bottom: .1rem; 		/*pl-2*/
			line-height: 1.25; 			/*leading-tight*/
			border-width: 2px; 			/*border-2*/
			border-radius: .25rem; 		
			border-color: #c0c0c0; 		/*border-gray-200*/
			background-color: white; 	/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;	/*bg-indigo-100*/
		}
		
		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button		{
			font-weight: 700;				/*font-bold*/
			border-radius: .25rem;			/*rounded*/
			border: 1px solid transparent;	/*border border-transparent*/
		}
		
		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current	{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}
		
		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}
		
		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            margin-top: 10rem; /*bg-indigo-500*/
        }
        
		
      </style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
<script>
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable( {
            responsive: true
        } )
        .columns.adjust()
        .responsive.recalc();
} );
</script>


<livewire:footer>
@endsection