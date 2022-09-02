<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/login-template', function () {
//     return view('login');
// });

// Route::get('/register-template', function () {
//     return view('register');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::group(['prefix'=>'product','as'=>'product.', 'middleware' => 'verified'], function() {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/show/import', [ProductController::class, 'showImport'])->name('show.import');
    Route::post('/import', [ProductController::class, 'import'])->name('import');
    Route::get('/import-template/download', [ProductController::class, 'importTemplate'])->name('import.template');
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix'=>'category','as'=>'category.', 'middleware' => 'verified'], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
});
