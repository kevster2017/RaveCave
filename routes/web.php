<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DJController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Event Routes */
Route::get("/events", [EventController::class, 'index']);
Route::get("/events/create", [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::post("/events/store", [EventController::class, 'store'])->name('events.store')->middleware('auth');

Route::get("/events/{id}/edit", [EventController::class, 'edit'])->name('events.edit')->middleware('auth');
Route::put("/events/{id}", [EventController::class, 'update'])->name('events.update')->middleware('auth');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy')->middleware('auth');

Route::get("/events/show/{id}", [EventController::class, 'show'])->name('events.show')->middleware('auth');

/* DJ Routes */
Route::get("/djs", [DjController::class, 'index']);
Route::get("/djs/create", [DjController::class, 'create'])->name('djs.create')->middleware('auth');
Route::post("/djs/store", [DjController::class, 'store'])->name('djs.store')->middleware('auth');

Route::get("/djs/{id}/edit", [DjController::class, 'edit'])->name('djs.edit')->middleware('auth');
Route::put("/djs/{id}", [DjController::class, 'update'])->name('djs.update')->middleware('auth');
Route::delete('/djs/{id}', [DjController::class, 'destroy'])->name('djs.destroy')->middleware('auth');

Route::get("/djs/show/{id}", [DjController::class, 'show'])->name('djs.show')->middleware('auth');
