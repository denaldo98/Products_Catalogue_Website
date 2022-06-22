@extends('layouts.public')

@section('title', 'Login')

@section('content')

<div class="container form-style-1">
    <h3>Login</h3>
    <div class="wrap-form">
        {{ Form::open(array('route' => 'login', 'class' => 'class-form')) }}
        <div class="wrap-input">
                {{ Form::label('username', 'Nome Utente') }}
                {{ Form::text('username', '', ['class' => 'input']) }}
                @if($errors->first('username'))
                <ul class="errors">
                    @foreach($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
        </div>
        <div class="wrap-input">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'input']) }}
            @if($errors->first('password'))
            <ul class="errors">
                @foreach($errors->get('password') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="container-form-btn">
            {{ Form::submit('Login') }}
            {{ Form::close() }}
        </div>
    </div>
</div>

<p class="login">Non sei ancora registrato?<a href="{{ route('register') }}">Registrati ora!</a></p>

@endsection
