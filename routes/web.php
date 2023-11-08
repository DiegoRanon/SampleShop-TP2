<?php

use App\Http\Controllers\SampleController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\VerificationController;

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
require __DIR__ . '/auth.php';

Route::get('/apropos', function () {
  return view('apropos');
});

Route::controller(ReviewController::class)->group(function () {
  Route::get('/review/create/{id}',  [ReviewController::class, 'create'])->name('review.create');
  Route::get('/review/show/{id}', [ReviewController::class, 'show'])->name('review.show');
  Route::patch('/review/edit/{id}', [ReviewController::class, 'update'])->name('review.update');
  Route::post('/review/store/{id}', 'store');
  Route::delete('/review/{id}', 'destroy');
});



Route::controller(SampleController::class)->group(function () {
  Route::get('/', 'index');
  Route::get('/sample/create', [SampleController::class, 'create'])->name('sample.create');
  Route::get('/sample/{id}', 'show');
  Route::get('/sample/{id}/edit', 'edit');
  Route::patch('/sample/{id}', 'update');
  Route::get('/sample/apropos', 'apropos');

  Route::post('/sample', 'store');

});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
  Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
  Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
  Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['middleware' => ['auth']], function() {
  Route::group(['middleware' => ['verified']], function() {
        Route::get('/', [SampleController::class, 'index'])->name('sample.index');
          Route::get('/sample/create', [SampleController::class, 'create'])->name('sample.create');
          Route::patch('/sample/{id}', [SampleController::class, 'update'])->name('sample.update');
          Route::delete('/sample/{id}', [SampleController::class, 'destroy'])->name('sample.destroy');
          Route::get('/review/create/{id}',  [ReviewController::class, 'create'])->name('review.create');
          Route::get('/review/show/{id}', [ReviewController::class, 'show'])->name('review.show');
  });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

