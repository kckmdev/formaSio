<?php

use Illuminate\Support\Facades\Route;

// Routes pour les invités
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', 'MainController@home');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/contact', 'ContactController@show');  
});

// Routes pour les utilisateurs authentifiés
Route::group(['middleware' => 'auth'], function() {
    Route::post('/logout', 'Auth\LoginController@logout');
    Route::get('/profile', 'UserController@show');
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

// Gestion des sessions
Route::resource('/sessions', 'SessionController'); 

// Statistiques
Route::get('/stats', 'StatController@index');  

// Mentions légales
Route::get('/legal', 'LegalController@index');

// Contact 
Route::get('/contact', 'ContactController@index');

Route::post('/contact', 'ContactController@send');

});
