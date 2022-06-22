@extends('layouts.public')

@section('title', 'Elimina utenti registrati')


@section('content')
<div class="container form-style-2">
    <h3>Seleziona cliente/i da eliminare</h3>
    {{ Form::open(array('route' => 'deleteUsers', 'id' => 'deleteuserslist', 'class' => '')) }}
    <table>
        <tr><th></th><th>Nome</th><th>Cognome</th><th>Nome utente</th><tr>
        @isset($users)
            @foreach ($users as $user)
            <tr><td>{{ Form::checkbox('id[]', $user->id) }}</td><td class="column2"><p>{{$user->name}}</p></td><td class="column2"><p>{{$user->surname}}</p></td><td class="column2"><p>{{$user->username}}</p></td></tr>
            @endforeach
        @endisset()
    </table>
    @if($errors->first('id'))
        <ul class="errors">
            <li>Selezionare un elemento</li>
            <br>
        </ul>
    @endif


    <div class="container-form-btn">
        {{ Form::submit('Elimina cliente') }}
    </div>
    {{ Form::close() }}
</div>
@endsection
