<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as  AdminUserController;
use \App\Http\Controllers\Admin\ParserController;
use \App\Http\Controllers\Account\IndexController;
use \App\Http\Controllers\Auth\SocialController;
use \App\Http\Controllers\SourceController;
use \App\Http\Controllers\ParseNewsController;
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



Route::get('/', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/{category}/news', [CategoriesController::class, 'news_from_category'])->name('cat.news');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'article'])->name('news.single');

Route::get('/newsparse', [ParseNewsController::class, 'index']);

Route::get('/social/auth/{driver}', [SocialController::class, 'init'])->name('social.auth');
Route::get('/social/callback/{driver}', [SocialController::class, 'callback'])->name('social.callback');

Route::group(['middleware' => 'auth'], function () {


    Route::group(['middleware' => 'admin','prefix'  => 'admin', 'as' => 'admin.'], function () {
        Route::get('index', [App\Http\Controllers\Admin\AdminController::class, 'index' ])->name('index');
        Route::resource('categories',AdminCategoryController::class);
        Route::resource('news',AdminNewsController::class);
        Route::resource('users',  AdminUserController::class);
        Route::resource('source', SourceController::class);
        Route::get('parse/index', [ParserController::class,  'index'])->name('parse.index');
        Route::post('parse/save', [ParserController::class,  'save'])->name('parse.save');

    } );
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
