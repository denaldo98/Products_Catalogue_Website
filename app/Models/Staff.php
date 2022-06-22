<?php

namespace App\Models;

use App\Models\Resources\SubCategory;
use App\Models\Resources\Product;
use App\Models\Resources\Category;

//Application Model per le funzionalità dello Staff
class Staff {

    public function getSubCats() {
        return SubCategory::all();
    }

    public function getProds() {
        return Product::all();
    }

    public function getCats() {
        return Category::all();
    }

    public function getProdById($prodId) {
        return Product::where('prodId', $prodId)->first();
    }

}
