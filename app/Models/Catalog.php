<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\SubCategory;
use App\Models\Resources\Product;

//Application model per il controller pubblico

class Catalog {

    public function getCats() {
        return Category::all();
    }


    public function getSubCatsByCatId($catId) {
        return SubCategory::whereIn('catId', $catId)->get();
    }


    //Funzione che ritorna i prodotti paginati della sottocategoria passata come parametro
    public function getProdsBySubCat($subCatId, $paged = 2) {

        $prods = Product::whereIn('subCatId', $subCatId);
        return $prods->paginate($paged);
    }


    //Funzione che ritorna i prodotti non paginati della sottocategoria passata come parametro
    public function getProdsBySubCat2($subCatId) {

        $prods = Product::whereIn('subCatId', $subCatId);

        return $prods;
    }



    //Funzione che ritorna tutti i prodotti appartenenti ad una categoria
    public function getProdsByCat($catId, $paged = 2) {
        //$prods = Product::whereIn('subCatId', $subCats);

        $prods = Product::whereHas('prodSubCat', function ($query) use ($catId) {
            $query->whereIn('catId', $catId);
        });
        return $prods->paginate($paged);
    }
}
