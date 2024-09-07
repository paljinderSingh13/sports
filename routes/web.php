<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Club\TeamController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/club', [ClubController::class, 'create'])->name('club.create');
Route::post('/club', [ClubController::class, 'store'])->name('club.store');
Route::get('/club/edit/{id}', [ClubController::class, 'edit'])->name('club.edit');
Route::delete('/club/destroy/{id}', [ClubController::class, 'destroy'])->name('club.destroy');
Route::get('/club-list', [ClubController::class, 'index'])->name('club.list');

Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
Route::post('/team/store/', [TeamController::class, 'store'])->name('team.store');
Route::get('/team-list/{id}', [TeamController::class, 'index'])->name('team.list');
Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::delete('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
Route::get('/team-info', [TeamController::class, 'info'])->name('team.info');

