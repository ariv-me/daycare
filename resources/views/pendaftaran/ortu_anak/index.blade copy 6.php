@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title"><i class="fas fa-clipboard-list"></i>  PENDAFTARAN</h4>
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
                            <a class="nav-link text-center" data-toggle="tab" href="#cu_anak" role="tab"><i class="fas fa-child d-block"></i>&nbsp;&nbsp;&nbsp;&nbsp;Anak&nbsp;&nbsp;&nbsp;&nbsp; </a>
                        </li>                                                
                        <li class="nav-item">
                            <a class="nav-link text-center" data-toggle="tab" href="#cu_transaksi" role="tab"><i class="fas fa-sync-alt d-block"></i>Transaksi</a>
                        </li>
                    </ul>
                </div>
                
                <hr>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="orang_tua" role="tabpanel">
                        <div class="row">
                            <div class="col-md-9">  
                                
                            </div>
                            <div class="col-md-3" style="text-align: right">
                                <button type="submit" class="btn btn-primary btn-round btn-xs waves-effect waves-light" id="btn_add_ortu">
                                    <i class="fas fa-plus"></i> TAMBAH DATA
                                </button>
                            </div>
                        </div>
                        
                        <table id="" class="table table-sm table-bordered mt-2 table-centered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: center">AYAH</th>
                                    <th style="text-align: center">HP AYAH</th>
                                    <th style ="text-align: center">IBU</th>
                                    <th style="text-align: center">HP IBU</th>
                                    <th style="text-align: center">ALAMAT</th>
                                    <th style ="text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="show_data_ortu">

                            </tbody>
                        </table>
                       
                      
                    </div>
                    <div class="tab-pane" id="cu_anak" role="tabpanel">
                        <div class="lg-12">
                            <h4 class="card-title">ANAK</h4>
                            <p class="text-muted mb-3">Form Input Data Anak</p>
                        </div> 
                        <div class="row">
                            {!! csrf_field() !!} 
                            <input type="hidden" id="id_edit_anak" name="id_edit_anak" class="form-control">
        
                            <div class="col-lg-6">
        
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="example-url-input" class="">Nama</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="anak_nama" name="anak_nama">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-success btn-sm" id="btn_anak"> <i class="fa fa-search"></i> </button>
                                            </span>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="example-date-input" class="">Jenis Kelamin</label>
                                        <select class="form-control custom-select select2" style="width: 100%;" name="anak_jekel" id="anak_jekel"></select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="example-month-input" class="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="anak_tgl_lahir" name="anak_tgl_lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="example-time-input" class="">Anak Ke</label>
                                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="example-time-input" class="">Jumlah Saudara</label>
                                        <input type="text" class="form-control" id="anak_saudara" name="anak_saudara" value="0" onkeypress="return angka(this, event)">
                                    </div>
                                </div>
                            </div>
        
        
                          <div class="col-lg-6">
        
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="example-search-input" class="">Orang Tua</label>
                                        <select class="form-control custom-select select2" style="width: 100%;" name="ortu" id="ortu"></select>
                                    </div>
                                </div> 
        
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="example-week-input" class="">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="anak_tmp_lahir" name="anak_tmp_lahir">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="example-time-input" class="">Agama</label>
                                        <select class="form-control custom-select select2" style="width: 100%;" name="anak_agama" id="anak_agama"></select>
                                    </div>
                                </div>
                             
                                <div class="form-group row">
                                
                                    <div class="col-sm-6">
                                        <label for="example-time-input" class="">Berat</label>
                                        <div class="input-group">  
                                            <input type="text" class="form-control" id="anak_berat" name="anak_berat" onkeypress="return angka(this, event)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <label for="example-time-input" class="">Tinggi</label>
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
                        <div class="row">
                            <div class="col-md-9">  
                            </div>
                            <div class="col-md-3" style="text-align: right">
                                <button type="button" class="btn btn-danger btn-sm me-1" id="btn_reset_anak" >
                                    <i class="fas fa-times"></i> BATAL
                                </button>
                                <button type="submit" class="btn btn-info btn-sm" id="btn_simpan_anak">
                                    <i class="fas fa-save"></i> SIMPAN
                                </button>
                            </div>
                        </div>
                    </div>                                                
                    <div class="tab-pane" id="cu_transaksi" role="tabpanel">
                        <p class="text-muted mb-0">
                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy.
                        </p>
                    </div>
                </div> <!--end tab-content-->   
            </div><!--end card-body-->
        </div>
    </div>

</div>

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
                                <input type="date" class="form-control datepicker" id="ayah_lahir" name="ayah_lahir">
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
                                <label for="example-tel-input" class=""> Perusahaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_perusahaan" id="ayah_perusahaan"></select>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="ayah_hp" name="ayah_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="ayah_wa" name="ayah_wa" onkeypress="return angka(this, event)">
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
                                <input type="date" class="form-control datepicker" id="ibu_lahir" name="ibu_lahir">
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
                                <label for="example-tel-input" class=""> Perusahaan</label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_perusahaan" id="ibu_perusahaan"></select>
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor HP</label>
                                <input type="text" class="form-control" id="ibu_hp" name="ibu_hp" onkeypress="return angka(this, event)">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label for="example-number-input" class="">Nomor WA</label>
                                <input type="text" class="form-control" id="ibu_wa" name="ibu_wa" onkeypress="return angka(this, event)">
                            </div>
                            
                        </div>

                    </div>
                    
                    <hr>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Provinsi <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="provinsi" id="provinsi" onchange="showFilterProvinsi(this)"></select>
                            </div>
                            <div class="col-md-3">
                                <label>Kabupaten/Kota <small class="red">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="kota" id="kota" onchange="showFilterKota(this)"></select>
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

            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" id="btn_simpan_ortu">
                    <i class="fas fa-save"></i> SIMPAN
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-default-modal-lg fade" id="formModalAnak">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">

            <div class="modal-body">
                <table id="datatable2" class="table table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th width ="2%" style="text-align: center">NO</th>
                            <th width ="15%" style="text-align: center">NIS</th>
                            <th width ="48%" style ="text-align: center">ANAK</th>
                            <th width ="10%" style ="text-align: center">USIA</th>
                            <th width ="20%" style ="text-align: center">TGL LAHIR</th>

                        </tr>
                    </thead>
                    <tbody id="show_data_anak"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-default fade" id="formModalPekerjaan">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Jenis Pekerjaan</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" id="id_kerja" name="id_kerja">
                        <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kerja_nama" name="kerja_nama">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-success btn-md" id="btn_simpan_kerja"> <i class="fa fa-save"></i> </button>
                            </span>
                        </div> 
                    </div>
                </div>
                <hr class="hr-dashed">
                <table id="datatable3" class="table table-bordered mb-0 mt-4 table-centered">
                    <thead>
                        <tr>
                            <th width ="2%" style="text-align: center">NO</th>
                            <th width ="100%" style="text-align: center">NAMA</th>
                            <th width ="10%" style ="text-align: center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="show_data_pekerjaan"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default-modal-lg fade" id="formModalPerusahaan">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Perusahaan</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="form-group row mb-3">
                    <input type="text" class="form-control" id="id_perusahaan" name="id_perusahaan">
                    <div class="col-sm-6">
                        <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="perusahaan_nama" name="perusahaan_nama">
                    </div>
                    <div class="col-sm-6">
                        <label> <strong>Grup</strong>  <small class="text-danger">*</small></label>
                        <select class="form-control custom-select select2" style="width: 100%;" name="perusahaan_grup" id="perusahaan_grup"></select>
                    </div>
                    <div class="col-md-12 mt-2">
                        <input type="hidden" class="form-control" id="id_perusahaan" name="id_perusahaan">
                        <label> <strong>Alamat</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="perusahaan_alamat" name="perusahaan_alamat">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-success btn-md" id="btn_simpan_perusahaan"> <i class="fa fa-save"></i> </button>
                            </span>
                        </div> 
                    </div>
                </div>
                <hr class="hr-dashed">
                <table id="datatable4" class="table table-bordered mb-0 mt-4 table-centered">
                    <thead>
                        <tr>
                            <th width ="1%" style="text-align: center">NO</th>
                            <th width ="30%" style="text-align: center">NAMA</th>
                            <th width ="25%" style="text-align: center">GRUP</th>
                            <th width ="60%" style="text-align: center">ALAMAT</th>
                            <th width ="5%" style ="text-align: center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="show_data_perusahaan"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();

       
        combo_ortu();
        combo_anak();
        combo_jenis();
        combo_wali_jekel();
        combo_anak_jekel();
      
       // view();
        view_ortu();
        reset();

    });

    // ayah

    function showFilterProvinsi(select){
        var provinsi=$('#provinsi').val();
        combo_kota(provinsi);

        var kota=$('#kota').val();
        combo_kecamatan(kota);
    }

    function showFilterKota(select){
        var kota=$('#kota').val();
        combo_kecamatan(kota);
    }

    // ayah EDIT

    function showFilterProvinsiEdit(select){
        var provinsi=$('#provinsi_edit').val();
        combo_kota(provinsi);

        var kota=$('#kota_edit').val();
        combo_kecamatan(kota);
    }

    function showFilterKotaEdit(select){
        var kota=$('#kota_edit').val();
        combo_kecamatan(kota);
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

    function reset_jenis_kerja(){
        $('#id_kerja').val(""); 
        $('#kerja_nama').val("");
    }

    function reset_perusahaan(){
        $('#id_perusahaan').val(""); 
        $('#perusahaan_grup').val("").trigger("change");
        $('#perusahaan_nama').val("");
        $('#perusahaan_alamat').val("");
    }

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_kerja').on('click',function(){

        $('#formModalPekerjaan').modal('show');
        view_jenis_kerja();
        reset_jenis_kerja();
    });

    $('#btn_kerja').on('click',function(){

        $('#formModalPekerjaan').modal('show');
        view_perusahaan();
        reset_perusahaan();
    });

    $('#btn_kerja_ibu').on('click',function(){

        $('#formModalPekerjaan').modal('show');
        view_jenis_kerja();
        reset_jenis_kerja();

    });

    $('#btn_perusahaan').on('click',function(){

        $('#formModalPerusahaan').modal('show');
        combo_grup();
        view_perusahaan();
        reset_perusahaan();

    });

    $('#btn_perusahaan_ibu').on('click',function(){

        $('#formModalPerusahaan').modal('show');
        combo_grup();
        view_perusahaan();
        reset_perusahaan();

    });

    $('#btn_reset_anak').on('click',function(){
        reset();
    });

    $('#btn_reset_ortu').on('click',function(){
        reset();
    });

    $('#btn_cari').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });

    $('#btn_add_ortu').on('click',function(){

        $.when(
            combo_ayah_agama(),
            combo_kerja_ayah(),
            combo_perusahaan(),
            combo_ibu_agama(),
            combo_anak_agama(),
            combo_perusahaan_ibu(),
            combo_kerja_ibu(),
            combo_kecamatan(),
            combo_kota(),
            combo_provinsi(),
        )
        .done(function(){
            $('.select2').select2();
            $('#formModalAddOrtu').modal('show');
        })
    });

    $('#btn_add_anak').on('click',function(){

        $('#formModalAddAnak').modal('show');

    });

    $('#btn_cari_ortu').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });

    function view() {

       $.ajax({
            type: 'GET',
            url: "{{ route('ortu.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                   
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="5%" align="left">'),
                                $('<td class= width="13%" align="center">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="5%" align="left">'),
                                $('<td class= width="5%" align="center">'),
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<strong></strong>' +(data[i].ortu_ayah))); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<strong></strong>' +(data[i].ortu_ibu)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<strong></strong>' +(data[i].ayah_usia) + ' Tahun')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<strong></strong>' +(data[i].ibu_usia) + ' Tahun'));   

                        tr.find('td:nth-child(4)').append($('<div>')
                             .html('<strong> </strong>' +(data[i].ayah_kerja)));

                        tr.find('td:nth-child(4)').append($('<div>')
                             .html('<strong></strong>' +(data[i].ibu_kerja))); 

                        tr.find('td:nth-child(5)').append($('<div>')
                             .html('<strong> </strong>' +(data[i].ayah_agama)));

                        tr.find('td:nth-child(5)').append($('<div>')
                             .html('<strong></strong>' +(data[i].ibu_agama))); 

                        tr.find('td:nth-child(6)').append($('<div>')
                             .html('<strong> </strong>' +(data[i].ortu_ayah_hp)));

                        tr.find('td:nth-child(6)').append($('<div>')
                             .html('<strong></strong>' +(data[i].ortu_ibu_hp))); 

                        tr.find('td:nth-child(7)').append($('<div>')
                             .html('<strong> </strong>' +(data[i].ortu_ayah_wa)));

                        tr.find('td:nth-child(7)').append($('<div>')
                             .html('<strong></strong>' +(data[i].ortu_ibu_wa))); 

                        tr.find('td:nth-child(8)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs btn_edit_ortu" data="'+data[i].ortu_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs btn_delete_ortu" data="'+data[i].ortu_id+'"><i class="fas fa-trash"></i></a></div>');   
                        
                        tr.appendTo($('#show_data'));
                    }

                } //else {

                //       $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                //  }
                //$('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_ortu() {

       $.ajax({
            type: 'GET',
            url: "{{ route('ortu.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data_ortu').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                   
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="15%" align="left">'),
                                $('<td class= width="15%" align="left">'),
                                $('<td class= width="15%" align="left">'),
                                $('<td class= width="15%" align="left">'),
                                $('<td class= width="35%" align="left">'),
                                $('<td class= width="5%" align="left">')
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_ortu" data="'+data[i].ortu_id+'">'+(data[i].ortu_ayah)+'</a>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_ortu" data="'+data[i].ortu_id+'">'+(data[i].ortu_ibu)+'</a>')); 

                     
                        tr.appendTo($('#show_data_ortu'));
                    }

                } //else {

                //       $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                //  }
                $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_anak() {

       $.ajax({
            type: 'GET',
            url: "{{ route('anak.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable2').DataTable().destroy(); 
                $('#show_data_anak').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                   
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="15%" align="left">'),
                                $('<td class= width="15%" align="left">'),
                                $('<td class= width="15%" align="center">'),
                                $('<td class= width="15%" align="center">')
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_anak" data="'+data[i].anak_kode+'">'+(data[i].anak_kode)+'</a>')); 
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_anak" data="'+data[i].anak_kode+'">'+(data[i].anak_nama)+'</a>')); 
                        
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<strong></strong>' +(data[i].anak_usia)));     

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((moment(data[i].anak_tgl_lahir).format('DD-MM-YYYY'))));   
                     
                        tr.appendTo($('#show_data_anak'));
                    }

                } //else {

                //       $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                //  }
                $('#datatable2').DataTable('refresh'); 
            }
        });
    }

    function view_jenis_kerja() {

       $.ajax({
            type: 'GET',
            url: "{{ route('jenis_kerja.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
               $('#datatable3').DataTable().destroy(); 
                $('#show_data_pekerjaan').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        if((data[i].aktif) == 'Y'){

                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="100%" align="left">'),
                                $('<td class= width="5%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([

                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="100%" align="left">'),
                                $('<td class= width="5%" align="center">')
                            ]);

                        }
                   
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].kerja_nama))); 
                        
                        if((data[i].aktif) == 'Y'){

                            tr.find('td:nth-child(3)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs btn_kerja_edit" data="'+data[i].kerja_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs btn_kerja_nonaktif" data="'+data[i].kerja_id+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        } else {
                            
                            tr.find('td:nth-child(3)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs btn_kerja_aktif" data="'+data[i].kerja_id+'"><i class="mdi mdi-check"></i></a></div>');   
                        
                        }


                        tr.appendTo($('#show_data_pekerjaan'));
                    }

                } else {

                    $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                $('#datatable3').DataTable('refresh'); 
            }
        });
    }

    function view_perusahaan() {

       $.ajax({
            type: 'GET',
            url: "{{ route('perusahaan.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
               $('#datatable4').DataTable().destroy(); 
                $('#show_data_perusahaan').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        if((data[i].peru_aktif) == 'Y'){

                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="40%" align="left">'),
                                $('<td class= width="40%" align="left">'),
                                $('<td class= width="60%" align="left">'),
                                $('<td class= width="5%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([

                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="40%" align="left">'),
                                $('<td class= width="40%" align="left">'),
                                $('<td class= width="60%" align="left">'),
                                $('<td class= width="5%" align="center">')
                            ]);

                        }
                   
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].peru_nama))); 
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].grup_nama))); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].peru_alamat))); 
                        
                        if((data[i].peru_aktif) == 'Y'){

                            tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs btn_perusahaan_edit" data="'+data[i].peru_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs btn_perusahaan_nonaktif" data="'+data[i].peru_id+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        } else {
                            
                            tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs btn_perusahaan_aktif" data="'+data[i].peru_id+'"><i class="mdi mdi-check"></i></a></div>');   
                        
                        }


                        tr.appendTo($('#show_data_perusahaan'));
                    }

                } else {

                    $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                $('#datatable4').DataTable('refresh'); 
            }
        });
    }

    $('#show_data_ortu').on('click','.btn_edit_ortu',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('ortu.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(r) {
                data = r.data;

                console.log(data);

                $('[name="id_edit"]').val(data.ortu_id);
                $('[name="ayah_nama"]').val(data.ortu_ayah);
                $('[name="ayah_lahir"]').val(data.ortu_ayah_lahir).trigger("change");
                $('[name="ayah_agama"]').val(data.ortu_ayah_agama_id).trigger("change");
                $('[name="ayah_perusahaan"]').val(data.ortu_ayah_peru_id).trigger("change");
                $('[name="ayah_kerja"]').val(data.ortu_ayah_kerja).trigger("change");
                $('[name="ayah_hp"]').val(data.ortu_ayah_hp).trigger("change");
                $('[name="ayah_wa"]').val(data.ortu_ayah_wa).trigger("change");
                $('[name="ayah_alamat"]').val(data.ortu_ayah_alamat).trigger("change");

                $('[name="ibu_nama"]').val(data.ortu_ibu);
                $('[name="ibu_lahir"]').val(data.ortu_ibu_lahir).trigger("change");
                $('[name="ibu_agama"]').val(data.ortu_ibu_agama_id).trigger("change");
                $('[name="ibu_perusahaan"]').val(data.ortu_ibu_peru_id).trigger("change");
                $('[name="ibu_kerja"]').val(data.ortu_ibu_kerja).trigger("change");
                $('[name="ibu_hp"]').val(data.ortu_ibu_hp).trigger("change");
                $('[name="ibu_wa"]').val(data.ortu_ibu_wa).trigger("change");
                $('[name="ibu_alamat"]').val(data.ortu_ibu_alamat).trigger("change");

                $('#formModalOrtu').modal('hide');
            }
        });

        return false;

    });

    $('#show_data_anak').on('click','.btn_edit_anak',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('anak.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(r) {
                data = r.data;

                console.log(data);

                $('[name="id_edit_anak"]').val(data.anak_kode);
                $('[name="ortu"]').val(data.ortu_id).trigger("change");
                $('[name="anak_nama"]').val(data.anak_nama).trigger("change");
                $('[name="anak_agama"]').val(data.agama_id).trigger("change");
                $('[name="anak_jekel"]').val(data.anak_jekel).trigger("change");
                $('[name="anak_tmp_lahir"]').val(data.anak_tmp_lahir).trigger("change");
                $('[name="anak_tgl_lahir"]').val(data.anak_tgl_lahir).trigger("change");
                $('[name="anak_ke"]').val(data.anak_ke).trigger("change");
                $('[name="anak_saudara"]').val(data.anak_jml_saudara).trigger("change");
                $('[name="anak_berat"]').val(data.anak_berat).trigger("change");
                $('[name="anak_tinggi"]').val(data.anak_tinggi).trigger("change");

                $('#formModalAnak').modal('hide');
            }
        });

        return false;

    });

    $('#btn_simpan_anak').on('click', function(){
        
        if (!$("#ortu").val()) {
            $.toast({
                text: 'ORANG TUA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu").focus();
            return false;

        } else if (!$("#anak_nama").val()) {
            $.toast({
                text: 'NAMA ANAK MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_nama").focus();
            return false;

        } else if (!$("#anak_jekel").val()) {
            $.toast({
                text: 'JENIS KELAMIN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_jekel").focus();
            return false;

        } else if (!$("#anak_tgl_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tgl_lahir").focus();
            return false;

        } else if (!$("#anak_tmp_lahir").val()) {
            $.toast({
                text: 'TEMPAT LAHIR MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tmp_lahir").focus();
            return false;

        } else if (!$("#anak_agama").val()) {
            $.toast({
                text: 'AGAMA MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_agama").focus();
            return false;

        } else if (!$("#anak_ke").val()) {
            $.toast({
                text: 'ANAK KE MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_ke").focus();
            return false;

        } else if (!$("#anak_berat").val()) {
            $.toast({
                text: 'BERAT MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_berat").focus();
            return false;

        } else if (!$("#anak_tinggi").val()) {
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
        
        var nis             = $('#id_edit_anak').val();
        var ortu            = $('#ortu').val();
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
    
        formData.append('nis', nis);
        formData.append('ortu', ortu);
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
            url: "{{ route('anak.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                if (r.status == '1') {
                    swal("Berhasil!", "Data Berhasil Update", "success");
                    reset();
                    combo_ortu();

                } else if (r.status == '2'){
                    swal("Berhasil!", "Data Berhasil Simpan", "success");
                    reset();
                    combo_ortu();

                }
                
            }
        });
    
        return false;

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
        var ayah_agama      = $('#ayah_agama').val();

        var ibu_nama        = $('#ibu_nama').val();
        var ibu_nik         = $('#ibu_nik').val();
        var ibu_lahir       = $('#ibu_lahir').val();
        var ibu_tmp_lahir   = $('#ibu_tmp_lahir').val();
        var ibu_kerja       = $('#ibu_kerja').val();
        var ibu_perusahaan  = $('#ibu_perusahaan').val();
        var ibu_hp          = $('#ibu_hp').val();
        var ibu_wa          = $('#ibu_wa').val();
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

        formData.append('ibu_nama', ibu_nama);
        formData.append('ibu_nik', ibu_nik);
        formData.append('ibu_tmp_lahir', ibu_tmp_lahir);
        formData.append('ibu_lahir', ibu_lahir);
        formData.append('ibu_kerja', ibu_kerja);
        formData.append('ibu_perusahaan', ibu_perusahaan);
        formData.append('ibu_hp', ibu_hp);
        formData.append('ibu_wa', ibu_wa);
        formData.append('ibu_agama', ibu_agama);

        formData.append('provinsi', provinsi);
        formData.append('kota', kota);
        formData.append('kecamatan', kecamatan);
        formData.append('alamat', alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('ortu.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                if (r.status == '1') {
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    view();
                    reset();
                    combo_ortu();

                } else if (r.status == '2'){
                    swal("Berhasil!", "Data Berhasil Update", "success");
                    view();
                    reset();
                    combo_ortu();

                }
                
            }
        });
    
        return false;

    });

    $('#btn_proses').on('click', function(){
    
    
    var daftar_tanggal   = $('#daftar_tanggal').val();
    var daftar_nis       = $('#daftar_nis').val();
    var daftar_anak      = $('#daftar_anak').val();
    var perusahaan       = $('#perusahaan').val();
    var jenis      = $('#jenis').val();

    console.log(daftar_anak);
    
    var token = $('[name=_token]').val();

    var formData = new FormData();

        formData.append('daftar_nis', daftar_nis);
        formData.append('daftar_anak', daftar_anak);
        formData.append('perusahaan', perusahaan);
        formData.append('jenis', jenis);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.save') }}",
            dataType: "JSON",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $.toast({
                        text: 'BERHASIL',
                        position: 'top-right',
                        loaderBg: '#2bc155',
                        icon: 'success',
                        hideAfter: 3000
                    });
                    reset();

                }
            });

        return false;

    });

    $('#btn_simpan_kerja').on('click', function(){
        
        if (!$("#kerja_nama").val()) {
            $.toast({
                text: 'NAMA PEKERJAAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kerja_nama").focus();
            return false;
        } 
        
       
        var id             = $('#id_kerja').val();
        var kerja_nama     = $('#kerja_nama').val();
        var token          = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('id', id);
        formData.append('kerja_nama', kerja_nama);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('jenis_kerja.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                if (r.status == '1') {
                    swal("Berhasil!", "Data Berhasil Update", "success");
                    reset_jenis_kerja();
                    view_jenis_kerja();
                    combo_kerja_ayah();
                    combo_kerja_ibu();

                } else if (r.status == '2'){
                    swal("Berhasil!", "Data Berhasil Simpan", "success");
                    reset_jenis_kerja();
                    view_jenis_kerja();
                    combo_kerja_ayah();
                    combo_kerja_ibu();

                }
                $('#formModalPekerjaan').modal('hide')
            }
        });
    
        return false;

    });

    $('#show_data_pekerjaan').on('click','.btn_kerja_edit',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('jenis_kerja.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(r) {
                data = r.data;

                console.log(data);

                $('#formModalPekerjaan').find('[name="id_kerja"]').val(r.kerja_id);
                $('#formModalPekerjaan').find('[name="kerja_nama"]').val(r.kerja_nama);

            }
        });

        return false;

    });

    $('#show_data_pekerjaan').on('click','.btn_kerja_aktif',function(){
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
                    url   : "{{ route('jenis_kerja.aktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        $('#formModalPekerjaan').modal('hide');
                        reset_jenis_kerja();
                        view_jenis_kerja();
                        combo_kerja_ayah();
                        combo_kerja_ibu();
                    }
                });  
            }
        });
    });

    $('#show_data_pekerjaan').on('click','.btn_kerja_nonaktif',function(){
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
                    url   : "{{ route('jenis_kerja.nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        $('#formModalPekerjaan').modal('hide')
                        reset_jenis_kerja();
                        view_jenis_kerja();
                        combo_kerja_ayah();
                        combo_kerja_ibu();
                    }
                });  
            }
        });
    });

    $('#btn_simpan_perusahaan').on('click', function(){
        
        if (!$("#perusahaan_nama").val()) {
            $.toast({
                text: 'NAMA PERUSAHAAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#perusahaan_nama").focus();
            return false;

        } else if (!$("#perusahaan_grup").val()) {
            $.toast({
                text: 'GRUP PERUSAHAAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#perusahaan_grup").focus();
            return false;

        } else if (!$("#perusahaan_alamat").val()) {
            $.toast({
                text: 'ALAMAT PERUSAHAAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#perusahaan_alamat").focus();
            return false;
        }
        
       
        var id                  = $('#id_perusahaan').val();
        var perusahaan_nama     = $('#perusahaan_nama').val();
        var perusahaan_grup     = $('#perusahaan_grup').val();
        var perusahaan_alamat   = $('#perusahaan_alamat').val();
        var token               = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('id', id);
        formData.append('perusahaan_nama', perusahaan_nama);
        formData.append('perusahaan_grup', perusahaan_grup);
        formData.append('perusahaan_alamat', perusahaan_alamat);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('perusahaan.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                if (r.status == '1') {
                    swal("Berhasil!", "Data Berhasil Update", "success");
                    reset_perusahaan();
                    view_perusahaan();
                    combo_perusahaan();
                    combo_perusahaan_ibu();

                } else if (r.status == '2'){
                    swal("Berhasil!", "Data Berhasil Simpan", "success");
                    reset_perusahaan();
                    view_perusahaan();
                    combo_perusahaan();
                    combo_perusahaan_ibu();

                }
                $('#formModalPerusahaan').modal('hide')
            }
        });
    
        return false;

    });

    $('#show_data_perusahaan').on('click','.btn_perusahaan_edit',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('perusahaan.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(r) {
                data = r.data;

                console.log(data);

                $('#formModalPerusahaan').find('[name="id_perusahaan"]').val(r.peru_id);
                $('#formModalPerusahaan').find('[name="perusahaan_nama"]').val(r.peru_nama);
                $('#formModalPerusahaan').find('[name="perusahaan_grup"]').val(r.grup_id).trigger("change");
                $('#formModalPerusahaan').find('[name="perusahaan_alamat"]').val(r.peru_alamat);

            }
        });

        return false;

    });

    $('#show_data_perusahaan').on('click','.btn_perusahaan_aktif',function(){
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
                    url   : "{{ route('perusahaan.aktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        $('#formModalPerusahaan').modal('hide');
                        reset_perusahaan();
                        view_perusahaan();
                        combo_perusahaan();
                        combo_perusahaan_ibu();
                    }
                });  
            }
        });
    });

    $('#show_data_perusahaan').on('click','.btn_perusahaan_nonaktif',function(){
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
                    url   : "{{ route('perusahaan.nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Non-Aktifkan !!.", "success");
                        $('#formModalPerusahaan').modal('hide')
                        reset_perusahaan();
                        view_perusahaan();
                        combo_perusahaan();
                        combo_perusahaan_ibu();
                    }
                });  
            }
        });
    });



    /*-- AYAH --*/

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
                    html = '<option value='+(data[i].prov_id)+'>'+(data[i].pro_nama)+'</option>';
                    $('select[name=provinsi]').append(html)
                }
            }
        });
    }

    /*-- IBU --*/

    function combo_kecamatan_ibu(kota){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kecamatan') }}",
            async : false,
            data : {kota:kota},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_kecamatan]').empty()
                    var x = document.getElementById("ibu_kecamatan");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kec_id)+'>'+(data[i].kec_nama)+'</option>';
                    $('select[name=ibu_kecamatan]').append(html)
                }
            }
        });
    }
    function combo_kota_ibu(provinsi){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kota') }}",
            async : false,
            data : {provinsi:provinsi},
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_kota]').empty()
                    var x = document.getElementById("ibu_kota");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kota_id)+'>'+(data[i].kota_nama)+'</option>';
                    $('select[name=ibu_kota]').append(html)
                }
            }
        });
    }

    function combo_provinsi_ibu(){
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_provinsi') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ibu_provinsi]').empty()
                    var x = document.getElementById("ibu_provinsi");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);

                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].prov_id)+'>'+(data[i].pro_nama)+'</option>';
                    $('select[name=ibu_provinsi]').append(html)
                }
            }
        });
    }


    function combo_anak(){

    $('select[name=jenis]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_anak') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=jenis]').empty()
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].anak_id)+'>'+(data[i].anak_nama)+'</option>';
                        $('select[name=jenis]').append(html)
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

    function combo_ortu(){

         $('select[name=ortu]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_ortu') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=ortu]').empty()
                        var x = document.getElementById("ortu");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].ortu_id)+'>'+(data[i].ortu_ayah)+' - '+(data[i].ortu_ibu)+'</option>';
                        $('select[name=ortu]').append(html)
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



</script>


@endsection