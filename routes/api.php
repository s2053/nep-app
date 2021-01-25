<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;

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
    dd('asdas');
});

Route::get('/getcatposts/stories', [DataController::class, 'getstories']);
Route::get('/getcatposts/poems', [DataController::class, 'getpoems']);
Route::get('/getcatposts/history', [DataController::class, 'gethistory']);
Route::get('/getcatposts/graphics', [DataController::class, 'getgraphics']);
