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
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h1><div class="card-header">{{ __('Reset password') }}</div></h1>
            @if (session('status'))
                <div class="invalid-feedback"" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-4">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('E-Mail Address') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('email') is-invalid @enderror""  placeholder="Email" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            </div>
            <div class="mb-4">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Password') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('password') is-invalid @enderror""  placeholder="Password" id="password" type="password" name="password" required autocomplete="password" autofocus>
            </div>
            <div class="mb-4">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-red-500">{{ $message }}</strong>
                    </span>
                @enderror
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Password confirmation') }}
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('password_confirmation') is-invalid @enderror""  placeholder="Password confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="password_confirmation" autofocus>
            </div>
            
            
            
            
            
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
        
    </div>
	
</div>
@endsection



{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
