<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::resource('cars', CarController::class)->middleware('auth');
    Route::post('cars', [CarController::class, 'store'])->middleware('auth');
    Route::prefix('/cars')->group( function (){
//        Route::resource('posts', PostController::class);
        Route::get('/{id}/details', [PostController::class, 'index'])->name('carInfo');
        Route::get('/{id}/posts', [PostController::class, 'show'])->name('carPosts');
        Route::post('/{id}/posts', [PostController::class, 'store'])->name('addPost');
        Route::delete('/delete-post/{id}', [PostController::class, 'destroy'])->name('post_delete');
        Route::post('/cars/{car_id}/posts/{post_id}', [PostController::class, 'edit'])->name('editPost');

//        Route::put('/cars/{car_id}/posts/{post_id}', [PostController::class, 'update'])->name('post_update');
//        Route::get('edit', [CarController::class, 'edit'])->middleware('auth');
//        Route::post('update', [CarController::class, 'update'])->middleware('auth');
//        Route::get('details', [CarController::class, 'show'])->middleware('auth');
    });

});
