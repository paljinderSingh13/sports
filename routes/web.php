<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\AdministratorController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/club', [ClubController::class, 'create'])->name('club.create');
Route::post('/club', [ClubController::class, 'store'])->name('club.store');
Route::get('/club/edit/{id}', [ClubController::class, 'edit'])->name('club.edit');
Route::put('/club/update/{id}', [ClubController::class, 'update'])->name('club.update');
Route::delete('/club/destroy/{id}', [ClubController::class, 'destroy'])->name('club.destroy');
Route::post('/club/{id}/status', [ClubController::class, 'updateStatus'])->name('club.updateStatus');
Route::get('/club-list', [ClubController::class, 'index'])->name('club.list');
Route::get('/club-design', [ClubController::class, 'design'])->name('club.design');
Route::get('/club-designtwo', [ClubController::class, 'designtwo'])->name('club.designtwo');
Route::get('/club-designthree', [ClubController::class, 'designthree'])->name('club.designthree');
Route::get('/club-designfour', [ClubController::class, 'designfour'])->name('club.designfour');
Route::get('/club-login', [ClubController::class, 'login'])->name('club.login');
Route::post('club/get-city-suggestions', [ClubController::class, 'getCitySuggestions'])->name('club.get.city.suggestions');
Route::post('club/get-location', [ClubController::class, 'getLocation'])->name('club.get.location');

Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
Route::post('/team/store/', [TeamController::class, 'store'])->name('team.store');
Route::get('/team-list/{id}', [TeamController::class, 'index'])->name('team.list');
Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::delete('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
Route::get('/team-info', [TeamController::class, 'info'])->name('team.info');


Route::get('/administrator/create/{id}', [AdministratorController::class, 'create'])->name('administrator.create');
Route::post('/administrator/store', [AdministratorController::class, 'store'])->name('administrator.store');


