<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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


Route::get('/', [ViewController::class, 'index'])->name('index');
Route::get('/blog/{id?}', [ViewController::class, 'blog'])->name('blog');
Route::get('/single/{id}', [ViewController::class, 'single'])->name('single');
Route::get('/contact', [ViewController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::resource('posts', PostController::class)->middleware('auth');
//Route::resource('categories', CategoryController::class)->middleware('auth');
//Route::resource('videos', VideoController::class)->middleware('auth');
Route::resource('messages', MessageController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('videos', VideoController::class);
});

Route::get('templates', [HomeController::class, 'templates'])->name('templates');
Route::post('save_temp', [HomeController::class, 'save_temp'])->name('save_temp');
