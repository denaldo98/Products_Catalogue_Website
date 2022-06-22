@extends('layouts.public')

@section('title', 'Modifica prodotti')


@section('scripts')

@parent
<script src="{{ asset('js/radioAndCheck.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function () {
    var formId = 'modifylist';
    var fieldName = 'prodId';

    $("#modifylist").on('submit', function (event) {
        check(formId, fieldName);
    })

    $("#search-string").on('keyup', function(){
        var actionUrl = "{{ route('search') }}";
        var searchText = $(this).val();
        searchList(searchText, actionUrl);

    });
});
</script>

@endsection


@section('content')
<div class="container form-style-2">
    <h3>Seleziona il prodotto da modificare</h3><br>
    <input type="text"  id="search-string" name="search-string" placeholder="Ricerca il prodotto per nome"><br>
    {{ Form::open(array('route' => 'modifyproduct', 'id' => 'modifylist', 'method' => 'get', 'class' => '')) }}
    <table>
        <tr><th></th><th>Nome prodotto</th><th>Descrizione breve</th><th>Prezzo intero (€)</th><th>Sconto (%)</th><tr>
        @isset($products)
            @foreach ($products as $product)
            <tr><td>{{ Form::radio('prodId', $product->prodId) }}</td><td class="column"><p>{{ $product->name }}</p></td><td class="column"><p>{{ $product->descShort }}</p></td><td>{{ $product->price }}</td><td>{{ $product->discountPerc }}</td></tr>
            @endforeach
        @endisset()
    </table>

    @if($errors->first('prodId'))
        <ul class="errors">
            <li>Selezionare un prodotto</li>
            <br>
        </ul>
    @endif
    <div class="container-form-btn">
        {{ Form::submit('Modifica prodotto') }}
    </div>
    {{ Form::close() }}
</div>
@endsection
