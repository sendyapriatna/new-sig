<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MapGisController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/landing-page', [App\Http\Controllers\LandingPageController::class, 'index']);
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);
Route::get('/titik/json', [App\Http\Controllers\LandingPageController::class, 'titik']); // buat cek dump (gak butuh)
Route::get('/lokasi/json/{id}', [App\Http\Controllers\LandingPageController::class, 'lokasi']); // buat cek dump (gak butuh)
Route::get('/map', [App\Http\Controllers\MapGisController::class, 'index']);
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

// Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index2'])->middleware('auth');
Route::get('/dashboard/view', [App\Http\Controllers\DashboardController::class, 'index3'])->middleware('auth');
Route::post('/dashboard/view/add', [App\Http\Controllers\DashboardController::class, 'store'])->middleware('auth');
Route::get('/dashboard/view/edit/{id}', [App\Http\Controllers\DashboardController::class, 'update'])->middleware('auth');
Route::post('/dashboard/view/update', [App\Http\Controllers\DashboardController::class, 'updated'])->middleware('auth');
Route::get('/dashboard/view/delete/{id}', [App\Http\Controllers\DashboardController::class, 'delete'])->middleware('auth');
