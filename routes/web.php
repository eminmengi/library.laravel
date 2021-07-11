<?php

use App\Http\Controllers\LibraryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('/', [LibraryController::class,'index'])->name('library.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/add_book',function (){
    return view('add_book');
})->middleware(['auth'])->name('add_book');


Route::post('/add_book',[LibraryController::class,'create'])->middleware(['auth'])->name('add_book');

Route::delete('/delete_book/{id}',[LibraryController::class,'destroy'])->middleware(['auth'])->name('delete_book');

Route::get('/edit_book/{id}',[LibraryController::class,'edit'])->middleware(['auth'])->name('edit_book');

Route::put('/update_book/{id}',[LibraryController::class,'update'])->middleware(['auth'])->name('update_book');

Route::get('/detail_book/{id}',[LibraryController::class,'detail'])->name('detail_book');

require __DIR__.'/auth.php';
