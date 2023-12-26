<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;

// Routes pour les invités
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', 'MainController@home');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/contact', 'ContactController@show');  
});

// Routes pour les utilisateurs authentifiés
Route::group(['middleware' => 'auth'], function() {
    Route::get('/menu', 'MenuController@home')->name('menu');
    Route::post('/logout', 'Auth\LoginController@logout');
    Route::get('/formations', [FormationController::class, 'index']);
    Route::get('/inscription', 'InscriptionController@show')->name('inscription');
    Route::post('/inscription', 'InscriptionController@create');
    //delete a registration
    Route::post('/delete/{id}', 'InscriptionController@delete')->name('delete');
    Route::get('/telechargerPdf', 'FormationController@telechargerPdf')->name('telechargerPdf');
    Route::get('/profil', 'ProfilController@show')->name('profil');
});

// Routes administrateur
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function() {
    Route::get('/', 'Admin\DashboardController@index');

    // Gestion des formations en utilisant Route::resource
    Route::resource('/formations', 'Admin\FormationController');

    // Routes similaires pour les Intervenants en utilisant Route::resource
    Route::resource('/intervenants', 'Admin\IntervenantController');

    // Gestion des domaines en utilisant Route::resource
    Route::resource('/domaines', 'Admin\DomaineController');

    // Gestion des sessions en utilisant Route::resource
    Route::resource('/sessions', 'Admin\SessionController');
});

