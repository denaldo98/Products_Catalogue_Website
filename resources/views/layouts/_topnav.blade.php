<ul>
    <li><a href="{{ route('catalog1') }}" title="Home">Catalogo</a></li>
    <li><a href="{{ asset('Relazione.pdf') }}" title="Relazione del progetto">Relazione</a></li>

	@guest
    <li><a href="{{ route('login') }}" title="Accedi all'area riservata del sito">Accedi</a></li>
    @endguest

    @can('isUser')
    <li><a href="{{ route('showprofile') }}" title="Accedi al tuo profilo">Profilo</a></li>
    @endcan

    @can('isStaff')
	<li class="Gestione"><a>Gestione prodotti</a>
		<ul>
			<li><a href="{{ route('newproduct') }}">Aggiungi prodotto</a></li>
			<li><a href="{{ route('productstomodify') }}">Modifica prodotto</a></li>
			<li><a href="{{ route('productstodelete') }}">Elimina prodotto</a></li>
		</ul>
	</li>
	<li class="Gestione"><a>Gestione categorie</a>
		<ul>
			<li><a href="{{ route('newcategory') }}">Nuova categoria</a></li>
			<li><a href="{{ route('newsubcategory') }}">Nuova sottocat.</a></li>
		</ul>
	</li>
    @endcan

    @can('isAdmin')
    <li class="Gestione"><a>Gestione staff</a>
		<ul>
			<li><a href="{{ route('newstaff') }}">Aggiungi membro</a></li>
			<li><a href="{{ route('stafftomodify') }}">Modifica membro</a></li>
			<li><a href="{{ route('stafftodelete') }}">Elimina membro</a></li>
		</ul>
	</li>
    <li class="Gestione"><a>Gestione clienti</a>
		<ul>
			<li><a href="{{ route('userstodelete') }}">Elimina cliente</a></li>
		</ul>
	</li>
    @endcan

    @auth  <!-- se utente autenticato -->
        <li><a href="" title="Esci dal sito"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth

</ul>
