<?php

use App\Http\Controllers\API\AuthController;
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
Route::group(['prefix' => 'auth'], function () {
// Sign-up
    Route::post('register', [AuthController::class, 'register']);
// Login
    Route::post('login', [AuthController::class, 'authenticate']);
});
// Routes for Authenticated user
Route::group(['middleware' => ['jwt.verify']], function () {
    //  Logout
    Route::delete('logout', [AuthController::class, 'logout']);
    // Get Autheticated user
    Route::post('user', [AuthController::class, 'getAuthenticatedUser']);
});
