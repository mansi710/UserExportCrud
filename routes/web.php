<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/list', [UserController::class, 'index'])->name('users.list');
    Route::any('user/delete/{user_id}',[UserController::class, 'user_delete'])->name('user.delete');
    Route::any('/user/profile', [UserController::class, 'show'])->name('profile.show');
    Route::get('edit/user/{user_id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('update/user',[UserController::class,'update'])->name('user.update');
    Route::get('users-export', [UserController::class,'export'])->name('users.export');
});
require __DIR__.'/auth.php';
