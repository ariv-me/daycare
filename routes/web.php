<?php

use Illuminate\Support\Facades\Auth;

/*-- APP --*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;



Route::get('/', function () {
	return view('auth.login');
});

Route::group(['prefix' => 'ws_generate', 'as' => 'ws_generate.'], function () {
	Route::get('/mysph_dokter', [BridgingToJadwalController::class, 'mysph_dokter'])->name('mysph_dokter');
});

Auth::routes([
	'register' => false,
	'reset' => false,
	'verify' => false,
  ]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {

	Route::get('/', [PendaftaranController::class, 'index'])->name('index');
	Route::get('/view', [PendaftaranController::class, 'view'])->name('view');
	Route::post('/save', [PendaftaranController::class, 'save'])->name('save');
	Route::get('/edit', [PendaftaranController::class, 'edit'])->name('edit');
	Route::post('/update', [PendaftaranController::class, 'update'])->name('update');
	Route::post('/void', [PendaftaranController::class, 'void'])->name('void');

});

