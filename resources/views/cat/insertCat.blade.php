@extends('layouts.public')

@section('title', 'Aggiunta categoria')

@section('content')

<div class="container form-style-1">
    <h3>Aggiungi categoria</h3>
    <div class="wrap-form">
        {{ Form::open(array('route' => 'newcategory.store', 'class' => 'class-form')) }}
        <div class="wrap-input">
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
        <div class="container-form-btn">
        {{ Form::submit('Conferma') }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
