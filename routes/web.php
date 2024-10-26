<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'); // resources/views/index.blade.php
});

Route::get('/product', function () {
    return view('product'); 
});

Route::get('/productdetails', function () {
    return view('product-detail'); 
});


Route::get('/blog', function () {
    return view('blog'); 
});

Route::get('/blog-detail', function () {
    return view('blog-detail'); 
});

Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact'); 
});

