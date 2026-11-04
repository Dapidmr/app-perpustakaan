<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);
    });
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::get('/loans/report', [LoanController::class, 'report'])->name('loans.report');
    Route::resource('loans', LoanController::class);
    Route::put('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');
    Route::patch('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
        ->name('loans.kembalikan');
    Route::prefix('admin')->group(function () {

        Route::get('/', function(){
            return "Halaman admin";
        });
        Route::get('/info', function(){
            return 'Info Admin';
        });
        
    });
    Route::get('/profil', [ProfileController::class, 'show'])
        ->middleware('auth')
        ->name('profil');
    Route::get('/profil', [ProfileController::class, 'show'])->name('profil');
    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('profil.password');
});