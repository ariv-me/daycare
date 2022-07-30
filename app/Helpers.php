<?php

    use Carbon\Carbon;

    function helpers_tgl_indo_panjang($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan_panjang($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function format_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan_panjang($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function f_tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }

    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }

    function bulan_panjang($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    function hitung_mundur($wkt)
    {
        $waktu=array(   365*24*60*60    => "tahun",
                        30*24*60*60     => "bulan",
                        7*24*60*60      => "minggu",
                        24*60*60        => "hari",
                        60*60           => "jam",
                        60              => "menit",
                        1               => "detik");

        $hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
        $hasil = array();
        if($hitung<5)
        {
            $hasil = 'kurang dari 5 detik yang lalu';
        }
        else
        {
            $stop = 0;
            foreach($waktu as $periode => $satuan)
            {
                if($stop>=6 || ($stop>0 && $periode<60)) break;
                $bagi = floor($hitung/$periode);
                if($bagi > 0)
                {
                    $hasil[] = $bagi.' '.$satuan;
                    $hitung -= $bagi*$periode;
                    $stop++;
                }
                else if($stop>0) $stop++;
            }
            $hasil=implode(' ',$hasil).' yang lalu';
        }
        return $hasil;
    }

    /*-- WS HELPERS --*/

    function ws_map_hari($hari_id){

        $map = array(
            1 => 7,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4,
            6 => 5,
            7 => 6
        );
        
        if(isset($map[$hari_id])) return $map[$hari_id];
        return 0;
    }















    

    /*-- JADWAL --*/

    function map_hari($hari_id,$simrs=false){
        if($simrs){
            $map = array(
                1 => 2,
                2 => 3,
                3 => 4,
                4 => 5,
                5 => 6,
                6 => 7,
                7 => 1,
            );
        }
        else{
            $map = array(
                1 => 7,
                2 => 1,
                3 => 2,
                4 => 3,
                5 => 4,
                6 => 5,
                7 => 6,
            );
        }
        if(isset($map[$hari_id])) return $map[$hari_id];
        return 0;
    }
    
    function map_kelamin($value,$simrs=false){
        if($simrs){
            $map = array(
                'P' => 'L',
                'W' => 'P'
            );
        }
        else{
            $map = array(
                'L' => 'P',
                'P' => 'W'
            );
        }
        if(isset($map[$value])) return $map[$value];
        return 0;
    }

    function hari_id($tanggal){
        $tanggal = date('N',strtotime($tanggal));
        return $tanggal;
    }

    function nama_hari_mysph($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];

        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari;
    }
    
    function nama_hari($date){
        $nama = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        return ($nama[(int)$date - 1]);
    }
    
    function nama_hari_jadwal($date){
        $nama = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        return ($nama[(int)$date - 1]);
    }
    
    function nama_tanggal($date,$type=0){
        list($thn,$bln,$hari) = explode('-', $date);
        $nama_bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $nama = date('N',strtotime($date));
        switch ($type) {
            case 1:
                $format = $hari . ' ' . $nama_bulan[($bln-1)];
                break;
            case 2:
                $format = $hari . ' ' . $nama_bulan[($bln-1)];
                break;        
            case 3:
                $format = nama_hari($nama) . ', ' . $hari . ' ' . $nama_bulan[($bln-1)] . ' ' . $thn;
                break;
            case 4:
                $format = $nama_bulan[($bln-1)] . ' ' . $thn;
                break;        
            default:
            $format = $hari . ' ' . $nama_bulan[($bln-1)] . ' ' . $thn;
            break;
        }
        return $format;
    }

    function list_hari(){
        $_skr = Carbon::now();
        $_head = $_skr->subDays($_skr->format('N'));
        $collect = collect();
        for($i=0;$i<7;$i++){
            $_hari = new stdClass();
            $_tgl = $_head->addDays(1);
            $_hari->id   = $_tgl->format('N');
            $_hari->hari = nama_hari($_hari->id);
            $_hari->isToday = $_tgl->isToday();
            $collect->push($_hari);
        }
        return $collect;
    }

    function list_tanggal(){
        $_skr = Carbon::now();
        $_head = $_skr->subDays($_skr->format('N'));
        $collect = collect();
        for($i=0;$i<7;$i++){
            $_tmp = new stdClass();
            $_tgl = $_head->addDays(1);
            $_tmp->id   = $_tgl->format('N');
            $_tmp->hari = nama_hari($_tmp->id);
            $_tmp->text = nama_tanggal($_tgl->format('Y-m-d'),1);
            $_tmp->tanggal = $_tgl->format('Y-m-d');
            $_tmp->isToday = $_tgl->isToday();
            $collect->push($_tmp);
        }
        return $collect;
    }

    /*-- MR --*/

    function format_mr($no_mr){
        $no_mr = substr($no_mr, -8);
        $no_mr = str_split($no_mr);
        $no_mr = array_chunk($no_mr, 2, true); 
        $no_mr = collect($no_mr)->map(function($q){
            return implode('', $q);
        });
        return $no_mr->implode('-');
    }

    /*-- ANGKA --*/

    function format_rupiah($angka){
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah; 
    }


    function html_normalize($result){
        $result = trim(preg_replace('/\r/', '', $result));
        $result = trim(preg_replace('/\n/', '', $result));
        $result = trim(preg_replace('/\t/', '', $result));
        return $result;
    }

    function terbilang($angka) {
        $angka=abs($angka);
        $baca =array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
      
        $terbilang="";
         if ($angka < 12){
             $terbilang= " " . $baca[$angka];
         }
         else if ($angka < 20){
             $terbilang= terbilang($angka - 10) . " Belas";
         }
         else if ($angka < 100){
             $terbilang= terbilang($angka / 10) . " Puluh" . terbilang($angka % 10);
         }
         else if ($angka < 200){
             $terbilang= " seratus" . terbilang($angka - 100);
         }
         else if ($angka < 1000){
             $terbilang= terbilang($angka / 100) . " Ratus" . terbilang($angka % 100);
         }
         else if ($angka < 2000){
             $terbilang= " seribu" . terbilang($angka - 1000);
         }
         else if ($angka < 1000000){
             $terbilang= terbilang($angka / 1000) . " Ribu" . terbilang($angka % 1000);
         }
         else if ($angka < 1000000000){
            $terbilang= terbilang($angka / 1000000) . " Juta" . terbilang($angka % 1000000);
         }
            return $terbilang;
     }

?>