<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Home'], function (){
    Route::get('/home', IndexController::class)->name('home.index');
});


Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', IndexController::class)->name('post.index');
    Route::get('/posts/create', CreateController::class)->name('post.create');
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::delete('/posts/{post}', DestroyController::class)->name('post.delete');
    Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
    Route::post('/posts', StoreController::class)->name('post.store');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::get('/', IndexController::class)->name('admin.index');
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/posts', IndexController::class)->name('admin.post.index');
        Route::get('posts/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::delete('/posts/{post}', DestroyController::class)->name('admin.post.delete');
        Route::get('/posts/create', CreateController::class)->name('admin.post.create');
        Route::patch('/posts/{post}', UpdateController::class)->name('admin.post.update');
        Route::post('/posts', StoreController::class)->name('admin.post.store');
    });
});

Route::get('/contact', [ContactController::class, 'index'])->name("contact.index");

Route::get('/about', [AboutUsController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
