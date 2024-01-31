<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function() {
    return redirect('/admin');
});

Route::middleware(['guest'])->group(function() {
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);
});


Route::middleware(['auth'])->group(function() {
    Route::get('/admin',[AdminController::class, 'index']);
    Route::get('/admin/admin',[AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/waiter',[AdminController::class, 'waiter'])->middleware('userAkses:waiter');
    Route::get('/admin/kasir',[pesananController::class, 'index'])->middleware('userAkses:kasir');
    Route::get('/admin/kasir/create',[pesananController::class, 'create'])->middleware('userAkses:kasir');
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::resource('/admin/kasir', pesananController::class);