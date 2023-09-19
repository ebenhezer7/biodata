<?php

use App\Http\Controllers\PersertadidikR;
use App\Http\Controllers\GuruR;
use App\Http\Controllers\UserC;
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

Route::get('admin', function () {
    return view('adminlte');
})->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('pesertadidik', PersertadidikR::class);
// Route::get('pesertadidik/pdf', PersertadidikR::class, 'pdf');
Route::resource('guru', GuruR::class);
Route::get('/', [UserC::class, 'login'])->name('login');
Route::get('register', [UserC::class, 'register'])->name('register');
Route::post('register', [UserC::class, 'register_action'])->name('register.action');
Route::post('login', [UserC::class, 'login_action'])->name('login.action');
Route::get('logout', [UserC::class, 'logout'])->name('logout');
