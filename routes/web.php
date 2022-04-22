<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UIController;

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

Route::get('/home',[UIController::class,'homepage']);
Route::get('category/{id}',[UIController::class,'categorypage']);
Route::get('postdetail/{id}',[UIController::class,'postdetail']);
Route::post('search',[UIController::class,'search']);
Route::get('search',[UIController::class,'search']);


Route::group(['middleware'=>'auth'],function(){
    Route::get('adminpanel',function(){
        return view('admin.master');
    }); 
    
    //          <----- Admin ------->
// category
Route::get('category',[CategoryController::class,'index']);
Route::post('category',[CategoryController::class,'store']);
Route::get('edit_category/{id}',[CategoryController::class,'edit']);
Route::post('update_category/{id}',[CategoryController::class,'update']);
Route::get('delete_category/{id}',[CategoryController::class,'destroy']);
Route::get('status_category/{id}',[CategoryController::class,'status']);

// post
// Route::get('post/create',[PostController::class,'create']);
// Route::post('post',[PostController::class,'store']);
// Route::get('post',[PostController::class,'index']);
// Route::get('post/{id}',[PostController::class,'edit']);
// Route::put('post/{id}',[PostController::class,'update']);
// Route::delete('post/{id}',[PostController::class,'destroy']);
Route::resource('post',PostController::class);
Route::get('post_status/{id}',[PostController::class,'status']);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
