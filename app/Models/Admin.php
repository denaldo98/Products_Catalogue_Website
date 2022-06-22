<?php

namespace App\Models;

use App\Models\Resources\SubCategory;
use App\Models\Resources\Product;
use App\Models\Resources\Category;
use App\User;

//Application model per le funzionalità dell'Admin

class Admin {

    public function getStaff() {
        return User::where('role', 'staff')->get();
    }

    public function getUsers() {
        return User::where('role', 'user')->get();
    }


}
