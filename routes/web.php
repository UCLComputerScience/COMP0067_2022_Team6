<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\AdminController;

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

Route::get('/posts', function () {
    return view('posts.index');
});
Route::get('/', function () {
    return view('/guest/demo');
});
Route::get('/maps', function () {
    return view('maps');
});

Route::get('/about', function () {
    return view('guest/about');
});
Route::get('/membership', function () {
    return view('/guest/membership');
});
Route::get('/contact', function () {
    return view('/guest/contact');
});
Route::get('/events', function () {
    return view('/guest/events');
});
Route::get('/login-events', function () {
    return view('login-events');
});
Route::get('/events-detail', function () {
    return view('/user/events-detail');
});
Route::get('/past-events', function () {
    return view('/user/past-events');
});
Route::get('/projects-create', function () {
    return view('/user/projects-create');
});

Route::get('/projects-edit', function () {
    return view('/user/projects-edit');
});

Route::get('/user-profile', function () {
    return view('/user/user-profile');
});

Auth::routes();

//Main Site Pages - Logged In Corporate/CSO

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/resources', function () {
    return view('/user/resources');
});
Route::get('/resources-detail', function () {
    return view('/user/resources-detail');
});
Route::get('/projects', function () {
    return view('/user/projects');
});
Route::get('/projects-detail', function () {
    return view('/user/projects-detail');
});
Route::get('/members', function () {
    return view('/user/members');
});

Route::get('admin-members', function () {
    return view('/admin/admin-members');
});

Route::get('admin-create-resources', function () {
    return view('/admin/admin-create-resources');
});

Route::get('admin-create-events', function () {
    return view('/admin/admin-create-events');
});

Route::get('admin-manage-events', function () {
    return view('/admin/admin-manage-events');
});

Route::get('admin-manage-resources', function () {
    return view('/admin/admin-manage-resources');
});

Route::get('admin-analytics', function () {
    return view('/admin/admin-analytics');
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


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users/getUsers', [App\Http\Controllers\AdminController::class, "getUsers"])->name('users.getUsers');
Route::get('/admin', [App\Http\Controllers\AdminController::class, "index"]);
