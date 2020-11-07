@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen">
    
	<div class="content-center w-full max-w-md">
        <div class="flex items-center justify-center">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                SHOPPIN
            </a>
        </div>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
            @csrf
            <h1><div class="card-header">{{ __('Register') }}</div></h1>
            <div class="mb-4">
                
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    {{ __('First Name') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('first_name') is-invalid @enderror" placeholder="Your first name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    {{ __('Last Name') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('last_name') is-invalid @enderror" placeholder="Your Last Name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="mb-4">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('E-Mail Address') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('email') is-invalid @enderror""  placeholder="Email" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    {{ __('Password') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirm">
                    {{ __('Confirm Password') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline "id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
            
            
            <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                {{ __('Register') }}
            </button>
            </div>
            <div class="flex items-center mt-5">
            <p>Sudah memiliki akun ? </p>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
                login
            </a>
        </div>
        </form>
    </div>
</div>
@endsection
