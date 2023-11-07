<?php

use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
require __DIR__.'/auth.php';

Route::get('/apropos', function () {
    return view('apropos');
}); 

Route ::controller(SampleController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/sample/create', 'create');
    Route::get('/sample/{id}', 'show');
    Route::get('/sample/{id}/edit', 'edit');
    Route::get('/sample/apropos', 'apropos');

    Route::post('/sample', 'store');
    Route::patch('/sample/{id}', 'update');
    Route::delete('/sample/{id}', 'destroy');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
  })->middleware('auth')->name('verification.notice');
  
  Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
  
    return redirect('/dashboard');
  })->middleware(['auth', 'signed'])->name('verification.verify');
  
  
  Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
  
    return back()->with('message', 'Verification link sent!');
  })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
  
  Route::get('/profile', function () {
  })->middleware('verified');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
