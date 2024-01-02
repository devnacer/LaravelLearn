<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;



Route::get('/', [noteController::class, 'index'])->name('homePage');
Route::get('/note/create', [noteController::class, 'create'])->name('note.create');
Route::get('/note/{note:id}', [noteController::class, 'show'])->where('note','\d+')->name('note.show');
Route::post('/note/store', [noteController::class, 'store'])->name('note.store');
// profile
Route::get('/profile/create', [profileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [profileController::class, 'store'])->name('profile.store');
//login
Route::get('/login', [loginController::class, 'show'])->name('login.show');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
//delete note
Route::delete('/note/{note}',[noteController::class, 'destroy'])->name('note.destroy');