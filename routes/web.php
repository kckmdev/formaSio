<?php

use Illuminate\Support\Facades\Route;


// Routes administrateur
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    // Gestion des formations en utilisant Route::resource
    Route::resource('/formations', 'Admin\FormationController');

    // Routes similaires pour les Intervenants en utilisant Route::resource
    Route::resource('/intervenants', 'Admin\IntervenantController');

    // Gestion des domaines en utilisant Route::resource
    Route::resource('/domaines', 'Admin\DomaineController');

    // Gestion des sessions en utilisant Route::resource
    Route::resource('/sessions', 'Admin\SessionController');
});

Route::group(['middleware' => ['auth', 'isUser'], 'prefix' => 'user'], function () {
    Route::get('/', 'MainController@home')->name('user.dashboard');
});


Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::get('/profile', 'UserController@show')->name('user.profile');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'MainController@home')->name('home');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/contact', 'ContactController@show');
});
