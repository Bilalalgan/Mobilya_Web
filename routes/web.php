<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;




Route::get('/', function () {
    return view('index'); // resources/views/index.blade.php
});

Route::get('/urunlerimiz', function () {
    return view('product'); 
});

Route::get('/urundetay', function () {
    return view('product-detail'); 
});


Route::get('/uygulamalarimiz', function () {
    return view('blog'); 
});

Route::get('/uygulama-detay', function () {
    return view('blog-detail'); 
});

Route::get('/hakkimizda', function () {
    return view('about'); 
});

Route::get('/iletisim', function () {
    return view('contact'); 
});


Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
