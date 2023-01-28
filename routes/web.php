<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountAuthenticationController;


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

Route::get('/', function () {
    return view('home');
})->name('home');

// account authentication
Route::get('/mon-compte/connexion', function () {
    return view('authentication/signin');
})->name('signin');

Route::get('/mon-compte/connexion/restaurer-mot-de-passe', function () {
    return view('authentication/restorepassword');
})->name('restorepassword');

Route::get('/mon-compte/creation', function () {
    return view('authentication/signup');
})->name('signup');

Route::post('/mon-compte/connexionauth', [AccountAuthenticationController::class, 'connection'])->name('signinauth');
Route::post('/mon-compte/creationauth', [AccountAuthenticationController::class, 'creation'])->name('signupauth');
Route::post('/mon-compte/restoreauth', [AccountAuthenticationController::class, 'restore'])->name('restoreauth');
