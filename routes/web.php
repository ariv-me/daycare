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
use App\Http\Controllers\PendaftaranDetailController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\MemberController;

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

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

	Route::get('/member', [HomeController::class, 'member'])->name('member');
	Route::get('/tagihan', [HomeController::class, 'tagihan'])->name('tagihan');
	
});


/**-- Data Pokok --**/

Route::group(['prefix' => 'dapok', 'as' => 'dapok.'], function () {

	Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {

		Route::get('/', [DapokOrtuController::class, 'index'])->name('index');
		Route::get('/view', [DapokOrtuController::class, 'view'])->name('view');
		Route::post('/save', [DapokOrtuController::class, 'save'])->name('save');
		Route::get('/edit', [DapokOrtuController::class, 'edit'])->name('edit');
		Route::post('/update', [DapokOrtuController::class, 'update'])->name('update');
		Route::get('/aktif', [DapokOrtuController::class, 'aktif'])->name('aktif');
		Route::get('/nonaktif', [DapokOrtuController::class, 'nonaktif'])->name('nonaktif');
		Route::get('/get', [DapokOrtuController::class, 'get'])->name('get');
		
	});

	Route::group(['prefix' => 'anak', 'as' => 'anak.'], function () {

		Route::get('/', [DapokAnakController::class, 'index'])->name('index');
		Route::get('/view', [DapokAnakController::class, 'view'])->name('view');
		Route::get('/view_anak', [DapokAnakController::class, 'view_anak'])->name('view_anak');
		Route::get('/view_anak_tagihan', [DapokAnakController::class, 'view_anak_tagihan'])->name('view_anak_tagihan');
		Route::post('/save', [DapokAnakController::class, 'save'])->name('save');
		Route::get('/get_anak', [DapokAnakController::class, 'get_anak'])->name('get_anak');
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

});

/**-- PENDAFTARAN --**/

Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {	
	
	// Pendaftaran Transaksi
	
	Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.'], function () {
		Route::get('/', [PendaftaranController::class, 'index'])->name('index');	
		Route::post('/save', [PendaftaranController::class, 'save'])->name('save');
		Route::get('/get', [PendaftaranController::class, 'get'])->name('get');
		Route::get('/edit_get/{id}', [PendaftaranController::class, 'edit_get'])->name('edit_get');
		Route::get('/detail_get/{id}', [PendaftaranController::class, 'detail_get'])->name('detail_get');
		Route::get('/edit_view/{id}', [PendaftaranController::class, 'edit_view'])->name('edit_view');
		Route::post('/update', [PendaftaranController::class, 'update'])->name('update');
		Route::post('/void', [PendaftaranController::class, 'void'])->name('void');

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

/**-- MEMBER --**/

Route::group(['prefix' => 'member', 'as' => 'member.'], function () {
	Route::get('/', [MemberController::class, 'index'])->name('index');	
	Route::get('/view', [MemberController::class, 'view'])->name('view');
	Route::get('/add', [MemberController::class, 'add'])->name('add');
	Route::post('/save', [MemberController::class, 'save'])->name('save');
	Route::get('/edit', [MemberController::class, 'edit'])->name('edit');
	Route::post('/update', [MemberController::class, 'update'])->name('update');
	Route::post('/nonaktif', [MemberController::class, 'nonaktif'])->name('nonaktif');
	
	
	Route::get('/detail_view', [MemberController::class, 'detail_view'])->name('detail_view');
});

/**-- TAGIHAN --**/

Route::group(['prefix' => 'tagihan', 'as' => 'tagihan.'], function () {
	Route::get('/', [TagihanController::class, 'index'])->name('index');	
	Route::get('/view', [TagihanController::class, 'view'])->name('view');
	Route::get('/add', [TagihanController::class, 'add'])->name('add');
	Route::post('/save', [TagihanController::class, 'save'])->name('save');
	Route::get('/edit', [TagihanController::class, 'edit'])->name('edit');
	Route::post('/update', [TagihanController::class, 'update'])->name('update');
	Route::post('/void', [TagihanController::class, 'void'])->name('void');
	
	
	Route::get('/detail_view', [TagihanController::class, 'detail_view'])->name('detail_view');
});

	
Route::group(['prefix' => 'pembayaran', 'as' => 'pembayaran.'], function () {

	Route::get('/data', [PembayaranController::class, 'data'])->name('data');
	Route::get('/view', [PembayaranController::class, 'view'])->name('view');
	Route::post('/save', [PembayaranController::class, 'save'])->name('save');
	Route::get('/edit', [PembayaranController::class, 'edit'])->name('edit');
	Route::get('/cetak/{id}', [PembayaranController::class, 'cetak'])->name('cetak');
	Route::get('/cetak_all/{id}', [PembayaranController::class, 'cetak_all'])->name('cetak_all');
	Route::post('/update', [PembayaranController::class, 'update'])->name('update');
	Route::post('/void', [PembayaranController::class, 'void'])->name('void');


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

	Route::group(['prefix' => 'orderan', 'as' => 'orderan.'], function () {
		
		Route::get('/', [CateringOrderDataController::class, 'index'])->name('index');
		Route::get('/view', [CateringOrderDataController::class, 'view'])->name('view');
		Route::get('/view_terima', [CateringOrderDataController::class, 'view_terima'])->name('view_terima');
		Route::get('/view_bayar', [CateringOrderDataController::class, 'view_bayar'])->name('view_bayar');
		Route::get('/terima', [CateringOrderDataController::class, 'terima'])->name('terima');
		Route::get('/bayar', [CateringOrderDataController::class, 'bayar'])->name('bayar');
		Route::get('/edit', [CateringOrderDataController::class, 'edit'])->name('edit');
		Route::post('/update', [CateringOrderDataController::class, 'update'])->name('update');
		Route::post('/delete', [CateringOrderDataController::class, 'delete'])->name('delete');
		
		Route::get('/export_order/{tgl_awal}/{tgl_akhir}/{status}', [CateringOrderDataController::class, 'export_order'])->name('export_order');
		// Route::get('/export_order_terima/{tgl_awal}/{tgl_akhir}/{status}', [CateringOrderDataController::class, 'export_order_terima'])->name('export_order_terima');
		// Route::get('/export_order_bayar/{tgl_awal}/{tgl_akhir}/{status}', [CateringOrderDataController::class, 'export_order_bayar'])->name('export_order_bayar');

	});

	// Order 

	Route::group(['prefix' => 'order', 'as' => 'order.'], function () {

		// ORDER

		Route::get('/', [CateringOrderController::class, 'index'])->name('index');
		Route::get('/view', [CateringOrderController::class, 'view'])->name('view');
		Route::post('/save', [CateringOrderController::class, 'save'])->name('save');
		Route::get('/edit', [CateringOrderController::class, 'edit'])->name('edit');
		Route::post('/delete', [CateringOrderController::class, 'delete'])->name('delete');
		Route::post('/update', [CateringOrderController::class, 'update'])->name('update');
		
		// DETAIL
		
		Route::get('/detail_view', [CateringOrderDetailController::class, 'view'])->name('detail_view');
		Route::get('/detail_view_update', [CateringOrderDetailController::class, 'view_update'])->name('detail_view_update');
		Route::post('/detail_save', [CateringOrderDetailController::class, 'save'])->name('detail_save');
		Route::get('/detail_edit', [CateringOrderDetailController::class, 'edit'])->name('detail_edit');
		Route::post('/detail_update', [CateringOrderDetailController::class, 'update'])->name('detail_update');
		Route::get('/detail_delete', [CateringOrderDetailController::class, 'delete'])->name('detail_delete');

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

		Route::get('/combo_catering_menu', [ComboController::class, 'combo_catering_menu'])->name('combo_catering_menu');
		Route::get('/combo_catering_jenis', [ComboController::class, 'combo_catering_jenis'])->name('combo_catering_jenis');
		Route::get('/combo_catering_kategori', [ComboController::class, 'combo_catering_kategori'])->name('combo_catering_kategori');
		Route::get('/combo_catering_item', [ComboController::class, 'combo_catering_item'])->name('combo_catering_item');
		Route::get('/combo_catering_paket', [ComboController::class, 'combo_catering_paket'])->name('combo_catering_paket');

	// Combo Data Pokok

		Route::get('/combo_dapok_anak', [ComboController::class, 'combo_dapok_anak'])->name('combo_dapok_anak');
		Route::get('/combo_dapok_ortu', [ComboController::class, 'combo_dapok_ortu'])->name('combo_dapok_ortu');
		Route::get('/combo_dapok_penjemput', [ComboController::class, 'combo_dapok_penjemput'])->name('combo_dapok_penjemput');
});

// Sistem

Route::group(['prefix' => 'combo_sistem', 'as' => 'combo_sistem.'], function () {

	Route::get('/combo_anak', [ComboSistemController::class, 'combo_anak'])->name('combo_anak');
	Route::get('/combo_ortu', [ComboSistemController::class, 'combo_ortu'])->name('combo_ortu');
	Route::get('/combo_penjemput', [ComboSistemController::class, 'combo_penjemput'])->name('combo_penjemput');
	Route::get('/combo_hubungan', [ComboSistemController::class, 'combo_hubungan'])->name('combo_hubungan');
	Route::get('/combo_bulan', [ComboSistemController::class, 'combo_bulan'])->name('combo_bulan');
	Route::get('/combo_grup', [ComboSistemController::class, 'combo_grup'])->name('combo_grup');
	Route::get('/combo_grup_detail', [ComboSistemController::class, 'combo_grup_detail'])->name('combo_grup_detail');
	Route::get('/combo_agama', [ComboSistemController::class, 'combo_agama'])->name('combo_agama');
	Route::get('/combo_kategori', [ComboSistemController::class, 'combo_kategori'])->name('combo_kategori');
	Route::get('/combo_provinsi', [ComboSistemController::class, 'combo_provinsi'])->name('combo_provinsi');
	Route::get('/combo_kota', [ComboSistemController::class, 'combo_kota'])->name('combo_kota');
	Route::get('/combo_kecamatan', [ComboSistemController::class, 'combo_kecamatan'])->name('combo_kecamatan');
	Route::get('/combo_pendidikan', [ComboSistemController::class, 'combo_pendidikan'])->name('combo_pendidikan');
	Route::get('/combo_periode', [ComboSistemController::class, 'combo_periode'])->name('combo_periode');

});
