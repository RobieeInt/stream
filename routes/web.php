<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'landing.index');

Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'authenticate'])->name('admin.login.auth');

Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth'],'namespace' => 'Admin'], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //route movie
    Route::group(['prefix' => 'movie'], function () {
        Route::get('/', [MovieController::class, 'index'])->name('admin.movie.index');
        Route::get('/create', [MovieController::class, 'create'])->name('admin.movie.create');
        Route::post('/store', [MovieController::class, 'store'])->name('admin.movie.store');
        Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}', [MovieController::class, 'update'])->name('admin.movie.update');
        Route::delete('/destroy/{id}', [MovieController::class, 'destroy'])->name('admin.movie.destroy');

    });

    //route transaction
    Route::group(['prefix' => 'transaction'], function () {

        //route to view in folder admin/transaction/transactions
        Route::get('/', [TransactionController::class, 'index'])->name('admin.transaction.index');
    });

    Route::group(['prefix' => 'package'], function () {
        Route::get('/', [PackageController::class, 'index'])->name('admin.package.index');
        Route::get('/create', [PackageController::class, 'create'])->name('admin.package.create');
        Route::post('/store', [PackageController::class, 'store'])->name('admin.package.store');
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('admin.package.edit');
        Route::put('/update/{id}', [PackageController::class, 'update'])->name('admin.package.update');
        Route::delete('/destroy/{id}', [PackageController::class, 'destroy'])->name('admin.package.destroy');
    });

    //route group user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
    });

    //route group blog
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::delete('/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
    });

});

