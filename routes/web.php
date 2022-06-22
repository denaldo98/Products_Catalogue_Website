<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Rotte pubbliche

Route::get('/', 'PublicController@showCatalog1')
        ->name('catalog1');

Route::get('/selCat/{catId}', 'PublicController@showCatalog2')
        ->name('catalog2');

Route::get('/selCat/{catId}/selSubCat/{subCatId}/{search?}', 'PublicController@showCatalog3')
        ->name('catalog3');

Route::view('/who', 'who')
        ->name('who');

Route::view('/site', 'site')
        ->name('site');

Route::view('/contacts', 'contacts')
        ->name('contacts');

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');



//Rotta per la ricerca per utenti GUEST e USER

Route::post('/search', 'PublicController@showCatalog3search')
        ->name('catalog3search');



//Rotte specifiche per l'utente USER

Route::view('/profile', 'users.edit')
        ->name('showprofile')
        ->middleware('can:isUser');

Route::post('/modifyProfile', 'UserController@updateProfile')
        ->name('modifyprofile');

Route::post('/modifyPassword', 'UserController@updatePassword')
        ->name('modifypassword');



//Rotte specifiche per l'utente STAFF

Route::get('/newProduct', 'StaffController@addProduct')
        ->name('newproduct');

Route::post('/newProduct', 'StaffController@storeProduct')
        ->name('newproduct.store');

Route::get('/productsListModify', 'StaffController@productsToModify')
        ->name('productstomodify');

Route::get('/modifyProduct', 'StaffController@modifyProduct')
        ->name('modifyproduct');

Route::post('/modifyProduct', 'StaffController@storeModifiedProduct')
        ->name('modifyproduct.store');

Route::get('/productsListDelete', 'StaffController@productsToDelete')
        ->name('productstodelete');

Route::post('/deleteProduct', 'StaffController@deleteProduct')
        ->name('deleteProduct');

Route::view('/newCategory', 'cat.insertCat')
        ->name('newcategory')
        ->middleware('can:isStaff');

Route::post('/newCategory', 'StaffController@storeCategory')
        ->name('newcategory.store');

Route::get('/newSubCategory', 'StaffController@addSubCategory')
        ->name('newsubcategory');

Route::post('/newSubCategory', 'StaffController@storeSubCategory')
        ->name('newsubcategory.store');


//Funzione di ricerca prodotti nelle liste
Route::get('/search','StaffController@tableSearch')
        ->name('search');



//Rotte specifiche per l'utente ADMIN

Route::get('/usersList', 'AdminController@usersToDelete')
        ->name('userstodelete');

Route::post('/deleteUsers', 'AdminController@deleteUsers')
        ->name('deleteUsers');

Route::view('/newStaff', 'admin.newStaff')
        ->name('newstaff')
        ->middleware('can:isAdmin');

Route::post('/newStaff', 'AdminController@storeStaff')
        ->name('newstaff.store');

Route::get('/staffListDelete', 'AdminController@staffToDelete')
        ->name('stafftodelete');

Route::post('/deleteStaff', 'AdminController@deleteStaff')
        ->name('deleteStaff');

Route::get('/staffListModify', 'AdminController@staffToModify')
        ->name('stafftomodify');

Route::get('/modifyStaff', 'AdminController@modifyStaff')
        ->name('modifystaff');

Route::post('/modifyStaff', 'AdminController@storeModifiedStaff')
        ->name('modifystaff.store');

Route::post('/modifyStaffPassword', 'AdminController@updateStaffPassword')
        ->name('modifystaffpassword');
