<?php

use App\Http\Controllers\RegisterController;
use App\Http\Middleware\SessionCheckMiddleware;
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


Route::post('/registered', [RegisterController::class, 'createUser'])->name('registered');


Route::post('/home', [RegisterController::class, 'createLogin'])->name('loged');

Route::post('/updatepassword/{id}', [RegisterController::class, 'updatepassword'])->name('updatepassword');


Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');







//Grouping Middleware for authentication
Route::group(["middleware" => ["sessionCheckMiddleware"]], function () {
    Route::get('/home', [RegisterController::class, 'home'])->name('home');

    Route::get('/contactus', [RegisterController::class, 'contactus'])->name('contactus');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::get('/login', [RegisterController::class, 'login'])->name('login');


    Route::get('/userlist', [RegisterController::class, 'userlist'])->name('userlist');

    Route::get('/editUser/{id}', [RegisterController::class, 'editUser'])->name('editUser');

    Route::post('/update/{id}', [RegisterController::class, 'update'])->name('update');

    Route::get('/deleteUser/{id}', [RegisterController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/changepassword/{id}', [RegisterController::class, 'changepassword'])->name('changepassword');




});
