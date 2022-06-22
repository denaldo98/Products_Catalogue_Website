@extends('layouts.public')

@section('title', 'Profilo')

@section('content')

<div class="container form-style-1">
    <h3>Il tuo profilo</h3>
    <div class="wrap-form1">
        <div class="wrap-input width-setter">
            <label>Username</label>
            <div class="input">{{ Auth::user()->username }}</div>
        </div>
    {{ Form::open(array('route' => 'modifyprofile', 'class' => 'class-form')) }}
        {{ Form::hidden('id', Auth::user()->id) }}
        <div class="wrap-input width-setter">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', Auth::user()->name, ['class' => 'input']) }}
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
            {{ Form::text('surname', Auth::user()->surname, ['class' => 'input']) }}
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
            {{ Form::date('date', Auth::user()->date, ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('occupation', 'Occupazione') }}
            {{ Form::select('occupation', ["Impiegato", "Operaio", "Libero professionista", "Studente", "Disoccupato", "Altro"], Auth::user()->occupation, ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('street', 'Via') }}
            {{ Form::text('street', Auth::user()->street, ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('number', 'Civico') }}
            {{ Form::text('number', Auth::user()->number, ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('city', 'Città') }}
            {{ Form::text('city', Auth::user()->city, ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('cap', 'CAP') }}
            {{ Form::text('cap', Auth::user()->cap, ['class' => 'input']) }}
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Auth::user()->email, ['class' => 'input']) }}
            @if($errors->first('email'))
            <ul class="errors">
                @foreach($errors->get('email') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="container-form-btn">
        {{ Form::submit('Modifica') }}
        {{ Form::reset('Reset') }}
        </div>
	{{ Form::close() }}
    </div>



    <div class="wrap-form1">
        {{ Form::open(array('route' => 'modifypassword', 'class' => 'class-form')) }}
        {{ Form::hidden('id', Auth::user()->id) }}
        <div class="wrap-input width-setter">
            {{ Form::label('newPassword', 'Nuova Password') }}
            {{ Form::password('newPassword', ['class' => 'input']) }}
            @if($errors->first('newPassword'))
            <ul class="errors">
                @foreach($errors->get('newPassword') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('newPassword_confirm', 'Conferma password') }}
            {{ Form::password('newPassword_confirmation', ['class' => 'input']) }}
        </div>
        <div class="container-form-btn">
            {{ Form::submit('Modifica') }}
            {{ Form::reset('Reset') }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
