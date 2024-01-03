<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

// Welcome Controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication 
Auth::routes();

// Home Controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category Controller
Route::resource('categories', CategoryController::class);

//export 
Route::get('/books/export', [BookController::class, 'export'])->name('books.export');

// Book Controller
Route::resource('books', BookController::class)->except(['update']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');


// Authentication Routes
Auth::routes();

// Home Controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



