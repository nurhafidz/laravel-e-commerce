@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container1 container mx-auto">
    <button class="add_form_field bg-red-500 ">Add New Field &nbsp; 
      <span style="font-size:16px; font-weight:bold;">+ </span>
    </button>
    <div>
        <select class="select2 border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="mytext[]" id="phonecode">
            <option value="62" selected="selected">Indonesia (+62)</option>
            @foreach($phone as $item)
            <option value="" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/NYCS-bull-trans-B.svg/480px-NYCS-bull-trans-B.svg.png">
                {{$item->name}} (+{{$item->phonecode}})</option>
            @endforeach
        </select>
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script>
    $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><select class="select2 border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" name="mytext[]" id="phonecode"><option value="62" selected="selected">Indonesia (+62)</option>@foreach($phone as $item)<option value="" data-thumbnail="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/NYCS-bull-trans-B.svg/480px-NYCS-bull-trans-B.svg.png">{{$item->name}} (+{{$item->phonecode}})</option>@endforeach</select><a href="#" class="delete">Delete</a></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

@endsection