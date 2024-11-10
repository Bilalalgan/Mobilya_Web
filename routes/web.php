<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
Route::get('/urunlerimiz', [App\Http\Controllers\HomeController::class, 'urunlerimiz'])->name('urunlerimiz');
Route::get('/urundetay', [App\Http\Controllers\HomeController::class, 'urundetay'])->name('urundetay');
Route::get('/uygulamalarimiz', [App\Http\Controllers\HomeController::class, 'uygulamalarimiz'])->name('uygulamalarimiz');
Route::get('/uygulama-detay', [App\Http\Controllers\HomeController::class, 'uygulama_detay'])->name('uygulama_detay');
Route::get('/hakkimizda', [App\Http\Controllers\HomeController::class, 'hakkimizda'])->name('hakkimizda');
Route::get('/iletisim', [App\Http\Controllers\HomeController::class, 'iletisim'])->name('iletisim');



Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





// AdminController
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
 
    //users
    Route::get('admin/users', [AdminController::class, 'users'])->name('user.index');
    Route::get('admin/user/create', [AdminController::class, 'usercreate'])->name('user.create');
    Route::post('admin/user/store', [AdminController::class, 'userstore'])->name('user.store'); // POST request ile kaydet
    Route::get('admin/user/edit/{user}', [AdminController::class, 'useredit'])->name('user.edit');
    Route::put('admin/user/edit/{user}', [AdminController::class, 'userupdate'])->name('user.update');
    Route::delete('admin/user/{user}', [AdminController::class, 'userdestroy'])->name('user.destroy');

    // User Profile
    Route::get('admin/profile/edit', [AdminController::class, 'profile_edit'])->name('admin.profile.edit'); 
    Route::put('/admin/profile/update', [AdminController::class, 'profile_update'])->name('admin.profile.update');
    Route::put('/admin/profile/change-password', [AdminController::class, 'changePassword'])->name('admin.profile.changePassword');



