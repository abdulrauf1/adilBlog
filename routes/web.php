<?php

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

Route::get('/', [App\Http\Controllers\publicController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\publicController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\publicController::class, 'about'])->name('about');
Route::get('/blogs', [App\Http\Controllers\publicController::class, 'blogs'])->name('blogs');
Route::get('/blogSearch', [App\Http\Controllers\publicController::class, 'search'])->name('blogs');
Route::get('/blogDeatils/{id}', [App\Http\Controllers\publicController::class, 'blogDeatails'])->name('blogs');
Route::get('/proceedPayment/{id}', [App\Http\Controllers\publicController::class, 'proceedPayment'])->name('proceedPayment');
Route::post('/contactUs', [App\Http\Controllers\publicController::class, 'contactUs'])->name('contactUs');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/myAccount', [App\Http\Controllers\HomeController::class, 'myAccount']);
Route::post('/myAccount', [App\Http\Controllers\HomeController::class, 'update']);

Route::get('/getUpdatePlan/{id}', [App\Http\Controllers\HomeController::class, 'getUpdatePlan']);
Route::post('/updatePlan/{id}', [App\Http\Controllers\HomeController::class, 'updatePlan']);


Route::post('/proceedPayment', [App\Http\Controllers\StripePaymentController::class, 'paymentPost'])->name('stripe.post');



Route::get('/manageUsers', [App\Http\Controllers\userController::class, 'index'])->name('manageUsers');
Route::post('/manageUsers', [App\Http\Controllers\userController::class, 'create'])->name('manageUsers');
Route::post('/manageUsers/{id}', [App\Http\Controllers\userController::class, 'destroy']);


Route::get('/myBlogs', [App\Http\Controllers\blogController::class, 'index'])->name('myBlogs');
Route::get('/writeBlog', [App\Http\Controllers\blogController::class, 'writeBlog'])->name('writeBlog');
Route::post('/writeBlog', [App\Http\Controllers\blogController::class, 'storeBlog'])->name('writeBlog');
Route::post('/editBlog/{id}', [App\Http\Controllers\blogController::class, 'edit']);
Route::post('/deleteBlog/{id}', [App\Http\Controllers\blogController::class, 'destroy']);

