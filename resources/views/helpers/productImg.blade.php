@php
        if (empty($imgFile)) {
            $imgFile = 'default.jpg';
        }
@endphp

<img class="img-prodotto" src="{{ asset('images/products/' . $imgFile) }}">

<!-- Contenitore finestra modale -->
<div class="modal">
    <!-- Bottone di chiusura -->
    <span class="close">&times;</span>
    <!-- Immagine -->
    <img class="modal-content">
</div>
