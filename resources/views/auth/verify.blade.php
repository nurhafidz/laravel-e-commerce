@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen">
    
	<div class="content-center w-full max-w-md">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <label class="block text-gray-700 text-xl font-bold mb-2 ">{{ __('Verify Your Email Address') }}</label>
            <div class="items-center justify-between mb-5 mt-5">
                @if (session('resent'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                        <p class="font-bold">Success send</p>
                        <p class="text-sm">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p>{{ __('If you did not receive the email') }}</p>
            </div>
            <div class="flex items-center justify-between">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Back
                </button>
            </form>
            
            <form class="inline-block" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">{{ __('click here to request another') }}</button>.
            </form>
            
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
