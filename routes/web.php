<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'guest'],function() {
    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/user_login',[AuthController::class,'userLogin'])->name('user.userLogin')->middleware('throttle:2,1');

    Route::get('/user_register',[AuthController::class,'registerView'])->name('user.register');
    Route::post('/user_store',[AuthController::class,'userStore'])->name('user.store');
});

Route::group(['middleware'=>'auth'],function(){
    // for dashboard
    Route::get('/home',[AuthController::class,'home'])->name('home');
    // for logout
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
