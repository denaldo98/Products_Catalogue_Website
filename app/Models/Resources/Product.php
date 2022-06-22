<?php
 
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'product';
    protected $primaryKey = 'prodId';

    protected $guarded = ['prodId'];
    public $timestamps = false;

    public function getPrice($withDiscount = false) {
        $price = $this->price;
        if (($this->discountPerc) != 0 && $withDiscount == true) {
            $discount = ($price * $this->discountPerc) / 100;
            $price = round($price - $discount, 2);
        }
        return $price;
    }




    public function prodSubCat() {
        return $this->hasOne(SubCategory::class, 'subCatId', 'subCatId');
    }
}

