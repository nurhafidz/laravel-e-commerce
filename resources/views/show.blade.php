@extends('layouts.app')
@section('content')
<div class="bg-gray-100 lg:p-2 ">
    <div class="container lg:mx-auto shadow-lg ">
        
        @livewire('show', ['users' => $users, 'messages' => $messages, 'sender' => $sender,'store' => $store])
    </div>
</div>
@endsection
