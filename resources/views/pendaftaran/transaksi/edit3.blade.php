@extends('app.layouts.template')

@section('css')
    <style>

        .scrollspy-example {
            position: relative;
            height: 325px;
            margin-top: 0.1rem;
            overflow: auto;
        }
        .modal-header {
            padding: 0.5rem 0.5rem 0.5rem 1rem;
        }

        .form-control {
            border-radius: 0rem;
            padding: 0.5rem 0.5rem;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .table td, .table th {
            font-size: 10px;
            padding: 0.3rem;
        }

        label {
            font-weight: 500;
            color: #6c757d;
            font-size: 13px;
        }

        .btn {
            border-radius: 0px;
        }

        .card-header:first-child {
            border-radius: calc(0rem - 1px) calc(0rem - 1px) 0 0;
        }

        .card {
            border-radius: 0rem;
        }

        .red {
            color:#ff0002;
        }

        code {
            color: #ff0002;
            font-size: 13px;
        }

    </style>   
@endsection


@section('content')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success ">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title text-white"><i class="fas fa-clipboard-list"></i>  PENDAFTARAN</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">    
                
                <div class="row justify-content-center">
                   
                    
                    <div class="col-lg-12 total-payment p-3">

                        <h4 class="card-title"><i class="fas fa-edit"></i>  PENDAFTARAN</h4>
                        <hr>
                        <input type="hidden" class="form-control" id="daftar_kode" name="daftar_kode"disabled>
                        <input type="hidden" class="form-control" id="anak_kode" name="anak_kode"disabled>
                        <input type="hidden" class="form-control" id="ortu_kode" name="ortu_kode"disabled>
                        <input type="hidden" class="form-control" id="pnj_kode" name="pnj_kode"disabled>


                        <div class="row">
                            <div class="col-sm-6">
                                
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Petugas<small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="petugas" name="petugas" value="{{ Auth::user()->name }}" disabled>
                                    </div>
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Tgl Daftar<small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" id="tgl_daftar" name="tgl_daftar">
                                    </div>
                                </div>  

                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Periode<small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="periode" id="periode"></select>
                                    </div>
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Grup <small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="grup" id="grup"></select>
                                    </div>
                                </div>  
                                
                                
                            </div>
                            <div class="col-sm-6">
                                
                                
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Kategori <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori"  onchange="showFilterKategori(this)"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Paket <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="paket" id="paket"  onchange="showFilterPaket(this)"></select>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <hr class="hr-dashed">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered mb-0 table-centered">
                                    <thead>
                                        <tr>
                                            <th width="1%" style="text-align: center; vertical-align: middle;" rowspan="2"  >NO</th>
                                            <th width="20%" style="text-align: center; vertical-align: middle;" rowspan="2"  >NAMA</th>
                                            <th style="text-align: center" colspan="5">BIAYA</th>
                                        </tr>
                                        <tr>
                                            <th width="10%" style="text-align: center">REG</th>
                                            <th width="10%" style="text-align: center">GIZI</th>
                                            <th width="10%" style="text-align: center">SPP</th>
                                            <th width="10%" style="text-align: center">PMEBANGUNAN</th>
                                            <th width="10%" style="text-align: center">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data_tarif">
                                    
                                    </tbody>
                                </table><!--end /table-->
                                
                            </div>
                        </div>
                      

                        <hr class="hr-dashed">

                         

                         <h4 class="card-title"><i class="fas fa-child"></i>  DATA ANAK</h4>
                         <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Nama<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="anak_nama" name="anak_nama">
                                    </div>
                                </div>     
        
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Jenis Kelamin<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="anak_jekel" id="anak_jekel"></select>
                                    </div>
                                </div>  
    
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Tempat Lahir<small class="text-danger">*</small></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="anak_tmp_lahir" name="anak_tmp_lahir">
                                    </div>
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-left">Tgl Lahir<small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" id="anak_tgl_lahir" name="anak_tgl_lahir">
                                    </div>
                                </div>          
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Anak Ke <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Jumlah Saudara</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="anak_saudara" name="anak_saudara" value="0" onkeypress="return angka(this, event)">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Berat</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">  
                                            <input type="text" class="form-control" id="anak_berat" name="anak_berat" onkeypress="return angka(this, event)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Tinggi</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">  
                                            <input type="text" class="form-control" id="anak_tinggi" name="anak_tinggi" onkeypress="return angka(this, event)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
 
                        <hr class="hr-dashed">

                        <h4 class="card-title"><i class="fas fa-user-friends"></i>  DATA ORANG TUA</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-left">Nama Ayah <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ayah_nama" name="ayah_nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-3 col-form-label text-left">NIK <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ayah_nik" name="ayah_nik" onkeypress="return angka(this, event)">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-left">Tempat Lahir <small class="text-danger">*</small></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="ayah_tmp_lahir" name="ayah_tmp_lahir">
                                    </div>
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-left">Tgl Lahir <small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" id="ayah_lahir" name="ayah_lahir">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Agama <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="ayah_agama" id="ayah_agama"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ayah_kerja" name="ayah_kerja">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">NO HP</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="ayah_hp" name="ayah_hp" onkeypress="return angka(this, event)">
                                    </div>
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">NO WA</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="ayah_wa" name="ayah_wa" onkeypress="return angka(this, event)">
                                    </div>
                                </div> 
                                
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Tingkat Pendidikan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="ayah_pdk" id="ayah_pdk"></select>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-left">Nama Ibu <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ibu_nama" name="ibu_nama" data-dtp="dtp_1uPaU">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-3 col-form-label text-left">NIK <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ibu_nik" name="ibu_nik" onkeypress="return angka(this, event)">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-left">Tempat Lahir <small class="text-danger">*</small></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="ibu_tmp_lahir" name="ibu_tmp_lahir">
                                    </div>
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-left">Tgl Lahir <small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" id="ibu_lahir" name="ibu_lahir">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Agama <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="ibu_agama" id="ibu_agama"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ibu_kerja" name="ibu_kerja">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Nomor HP</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="ibu_hp" name="ibu_hp" onkeypress="return angka(this, event)">
                                    </div>
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Nomor WA</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="ibu_wa" name="ibu_wa" onkeypress="return angka(this, event)">
                                    </div>
                                </div> 
                                
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Tingkat Pendidikan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="ibu_pdk" id="ibu_pdk"></select>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <hr class="hr-dashed">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-left">Provinsi <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="provinsi" id="provinsi" onchange="showOrtuProvinsi(this)"></select>
                                    </div>
                                </div>
                       
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-left">Kecamatan<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="kecamatan" id="kecamatan"></select>
                                    </div>
                                </div>
                                                   
                            </div>
                            <div class="col-sm-6">
                               
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-3 col-form-label text-left">Kab/Kota <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="kota" id="kota" onchange="showOrtuKota(this)"></select>
                                    </div>
                                </div> 
                            
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Alamat<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                </div>                        
                            </div>
                        </div>

                        <hr class="hr-dashed">

                       

                        <h4 class="card-title"><i class="fas fa-taxi"></i>  DATA PENJEMPUT</h4>
                        <hr>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Nama<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="penjemput_nama" name="penjemput_nama">
                                    </div>
                                </div>     
        
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">NIK<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="penjemput_nik" name="penjemput_nik" onkeypress="return angka(this, event)">
                                    </div>
                                </div>  
    
        
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Tempat Lahir<small class="text-danger">*</small></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="penjemput_tmp_lahir" name="penjemput_tmp_lahir">
                                    </div>

                                    <label for="example-password-input" class="col-sm-2 col-form-label text-left">Tgl Lahir <small class="text-danger">*</small></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control datepicker" id="penjemput_lahir" name="penjemput_lahir">
                                    </div>
                                </div>     
        
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Agama <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_agama" id="penjemput_agama"></select>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-3 col-form-label text-left">Hubungan <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_hubungan" id="penjemput_hubungan"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="penjemput_kerja" name="penjemput_kerja">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Tingkat Pendidikan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_pdk" id="penjemput_pdk"></select>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Nomor HP</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="penjemput_hp" name="penjemput_hp" onkeypress="return angka(this, event)">
                                    </div>
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label text-left">Nomor WA</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="penjemput_wa" name="penjemput_wa" onkeypress="return angka(this, event)">
                                    </div>
                                </div> 
                                
                                
                            </div>
                        </div>
                        <hr class="hr-dashed">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-left">Provinsi <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_provinsi" id="penjemput_provinsi" onchange="showPenjemputProvinsi(this)"></select>
                                    </div>
                                </div>
                       
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-left">Kecamatan<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kecamatan" id="penjemput_kecamatan"></select>
                                    </div>
                                </div>
                                                   
                            </div>
                            <div class="col-sm-6">
                               
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-3 col-form-label text-left">Kab/Kota <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kota" id="penjemput_kota" onchange="showPenjemputKota(this)"></select>
                                    </div>
                                </div> 
                            
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-3 col-form-label text-left">Alamat<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="penjemput_alamat" name="penjemput_alamat">
                                    </div>
                                </div>                        
                            </div>
                        </div>

                        {{-- <hr class="hr-dashed">               --}}
                           
                    </div>
                </div>
            </div><!--end card-body-->
           
            <div class="card-footer float-right d-print-none">
                <button type="submit" class="btn btn-success btn-sm" id="btn_simpan">
                    <i class="fas fa-save"></i> DAFTAR
                </button>
            </div>
            
            
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();

        $('.datepicker[name=tanggal]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker[name=anak_tgl_lahir]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker[name=ibu_lahir]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker[name=ayah_lahir]').val(moment().format('DD-MM-YYYY'));

        $('.datepicker').datepicker({
            autoclose: true,
            format:'dd-mm-yyyy',
        });

        combo_grup();
        combo_kategori();
        combo_paket();
        combo_periode();
        
        combo_ayah_agama();
        combo_ibu_agama();
        combo_kecamatan();
        combo_kota();
        combo_provinsi();
        combo_ayah_pendidikan();
        combo_ibu_pendidikan(); 

        combo_hubungan_penjemput();
        combo_jekel_penjemput();
        combo_pendidikan_penjemput();
        combo_agama_penjemput();
        combo_kecamatan_penjemput();
        combo_kota_penjemput();
        combo_provinsi_penjemput();

        combo_anak_jekel();
        combo_anak_agama();

        view();

    });

    // ORTU

    function showOrtuProvinsi(select){
        var provinsi=$('#provinsi').val();
        combo_kota(provinsi);

        var kota=$('#kota').val();
        combo_kecamatan(kota);
    }

    function showOrtuKota(select){
        var kota=$('#kota').val();
        combo_kecamatan(kota);
    }

    // ORTU

    function showOrtuProvinsiEdit(select){
        var provinsi=$('#provinsi_edit').val();
        combo_kota(provinsi);

        var kota=$('#kota_edit').val();
        combo_kecamatan(kota);
    }

    function showOrtuKotaEdit(select){
        var kota=$('#kota_edit').val();
        combo_kecamatan(kota);
    }

    // PENJEMPUT

    function showPenjemputProvinsi(select){
        var provinsi=$('#penjemput_provinsi').val();
        combo_kota_penjemput(provinsi);

        var kota=$('#penjemput_kota').val();
        combo_kecamatan_penjemput(kota);
    }

    function showPenjemputKota(select){
        var kota=$('#penjemput_kota').val();
        combo_kecamatan_penjemput(kota);
    }

    function showPenjemputProvinsiEdit(select){
        var provinsi=$('#penjemput_provinsi_edit').val();
        combo_kota_penjemput(provinsi);

        var kota=$('#penjemput_kota_edit').val();
        combo_kecamatan_penjemput(kota);
    }

    function showPenjemputKotaEdit(select){
        var kota=$('#penjemput_kota_edit').val();
        combo_kecamatan_penjemput(kota);
    }


   

    function reset() {
        $('#ayah_nama').val("");
        $('#ayah_nik').val("");
        $('#ayah_lahir').val("").trigger("change");
        $('#ayah_kerja').val("").trigger("change");
        $('#ayah_agama').val("").trigger("change");
        $('#ayah_hp').val("");
        $('#ayah_wa').val("");
        $('#alamat').val("");
        $('#ibu_nama').val("");
        $('#ibu_nik').val("");
        $('#ibu_lahir').val("").val("").trigger("change");
        $('#ibu_kerja').val("").trigger("change");
        $('#ibu_kerja').val("").trigger("change");
        $('#ibu_agama').val("").trigger("change");
        $('#ibu_hp').val("");
        $('#ibu_wa').val("");
        $('#ibu_alamat').val(""); 

        $('#ortu').val("").trigger("change");
        $('#anak_jekel').val("").trigger("change");
        $('#anak_agama').val("").trigger("change");
        $('#anak_tgl_lahir').val("").trigger("change");
        $('#anak_nama').val(""); 
        $('#anak_tmp_lahir').val(""); 
        $('#anak_ke').val(""); 
        $('#anak_saudara').val(""); 
        $('#anak_berat').val(""); 
        $('#anak_tinggi').val(""); 
        $('#anak_alamat').val(""); 
        $('#anak_alamat').val(""); 
        $('#id_edit_anak').val(""); 


        $('#id_kerja').val(""); 
        $('#kerja_nama').val(""); 

    }

    function view() {

        $.ajax({
        type: 'GET',
        url: "{{ route('pendaftaran.transaksi.edit_get', $id) }}",
        async: true,
        dataType: 'JSON',
        success: function(data) {      
            
                console.log(data);
                
                $('[name="daftar_kode"]').val(data.daftar_kode);
                $('[name="anak_kode"]').val(data.anak_kode);
                $('[name="ortu_kode"]').val(data.ortu_kode);
                $('[name="pnj_kode"]').val(data.pnj_kode);
                $('[name="tarif_kode"]').val(data.tarif_kode);
                
                $('[name="tgl_daftar"]').datepicker('setDate',moment(data.daftar_tgl).format('DD-MM-YYYY'));
                $('[name="periode"]').val(data.periode_id).trigger("change");
                $('[name="grup"]').val(data.grup_id).trigger("change");
                $('[name="kategori"]').val(data.kat_id).trigger("change");
                $('[name="paket"]').val(data.tarif_kode).trigger("change");

                $('[name="anak_nama"]').val(data.anak_nama);
                $('[name="anak_tmp_lahir"]').val(data.anak_tmp_lahir);
                $('[name="anak_tgl_lahir"]').datepicker('setDate',moment(data.anak_tgl_lahir).format('DD-MM-YYYY'));
                $('[name="anak_jekel"]').val(data.anak_jekel).trigger("change");
                $('[name="anak_ke"]').val(data.anak_ke);
                $('[name="anak_saudara"]').val(data.anak_jml_saudara);
                $('[name="anak_berat"]').val(data.anak_berat);
                $('[name="anak_tinggi"]').val(data.anak_tinggi);

                $('[name="ayah_nama"]').val(data.ortu_ayah);
                $('[name="ayah_nik"]').val(data.ortu_ayah_nik);
                $('[name="ayah_tmp_lahir"]').val(data.ortu_ayah_tmp_lahir);
                $('[name="ayah_lahir"]').datepicker('setDate',moment(data.ortu_ayah_tgl_lahir).format('DD-MM-YYYY'));
                $('[name="ayah_kerja"]').val(data.ortu_ayah_kerja);
                $('[name="ayah_hp"]').val(data.ortu_ayah_hp);
                $('[name="ayah_wa"]').val(data.ortu_ayah_wa);
                $('[name="ayah_pdk"]').val(data.ortu_ayah_pdk_id).trigger("change");
                $('[name="ayah_agama"]').val(data.ortu_ayah_agama_id).trigger("change");

                $('[name="ibu_nama"]').val(data.ortu_ibu);
                $('[name="ibu_nik"]').val(data.ortu_ibu_nik);
                $('[name="ibu_tmp_lahir"]').val(data.ortu_ibu_tmp_lahir);
                $('[name="ibu_lahir"]').datepicker('setDate',moment(data.ortu_ibu_tgl_lahir).format('DD-MM-YYYY'));
                $('[name="ibu_kerja"]').val(data.ortu_ibu_kerja);
                $('[name="ibu_hp"]').val(data.ortu_ibu_hp);
                $('[name="ibu_wa"]').val(data.ortu_ibu_wa);
                $('[name="ibu_pdk"]').val(data.ortu_ibu_pdk_id).trigger("change");
                $('[name="ibu_agama"]').val(data.ortu_ibu_agama_id).trigger("change");

                $('[name="provinsi"]').val(data.ortu_provinsi_id).trigger("change");
                $('[name="kota"]').val(data.ortu_kota_kode).trigger("change");
                $('[name="kecamatan"]').val(data.ortu_kecamatan_id).trigger("change");
                $('[name="alamat"]').val(data.ortu_alamat);

                $('[name="penjemput_nama"]').val(data.pnj_nama);
                $('[name="penjemput_nik"]').val(data.pnj_nik);
                $('[name="penjemput_tmp_lahir"]').val(data.pnj_tmp_lahir);
                $('[name="penjemput_lahir"]').datepicker('setDate',moment(data.pnj_tgl_lahir).format('DD-MM-YYYY'));
                $('[name="penjemput_kerja"]').val(data.pnj_kerja);
                $('[name="penjemput_hp"]').val(data.pnj_hp);
                $('[name="penjemput_wa"]').val(data.pnj_wa);
                $('[name="penjemput_hubungan"]').val(data.pnj_hub_id).trigger("change");
                $('[name="penjemput_pdk"]').val(data.pnj_pdk_id).trigger("change");
                $('[name="penjemput_agama"]').val(data.pnj_agama_id).trigger("change");

                $('[name="penjemput_provinsi"]').val(data.pnj_provinsi_id).trigger("change");
                $('[name="penjemput_kota"]').val(data.pnj_kota_kode).trigger("change");
                $('[name="penjemput_kecamatan"]').val(data.pnj_kecamatan_id).trigger("change");
                $('[name="penjemput_alamat"]').val(data.pnj_alamat);

            }
            
        });

    }



    $('#btn_simpan').on('click', function(){

        if (!$("#tgl_daftar").val()) {
            $.toast({
                text: 'TANGGAL DAFTAR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#tgl_daftar").focus();
            return false;

        }

        else if (!$("#periode").val()) {
            $.toast({
                text: 'PERIODE HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#periode").focus();
            return false;
        }

        else if (!$("#grup").val()) {
            $.toast({
                text: 'GRUP HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#grup").focus();
            return false;
        }

        else if (!$("#paket").val()) {
            $.toast({
                text: 'PAKET HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#paket").focus();
            return false;
        }


        else if (!$("#anak_nama").val()) {
            $.toast({
                text: 'NAMA ANAK MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_nama").focus();
            return false;

        } 
        
        else if (!$("#anak_jekel").val()) {
            $.toast({
                text: 'JENIS KELAMIN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_jekel").focus();
            return false;

        } 
        
        else if (!$("#anak_tgl_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tgl_lahir").focus();
            return false;

        } 
        
        else if (!$("#anak_tmp_lahir").val()) {
            $.toast({
                text: 'TEMPAT LAHIR MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tmp_lahir").focus();
            return false;

        } 

        else if (!$("#anak_ke").val()) {
            $.toast({
                text: 'ANAK KE MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_ke").focus();
            return false;

        } 
        
        else if (!$("#anak_berat").val()) {
            $.toast({
                text: 'BERAT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_berat").focus();
            return false;

        } 

        else if (!$("#anak_tinggi").val()) {
            $.toast({
                text: 'BERAT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tinggi").focus();
            return false;

        } 
        
    
        
        else if (!$("#ayah_nama").val()) {
            $.toast({
                text: 'NAMA AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_nama").focus();
            return false;

        } 
        
        else if (!$("#ayah_nik").val()) {
            $.toast({
                text: 'NIK AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_nik").focus();
            return false;

        }

        else if (!$("#ayah_tmp_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR AYAH  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_tmp_lahir").focus();
            return false;

        }

        else if (!$("#ayah_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR AYAH  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_lahir").focus();
            return false;

        }

        else if (!$("#ayah_agama").val()) {
            $.toast({
                text: 'AGAMA AYAH  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_agama").focus();
            return false;

        }

        else if (!$("#ayah_kerja").val()) {
            $.toast({
                text: 'KERJA AYAH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_kerja").focus();
            return false;

        }

        
        else if (!$("#ayah_hp").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_hp").focus();
            return false;

        } 

        else if (!$("#ayah_wa").val()) {
            $.toast({
                text: 'WA AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_wa").focus();
            return false;

        } 

        else if (!$("#ayah_pdk").val()) {
            $.toast({
                text: 'PENDIDIKAN AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_pdk").focus();
            return false;

        } 

      
        // IBU 
        
        else if (!$("#ibu_nama").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_nama").focus();
            return false;

        } 
        
        else if (!$("#ibu_nik").val()) {
            $.toast({
                text: 'NIK IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_nik").focus();
            return false;

        } 

        else if (!$("#ibu_tmp_lahir").val()) {
            $.toast({
                text: 'TEMPAT LAHIR IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_tmp_lahir").focus();
            return false;

        } 

        else if (!$("#ibu_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR IBU KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_lahir").focus();
            return false;

        } 

        else if (!$("#ibu_agama").val()) {
            $.toast({
                text: 'AGAMA IBU KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_agama").focus();
            return false;

        } 

        else if (!$("#ibu_kerja").val()) {
            $.toast({
                text: 'KERJA IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_kerja").focus();
            return false;

        } 

      
        
        else if (!$("#ibu_hp").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_hp").focus();
            return false;

        }

        else if (!$("#ibu_wa").val()) {
            $.toast({
                text: 'WA IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_wa").focus();
            return false;

        }

        else if (!$("#ibu_pdk").val()) {
            $.toast({
                text: 'PENDIDIKAN IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_pdk").focus();
            return false;

        }

        else if (!$("#provinsi").val()) {
            $.toast({
                text: 'PROVINSI AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#provinsi").focus();
            return false;

        } 

        else if (!$("#kota").val()) {
            $.toast({
                text: 'KOTA AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kota").focus();
            return false;

        } 

        else if (!$("#kecamatan").val()) {
            $.toast({
                text: 'KECAMATAN AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kecamatan").focus();
            return false;

        } 
        
        else if (!$("#alamat").val()) {
            $.toast({
                text: 'ALAMAT AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#alamat").focus();
            return false;

        }

        // else if (!$("#penjemput_nama").val()) {
        //     $.toast({
        //         text: 'NAMA PENJEMPUT MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_nama").focus();
        //     return false;

        // } 
        
        // else if (!$("#penjemput_nik").val()) {
        //     $.toast({
        //         text: 'NIK PENJEMPUT MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_nik").focus();
        //     return false;

        // }

        // else if (!$("#penjemput_tmp_lahir").val()) {
        //     $.toast({
        //         text: 'TANGGAL LAHIR PENJEMPUT KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_tmp_lahir").focus();
        //     return false;

        // }

        // else if (!$("#penjemput_lahir").val()) {
        //     $.toast({
        //         text: 'TANGGAL LAHIR PENJEMPUT  KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_lahir").focus();
        //     return false;

        // }

        // else if (!$("#penjemput_agama").val()) {
        //     $.toast({
        //         text: 'AGAMA PENJEMPUT KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_agama").focus();
        //     return false;

        // }

        // else if (!$("#penjemput_hubungan").val()) {
        //     $.toast({
        //         text: 'HUBUNGAN PENJEMPUT KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_hubungan").focus();
        //     return false;

        // }

        // else if (!$("#penjemput_kerja").val()) {
        //     $.toast({
        //         text: 'KERJA PENJEMPUT KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_kerja").focus();
        //     return false;

        // }

        // else if (!$("#penjempu_kerja").val()) {
        //     $.toast({
        //         text: 'PERUSAHAAN PENJEMPUT MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjempu_kerja").focus();
        //     return false;

        // } 

        
        // else if (!$("#penjemput_hp").val()) {
        //     $.toast({
        //         text: 'HP penjemput MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_hp").focus();
        //     return false;

        // } 

        // else if (!$("#penjemput_wa").val()) {
        //     $.toast({
        //         text: 'WA PENJEMPUT MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_wa").focus();
        //     return false;

        // } 

        // else if (!$("#penjemput_provinsi").val()) {
        //     $.toast({
        //         text: 'PROVINSI MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_provinsi").focus();
        //     return false;

        // } 

        // else if (!$("#penjemput_kota").val()) {
        //     $.toast({
        //         text: 'KOTA MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_kota").focus();
        //     return false;

        // } 

        // else if (!$("#penjemput_kecamatan").val()) {
        //     $.toast({
        //         text: 'KECAMATAN MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_kecamatan").focus();
        //     return false;

        // } 
        
        // else if (!$("#penjemput_alamat").val()) {
        //     $.toast({
        //         text: 'ALAMAT MASIH KOSONG',
        //         position: 'top-right',
        //         loaderBg: '#fff716',
        //         icon: 'error',
        //         hideAfter: 3000
        //     });

        //     $("#penjemput_alamat").focus();
        //     return false;

        // }


        // ANAK


        var daftar_kode      = $('#daftar_kode').val();
        var anak_kode      = $('#anak_kode').val();
        var ortu_kode      = $('#ortu_kode').val();
        var pnj_kode      = $('#pnj_kode').val();


        var tgl_daftar      = $('#tgl_daftar').val();
        var periode         = $('#periode').val();
        var grup            = $('#grup').val();
        var paket           = $('#paket').val();
        var kategori        = $('#kategori').val();
        var keterangan      = $('#keterangan').val();
        var tarif_kode      = $('#tarif_kode').val();

        var anak_nama       = $('#anak_nama').val();
        var anak_tmp_lahir  = $('#anak_tmp_lahir').val();
        var anak_tgl_lahir  = $('#anak_tgl_lahir').val();
        var anak_jekel      = $('#anak_jekel').val();
        var anak_ke         = $('#anak_ke').val();
        var anak_saudara    = $('#anak_saudara').val();
        var anak_agama      = $('#anak_agama').val();
        var anak_alamat     = $('#anak_alamat').val();
        var anak_berat      = $('#anak_berat').val();
        var anak_tinggi     = $('#anak_tinggi').val();
        
        var ayah_nama       = $('#ayah_nama').val();
        var ayah_nik        = $('#ayah_nik').val();
        var ayah_tmp_lahir  = $('#ayah_tmp_lahir').val();
        var ayah_lahir      = $('#ayah_lahir').val();
        var ayah_kerja      = $('#ayah_kerja').val();
        var ayah_hp         = $('#ayah_hp').val();
        var ayah_wa         = $('#ayah_wa').val();
        var ayah_pdk        = $('#ayah_pdk').val();
        var ayah_agama      = $('#ayah_agama').val();

        var ibu_nama        = $('#ibu_nama').val();
        var ibu_nik         = $('#ibu_nik').val();
        var ibu_lahir       = $('#ibu_lahir').val();
        var ibu_tmp_lahir   = $('#ibu_tmp_lahir').val();
        var ibu_kerja       = $('#ibu_kerja').val();
        var ibu_hp          = $('#ibu_hp').val();
        var ibu_wa          = $('#ibu_wa').val();
        var ibu_pdk         = $('#ibu_pdk').val();
        var ibu_agama       = $('#ibu_agama').val();

        var provinsi        = $('#provinsi').val();
        var kota            = $('#kota').val();
        var kecamatan       = $('#kecamatan').val();
        var alamat          = $('#alamat').val(); 

        var penjemput_nama       = $('#penjemput_nama').val();
        var penjemput_nik        = $('#penjemput_nik').val();
        var penjemput_tmp_lahir  = $('#penjemput_tmp_lahir').val();
        var penjemput_lahir      = $('#penjemput_lahir').val();
        var penjemput_kerja      = $('#penjemput_kerja').val();
        var penjemput_hp         = $('#penjemput_hp').val();
        var penjemput_wa         = $('#penjemput_wa').val();
        var penjemput_pdk        = $('#penjemput_pdk').val();
        var penjemput_agama      = $('#penjemput_agama').val();
        var penjemput_jekel      = $('#penjemput_jekel').val();
        var penjemput_hubungan   = $('#penjemput_hubungan').val();

        var penjemput_provinsi        = $('#penjemput_provinsi').val();
        var penjemput_kota            = $('#penjemput_kota').val();
        var penjemput_kecamatan       = $('#penjemput_kecamatan').val();
        var penjemput_alamat          = $('#penjemput_alamat').val(); 

        console.log(alamat);

        var token = $('[name=_token]').val();
        var formData = new FormData();

        // DAFTAR

        formData.append('daftar_kode', daftar_kode);
        formData.append('anak_kode', anak_kode);
        formData.append('ortu_kode', ortu_kode);
        formData.append('pnj_kode', pnj_kode);

        // ANAK

        formData.append('tgl_daftar', tgl_daftar);
        formData.append('periode', periode);
        formData.append('grup', grup);
        formData.append('paket', paket);
        formData.append('kategori', kategori);
        formData.append('keterangan', keterangan);
        formData.append('tarif_kode', tarif_kode);

        formData.append('anak_nama', anak_nama);
        formData.append('anak_tmp_lahir', anak_tmp_lahir);
        formData.append('anak_tgl_lahir', anak_tgl_lahir);
        formData.append('anak_jekel', anak_jekel);
        formData.append('anak_ke', anak_ke);
        formData.append('anak_saudara', anak_saudara);
        formData.append('anak_agama', anak_agama);
        formData.append('anak_alamat', anak_alamat);
        formData.append('anak_berat', anak_berat);
        formData.append('anak_tinggi', anak_tinggi);
    
        formData.append('ayah_nama', ayah_nama);
        formData.append('ayah_nik', ayah_nik);
        formData.append('ayah_lahir', ayah_lahir);
        formData.append('ayah_tmp_lahir', ayah_tmp_lahir);
        formData.append('ayah_kerja', ayah_kerja);
        formData.append('ayah_hp', ayah_hp);
        formData.append('ayah_wa', ayah_wa);
        formData.append('ayah_agama', ayah_agama);
        formData.append('ayah_pdk', ayah_pdk);

        formData.append('ibu_nama', ibu_nama);
        formData.append('ibu_nik', ibu_nik);
        formData.append('ibu_tmp_lahir', ibu_tmp_lahir);
        formData.append('ibu_lahir', ibu_lahir);
        formData.append('ibu_kerja', ibu_kerja);
        formData.append('ibu_hp', ibu_hp);
        formData.append('ibu_wa', ibu_wa);
        formData.append('ibu_agama', ibu_agama);
        formData.append('ibu_pdk', ibu_pdk);

        formData.append('provinsi', provinsi);
        formData.append('kota', kota);
        formData.append('kecamatan', kecamatan);
        formData.append('alamat', alamat);

        formData.append('penjemput_nama', penjemput_nama);
        formData.append('penjemput_nik', penjemput_nik);
        formData.append('penjemput_lahir', penjemput_lahir);
        formData.append('penjemput_tmp_lahir', penjemput_tmp_lahir);
        formData.append('penjemput_kerja', penjemput_kerja);
        formData.append('penjemput_hp', penjemput_hp);
        formData.append('penjemput_wa', penjemput_wa);
        formData.append('penjemput_agama', penjemput_agama);
        formData.append('penjemput_pdk', penjemput_pdk);
        formData.append('penjemput_jekel', penjemput_jekel);
        formData.append('penjemput_hubungan', penjemput_hubungan);
        formData.append('penjemput_provinsi', penjemput_provinsi);
        formData.append('penjemput_kota', penjemput_kota);
        formData.append('penjemput_kecamatan', penjemput_kecamatan);
        formData.append('penjemput_alamat', penjemput_alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.transaksi.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Di Simpan", "success");

            }
        });
    
        return false;

    });



    /*-- ORANG TUA --*/

    function combo_kecamatan(kota){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kecamatan') }}",
            async : false,
            data : {kota:kota},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=kecamatan]').empty()
                    var x = document.getElementById("kecamatan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kec_kode)+'>'+(data[i].kec_nama)+'</option>';
                    $('select[name=kecamatan]').append(html)
                }
            }
        });
    }

    function combo_kota(provinsi){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kota') }}",
            async : false,
            data : {provinsi:provinsi},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=kota]').empty()
                    var x = document.getElementById("kota");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kota_kode)+'>'+(data[i].kota_nama)+'</option>';
                    $('select[name=kota]').append(html)
                }
            }
        });
    }

    function combo_provinsi(){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_provinsi') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=provinsi]').empty()
                    var x = document.getElementById("provinsi");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].prov_kode)+'>'+(data[i].pro_nama)+'</option>';
                    $('select[name=provinsi]').append(html)
                }
            }
        });
    }

    /*-- PENJEMPUT --*/

    function combo_kecamatan_penjemput(kota){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kecamatan') }}",
            async : false,
            data : {kota:kota},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_kecamatan]').empty()
                    var x = document.getElementById("penjemput_kecamatan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kec_kode)+'>'+(data[i].kec_nama)+'</option>';
                    $('select[name=penjemput_kecamatan]').append(html)
                }
            }
        });
    }

    function combo_kota_penjemput(provinsi){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kota') }}",
            async : false,
            data : {provinsi:provinsi},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_kota]').empty()
                    var x = document.getElementById("penjemput_kota");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kota_kode)+'>'+(data[i].kota_nama)+'</option>';
                    $('select[name=penjemput_kota]').append(html)
                }
            }
        });
    }

    function combo_provinsi_penjemput(){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_provinsi') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_provinsi]').empty()
                    var x = document.getElementById("penjemput_provinsi");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].prov_kode)+'>'+(data[i].pro_nama)+'</option>';
                    $('select[name=penjemput_provinsi]').append(html)
                }
            }
        });
    }

    function combo_kategori(){

    $('select[name=kategori]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_tarif_kategori') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=kategori]').empty()
                    var x = document.getElementById("kategori");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].kat_id)+'>'+(data[i].kat_nama)+'</option>';
                        $('select[name=kategori]').append(html)
                    }
                }
            });

    }

    function combo_jekel_penjemput(){

        $('select[name=penjemput_jekel]').empty()
            var html = '';
            html = '<option value="">--Pilih--</option>'+
                    '<option value="L">Laki-Laki</option>'+
                   '<option value="P">Perempuan</option>';
        $('select[name=penjemput_jekel]').append(html)

    }

    function combo_anak_jekel(){

        $('select[name=anak_jekel]').empty()
            var html = '';
            html = '<option value="">--Pilih--</option>'+
                    '<option value="L">Laki-Laki</option>'+
                   '<option value="P">Perempuan</option>';
        $('select[name=anak_jekel]').append(html)

    }

    function combo_ayah_agama(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_agama') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ayah_agama]').empty()
                var x = document.getElementById("ayah_agama");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].agama_id)+'>'+(data[i].agama_nama)+'</option>';
                    $('select[name=ayah_agama]').append(html)
                }
            }
        });

    }

    function combo_ibu_agama(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_agama') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_agama]').empty()
                var x = document.getElementById("ibu_agama");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].agama_id)+'>'+(data[i].agama_nama)+'</option>';
                    $('select[name=ibu_agama]').append(html)
                }
            }
        });

    }

    function combo_agama_penjemput(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_agama') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_agama]').empty()
                var x = document.getElementById("penjemput_agama");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].agama_id)+'>'+(data[i].agama_nama)+'</option>';
                    $('select[name=penjemput_agama]').append(html)
                }
            }
        });

    }

    function combo_anak_agama(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_agama') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=anak_agama]').empty()
                var x = document.getElementById("anak_agama");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].agama_id)+'>'+(data[i].agama_nama)+'</option>';
                    $('select[name=anak_agama]').append(html)
                }
            }
        });

    }


    function combo_wali_jekel(){

        $('select[name=wali_jekel]').empty()
            var html = '';
            html = '<option value="">--Pilih--</option>'+
                   '<option value="P">Laki-Laki</option>'+
                   '<option value="P">Perempuan</option>';
        $('select[name=wali_jekel]').append(html)

    }

    function combo_ayah_pendidikan(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_pendidikan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ayah_pdk]').empty()
                var x = document.getElementById("ayah_pdk");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].pdk_id)+'>'+(data[i].pdk_kode)+'</option>';
                    $('select[name=ayah_pdk]').append(html)
                }
            }
        });

    }


    function combo_ibu_pendidikan(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_pendidikan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_pdk]').empty()
                var x = document.getElementById("ibu_pdk");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].pdk_id)+'>'+(data[i].pdk_kode)+'</option>';
                    $('select[name=ibu_pdk]').append(html)
                }
            }
        });

    }

    function combo_pendidikan_penjemput(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_pendidikan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_pdk]').empty()
                var x = document.getElementById("penjemput_pdk");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].pdk_id)+'>'+(data[i].pdk_kode)+'</option>';
                    $('select[name=penjemput_pdk]').append(html)
                }
            }
        });

    }

  
   

    function combo_hubungan_penjemput(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_hubungan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_hubungan]').empty()
                var x = document.getElementById("penjemput_hubungan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = 
                            '<option value='+(data[i].hub_id)+'>'+(data[i].hub_nama)+'</option>';
                    $('select[name=penjemput_hubungan]').append(html)
                }
            }
        });

    }

    function combo_grup(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_grup') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=grup]').empty()
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_nama)+'</option>';
                    $('select[name=grup]').append(html)
                }
            }
        });

    }


    function combo_penjemput(){

         $('select[name=penjemput]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_penjemput') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=penjemput]').empty()
                        var x = document.getElementById("penjemput");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].pnj_id)+'>'+(data[i].pnj_nama)+'</option>';
                        $('select[name=penjemput]').append(html)
                    }
                }
            });

    }


    function combo_grup(){

         $('select[name=perusahaan_grup]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_grup') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=perusahaan_grup]').empty()
                        var x = document.getElementById("perusahaan_grup");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_nama)+'</option>';
                        $('select[name=perusahaan_grup]').append(html)
                    }
                }
            });

    }

      
        
      

    function showFilterKategori(select){

        var kategori  = $('#kategori').val();
        var paket  = $('#paket').val();
        combo_paket(kategori);
        view_tarif(kategori,paket);

    }
    function showFilterPaket(select){

        var kategori  = $('#kategori').val();
        var paket  = $('#paket').val();
        view_tarif(kategori,paket);
        get_tarif(paket);

    }

    function get_tarif(paket){
        $.ajax({
            type: "GET",
            url: "{{ route('tarif.paket.get_tarif') }}",
            dataType: "JSON",
            data: {id:paket},
            success: function(data) {

                $('[name="tarif_kode"]').val(data.tarif_kode);
               
            }
        });
    }

    function combo_paket(kategori){

    $('select[name=paket]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_paket') }}",
            async : false,
            data : {kategori:kategori},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=paket]').empty()
                var x = document.getElementById("paket");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].tarif_kode)+'>'+(data[i].tarif_nama)+'</option>';
                    $('select[name=paket]').append(html)
                }
            }
        });

    }



    // TRANSAKSI

    function view_tarif(kategori,paket) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.paket.view_transaksi') }}",
            async: true,
            data : {kategori:kategori,paket:paket},
            dataType: 'JSON',
            success: function(r) {
                var i;
                
                $('#show_data_tarif').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="20%" align="left">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<span class="text-success">'+(data[i].tarif_nama)+'</span>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b>'+(data[i].reg_tampil)+'</b>'));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b>'+(data[i].tarif_gizi)+'</b>')); 

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<b>'+(data[i].spp_tampil)+'</b>'));  

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html('<b>'+(data[i].pembangunan_tampil)));  

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html('<b class="text-danger">'+(data[i].total_bayar)));  

                        tr.appendTo($('#show_data_tarif'));
                    }

                } else {

                    $('#show_data_tarif').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });
    }



    function combo_grup(){

        $('select[name=grup]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_grup') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=grup]').empty()
                var x = document.getElementById("grup");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_nama)+'</option>';
                    $('select[name=grup]').append(html)
                }
            }
        });

    }


    function combo_periode(){

        $('select[name=periode]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_periode') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=periode]').empty()
                var x = document.getElementById("periode");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].periode_id)+'>'+(data[i].periode_nama)+'</option>';
                    $('select[name=periode]').append(html)
                }
            }
        });

    }

    



</script>


@endsection