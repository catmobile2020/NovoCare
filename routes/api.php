<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->name('api.v1.')->namespace('API\V1')->group(function () {
    Route::get('configurations', 'ConfigController@index');

    Route::get('posts', 'PostController@index');
    Route::get('posts/show', 'PostController@show');

    Route::get('faqs', 'FAQController@index');

    Route::get('abouts', 'AboutController@index');
    Route::get('terms', 'TermsController@index');
    Route::get('privacy', 'PrivacyController@index');

    Route::post('contact/store', 'ContactController@store');

    Route::get('surveys', 'SurveyController@index');

    Route::fallback(function () {
        return response()->json([
            'message' => 'End Point Not found'
        ], 404);
    })->name('fallback');
});
