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
                            Produk
                        </a>
                    </div>

                    <div class="my-1 px-1 w-full  overflow-hidden">
                        <p class="font-light italic">Hasil pencarian {{$_GET['search']}} </p>
                        
                        <div class="flex justify-end" id="store-nav-content">
                            
                            @php
                                    
                                    
                            @endphp
                            <form id="myForm" action="{{url('/search')}}" method="GET">
                                <input type="hidden" value="{{request()->get('search')}}" name="search">
                                <Select onChange=selectChange(this.value) class="block bg-white w-full bg-grey-lighter border-b border-grey-lighter text-grey-darker p-2 " name="sortir">
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
            @forelse($result as $product)
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-6 flex flex-col">
                    @php
                        $get = $product->name;
                        $b = $product->store->name;
                        $slug = str_replace(' ','-',$get);
                        $storename = str_replace(' ','-',$b);
                    @endphp
                    <a href="{{ url('/shop/'.$storename.'/'.$slug) }}">
                        @php
                            $ex = count(explode('|', $product->image));
                        @endphp
                        @if($ex != 1)
                            @php
                                $x =explode('|', $product->image,$ex);
                            @endphp
                            <img class="hover:grow hover:shadow-lg"
                                src="{{ asset('image/product/'.$x[0]) }}">
                        @else
                            <img class="hover:grow hover:shadow-lg"
                                src="{{ asset('image/product/'.$product->image) }}">
                        @endif
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $product->name }}</p>
                            
                        </div>
                        <p class="pt-1 text-gray-900">Rp {{ number_format($product->harga) }}</p>
                    </a>
                </div>
            @empty
                tidak ada barang
            @endforelse

            <div class="w-full overflow-hidden items-center">
                {{ $result->links() }}
            </div>
    </section>


    <livewire:footer>
        <script>
function selectChange(val) {
    //Set the value of action in action attribute of form element.
    //Submit the form
    $('#myForm').submit();
}
</script>
@endsection
