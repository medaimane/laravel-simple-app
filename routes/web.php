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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('public.posts');
Route::get('/pages/{page}', 'PagesController@index')->name('pages.page');

Auth::routes();

Route::prefix('admin')->group(function () {
    // Matches The "/admin/users" URL
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('profile/{username}','UsersController@profile')->name('users.profile');
        Route::resource('posts', 'PostsController');
        Route::resource('countries', 'CountriesController');
        Route::resource('roles', 'RolesController');
        Route::resource('users', 'UsersController');
    });
});

// Fallback Routes
Route::fallback(function () {
    return abort(501);
});

// +++++-----+++++++

// Route::get('users/{id}/posts', function ($id) {
//     $user = App\User::findOrFail($id);
//     return $user->posts;
//     // $posts = App\Post::OrdreBy('created_at', 'desc')->paginator(10);
//     return view('posts.index')->with('posts', $user->posts);
// });

// Route Prefixes
// Route::prefix('admin')->group(function () {
//     Route::get('users', function () {
//         // Matches The "/admin/users" URL
//     });
// });

// Sub-Domain Routing
// Route::domain('{account}.myapp.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });

// Namespaces
// Route::namespace('Admin')->group(function () {
//     // Controllers Within The "App\Http\Controllers\Admin" Namespace
// });

// Redirect Route
// Route::redirect('/here', '/there', 301);

// View Routes
// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


// Route Group
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second Middleware
//     });

//     Route::get('user/profile', function () {
//         // Uses first & second Middleware
//     });
// });

// Current Route
// $route = Route::current();

// $name = Route::currentRouteName();

// $action = Route::currentRouteAction();