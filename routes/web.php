<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;



Route::get('/', [noteController::class, 'index'])->name('homePage');
Route::get('/note/create', [noteController::class, 'create'])->name('note.create');
Route::get('/note/{note:id}', [noteController::class, 'show'])->where('note','\d+')->name('note.show');
Route::post('/note/store', [noteController::class, 'store'])->name('note.store');

