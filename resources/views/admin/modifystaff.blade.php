@extends('layouts.public')

@section('title', 'Modifica membro staff')

@section('content')

<div class="container form-style-1">
    <h3>Modifica membro staff</h3>
    <div class="wrap-form1">
        <div class="wrap-input width-setter">
            <p>Username: {{ $staff->username }}</p>
        </div>
        {{ Form::open(array('route' => 'modifystaff.store', 'class' => 'class-form')) }}
        {{ Form::hidden('id', $staff->id) }}
        <div class="wrap-input width-setter">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', $staff->name, ['class' => 'input']) }}
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
            {{ Form::text('surname', $staff->surname, ['class' => 'input']) }}
            @if($errors->first('surname'))
            <ul class="errors">
                @foreach($errors->get('surname') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="container-form-btn">
        {{ Form::submit('Conferma') }}
        {{ Form::reset('Reset') }}
        </div>
        {{ Form::close() }}
    </div>

    <div class="wrap-form1">
        {{ Form::open(array('route' => 'modifystaffpassword', 'class' => 'class-form')) }}
        {{ Form::hidden('id', $staff->id) }}
        <div class="wrap-input width-setter">
            {{ Form::label('newPassword', 'Nuova password') }}
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
            {{ Form::submit('Conferma') }}
            {{ Form::reset('Reset') }}
        </div>
        {{ Form::close() }}
    </div>
</div>

@endsection
