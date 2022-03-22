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
// Guest views

Route::get('/', function () {
    return view('/guest/demo');
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


// User views 

Route::get('/login-events', function () {
    return view('login-events');
})->middleware('auth');
Route::get('/events-detail', function () {
    return view('/user/events-detail');
})->middleware('auth');
Route::get('/past-events', function () {
    return view('/user/past-events');
})->middleware('auth');
Route::get('/projects-create', function () {
    return view('/user/projects-create');
});//->middleware('auth');

Route::post('/projects-create-result', function () {
    return view('/user/projects-create-result');
});

Route::get('/test', function () {
    return view('/user/test');
});
Route::get('/projects-my', function () {
    return view('/user/projects-my');
})->middleware('auth');
Route::get('/projects-edit', function () {
    return view('/user/projects-edit');
})->middleware('auth');

Route::get('/user-profile', function () {
    return view('/user/user-profile');
})->middleware('auth');

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/resources', function () {
    return view('/user/resources');
})->middleware('auth');
Route::get('/resources-detail', function () {
    return view('/user/resources-detail');
})->middleware('auth');
Route::get('/projects', function () {
    return view('/user/projects');
});//->middleware('auth');
Route::get('/projects-detail/{project_id}',function (){
    return view('/user/projects-detail');})->where('project_id', '.*');

//})->middleware('auth');
Route::get('/members', function () {
    return view('/user/members');
})->middleware('auth');

Route::get('/user-subscribe', function () {
    return view('/user/user-subscribe');});

 

//Stripe
Route::get('/user-subscribe', function () {
    return view('/user/user-subscribe');});

Route::get('/success', function () {
    return view('/user/success');})->middleware('auth');

Route::get('/checkout', function () {

require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));
//echo getenv('STRIPE_SECRET');
// The price ID passed from the front end.
//$priceId = $_POST['priceId'];
//$priceId = '{{PRICE_ID}}';

$checkout_session = \Stripe\Checkout\Session::create([
  'success_url' => 'http://127.0.0.1:8000/success',
      'cancel_url' => 'http://127.0.0.1:8000/cancel',
  'mode' => 'subscription',
  'line_items' => [[
    'price' => 'price_1Ka7hTLbAUO2h0p7oxGVMlab',
    // For metered billing, do not pass quantity
    'quantity' => 1,
  ]],
]);
$url = $checkout_session['url'];

    return redirect($url);});


// Admin views

Auth::routes();

Route::get('admin-members', function () {
    return view('/admin/admin-members');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-create-resources', function () {
    return view('/admin/admin-create-resources');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-create-events', function () {
    return view('/admin/admin-create-events');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-manage-events', function () {
    return view('/admin/admin-manage-events');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-manage-resources', function () {
    return view('/admin/admin-manage-resources');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-analytics', function () {
    return view('/admin/admin-analytics');
})->middleware(['auth', 'can:accessAdmin']);
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
