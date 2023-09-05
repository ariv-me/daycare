<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use config;

use App\Models\HCISKaryawan;

class SistemApp extends Model
{
    protected $connection = 'spf';
    protected $table = 'sistem_ta_app';
    protected $primaryKey = 'app_id';

    public static function sistem() {

        $url = config('app.url');
        $url_dokumen = config('app.url_dokumen');

        $idu = \Auth::guard()->user()->idu;
        
        $kar = DB::connection('spf')
                        ->table('hcm_tb_karyawan AS aa')
                        ->leftjoin('hcm_ta_unit AS bb','bb.unit_id','=','aa.unit_id')
                        ->leftjoin('hcm_ta_bagian AS cc','cc.bag_id','=','bb.bag_id')
                        ->leftjoin('hcm_ta_jabatan AS dd','dd.jab_id','=','aa.jab_id')
                        ->leftjoin('sistem_tc_usaha AS ee','ee.usaha_id','=','cc.usaha_id')
                        ->where('aa.kar_id',$idu)
                        ->first();

        $app = array();
        $app['id'] = \Auth::guard()->user()->id;   
        $app['idu'] = \Auth::guard()->user()->idu;
        $app['name'] = \Auth::guard()->user()->name; 
        $app['username'] =  \Auth::guard()->user()->username;  
        $app['foto'] = \Auth::guard()->user()->foto;

        $kar_nama = explode(" ",$kar->kar_nama);
        $kar_nama_lengkap = HCISKaryawan::getNamaLengkap($idu);
        $kar_nama_awal = strtoupper($kar_nama[0]);

        /*-- KARYAWAN --*/
        $app['kar_id'] = $kar->kar_id;
        $app['kar_nip'] = $kar->kar_nip;
        $app['kar_nama'] = $kar_nama;
        $app['kar_nama_lengkap'] = $kar_nama_lengkap;
        $app['kar_nama_awal'] = $kar_nama_awal;

        /*-- JABATAN --*/
        $app['jab_id'] = $kar->jab_id;
        $app['jab_nama'] = $kar->jab_nama;
        
        /*-- UNIT --*/
        $app['unit_id'] = $kar->unit_id;
        $app['unit_nama'] = $kar->unit_nama;
        $app['unit_inisial'] = $kar->unit_inisial;
        $app['unit_level'] = $kar->unit_level;
        $app['bag_id'] = $kar->bag_id;
        $app['bag_nama'] = $kar->bag_nama;
        $app['bag_inisial'] = $kar->bag_inisial;
        $app['usaha_id'] = $kar->usaha_id;
        $app['usaha_kode'] = $kar->usaha_kode;
        $app['usaha_nama'] = $kar->usaha_nama;
        $app['usaha_alamat'] = $kar->usaha_alamat;

        $apps = SistemApp::where('app_id','5')->first();        
        
        $app['app_nama'] = $apps->app_nama;
        $app['app_moto'] = $apps->app_moto;
        $app['app_favicon'] = $apps->app_favicon;
        $app['app_logo'] = $apps->app_logo;
        $app['app_dev'] = $apps->app_dev;
        $app['lembaga_nama'] = $apps->lembaga_nama;

        $app['url'] = $url;
        $app['url_dokumen'] = $url_dokumen;
        $app['ip'] = Request()->ip();

        return $app;
    }

    public static function OtoritasMenu($id)
    {

        $app = SistemApp::sistem();
        $unit = $app['unit_id'];

        $admin = SistemSuperadmin::where('kar_id',$app['kar_id'])->count();

        if ($admin > 0 ) {

            $menu_unit = DB::connection('spf')
                                ->table('sistem_ta_fitur AS aa')
                                ->where('aa.fitur_grup','5')
                                ->where('aa.fitur_aktif','Y')
                                ->orderby('aa.fitur_level')
                                ->orderby('aa.fitur_urut')
                                ->orderby('aa.fitur_nama')
                                ->get(); 

        } else {

            $menu = DB::connection('spf')
                            ->table('sistem_ta_menu AS aa')
                            ->leftjoin('sistem_ta_fitur AS bb','bb.fitur_id','aa.fitur_id')
                            ->where('aa.unit_id',$unit)
                            ->where('bb.fitur_grup','5')
                            ->where('bb.fitur_all','T')
                            ->where('bb.fitur_aktif','Y')
                            ->orderby('bb.fitur_level')
                            ->orderby('bb.fitur_urut')
                            ->orderby('bb.fitur_nama')
                            ->get();          

            $menu_all = DB::connection('spf')
                                ->table('sistem_ta_fitur AS aa')
                                ->where('aa.fitur_grup','5')
                                ->where('aa.fitur_all','Y')
                                ->where('aa.fitur_aktif','Y')
                                ->get();
                            
            $menu_unit = $menu->merge($menu_all);



        }
     
        if ($menu_unit == null) {
            $menu_unit = null;
        } else {
            $menu_unit = $menu_unit;
        }

        $header = $menu_unit->map(function($value) {
            return $value;
        })->groupBy('fitur_parent');

        $head = [];
        foreach($menu_unit as $header) {
            $head[] = $header->fitur_parent;
        }

        $menuUtama = DB::connection('spf')
                            ->table('sistem_ta_fitur AS aa')
                            ->whereIN('aa.fitur_id',$head)
                            ->where('aa.fitur_jenis','1')
                            ->orderby('aa.fitur_level')
                            ->orderby('aa.fitur_urut')
                            ->where('aa.fitur_aktif','Y')
                            ->get();

        $menu_utama     = $menuUtama;
        $menu_sub       = $menu_unit->where('fitur_jenis','2');
        $menu_anak      = $menu_unit->where('fitur_jenis','3');

        //dd($menu_utama);

        $menu['menu_utama']     = $menu_utama;
        $menu['menu_sub']     = $menu_sub;
        $menu['menu_anak']      = $menu_anak;

        $menu['aplikasi']      = SistemFitur::where('fitur_parent','!=', '')->orderby('fitur_level')->orderby('fitur_urut')->get();

        return $menu;
    }

    public static function login() {

        $apps = SistemApp::where('app_id','5')->first();
    
        $app['app_nama'] = $apps->app_nama;
        $app['app_moto'] = $apps->app_moto;
        $app['app_favicon'] = $apps->app_favicon;
        $app['app_logo'] = $apps->app_logo;
        $app['app_dev'] = $apps->app_dev;
        $app['lembaga_nama'] = $apps->lembaga_nama;

        $app['url'] = $url;
        $app['url_dokumen'] = $url_dokumen;
        $app['ip'] = Request()->ip();
        
        return $app;
    }

}
