<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/profile', [HomeController::class, 'index'])->name('profile');
Route::post('/upload-profile-image', [ProfileController::class, 'profile_image_upload'])->name('profile.upload');
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/products', [HomeController::class, 'products'])->name('products');
