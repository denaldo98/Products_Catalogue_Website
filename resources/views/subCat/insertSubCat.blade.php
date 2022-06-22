@extends('layouts.public')

@section('title', 'Aggiunta sottocategoria')

@section('content')

<div class="container form-style-1">
    <h3>Aggiungi sottocategoria</h3>
    <div class="wrap-form">
        {{ Form::open(array('route' => 'newsubcategory.store', 'class' => 'class-form')) }}
        <div class="wrap-input">
            {{ Form::label('catId', 'Categoria di appartenenza') }}
            {{ Form::select('catId', $cats, '', ['class' => 'input']) }}
            @if($errors->first('catId'))
                <ul class="errors">
                    @foreach($errors->get('catId') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

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
