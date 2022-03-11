<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ImageUpload;

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

//Route::get('/', function () {
//    return view('home');
//});
//Route::get('/homepage1', function () {
   // return view('welcome');
//});
Route::get('/posts', function () {
    return view('posts.index');
});
Route::get('/', function () {
    return view('demo');
});
Route::get('/maps', function () {
    return view('maps');
});
//Route::get('/', function () {
 //   return view('home-not-logged-in');
//});
Route::get('/about', function () {
    return view('about');
});
Route::get('/membership', function () {
    return view('membership');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/events', function () {
    return view('events');
});
Route::get('/events-detail', function () {
    return view('events-detail');
});

Auth::routes();

//Main Site Pages - Logged In Corporate/CSO

Route::get('/resources', function () {
    return view('resources');
});
Route::get('/resources-detail', function () {
    return view('resources-detail');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/projects-detail', function () {
    return view('projects-detail');
});


// Stripe subscription

Route::get('/subscribe', 'SubscriptionController@showSubscription');
Route::post('/seller/subscribe', 'SubscriptionController@processSubscription');
// welcome page only for subscribed users
Route::get('/welcome', 'SubscriptionController@showWelcome')->middleware('subscribed');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//File Upload
Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

//Image Upload
Route::get('/image-upload', [ImageUpload::class, 'createForm']);
Route::post('/image-upload', [ImageUpload::class, 'imageUpload'])->name('imageUpload');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
