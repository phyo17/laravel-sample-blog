<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// category
Route::get('getallcategory',[ApiController::class,'getallcategory']);
Route::post('insertcategory',[ApiController::class,'insertcategory']);
Route::get('editcategory/{id}',[ApiController::class,'editcategory']);
Route::post('updatecategory/{id}',[ApiController::class,'updatecategory']);
Route::delete('deletecategory/{id}',[ApiController::class,'deletecategory']);

// post
Route::get('getallpost',[ApiController::class,'getallpost']);
Route::post('insertpost',[ApiController::class,'insertpost']);
Route::get('editpost/{id}',[ApiController::class,'editpost']);
Route::post('updatepost/{id}',[ApiController::class,'updatepost']);
Route::delete('deletepost/{id}',[ApiController::class,'deletepost']);

