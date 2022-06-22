<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

//Controller con funzionalità pubbliche

class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {

        //Instanziazione del Application Model
        $this->_catalogModel = new Catalog;
    }

    //Action che restituisce la vista del catalogo con tutti i prodotti
    public function showCatalog1() {
        $cats = $this->_catalogModel->getCats();
        $prods = $this->_catalogModel->getProdsByCat($cats->map->only(['catId']), 2, 'desc');
        return view('catalog')
                        ->with('categories', $cats)
                        ->with('products', $prods);
    }


    //Action che restituisce la vista del catalogo con tutti i prodotti della categoria selezionata
    public function showCatalog2($catId) {

        //Categorie Top
        $cats = $this->_catalogModel->getCats();

        //Categoria Top selezionata
        $selCat = $cats->where('catId', $catId)->first();

        //Sottocategorie
        $subCats = $this->_catalogModel->getSubCatsByCatId([$catId]);

        //Prodotti della categoria selezionata
        $prods = $this->_catalogModel->getProdsByCat([$catId], 2, 'desc');

        return view('catalog')
                        ->with('categories', $cats)
                        ->with('selectedCat', $selCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prods);
    }

    //Action che restituisce la vista del catalogo con tutti i prodotti della sottocategoria selezionata
    public function showCatalog3($catId, $subCatId, $search = null) {

        //Categorie Top
        $cats = $this->_catalogModel->getCats();

        //Categoria Top selezionata
        $selCat = $cats->where('catId', $catId)->first();

        //Sottocategorie
        $subCats = $this->_catalogModel->getSubCatsByCatId([$catId]);

        //Controllo sul parametro opzionale $search
        if($search == null) {
            //se il parametro search non viene passato
            $prods = $this->_catalogModel->getProdsBySubCat([$subCatId]);
        }
        else {
            //se il parametro search viene passato, si effettua la ricerca
            $prods = $this->_catalogModel->getProdsBySubCat2([$subCatId]);    //estrazione dei prodotti non paginati

            //ricerca dei prodotti in base al parametro $search
            $prods = $prods->Where('descLong','like', '%'. $search. '%')->paginate(2);
        }

        return view('catalog')
                        ->with('categories', $cats)
                        ->with('selectedCat', $selCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prods)
                        ->with('selectedSubCatId', $subCatId);
    }



    //Action per gestire la ricerca. Redirige alla rotta 'catalog3' con l'utilizzo del parametro opzionale
    public function showCatalog3search(Request $request) {
        $search = $request -> get('search-string');
        return redirect()->route('catalog3', ['catId' => $request->get('catId'), 'subCatId' => $request->get('subCatId'), 'search' => $search]);
    }
}
