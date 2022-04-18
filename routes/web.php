<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ImageUpload;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileControllerAdmin;
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
Route::get('/events?*', function () {
    return view('/guest/events?*');
});
Route::get('/gdpr', function () {
    return view('/guest/gdpr');
});

// User views

Route::get('/login-events', function () {
    return view('user/login-events');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/login-events?*', function () {
    return view('/user/events?*');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/events-detail/{event_id}', function () {
    return view('/user/events-detail');})->where('event_id', '.*')->middleware(['auth', 'can:stripeUser']);


Route::get('public/assets/{first_image_path_stripped_second}', function () {
    return view('public/assets');})->where('$first_image_path_stripped_second', '.*')->middleware(['auth', 'can:stripeUser']);

Route::any('/storage/app/public/images/{first_image_path_stripped}', function () {
    return view('/public/storage/app/public/images');})->where('first_image_path_stripped', '.*')->middleware(['auth', 'can:stripeUser']);

Route::get('/past-events', function () {
    return view('/user/past-events');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/projects-create', function () {
    return view('/user/projects-create');
})->middleware(['auth', 'can:stripeUser']);

Route::post('/projects-create-result', function () {
    return view('/user/projects-create-result');
})->middleware(['auth', 'can:stripeUser']);

Route::any('/projects-edit-result', function () {
    return view('/user/projects-edit-result');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/test', function () {
    return view('/user/test');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/projects-my', function () {
    return view('/user/projects-my');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/projects-my?*', function () {
    return view('/user/projects-my?*');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/user-profile', function () {
    return view('/user/user-profile');
})->middleware(['auth', 'can:stripeUser']);


Route::post('/user-profile-result', function () {
    return view('/user/user-profile-result');})->middleware(['auth', 'can:stripeUser']);

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/resources', function () {
    return view('/user/resources');
})->middleware(['auth', 'can:stripeUser']);

Route::get('/resources-detail', function () {
    return view('/user/resources-detail');

})->middleware(['auth', 'can:stripeUser']);
Route::get('/projects', function () {
    return view('/user/projects');

})->middleware(['auth', 'can:stripeUser']);
Route::get('/projects*', function () {
    return view('/user/projects*');

})->middleware(['auth', 'can:stripeUser']);

Route::get('/projects-detail/{project_id}',function (){
    return view('/user/projects-detail');})->where('project_id', '.*')->middleware(['auth', 'can:stripeUser']);


Route::any('/projects-delete/{project_id}',function (){
    return view('/user/projects-delete');})->where('project_id', '.*')->middleware(['auth', 'can:stripeUser']);


Route::any('/projects-edit/{project_id}',function (){
    return view('/user/projects-edit');})->where('project_id', '.*')->middleware(['auth', 'can:stripeUser']);

Route::get('/members', function () {
    return view('/user/members');})->middleware(['auth', 'can:stripeUser']);

Route::get('/user-subscribe', function () {
    return view('/user/user-subscribe');})->middleware(['auth', 'can:stripeUser']);

Route::get('google-autocomplete', [GoogleController::class, 'index']);

//Stripe

Route::get('/user-subscribe', function () {
    return view('/user/user-subscribe');})->middleware('auth');

Route::get('/success/{id}', function () {
  
return view('/user/success');})->where('id', '.*')->middleware('auth');

Route::get('/cancel', function () {
  
    return view('/user/cancel');})->middleware('auth');

Route::get('/checkoutNGO', function () {

require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));
$id = Auth::user()->id;
$checkout_session = \Stripe\Checkout\Session::create([
  'success_url' => 'http://51.142.117.217/success/'.$id,
      'cancel_url' => 'http://51.142.117.217/cancel',
  'mode' => 'subscription',
  'line_items' => [[
    'price' => 'price_1Ka7hTLbAUO2h0p7oxGVMlab',
    'quantity' => 1,
  ]],
]);
$url = $checkout_session['url'];

    return redirect($url);})->middleware('auth');
    Route::get('/checkoutCorporate', function () {

        require '../vendor/autoload.php';
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));
        $id = Auth::user()->id;
        $checkout_session = \Stripe\Checkout\Session::create([
          'success_url' => 'http://51.142.117.217/success/'.$id,
              'cancel_url' => 'http://51.142.117.217/cancel',
          'mode' => 'subscription',
          'line_items' => [[
            'price' => 'price_1Ka7h7LbAUO2h0p7Iu1EKPF8',
            'quantity' => 1,
          ]],
        ]);
        
        $url = $checkout_session['url'];

            return redirect($url);})->middleware('auth');

// Admin views

Auth::routes();

Route::any('/admin-events-delete/{event_id}',function (){
    return view('/admin/admin-events-delete');})->where('event_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-members', function () {
    return view('/admin/admin-members');
})->middleware('auth');

Route::get('admin-create-resources', function () {
    return view('/admin/admin-create-resources');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-create-events', function () {
    return view('/admin/admin-create-events');
})->middleware(['auth', 'can:accessAdmin']);

Route::post('/admin-events-create-result', function () {
    return view('/admin/admin-events-create-result');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('/admin-projects-manage', function () {
    return view('/admin/admin-projects-manage');
})->middleware(['auth', 'can:accessAdmin']);

Route::any('/admin-projects-delete/{project_id}',function (){
    return view('/admin/admin-projects-delete');})->where('project_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::get('/admin-projects-detail/{project_id}',function (){
    return view('/admin/admin-projects-detail');})->where('project_id', '.*')->middleware(['auth', 'can:accessAdmin']);
    
Route::get('admin-manage-events', function () {
    return view('/admin/admin-manage-events');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('/admin-manage-events?*', function () {
    return view('/admin/admin-manage-events?*');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('/admin-events-detail/{event_id}', function () {
    return view('/admin/admin-events-detail');;})->where('event_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::any('/admin-events-delete/{event_id}',function (){
    return view('/admin/admin-events-delete');})->where('event_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::get('/admin-events-edit/{event_id}', function () {
    return view('/admin/admin-events-edit');})->where('event_id', '.*')->middleware(['auth', 'can:accessAdmin']);

Route::any('/admin-events-edit-result', function () {
    return view('/admin/admin-events-edit-result');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('admin-manage-resources', function () {
    return view('/admin/admin-manage-resources');
})->middleware('auth');

Route::get('admin-analytics', function () {
    return view('/admin/admin-analytics');
})->middleware(['auth', 'can:accessAdmin']);

Route::get('/subscribe', 'SubscriptionController@showSubscription');
Route::post('/seller/subscribe', 'SubscriptionController@processSubscription');

Route::get('/welcome', 'SubscriptionController@showWelcome')->middleware('subscribed');

Route::get('/home', function () {

$userRole = Auth::user()->role;

if ($userRole == 1) {

return view('admin/home');

} elseif ($userRole == 2 ) {

return redirect('/user-subscribe');

} elseif ($userRole == 3 ) {

return view('user/home');
        
        }
else  {

echo "" ;

}

;})->middleware('auth');

//File Upload
Route::get('/file-upload', [FileUpload::class, 'createForm']);
Route::post('/file-upload', [FileUpload::class, 'fileUpload'])->name('fileUpload');

//Image Upload
Route::get('/image-upload', [ImageUpload::class, 'createForm']);
Route::post('/image-upload', [ImageUpload::class, 'imageUpload'])->name('imageUpload');

Route::get('users/getUsers', [App\Http\Controllers\AdminController::class, "getUsers"])->name('users.getUsers');
Route::get('/admin', [App\Http\Controllers\AdminController::class, "index"]);

Route::get('admin-members', [UserController::class, 'index'])->middleware(['auth', 'can:accessAdmin']);
Route::get('admin-members', 'App\Http\Controllers\UserController@index')->name('admin-members.index')->middleware(['auth', 'can:accessAdmin']);
Route::delete('admin-members/{id}', 'App\Http\Controllers\UserController@destroy')->name('admin-members.destroy')->middleware(['auth', 'can:accessAdmin']);
Route::get('edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['auth', 'can:accessAdmin']);
Route::put('update-user/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['auth', 'can:accessAdmin']);

Route::resource('projects-detail', 'App\Http\Controllers\FileController');
Route::get('projects-detail/{uuid}/download', 'App\Http\Controllers\FileController@download')->name('projects-detail.download');
Route::get('/projects-detail/{project_id}',[FileController::class, 'index'])->name('projects-detail.index');

Route::resource('admin-projects-detail', 'App\Http\Controllers\FileControllerAdmin');
Route::get('admin-projects-detail/{uuid}/download', 'App\Http\Controllers\FileControllerAdmin@download')->name('admin-projects-detail.download');
Route::get('/admin-projects-detail/{project_id}',[FileControllerAdmin::class, 'index'])->name('admin-projects-detail.index');

Route::resource('resources', 'App\Http\Controllers\ResourceController');
Route::get('resources/{uuid}/download', 'App\Http\Controllers\ResourceController@download')->name('resources.download');
Route::get('resources',[ResourceController::class, 'index'])->name('resources.index');

Route::resource('admin-manage-resources', 'App\Http\Controllers\ResourceControllerAdmin')->middleware('auth');
Route::get('admin-manage-resources/{uuid}/download', 'App\Http\Controllers\ResourceControllerAdmin@download')->name('resources.download')->middleware('auth');
Route::get('admin-manage-resources',[ResourceControllerAdmin::class, 'index'])->name('resources.index')->middleware('auth');
Route::delete('admin-manage-resources/{uuid}', 'App\Http\Controllers\ResourceControllerAdmin@destroy')->name('resources.destroy')->middleware('auth');

Route::get('info', function () {
    return view('user/info.php');});