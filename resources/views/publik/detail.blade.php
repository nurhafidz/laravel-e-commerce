@extends('layouts.app')
@section('content')
<livewire:navbar>

<section class="text-gray-700 body-font overflow-hidden">
        @livewire('detailproduct',['product'=>$product])
</section>

<livewire:footer>
<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if (value > 0){
        value--;
        target.value = value;
        }
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        if(value < {{$product->stock}}){
        value++;
        target.value = value;
        }
        if(value > {{$product->stock}}){
            document.getElementById("demo").innerHTML = "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative' role='alert'><span class='block sm:inline'>Maaf stock hanya {{$product->stock}}</span></div>";
            target.value = {{$product->stock}};
        }
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>
@endsection