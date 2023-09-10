@extends('app.layouts.template')

@section('css')
    <style>
        .modal-header {
            padding: 0.5rem 0.5rem 0.5rem 1rem;
        }

        .form-control {
            border-radius: 0rem;
            padding: 0.5rem 0.5rem;
        }

        .select2-container--default .select2-selection--single {
            border-radius: 0px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .table td, .table th {
            font-size: 13px;
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
    
                <!-- Nav tabs -->
                <div class="nav-tabs-custom text-left">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link text-center active" data-toggle="tab" href="#orang_tua" role="tab"><i class="fas fa-user-friends d-block"></i>Orang Tua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" data-toggle="tab" href="#pejemput" role="tab"><i class="fas fa-taxi d-block"></i>Penjemput</a>
                        </li>
 
                        <li class="nav-item">
                            <a class="nav-link text-center" data-toggle="tab" href="#cu_anak" role="tab"><i class="fas fa-child d-block"></i>&nbsp;&nbsp;&nbsp;&nbsp;Anak&nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>                                                
                        <li class="nav-item">
                            <a class="nav-link text-center" data-toggle="tab" href="#cu_transaksi" role="tab"><i class="fas fa-edit d-block"></i>Transaksi</a>
                        </li>
                    </ul>
                </div>
                
                <hr>
                <!-- Tab panes -->
                <div class="tab-content">

                     {{-- ORTU --}}

                    <div class="tab-pane active" id="orang_tua" role="tabpanel">
                        <div class="row">
                            <div class="col-md-9">  
                                
                            </div>
                            <div class="col-md-3 mb-2" style="text-align: right">
                                <button type="submit" class="btn btn-primary btn-round btn-xs waves-effect waves-light" id="btn_add_ortu">
                                    <i class="fas fa-plus"></i> TAMBAH DATA
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="datatable_ortu" class="table table-bordered dt-responsive wrap" 
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">AYAH</th>
                                        <th style="text-align: center">IBU</th>
                                        <th style="text-align: center">PEKERJAAN</th>
                                        <th style ="text-align: center">ALAMAT</th>
                                        <th style ="text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_ortu"></tbody>
                            </table>
                        </div>
                    </div>

                    {{-- PENJEMPUT --}}

                    <div class="tab-pane" id="pejemput" role="tabpanel">
                        <div class="row">
                            <div class="col-md-9">  
                                
                            </div>
                            <div class="col-md-3 mb-2" style="text-align: right">
                                <button type="submit" class="btn btn-primary btn-round btn-xs waves-effect waves-light" id="btn_add_penjemput">
                                    <i class="fas fa-plus"></i> TAMBAH DATA
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable_penjemput" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="text-align: center">NO</th>
                                        <th style="text-align: center">NAMA</th>
                                        <th style ="text-align: center">HUBUNGAN</th>
                                        <th style="text-align: center">PEKERJAAN</th>
                                        <th style ="text-align: center">ALAMAT</th>
                                        <th style ="text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_penjemput"></tbody>
                            </table>
                        </div>
                    </div>

                    {{-- ANAK --}}

                    <div class="tab-pane" id="cu_anak" role="tabpanel">
                        <div class="row">
                            <div class="col-md-9">  
                                <h5>Data Anak</h5></h5>
                            </div>
                            <div class="col-md-3 mb-2" style="text-align: right">
                                <button type="submit" class="btn btn-primary btn-round btn-xs waves-effect waves-light" id="btn_add_anak">
                                    <i class="fas fa-plus"></i> TAMBAH DATA
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable_anak" class="table table-bordered dt-responsive wrap" 
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width:3%">#</th>
                                        <th style="text-align: center; width:25%">NAMA</th>
                                        <th style="text-align: center; width:7%">JEKEL</th>
                                        <th style="text-align: center; width:7%">TGL LAHIR</th>
                                        <th style="text-align: center; width:25%">ORANG TUA</th>
                                        <th style ="text-align: center; width:5%">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_anak"></tbody>
                            </table>
                        </div>

                    </div>     
                    
                    {{-- TRANSAKSI --}}
                   
                    <div class="tab-pane" id="cu_transaksi" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="row">
                                    <div class="col-md-12 mt-1">
                                        <label for="state"><strong>Keterangan</strong> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <textarea id="keterangan" name="keterangan" class="form-control" maxlength="225" rows="4" placeholder="Keterangan......"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-md-12">
                            
                                            {!! csrf_field() !!}
                                                <input type="hidden" class="form-control" id="id_edit_detail" name="id_edit_detail" disabled="disabled">
                                                <input type="hidden" class="form-control" id="nis" name="nis" disabled="disabled">
                                                <input type="hidden" class="form-control" id="paket_kode" name="paket_kode">

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <label for="state"><strong>Anak</strong> <span class="text-danger">*</span> </label>
                                                        <div class="input-group mb-1">
                                                            <select class="form-control custom-select select2" style="width: 100%;" name="trs_anak" id="trs_anak"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="state"><strong>Grup</strong> <span class="text-danger">*</span> </label>
                                                        <div class="input-group mb-1">
                                                            <select class="form-control custom-select select2" style="width: 100%;" name="grup" id="grup"  onchange="showFilterGrub(this)"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="state"><strong>Paket</strong> <span class="text-danger">*</span> </label>
                                                        <div class="input-group mb-1">
                                                            <select class="form-control custom-select select2" style="width:100%;" name="paket" id="paket"  onchange="showFilterPaket(this)"></select>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                             
                                                <div class="table-responsive mb-2 mt-2">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0 table-centered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th width="5%" style="text-align: center; vertical-align: middle;">NO</th>
                                                                    <th width="10%" style="text-align: center">REGISTRASI</th>
                                                                    <th width="10%" style="text-align: center">SPP</th>
                                                                    <th width="10%" style="text-align: center">BULAN</th>
                                                                    <th width="10%" style="text-align: center">TOTAL SPP</th>
                                                                    <th width="10%" style="text-align: center">PEMBANGUNAN</th>
                                                                    <th width="10%" style="text-align: center">TOTAL</th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody id="show_data_tarif">
                                                            
                                                            </tbody>
                                                        </table><!--end /table-->
                                                    </div>
                                                </div>
                                                <hr class="hr-dashed">
                                                <div class="float-right d-print-none">
                                                    <button type="submit" class="btn btn-success btn-sm" id="btn_simpan_detail">
                                                        <i class="fas fa-save"></i> DAFTAR
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <hr>
                       
                        <table class="table table-bordered mb-0 table-centered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%" style="text-align: center; vertical-align: middle;">NO</th>
                                    <th width="10%" style="text-align: center">ANAK</th>
                                    <th width="10%" style="text-align: center">ORTU</th>
                                    <th width="10%" style="text-align: center">REG</th>
                                    <th width="10%" style="text-align: center">SPP</th>
                                    <th width="10%" style="text-align: center">PEMBANGUNAN</th>
                                    <th width="10%" style="text-align: center">TOTAL</th>
                                </tr>
                                
                            </thead>
                            <tbody id="show_data_trs_detail">
                            
                            </tbody>
                        </table><!--end /table-->                       
                      
                    </div>
                </div> <!--end tab-content-->   
            </div><!--end card-body-->
        </div>
    </div>
</div>


{{-- ORANG TUA --}}

<div class="modal modal-default-modal-lg fade" id="formModalAddOrtu">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Data Orang Tua</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                    <div class="col-lg-12">
                        {{-- <h4 class="card-title">AYAH</h4>
                        <p class="text-muted mb-3">Form Input Data Ayah</p> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="example-text-input" class="">Nama Ayah</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="ayah_nama" name="ayah_nama">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> NIK</label>
                                <input type="text" class="form-control" id="ayah_nik" name="ayah_nik" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> Tempat Lahir</label>
                                <input type="text" class="form-control" id="ayah_tmp_lahir" name="ayah_tmp_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-email-input" class=""> Tanggl Lahir</label>
                                <input type="text" class="form-control datepicker" id="ayah_lahir" name="ayah_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_agama" id="ayah_agama"></select>
                            </div>

                            <div class="col-sm-3  mt-2">
                                <label for="example-tel-input" class=""> Jenis Pekerjaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_kerja" id="ayah_kerja"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <input type="text" class="form-control" id="ayah_perusahaan" name="ayah_perusahaan">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="ayah_hp" name="ayah_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="ayah_wa" name="ayah_wa" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Tingkat Pendidikan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_pdk" id="ayah_pdk"></select>
                            </div>
                        
                        </div>
                    </div>

                    <hr>
                  
                    <div class="col-lg-12">
                        {{-- <h4 class="card-title">IBU</h4>
                        <p class="text-muted mb-3">Form Input Data Ibu</p> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="example-text-input" class="">Nama Ibu</label>
                                <input type="text" class="form-control" id="ibu_nama" name="ibu_nama" data-dtp="dtp_1uPaU">
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> NIK</label>
                                <input type="text" class="form-control" id="ibu_nik" name="ibu_nik" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> Tempat Lahir</label>
                                <input type="text" class="form-control" id="ibu_tmp_lahir" name="ibu_tmp_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-email-input" class=""> Tanggl Lahir</label>
                                <input type="text" class="form-control datepicker" id="ibu_lahir" name="ibu_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_agama" id="ibu_agama"></select>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_kerja" id="ibu_kerja"></select>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <input type="text" class="form-control" id="ibu_perusahaan" name="ibu_perusahaan">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="ibu_hp" name="ibu_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="ibu_wa" name="ibu_wa" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Tingkat Pendidikan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_pdk" id="ibu_pdk"></select>
                            </div>
                            
                        </div>

                    </div>
                    
                    <hr>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Provinsi <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="provinsi" id="provinsi" onchange="showOrtuProvinsi(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kabupaten/Kota <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="kota" id="kota" onchange="showOrtuKota(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kecamatan <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="kecamatan" id="kecamatan"></select>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label for="example-datetime-local-input" class="">Alamat</label>
                                <input type="text" class="form-control" id="ayah_alamat" name="ayah_alamat">
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer text-right">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info btn-xs" id="btn_simpan_ortu">
                    <i class="fas fa-save"></i> SIMPAN
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default-modal-lg fade" id="formModalEditOrtu">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Data Orang Tua</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <input type="hidden" class="form-control" id="id_edit_ortu" name="id_edit_ortu">
            <div class="modal-body">

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="example-text-input" class="">Nama Ayah</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="ayah_nama_edit" name="ayah_nama">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> NIK</label>
                                <input type="text" class="form-control" id="ayah_nik_edit" name="ayah_nik" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> Tempat Lahir</label>
                                <input type="text" class="form-control" id="ayah_tmp_lahir_edit" name="ayah_tmp_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-email-input" class=""> Tanggl Lahir</label>
                                <input type="text" class="form-control datepicker" id="ayah_lahir_edit" name="ayah_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_agama" id="ayah_agama_edit"></select>
                            </div>
                            <div class="col-sm-3  mt-2">
                                <label for="example-tel-input" class=""> Jenis Pekerjaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_kerja" id="ayah_kerja_edit"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <input type="text" class="form-control" id="ayah_perusahaan_edit" name="ayah_perusahaan">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="ayah_hp_edit" name="ayah_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="ayah_wa_edit" name="ayah_wa" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Tingkat Pendidikan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_pdk" id="ayah_pdk_edit"></select>
                            </div>
                        
                        </div>
                    </div>

                    <hr>
                  
                    <div class="col-lg-12">
                        {{-- <h4 class="card-title">IBU</h4>
                        <p class="text-muted mb-3">Form Input Data Ibu</p> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="example-text-input" class="">Nama Ibu</label>
                                <input type="text" class="form-control" id="ibu_nama_edit" name="ibu_nama" data-dtp="dtp_1uPaU">
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> NIK</label>
                                <input type="text" class="form-control" id="ibu_nik_edit" name="ibu_nik" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> Tempat Lahir</label>
                                <input type="text" class="form-control" id="ibu_tmp_lahir_edit" name="ibu_tmp_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-email-input" class=""> Tanggl Lahir</label>
                                <input type="text" class="form-control datepicker" id="ibu_lahir_edit" name="ibu_lahir">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_agama" id="ibu_agama_edit"></select>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_kerja" id="ibu_kerja_edit"></select>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <input type="text" class="form-control" id="ibu_perusahaan_edit" name="ibu_perusahaan">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="ibu_hp_edit" name="ibu_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="ibu_wa_edit" name="ibu_wa" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Tingkat Pendidikan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_pdk" id="ibu_pdk_edit"></select>
                            </div>
                            
                        </div>

                    </div>
                    
                    <hr>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Provinsi <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="provinsi" id="provinsi_edit" onchange="showOrtuProvinsiEdit(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kabupaten/Kota <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="kota" id="kota_edit" onchange="showOrtuKotaEdit(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kecamatan <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="kecamatan" id="kecamatan_edit"></select>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label for="example-datetime-local-input" class="">Alamat</label>
                                <input type="text" class="form-control" id="ortu_lamat_edit" name="alamat">
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer text-right">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning btn-xs" id="btn_update_ortu">
                    <i class="fas fa-save"></i> UPDATE
                </button>
            </div>
        </div>
    </div>
</div>


{{-- PENJEMPUT --}}

<div class="modal modal-default-modal-lg fade" id="formModalAddPenjemput">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Data Penjemput</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                    <div class="col-lg-12">
                        {{-- <h4 class="card-title">AYAH</h4>
                        <p class="text-muted mb-3">Form Input Data Ayah</p> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="example-text-input" class="">Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="penjemput_nama" name="penjemput_nama">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> NIK</label>
                                <input type="text" class="form-control" id="penjemput_nik" name="penjemput_nik" onkeypress="return angka(this, event)">
                            </div>

                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> Tempat Lahir</label>
                                <input type="text" class="form-control" id="penjemput_tmp_lahir" name="penjemput_tmp_lahir">
                            </div>

                            <div class="col-sm-3  mt-2">
                                <label for="example-tel-input" class=""> Jenis Kelamin</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_jekel" id="penjemput_jekel"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-email-input" class=""> Tanggl Lahir</label>
                                <input type="text" class="form-control datepicker" id="penjemput_lahir" name="penjemput_lahir">
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_agama" id="penjemput_agama"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Status hubungan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_hubungan" id="penjemput_hubungan"></select>
                            </div>

                            <div class="col-sm-3  mt-2">
                                <label for="example-tel-input" class=""> Jenis Pekerjaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kerja" id="penjemput_kerja"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <input type="text" class="form-control" id="penjemput_perusahaan" name="penjemput_perusahaan">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Tingkat Pendidikan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_pdk" id="penjemput_pdk"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="penjemput_hp" name="penjemput_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="penjemput_wa" name="penjemput_wa" onkeypress="return angka(this, event)">
                            </div>
                           
                        
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Provinsi <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_provinsi" id="penjemput_provinsi" onchange="showPenjemputProvinsiPenjemput(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kabupaten/Kota <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kota" id="penjemput_kota" onchange="showPenjemputKotaPenjemput(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kecamatan <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kecamatan" id="penjemput_kecamatan"></select>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label for="example-datetime-local-input" class="">Alamat</label>
                                <input type="text" class="form-control" id="penjemput_alamat" name="penjemput_alamat">
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" id="btn_simpan_penjemput">
                    <i class="fas fa-save"></i> SIMPAN
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default-modal-lg fade" id="formModalEditPenjemput">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Data Penjemput</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                    <div class="col-lg-12">
                        <input type="hidden" class="form-control" id="id_edit_penjemput" name="id_edit_penjemput">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="example-text-input" class="">Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="penjemput_nama_edit" name="penjemput_nama">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> NIK</label>
                                <input type="text" class="form-control" id="penjemput_nik_edit" name="penjemput_nik" onkeypress="return angka(this, event)">
                            </div>

                            <div class="col-sm-3">
                                <label for="example-email-input" class=""> Tempat Lahir</label>
                                <input type="text" class="form-control" id="penjemput_tmp_lahir_edit" name="penjemput_tmp_lahir">
                            </div>

                            <div class="col-sm-3  mt-2">
                                <label for="example-tel-input" class=""> Jenis Kelamin</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_jekel" id="penjemput_jekel_edit"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-email-input" class=""> Tanggl Lahir</label>
                                <input type="text" class="form-control datepicker" id="penjemput_lahir_edit" name="penjemput_lahir">
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_agama" id="penjemput_agama_edit"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Status hubungan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_hubungan" id="penjemput_hubungan_edit"></select>
                            </div>

                            <div class="col-sm-3  mt-2">
                                <label for="example-tel-input" class=""> Jenis Pekerjaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kerja" id="penjemput_kerja_edit"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Pekerjaan</label>
                                <input type="text" class="form-control" id="penjemput_perusahaan_edit" name="penjemput_perusahaan">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-tel-input" class=""> Tingkat Pendidikan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_pdk" id="penjemput_pdk_edit"></select>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="penjemput_hp_edit" name="penjemput_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="penjemput_wa_edit" name="penjemput_wa" onkeypress="return angka(this, event)">
                            </div>
                           
                        
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Provinsi <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_provinsi" id="penjemput_provinsi_edit" onchange="showPenjemputProvinsiEdit(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kabupaten/Kota <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kota" id="penjemput_kota_edit" onchange="showPenjemputKotaEdit(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kecamatan <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput_kecamatan" id="penjemput_kecamatan_edit"></select>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <label for="example-datetime-local-input" class="">Alamat</label>
                                <input type="text" class="form-control" id="penjemput_alamat_edit" name="penjemput_alamat">
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-warning btn-sm" id="btn_update_penjemput">
                    <i class="fas fa-save"></i> UPDATE
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ANAK --}}
<div class="modal modal-default-modal-lg fade" id="formModalAddAnak">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Data Anak</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    {!! csrf_field() !!} 
                  
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label for="example-search-input" class="">Orang Tua</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="trs_ortu" id="trs_ortu"></select>
                            </div>
                           
                            <div class="col-sm-6 mb-2">
                                <label for="example-search-input" class="">Penjemput</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput" id="penjemput"></select>
                            </div>
    
                            <div class="col-sm-4 mb-2">
                                <label for="example-url-input" class="">Nama</label>
                                <input type="text" class="form-control" id="anak_nama" name="anak_nama">
                            </div>
                           
                            <div class="col-sm-2 mb-2">
                                <label for="example-date-input" class="">Jenis Kelamin</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak_jekel" id="anak_jekel"></select>
                            </div>

                            <div class="col-sm-2 mb-2">
                                <label for="example-month-input" class="">Tanggal Lahir</label>
                                <div class="input-group">  
                                    <input type="text" class="form-control datepicker" id="anak_tgl_lahir" name="anak_tgl_lahir">
                                    <div class="input-group-append">
                                        <span class="input-group-text"> <i class="fas fa-calendar-check"></i></span>
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-sm-4 mb-2" >
                                <label for="example-week-input" class="">Tempat Lahir</label>
                                <input type="text" class="form-control" id="anak_tmp_lahir" name="anak_tmp_lahir">
                            </div>
                    
                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Anak Ke</label>
                                <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)">
                            </div>

                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Jumlah Saudara</label>
                                <input type="text" class="form-control" id="anak_saudara" name="anak_saudara" value="0" onkeypress="return angka(this, event)">
                            </div>
                        
                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Berat</label>
                                <div class="input-group">  
                                    <input type="text" class="form-control" id="anak_berat" name="anak_berat" onkeypress="return angka(this, event)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Tinggi</label>
                                <div class="input-group">  
                                    <input type="text" class="form-control" id="anak_tinggi" name="anak_tinggi" onkeypress="return angka(this, event)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Cm</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-2" >
                                <label for="example-time-input" class="">Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak_agama" id="anak_agama"></select>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" id="btn_simpan_anak">
                    <i class="fas fa-save"></i> SIMPAN
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default-modal-lg fade" id="formModalEditAnak">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Edit Data Anak</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    {!! csrf_field() !!} 
                    <input type="hidden" id="id_edit_anak" name="id_edit_anak" class="form-control">

                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-sm-4 mb-2">
                                <label for="example-search-input" class="">Orang Tua</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="trs_ortu" id="trs_ortu_edit"></select>
                            </div>
                           
                            <div class="col-sm-4 mb-2">
                                <label for="example-search-input" class="">Penjemput</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="penjemput" id="penjemput_edit"></select>
                            </div>
    
                            <div class="col-sm-4 mb-2">
                                <label for="example-url-input" class="">Nama</label>
                                <input type="text" class="form-control" id="anak_nama_edit" name="anak_nama">
                            </div>
                           
                            <div class="col-sm-2 mb-2">
                                <label for="example-date-input" class="">Jenis Kelamin</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak_jekel" id="anak_jekel_edit"></select>
                            </div>

                            <div class="col-sm-2 mb-2">
                                <label for="example-month-input" class="">Tanggal Lahir</label>
                                <div class="input-group">  
                                    <input type="text" class="form-control datepicker" id="anak_tgl_lahir_edit" name="anak_tgl_lahir">
                                    <div class="input-group-append">
                                        <span class="input-group-text"> <i class="fas fa-calendar-check"></i></span>
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-sm-4 mb-2" >
                                <label for="example-week-input" class="">Tempat Lahir</label>
                                <input type="text" class="form-control" id="anak_tmp_lahir_edit" name="anak_tmp_lahir">
                            </div>
                    
                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Anak Ke</label>
                                <input type="text" class="form-control" id="anak_ke_edit" name="anak_ke" onkeypress="return angka(this, event)">
                            </div>

                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Jumlah Saudara</label>
                                <input type="text" class="form-control" id="anak_saudara_edit" name="anak_saudara" value="0" onkeypress="return angka(this, event)">
                            </div>
                        
                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Berat</label>
                                <div class="input-group">  
                                    <input type="text" class="form-control" id="anak_berat_edit" name="anak_berat" onkeypress="return angka(this, event)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-sm-2 mb-2" >
                                <label for="example-time-input" class="">Tinggi</label>
                                <div class="input-group">  
                                    <input type="text" class="form-control" id="anak_tinggi_edit" name="anak_tinggi" onkeypress="return angka(this, event)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Cm</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-2" >
                                <label for="example-time-input" class="">Agama</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak_agama" id="anak_agama_edit"></select>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-warning btn-sm" id="btn_update_anak">
                    <i class="fas fa-save"></i> UPDATE
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

        view_ortu();
        view_penjemput();
        view_anak();
        view_detail();

        combo_grup();
        combo_paket();

        combo_ayah_agama();
        combo_kerja_ayah();
        combo_perusahaan();
        combo_ibu_agama();
        combo_kerja_ibu();
        combo_kecamatan();
        combo_kota();
        combo_provinsi();
        combo_ayah_pendidikan();
        combo_ibu_pendidikan(); 

        combo_hubungan_penjemput();
        combo_jekel_penjemput();
        combo_kerja_penjemput();
        combo_perusahaan_penjemput();
        combo_pendidikan_penjemput();
        combo_agama_penjemput();
        combo_kecamatan_penjemput();
        combo_kota_penjemput();
        combo_provinsi_penjemput();

        combo_anak_jekel();
        combo_ortu();
        combo_penjemput();
        combo_anak_agama();


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

    function showPenjemputProvinsiPenjemput(select){
        var provinsi=$('#penjemput_provinsi').val();
        combo_kota_penjemput(provinsi);

        var kota=$('#penjemput_kota').val();
        combo_kecamatan_penjemput(kota);
    }

    function showPenjemputKotaPenjemput(select){
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
        $('#ayah_perusahaan').val("").trigger("change");
        $('#ayah_agama').val("").trigger("change");
        $('#ayah_hp').val("");
        $('#ayah_wa').val("");
        $('#ayah_alamat').val("");
        $('#ibu_nama').val("");
        $('#ibu_nik').val("");
        $('#ibu_lahir').val("").val("").trigger("change");
        $('#ibu_kerja').val("").trigger("change");
        $('#ibu_perusahaan').val("").trigger("change");
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
    
    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_add_anak').on('click',function(){

        $.when(
            
            combo_anak_jekel(),
            combo_ortu(),
            combo_penjemput(),
            combo_anak_agama(),


        )
        .done(function(){
            $('.select2').select2();
            $('#formModalAddAnak').modal('show');
        })

    });

    function combo_ortu(){

        $('select[name=trs_ortu]').empty()
            $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_ortu') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=trs_ortu]').empty()
                    var x = document.getElementById("trs_ortu");
                            var option = document.createElement("option");
                            option.text = "--Pilih--";
                            option.value = '';
                            x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].ortu_id)+'>'+(data[i].ortu_ayah)+' - '+(data[i].ortu_ibu)+'</option>';
                        $('select[name=trs_ortu]').append(html)
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



    $('#btn_add_ortu').on('click',function(){

        $.when(
            combo_ayah_agama(),
            combo_kerja_ayah(),
            combo_perusahaan(),
            combo_ibu_agama(),
            combo_kerja_ibu(),
            combo_kecamatan(),
            combo_kota(),
            combo_provinsi(),
            combo_ayah_pendidikan(),
            combo_ibu_pendidikan(), 

        )
        .done(function(){
            $('.select2').select2();
            $('#formModalAddOrtu').modal('show');
        })
    });

   
   
    // ORANG TUA

    $('#show_data_ortu').on('click', '.item_edit_ortu', function() {

        var id = $(this).attr('data');
        
        console.log(id);

        $.when(
            combo_ayah_agama(),
            combo_kerja_ayah(),
            combo_perusahaan(),
            combo_ibu_agama(),
            combo_kerja_ibu(),
            combo_kecamatan(),
            combo_kota(),
            combo_provinsi(),
            combo_ayah_pendidikan(),
            combo_ibu_pendidikan(),  
        )
        .done(function() {

            $('.select2').select2();

            $.ajax({
                type: "GET",
                url: "{{ route('dapok.ortu.edit') }}",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(r) {

                    data = r.data;

                    $('#formModalEditOrtu').modal('show');
                    $('#formModalEditOrtu').find('[name="id_edit_ortu"]').val(data.ortu_id);
                    $('#formModalEditOrtu').find('[name="ayah_nama"]').val(data.ortu_ayah);
                    $('#formModalEditOrtu').find('[name="ayah_nik"]').val(data.ortu_ayah_nik);
                    $('#formModalEditOrtu').find('[name="ayah_tmp_lahir"]').val(data.ortu_ayah_tmp_lahir);
                    $('#formModalEditOrtu').find('[name="ayah_lahir"]').datepicker('setDate',moment(data.ortu_ayah_tgl_lahir).format('DD-MM-YYYY'));
                    $('#formModalEditOrtu').find('[name="ayah_agama"]').val(data.ortu_ayah_agama_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="ayah_perusahaan"]').val(data.ortu_ayah_peru);
                    $('#formModalEditOrtu').find('[name="ayah_pdk"]').val(data.ortu_ayah_pdk_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="ayah_kerja"]').val(data.ortu_ayah_kerja).trigger("change");
                    $('#formModalEditOrtu').find('[name="ayah_hp"]').val(data.ortu_ayah_hp).trigger("change");
                    $('#formModalEditOrtu').find('[name="ayah_wa"]').val(data.ortu_ayah_wa).trigger("change");
                    $('#formModalEditOrtu').find('[name="ayah_alamat"]').val(data.ortu_ayah_alamat).trigger("change");

                    $('#formModalEditOrtu').find('[name="ibu_nama"]').val(data.ortu_ibu);
                    $('#formModalEditOrtu').find('[name="ibu_nik"]').val(data.ortu_ibu_nik);
                    $('#formModalEditOrtu').find('[name="ibu_tmp_lahir"]').val(data.ortu_ibu_tmp_lahir);
                    $('#formModalEditOrtu').find('[name="ibu_lahir"]').datepicker('setDate',moment(data.ortu_ibu_tgl_lahir).format('DD-MM-YYYY'));
                    $('#formModalEditOrtu').find('[name="ibu_agama"]').val(data.ortu_ibu_agama_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="ibu_perusahaan"]').val(data.ortu_ibu_peru);
                    $('#formModalEditOrtu').find('[name="ibu_pdk"]').val(data.ortu_ibu_pdk_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="ibu_kerja"]').val(data.ortu_ibu_kerja).trigger("change");
                    $('#formModalEditOrtu').find('[name="ibu_hp"]').val(data.ortu_ibu_hp).trigger("change");
                    $('#formModalEditOrtu').find('[name="ibu_wa"]').val(data.ortu_ibu_wa).trigger("change");

                    $('#formModalEditOrtu').find('[name="provinsi"]').val(data.provinsi_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="kota"]').val(data.kota_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="kecamatan"]').val(data.kecamatan_id).trigger("change");
                    $('#formModalEditOrtu').find('[name="alamat"]').val(data.ortu_alamat).trigger("change");

                }
            });
        })

        return false;
    });

    $('#show_data_ortu').on('click','.item_ortu_aktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Non-Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non-Aktifkan !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('dapok.ortu.aktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        view_ortu();
                    }
                });  
            }
        });
    });

    $('#show_data_ortu').on('click','.item_ortu_nonaktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Non-Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non-Aktifkan !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('dapok.ortu.nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        view_ortu();
                    }
                });  
            }
        });
    });

    $('#btn_simpan_ortu').on('click', function(){
        
        if (!$("#ayah_nama").val()) {
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

        else if (!$("#ayah_perusahaan").val()) {
            $.toast({
                text: 'PERUSAHAAN AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_perusahaan").focus();
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
                text: 'JENIS KERJA IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_kerja").focus();
            return false;

        } 

        else if (!$("#ibu_perusahaan").val()) {
            $.toast({
                text: 'PERUSAHAAN IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_perusahaan").focus();
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
        
        else if (!$("#ayah_alamat").val()) {
            $.toast({
                text: 'ALAMAT AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_alamat").focus();
            return false;

        }


        
        var ayah_nama       = $('#ayah_nama').val();
        var ayah_nik        = $('#ayah_nik').val();
        var ayah_tmp_lahir  = $('#ayah_tmp_lahir').val();
        var ayah_lahir      = $('#ayah_lahir').val();
        var ayah_kerja      = $('#ayah_kerja').val();
        var ayah_perusahaan = $('#ayah_perusahaan').val();
        var ayah_hp         = $('#ayah_hp').val();
        var ayah_wa         = $('#ayah_wa').val();
        var ayah_pdk        = $('#ayah_pdk').val();
        var ayah_agama      = $('#ayah_agama').val();

        var ibu_nama        = $('#ibu_nama').val();
        var ibu_nik         = $('#ibu_nik').val();
        var ibu_lahir       = $('#ibu_lahir').val();
        var ibu_tmp_lahir   = $('#ibu_tmp_lahir').val();
        var ibu_kerja       = $('#ibu_kerja').val();
        var ibu_perusahaan  = $('#ibu_perusahaan').val();
        var ibu_hp          = $('#ibu_hp').val();
        var ibu_wa          = $('#ibu_wa').val();
        var ibu_pdk         = $('#ibu_pdk').val();
        var ibu_agama       = $('#ibu_agama').val();

        var provinsi        = $('#provinsi').val();
        var kota            = $('#kota').val();
        var kecamatan       = $('#kecamatan').val();
        var alamat          = $('#ayah_alamat').val(); 

        console.log(alamat);

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('ayah_nama', ayah_nama);
        formData.append('ayah_nik', ayah_nik);
        formData.append('ayah_lahir', ayah_lahir);
        formData.append('ayah_tmp_lahir', ayah_tmp_lahir);
        formData.append('ayah_kerja', ayah_kerja);
        formData.append('ayah_perusahaan', ayah_perusahaan);
        formData.append('ayah_hp', ayah_hp);
        formData.append('ayah_wa', ayah_wa);
        formData.append('ayah_agama', ayah_agama);
        formData.append('ayah_pdk', ayah_pdk);

        formData.append('ibu_nama', ibu_nama);
        formData.append('ibu_nik', ibu_nik);
        formData.append('ibu_tmp_lahir', ibu_tmp_lahir);
        formData.append('ibu_lahir', ibu_lahir);
        formData.append('ibu_kerja', ibu_kerja);
        formData.append('ibu_perusahaan', ibu_perusahaan);
        formData.append('ibu_hp', ibu_hp);
        formData.append('ibu_wa', ibu_wa);
        formData.append('ibu_agama', ibu_agama);
        formData.append('ibu_pdk', ibu_pdk);

        formData.append('provinsi', provinsi);
        formData.append('kota', kota);
        formData.append('kecamatan', kecamatan);
        formData.append('alamat', alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.ortu.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Di Simpan", "success");
                $('#formModalAddOrtu').modal('hide');
                view_ortu();    
                
            }
        });
    
        return false;

    });

    $('#btn_update_ortu').on('click', function(){
        
        if (!$("#ayah_nama_edit").val()) {
            $.toast({
                text: 'NAMA AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_nama_edit").focus();
            return false;

        } 
        
        else if (!$("#ayah_nik_edit").val()) {
            $.toast({
                text: 'NIK AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_nik_edit").focus();
            return false;

        }

        else if (!$("#ayah_tmp_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR AYAH  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_tmp_lahir_edit").focus();
            return false;

        }

        else if (!$("#ayah_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR AYAH  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_lahir_edit").focus();
            return false;

        }

        else if (!$("#ayah_agama_edit").val()) {
            $.toast({
                text: 'AGAMA AYAH  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_agama_edit").focus();
            return false;

        }

        else if (!$("#ayah_kerja_edit").val()) {
            $.toast({
                text: 'KERJA AYAH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_kerja_edit").focus();
            return false;

        }

        else if (!$("#ayah_perusahaan_edit").val()) {
            $.toast({
                text: 'PERUSAHAAN AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_perusahaan_edit").focus();
            return false;

        } 
        
        else if (!$("#ayah_hp_edit").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_hp_edit").focus();
            return false;

        } 

        else if (!$("#ayah_wa_edit").val()) {
            $.toast({
                text: 'WA AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_wa_edit").focus();
            return false;

        } 

        else if (!$("#ayah_pdk_edit").val()) {
            $.toast({
                text: 'PENDIDIKAN AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_pdk_edit").focus();
            return false;

        } 

      
        // IBU 
        
        else if (!$("#ibu_nama_edit").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_nama_edit").focus();
            return false;

        } 
        
        else if (!$("#ibu_nik_edit").val()) {
            $.toast({
                text: 'NIK IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_nik_edit").focus();
            return false;

        } 

        else if (!$("#ibu_tmp_lahir_edit").val()) {
            $.toast({
                text: 'TEMPAT LAHIR IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_tmp_lahir_edit").focus();
            return false;

        } 

        else if (!$("#ibu_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR IBU KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_lahir_edit").focus();
            return false;

        } 

        else if (!$("#ibu_agama_edit").val()) {
            $.toast({
                text: 'AGAMA IBU KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_agama_edit").focus();
            return false;

        } 

        else if (!$("#ibu_kerja_edit").val()) {
            $.toast({
                text: 'JENIS KERJA IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_kerja_edit").focus();
            return false;

        } 

        else if (!$("#ibu_perusahaan_edit").val()) {
            $.toast({
                text: 'PERUSAHAAN IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_perusahaan_edit").focus();
            return false;

        } 
        
        else if (!$("#ibu_hp_edit").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_hp_edit").focus();
            return false;

        }

        else if (!$("#ibu_wa_edit").val()) {
            $.toast({
                text: 'WA IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_wa_edit").focus();
            return false;

        }

        else if (!$("#ibu_pdk_edit").val()) {
            $.toast({
                text: 'PENDIDIKAN IBU MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_pdk_edit").focus();
            return false;

        }

        else if (!$("#provinsi_edit").val()) {
            $.toast({
                text: 'PROVINSI AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#provinsi_edit").focus();
            return false;

        } 

        else if (!$("#kota_edit").val()) {
            $.toast({
                text: 'KOTA AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kota_edit").focus();
            return false;

        } 

        else if (!$("#kecamatan_edit").val()) {
            $.toast({
                text: 'KECAMATAN AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kecamatan_edit").focus();
            return false;

        } 
        
        else if (!$("#ortu_lamat_edit").val()) {
            $.toast({
                text: 'ALAMAT AYAH MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_lamat_edit").focus();
            return false;

        }


        var id              = $('#id_edit_ortu').val();
        var ayah_nama       = $('#ayah_nama_edit').val();
        var ayah_nik        = $('#ayah_nik_edit').val();
        var ayah_tmp_lahir  = $('#ayah_tmp_lahir_edit').val();
        var ayah_lahir      = $('#ayah_lahir_edit').val();
        var ayah_kerja      = $('#ayah_kerja_edit').val();
        var ayah_perusahaan = $('#ayah_perusahaan_edit').val();
        var ayah_hp         = $('#ayah_hp_edit').val();
        var ayah_wa         = $('#ayah_wa_edit').val();
        var ayah_pdk        = $('#ayah_pdk_edit').val();
        var ayah_agama      = $('#ayah_agama_edit').val();

        var ibu_nama        = $('#ibu_nama_edit').val();
        var ibu_nik         = $('#ibu_nik_edit').val();
        var ibu_lahir       = $('#ibu_lahir_edit').val();
        var ibu_tmp_lahir   = $('#ibu_tmp_lahir_edit').val();
        var ibu_kerja       = $('#ibu_kerja_edit').val();
        var ibu_perusahaan  = $('#ibu_perusahaan_edit').val();
        var ibu_hp          = $('#ibu_hp_edit').val();
        var ibu_wa          = $('#ibu_wa_edit').val();
        var ibu_pdk         = $('#ibu_pdk_edit').val();
        var ibu_agama       = $('#ibu_agama_edit').val();

        var provinsi        = $('#provinsi_edit').val();
        var kota            = $('#kota_edit').val();
        var kecamatan       = $('#kecamatan_edit').val();
        var alamat          = $('#ortu_lamat_edit').val(); 

        console.log(alamat);

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('id', id);
        formData.append('ayah_nama', ayah_nama);
        formData.append('ayah_nik', ayah_nik);
        formData.append('ayah_lahir', ayah_lahir);
        formData.append('ayah_tmp_lahir', ayah_tmp_lahir);
        formData.append('ayah_kerja', ayah_kerja);
        formData.append('ayah_perusahaan', ayah_perusahaan);
        formData.append('ayah_hp', ayah_hp);
        formData.append('ayah_wa', ayah_wa);
        formData.append('ayah_agama', ayah_agama);
        formData.append('ayah_pdk', ayah_pdk);

        formData.append('ibu_nama', ibu_nama);
        formData.append('ibu_nik', ibu_nik);
        formData.append('ibu_tmp_lahir', ibu_tmp_lahir);
        formData.append('ibu_lahir', ibu_lahir);
        formData.append('ibu_kerja', ibu_kerja);
        formData.append('ibu_perusahaan', ibu_perusahaan);
        formData.append('ibu_hp', ibu_hp);
        formData.append('ibu_wa', ibu_wa);
        formData.append('ibu_agama', ibu_agama);
        formData.append('ibu_pdk', ibu_pdk);

        formData.append('provinsi', provinsi);
        formData.append('kota', kota);
        formData.append('kecamatan', kecamatan);
        formData.append('alamat', alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.ortu.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Di Simpan", "success");
                $('#formModalEditOrtu').modal('hide');
                view_ortu();    
                
            }
        });
    
        return false;

    });

    function view_ortu() {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.ortu.view_ortu') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable_ortu').DataTable().destroy(); 
                $('#show_data_ortu').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        if((data[i].ortu_aktif) == 'Y'){

                            var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="50%" align="left">'),
                                $('<td width="5%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="50%" align="left">'),
                                $('<td width="5%" align="center">')
                            ]);

                        }
                    

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_ortu" data="'+data[i].ortu_id+'"> '+(data[i].ortu_ayah)+'</a>')); 
                        
                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small class="text-muted"><i class="mdi mdi-calendar"></i> '+(moment(data[i].ortu_ayah_tgl_lahir).format('DD-MM-YYYY'))+' - '+(data[i].ayah_usia)+' Tahun </small>'));
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_ortu" data="'+data[i].ortu_id+'"> '+(data[i].ortu_ibu)+'</a>')); 
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<small class="text-muted"><i class="mdi mdi-calendar"></i> '+(moment(data[i].ortu_ibu_tgl_lahir).format('DD-MM-YYYY'))+' - '+(data[i].ibu_usia)+' Tahun </small>'));
                        
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b>Ayah :</b> <small> '+(data[i].ortu_ayah_peru)+'</small>')); 
                        
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b>Ibu &nbsp&nbsp :</b> <small> '+(data[i].ortu_ibu_peru)+'</small>')); 
                        
                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].ortu_alamat))); 

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].provinsi)+', '+(data[i].kota)+', '+(data[i].kecamatan)+'</small>'));
                        
                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit_ortu" data="'+data[i].ortu_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-info btn-xs item_ortu_aktif" data="'+data[i].ortu_id+'"><i class="mdi mdi-check"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_ortu_nonaktif" data="'+data[i].ortu_id+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        
                        tr.appendTo($('#show_data_ortu'));
                    }

                } 
                else {

                    $('#show_data_ortu').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                $('#datatable_ortu').DataTable('refresh'); 
            }
        });
    }


    // ANAK

    function view_anak() {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.anak.view_anak') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable_anak').DataTable().destroy(); 
                $('#show_data_anak').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        if((data[i].anak_aktif) == 'Y'){

                            var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="7%" align="center">'),
                                $('<td width="8%" align="center">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="1%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="20%" align="left">'),
                                $('<td width="30%" align="left">'),
                                $('<td width="10%" align="left">'),
                                $('<td width="1%" align="center">')
                            ]);

                        }
                    

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nama)));
                            
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_jekel))); 
                        
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((moment(data[i].anak_tgl_lahir).format('DD-MM-YYYY'))));   
                     
                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].ortu_ayah)+' - '+(data[i].ortu_ibu))); 
                            

                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit_anak" data="'+data[i].anak_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-info btn-xs item_anak_aktif" data="'+data[i].anak_id+'"><i class="mdi mdi-check"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_anak_nonaktif" data="'+data[i].anak_id+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        
                        tr.appendTo($('#show_data_anak'));
                    }

                } 
                else {

                    $('#show_data_anak').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                $('#datatable_anak').DataTable('refresh'); 
            }
        });
    }



    $('#btn_simpan_anak').on('click', function(){
        
        if (!$("#trs_ortu").val()) {
            $.toast({
                text: 'ORANG TUA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#trs_ortu").focus();
            return false;

        }

        if (!$("#penjemput").val()) {
            $.toast({
                text: 'PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput").focus();
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
                text: 'TINGGI MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tinggi").focus();
            return false;
        }
        
        else if (!$("#anak_agama").val()) {
            $.toast({
                text: 'AGAMA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_agama").focus();
            return false;

        } 
        
       
        
        // var nis             = $('#id_edit_anak').val();
        var ortu            = $('#trs_ortu').val();
        var penjemput       = $('#penjemput').val();
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
        var token           = $('[name=_token]').val();

        var formData = new FormData();
    
        // formData.append('nis', nis);
        formData.append('ortu', ortu);
        formData.append('penjemput', penjemput);
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

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.anak.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Disimpan", "success");
                $('#formModalAddAnak').modal('hide');       
                view_anak();
                
                
            }
        });
    
        return false;

    });
 
    $('#show_data_anak').on('click','.item_edit_anak',function(){

        var id = $(this).attr('data');

        $.when(
            
            combo_ortu(),
            combo_penjemput(),
            combo_anak_jekel(),
            combo_anak_agama(),
         
        )
        .done(function() {

            $.ajax({
                type: "GET",
                url: "{{ route('dapok.anak.edit') }}",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(r) {
                    data = r.data;

                    console.log(data);

                    $('#formModalEditAnak').modal('show');
                    $('[name="id_edit_anak"]').val(data.anak_id);
                    $('[name="trs_ortu"]').val(data.ortu_id).trigger("change");
                    $('[name="penjemput"]').val(data.pnj_id).trigger("change");
                    $('[name="anak_nama"]').val(data.anak_nama);
                    $('[name="anak_agama"]').val(data.agama_id).trigger("change");
                    $('[name="anak_jekel"]').val(data.anak_jekel).trigger("change");
                    $('[name="anak_tmp_lahir"]').val(data.anak_tmp_lahir).trigger("change");
                    $('[name="anak_tgl_lahir"]').datepicker('setDate',moment(data.anak_tgl_lahir).format('DD-MM-YYYY'));
                    $('[name="anak_ke"]').val(data.anak_ke);
                    $('[name="anak_saudara"]').val(data.anak_jml_saudara);
                    $('[name="anak_berat"]').val(data.anak_berat);
                    $('[name="anak_tinggi"]').val(data.anak_tinggi);

                }
            });
        
        });

        return false;

    });

    $('#btn_update_anak').on('click', function(){
        
        if (!$("#trs_ortu_edit").val()) {
            $.toast({
                text: 'ORANG TUA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#trs_ortu_edit").focus();
            return false;

        }

        if (!$("#penjemput_edit").val()) {
            $.toast({
                text: 'PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_edit").focus();
            return false;

        } 


        
        else if (!$("#anak_nama_edit").val()) {
            $.toast({
                text: 'NAMA ANAK MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_nama_edit").focus();
            return false;

        } 
        
        else if (!$("#anak_jekel_edit").val()) {
            $.toast({
                text: 'JENIS KELAMIN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_jekel_edit").focus();
            return false;

        } 
        
        else if (!$("#anak_tgl_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tgl_lahir_edit").focus();
            return false;

        } 
        
        else if (!$("#anak_tmp_lahir_edit").val()) {
            $.toast({
                text: 'TEMPAT LAHIR MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tmp_lahir_edit").focus();
            return false;

        } 

        else if (!$("#anak_ke_edit").val()) {
            $.toast({
                text: 'ANAK KE MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_ke_edit").focus();
            return false;

        } 
        
        else if (!$("#anak_berat_edit").val()) {
            $.toast({
                text: 'BERAT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_berat_edit").focus();
            return false;

        } 
        
        else if (!$("#anak_tinggi_edit").val()) {
            $.toast({
                text: 'TINGGI MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tinggi_edit").focus();
            return false;
        }
        
        else if (!$("#anak_agama_edit").val()) {
            $.toast({
                text: 'AGAMA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_agama_edit").focus();
            return false;

        } 
        
       
        
        var id              = $('#id_edit_anak').val();
        var ortu            = $('#trs_ortu_edit').val();
        var penjemput       = $('#penjemput_edit').val();
        var anak_nama       = $('#anak_nama_edit').val();
        var anak_tmp_lahir  = $('#anak_tmp_lahir_edit').val();
        var anak_tgl_lahir  = $('#anak_tgl_lahir_edit').val();
        var anak_jekel      = $('#anak_jekel_edit').val();
        var anak_ke         = $('#anak_ke_edit').val();
        var anak_saudara    = $('#anak_saudara_edit').val();
        var anak_agama      = $('#anak_agama_edit').val();
        var anak_alamat     = $('#anak_alamat_edit').val();
        var anak_berat      = $('#anak_berat_edit').val();
        var anak_tinggi     = $('#anak_tinggi_edit').val();
        var token           = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('id', id);
        formData.append('ortu', ortu);
        formData.append('penjemput', penjemput);
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

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.anak.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Disimpan", "success");
                $('#formModalEditAnak').modal('hide');
                view_anak();            
                
            }
        });
    
        return false;

    });


    $('#show_data_anak').on('click','.item_anak_aktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non-Aktifkan !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('dapok.anak.aktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Aktifk !!.", "success");
                        view_anak();
                    }
                });  
            }
        });
    });

    $('#show_data_anak').on('click','.item_anak_nonaktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Non-Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non-Aktifkan !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('dapok.anak.nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        view_anak();
                    }
                });  
            }
        });
    });


    // PENJEMPUT

    function view_penjemput() {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.penjemput.view_pnj') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable_penjemput').DataTable().destroy(); 
                $('#show_data_penjemput').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        if((data[i].pnj_aktif) == 'Y'){

                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="60%" align="left">'),
                                $('<td class= width="60%" align="left">'),
                                $('<td class= width="1%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="60%" align="left">'),
                                $('<td class= width="60%" align="left">'),
                                $('<td class= width="1%" align="center">')
                            ]);

                        }
                    

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<a href="javascript:;" class="item_detail_pnj" data="'+data[i].pnj_id+'"> '+(data[i].pnj_nama)+'</a>')); 
                        
                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small class="text-muted"><i class="mdi mdi-calendar"></i> '+(moment(data[i].pnj_tgl_lahir).format('DD-MM-YYYY'))+' - '+(data[i].pnj_usia)+' Tahun </small>'));
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].pnj_hubungan))); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].pnj_peru))); 

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].pnj_alamat))); 

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].provinsi)+', '+(data[i].kota)+', '+(data[i].kecamatan)+'</small>'));
                        
                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit_pnj" data="'+data[i].pnj_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-info btn-xs item_pnj_aktif" data="'+data[i].pnj_id+'"><i class="mdi mdi-check"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_pnj_nonaktif" data="'+data[i].pnj_id+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        
                        tr.appendTo($('#show_data_penjemput'));
                    }

                } 
                else {

                    $('#show_data_penjemput').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                $('#datatable_penjemput').DataTable('refresh'); 
            }
        });
    }

    $('#btn_add_penjemput').on('click',function(){

        $.when(

            combo_hubungan_penjemput(),
            combo_jekel_penjemput(),
            combo_kerja_penjemput(),
            combo_perusahaan_penjemput(),
            combo_pendidikan_penjemput(),
            combo_agama_penjemput(),
            combo_kecamatan_penjemput(),
            combo_kota_penjemput(),
            combo_provinsi_penjemput(),

        )
        .done(function(){
            $('.select2').select2();
            $('#formModalAddPenjemput').modal('show');
        })
    });

    $('#show_data_penjemput').on('click', '.item_edit_pnj', function() {

        var id = $(this).attr('data');

        console.log(id);

        $.when(
            combo_hubungan_penjemput(),
            combo_jekel_penjemput(),
            combo_kerja_penjemput(),
            combo_perusahaan_penjemput(),
            combo_pendidikan_penjemput(),
            combo_agama_penjemput(),
            combo_kecamatan_penjemput(),
            combo_kota_penjemput(),
            combo_provinsi_penjemput(),
        )
        .done(function() {

            $('.select2').select2();

            $.ajax({
                type: "GET",
                url: "{{ route('dapok.penjemput.edit') }}",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(r) {

                    data = r.data;

                    $('#formModalEditPenjemput').modal('show');
                    $('#formModalEditPenjemput').find('[name="id_edit_penjemput"]').val(data.pnj_id);
                    $('#formModalEditPenjemput').find('[name="penjemput_nama"]').val(data.pnj_nama);
                    $('#formModalEditPenjemput').find('[name="penjemput_nik"]').val(data.pnj_nik);
                    $('#formModalEditPenjemput').find('[name="penjemput_tmp_lahir"]').val(data.pnj_tmp_lahir);
                    $('#formModalEditPenjemput').find('[name="penjemput_lahir"]').datepicker('setDate',moment(data.pnj_tgl_lahir).format('DD-MM-YYYY'));
                    $('#formModalEditPenjemput').find('[name="penjemput_agama"]').val(data.pnj_agama_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_hubungan"]').val(data.pnj_hub_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_kerja"]').val(data.pnj_kerja_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_perusahaan"]').val(data.pnj_peru_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_pdk"]').val(data.pnj_pdk_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_jekel"]').val(data.pnj_jekel).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_hp"]').val(data.pnj_hp);
                    $('#formModalEditPenjemput').find('[name="penjemput_wa"]').val(data.pnj_wa);

                    $('#formModalEditPenjemput').find('[name="penjemput_provinsi"]').val(data.provinsi_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_kota"]').val(data.kota_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_kecamatan"]').val(data.kecamatan_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_alamat"]').val(data.pnj_alamat).trigger("change");

                }
            });
        })

        return false;
    });

    $('#btn_simpan_penjemput').on('click', function(){
        
        if (!$("#penjemput_nama").val()) {
            $.toast({
                text: 'NAMA PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_nama").focus();
            return false;

        } 
        
        else if (!$("#penjemput_nik").val()) {
            $.toast({
                text: 'NIK PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_nik").focus();
            return false;

        }

        else if (!$("#penjemput_tmp_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_tmp_lahir").focus();
            return false;

        }

        else if (!$("#penjemput_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR PENJEMPUT  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_lahir").focus();
            return false;

        }

        else if (!$("#penjemput_agama").val()) {
            $.toast({
                text: 'AGAMA PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_agama").focus();
            return false;

        }

        else if (!$("#penjemput_hubungan").val()) {
            $.toast({
                text: 'HUBUNGAN PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_hubungan").focus();
            return false;

        }

        else if (!$("#penjemput_kerja").val()) {
            $.toast({
                text: 'KERJA PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_kerja").focus();
            return false;

        }

        else if (!$("#penjemput_perusahaan").val()) {
            $.toast({
                text: 'PERUSAHAAN PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_perusahaan").focus();
            return false;

        } 

        else if (!$("#penjemput_pdk").val()) {
            $.toast({
                text: 'PENDIDIKAN PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_perusahaan").focus();
            return false;

        } 
        
        else if (!$("#penjemput_hp").val()) {
            $.toast({
                text: 'HP penjemput MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_hp").focus();
            return false;

        } 

        else if (!$("#penjemput_wa").val()) {
            $.toast({
                text: 'WA PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_wa").focus();
            return false;

        } 

        else if (!$("#penjemput_provinsi").val()) {
            $.toast({
                text: 'PROVINSI MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_provinsi").focus();
            return false;

        } 

        else if (!$("#penjemput_kota").val()) {
            $.toast({
                text: 'KOTA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_kota").focus();
            return false;

        } 

        else if (!$("#penjemput_kecamatan").val()) {
            $.toast({
                text: 'KECAMATAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_kecamatan").focus();
            return false;

        } 
        
        else if (!$("#penjemput_alamat").val()) {
            $.toast({
                text: 'ALAMAT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_alamat").focus();
            return false;

        }


        var penjemput_nama       = $('#penjemput_nama').val();
        var penjemput_nik        = $('#penjemput_nik').val();
        var penjemput_tmp_lahir  = $('#penjemput_tmp_lahir').val();
        var penjemput_lahir      = $('#penjemput_lahir').val();
        var penjemput_kerja      = $('#penjemput_kerja').val();
        var penjemput_perusahaan = $('#penjemput_perusahaan').val();
        var penjemput_hp         = $('#penjemput_hp').val();
        var penjemput_wa         = $('#penjemput_wa').val();
        var penjemput_pdk        = $('#penjemput_pdk').val();
        var penjemput_agama      = $('#penjemput_agama').val();
        var penjemput_jekel      = $('#penjemput_jekel').val();
        var penjemput_hubungan   = $('#penjemput_hubungan').val();

        var provinsi        = $('#penjemput_provinsi').val();
        var kota            = $('#penjemput_kota').val();
        var kecamatan       = $('#penjemput_kecamatan').val();
        var alamat          = $('#penjemput_alamat').val(); 

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('penjemput_nama', penjemput_nama);
        formData.append('penjemput_nik', penjemput_nik);
        formData.append('penjemput_lahir', penjemput_lahir);
        formData.append('penjemput_tmp_lahir', penjemput_tmp_lahir);
        formData.append('penjemput_kerja', penjemput_kerja);
        formData.append('penjemput_perusahaan', penjemput_perusahaan);
        formData.append('penjemput_hp', penjemput_hp);
        formData.append('penjemput_wa', penjemput_wa);
        formData.append('penjemput_agama', penjemput_agama);
        formData.append('penjemput_pdk', penjemput_pdk);
        formData.append('penjemput_jekel', penjemput_jekel);
        formData.append('penjemput_hubungan', penjemput_hubungan);
        formData.append('provinsi', provinsi);
        formData.append('kota', kota);
        formData.append('kecamatan', kecamatan);
        formData.append('alamat', alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.penjemput.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Di Simpan", "success");
                $('#formModalAddPenjemput').modal('hide');
                view_penjemput();    
                
            }
        });
    
        return false;

    });

    $('#btn_update_penjemput').on('click', function(){
        
        if (!$("#penjemput_nama_edit").val()) {
            $.toast({
                text: 'NAMA PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_nama_edit").focus();
            return false;

        } 
        
        else if (!$("#penjemput_nik_edit").val()) {
            $.toast({
                text: 'NIK PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_nik_edit").focus();
            return false;

        }

        else if (!$("#penjemput_tmp_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_tmp_lahir_edit").focus();
            return false;

        }

        else if (!$("#penjemput_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR PENJEMPUT  KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_lahir_edit").focus();
            return false;

        }

        else if (!$("#penjemput_agama_edit").val()) {
            $.toast({
                text: 'AGAMA PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_agama_edit").focus();
            return false;

        }

        else if (!$("#penjemput_hubungan_edit").val()) {
            $.toast({
                text: 'HUBUNGAN PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_hubungan_edit").focus();
            return false;

        }

        else if (!$("#penjemput_kerja_edit").val()) {
            $.toast({
                text: 'KERJA PENJEMPUT KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_kerja_edit").focus();
            return false;

        }

        else if (!$("#penjemput_perusahaan_edit").val()) {
            $.toast({
                text: 'PERUSAHAAN PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_perusahaan_edit").focus();
            return false;

        } 

        else if (!$("#penjemput_pdk_edit").val()) {
            $.toast({
                text: 'PENDIDIKAN PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_pdk_edit").focus();
            return false;

        } 
        
        else if (!$("#penjemput_hp_edit").val()) {
            $.toast({
                text: 'HP penjemput MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_hp_edit").focus();
            return false;

        } 

        else if (!$("#penjemput_wa_edit").val()) {
            $.toast({
                text: 'WA PENJEMPUT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_wa_edit").focus();
            return false;

        } 

        else if (!$("#penjemput_provinsi_edit").val()) {
            $.toast({
                text: 'PROVINSI MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_provinsi_edit").focus();
            return false;

        } 

        else if (!$("#penjemput_kota_edit").val()) {
            $.toast({
                text: 'KOTA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_kota_edit").focus();
            return false;

        } 

        else if (!$("#penjemput_kecamatan_edit").val()) {
            $.toast({
                text: 'KECAMATAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_kecamatan_edit").focus();
            return false;

        } 
        
        else if (!$("#penjemput_alamat_edit").val()) {
            $.toast({
                text: 'ALAMAT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#penjemput_alamat_edit").focus();
            return false;

        }


        var id                   = $('#id_edit_penjemput').val();
        var penjemput_nama       = $('#penjemput_nama_edit').val();
        var penjemput_nik        = $('#penjemput_nik_edit').val();
        var penjemput_tmp_lahir  = $('#penjemput_tmp_lahir_edit').val();
        var penjemput_lahir      = $('#penjemput_lahir_edit').val();
        var penjemput_kerja      = $('#penjemput_kerja_edit').val();
        var penjemput_perusahaan = $('#penjemput_perusahaan_edit').val();
        var penjemput_hp         = $('#penjemput_hp_edit').val();
        var penjemput_wa         = $('#penjemput_wa_edit').val();
        var penjemput_pdk        = $('#penjemput_pdk_edit').val();
        var penjemput_agama      = $('#penjemput_agama_edit').val();
        var penjemput_jekel      = $('#penjemput_jekel_edit').val();
        var penjemput_hubungan   = $('#penjemput_hubungan_edit').val();

        var provinsi        = $('#penjemput_provinsi_edit').val();
        var kota            = $('#penjemput_kota_edit').val();
        var kecamatan       = $('#penjemput_kecamatan_edit').val();
        var alamat          = $('#penjemput_alamat_edit').val(); 

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('id', id);
        formData.append('penjemput_nama', penjemput_nama);
        formData.append('penjemput_nik', penjemput_nik);
        formData.append('penjemput_lahir', penjemput_lahir);
        formData.append('penjemput_tmp_lahir', penjemput_tmp_lahir);
        formData.append('penjemput_kerja', penjemput_kerja);
        formData.append('penjemput_perusahaan', penjemput_perusahaan);
        formData.append('penjemput_hp', penjemput_hp);
        formData.append('penjemput_wa', penjemput_wa);
        formData.append('penjemput_agama', penjemput_agama);
        formData.append('penjemput_pdk', penjemput_pdk);
        formData.append('penjemput_jekel', penjemput_jekel);
        formData.append('penjemput_hubungan', penjemput_hubungan);
        formData.append('provinsi', provinsi);
        formData.append('kota', kota);
        formData.append('kecamatan', kecamatan);
        formData.append('alamat', alamat);
        formData.append('_token', token);


        $.ajax({
            type: "POST",
            url: "{{ route('dapok.penjemput.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Di Simpan", "success");
                $('#formModalEditPenjemput').modal('hide');
                view_penjemput();    
                
            }
        });
    
        return false;

    });

    $('#show_data_penjemput').on('click','.item_pnj_aktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non-Aktifkan !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('dapok.penjemput.aktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Aktifk !!.", "success");
                        view_ortu();
                        view_penjemput();
                        view_penjemput();
                    }
                });  
            }
        });
    });

    $('#show_data_penjemput').on('click','.item_pnj_nonaktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Non-Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Non-Aktifkan !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('dapok.penjemput.nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        view_ortu();
                        view_penjemput();
                        view_penjemput();
                    }
                });  
            }
        });
    });


     // TRANSAKSI

    function view_detail() {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.view_detail') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable_penjemput').DataTable().destroy(); 
                $('#show_data_trs_detail').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        var tr = $('<tr>').append([
                            $('<td class= width="1%" align="center">'),
                            $('<td class= width="10%" align="left">'),
                            $('<td class= width="10%" align="left">'),
                            $('<td class= width="60%" align="right">'),
                            $('<td class= width="60%" align="right">'),
                            $('<td class= width="60%" align="right">'),
                            $('<td class= width="1%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nama))); 
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_nama))); 
                        
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tarif_reg))); 

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].tarif_spp))); 

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].tarif_pembg))); 

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].total))); 

                        tr.appendTo($('#show_data_trs_detail'));
                    }

                } 
                else {

                    $('#show_data_trs_detail').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                $('#datatable_penjemput').DataTable('refresh'); 
            }
        });
    }



    $('#show_data_transaksi').on('click', '.item_edit_pnj', function() {

        var id = $(this).attr('data');

        console.log(id);

        $.when(
            combo_hubungan_penjemput(),
            combo_jekel_penjemput(),
            combo_kerja_penjemput(),
            combo_perusahaan_penjemput(),
            combo_pendidikan_penjemput(),
            combo_agama_penjemput(),
            combo_kecamatan_penjemput(),
            combo_kota_penjemput(),
            combo_provinsi_penjemput(),
        )
        .done(function() {

            $('.select2').select2();

            $.ajax({
                type: "GET",
                url: "{{ route('dapok.penjemput.edit') }}",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(r) {

                    data = r.data;

                    $('#formModalEditPenjemput').modal('show');
                    $('#formModalEditPenjemput').find('[name="id_edit_penjemput"]').val(data.pnj_id);
                    $('#formModalEditPenjemput').find('[name="penjemput_nama"]').val(data.pnj_nama);
                    $('#formModalEditPenjemput').find('[name="penjemput_nik"]').val(data.pnj_nik);
                    $('#formModalEditPenjemput').find('[name="penjemput_tmp_lahir"]').val(data.pnj_tmp_lahir);
                    $('#formModalEditPenjemput').find('[name="penjemput_lahir"]').datepicker('setDate',moment(data.pnj_tgl_lahir).format('DD-MM-YYYY'));
                    $('#formModalEditPenjemput').find('[name="penjemput_agama"]').val(data.pnj_agama_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_hubungan"]').val(data.pnj_hub_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_kerja"]').val(data.pnj_kerja_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_perusahaan"]').val(data.pnj_peru_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_pdk"]').val(data.pnj_pdk_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_jekel"]').val(data.pnj_jekel).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_hp"]').val(data.pnj_hp);
                    $('#formModalEditPenjemput').find('[name="penjemput_wa"]').val(data.pnj_wa);

                    $('#formModalEditPenjemput').find('[name="penjemput_provinsi"]').val(data.provinsi_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_kota"]').val(data.kota_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_kecamatan"]').val(data.kecamatan_id).trigger("change");
                    $('#formModalEditPenjemput').find('[name="penjemput_alamat"]').val(data.pnj_alamat).trigger("change");

                }
            });
        })

        return false;
    });

    $('#btn_simpan_detail ').on('click', function(){

        if (!$("#trs_anak").val()) {
            $.toast({
                text: 'ANAK HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#trs_anak").focus();
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


        var trs_anak             = $('#trs_anak').val();
        var grup                 = $('#grup').val();
        var paket                = $('#paket').val();
        var keterangan           = $('#keterangan').val();
        var paket_kode           = $('#paket_kode').val();

        var token = $('[name=_token]').val();
        var formData = new FormData();

        formData.append('trs_anak', trs_anak);
        formData.append('grup', grup);
        formData.append('paket', paket);
        formData.append('keterangan', keterangan);
        formData.append('paket_kode', paket_kode);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.save_detail') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                if(r.success == true){
                    $.toast({
                        text: 'DATA BERHASIL DITAMBAHKAN',
                        position: 'top-right',
                        loaderBg: '#fff716',
                        icon: 'success',
                        hideAfter: 3000
                    });
                }
                view_detail();
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
                    html = '<option value='+(data[i].kec_id)+'>'+(data[i].kec_nama)+'</option>';
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
                    html = '<option value='+(data[i].kota_id)+'>'+(data[i].kota_nama)+'</option>';
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
                    html = '<option value='+(data[i].pro_id)+'>'+(data[i].pro_nama)+'</option>';
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
                    html = '<option value='+(data[i].kec_id)+'>'+(data[i].kec_nama)+'</option>';
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
                    html = '<option value='+(data[i].kota_id)+'>'+(data[i].kota_nama)+'</option>';
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
                    html = '<option value='+(data[i].pro_id)+'>'+(data[i].pro_nama)+'</option>';
                    $('select[name=penjemput_provinsi]').append(html)
                }
            }
        });
    }

    function combo_jenis(){

    $('select[name=jenis]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_jenis_pendaftaran') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=jenis]').empty()
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].jenis_id)+'>'+(data[i].jenis_nama)+'</option>';
                        $('select[name=jenis]').append(html)
                    }
                }
            });

    }

    function combo_blm(){

        $('select[name=detai_blm]').empty()
            var html = '';
            html = '<option value="B">Baru</option>'+
                   '<option value="L">Lama</option>';
        $('select[name=detai_blm]').append(html)

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

    function combo_kerja_ayah(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_jenis_pekerjaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ayah_kerja]').empty()
                var x = document.getElementById("ayah_kerja");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=ayah_kerja]').append(html)
                }
            }
        });

    }

    function combo_kerja_ibu(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_jenis_pekerjaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_kerja]').empty()
                var x = document.getElementById("ibu_kerja");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = 
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=ibu_kerja]').append(html)
                }
            }
        });

    }

    function combo_kerja_penjemput(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_jenis_pekerjaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_kerja]').empty()
                var x = document.getElementById("penjemput_kerja");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = 
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=penjemput_kerja]').append(html)
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

    function combo_perusahaan(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_perusahaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ayah_perusahaan]').empty()
                var x = document.getElementById("ayah_perusahaan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].peru_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=ayah_perusahaan]').append(html)
                }
            }
        });

    }

    function combo_perusahaan_ibu(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_perusahaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_perusahaan]').empty()
                var x = document.getElementById("ibu_perusahaan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].peru_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=ibu_perusahaan]').append(html)
                }
            }
        });

    }

    function combo_perusahaan_penjemput(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_perusahaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=penjemput_perusahaan]').empty()
                var x = document.getElementById("penjemput_perusahaan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].peru_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=penjemput_perusahaan]').append(html)
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

    // TRANSAKSI

    // $('#btn_simpan_anak').on('click', function(){
        
    //     if (!$("#trs_ortu").val()) {
    //         $.toast({
    //             text: 'ORANG TUA MASIH KOSONG',
    //             position: 'top-right',
    //             loaderBg: '#fff716',
    //             icon: 'error',
    //             hideAfter: 3000
    //         });

    //         $("#trs_ortu").focus();
    //         return false;

    //     }

    //     if (!$("#penjemput").val()) {
    //         $.toast({
    //             text: 'PENJEMPUT MASIH KOSONG',
    //             position: 'top-right',
    //             loaderBg: '#fff716',
    //             icon: 'error',
    //             hideAfter: 3000
    //         });

    //         $("#penjemput").focus();
    //         return false;

    //     } 

      
        
      
    //     // var nis             = $('#id_edit_anak').val();
    //     var ortu            = $('#trs_ortu').val();
    //     var penjemput       = $('#penjemput').val();
    //     var anak_nama       = $('#anak_nama').val();
    //     var anak_tmp_lahir  = $('#anak_tmp_lahir').val();
    //     var anak_tgl_lahir  = $('#anak_tgl_lahir').val();
    //     var anak_jekel      = $('#anak_jekel').val();
    //     var anak_ke         = $('#anak_ke').val();
    //     var anak_saudara    = $('#anak_saudara').val();
    //     var anak_agama      = $('#anak_agama').val();
    //     var anak_alamat     = $('#anak_alamat').val();
    //     var anak_berat      = $('#anak_berat').val();
    //     var anak_tinggi     = $('#anak_tinggi').val();
    //     var token           = $('[name=_token]').val();

    //     var formData = new FormData();
    
    //     // formData.append('nis', nis);
    //     formData.append('ortu', ortu);
    //     formData.append('penjemput', penjemput);
    //     formData.append('anak_nama', anak_nama);
    //     formData.append('anak_tmp_lahir', anak_tmp_lahir);
    //     formData.append('anak_tgl_lahir', anak_tgl_lahir);
    //     formData.append('anak_jekel', anak_jekel);
    //     formData.append('anak_ke', anak_ke);
    //     formData.append('anak_saudara', anak_saudara);
    //     formData.append('anak_agama', anak_agama);
    //     formData.append('anak_alamat', anak_alamat);
    //     formData.append('anak_berat', anak_berat);
    //     formData.append('anak_tinggi', anak_tinggi);

    //     formData.append('_token', token);

    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('dapok.anak.save') }}",
    //         dataType: "JSON",
    //         data: formData,
    //         cache: false,
    //         processData: false,
    //         contentType: false,
    //         success: function(data) {

    //             swal("Berhasil!", "Data Berhasil Disimpan", "success");
    //             $('#formModalAddAnak').modal('hide');       
    //             view_anak();
    //             combo_anak();
                
    //         }
    //     });
    
    //     return false;

    // });
 

    function showFilterGrub(select){

        var grup  = $('#grup').val();
        var paket  = $('#paket').val();
        combo_paket(grup);
        view_tarif(grup,paket);

    }

    function showFilterPaket(select){

        var grup  = $('#grup').val();
        var paket  = $('#paket').val();
        view_tarif(grup,paket);
        get_tarif(paket);

    }

    function get_tarif(paket){
        $.ajax({
            type: "GET",
            url: "{{ route('tarif.paket.get_tarif') }}",
            dataType: "JSON",
            data: {id:paket},
            success: function(data) {

                $('[name="paket_kode"]').val(data.paket_kode);
               
            }
        });
    }


    function combo_paket(grup){

        $('select[name=paket]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_paket') }}",
            async : false,
            data : {grup:grup},
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
                    html = '<option value='+(data[i].jenis_id)+'>'+(data[i].jenis_nama)+'</option>';
                    $('select[name=paket]').append(html)
                }
            }
        });

    }

    // TRANSAKSI

    function view_tarif(grup,paket) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.paket.view_transaksi') }}",
            async: true,
            data : {grup:grup,paket:paket},
            dataType: 'JSON',
            success: function(r) {
                var i;

                $('#show_data_tarif').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="5%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].reg_tampil)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].spp_tampil)));  

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tahun)));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].total_spp_tampil)));

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].pembangunan_tampil)));  

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html('<b class="text-danger">'+(data[i].total_bayar)+'</b>'));   

                        // tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-rounded btn-info btn-xs item_pilih" data="'+data[i].tarif_nis+'">PILIH</a></div>'); 

                        tr.appendTo($('#show_data_tarif'));
                    }

                } else {

                    $('#show_data_tarif').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }

            }
        });
    }


    function view_transaksi_detail() {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.paket.view_transaksi') }}",
            async: true,
            data : {grup:grup,paket:paket},
            dataType: 'JSON',
            success: function(r) {
                var i;

                $('#show_data_tarif').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="5%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].reg_tampil)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].spp_tampil)));  

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tahun)));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].total_spp_tampil)));

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].pembangunan_tampil)));  

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html('<b class="text-danger">'+(data[i].total_bayar)+'</b>'));   

                        // tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-rounded btn-info btn-xs item_pilih" data="'+data[i].tarif_nis+'">PILIH</a></div>'); 

                        tr.appendTo($('#show_data_tarif'));
                    }

                } else {

                    $('#show_data_tarif').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }

            }
        });
    }


    // 

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

    



</script>


@endsection