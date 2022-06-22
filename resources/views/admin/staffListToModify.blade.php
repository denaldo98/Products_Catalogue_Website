@extends('layouts.public')

@section('title', 'Modifica membri staff')

@section('scripts')

@parent
<script src="{{ asset('js/radioAndCheck.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function () {
    var formId = 'modifystafflist';
    var fieldName = 'id';

    $("#modifystafflist").on('submit', function (event) {
        check(formId, fieldName);
    })
});
</script>

@endsection


@section('content')
<div class="container form-style-2">
    <h3>Seleziona utente staff da modificare</h3>
    {{ Form::open(array('route' => 'modifystaff', 'method' => 'get', 'id' => 'modifystafflist')) }}
    <table>
        <tr><th></th><th>Nome</th><th>Cognome</th><th>Nome utente</th><tr>
        @isset($staff)
            @foreach ($staff as $staffMember)
            <tr><td>{{ Form::radio('id', $staffMember->id) }}</td><td class="column2"><p>{{ $staffMember->name }}</p></td><td class="column2"><p>{{ $staffMember->surname }}</p></td><td class="column2"><p>{{ $staffMember->username }}</p></td></tr>

            @endforeach
        @endisset()
    </table>
    @if($errors->first('id'))
            <ul class="errors">
                <li>Selezionare un prodotto</li>
                <br>
            </ul>
    @endif
    <div class="container-form-btn">
    {{ Form::submit('Modifica membro') }}
    </div>
    {{ Form::close() }}
</div>
@endsection
