<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;


/**
 * Routes disponibles pour chaque groupe :
 * - Administrateur :
 *   - Tableau de bord : GET /admin (nommée `admin.dashboard`)
 *   - Formations :
 *     - Liste : GET /admin/formations (nommée `admin.formations.index`)
 *     - Création : GET /admin/formations/create (nommée `admin.formations.create`)
 *     - Enregistrement : POST /admin/formations (nommée `admin.formations.store`)
 *     - Détail : GET /admin/formations/{formation} (nommée `admin.formations.show`)
 *     - Édition : GET /admin/formations/{formation}/edit (nommée `admin.formations.edit`)
 *     - Mise à jour : PUT /admin/formations/{formation} (nommée `admin.formations.update`)
 *     - Suppression : DELETE /admin/formations/{formation} (nommée `admin.formations.destroy`)
 *   - Intervenants :
 *     - Liste : GET /admin/intervenants (nommée `admin.intervenants.index`)
 *     - Création : GET /admin/intervenants/create (nommée `admin.intervenants.create`)
 *     - Enregistrement : POST /admin/intervenants (nommée `admin.intervenants.store`)
 *     - Détail : GET /admin/intervenants/{intervenant} (nommée `admin.intervenants.show`)
 *     - Édition : GET /admin/intervenants/{intervenant}/edit (nommée `admin.intervenants.edit`)
 *     - Mise à jour : PUT /admin/intervenants/{intervenant} (nommée `admin.intervenants.update`)
 *     - Suppression : DELETE /admin/intervenants/{intervenant} (nommée `admin.intervenants.destroy`)
 *   - Domaines :
 *     - Liste : GET /admin/domaines (nommée `admin.domaines.index`)
 *     - Création : GET /admin/domaines/create (nommée `admin.domaines.create`)
 *     - Enregistrement : POST /admin/domaines (nommée `admin.domaines.store`)
 *     - Détail : GET /admin/domaines/{domaine} (nommée `admin.domaines.show`)
 *     - Édition : GET /admin/domaines/{domaine}/edit (nommée `admin.domaines.edit`)
 *     - Mise à jour : PUT /admin/domaines/{domaine} (nommée `admin.domaines.update`)
 *     - Suppression : DELETE /admin/domaines/{domaine} (nommée `admin.domaines.destroy`)
 *   - Sessions :
 *     - Liste : GET /admin/sessions (nommée `admin.sessions.index`)
 *     - Création : GET /admin/sessions/create (nommée `admin.sessions.create`)
 *     - Enregistrement : POST /admin/sessions (nommée `admin.sessions.store`)
 *     - Détail : GET /admin/sessions/{session} (nommée `admin.sessions.show`)
 *     - Édition : GET /admin/sessions/{session}/edit (nommée `admin.sessions.edit`)
 *     - Mise à jour : PUT /admin/sessions/{session} (nommée `admin.sessions.update`)
 *     - Suppression : DELETE /admin/sessions/{session} (nommée `admin.sessions.destroy`)
 * - Utilisateur :
 *   - Tableau de bord : GET /user (nommée `user.dashboard`)
 * - Utilisateurs authentifiés :
 *   - Déconnexion : POST /logout (nommée `user.logout`)
 *   - Profil : GET /profile (nommée `user.profile`)
 *  - Formations : GET /formations (nommée `user.formations`)
 *  - Inscription : GET /inscription (nommée `user.inscription`)
 *  - Inscription : POST /inscription (nommée `user.inscription`)
 *  - Inscription : POST /delete/{id} (nommée `user.delete`)
 *  - Télécharger PDF : GET /telechargerPdf (nommée `user.telechargerPdf`)
 * - Utilisateurs invités :
 *   - Accueil : GET / (nommée `home`)
 *   - Connexion : GET /login
 *   - Authentification : POST /login (nommée `login`)
 *   - Contact : GET /contact
 */



/**
 * Routes pour la section administrateur.
 * Les routes sont protégées par le middleware 'auth' et 'isAdmin'.
 * Les routes sont préfixées par 'admin'.
 */
Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    // Routes de ressources pour la gestion des formations
    Route::resource('/formations', 'Admin\FormationController');

    // Routes de ressources pour la gestion des intervenants
    Route::resource('/intervenants', 'Admin\IntervenantController');

    // Routes de ressources pour la gestion des domaines
    Route::resource('/domaines', 'Admin\DomaineController');

    // Routes de ressources pour la gestion des sessions
    Route::resource('/sessions', 'Admin\SessionController');

    Route::resource('/inscriptions', 'Admin\InscriptionController');

    // Routes de ressources pour la gestion des utilisateurs
    Route::resource('/users', 'Admin\UserController');
});

/**
 * Routes pour la section utilisateur.
 * Les routes sont protégées par le middleware 'auth' et 'isUser'.
 * Les routes sont préfixées par 'user'.
 */
Route::group(['middleware' => ['auth', 'isUser'], 'prefix' => 'user'], function () {
    Route::get('/', 'MainController@home')->name('user.dashboard');
});


/**
 * Routes pour les utilisateurs authentifiés.
 * Les routes sont protégées par le middleware 'auth'.
 */
Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');
    Route::get('/profil', 'ProfilController@show')->name('profil');
    Route::get('/formations', [FormationController::class, 'index']);
    Route::get('/inscription', 'InscriptionController@show')->name('inscription');
    Route::post('/inscription', 'InscriptionController@create');
    //delete a registration
    Route::post('/delete/{id}', 'InscriptionController@delete')->name('delete');
    Route::get('/telechargerPdf', 'FormationController@telechargerPdf')->name('telechargerPdf');

});

/**
 * Routes pour les utilisateurs invités.
 * Les routes sont protégées par le middleware 'guest'. Cela signifie que l'utilisateur ne doit pas être authentifié.
 */
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'MainController@home')->name('home');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/contact', 'ContactController@show');
});
