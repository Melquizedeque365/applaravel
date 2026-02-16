<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


use App\Http\Controllers\AuthController;

Route::middleware('api')->prefix('auth')->group(function () {
  Route::post('login', [AuthController::class, 'login']);
  Route::post('logout', [AuthController::class, 'logout']);
  Route::post('refresh', [AuthController::class, 'refresh']);
  Route::post('me', [AuthController::class, 'me']);
 });



Route::get('/create', function () {
  return view('formcreate');
}); 

Route::get('/ulogin', function () {
  return view('form');
});

Route::post('/enviar',[UserController::class,'store']);

Route::get('/data', [UserController::class, 'index']);