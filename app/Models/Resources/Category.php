<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'category';
    protected $primaryKey = 'catId';

    protected $guarded = ['catId'];
    public $timestamps = false;
}



