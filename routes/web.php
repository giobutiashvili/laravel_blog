<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\Pages\PageController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\Pages\PageController::class, 'contact']);
Route::get('/aboutUs', [App\Http\Controllers\Pages\PageController::class, 'aboutUs']);
Route::get('/prices', [App\Http\Controllers\Pages\PageController::class, 'prices']);
Route::get('blog/{id}/{slug?}', [App\Http\Controllers\Pages\PageController::class, 'blog_show'])->name('blog.show');

// Admin

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// blogs
Route::get('Admin/blogs', [App\Http\Controllers\Admin\BlogController::class, 'index']);
Route::get('Admin/blogs/create', [App\Http\Controllers\Admin\BlogController::class, 'create']);
Route::get('Admin/blogs/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blog.edit');
Route::POST('Admin/blogs/store', [App\Http\Controllers\Admin\BlogController::class, 'store']);
Route::POST('Admin/blogs/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blog.update');
Route::POST('Admin/blogs/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blog.delete');

// AboutUs
Route::get('Admin/aboutUs', [App\Http\Controllers\Admin\AboutUsController::class, 'index']);
Route::POST('Admin/aboutUs/update/', [App\Http\Controllers\Admin\AboutUsController::class,
 'update']);

 //category
Route::get('Admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::POST('Admin/category/create/', [App\Http\Controllers\Admin\CategoryController::class,
 'store']);


//social
Route::get('Admin/social', [App\Http\Controllers\SocialController::class, 'index']);
Route::POST('Admin/social/create/', [App\Http\Controllers\SocialController::class,
 'store']);


//slug
Route::get('Admin/slug', [App\Http\Controllers\Admin\SlugController::class, 'index']);
Route::POST('Admin/slug/create/', [App\Http\Controllers\Admin\SlugController::class,
 'store']);

//search
Route::get('search', [App\Http\Controllers\SearchController::class, 'index']);

