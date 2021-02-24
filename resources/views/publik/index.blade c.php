@extends('layouts.app')

@section('content')

<div class="flex flex-col h-screen bg-gray-100">
    <!-- Auth Card Container -->
    <div class="grid place-items-center mx-2 my-20 sm:my-auto">
        <!-- component -->

        <div class="flex overflow-hidden w-11/12 sm:w-8/12 md:w-6/12 lg:w-8/12 
            
            bg-white rounded-lg shadow-md lg:shadow-lg">
            <div class="w-full p-8">
                
                <p class="text-xl text-gray-600 text-center mb-5">Periksa kode verifikasi kmu!</p>
                <p>buka whatsapp pada no +621xxxxxxx92 kemudian masukkan kode berikut </p>
                <form action="" method="post">
                <div class="mt-4 flex items-center justify-center" id="otp" >
                                <input
                                    class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2 "
                                    type="number" name="otp0" id="first" maxlength="1" />
                                <input
                                    class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                    type="number" name="otp1" id="second" maxlength="1" />
                                <input
                                    class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                    type="number" name="otp2" id="third" maxlength="1" />
                                <input
                                    class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                    type="number" name="otp3" id="fourth" maxlength="1" />
                                <input
                                    class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                    type="number" name="otp4" id="fifth" maxlength="1" />
                                <input
                                    class="m-2 w-10 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline border-b-2"
                                    type="number" name="otp5" id="sixth" maxlength="1" />
                                </div>
                            </form>
                
                <div class="mt-8 justify-between">
                    <a href="#" class="text-xs text-red-500 uppercase mx-5">salah nomor?</a>
                    <button class="bg-gray-700 text-white font-bold py-2 px-4 mx-5 rounded hover:bg-gray-600">Login</button>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    
                </div>
            </div>
        </div>
        @foreach ($phone as $item)
            
        
        @endforeach
        <select name="" id="basic" data-input-name="country">
        </select>

        <div>
            

        </div>
    </div>
</div>
<script>
     $('#basic').flagStrap();
</script>
<script>
    function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keydown', function (event) {
                if (event.key === "Backspace") {
                    inputs[i].value = '';
                    if (i !== 0)
                        inputs[i - 1].focus();
                } else {
                    if (i === inputs.length - 1 && inputs[i].value !== '') {
                        return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                        inputs[i].value = event.key;
                        if (i !== inputs.length - 1)
                            inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                        inputs[i].value = String.fromCharCode(event.keyCode);
                        if (i !== inputs.length - 1)
                            inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }
    }
    OTPInput();

</script>

@endsection
