@extends('layouts.public')

@section('title', 'Aggiunta membro staff')

@section('content')

<div class="container form-style-1">
    <h3>Aggiungi membro staff</h3>
    <div class="wrap-form1">
    {{ Form::open(array('route' => 'newstaff.store', 'class' => 'class-form')) }}

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
        {{ Form::submit('Aggiungi membro staff') }}
        {{ Form::reset('Reset') }}
        </div>
	{{ Form::close() }}
    </div>
</div>

@endsection
