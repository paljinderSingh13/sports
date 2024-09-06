<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Club\TeamController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/club', [ClubController::class, 'create'])->name('club.create');
Route::get('/club-list', [ClubController::class, 'index'])->name('club.list');
Route::get('/club-design', [ClubController::class, 'design'])->name('club.design');
Route::get('/club-designtwo', [ClubController::class, 'designtwo'])->name('club.designtwo');
Route::get('/club-designthree', [ClubController::class, 'designthree'])->name('club.designthree');
Route::get('/club-designfour', [ClubController::class, 'designfour'])->name('club.designfour');

Route::get('/team-list', [TeamController::class, 'index'])->name('team.list');
Route::get('/team-info', [TeamController::class, 'info'])->name('team.info');

