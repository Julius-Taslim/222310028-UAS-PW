<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SheetController;
use Illuminate\Support\Facades\Route;

// Route::get('/sign-in',[AuthController::class,'login']);
Route::get('/',[SheetController::class,'index']);
Route::post('/',[SheetController::class, 'createSheet']);
Route::get('/{sheet}',[SheetController::class,'sheet']);
Route::post('/{sheet}',[SheetController::class,'editSheet']);


// Route::get('/', function () {
//     return view('auth.signin');
// })->name("login");

// Route::post('/login',[AuthController::class,'login']);

// Route::get('/users',function(){
//     return view("auth.admin.dashboard");
// })->middleware('auth');

// Route::post('/logout', [AuthController::class, 'logout']);
