<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Club\ClubAdministrator;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\PlayerController;
use App\Http\Controllers\Club\AdministratorController;
use App\Http\Controllers\Club\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/join-now', [FrontController::class, 'join'])->name('front.join');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');




Route::get('login', [LoginController::class, 'create'])->name('login');
Route::get('password/request', [LoginController::class, 'passwordRequest'])->name('password.request');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logout', [LoginController::class, 'logoutGet'])->name('logout');
Route::middleware('auth')->group(function () {
	Route::middleware(['role:master'])->group(function () {
		Route::get('/club', [ClubController::class, 'create'])->name('club.create');
		Route::post('/club', [ClubController::class, 'store'])->name('club.store');
		Route::get('/club/edit/{id}', [ClubController::class, 'edit'])->name('club.edit');
		Route::put('/club/update/{id}', [ClubController::class, 'update'])->name('club.update');
		Route::delete('/club/destroy/{id}', [ClubController::class, 'destroy'])->name('club.destroy');
		Route::post('/club/{id}/status', [ClubController::class, 'updateStatus'])->name('club.updateStatus');
		Route::get('/club-list', [ClubController::class, 'index'])->name('club.list');
		Route::get('/club-listtwo', [ClubController::class, 'listtwo'])->name('club.listtwo');
		Route::get('/club-design', [ClubController::class, 'design'])->name('club.design');
		Route::get('/club-designtwo', [ClubController::class, 'designtwo'])->name('club.designtwo');
		Route::get('/club-designthree', [ClubController::class, 'designthree'])->name('club.designthree');
		Route::get('/club-designfour', [ClubController::class, 'designfour'])->name('club.designfour');
		Route::get('/club-login', [ClubController::class, 'login'])->name('club.login');
		Route::post('club/get-city-suggestions', [ClubController::class, 'getCitySuggestions'])->name('club.get.city.suggestions');
		Route::post('club/get-location', [ClubController::class, 'getLocation'])->name('club.get.location');
	});

	Route::middleware(['role:administrator,player,club,master'])->group(function () {

		Route::get('/club-management', [ClubAdministrator::class, 'clubDashboard'])->name('club.dashboard');
Route::get('/create-club-administrator', [ClubAdministrator::class, 'create'])->name('club.admform');
Route::post('/club-administrator-store', [ClubAdministrator::class, 'store'])->name('club.admstore');
Route::get('/club-administrator', [ClubAdministrator::class, 'index'])->name('club.adm');

		Route::post('/club-admin/{id}/status', [ClubAdministrator::class, 'updateStatus'])->name('clubadm.updateStatus');
		Route::put('/club-admin/update', [ClubAdministrator::class, 'update'])->name('clubadm.update');
		Route::get('/club-admin/edit/{id}', [ClubAdministrator::class, 'edit'])->name('clubadm.edit');
		Route::delete('/club-admin/destroy/{id}', [ClubAdministrator::class, 'destroy'])->name('clubadm.destroy');


		Route::get('/club-administrator-form', [ClubAdministrator::class, 'create'])->name('club.admform');

		Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
		Route::post('/team/store/', [TeamController::class, 'store'])->name('team.store');
		Route::get('/team-list/{id}', [TeamController::class, 'index'])->name('team.list');
		Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
		Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
		Route::delete('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
		Route::get('/team-info/{id}', [TeamController::class, 'info'])->name('team.info');
		Route::get('/team-tform', [TeamController::class, 'tform'])->name('team.tform');
		Route::get('/team-tlist', [TeamController::class, 'tlist'])->name('team.tlist');
		Route::post('/team/{id}/status', [TeamController::class, 'updateStatus'])->name('team.updateStatus');

	 });

	Route::middleware(['role:player,administrator,club,master'])->group(function () {
		Route::get('/players/create/{id}', [PlayerController::class, 'create'])->name('player.create');
		Route::post('/players/store', [PlayerController::class, 'store'])->name('player.store');
		Route::get('/players/edit/{id}', [PlayerController::class, 'edit'])->name('player.edit');
		Route::put('/players/update/{id}', [PlayerController::class, 'update'])->name('player.update');
		Route::delete('/players/destroy/{id}', [PlayerController::class, 'destroy'])->name('player.destroy');
		Route::post('/player/{id}/status', [PlayerController::class, 'updateStatus'])->name('player.updateStatus');
	 });

	Route::middleware(['role:administrator,club,master'])->group(function () {
		Route::get('/administrator/create/{id}', [AdministratorController::class, 'create'])->name('administrator.create');
		Route::post('/administrator/store', [AdministratorController::class, 'store'])->name('administrator.store');
		Route::get('/administrator/edit/{id}', [AdministratorController::class, 'edit'])->name('administrator.edit');
		Route::put('/administrator/update/{id}', [AdministratorController::class, 'update'])->name('administrator.update');
		Route::delete('/administrator/destroy/{id}', [AdministratorController::class, 'destroy'])->name('administrator.destroy');
		Route::post('/administrator/{id}/status', [AdministratorController::class, 'updateStatus'])->name('administrator.updateStatus');
		Route::get('/team-adminlist', [TeamController::class, 'adminlist'])->name('team.adminlist');

		Route::get('schedule/create/{id}', [ScheduleController::class, 'create'])->name('schedule.create');
		Route::post('schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
		Route::get('schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
		Route::put('schedule/update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
		Route::delete('schedule/destroy/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
		Route::post('schedule/{id}/status', [ScheduleController::class, 'updateStatus'])->name('schedule.updateStatus');

	});
});


