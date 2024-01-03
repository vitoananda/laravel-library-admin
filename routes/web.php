<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [LoginController::class, 'index'])->name('welcome');

// Authentication Routes
Auth::routes();

// Home Controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Category Controller
Route::resource('categories', CategoryController::class);

// Book Controller
Route::resource('books', BookController::class)->except(['update']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

// Authentication Routes
Auth::routes();

// Home Controller
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
