@extends('layouts.app')

@section('content')
<livewire:navbar>

    <section class="bg-white py-8">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                </div>
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">


                    <div class="my-1 px-1 w-full overflow-hidden">
                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                            href="#">
                            Product
                        </a>
                    </div>

                    <div class="my-1 px-1 w-full  overflow-hidden">

                        <div class="flex justify-end" id="store-nav-content">
                            
                            @php
                                $get2 = explode('/',url()->full());
                                
                            @endphp
                            <form id="myForm" action="{{url('/c/'.$get2[4].'/'.$get2[5])}}" method="GET">
                                
                                <Select onChange=selectChange(this.value) class="block bg-white w-full bg-grey-lighter border-b border-grey-lighter text-grey-darker p-2 rounded" name="sortir">
                                    @if( request()->get('sortir') )
                                        <script>console.log('hello')</script>
                                        <option value="{{request()->get('sortir')}}">
                                        @if ($_GET['sortir']!=NULL)
                                            {{$_GET['sortir']}}
                                        @else
                                            Suitable
                                        @endif</option>
                                    @endif
                                    <option value="Suitable">Suitable</option> 
                                    <option value="expensive">expensive</option> 
                                    <option value="Cheapest">Cheapest</option>                   
                                </select>
                            </form>
                        </div>
                    </div>


                </div>
            </nav>
            @forelse($product as $products)
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-6 flex flex-col">
                    @php
                        $get = $products->name;
                        $b = $products->store->name;
                        $slug = str_replace(' ','-',$get);
                        $storename = str_replace(' ','-',$b);
                    @endphp
                    <a href="{{ url('/shop/'.$storename.'/'.$slug) }}">
                        @php
                            $ex = count(explode('|', $products->image));
                        @endphp
                        @if($ex != 1)
                            @php
                                $x =explode('|', $products->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg"
                                src="{{ asset('image/product/'.$x[0]) }}">
                        @else
                            <img class="hover:grow hover:shadow-lg"
                                src="{{ asset('image/product/'.$products->image) }}">
                        @endif
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $products->name }}</p>
                        </div>
                        <p class="pt-1 text-gray-900">Rp {{ number_format($products->harga) }}</p>
                    </a>
                </div>
            @empty
                <div class="flex justify-center text-center w-full text-bold">
                Tidak ada barang
            </div>
            @endforelse

            <div class="w-full overflow-hidden items-center">
                {{ $product->links() }}
            </div>
    </section>
<script>
function selectChange(val) {
    //Set the value of action in action attribute of form element.
    //Submit the form
    $('#myForm').submit();
}
</script>

    <livewire:footer>
@endsection
