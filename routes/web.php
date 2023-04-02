<?php

use App\Http\Controllers\Admin\Chuong\ChuongController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Photo\PhotoController;
use App\Http\Controllers\Admin\Truyen\TruyenController;
use App\Http\Controllers\Admin\Type\TypeController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\LogoutController;
use App\Http\Controllers\Users\SignUpController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('register', [SignUpController::class, 'index'])->name('register');
Route::post('register', [SignUpController::class, 'register']);

Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->group(function() {

        #type
        Route::prefix('type')->group(function() {
            Route::get('add', [TypeController::class, 'create'])->name('default');
            Route::post('add', [TypeController::class, 'store']);
            Route::get('list', [TypeController::class, 'index']);
            Route::get('edit/{id}', [TypeController::class, 'show']);
            Route::post('edit/{id}', [TypeController::class, 'update']);
            Route::DELETE('destroy', [TypeController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #truyen
        Route::prefix('truyen')->group(function() {
            Route::get('add', [TruyenController::class, 'create']);
            Route::post('add', [TruyenController::class, 'store']);
            Route::get('list', [TruyenController::class, 'index']);
            Route::get('edit/{id}', [TruyenController::class, 'show']);
            Route::post('edit/{id}', [TruyenController::class, 'update']);
            Route::DELETE('destroy', [TruyenController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        #chuong
        Route::prefix('chuong')->group(function() {
            Route::get('add', [ChuongController::class, 'create']);
            Route::post('add', [ChuongController::class, 'store']);
            Route::get('list', [ChuongController::class, 'index']);
            Route::get('edit/{id}', [ChuongController::class, 'show']);
            Route::post('edit/{id}', [ChuongController::class, 'update']);
            Route::DELETE('destroy', [ChuongController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #hinh_anh
        Route::prefix('photo')->group(function() {
            Route::get('add', [PhotoController::class, 'create']);
            Route::post('add', [PhotoController::class, 'store']);
            Route::get('list', [PhotoController::class, 'index']);
            Route::get('edit/{id}', [PhotoController::class, 'show']);
            Route::post('edit/{id}', [PhotoController::class, 'update']);
            Route::DELETE('destroy', [PhotoController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        Route::prefix('comment')->group(function() {
            Route::get('add', [CommentController::class, 'create']);
            Route::post('add', [CommentController::class, 'store']);
            Route::get('list', [CommentController::class, 'index']);
            Route::get('edit/{id}', [CommentController::class, 'show']);
            Route::post('edit/{id}', [CommentController::class, 'update']);
            Route::DELETE('destroy', [CommentController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });
    });
});