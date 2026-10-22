<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.home'); })->name('home');
Route::get('/create', function () { return view('pages.create'); })->name('view.create');
Route::get('/login', function () { return view('pages.login'); })->name('view.login');

Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::match(['get', 'post'], '/user/logout', [UserController::class, 'logout'])->name('user.logout');
