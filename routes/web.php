<?php

use Illuminate\Support\Facades\Auth;

/*-- APP --*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;   
use App\Http\Controllers\ComboSistemController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\PenjemputController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\JenisPekerjaanController;
use App\Http\Controllers\TarifJenisController;
use App\Http\Controllers\TarifKategoriController;
use App\Http\Controllers\TarifHargaController;
use App\Http\Controllers\PendaftaranDetailController;
use App\Http\Controllers\BayarController;

/*-- CATERING --*/
use App\Http\Controllers\CateringOrderController;
use App\Http\Controllers\CateringOrderDetailController;
use App\Http\Controllers\CateringOrderDataController;
use App\Http\Controllers\CateringMenuController;
use App\Http\Controllers\CateringKategoriController;

/*-- DATA POKOK --*/
use App\Http\Controllers\DapokController;
use App\Http\Controllers\DapokOrtuController;
use App\Http\Controllers\DapokAnakController;
use App\Http\Controllers\DapokWaliController;
use App\Http\Controllers\DapokPenjemputController;
use App\Http\Controllers\DapokKontakDaruratController;







Route::get('/', function () {
	return view('auth.login');
});

Auth::routes([
		'register' => false,
		'reset' => false,
		'verify' => false,
  ]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**-- HOME & BLANK --**/
Route::group(['prefix' => 'blank', 'as' => 'blank.'], function () {
	Route::get('/', [HomeController::class, 'index_blank'])->name('index');
});


/**-- Data Pokok --**/

Route::group(['prefix' => 'dapok', 'as' => 'dapok.'], function () {

	Route::get('/', [DapokController::class, 'index'])->name('index');

	Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {

		Route::get('/', [DapokOrtuController::class, 'index'])->name('index');
		Route::get('/view', [DapokOrtuController::class, 'view'])->name('view');
		Route::post('/save', [DapokOrtuController::class, 'save'])->name('save');
		Route::get('/edit', [DapokOrtuController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokOrtuController::class, 'update'])->name('update');
		Route::get('/aktif', [DapokOrtuController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [DapokOrtuController::class, 'nonaktif'])->name('nonaktif');
		
	});

	Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

		Route::get('/', [DapokAnakController::class, 'index'])->name('index');
		Route::get('/view', [DapokAnakController::class, 'view'])->name('view');
		Route::post('/save', [DapokAnakController::class, 'save'])->name('save');
		Route::get('/edit', [DapokAnakController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokAnakController::class, 'update'])->name('update');
		Route::post('/aktif', [DapokAnakController::class, 'aktif'])->name('aktif');
		Route::post('/nonaktif', [DapokAnakController::class, 'nonaktif'])->name('nonaktif');
		
	});

	Route::group(['prefix' => 'penjemput', 'as' => 'penjemput.'], function () {

		Route::get('/', [DapokPenjemputController::class, 'index'])->name('index');
		Route::get('/view', [DapokPenjemputController::class, 'view'])->name('view');
		Route::post('/save', [DapokPenjemputController::class, 'save'])->name('save');
		Route::get('/edit', [DapokPenjemputController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokPenjemputController::class, 'update'])->name('update');
		Route::post('/aktif', [DapokPenjemputController::class, 'aktif'])->name('aktif');
		Route::post('/nonaktif', [DapokPenjemputController::class, 'nonaktif'])->name('nonaktif');
		
	});

	Route::group(['prefix' => 'kontak_darurat', 'as' => 'kontak_darurat.'], function () {

		Route::get('/', [DapokKontakDaruratController::class, 'index'])->name('index');
		Route::get('/view', [DapokKontakDaruratController::class, 'view'])->name('view');
		Route::post('/save', [DapokKontakDaruratController::class, 'save'])->name('save');
		Route::get('/edit', [DapokKontakDaruratController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokKontakDaruratController::class, 'update'])->name('update');
		Route::post('/aktif', [DapokKontakDaruratController::class, 'aktif'])->name('aktif');
		Route::post('/nonaktif', [DapokKontakDaruratController::class, 'nonaktif'])->name('nonaktif');
		
	});

	
});

/**-- PENDAFTARAN --**/

Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {



	
	Route::get('/', [PendaftaranDetailController::class, 'index'])->name('index');	

	// Pendaftaran Transaksi

	Route::get('/view', [PendaftaranController::class, 'view'])->name('view');
	Route::post('/save', [PendaftaranController::class, 'save'])->name('save');
	Route::get('/edit', [PendaftaranController::class, 'edit'])->name('edit');
	Route::post('/update', [PendaftaranController::class, 'update'])->name('update');
	Route::post('/void', [PendaftaranController::class, 'void'])->name('void');

	// Pendaftaran Detail

	Route::get('/view_detail', [PendaftaranDetailController::class, 'view_detail'])->name('view_detail');
	Route::post('/save_detail', [PendaftaranDetailController::class, 'save_detail'])->name('save_detail');
	Route::get('/edit_detail', [PendaftaranDetailController::class, 'edit_detail'])->name('edit_detail');
	Route::post('/update_detail', [PendaftaranDetailController::class, 'update_detail'])->name('update_detail');
	Route::get('/delete_detail', [PendaftaranDetailController::class, 'delete_detail'])->name('delete_detail');
	
});






Route::group(['prefix' => 'penjemput', 'as' => 'penjemput.'], function () {

	Route::get('/', [PenjemputController::class, 'index'])->name('index');
	Route::get('/view', [PenjemputController::class, 'view'])->name('view');
	Route::post('/save', [PenjemputController::class, 'save'])->name('save');
	Route::get('/edit', [PenjemputController::class, 'edit'])->name('edit');
	Route::post('/update', [PenjemputController::class, 'update'])->name('update');
	Route::post('/void', [PenjemputController::class, 'void'])->name('void');


});

Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

	Route::get('/', [AnakController::class, 'index'])->name('index');
	Route::get('/view', [AnakController::class, 'view'])->name('view');
	Route::post('/save', [AnakController::class, 'save'])->name('save');
	Route::get('/edit', [AnakController::class, 'edit'])->name('edit');
	Route::post('/update', [AnakController::class, 'update'])->name('update');
	Route::post('/void', [AnakController::class, 'void'])->name('void');

	Route::post('/save_daftar', [AnakController::class, 'save_daftar'])->name('save_daftar');


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


// Grup, Perusahaan, Jenis Pekerjaan, 

Route::group(['prefix' => 'grup', 'as' => 'grup.'], function () {

	Route::get('/', [GrupController::class, 'index'])->name('index');
	Route::get('/view', [GrupController::class, 'view'])->name('view');
	Route::post('/save', [GrupController::class, 'save'])->name('save');
	Route::get('/edit', [GrupController::class, 'edit'])->name('edit');
	Route::post('/update', [GrupController::class, 'update'])->name('update');
	Route::post('/aktif', [GrupController::class, 'aktif'])->name('aktif');
	Route::post('/nonaktif', [GrupController::class, 'nonaktif'])->name('nonaktif');

});

Route::group(['prefix' => 'perusahaan', 'as' => 'perusahaan.'], function () {

	Route::get('/', [PerusahaanController::class, 'index'])->name('index');
	Route::get('/view', [PerusahaanController::class, 'view'])->name('view');
	Route::post('/save', [PerusahaanController::class, 'save'])->name('save');
	Route::get('/edit', [PerusahaanController::class, 'edit'])->name('edit');
	Route::post('/update', [PerusahaanController::class, 'update'])->name('update');
	Route::post('/void', [PerusahaanController::class, 'void'])->name('void');
	Route::get('/aktif', [PerusahaanController::class, 'aktif'])->name('aktif');
	Route::get('/nonaktif', [PerusahaanController::class, 'nonaktif'])->name('nonaktif');

});

Route::group(['prefix' => 'jenis_kerja', 'as' => 'jenis_kerja.'], function () {

	Route::get('/', [JenisPekerjaanController::class, 'index'])->name('index');
	Route::get('/view', [JenisPekerjaanController::class, 'view'])->name('view');
	Route::post('/save', [JenisPekerjaanController::class, 'save'])->name('save');
	Route::get('/edit', [JenisPekerjaanController::class, 'edit'])->name('edit');
	Route::post('/update', [JenisPekerjaanController::class, 'update'])->name('update');
	Route::get('/aktif', [JenisPekerjaanController::class, 'aktif'])->name('aktif');
	Route::get('/nonaktif', [JenisPekerjaanController::class, 'nonaktif'])->name('nonaktif');

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

// Tarif

Route::group(['prefix' => 'tarif', 'as' => 'tarif.'], function () {

	// Tarif

	Route::get('/jenis', [TarifJenisController::class, 'index'])->name('jenis');
	Route::get('/jenis_view', [TarifJenisController::class, 'view'])->name('jenis_view');
	Route::post('/jenis_save', [TarifJenisController::class, 'save'])->name('jenis_save');
	Route::get('/jenis_edit', [TarifJenisController::class, 'edit'])->name('jenis_edit');
	Route::post('/jenis_update', [TarifJenisController::class, 'update'])->name('jenis_update');
	Route::get('/jenis_aktif', [TarifJenisController::class, 'aktif'])->name('jenis_aktif');
	Route::get('/jenis_nonaktif', [TarifJenisController::class, 'nonaktif'])->name('jenis_nonaktif');

	// Kategori

	Route::get('/kategori', [TarifKategoriController::class, 'index'])->name('kategori');
	Route::get('/kategori_view', [TarifKategoriController::class, 'view'])->name('kategori_view');
	Route::post('/kategori_save', [TarifKategoriController::class, 'save'])->name('kategori_save');
	Route::get('/kategori_edit', [TarifKategoriController::class, 'edit'])->name('kategori_edit');
	Route::post('/kategori_update', [TarifKategoriController::class, 'update'])->name('kategori_update');
	Route::get('/kategori_aktif', [TarifKategoriController::class, 'aktif'])->name('kategori_aktif');
	Route::get('/kategori_nonaktif', [TarifKategoriController::class, 'nonaktif'])->name('kategori_nonaktif');

	// Harga

	Route::get('/harga', [TarifHargaController::class, 'index'])->name('harga');
	Route::get('/harga_view', [TarifHargaController::class, 'view'])->name('harga_view');
	Route::post('/harga_save', [TarifHargaController::class, 'save'])->name('harga_save');
	Route::get('/harga_edit', [TarifHargaController::class, 'edit'])->name('harga_edit');
	Route::post('/harga_update', [TarifHargaController::class, 'update'])->name('harga_update');
	Route::get('/harga_aktif', [TarifHargaController::class, 'aktif'])->name('harga_aktif');
	Route::get('/harga_nonaktif', [TarifHargaController::class, 'nonaktif'])->name('harga_nonaktif');

});

// Order 

Route::group(['prefix' => 'order', 'as' => 'order.'], function () {

	// ORDER

	Route::get('/index', [CateringOrderController::class, 'index'])->name('index');
	Route::get('/view', [CateringOrderController::class, 'view'])->name('view');
	Route::post('/save', [CateringOrderController::class, 'save'])->name('save');
	Route::get('/edit', [CateringOrderController::class, 'edit'])->name('edit');
	Route::post('/void', [CateringOrderController::class, 'void'])->name('void');
	
	// PIUTANG BAYAR
	Route::post('/piutang_bayar', [CateringOrderController::class, 'piutang_bayar'])->name('piutang_bayar');

	// PIUTANG VIEW
	Route::get('/piutang_view', [CateringOrderController::class, 'view_piutang'])->name('piutang_view');
	Route::get('/piutang_detail', [CateringOrderController::class, 'piutang_detail'])->name('piutang_detail');

	// DATA
	Route::get('/data', [CateringOrderDataController::class, 'index'])->name('data');
	Route::get('/data_view', [CateringOrderDataController::class, 'view'])->name('data_view');
	

	// DETAIL
	Route::get('/', [CateringOrderDetailController::class, 'index'])->name('index');
	Route::get('/detail_view', [CateringOrderDetailController::class, 'view'])->name('detail_view');
	Route::post('/detail_save', [CateringOrderDetailController::class, 'save'])->name('detail_save');
	Route::get('/detail_edit', [CateringOrderDetailController::class, 'edit'])->name('detail_edit');
	Route::post('/detail_update', [CateringOrderDetailController::class, 'update'])->name('detail_update');
	Route::get('/detail_void', [CateringOrderDetailController::class, 'void'])->name('detail_void');

});

// Catering

Route::group(['prefix' => 'catering', 'as' => 'catering.'], function () {
	

	Route::get('/menu', [CateringMenuController::class, 'index'])->name('menu');
	Route::get('/menu_view', [CateringMenuController::class, 'view'])->name('menu_view');
	Route::post('/menu_save', [CateringMenuController::class, 'save'])->name('menu_save');
	Route::get('/menu_edit', [CateringMenuController::class, 'edit'])->name('menu_edit');
	Route::post('/menu_update', [CateringMenuController::class, 'update'])->name('menu_update');
	Route::post('/menu_void', [CateringMenuController::class, 'void'])->name('menu_void');
	Route::get('/menu_aktif', [CateringMenuController::class, 'aktif'])->name('menu_aktif');
	Route::get('/menu_nonaktif', [CateringMenuController::class, 'nonaktif'])->name('menu_nonaktif');
	
	Route::get('/item_menu_view', [CateringMenuController::class, 'item_menu_view'])->name('item_menu_view');
	Route::get('/item_view', [CateringMenuController::class, 'item_view'])->name('item_view');
	Route::post('/item_save', [CateringMenuController::class, 'item_save'])->name('item_save');
	Route::get('/item_delete', [CateringMenuController::class, 'item_delete'])->name('item_delete');
	
	Route::get('/kategori', [CateringKategoriController::class, 'index'])->name('kategori');
	Route::get('/kategori_view', [CateringKategoriController::class, 'view'])->name('kategori_view');
	Route::post('/kategori_save', [CateringKategoriController::class, 'save'])->name('kategori_save');
	Route::get('/kategori_edit', [CateringKategoriController::class, 'edit'])->name('kategori_edit');
	Route::post('/kategori_update', [CateringKategoriController::class, 'update'])->name('kategori_update');
	Route::get('/kategori_aktif', [CateringKategoriController::class, 'aktif'])->name('kategori_aktif');
	Route::get('/kategori_nonaktif', [CateringKategoriController::class, 'nonaktif'])->name('kategori_nonaktif');

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
	Route::get('/combo_kategori', [ComboSistemController::class, 'combo_kategori'])->name('combo_kategori');
	Route::get('/combo_jenis_tarif', [ComboSistemController::class, 'combo_jenis_tarif'])->name('combo_jenis_tarif');
	Route::get('/combo_provinsi', [ComboSistemController::class, 'combo_provinsi'])->name('combo_provinsi');
	Route::get('/combo_kota', [ComboSistemController::class, 'combo_kota'])->name('combo_kota');
	Route::get('/combo_kecamatan', [ComboSistemController::class, 'combo_kecamatan'])->name('combo_kecamatan');
	Route::get('/combo_pendidikan', [ComboSistemController::class, 'combo_pendidikan'])->name('combo_pendidikan');
	Route::get('/combo_hubungan', [ComboSistemController::class, 'combo_hubungan'])->name('combo_hubungan');
	
});
