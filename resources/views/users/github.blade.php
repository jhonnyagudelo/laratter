@extends('layouts.app')

@section('content')
<form action="{{route('register.auth') }}" method="post">
    @csrf
    {{-- @method('POST') --}}
    <div class="card">
        <div class="card-block">
            <img src="{{$githubUser->avatar}}" alt="" class="img-thumbnail">
        </div>
        <div class="card-block">

            <div class="form-group">
                <label for="name" class="form-control label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{$githubUser->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="email" class="form-control label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$githubUser->email}}" readonly>
            </div>
            <div class="form-group">
                <label for="username" class="form-control label">Nombre de usuario</label>
                    <input type="text" name="username" class="form-control" value="{{old('username')}}">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Registrarse</button>
        </div>
    </div>
</form>
@endsection