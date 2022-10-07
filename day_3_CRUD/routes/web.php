<?php

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
Route::get('/show-data',[UserInfoController::class, 'getData'])->name('show.data');
Route::get('/edit-user/{id}',[UserInfoController::class, 'editUser'])->name('user.edit');
Route::post('/update-user/{id}',[UserInfoController::class, 'updateUser'])->name('form.update');
Route::get('/delete-user/{id}',[UserInfoController::class, 'deleteUser'])->name('user.delete');



