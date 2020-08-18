@extends('layouts.app')
@section('title') 
    Mensajes | Busquedas
@endsection
@section('content')
   @foreach ($messages as $message)
        @include('messages.messages')
   @endforeach
@endsection