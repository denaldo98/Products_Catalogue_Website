<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

        @section('scripts')
        @show

        <title>@yield('title', 'Catalogo')</title>
    </head>
    <body>
        <header>
            <h1 id="logo"><a href="{{ route('catalog1') }}">Electronically</a></h1>
        </header>

        <section id="wrapper">
            <nav id="upper-menu">
		        @include('layouts/_topnav')
            </nav>
            @include('layouts/search')
        </section>

        <div id="page">
            @yield('content')
            <div style="clear: both;">&nbsp;</div>
        </div>

        <section id="bottom-menu">
            @include('layouts/footer')
        </section>

        <footer>
	        <p>&copy; Catalog designed by <a href="https://github.com/denaldo98/">denaldo98</a>, <a href="https://github.com/S1082351">S1082351</a>, <a href="https://github.com/DavideNarcisi">DavideNarcisi</a>, <a href="https://github.com/Orestee">orestee</a>.</p>
        </footer>
    </body>
</html>
