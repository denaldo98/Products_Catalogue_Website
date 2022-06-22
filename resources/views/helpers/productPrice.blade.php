
@can('isUser')
    <p class="prezzo-effettivo"> {{ number_format($product->getPrice(true), 2, ',', '.') }} € </p>
    @if ($product->discountPerc > 0)
        <p class="prezzo-intero"> Prezzo intero: <del>{{ number_format($product->getPrice(false), 2, ',', '.') }} €</del></p>
        <p class= "percentuale-sconto">Sconto: {{ $product->discountPerc }}%</p>
    @endif
@else
    <p class="prezzo-effettivo"> {{ number_format($product->getPrice(false), 2, ',', '.') }} € </p>
@endcan






