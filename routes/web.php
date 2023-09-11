<?php

use Illuminate\Support\Facades\Auth;

/*-- APP --*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;   
use App\Http\Controllers\AnakController;
use App\Http\Controllers\GrupController;
use App\Http\Controllers\PenjemputController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\JenisPekerjaanController;
use App\Http\Controllers\TarifJenisController;
use App\Http\Controllers\TarifKategoriController;
use App\Http\Controllers\TarifItemController;
use App\Http\Controllers\TarifController;
;

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendaftaranTagihanController;
use App\Http\Controllers\PendaftaranDetailController;
use App\Http\Controllers\BayarController;

/*-- CATERING --*/
use App\Http\Controllers\CateringOrderController;
use App\Http\Controllers\CateringOrderDetailController;
use App\Http\Controllers\CateringOrderDataController;
use App\Http\Controllers\CateringMenuController;
use App\Http\Controllers\CateringKategoriController;

/*-- DATA POKOK --*/
use App\Http\Controllers\DapokOrtuController;
use App\Http\Controllers\DapokAnakController;
use App\Http\Controllers\DapokPenjemputController;

/*-- COMBO --*/
use App\Http\Controllers\ComboSistemController;
use App\Http\Controllers\ComboController;







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

	Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {

		Route::get('/', [DapokOrtuController::class, 'index'])->name('index');
		Route::get('/view_ortu', [DapokOrtuController::class, 'view_ortu'])->name('view_ortu');
		Route::post('/save', [DapokOrtuController::class, 'save'])->name('save');
		Route::get('/edit', [DapokOrtuController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokOrtuController::class, 'update'])->name('update');
		Route::get('/aktif', [DapokOrtuController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [DapokOrtuController::class, 'nonaktif'])->name('nonaktif');
		
	});

	Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

		Route::get('/', [DapokAnakController::class, 'index'])->name('index');
		Route::get('/view_anak', [DapokAnakController::class, 'view_anak'])->name('view_anak');
		Route::post('/save', [DapokAnakController::class, 'save'])->name('save');
		Route::get('/edit', [DapokAnakController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokAnakController::class, 'update'])->name('update');
		Route::get('/aktif', [DapokAnakController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [DapokAnakController::class, 'nonaktif'])->name('nonaktif');
		
	});

	Route::group(['prefix' => 'penjemput', 'as' => 'penjemput.'], function () {

		Route::get('/', [DapokPenjemputController::class, 'index'])->name('index');
		Route::get('/view_pnj', [DapokPenjemputController::class, 'view_pnj'])->name('view_pnj');
		Route::post('/save', [DapokPenjemputController::class, 'save'])->name('save');
		Route::get('/edit', [DapokPenjemputController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokPenjemputController::class, 'update'])->name('update');
		Route::get('/aktif', [DapokPenjemputController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [DapokPenjemputController::class, 'nonaktif'])->name('nonaktif');
		
	});

	Route::group(['prefix' => 'kontak_darurat', 'as' => 'kontak_darurat.'], function () {

		Route::get('/', [DapokKontakDaruratController::class, 'index'])->name('index');
		Route::get('/view_kontak', [DapokKontakDaruratController::class, 'view_kontak'])->name('view_kontak');
		Route::post('/save', [DapokKontakDaruratController::class, 'save'])->name('save');
		Route::get('/edit', [DapokKontakDaruratController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokKontakDaruratController::class, 'update'])->name('update');
		Route::get('/aktif', [DapokKontakDaruratController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [DapokKontakDaruratController::class, 'nonaktif'])->name('nonaktif');
		
	});

	
});

/**-- PENDAFTARAN --**/

Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {	
	
	// Pendaftaran Transaksi
	
	Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.'], function () {
		Route::get('/', [PendaftaranController::class, 'index'])->name('index');	
		Route::post('/save', [PendaftaranController::class, 'save'])->name('save');
		Route::get('/get', [PendaftaranController::class, 'get'])->name('get');
		Route::get('/edit_get/{id}', [PendaftaranController::class, 'edit_get'])->name('edit_get');
		Route::get('/edit_view/{id}', [PendaftaranController::class, 'edit_view'])->name('edit_view');
		Route::post('/update', [PendaftaranController::class, 'update'])->name('update');
		Route::post('/void', [PendaftaranController::class, 'void'])->name('void');

	});

	Route::group(['prefix' => 'tagihan', 'as' => 'tagihan.'], function () {
		Route::get('/', [PendaftaranTagihanController::class, 'index'])->name('index');	
		Route::get('/view', [PendaftaranTagihanController::class, 'view'])->name('view');
		Route::post('/save', [PendaftaranTagihanController::class, 'save'])->name('save');
		Route::get('/edit', [PendaftaranTagihanController::class, 'edit'])->name('edit');
		Route::post('/update', [PendaftaranTagihanController::class, 'update'])->name('update');
		Route::post('/void', [PendaftaranTagihanController::class, 'void'])->name('void');

	});

	// Pendaftaran Detail

	Route::group(['prefix' => 'detail', 'as' => 'detail.'], function () {

		Route::post('/save', [PendaftaranDetailController::class, 'save'])->name('save');
		Route::get('/view', [PendaftaranDetailController::class, 'view'])->name('view');
		Route::get('/edit', [PendaftaranDetailController::class, 'edit'])->name('edit');
		Route::post('/update', [PendaftaranDetailController::class, 'update'])->name('update');
		Route::get('/delete', [PendaftaranDetailController::class, 'delete'])->name('delete');

	});


	


	
});

	
Route::group(['prefix' => 'biaya', 'as' => 'biaya.'], function () {

	Route::get('/', [BiayaController::class, 'index'])->name('index');
	Route::get('/view', [BiayaController::class, 'view'])->name('view');
	Route::post('/save', [BiayaController::class, 'save'])->name('save');
	Route::get('/edit', [BiayaController::class, 'edit'])->name('edit');
	Route::post('/update', [BiayaController::class, 'update'])->name('update');
	Route::post('/void', [BiayaController::class, 'void'])->name('void');


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

	// Jenis

	Route::group(['prefix' => 'jenis', 'as' => 'jenis.'], function () {

		Route::get('/', [TarifJenisController::class, 'index'])->name('index');
		Route::get('/view', [TarifJenisController::class, 'view'])->name('view');
		Route::post('/save', [TarifJenisController::class, 'save'])->name('save');
		Route::get('/edit', [TarifJenisController::class, 'edit'])->name('edit');
		Route::post('/update', [TarifJenisController::class, 'update'])->name('update');
		Route::get('/aktif', [TarifJenisController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [TarifJenisController::class, 'nonaktif'])->name('nonaktif');	

	});

	// Kategori

	Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {

		Route::get('/', [TarifKategoriController::class, 'index'])->name('index');
		Route::get('/view', [TarifKategoriController::class, 'view'])->name('view');
		Route::post('/save', [TarifKategoriController::class, 'save'])->name('save');
		Route::get('/edit', [TarifKategoriController::class, 'edit'])->name('edit');
		Route::post('/update', [TarifKategoriController::class, 'update'])->name('update');
		Route::get('/aktif', [TarifKategoriController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [TarifKategoriController::class, 'nonaktif'])->name('nonaktif');

	});

	// Item

	Route::group(['prefix' => 'item', 'as' => 'item.'], function () {

		Route::get('/', [TarifItemController::class, 'index'])->name('index');
		Route::get('/view', [TarifItemController::class, 'view'])->name('view');
		Route::post('/save', [TarifItemController::class, 'save'])->name('save');
		Route::get('/edit', [TarifItemController::class, 'edit'])->name('edit');
		Route::post('/update', [TarifItemController::class, 'update'])->name('update');
		Route::get('/aktif', [TarifItemController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [TarifItemController::class, 'nonaktif'])->name('nonaktif');

	});

	// Tarif
		
	Route::get('/', [TarifController::class, 'index'])->name('index');
	Route::get('/view', [TarifController::class, 'view'])->name('view');
	Route::get('/view_transaksi', [TarifController::class, 'view_transaksi'])->name('view_transaksi');
	Route::post('/save', [TarifController::class, 'save'])->name('save');
	Route::get('/edit', [TarifController::class, 'edit'])->name('edit');
	Route::get('/get_tarif', [TarifController::class, 'get_tarif'])->name('get_tarif');
	Route::post('/update', [TarifController::class, 'update'])->name('update');
	Route::get('/aktif', [TarifController::class, 'aktif'])->name('aktif');
	Route::get('/nonaktif', [TarifController::class, 'nonaktif'])->name('nonaktif');

	Route::post('/detail_save', [TarifController::class, 'detail_save'])->name('detail_save');
	Route::get('/detail_view', [TarifController::class, 'detail_view'])->name('detail_view');
	Route::get('/detail_edit', [TarifController::class, 'detail_edit'])->name('detail_edit');
	Route::get('/detail_nonaktif', [TarifController::class, 'detail_nonaktif'])->name('detail_nonaktif');



});



// Catering

Route::group(['prefix' => 'catering', 'as' => 'catering.'], function () {
	
	Route::get('/item_menu_view', [CateringMenuController::class, 'item_menu_view'])->name('item_menu_view');
	Route::get('/item_view', [CateringMenuController::class, 'item_view'])->name('item_view');
	Route::post('/item_save', [CateringMenuController::class, 'item_save'])->name('item_save');
	Route::get('/item_delete', [CateringMenuController::class, 'item_delete'])->name('item_delete');


	Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {
		
		Route::get('/', [CateringKategoriController::class, 'index'])->name('index');
		Route::get('/view', [CateringKategoriController::class, 'view'])->name('view');
		Route::post('/save', [CateringKategoriController::class, 'save'])->name('save');
		Route::get('/edit', [CateringKategoriController::class, 'edit'])->name('edit');
		Route::post('/update', [CateringKategoriController::class, 'update'])->name('update');
		Route::get('/aktif', [CateringKategoriController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [CateringKategoriController::class, 'nonaktif'])->name('nonaktif');
	
	});

	Route::group(['prefix' => 'menu', 'as' => 'menu.'], function () {
		
		Route::get('/', [CateringMenuController::class, 'index'])->name('index');
		Route::get('/view', [CateringMenuController::class, 'view'])->name('view');
		Route::post('/save', [CateringMenuController::class, 'save'])->name('save');
		Route::get('/edit', [CateringMenuController::class, 'edit'])->name('edit');
		Route::post('/update', [CateringMenuController::class, 'update'])->name('update');
		Route::post('/void', [CateringMenuController::class, 'void'])->name('void');
		Route::get('/aktif', [CateringMenuController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [CateringMenuController::class, 'nonaktif'])->name('nonaktif');
		
	
	});

	// Order 

	Route::group(['prefix' => 'order', 'as' => 'order.'], function () {

		// ORDER

		Route::get('/', [CateringOrderController::class, 'index'])->name('index');
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



	

});



Route::group(['prefix' => 'combo', 'as' => 'combo.'], function () {

	// Combo Tarif

		Route::get('/combo_tarif_jenis', [ComboController::class, 'combo_tarif_jenis'])->name('combo_tarif_jenis');
		Route::get('/combo_tarif_kategori', [ComboController::class, 'combo_tarif_kategori'])->name('combo_tarif_kategori');
		Route::get('/combo_tarif_item', [ComboController::class, 'combo_tarif_item'])->name('combo_tarif_item');
		Route::get('/combo_tarif_paket', [ComboController::class, 'combo_tarif_paket'])->name('combo_tarif_paket');
		Route::get('/combo_tarif_paket2', [ComboController::class, 'combo_tarif_paket2'])->name('combo_tarif_paket2');


	// Combo Catering

		Route::get('/combo_catering_jenis', [ComboController::class, 'combo_catering_jenis'])->name('combo_catering_jenis');
		Route::get('/combo_catering_kategori', [ComboController::class, 'combo_catering_kategori'])->name('combo_catering_kategori');
		Route::get('/combo_catering_item', [ComboController::class, 'combo_catering_item'])->name('combo_catering_item');
		Route::get('/combo_catering_paket', [ComboController::class, 'combo_catering_paket'])->name('combo_catering_paket');

	// Combo Data Pokok

		Route::get('/combo_dapok_anak', [ComboSistemController::class, 'combo_dapok_anak'])->name('combo_dapok_anak');
		Route::get('/combo_dapok_ortu', [ComboSistemController::class, 'combo_dapok_ortu'])->name('combo_dapok_ortu');
		Route::get('/combo_dapok_penjemput', [ComboSistemController::class, 'combo_penjemput'])->name('combo_penjemput');
});

// Sistem

Route::group(['prefix' => 'combo_sistem', 'as' => 'combo_sistem.'], function () {

	Route::get('/combo_anak', [ComboSistemController::class, 'combo_anak'])->name('combo_anak');
	Route::get('/combo_ortu', [ComboSistemController::class, 'combo_ortu'])->name('combo_ortu');
	Route::get('/combo_penjemput', [ComboSistemController::class, 'combo_penjemput'])->name('combo_penjemput');
	Route::get('/combo_hubungan', [ComboSistemController::class, 'combo_hubungan'])->name('combo_hubungan');
	Route::get('/combo_bulan', [ComboSistemController::class, 'combo_bulan'])->name('combo_bulan');
	Route::get('/combo_grup', [ComboSistemController::class, 'combo_grup'])->name('combo_grup');
	Route::get('/combo_agama', [ComboSistemController::class, 'combo_agama'])->name('combo_agama');
	Route::get('/combo_kategori', [ComboSistemController::class, 'combo_kategori'])->name('combo_kategori');
	Route::get('/combo_provinsi', [ComboSistemController::class, 'combo_provinsi'])->name('combo_provinsi');
	Route::get('/combo_kota', [ComboSistemController::class, 'combo_kota'])->name('combo_kota');
	Route::get('/combo_kecamatan', [ComboSistemController::class, 'combo_kecamatan'])->name('combo_kecamatan');
	Route::get('/combo_pendidikan', [ComboSistemController::class, 'combo_pendidikan'])->name('combo_pendidikan');
	Route::get('/combo_periode', [ComboSistemController::class, 'combo_periode'])->name('combo_periode');

});
