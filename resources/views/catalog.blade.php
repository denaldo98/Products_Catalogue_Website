@extends('layouts.public')

@section('title', 'Catalogo')

@section('scripts')

@parent
<script src="{{ asset('js/styleManipulation.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function () {
    changeSidebarStyle();
    showImage();
});

</script>

@endsection

<!-- inizio sezione prodotti -->
@section('content')

<section id="content">
    @isset($products)
        @forelse  ($products as $product)
            <article class="prodotto">
                @include('helpers/productImg', ['imgFile' => $product->image])
                <div class="info-primarie">
                    <div class="div-nome-prodotto">
                            <h2 class="nome-prodotto">{{ $product->name }}</h2>
                    </div>
                    <div class="prezzi">
                        @include('helpers/productPrice')
                    </div>
                    <div class="div-breve-desc">
                        <p class="breve-desc">{{ $product->descShort }}</p>
                    </div>
                </div>
                <div style="clear: both;">&nbsp;</div>
                <div class="lunga-desc">
                    <p>{!! $product->descLong !!}</p>
                </div>
            </article>
            <div style="clear: both;">&nbsp;</div>

        @empty
            <h2>Non ci sono prodotti che soddisfano la richiesta!</h2>
        @endforelse

        <!--Paginazione-->
        @include('pagination.paginator', ['paginator' => $products])

    @endisset()

</section>

<!-- fine sezione prodotti -->

<nav id="sidebar">
    <div>
        <ul>
            <li>
		    <h2 class="cat">Categorie</h2>
		        <ul>
                    @foreach ($categories as $category)
                    <li><a href="{{ route('catalog2', [$category->catId]) }}">{{ $category->name }}</a></li>
                    @endforeach
		        </ul>
            </li>

            @isset($selectedCat)
            <li>
		        <h2 class="cat">In {{ $selectedCat->name }}</h2>
		        <ul>
                    @foreach ($subCategories as $subCategory)
                    <li><a href="{{ route('catalog3', [$selectedCat->catId, $subCategory->subCatId]) }}">{{ $subCategory->name }}</a></li>
                    @endforeach
		        </ul>
            </li>
            @endisset
	    </ul>
    </div>
</nav>

<!-- fine sezione laterale -->
@endsection


