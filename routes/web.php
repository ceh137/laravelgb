<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\NewsController;
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
    return view('main');
})->name('main');


Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/category/{cat_id}/news', [CategoriesController::class, 'news_from_category'])->name('cat.news');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'article'])->name('news.show');
