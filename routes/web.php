<?php

use App\Http\Controllers\SampleController;
use App\Http\Controllers\ReviewController;
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

Route::get('/apropos', function () {
    return view('apropos');
}); 

Route ::controller(SampleController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/sample/create', 'create');
    Route::get('/sample/{id}', 'show');
    Route::get('/sample/{id}/edit', 'edit');
    //Route::get('/sample/apropos', 'apropos');

    Route::post('/sample', 'store');
    Route::patch('/sample/{id}', 'update');
    Route::delete('/sample/{id}', 'destroy');

});




Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
