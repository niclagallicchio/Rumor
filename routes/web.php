<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

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

// PRIMO METODO PER SCRIVERE LE ROTTE

// Route::get('/', [ArticleController::class, 'homepage'])->name('welcome');

// Route::get('account/articles', [ArticleController::class, 'index'])->name('articles.index')->middleware('auth');

// Route::get('account/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
// Route::post('account/articles/store', [ArticleController::class, 'store'])->name('articles.store');

// Route::get('account/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');

// Route::resource('categories', CategoryController::class);

// SECONDO METODO PER SCRIVERE LE ROTTE

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->prefix('account')->group(function(){

    Route::resource('articles', ArticleController::class);
    
    Route::resource('categories', CategoryController::class);
    });
    
// TERZO METODO PER SCRIVERE LE ROTTE


// Route::middleware('auth')->prefix('account')->group(function(){

//     Route::resources(
//         ['articles'=> ArticleController::class,
//         'categories'=> CategoryController::class
//     ]);

    
    