@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen">
    
	<div class="content-center w-full max-w-md">
        <div class="flex items-center justify-center">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                XATORE
            </a>
        </div>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}">
            @csrf
            <h1><div class="card-header">{{ __('Register') }}</div></h1>
            <a href="{{url('/auth/google')}}" class="flex items-center justify-center mb-5 mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
                <div class="px-4 py-3">
                    <svg class="h-6 w-6" viewBox="0 0 40 40">
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                        <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                        <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                    </svg>
                </div>
                <h1 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in with Google</h1>
            </a>
            <div class="text-center">or</div>
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
            <div class="mb-4">
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" class="text-blue-600 form-checkbox focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" required/> <span class="ml-2">
                            I agree to the
                            <a href="{{url('/privacy-policy')}}" class="underline">privacy policy</a>
                    </span>
                </label>
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
