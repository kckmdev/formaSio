<?php

use Illuminate\Support\Facades\Route;


// Routes pour les utilisateurs authentifiés
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

    Route::group(['middleware' => ['auth', 'isUser']], function () {
        Route::get('/', 'MainController@home')->name('user.home');
    });



    // Routes administrateur
    Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
        Route::get('/admin', 'Admin\DashboardController@index')->name('admin.dashboard');

        // Gestion des formations en utilisant Route::resource
        Route::resource('/formations', 'Admin\FormationController');

        // Routes similaires pour les Intervenants en utilisant Route::resource
        Route::resource('/intervenants', 'Admin\IntervenantController');

        // Gestion des domaines en utilisant Route::resource
        Route::resource('/domaines', 'Admin\DomaineController');

        // Gestion des sessions en utilisant Route::resource
        Route::resource('/sessions', 'Admin\SessionController');
    });

    Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
    Route::get('/profile', 'UserController@show')->name('user.profile');

});



Route::get('/', 'MainController@home')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/contact', 'ContactController@show');

