<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/',[UserInfoController::class, 'getUserForm']);
Route::post('/form-submit',[UserInfoController::class, 'submitData'])->name('form.submit');
Route::get('/edit-user/{id}',[UserInfoController::class, 'editUser'])->name('user.edit');
Route::post('/update-user/{id}',[UserInfoController::class, 'updateUser'])->name('form.update');
Route::get('/delete-user/{id}',[UserInfoController::class, 'deleteUser'])->name('user.delete');

// check middleware

Route::get('age/{age}',[UserInfoController::class,'checkAge'])->middleware('check.age:18');

// custom authentication

Route::post('registation',[AuthController::class,'UserRegistationFormSubmit'])->name('user.resgistration');
Route::post('login',[AuthController::class,'UserLoginFormSubmit'])->name('user.login');

// Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

Route::middleware(['UserAuthCheck'])->group(function (){
    Route::get('login',[AuthController::class,'loginForm'])->name('login');
    Route::get('registation',[AuthController::class,'registationForm'])->name('registation');
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('/show-data',[UserInfoController::class, 'getData'])->name('show.data');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/show-data',[UserInfoController::class, 'getData'])->name('show.data');

});

Route::get('verify-accout/{token}',[AuthController::class,'verifyAccount'])->name('verify.account');
    




