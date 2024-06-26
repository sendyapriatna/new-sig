<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index2']);
Route::get('/titik/json', [App\Http\Controllers\LandingPageController::class, 'titik']); //cek vardump
Route::get('/titikShelter/json', [App\Http\Controllers\LandingPageController::class, 'titikShelter']); //cek vardump
Route::get('/titikTikum/json', [App\Http\Controllers\LandingPageController::class, 'titikTikum']); //cek vardump
Route::get('/titikPolygon/json', [App\Http\Controllers\LandingPageController::class, 'titikPolygon']); //cek vardump
Route::get('/viewPolygon/json', [App\Http\Controllers\LandingPageController::class, 'viewPolygon']); //cek vardump
Route::get('/viewKerusakan/json', [App\Http\Controllers\LandingPageController::class, 'viewKerusakan']); //cek vardump
Route::get('/lokasi/json/{id}', [App\Http\Controllers\LandingPageController::class, 'lokasi']);
// Route::get('/main-ancaman-kerusakan', [App\Http\Controllers\MainMapController::class, 'index']);
Route::get('/map', [App\Http\Controllers\MapGisController::class, 'index']);
// Route::get('/landing-page', [App\Http\Controllers\LandingPageController::class, 'index']);
// Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index']);
// Route::get('/landing-page', [App\Http\Controllers\LandingPageController::class, 'index2']);
// Route::get('/', [App\Http\Controllers\MainMapController::class, 'index']);
// Route::get('/map2', [App\Http\Controllers\MapGisController::class, 'index']);
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

// Detail
Route::get('/detailShelter/{id}', [App\Http\Controllers\ViewDetailShelterController::class, 'detailShelter']);
Route::get('/detailTikum/{id}', [App\Http\Controllers\ViewDetailShelterController::class, 'detailTikum']);

// Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

// Dashboard Shelter
Route::get('/shelter', [App\Http\Controllers\ShelterController::class, 'index']);
Route::get('/shelter/create', [App\Http\Controllers\ShelterController::class, 'create']);
Route::post('/shelter/add', [App\Http\Controllers\ShelterController::class, 'store']);
Route::get('/shelter/edit/{id}', [App\Http\Controllers\ShelterController::class, 'update']);
Route::post('/shelter/update', [App\Http\Controllers\ShelterController::class, 'updated']);
Route::get('/shelter/delete/{id}', [App\Http\Controllers\ShelterController::class, 'delete']);
Route::get('/shelter/detail/{id}', [App\Http\Controllers\ShelterController::class, 'detail']);

// Dashboard Tikum
Route::get('/tikum', [App\Http\Controllers\TikumController::class, 'index']);
Route::get('/tikum/create', [App\Http\Controllers\TikumController::class, 'create']);
Route::post('/tikum/add', [App\Http\Controllers\TikumController::class, 'store']);
Route::get('/tikum/edit/{id}', [App\Http\Controllers\TikumController::class, 'update']);
Route::post('/tikum/update', [App\Http\Controllers\TikumController::class, 'updated']);
Route::get('/tikum/delete/{id}', [App\Http\Controllers\TikumController::class, 'delete']);
Route::get('/tikum/detail/{id}', [App\Http\Controllers\TikumController::class, 'detail']);

// Dashboard Draw
Route::get('/draw', [App\Http\Controllers\PolygonController::class, 'index']);
Route::get('/draw/create', [App\Http\Controllers\PolygonController::class, 'create']);
Route::get('/viewDraw', [App\Http\Controllers\PolygonController::class, 'view']);
Route::post('/draw/add', [App\Http\Controllers\PolygonController::class, 'store']);
Route::get('/draw/edit/{id}', [App\Http\Controllers\PolygonController::class, 'update']);
Route::post('/draw/update', [App\Http\Controllers\PolygonController::class, 'updated']);
Route::get('/draw/updateEnum/{id}', [App\Http\Controllers\PolygonController::class, 'findPolygon']);
Route::get('/draw/delete/{id}', [App\Http\Controllers\PolygonController::class, 'delete']);
Route::get('/draw/delete2/{id}', [App\Http\Controllers\PolygonController::class, 'delete2']);
Route::get('/draw/detail/{id}', [App\Http\Controllers\PolygonController::class, 'detail']);

// Dashboard Kerusakan Desa
Route::get('/kerusakan', [App\Http\Controllers\KerusakanController::class, 'index']);
Route::get('/kerusakan/create', [App\Http\Controllers\KerusakanController::class, 'create']);
Route::get('/viewKerusakan', [App\Http\Controllers\KerusakanController::class, 'view']);
Route::post('/kerusakan/add', [App\Http\Controllers\KerusakanController::class, 'store']);
Route::get('/kerusakan/edit/{id}', [App\Http\Controllers\KerusakanController::class, 'update']);
Route::post('/kerusakan/update', [App\Http\Controllers\KerusakanController::class, 'updated']);
Route::get('/kerusakan/updateEnum/{id}', [App\Http\Controllers\KerusakanController::class, 'findKerusakan']);
Route::get('/kerusakan/delete/{id}', [App\Http\Controllers\KerusakanController::class, 'delete']);
Route::get('/kerusakan/delete2/{id}', [App\Http\Controllers\KerusakanController::class, 'delete2']);
Route::get('/kerusakan/detail/{id}', [App\Http\Controllers\KerusakanController::class, 'detail']);

// Dashboard Profil
Route::get('/dashboard/profil/{id}', [App\Http\Controllers\DashboardController::class, 'profil']);
Route::post('/dashboard/profil_update', [App\Http\Controllers\DashboardController::class, 'updated']);
Route::post('/dashboard/profil_update2', [App\Http\Controllers\DashboardController::class, 'updated2']);
