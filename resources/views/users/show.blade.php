@extends('layouts.app')
@section('title')
{{$user->name}} | laratter
@endsection
@section('content')
<h1>{{$user->name}}</h1>
<a href="/{{$user->username}}/follows" class="btn btn-link"> Sigues a <span
        class="badge badge-default">{{$user->follows->count()}}</span> </a>
<a href="/{{$user->username}}/followers" class="btn btn-link">Seguidores <span
        class="badge badge-default">{{$user->followers->count()}}</span></a>

@if (Auth::check())
    @if (Gate::allows('dms', $user))
        <form action="/{{ $user->username }}/dms"  method="post">
            @csrf
            @method('POST')
            <input type="text" name="message" class="form-control">
            <button type="submit" class="btn btn-success">
                Enviar DM
            </button>
        </form>
    @endif
    @if (Auth::user()->isFollowing($user))
        <form action="/{{$user->username}}/unfollow" method="post">
            @csrf
            @if (session('success'))
            <span class="text-success">{{session('success')}}</span>
            @endif
            <button class="btn btn-danger">unFollow</button>
        </form>
    @else
    <form action="/{{$user->username}}/follow" method="post">
        @csrf
        @if (session('success'))
            <span class="text-success">{{session('success')}}</span>
        @endif
        <button class="btn btn-primay">Follow</button>
    </form>
    @endif
@endif
<div class="row">
    @foreach ($user->messages as $message)
    <div class="col-6">
        @include('messages.messages')
    </div>
    @endforeach
</div>
@endsection