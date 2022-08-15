@extends('app.layouts.template')

@section('css')

    <style>
        .form-control:disabled, .form-control[readonly] {
            background-color: #fafcfe;
            opacity: 1;
        }
    </style>

@endsection

@section('content')

<div class="row mt-3">
    {{-- <div class="col-xl-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-clipboard-list"></i> PENDAFTARAN</h4>
            </div>
            <div class="card-body">
               
            </div>
        </div>
    </div> --}}

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-clipboard-list"></i> PENDAFTARAN</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="state"><strong>Jenis Pendaftaran</strong> <span class="text-danger">*</span> </label>
                                <div class="input-group mb-2">
                                    <select class="form-control custom-select select2" style="width: 100%;" name="daftar_jenis" id="daftar_jenis"></select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="state"><strong>Petugas</strong> <span class="text-danger">*</span> </label>
                                <div class="input-group">
                                    <div class="input-group-prepend text-info">
                                        <span class="input-group-text"><i class="far fa-user"></i></span>
                                    </div>
                                    <input type="text" id="kar_nama" name="kar_nama" value="{{ $app['kar_nama_awal'] }}" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-12 mt-1">
                                {{-- <label for="state"><strong>Keterangan</strong> <span class="text-danger">*</span> </label> --}}
                                <div class="input-group mb-1">
                                    <textarea id="ket" name="ket" class="form-control" maxlength="225" rows="4" placeholder="Keterangan......"></textarea>
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
                                        <input type="hidden" class="form-control" id="ortu" name="ortu" disabled="disabled">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <label for="state"><strong>Anak</strong> <span class="text-danger">*</span> </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="daftar_anak" name="daftar_anak" disabled="disabled">
                                                    <span class="input-group-append">
                                                        <button type="button" class="btn btn-success " id="btn_view_anak"> <i class="fa fa-search"></i> </button>
                                                        <button type="button" class="btn btn-info " id="btn_add_anak"> <i class="fa fa-plus"></i> </button>
                                                    </span>
                                                </div>
                                            </div>
        
                                            <div class="col-sm-6 mb-3">
                                                <label for="state"><strong>Orang Tua</strong> <span class="text-danger">*</span> </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="daftar_ortu" name="daftar_ortu" readonly="readonly">
                                                    <span class="input-group-append">
                                                        <button type="button" class="btn btn-info " id="btn_add_ortu"> <i class="fa fa-plus"></i> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="state"><strong>Perusahaan</strong> <span class="text-danger">*</span> </label>
                                                <div class="input-group mb-1">
                                                    <select class="form-control custom-select select2" style="width: 100%;" name="perusahaan" id="perusahaan"  onchange="showFilterPerusahaan(this)"></select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="state"><strong>Paket</strong> <span class="text-danger">*</span> </label>
                                                <div class="input-group mb-1">
                                                    <select class="form-control custom-select select2" style="width:100%;" name="jenis" id="jenis"  onchange="showFilterJenis(this)"></select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="table-responsive mb-2 mt-2">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0 table-centered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th width="5%" style="text-align: center; vertical-align: middle;" rowspan="2"  >NO</th>
                                                            <th width="10%" style="text-align: center; vertical-align: middle;" rowspan="2"  >KODE</th>
                                                            <th  style="text-align: center" colspan="6">BIAYA</th>
                                                        </tr>
                                                        <tr>
                                                            <th width="10%" style="text-align: center">REG</th>
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
                                            <button type="submit" class="btn btn-success btn-sm" id="btn_daftar">
                                                <i class="fas fa-save"></i> DAFTAR
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div> 
    </div>

  
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th style="text-align: left">#</th>
                                <th style="text-align: center">NIS</th>
                                <th style="text-align: center">NAMA</th>
                                <th style="text-align: center">REGISTRASI</th>
                                <th style="text-align: center">SPP</th>
                                <th style="text-align: center">PEMBANGUNAN</th>
                                <th style="text-align: center">TOTAL</th>
                                <th style="text-align: center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="show_data_detail">
                            
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8">
                
                    </div>
                    <div class="col-md-4 mt-1" style="text-align: right">
                            <h1 class="text-danger" style="text-align: right"><strong>Rp.</strong><strong id="total"></strong></h1>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-9">
                       
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <a href="{{ route('pendaftaran.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> BATAL</a>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" id="btn_simpan"><i class="fas fa-cart-plus"></i> SIMPAN </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--******************* Modal Add ********************-->
<div class="modal fade  bd-example" id="formModalOrtu">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Tambah Data Orang Tua</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-sm-12s mb-3">
                        <label for="state"><strong>Nama Ayah</strong> <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="ayah" name="ayah">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12s mb-3">
                        <label for="state"><strong>Nama Ibu</strong> <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="ibu" name="ibu">
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" id="btn_simpan_ortu"> <i class="fa fa-save"></i> SIMPAN</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example" id="formModalViewOrtu">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Data Orang Tua</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="datatable" class="table table-bordered mb-0 table-centered">
                    <thead class="thead-light">
                    <tr>
                        <th width="2%" style="text-align: center">NO</th>
                        <th width="49%" style="text-align: center">AYAH</th>
                        <th width="49%" style="text-align: center">IBU</th>
                    </tr>
                    </thead>
                    <tbody id="show_data_ortu">
                    
                    </tbody>
                </table><!--end /table-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example" id="formModalAnak">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Tambah Data Anak</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-sm-12s mb-3">
                        <label for="state"><strong>Orang Tua</strong> <span class="text-danger">*</span> </label>
                        <select class="form-control custom-select select2" style="width: 100%;" name="ortu_id" id="ortu_id"></select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12s mb-3">
                        <label for="state"><strong>Nama Anak</strong> <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="anak" name="anak">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12s mb-3">
                        <label for="state"><strong>Tanggal Lahir</strong> <span class="text-danger">*</span> </label>
                        <input type="date" class="form-control datepicker" id="anak_lahir" name="anak_lahir">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12s mb-3">
                        <label for="state"><strong>Jenis Kelamin</strong> <span class="text-danger">*</span> </label>
                        <select class="form-control custom-select select2" style="width: 100%;" name="anak_jekel" id="anak_jekel"></select>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" id="btn_simpan_anak"> <i class="fa fa-save"></i> SIMPAN</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal-lg" id="formModalViewAnak">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Tambah Data Anak</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="datatable2" class="table table-bordered mb-0 table-centered">
                    <thead class="thead-light">
                    <tr>
                        <th width ="2%" style="text-align: center">NO</th>
                        <th width ="15%" style="text-align: center">NIS</th>
                        <th width ="48%" style ="text-align: center">ANAK</th>
                        <th width ="10%" style ="text-align: center">USIA</th>
                        <th width ="20%" style ="text-align: center">TGL LAHIR</th>
                    </tr>
                    </thead>
                    <tbody id="show_data_anak">
                    
                    </tbody>
                </table><!--end /table-->
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();
            combo_jenis();
            combo_pekerjaan();
            combo_perusahaan();
            combo_daftar_jenis();
            view_tarif();
            view_daftar();
            reset();

    });

    function reset() {
        $('#daftar_anak').val("");
        $('#daftar_nis').val("");
        $('#anak_nama').val("");
        $('#anak_tmp_lahir').val("");
        $('#anak_tgl_lahir').val("");
        $('#anak_jekel').val("");
        $('#anak_ke').val("");
        $('#jml_saudara').val("");
        $('#ortu_nama').val("");
        $('#ortu_pekerjaan').val("");
        $('#ortu_hp').val("");
        $('#ortu_alamat').val("");
        $('#harga_jual').val("");

        $('#ayah').val("");
        $('#ibu').val("");

        $('#id_edit_detail').val("");
        $('#anak').val("");
        $('#nis').val("");
        $('#daftar_ortu').val("");
        $('#ortu').val("").val("").trigger("change");
        $('#anak_lahir').val("").val("").trigger("change");
        $('#anak_jekel').val("").val("").trigger("change");
        $('#daftar_jenis').val("").val("").trigger("change");
        $('#perusahaan').val("").val("").trigger("change");
        $('#jenis').val("").val("").trigger("change");
    }

    $('#btn_add_ortu').on('click',function(){

        $('#formModalOrtu').modal('show');
        reset();

    });

    $('#btn_add_anak').on('click',function(){

        $('#formModalAnak').modal('show');
        combo_ortu();
        combo_jekel();
        reset();

    });

    $('#btn_view_ortu').on('click', function() {
        $('#formModalViewOrtu').modal('show');
        view_ortu();
    });

    $('#btn_view_anak').on('click', function() {
        $('#formModalViewAnak').modal('show');
        view_anak();
    });

    function view_daftar(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.view_detail') }}",
            async: true,
            data : {kode:kode},
            dataType: 'JSON',
            success: function(r) {
                var i;
        
                $('#show_data_detail').empty();
                data = r.data;
                total = r.total;

                document.getElementById("total").innerHTML="<b>"+total+"</b>"; 


                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="2%">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="20%" align="left">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="center">'),
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nis)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].registrasi)));  

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].spp)));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].pembangunan)));   

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].total)));   

                        tr.find('td:nth-child(8)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs btn_edit_detail" data="'+data[i].detail_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs btn_delete_detail" data="'+data[i].detail_id+'"><i class="fas fa-trash"></i></a></div>');   


                        tr.appendTo($('#show_data_detail'));
                    }

                } else {

                    $('#show_data_detail').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
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
                            .html('<strong></strong>' +(data[i].anak_usia) + ' Tahun'));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<strong></strong>' +(moment(data[i].anak_tgl_lahir).format('DD-MM-YYYY')))); 
                    
                        tr.appendTo($('#show_data_anak'));
                    }

                } else {

                      $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                  }
                $('#datatable2').DataTable('refresh'); 
            }
        });
    
    }
    
    function showFilterPerusahaan(select){
        var filter_perusahaan=$('#perusahaan').val();
        var filter_jenis=$('#jenis').val();
        
        view_tarif(filter_perusahaan,filter_jenis);
    }

    function showFilterJenis(select){
        var filter_perusahaan=$('#perusahaan').val();
        var filter_jenis=$('#jenis').val();

        view_tarif(filter_perusahaan,filter_jenis);
    }

    function view_tarif(filter_perusahaan,filter_jenis) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.view') }}",
            async: true,
            data : {perusahaan:filter_perusahaan,jenis:filter_jenis},
            dataType: 'JSON',
            success: function(r) {
                var i;

                $('#show_data_tarif').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="5%" align="center">'),
                            $('<td width="20%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].kode)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].reg_tampil)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].spp_tampil)));  

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].tahun)));

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].total_spp_tampil)));

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].pembangunan_tampil)));  

                        tr.find('td:nth-child(8)').append($('<div>')
                            .html((data[i].total_bayar)));   

                        // tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-rounded btn-info btn-xs item_pilih" data="'+data[i].tarif_nis+'">PILIH</a></div>'); 

                        tr.appendTo($('#show_data_tarif'));
                    }

                } else {

                       $('#show_data_tarif').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }

            }
        });
    }

    $('#show_data_detail').on('click','.btn_edit_detail',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('pendaftaran.edit_detail') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(r) {
                data = r.data;

                console.log(data);

                $('[name="id_edit_detail"]').val(data.detail_id);
                $('[name="nis"]').val(data.anak_nis);
                $('[name="ortu"]').val(data.ortu_id);
                $('[name="daftar_anak"]').val(data.anak_nama);
                $('[name="daftar_ortu"]').val(data.ortu_ayah);
                $('[name="perusahaan"]').val(data.grup_id).trigger("change");
                $('[name="daftar_jenis"]').val(data.detail_blm).trigger("change");
                $('[name="jenis"]').val(data.jenis_id).trigger("change");

            }
        });

        return false;

    });

    $('#show_data_detail').on('click','.btn_delete_detail',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('pendaftaran.delete_detail') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {

                $.toast({
                        text: 'DATA DI HAPUS',
                        position: 'top-right',
                        loaderBg: '#ffcc00',
                        icon: 'success',
                        hideAfter: 3000
                });

                view_daftar();

            }
        });

        return false;

    });


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

                $('[name="ortu"]').val(data.ortu_id);
                $('[name="daftar_ortu"]').val(data.ortu_ayah);

                $('#formModalViewOrtu').modal('hide');
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

                $('[name="nis"]').val(data.anak_nis);
                $('[name="daftar_anak"]').val(data.anak_nama);
                $('[name="ortu"]').val(data.ortu_id);
                $('[name="daftar_ortu"]').val(data.ortu_ayah);


                $('#formModalViewAnak').modal('hide');
            }
        });

        return false;

    });


    $('#show_data_anak').on('click','.item_pilih',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('anak.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {

                
                $('[name="daftar_nis"]').val(data.anak_nis);
                $('[name="daftar_anak"]').val(data.anak_nama);

                $('#formModalAnak').modal('hide');
            }
        });

        return false;

    });

    $('#btn_simpan_ortu').on('click', function(){

        if (!$("#ayah").val()) {
            $.toast({
                text: 'NAMA AYAH HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#ayah").focus();
            return false;

        } else if (!$("#ibu").val()) {
            $.toast({
                text: 'NAMA IBU HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ibu").focus();
            return false;

        } 

        var ayah            = $('#ayah').val();
        var ibu             = $('#ibu').val();

        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('ayah', ayah);
        formData.append('ibu', ibu);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('ortu.save_daftar') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                    //view_ortu();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalOrtu').modal('hide');
                    reset();
            
            }
        });

        return false;

    });

    $('#btn_simpan_anak').on('click', function(){

        if (!$("#ortu_id").val()) {
            $.toast({
                text: 'ORANG TUA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#ortu_id").focus();
            return false;

        } else if (!$("#anak").val()) {
            $.toast({
                text: 'NAMA ANAK HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak").focus();
            return false;

        } else if (!$("#anak_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_lahir").focus();
            return false;

        } else if (!$("#anak_jekel").val()) {
            $.toast({
                text: 'TANGGAL LAHIR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#anak_jekel").focus();
            return false;

        } 

        var ortu            = $('#ortu_id').val();
        var anak            = $('#anak').val();
        var anak_lahir      = $('#anak_lahir').val();
        var anak_jekel      = $('#anak_jekel').val();

        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('ortu', ortu);
        formData.append('anak', anak);
        formData.append('anak_lahir', anak_lahir);
        formData.append('anak_jekel', anak_jekel);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('anak.save_daftar') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                    //view_ortu();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalAnak').modal('hide');
                    combo_ortu();
                    reset();
            
            }
        });

        return false;

    });



    $('#btn_daftar').on('click', function(){

    if (!$("#daftar_jenis").val()) {
        $.toast({
            text: 'JENIS PENDAFTARAN HARUS DI ISI',
            position: 'top-right',
            loaderBg: '#fff716',
            icon: 'error',
            hideAfter: 3000
        });
        $("#daftar_jenis").focus();
        return false;

    } else if (!$("#daftar_anak").val()) {
        $.toast({
            text: 'NAMA ANAK HARUS DI ISI',
            position: 'top-right',
            loaderBg: '#fff716',
            icon: 'error',
            hideAfter: 3000
        });
        $("#daftar_anak").focus();
        return false;

    } else if (!$("#perusahaan").val()) {
        $.toast({
            text: 'PILIH PERUSAHAAN',
            position: 'top-right',
            loaderBg: '#fff716',
            icon: 'error',
            hideAfter: 3000
        });
        $("#perusahaan").focus();
        return false;

    } else if (!$("#jenis").val()) {
        $.toast({
            text: 'PILIH PAKET',
            position: 'top-right',
            loaderBg: '#fff716',
            icon: 'error',
            hideAfter: 3000
        });
        $("#jenis").focus();
        return false;

    }
    
    var daftar_jenis     = $('#daftar_jenis').val();
    var daftar_nis       = $('#nis').val();
    var daftar_anak      = $('#daftar_anak').val();
    var perusahaan       = $('#perusahaan').val();
    var jenis            = $('#jenis').val();

    console.log(daftar_anak);
    
    var token = $('[name=_token]').val();

    var formData = new FormData();

        formData.append('daftar_jenis', daftar_jenis);
        formData.append('daftar_nis', daftar_nis);
        formData.append('daftar_anak', daftar_anak);
        formData.append('perusahaan', perusahaan);
        formData.append('jenis', jenis);

        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('pendaftaran.save_detail') }}",
            dataType : "JSON",
            data : formData,
            cache : false,
            processData : false,
            contentType : false,
            success: function(r){

               if (r.status == '1') {

                    $.toast({
                        text: 'BERHASIL',
                        position: 'top-right',
                        loaderBg: '#ffcc00',
                        icon: 'success',
                        hideAfter: 3000
                    });

                    reset();
                    view_daftar();

                } else if (r.status == '2') {

                    $.toast({
                        text: 'BERHASIL',
                        position: 'top-right',
                        loaderBg: '#ffcc00',
                        icon: 'success',
                        hideAfter: 3000
                    });

                    reset();
                    view_daftar();
                }

            }
        });
        return false;

    });

    $('#btn_simppan').on('click', function(){    

        var total = $('#total').text();

        if ( total == "0") {
            $.toast({
                text: 'TRANSAKSI TIDAK ADA',
                position: 'top-left',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#barang_kode").focus();
            return false;

        } else {

            var total = $('#total').text();
            var bayar = $('#total_bayar').val("0");

            $('[name="total_trans"]').val(total);

            var ttotal = total.replace(/\./g,'');
            var tbayar = 0;
            var tkembali = tbayar - ttotal;

            var reverse = tkembali.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');

            var str1 = "- ";
            var str2 = ribuan;
            var xkembali = str1.concat(str2);

            $('[name="total_kembali"]').val(xkembali);

            $('[name="total_bayar"]').val(tbayar);

            //combo_jenis_bayar();
            $('#formModalBayar').modal('show');
        }    
    });


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
                    var x = document.getElementById("jenis");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].jenis_id)+'>'+(data[i].jenis_nama)+'</option>';
                        $('select[name=jenis]').append(html)
                    }
                }
            });

    }

    function combo_jekel(){

        $('select[name=anak_jekel]').empty()
            var html = '';
            html = '<option value="">--Pilih--</option>'+
                    '<option value="L">Laki-Laki</option>'+
                   '<option value="P">Perempuan</option>';
        $('select[name=anak_jekel]').append(html)

    }

    function combo_daftar_jenis(){

        $('select[name=daftar_jenis]').empty()
            var html = '';
            html = '<option value="">--Pilih--</option>'+
                    '<option value="B">BARU</option>'+
                   '<option value="L">LAMA</option>';
        $('select[name=daftar_jenis]').append(html)

    }

    function combo_pekerjaan(){

        $('select[name=ortu_pekerjaan]').empty()
            var html = '';
            html = '<option value="">--Pilih--</option>'+
                   '<option value="1">PNS</option>'+
                   '<option value="2">BUMN</option>';
                   '<option value="3">Swasta</option>';
                   '<option value="4">Wirausaha</option>';
                   '<option value="5">Lainnya</option>';
        $('select[name=ortu_pekerjaan]').append(html)

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

        $('select[name=perusahaan]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_perusahaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=perusahaan]').empty()
                var x = document.getElementById("perusahaan");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=perusahaan]').append(html)
                }
            }
        });

    }

    function combo_ortu(){

    $('select[name=ortu_id]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_ortu') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ortu_id]').empty()
                    var x = document.getElementById("ortu_id");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].ortu_id)+'>'+(data[i].ortu_ayah)+' - '+(data[i].ortu_ibu)+'</option>';
                    $('select[name=ortu_id]').append(html)
                }
            }
        });

    }
    
                        



</script>


@endsection