<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;



// Route::get('/', [noteController::class, 'index'])->name('homePage');
// Route::get('/note/create', [noteController::class, 'create'])->name('note.create');
// Route::get('/note/{note:id}', [noteController::class, 'show'])->where('note','\d+')->name('note.show');
// Route::post('/note/store', [noteController::class, 'store'])->name('note.store');
// // profile
// Route::get('/profile/create', [profileController::class, 'create'])->name('profile.create' );
// Route::post('/profile/store', [profileController::class, 'store'])->name('profile.store');
//login
Route::get('/login', [loginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/login', [loginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [loginController::class, 'logout'])->name('logout')->middleware('auth');
//delete note
// Route::delete('/note/{note}',[noteController::class, 'destroy'])->name('note.destroy');
//update note
// Route::get('/note/{note}/edit',[noteController::class, 'edit'])->name('note.edit');
// Route::put('/note/{note}',[noteController::class, 'update'])->name('note.update');


//__________________________note
// Route::name('note.')->prefix('note/')->group(function(){
    
//     //update note
//     Route::get('{note}/edit',[noteController::class, 'edit'])->name('edit');
//     Route::put('{note}',[noteController::class, 'update'])->name('update');
//     //delete note
//     Route::delete('{note}',[noteController::class, 'destroy'])->name('destroy');
//     // create
//     Route::get('create', [noteController::class, 'create'])->name('create');
//     Route::post('store', [noteController::class, 'store'])->name('store');
//     //show note
//     Route::get('{note:id}', [noteController::class, 'show'])->where('note','\d+')->name('show');
//     // show all notes
//     Route::get('', [noteController::class, 'index'])->name('homePage');
// });

//__________________________note
// Route::name('note.')->prefix('note/')->group(function(){

//     Route::controller(noteController::class)->group(function(){
        
//         //update note
//         Route::get('{note}/edit', 'edit')->name('edit');
//         Route::put('{note}', 'update')->name('update');
//         //delete note
//         Route::delete('{note}', 'destroy')->name('destroy');
//         // create
//         Route::get('create', 'create')->name('create');
//         Route::post('store', 'store')->name('store');
//         //show note
//         Route::get('{note:id}', 'show')->where('note','\d+')->name('show');
//         // show all notes
//         Route::get('', 'index')->name('homePage');

//     });
// });

Route::resource('notes',noteController::class);
Route::resource('profiles',profileController::class);

