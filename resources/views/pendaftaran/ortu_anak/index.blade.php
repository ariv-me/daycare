@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title"><i class="fas fa-clipboard-list"></i>  DATA POKOK</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">   
                {!! csrf_field() !!} 
                <input type="hidden" id="id_edit" name="id_edit" class="form-control">
               <div class="row">
                    <div class="col-lg-6">
                        <h4>AYAH</h4>
                        <p class="text-muted mb-3">Form Input Data Ayah</p>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Ayah</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="ayah_nama" name="ayah_nama">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_ortu"> <i class="fa fa-search"></i> </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label text-right">  Tanggl Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control datepicker" id="ayah_lahir" name="ayah_lahir">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right"> Agama</label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select select2" style="width: 100%;" name="ayah_agama" id="ayah_agama"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Pekerjaan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="form-control custom-select select2" id="ayah_kerja" name="ayah_kerja"></select>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_kerja"> <i class="fa fa-plus"></i> </button>
                                    </span>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Perusahaan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="form-control custom-select select2" id="ayah_perusahaan" name="ayah_perusahaan"></select>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_peru"> <i class="fa fa-plus"></i> </button>
                                    </span>
                                </div>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-2 col-form-label text-right">Nomor HP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ayah_hp" name="ayah_hp" onkeypress="return angka(this, event)">
                            </div>
                            <label for="example-number-input" class="col-sm-2 col-form-label text-right">Nomor WA</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ayah_wa" name="ayah_wa" onkeypress="return angka(this, event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ayah_alamat" name="ayah_alamat">
                            </div>
                        </div> 
                    </div>

                    <div class="col-lg-6">
                        <h4>IBU</h4>
                        <p class="text-muted mb-3">Form Input Data Ibu</p>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ibu_nama" name="ibu_nama" data-dtp="dtp_1uPaU">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label text-right"> Tanggl Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control datepicker" id="ibu_lahir" name="ibu_lahir">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right"> Agama</label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select select2" style="width: 100%;" name="ibu_agama" id="ibu_agama"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Pekerjaan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="form-control custom-select select2" id="ibu_kerja" name="ibu_kerja"></select>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_kerja"> <i class="fa fa-plus"></i> </button>
                                    </span>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Perusahaan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="form-control custom-select select2" id="ibu_perusahaan" name="ibu_perusahaan"></select>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_peru"> <i class="fa fa-plus"></i> </button>
                                    </span>
                                </div>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-2 col-form-label text-right">Nomor HP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ibu_hp" name="ibu_hp" onkeypress="return angka(this, event)">
                            </div>
                            <label for="example-number-input" class="col-sm-2 col-form-label text-right">Nomor WA</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ibu_wa" name="ibu_wa" onkeypress="return angka(this, event)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ibu_alamat" name="ibu_alamat">
                            </div>
                        </div>  
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-9">
                    
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-danger btn-sm me-1" id="btn_reset" >
                            <i class="fas fa-times"></i> BATAL
                        </button>
                        <button type="submit" class="btn btn-success btn-sm" id="btn_simpan_ortu">
                            <i class="fas fa-save"></i> SIMPAN
                        </button>
                    </div>
                </div>

                <hr class="hr-dashed">

                <div class="lg-12">
                    <h4>ANAK</h4>
                    <p class="text-muted mb-3">Form Input Data Anak</p>
                </div> 
                <div class="row">
                    {!! csrf_field() !!} 
                    <input type="hidden" id="id_edit_anak" name="id_edit_anak" class="form-control">

                    <div class="col-lg-6">

                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label text-right">Orang Tua</label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select select2" style="width: 100%;" name="ortu" id="ortu"></select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label text-right">Jenis Kelamin</label>
                            <div class="col-sm-4">
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak_jekel" id="anak_jekel"></select>
                            </div>
                            <label for="example-month-input" class="col-sm-2 col-form-label text-right">Taggal Lahir</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="anak_tgl_lahir" name="anak_tgl_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-time-input" class="col-sm-2 col-form-label text-right">Anak Ke</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)">
                            </div>
                            <label for="example-time-input" class="col-sm-2 col-form-label text-right">Jumlah Saudara</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="anak_saudara" name="anak_saudara" value="0" onkeypress="return angka(this, event)">
                            </div>
                        </div>
                    </div>


                  <div class="col-lg-6">

                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-2 col-form-label text-right">Nama</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="anak_nama" name="anak_nama">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="btn_anak"> <i class="fa fa-search"></i> </button>
                                    </span>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="example-week-input" class="col-sm-2 col-form-label text-right">Tempat Lahir</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="anak_tmp_lahir" name="anak_tmp_lahir">
                            </div>
                            <label for="example-time-input" class="col-sm-2 col-form-label text-right">Agama</label>
                            <div class="col-sm-4">
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak_agama" id="anak_agama"></select>
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="example-time-input" class="col-sm-2 col-form-label text-right">Berat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="anak_berat" name="anak_berat" onkeypress="return angka(this, event)">
                            </div>
                            <label for="example-time-input" class="col-sm-2 col-form-label text-right">Tinggi</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="anak_tinggi" name="anak_tinggi" onkeypress="return angka(this, event)">
                            </div>
                        </div>    
                    </div>
                  </div>
                <hr class="hr-dashed">
                <div class="row">
                    <div class="col-md-9">
                    
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-danger btn-sm me-1" id="btn_reset" >
                            <i class="fas fa-times"></i> BATAL
                        </button>
                        <button type="submit" class="btn btn-success btn-sm" id="btn_simpan_anak">
                            <i class="fas fa-save"></i> SIMPAN
                        </button>
                    </div>
                </div>
                </div>
                
        </div>
    </div>

</div>

<div class="modal modal-default-modal-lg fade" id="formModalOrtu">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #ffffff">

            <div class="modal-body">
            
                <table id="datatable" class="table table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th width ="2%" style="text-align: center">NO</th>
                            <th width ="49%" style="text-align: center">AYAH</th>
                            <th width ="49%" style ="text-align: center">IBU</th>

                        </tr>
                    </thead>
                    <tbody id="show_data_ortu"></tbody>
                </table>

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

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();

        combo_ayah_agama();
        combo_ibu_agama();
        combo_anak_agama();
        combo_anak_jekel();
        combo_ortu();
        combo_anak();
        combo_jenis();
        combo_wali_jekel();
        combo_perusahaan();
        combo_perusahaan_ibu();
        combo_kerja_ayah();
        combo_kerja_ibu();
        view();
        view_ortu();
        view_anak();
        reset();

    });

    function reset() {
        $('#ayah_nama').val("");
        $('#ayah_lahir').val("").trigger("change");
        $('#ayah_kerja').val("").trigger("change");
        $('#ayah_perusahaan').val("").trigger("change");
        $('#ayah_agama').val("").trigger("change");
        $('#ayah_hp').val("");
        $('#ayah_wa').val("");
        $('#ayah_alamat').val("");
        $('#ibu_nama').val("");
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

    }

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_cari').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });

    $('#btn_ortu').on('click',function(){

        $('#formModalOrtu').modal('show');
        view_ortu();

    });

    $('#btn_anak').on('click',function(){

        $('#formModalAnak').modal('show');
        view_anak();

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
                                $('<td class= width="15%" align="left">')
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
                            .html('<a href="javascript:;" class="btn_edit_anak" data="'+data[i].anak_nis+'">'+(data[i].anak_nis)+'</a>')); 
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<a href="javascript:;" class="btn_edit_anak" data="'+data[i].anak_nis+'">'+(data[i].anak_nama)+'</a>')); 
                        
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<strong></strong>' +(data[i].usia)));     

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<strong></strong>' +(data[i].anak_tgl_lahir))); 
                     
                        tr.appendTo($('#show_data_anak'));
                    }

                } //else {

                //       $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                //  }
                $('#datatable2').DataTable('refresh'); 
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

                $('[name="id_edit_anak"]').val(data.anak_nis);
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
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu").focus();
            return false;

        } else if (!$("#anak_nama").val()) {
            $.toast({
                text: 'NAMA ANAK MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_nama").focus();
            return false;

        } else if (!$("#anak_jekel").val()) {
            $.toast({
                text: 'JENIS KELAMIN MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_jekel").focus();
            return false;

        } else if (!$("#anak_tgl_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tgl_lahir").focus();
            return false;

        } else if (!$("#anak_tmp_lahir").val()) {
            $.toast({
                text: 'TEMPAT LAHIR MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_tmp_lahir").focus();
            return false;

        } else if (!$("#anak_agama").val()) {
            $.toast({
                text: 'AGAMA MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_agama").focus();
            return false;

        } else if (!$("#anak_ke").val()) {
            $.toast({
                text: 'ANAK KE MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_ke").focus();
            return false;

        } else if (!$("#anak_berat").val()) {
            $.toast({
                text: 'BERAT MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_berat").focus();
            return false;

        } else if (!$("#anak_tinggi").val()) {
            $.toast({
                text: 'TINGGI MASIH KOSONG',
                position: 'top-center',
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
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_nama").focus();
            return false;

        } else if (!$("#ayah_kerja").val()) {
            $.toast({
                text: 'KERJA AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_kerja").focus();
            return false;

        } else if (!$("#ayah_hp").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_hp").focus();
            return false;

        } else if (!$("#ayah_perusahaan").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_perusahaan").focus();
            return false;

        } else if (!$("#ayah_alamat").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ayah_alamat").focus();
            return false;

        } else if (!$("#ibu_nama").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_nama").focus();
            return false;

        } else if (!$("#ibu_kerja").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_kerja").focus();
            return false;

        } else if (!$("#ibu_hp").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_hp").focus();
            return false;

        } else if (!$("#ibu_alamat").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu_alamat").focus();
            return false;
        }
        
        var ayah_nama       = $('#ayah_nama').val();
        var ayah_lahir      = $('#ayah_lahir').val();
        var ayah_kerja      = $('#ayah_kerja').val();
        var ayah_perusahaan = $('#ayah_perusahaan').val();
        var ayah_hp         = $('#ayah_hp').val();
        var ayah_wa         = $('#ayah_wa').val();
        var ayah_alamat     = $('#ayah_alamat').val();
        var ayah_agama     = $('#ayah_agama').val();

        var ibu_nama       = $('#ibu_nama').val();
        var ibu_lahir      = $('#ibu_lahir').val();
        var ibu_kerja      = $('#ibu_kerja').val();
        var ibu_perusahaan = $('#ibu_perusahaan').val();
        var ibu_hp         = $('#ibu_hp').val();
        var ibu_wa         = $('#ibu_wa').val();
        var ibu_alamat     = $('#ibu_alamat').val();
        var ibu_agama     = $('#ibu_agama').val();
        
      

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('ayah_nama', ayah_nama);
        formData.append('ayah_lahir', ayah_lahir);
        formData.append('ayah_kerja', ayah_kerja);
        formData.append('ayah_perusahaan', ayah_perusahaan);
        formData.append('ayah_hp', ayah_hp);
        formData.append('ayah_wa', ayah_wa);
        formData.append('ayah_alamat', ayah_alamat);
        formData.append('ayah_agama', ayah_agama);

        formData.append('ibu_nama', ibu_nama);
        formData.append('ibu_lahir', ibu_lahir);
        formData.append('ibu_kerja', ibu_kerja);
        formData.append('ibu_perusahaan', ibu_perusahaan);
        formData.append('ibu_hp', ibu_hp);
        formData.append('ibu_wa', ibu_wa);
        formData.append('ibu_alamat', ibu_alamat);
        formData.append('ibu_agama', ibu_agama);

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



</script>


@endsection