<?php

use App\Http\Controllers\AllPeopleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'welcome']);
    Route::get('/register', [AuthController::class, 'register_view'])->name('register_view');
    Route::post('/register/store', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login_view'])->name('login_view');
    Route::post('/login/store', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [AuthController::class, 'home'])->name('home');


    Route::middleware(['isOperator'])->resource('posts', PostController::class);
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/users', [AllPeopleController::class, 'index'])->name('peoples_list');
        Route::get('/users/delete/{id}', [AllPeopleController::class, 'delete'])->name('people_delete');
    });

    Route::middleware(['isCustomer'])->resource('stores', StoreController::class)->only(['index', 'show']);
});
