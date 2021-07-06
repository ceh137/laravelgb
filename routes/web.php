<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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

//Route::get('/', function () {
//    return view('main');
//})->name('main');

Route::group(['prefix'  => 'admin', 'as' => 'admin.'], function () {
    Route::get('index', [App\Http\Controllers\Admin\AdminController::class, 'index' ])->name('index');
    Route::resource('categories',AdminCategoryController::class);
    Route::resource('news',AdminNewsController::class);
} );

Route::get('/', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/{cat_id}/news', [CategoriesController::class, 'news_from_category'])->name('cat.news');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'article'])->name('news.single');
