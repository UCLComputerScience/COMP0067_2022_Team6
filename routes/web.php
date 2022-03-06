<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/homepage', function () {
    return view('welcome');
});
Route::get('/posts', function () {
    return view('posts.index');
});
Route::get('/demo', function () {
    return view('demo');
});
Route::get('/maps', function () {
    return view('maps');
});

//Stripe

Route::get('/subscribe', 'SubscriptionController@showSubscription');
      Route::post('/subscribe', 'SubscriptionController@processSubscription');
      // welcome page only for subscribed users
      Route::get('/welcome', 'SubscriptionController@showWelcome')->middleware('subscribed');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

//Route::get('/home-logged-in', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
