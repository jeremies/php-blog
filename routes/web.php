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

Route::get('/', ['middleware' => 'auth', function () {
        $posts = Auth::user()
                ->posts()
                ->orderBy('created_at')
                ->get();
        return view('posts', ['posts' => $posts]);
    }]);

Route::get('/new', ['middleware' => 'auth', function () {
        return view('new');
    }]);

// Registration routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// Authentication routes
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::post('/new', 'Post\PostController@createPost');

