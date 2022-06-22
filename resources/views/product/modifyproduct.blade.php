@extends('layouts.public')

@section('title', 'insert')


@section('scripts')

@parent
<script src="{{ asset('js/ajaxValidationFunctions.js') }}" ></script>
<script src="{{ asset('js/helpers.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('modifyproduct.store') }}";
    var formId = 'modifyproduct';

    getActualPrice();

    $(":input").on('blur', function (event) {
                var formElementId = $(this).attr('id');

        if(formElementId == 'discountPerc' || formElementId == 'price') {
            getActualPrice();
        }

        doElemValidation(formElementId, actionUrl, formId);
    });

    $("#modifyproduct").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@endsection


@section('content')

<div class="container form-style-1">
    <h3>Modifica prodotto</h3>
    <div class="wrap-form1">
    {{ Form::open(array('route' => 'modifyproduct.store', 'id' => 'modifyproduct', 'files' => true, 'class' => 'class-form')) }}
        {{  Form::hidden('prodId', $product->prodId) }}
        <div class="wrap-input width-setter">
            {{ Form::label('name', 'Nome prodotto') }}
            {{ Form::text('name', $product->name, ['class' => 'input', 'id' => 'name']) }}

        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('subCatId', 'Sottocategoria') }}
            {{ Form::select('subCatId', $subCats, $product->subCatId, ['class' => 'input', 'id' => 'subCatId']) }}

        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('image', 'Foto') }}
            {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}

        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('price', 'Prezzo intero (€)') }}
            {{ Form::text('price', $product->price, ['class' => 'input', 'id' => 'price']) }}

        </div>
        <div class="wrap-input width-setter">
            {{ Form::label('discountPerc', 'Percentuale di sconto') }}
            {{ Form::text('discountPerc', $product->discountPerc, ['class' => 'input', 'id' => 'discountPerc']) }}

        </div>
        <div class="wrap-input width-setter">
            <label>Prezzo effettivo</label>
            <div class="input" id = 'prezzoeffettivo'></div>
        </div>

        <div class="wrap-input">
            {{ Form::label('descShort', 'Descrizione breve') }}
            {{ Form::text('descShort', $product->descShort, ['class' => 'input', 'id' => 'descShort']) }}

        </div>
        <div class="wrap-input">
            {{ Form::label('descLong', 'Descrizione estesa') }}
            {{ Form::textarea('descLong', $product->descLong, ['class' => 'input', 'id' => 'descLong', 'rows' => '5']) }}

        </div>
        <div class="container-form-btn">
        {{ Form::submit('Conferma', ['id' => 'sub-btn']) }}
        {{ Form::reset('Reset') }}
        </div>
	{{ Form::close() }}
    </div>
</div>

@endsection
