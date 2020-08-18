@extends('layouts.app')
@section('title') 
    Mensajes | laratter
@endsection
@section('content')
    <h1 class="h3">Mensaje id: {{$message->id}} </h1>
    @include('messages.messages')

    <responses :message="{{ $message->id }}"></responses>
@endsection