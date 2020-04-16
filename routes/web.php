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

// Home page
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Authentication Routes...
Route::prefix('connexion')->group(function () {
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Auth\LoginController@login');
});
Route::post('deconnexion', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::prefix('enregistrement')->group(function () {
    Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/', 'Auth\RegisterController@register');
});

// Password Reset Routes...
Route::prefix('passe')->group(function () {
    Route::get('change', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('change/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('change', 'Auth\ResetPasswordController@reset')->name('password.update');
});

Route::resource('annonces', 'AdController')
    ->parameters([
        'annonces' => 'ad'
    ])->except([
        'index', 'show', 'destroy'
]);

Route::prefix('annonces')->group(function () {
    Route::get('voir/{ad}', 'AdController@show')->name('annonces.show');
    Route::get('{region?}/{departement?}/{commune?}', 'AdController@index')->name('annonces.index');
    Route::post('recherche', 'AdController@search')->name('annonces.search')->middleware('ajax');
});

// Photos upload management and message
Route::middleware('ajax')->group(function () {
    Route::post('images-save', 'UploadImagesController@store')->name('save-images');
    Route::delete('images-delete', 'UploadImagesController@destroy')->name('destroy-images');
    Route::get('images-server','UploadImagesController@getServerImages')->name('server-images');
    Route::post('message', 'UserController@message')->name('message');
});

// Administration
    Route::prefix('admin_tickets')->group(function () {
  Route::get('/', 'AdminController@tickets')->name('admin.tickets');
});


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::prefix('messages')->group(function () {
        Route::get('/', 'AdminController@messages')->name('admin.messages');
        Route::post('approve/{message}', 'AdminController@messageApprove')->name('admin.message.approve');
        Route::post('refuse', 'AdminController@messageRefuse')->name('admin.message.refuse');
    });
    Route::prefix('annonces')->group(function () {
        Route::get('/', 'AdminController@ads')->name('admin.ads');
        Route::get('obsoletes', 'AdminController@obsoletes')->name('admin.obsoletes');
        Route::middleware('ajax')->group(function () {
            Route::post('approve/{ad}', 'AdminController@approve')->name('admin.approve');
            Route::post('refuse', 'AdminController@refuse')->name('admin.refuse');
        });
    });

});

// Admin and user
Route::prefix('admin/annonces')->group(function () {
    Route::middleware('ajax')->group(function () {
        Route::post('addweek/{ad}', 'AdminController@addWeek')->name('admin.addweek');
        Route::delete('destroy/{ad}', 'AdminController@destroy')->name('admin.destroy');
    });
});

// User
Route::prefix('user_tickets')->group(function () {
Route::get('/', 'UserController@tickets')->name('user.tickets');
});
Route::prefix('utilisateur')->middleware('user')->group(function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::prefix('annonces')->group(function () {
        Route::get('actives', 'UserController@actives')->name('user.actives');
        Route::get('obsoletes', 'UserController@obsoletes')->name('user.obsoletes');
        Route::get('attente', 'UserController@attente')->name('user.attente');
    });
    Route::prefix('profil')->group(function () {
        Route::get('email', 'UserController@emailEdit')->name('user.email.edit');
        Route::put('email', 'UserController@emailUpdate')->name('user.email.update');
        Route::get('adresse', 'UserController@adresseEdit')->name('user.adresse.edit');
        Route::put('adresse', 'UserController@adresseUpdate')->name('user.adresse.update');
        Route::get('donnees', 'UserController@data')->name('user.data');
    });
});

// Legal
Route::view('legal', 'legal')->name('legal');
Route::view('confidentialite', 'confidentialite')->name('confidentialite');


//perso

Route::view('support', 'support')->name('support');
Route::middleware('ajax')->group(function () {
    Route::post('support', 'SupportController@message')->name('message');
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('map', 'MapController@index');
//autre tuto
use Illuminate\Support\Facades\Auth;
/* posts */
Route::get('/posts', 'PostController@index');
Route::get('posts/create', 'PostController@create');
Route::put('posts/create', 'PostController@insert');
Route::get('/posts/{id}', 'PostController@view');
Route::get('/posts/{id}/edit', 'PostController@edit');
Route::post('posts/{id}/update', 'PostController@update');
Route::delete('posts/{id}/delete', 'PostController@delete');


Route::get('new-ticket', 'TicketsController@create');

Route::post('new-ticket', 'TicketsController@store');

Route::get('my_tickets', 'TicketsController@userTickets');

Route::get('tickets/{ticket_id}', 'TicketsController@show');

Route::post('comment', 'CommentsController@postComment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){

Route::get('tickets', 'TicketsController@index');

Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});
