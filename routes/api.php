<?php

use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\SignUpController;
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

Route::post('login', [LoginController::class, 'login']);

Route::post('users', [SignUpController::class, 'signup']);
Route::get('users', [UserController::class, 'users']);
Route::get('users/{id}', [UserController::class, 'user']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::post('truyen', [TruyenController::class, 'add']);
Route::get('truyen', [TruyenController::class, 'truyens']);
Route::get('truyen/{id}', [TruyenController::class, 'truyen']);
Route::put('truyen/{id}', [TruyenController::class, 'edit']);
Route::DELETE('truyen/{id}', [TruyenController::class, 'delete']);

Route::post('binhluan', [CommentController::class, 'add']);
Route::get('binhluan/{id}', [CommentController::class, 'comment']);
Route::put('binhluan/{id}', [CommentController::class, 'edit']);
Route::DELETE('binhluan/{id}', [CommentController::class, 'delete']);