@extends('layouts.public')

@section('title', 'Contatti')

@section('content')

    <br>
    <h1 style="font-weight: bold;">Recapiti</h1>
    <div class="info">
        <p>
            Hai un dubbio o una richiesta e vuoi una risposta?
            <br>Puoi chiamare il Servizio Clienti al numero 01 23 45 67 89. *
            <br>Il servizio è attivo dal lunedì al sabato dalle 9.00 alle 18.00.
            <br>
            <br>In alternativa scrivici una mail a <a href="mailto:electrically@gmail.com">electrically@gmail.com</a>.
            <br>
            <br>I nostri operatori potranno darti tutte le informazioni e rispondere alle tue domande sugli ordini effettuati.
            <br>
            <br>(*) Tariffe sul servizio
            <br>I costi della chiamata sono legati all’operatore utilizzato.
        </p>
    </div>

    <br>
    <br>

    <h1 style="font-weight: bold;">Contatti social</h1>
    <div class="info">
        <p>
            Desideri essere sempre al corrente delle nuove iniziative o semplicemente delle nuove promozioni che offriamo?
            <br>Ecco i link alle nostre pagine social: vieni anche tu a far parte della nostra comunità!
            <br>
            <br>
        </p>
        <p>
            <a href="https://www.facebook.com/groups/339532962754999/"><img src="{{ asset('css/images/FbLogo.png') }}" width="35" height="35" style="margin-bottom: -11px; margin-right: 5px;"></a><a href="https://www.facebook.com/groups/339532962754999/">Facebook</a>
            <br>
        </p>
        <br>
        <p>
        <a href="https://www.instagram.com/univpm/?hl=it"><img src="{{ asset('css/images/InstaLogo.png') }}"  width="35" height="35" style="margin-bottom: -11px; margin-right: 5px;"></a><a href="https://www.instagram.com/univpm/?hl=it">Instagram</a>
            <br>
        </p>
    </div>

@endsection
