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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/posts', [PostTestController::class, 'index']);
// Route::get('/posts/{id}', [PostTestController::class, 'show']);




//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! OBRATI PAZNJU
//ova linija je bila greska
//Route::resource('posts', [PostController::class]);
//drugi parametar kod resource-a nema niz vec samo PostController::class
// Route::resource('posts', PostController::class);
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']);



Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{id}', [ServiceController::class, 'show']);



Route::resource('reviews', ReviewController::class)->only(['index']);


Route::get('/service/{id}/review', [ServiceReviewController::class, 'index'])->name('service.review.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::delete('review/{id}', [ReviewController::class, 'destroy']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });


Route::post('/logout', [AuthController::class, 'logout']);
});


// Route::post('/register', [AuthController::class, 'register']);

// Route::post('/login', [AuthController::class, 'login']);