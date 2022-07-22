<?php

use Illuminate\Support\Facades\Auth;

/*-- APP --*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComboSistemController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\JenisPekerjaanController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\BayarController;



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

// Pendaftaran, Biaya

Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {

	Route::get('/', [PendaftaranController::class, 'index'])->name('index');
	Route::get('/view', [PendaftaranController::class, 'view'])->name('view');
	Route::post('/save', [PendaftaranController::class, 'save'])->name('save');
	Route::get('/edit', [PendaftaranController::class, 'edit'])->name('edit');
	Route::post('/update', [PendaftaranController::class, 'update'])->name('update');
	Route::post('/void', [PendaftaranController::class, 'void'])->name('void');

	Route::post('/anak', [PendaftaranController::class, 'anak'])->name('anak');
	Route::post('/wali', [PendaftaranController::class, 'wali'])->name('wali');

	Route::get('/ortu_anak', [PendaftaranController::class, 'ortu_anak'])->name('ortu_anak');
	
});

Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

	Route::get('/', [OrtuController::class, 'index'])->name('index');
	Route::get('/view', [OrtuController::class, 'view'])->name('view');
	Route::post('/save', [OrtuController::class, 'save'])->name('save');
	Route::get('/edit', [OrtuController::class, 'edit'])->name('edit');
	Route::post('/update', [OrtuController::class, 'update'])->name('update');
	Route::post('/void', [OrtuController::class, 'void'])->name('void');

});

Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {

	Route::get('/', [OrtuController::class, 'index'])->name('index');
	Route::get('/view', [OrtuController::class, 'view'])->name('view');
	Route::post('/save', [OrtuController::class, 'save'])->name('save');
	Route::get('/edit', [OrtuController::class, 'edit'])->name('edit');
	Route::post('/update', [OrtuController::class, 'update'])->name('update');
	Route::post('/void', [OrtuController::class, 'void'])->name('void');

});

Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

	Route::get('/', [AnakController::class, 'index'])->name('index');
	Route::get('/view', [AnakController::class, 'view'])->name('view');
	Route::post('/save', [AnakController::class, 'save'])->name('save');
	Route::get('/edit', [AnakController::class, 'edit'])->name('edit');
	Route::post('/update', [AnakController::class, 'update'])->name('update');
	Route::post('/void', [AnakController::class, 'void'])->name('void');

});
	
Route::group(['prefix' => 'biaya', 'as' => 'biaya.'], function () {

	Route::get('/', [BiayaController::class, 'index'])->name('index');
	Route::get('/view', [BiayaController::class, 'view'])->name('view');
	Route::post('/save', [BiayaController::class, 'save'])->name('save');
	Route::get('/edit', [BiayaController::class, 'edit'])->name('edit');
	Route::post('/update', [BiayaController::class, 'update'])->name('update');
	Route::post('/void', [BiayaController::class, 'void'])->name('void');


});

// Orang Tua & Anak

Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

	Route::get('/', [AnakController::class, 'index'])->name('index');
	Route::get('/view', [AnakController::class, 'view'])->name('view');
	Route::post('/save', [AnakController::class, 'save'])->name('save');
	Route::get('/edit', [AnakController::class, 'edit'])->name('edit');
	Route::post('/update', [AnakController::class, 'update'])->name('update');
	Route::post('/void', [AnakController::class, 'void'])->name('void');

});


Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {

	Route::get('/', [OrtuController::class, 'index'])->name('index');
	Route::get('/view', [OrtuController::class, 'view'])->name('view');
	Route::post('/save', [OrtuController::class, 'save'])->name('save');
	Route::get('/edit', [OrtuController::class, 'edit'])->name('edit');
	Route::post('/update', [OrtuController::class, 'update'])->name('update');
	Route::post('/void', [OrtuController::class, 'void'])->name('void');

});

// Grup, Perusahaan, Jenis Pekerjaan, 

Route::group(['prefix' => 'grup', 'as' => 'grup.'], function () {

	Route::get('/', [GrupController::class, 'index'])->name('index');
	Route::get('/view', [GrupController::class, 'view'])->name('view');
	Route::post('/save', [GrupController::class, 'save'])->name('save');
	Route::get('/edit', [GrupController::class, 'edit'])->name('edit');
	Route::post('/update', [GrupController::class, 'update'])->name('update');
	Route::post('/void', [GrupController::class, 'void'])->name('void');

});

Route::group(['prefix' => 'perusahaan', 'as' => 'perusahaan.'], function () {

	Route::get('/', [PerusahaanController::class, 'index'])->name('index');
	Route::get('/view', [PerusahaanController::class, 'view'])->name('view');
	Route::post('/save', [PerusahaanController::class, 'save'])->name('save');
	Route::get('/edit', [PerusahaanController::class, 'edit'])->name('edit');
	Route::post('/update', [PerusahaanController::class, 'update'])->name('update');
	Route::post('/void', [PerusahaanController::class, 'void'])->name('void');

});

Route::group(['prefix' => 'jenis_kerja', 'as' => 'jenis_kerja.'], function () {

	Route::get('/', [JenisPekerjaanController::class, 'index'])->name('index');
	Route::get('/view', [JenisPekerjaanController::class, 'view'])->name('view');
	Route::post('/save', [JenisPekerjaanController::class, 'save'])->name('save');
	Route::get('/edit', [JenisPekerjaanController::class, 'edit'])->name('edit');
	Route::post('/update', [JenisPekerjaanController::class, 'update'])->name('update');
	Route::post('/void', [JenisPekerjaanController::class, 'void'])->name('void');

});

// Jenis Member

Route::group(['prefix' => 'jenis', 'as' => 'jenis.'], function () {

	Route::get('/', [JenisController::class, 'index'])->name('index');
	Route::get('/view', [JenisController::class, 'view'])->name('view');
	Route::post('/save', [JenisController::class, 'save'])->name('save');
	Route::get('/edit', [JenisController::class, 'edit'])->name('edit');
	Route::post('/update', [JenisController::class, 'update'])->name('update');
	Route::post('/void', [JenisController::class, 'void'])->name('void');

});

Route::group(['prefix' => 'tarif', 'as' => 'tarif.'], function () {

	Route::get('/', [TarifController::class, 'index'])->name('index');
	Route::get('/view', [TarifController::class, 'view'])->name('view');
	Route::post('/save', [TarifController::class, 'save'])->name('save');
	Route::get('/edit', [TarifController::class, 'edit'])->name('edit');
	Route::post('/update', [TarifController::class, 'update'])->name('update');
	Route::post('/void', [TarifController::class, 'void'])->name('void');

});

// Sistem

Route::group(['prefix' => 'combo_sistem', 'as' => 'combo_sistem.'], function () {

	Route::get('/combo_anak', [ComboSistemController::class, 'combo_anak'])->name('combo_anak');
	Route::get('/combo_ortu', [ComboSistemController::class, 'combo_ortu'])->name('combo_ortu');
	Route::get('/combo_pekerjaan', [ComboSistemController::class, 'combo_pekerjaan'])->name('combo_pekerjaan');
	Route::get('/combo_jenis_pekerjaan', [ComboSistemController::class, 'combo_jenis_pekerjaan'])->name('combo_jenis_pekerjaan');
	Route::get('/combo_hubungan', [ComboSistemController::class, 'combo_hubungan'])->name('combo_hubungan');
	Route::get('/combo_bulan', [ComboSistemController::class, 'combo_bulan'])->name('combo_bulan');
	Route::get('/combo_grup', [ComboSistemController::class, 'combo_grup'])->name('combo_grup');
	Route::get('/combo_perusahaan', [ComboSistemController::class, 'combo_perusahaan'])->name('combo_perusahaan');
	Route::get('/combo_jenis_pendaftaran', [ComboSistemController::class, 'combo_jenis_pendaftaran'])->name('combo_jenis_pendaftaran');
	Route::get('/combo_agama', [ComboSistemController::class, 'combo_agama'])->name('combo_agama');
	
});

