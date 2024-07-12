<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SheetController;
use Illuminate\Support\Facades\Route;

// Redirect root URL to /login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', function () {
    return view('auth.signin');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/sheet', [SheetController::class, 'index'])->name('user.sheet');
    Route::post('/sheet', [SheetController::class, 'createSheet'])->name('sheet.create');
    Route::get('/sheet/{sheet}', [SheetController::class, 'sheet']);
    Route::post('/sheet/{sheet}', [SheetController::class, 'editSheet']);
    Route::delete('/sheet/{sheet}', [SheetController::class, 'deleteSheet'])->name('sheet.delete');
});
