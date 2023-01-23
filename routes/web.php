<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

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

Route::get('/', [RegistroController::class, 'index'])->name('mesapartes');
Route::post('/store', [RegistroController::class, 'store'])->name('mesapartes.store');
Route::get('/show/{registro}', [RegistroController::class, 'show'])->name('mesapartes.derivar');
Route::put('/update/{registro}', [RegistroController::class, 'update'])->name('mesapartes.update');
Route::get('/delete/{registro}', [RegistroController::class, 'destroy'])->name('mesapartes.destroy');

Route::get('/dashboard', [RegistroController::class, 'lista'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
