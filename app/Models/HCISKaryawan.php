<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class HCISKaryawan extends Model
{
    protected $connection = 'spf';
    protected $table = 'hris_ta_karyawan';
    protected $primaryKey = 'kar_id';

    public function getKarid($param)
    {
        $data = DB::connection('spf')
                        ->table('hris_ta_karyawan AS aa')
                        ->leftjoin('sistem_tc_unit AS bb', 'bb.unit_id', '=', 'aa.unit_id')
                        ->leftjoin('sistem_tc_jabatan AS cc', 'cc.jab_id', '=', 'aa.jab_id')
                        ->leftjoin('sistem_tc_golongan AS dd', 'dd.gol_id', '=', 'aa.gol_id')
                        ->where('kar_id',$param)
                        ->first();

        return $data;
    }

    public static function getNip($param) {
        $data = HCISKaryawan::where('kar_nip',$param)->count();
        return $data;  
    }

    public static function getNamaLengkap($param) {
        $kar = HCISKaryawan::where('kar_id',$param)->first();

        if (($kar->kar_gelar_depan) != null) {

            if (($kar->kar_gelar_belakang) != null) {
                $data = $kar->kar_gelar_depan.'. '.$kar->kar_nama.', '.$kar->kar_gelar_belakang;
            } else {
                $data = $kar->kar_gelar_depan.'. '.$kar->kar_nama;
            }

        } else if (($kar->kar_gelar_belakang) != null) {
            $data = $kar->kar_nama.', '.$kar->kar_gelar_belakang;
        } else {
            $data = $kar->kar_nama;
        } 

        return $data;  
    }

    /*-- PIMPINAN --*/

    public static function getKaru($unit) {

        $query = DB::connection('spf')
                    ->table('hris_ta_karyawan AS aa')
                    ->leftjoin('sistem_tc_unit AS bb','bb.unit_id','=','aa.unit_id')
                    ->where('aa.jab_id','9')
                    ->where('bb.unit_id',$unit)
                    ->first();

        if ($query == null) {
            $data = '';
        } else {
            $data = HCISKaryawan::getNamaLengkap($query->kar_id);
        }

        return $data;  
    }

    public static function getKasi($unit) {

        $query = DB::connection('spf')
                    ->table('hris_ta_karyawan AS aa')
                    ->leftjoin('sistem_tc_unit AS bb','bb.unit_id','=','aa.unit_id')
                    ->where('aa.jab_id','7')
                    ->where('bb.unit_id',$unit)
                    ->first();
                    
        if ($query == null) {
            $data = '';
        } else {
            $data = HCISKaryawan::getNamaLengkap($query->kar_id);
        }

        return $data;  
    }

    public static function getKabag($unit) {

        $tmp = SistemUnit::where('unit_id',$unit)->first()->unit_parent;

        $query = DB::connection('spf')
                    ->table('hris_ta_karyawan AS aa')
                    ->leftjoin('sistem_tc_unit AS bb','bb.unit_id','=','aa.unit_id')
                    ->where('aa.jab_id','5')
                    ->where('bb.unit_id',$tmp)
                    ->first();

        if ($query == null) {
            $data = '';
        } else {
            $data = HCISKaryawan::getNamaLengkap($query->kar_id);
        }

        return $data;  
    }

    public static function getDir() {

        $query = HCISKaryawan::where('jab_id','17')->where('kar_aktif','Y')->first();
        $data = HCISKaryawan::getNamaLengkap($query->kar_id);
        return $data;  
    }

    public static function getDirJab() {
        $query = HCISKaryawan::where('jab_id','17')->where('kar_aktif','Y')->first();
        $data = SistemJabatan::where('jab_id',$query->jab_id)->first()->jab_nama;
        return $data;  
    }

    /*-- FULL --*/

    public static function getAtasanKaru($unit) {

        $query = DB::connection('spf')
                        ->table('hris_ta_karyawan AS aa')
                        ->leftjoin('sistem_tc_unit AS bb','bb.unit_id','=','aa.unit_id')
                        ->where('aa.jab_id','9')
                        ->where('bb.unit_id',$unit)
                        ->first();

        if ($query == null) {
            $data = '';
        } else {
            $data = $query;
        }

        return $data;  
    }

    public static function getAtasanKasi($unit) {

        $query = DB::connection('spf')
                    ->table('hris_ta_karyawan AS aa')
                    ->leftjoin('sistem_tc_unit AS bb','bb.unit_id','=','aa.unit_id')
                    ->where('aa.jab_id','7')
                    ->where('bb.unit_id',$unit)
                    ->first();
                    
        if ($query == null) {
            $data = NULL;
        } else {
            $data = $query;
        }

        return $data;  
    }

    public static function getAtasanKabag($unit) {

        $tmp = SistemUnit::where('unit_id',$unit)->first()->unit_parent;

        $query = DB::connection('spf')
                    ->table('hris_ta_karyawan AS aa')
                    ->leftjoin('sistem_tc_unit AS bb','bb.unit_id','=','aa.unit_id')
                    ->where('aa.jab_id','5')
                    ->where('bb.unit_id',$tmp)
                    ->first();

        if ($query == null) {
            $data = NULL;
        } else {
            $data = $query;
        }

        return $data;  
    }

    public static function getAtasanDir() {
        $data = HCISKaryawan::where('jab_id','17')->where('kar_aktif','Y')->first();
        return $data;  
    }

}
