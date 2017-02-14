<?php

/**
 * Application Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register all of the routes for an application.
 * It's a breeze. Simply tell Laravel the URIs it should respond to
 * and give it the controller to call when that URI is requested.
 *
 */

use App\Http\Middleware\Authenticate;

/** @var \Illuminate\Routing\Router $router */

$router->get('/', function () {
    return view('welcome');
});

// Authentication routes...
$router->get('auth/login', 'Auth\AuthController@getLogin');
$router->post('auth/login', 'Auth\AuthController@postLogin')->name('login-request');
$router->get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');

// Registration routes...
$router->get('auth/register', 'Auth\AuthController@getRegister');
$router->post('auth/register', 'Auth\AuthController@postRegister')->name('registration-request');

$router->controllers(['password' => 'Auth\PasswordController']);

$router->get('themes/{page?}', 'ThemeController@index')
    ->where('page', '\d*')
    ->name('themes')
    ->middleware(Authenticate::class);

$router->post('theme/new', 'ThemeController@addEdit')
    ->name('theme-new')
    ->middleware(Authenticate::class);

$router->post('theme/{themeId}/edit', 'ThemeController@addEdit')
    ->where('themeId', '\d+')
    ->name('theme-edit')
    ->middleware(Authenticate::class);

$router->get('theme/{themeId}/words/{page?}', 'WordController@index')
    ->where('themeId', '\d+')
    ->where('page', '\d*')
    ->name('theme-words')
    ->middleware(Authenticate::class);

$router->post('word/new', 'WordController@addEdit')
    ->name('word-new')
    ->middleware(Authenticate::class);

$router->post('word/{wordId}/edit', 'WordController@addEdit')
    ->where('wordId', '\d+')
    ->name('word-edit')
    ->middleware(Authenticate::class);
