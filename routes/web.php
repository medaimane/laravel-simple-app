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

Route::get('/', 'HomeController@index');

Route::get('users/{id}/posts', function ($id) {
    
    $user = App\User::findOrFail($id);
    

    return $user->posts;
    // $posts = App\Post::OrdreBy('created_at', 'desc')->paginator(10);
    return view('posts.index')->with('posts', $user->posts);
});
Auth::routes();

// Route::group();

Route::resource('posts', 'PostsController');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
