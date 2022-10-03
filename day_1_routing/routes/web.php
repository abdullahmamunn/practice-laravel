<?php

use App\Http\Controllers\HomeController;
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
Route::get('/',function(){
    return view('welcome');
});

Route::get('/user/{id}/posts/{postId}',function($id,$postId){
    dd($id,$postId);
    return view('welcome');
});

$data = [
    'name' => "Laravel 8"
];
Route::view('home','home',$data);

Route::get('user/profile',function(){

    return "user-profile";

})->name('user.profile');

Route::redirect('cricbuzz','https://www.cricbuzz.com/');

// route with parameter, pass to controller and view data in blade
Route::get('home1/{name}',[HomeController::class, 'index']);

// group route prefix with middleware
Route::prefix('admin')->group(function(){
    Route::get('list',[AdminComtroller::class, 'list']);
    Route::post('add',[AdminComtroller::class, 'add']);
    Route::get('edit{id}',[AdminComtroller::class, 'edit']);
    Route::post('aupdate/{id}',[AdminComtroller::class, 'update']);
    Route::get('delete/{id}',[AdminComtroller::class, 'delete']);
})->middleware('auth');


// group name route
Route::name('user.')->group(function(){
    Route::get('list',[AdminComtroller::class, 'list'])->name('profile');
    Route::post('add',[AdminComtroller::class, 'add'])->name('settings');
    Route::get('edit{id}',[AdminComtroller::class, 'edit'])->name('order');
})->middleware('auth');


