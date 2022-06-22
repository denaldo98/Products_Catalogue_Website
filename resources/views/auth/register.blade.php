@extends('layouts.public')

@section('title', 'Registrazione')

@section('content')

<div class="container form-style-1">
    <h3>Registrazione</h3>
    <div class="wrap-form1">
    {{ Form::open(array('route' => 'register', 'class' => 'class-form')) }}

        <div class="wrap-input width-setter">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', '', ['class' => 'input']) }}
            @if($errors->first('name'))
            <ul class="errors">
                @foreach($errors->get('name') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('surname', 'Cognome') }}
            {{ Form::text('surname', '', ['class' => 'input']) }}
            @if($errors->first('surname'))
            <ul class="errors">
                @foreach($errors->get('surname') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('date', 'Data di nascita') }}
            {{ Form::date('date', '', ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('occupation', 'Occupazione') }}
            {{ Form::select('occupation', ["Impiegato", "Operaio", "Libero professionista", "Studente", "Disoccupato", "Altro"], '', ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('street', 'Via') }}
            {{ Form::text('street', '', ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('number', 'Civico') }}
            {{ Form::text('number', '', ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('city', 'Città') }}
            {{ Form::text('city', '', ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('cap', 'CAP') }}
            {{ Form::text('cap', '', ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('username', 'Nome utente') }}
            {{ Form::text('username', '', ['class' => 'input']) }}
            @if($errors->first('username'))
            <ul class="errors">
                @foreach($errors->get('username') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', '', ['class' => 'input']) }}
            @if($errors->first('email'))
            <ul class="errors">
                @foreach($errors->get('email') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="wrap-input width-setter">
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
        <div class="wrap-input width-setter">
            {{ Form::label('password_confirm', 'Conferma password') }}
            {{ Form::password('password_confirmation', ['class' => 'input']) }}
        </div>
        <div class="container-form-btn">
        {{ Form::submit('Registrati') }}
        {{ Form::reset('Reset') }}
    </div>
	{{ Form::close() }}
    </div>
</div>
<p class="login">Hai già un account? <a href="{{ route('login') }}">Effettua il Login!</a></p>


@endsection
