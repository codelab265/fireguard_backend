<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\FireguardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::delete('delete', [DeleteController::class, 'delete'])->name('delete');

    Route::get('fireguard', [FireguardController::class, 'index'])->name('fireguard');
    Route::post('fireguard', [FireguardController::class, 'create']);
    Route::patch('fireguard/{id}', [FireguardController::class, 'update'])->name('fireguard.update');

    Route::get('members', [MemberController::class, 'index'])->name('members');
});
