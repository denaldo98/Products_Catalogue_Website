@isset($selectedSubCatId)
    @can('isUser')
    <div id="search" >
        <form method="post" action="{{ route('catalog3search') }}">
            @csrf
                <input type="text" name="search-string" id="search-string" />
                <input type="hidden" name="catId" id="catId" value= {{$selectedCat->catId}}  />
                <input type="hidden" name="subCatId" id="subCatId" value= {{$selectedSubCatId}} />
        </form>
    </div>
    @endcan

    @guest
        <div id="search" >
            <form method="post" action="{{ route('catalog3search') }}">
                @csrf
                    <input type="text" name="search-string" id="search-string" />
                    <input type="hidden" name="catId" id="catId" value= {{$selectedCat->catId}}  />
                    <input type="hidden" name="subCatId" id="subCatId" value= {{$selectedSubCatId}} />
            </form>
        </div>
    @endguest
@endisset



