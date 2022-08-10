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

Auth::routes([
    'register' => false
]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::patch('/posts/{post}/restore', 'PostController@restore')->name('posts.restore');

Route::resource('faqs', 'FAQController');
Route::patch('/faqs/{faq}/restore', 'FAQController@restore')->name('faqs.restore');

Route::resource('users', 'UserController')->only(['show', 'edit', 'update', 'index']);

Route::resource('contacts', 'ContactController');
Route::patch('/contacts/{contact}/restore', 'ContactController@restore')->name('contacts.restore');

Route::resource('homes', 'HomeScreenController');

Route::resource('abouts', 'AboutController');

Route::resource('privacies', 'PrivacyController');

Route::resource('terms', 'TermsController');

Route::resource('activities', \App\Http\Controllers\ActivityController::class);
Route::resource('devices', \App\Http\Controllers\DeviceController::class);

Route::get('/optimize/clear', function () {
    \DB::table('activities')->truncate();
    \DB::table('devices')->truncate();
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('migrate');
//        \Artisan::call('storage:link');
    return redirect()->back()->with('status', 200);
})->name('optimize.clear');
