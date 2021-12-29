<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DictionaryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/dictionary', [DictionaryController::class, 'index'])->name('dictionary');
});


require __DIR__.'/auth.php';
