<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;



Route::get('/', [noteController::class, 'index'])->name('homePage');
Route::get('/note/{id}', [noteController::class, 'show'])->where('id','\d+')->name('note.show');

