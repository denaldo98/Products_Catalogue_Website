<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {

    protected $table = 'subcategory';
    protected $primaryKey = 'subCatId';

    protected $guarded = ['subCatId'];
    public $timestamps = false;

    public function catSubCat() {
        return $this->hasOne(Category::class, 'catId', 'catId');
    }
}
