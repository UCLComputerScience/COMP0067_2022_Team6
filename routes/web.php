<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResourceControllerAdmin;

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
Route::get('/gdpr', function () {
    return view('/guest/gdpr');
});


// User views

Route::get('/login-events', function () {
    return view('user/login-events');
})->middleware('auth');

Route::get('/events-detail/{event_id}', function () {
    return view('/user/events-detail');})->where('event_id', '.*')->middleware('auth');

Route::any('/storage/app/public/images/{first_image_path_stripped}', function () {
    return view('/public/storage/app/public/images');})->where('first_image_path_stripped', '.*')->middleware('auth');

Route::get('/past-events', function () {
    return view('/user/past-events');
})->middleware('auth');

Route::get('/projects-create', function () {
    return view('/user/projects-create');
})->middleware('auth');

Route::post('/projects-create-result', function () {
    return view('/user/projects-create-result');
})->middleware('auth');

Route::post('/projects-edit-result', function () {
    return view('/user/projects-edit-result');
})->middleware('auth');

Route::get('/test', function () {
    return view('/user/test');
})->middleware('auth');

Route::get('/projects-my', function () {
    return view('/user/projects-my');
})->middleware('auth');

Route::get('/user-profile', function () {
    return view('/user/user-profile');
})->middleware('auth');

Route::post('/user-profile-result', function () {
    return view('/user/user-profile-result');
});

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/resources', function () {
    return view('/user/resources');
})->middleware('auth');
Route::get('/resources-detail', function () {
    return view('/user/resources-detail');
})->middleware('auth');
Route::get('/projects', function () {
    return view('/user/projects');
})->middleware('auth');

Route::get('/projects-detail/{project_id}',function (){
    return view('/user/projects-detail');})->where('project_id', '.*')->middleware('auth');


Route::any('/projects-delete/{project_id}',function (){
    return view('/user/projects-delete');})->where('project_id', '.*')->middleware('auth');


Route::any('/projects-edit/{project_id}',function (){
    return view('/user/projects-edit');})->where('project_id', '.*')->middleware('auth');

Route::get('/members', function () {
    return view('/user/members');
})->middleware('auth');

Route::get('/user-subscribe', function () {
    return view('/user/user-subscribe');})->middleware('auth');

Route::get('google-autocomplete', [GoogleController::class, 'index']);

//Stripe
Route::get('/user-subscribe', function () {
    return view('/user/user-subscribe');})->middleware('auth');

Route::get('/success', function () {
    return view('/user/success');})->middleware('auth');

Route::get('/checkoutNGO', function () {

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

    return redirect($url);})->middleware('auth');
    Route::get('/checkoutCorporate', function () {

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
            'price' => 'price_1Ka7h7LbAUO2h0p7Iu1EKPF8',
            // For metered billing, do not pass quantity
            'quantity' => 1,
          ]],
        ]);
        $url = $checkout_session['url'];

            return redirect($url);})->middleware('auth');


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

Route::post('/admin-events-create-result', function () {
    return view('/admin/admin-events-create-result');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-manage-events', function () {
    return view('/admin/admin-manage-events');
})->middleware(['auth', 'can:accessAdmin']);

Route::any('/admin-events-delete/{event_id}',function (){
    return view('/admin/admin-events-delete');})->where('event_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::get('/admin-events-edit/{event_id}', function () {
    return view('/admin/admin-events-edit');})->where('event_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::any('/admin-events-edit-result', function () {
    return view('/admin/admin-events-edit-result');
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



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {

$userRole = Auth::user()->role;

if ($userRole == 1) {

return view('admin/home');
        // Authentication was successful...
} elseif ($userRole == 2 ) {

return redirect('/user-subscribe');
        // Authentication was successful...
} elseif ($userRole == 3 ) {

return view('user/home');
        // Authentication was successful...
        }
else  {

echo "" ;
        // Authentication was successful...
        }

;})->middleware('auth');





//File Upload
Route::get('/file-upload', [FileUpload::class, 'createForm']);
Route::post('/file-upload', [FileUpload::class, 'fileUpload'])->name('fileUpload');

//Image Upload
Route::get('/image-upload', [ImageUpload::class, 'createForm']);
Route::post('/image-upload', [ImageUpload::class, 'imageUpload'])->name('imageUpload');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users/getUsers', [App\Http\Controllers\AdminController::class, "getUsers"])->name('users.getUsers');
Route::get('/admin', [App\Http\Controllers\AdminController::class, "index"]);

Route::get('admin-members', [UserController::class, 'index']);
Route::get('admin-members', 'App\Http\Controllers\UserController@index')->name('admin-members.index');
Route::delete('admin-members/{id}', 'App\Http\Controllers\UserController@destroy')->name('admin-members.destroy');
Route::get('edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::put('update-user/{id}', [App\Http\Controllers\UserController::class, 'update']);

Route::resource('projects-detail', 'App\Http\Controllers\FileController');
Route::get('projects-detail/{uuid}/download', 'App\Http\Controllers\FileController@download')->name('projects-detail.download');
Route::get('/projects-detail/{project_id}',[FileController::class, 'index'])->name('projects-detail.index');

Route::resource('resources', 'App\Http\Controllers\ResourceController');
Route::get('resources/{uuid}/download', 'App\Http\Controllers\ResourceController@download')->name('resources.download');
Route::get('resources',[ResourceController::class, 'index'])->name('resources.index');

Route::resource('admin-manage-resources', 'App\Http\Controllers\ResourceControllerAdmin');
Route::get('admin-manage-resources/{uuid}/download', 'App\Http\Controllers\ResourceControllerAdmin@download')->name('resources.download');
Route::get('admin-manage-resources',[ResourceControllerAdmin::class, 'index'])->name('resources.index');
Route::delete('admin-manage-resources/{uuid}', 'App\Http\Controllers\ResourceControllerAdmin@destroy')->name('resources.destroy');
