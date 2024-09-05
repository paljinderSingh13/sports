<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Club\TeamController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/club', [ClubController::class, 'create'])->name('club.create');
Route::get('/club-list', [ClubController::class, 'index'])->name('club.list');

Route::get('/team-list', [TeamController::class, 'index'])->name('team.list');
Route::get('/team-info', [TeamController::class, 'info'])->name('team.info');

