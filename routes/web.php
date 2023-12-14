<?php

use Illuminate\Support\Facades\Route;

// Page d'accueil  
Route::get('/', function () {
    return view('welcome');
});

// Page de connexion 
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');  

// Page administrateur
Route::get('/admin', 'AdminController@index')->name('admin');

// Gestion des formations 
Route::resource('/formations', 'FormationController');

// Gestion des intervenants
Route::resource('/intervenants', 'IntervenantController');

// Gestion des domaines  
Route::resource('/domaines', 'DomaineController');

// Gestion des sessions
Route::resource('/sessions', 'SessionController'); 

// Statistiques
Route::get('/stats', 'StatController@index');  

// Mentions légales
Route::get('/legal', 'LegalController@index');

// Contact 
Route::get('/contact', 'ContactController@index');

