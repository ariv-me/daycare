@extends('app.layouts.template')


@section('css')
    <style>
        .total-payment .table tbody td, .total-payment table tbody td, .shopping-cart .table tbody td, .shopping-cart table tbody td {
            padding: 3px 10px;
            border-top: 0;
            border-bottom: 1px solid #f1f5fa;
            font-size:11px;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            border: 0;
            border-top: 1px solid #FF9800;
        }
        
    </style>
@endsection

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-success">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title text-white"><i class="mdi mdi-face-recognition"></i>  DATA ANAK</h4>          
                    </div><!--end col-->
                    <div class="col-auto"> 
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"></i> TAMBAH DATA </button>
                    </div><!--end col-->
                </div>
            </div>
        
            <div class="card-body">
                <table id="datatable" class="table table-hover dt-responsive dataTable table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th  style="text-align: center; vertical-align: middle;">NO</th>
                            <th  style="text-align: center; vertical-align: middle;">NAMA</th>
                            <th  style="text-align: center; vertical-align: middle;">JEKEL</th></th>
                            <th  style="text-align: center; vertical-align: middle;">USIA</th></th>
                            <th  style="text-align: center; vertical-align: middle;">ALAMAT</th>
                            <th style="text-align: center; vertical-align: middle;">AKSI</th>
                        </tr>

                    </thead>
                    <tbody id="show_data"></tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="fas fa-info-circle"></i> <strong>Detail</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-payment">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table mb-0">
                                        <input type="hidden" id="detail_ortu_kode"> 
                                        <tbody>
                                            <tr>
                                                <td class="payment-title" width="30%">Ayah</td>
                                                <td>: <span id="detail_ortu_ayah"></span>  </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">NIK</td>
                                                <td>: 
                                                      <span id="detail_ortu_ayah_nik"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Tmp/Tgl Lahir</td>
                                                <td>: <span id="detail_ortu_ayah_tmp_lahir"></span>/<span id="detail_ortu_ayah_tgl_lahir"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Agama</td>
                                                <td>: <span id="detail_ortu_ayah_agama"></span> </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Pekerjaan</td>
                                                <td>: <span id="detail_ortu_ayah_kerja"></span> </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">HP/WA</td>
                                                <td>: <span id="detail_ortu_ayah_hp"></span> </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Pendidikan</td>
                                                <td>: <span id="detail_ortu_ayah_pdk"></span> </td>
                                            </tr>
                                        
                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <div class="col-lg-6">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="payment-title" width="30%">Ayah</td>
                                                <td>: <span id="detail_ortu_ibu"></span>  </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">NIK</td>
                                                <td>: 
                                                      <span id="detail_ortu_ibu_nik"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Tmp/Tgl Lahir</td>
                                                <td>: <span id="detail_ortu_ibu_tmp_lahir"></span>/<span id="detail_ortu_ibu_tgl_lahir"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Agama</td>
                                                <td>: <span id="detail_ortu_ibu_agama"></span> </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Pekerjaan</td>
                                                <td>: <span id="detail_ortu_ibu_kerja"></span> </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">HP/WA</td>
                                                <td>: <span id="detail_ortu_ibu_hp"></span> </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title">Pendidikan</td>
                                                <td>: <span id="detail_ortu_ibu_pdk"></span> </td>
                                            </tr>
                                        
                                        </tbody>
                                    </table><!--end table-->
                                </div>
                               
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="payment-title" width="14%">Alamat</td>
                                                <td>: <span id="detail_alamat"></span>, Kec. <span id="detail_kecamatan"></span>, Kab/Kota. <span id="detail_kota"></span>, Prov. <span id="detail_provinsi"></span> </td>
                                            </tr>                                
                                        </tbody>
                                    </table><!--end table-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>             
            </div>
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-face-recognition"></i> <strong>Anak</strong> </h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="row">                 
                        <table class="table table-sm table-hover dt-responsive nowrap dataTable table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th  style="text-align: center; vertical-align: middle;">NO</th>
                                    <th  style="text-align: center; vertical-align: middle;">NAMA</th>
                                    <th  style="text-align: center; vertical-align: middle;">JEKEL</th>
                                    <th  style="text-align: center; vertical-align: middle;">TGL LAHIR</th></th>
                                </tr>
                            </thead>
                            <tbody id="show_data_anak"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong><i class="fas fa-plus-circle"></i> Data Anak</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama" class="form-control col-md-12">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Jenis Kelamin</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jekel" id="jekel"></select>
                        </div>
                    </div>   

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label> <strong>Tempat Lahir</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control col-md-12">
                        </div>
                    </div>

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label> <strong>Tanggal Lahir</strong>  <small class="text-danger">*</small></label>
                            <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir">
                        </div>
                    </div>
  
                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Anak Ke</strong>  <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)">
                        </div>
                    </div>

                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Saudara</strong>  <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="saudara" name="saudara" value="0" onkeypress="return angka(this, event)">
                        </div>
                    </div>
  
                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Tinggi</strong>  <small class="text-danger">*</small></label>
                            <div class="input-group">  
                                <input type="text" class="form-control" id="tinggi" name="tinggi" onkeypress="return angka(this, event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">Cm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Berat</strong>  <small class="text-danger">*</small></label>
                            <div class="input-group">  
                                <input type="text" class="form-control" id="berat" name="berat" onkeypress="return angka(this, event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Orang Tua</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="ortu" id="ortu"></select>
                        </div>
                    </div>  

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Penjemput</strong> </label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="penjemput" id="penjemput"></select>
                        </div>
                    </div>  
  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" id="btn_save"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong><i class="fas fa-pencil-alt"></i> Data Anak</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">

                    <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama_edit" class="form-control col-md-12">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Jenis Kelamin</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jekel" id="jekel_edit"></select>
                        </div>
                    </div>   

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label> <strong>Tempat Lahir</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="tmp_lahir" id="tmp_lahir_edit" class="form-control col-md-12">
                        </div>
                    </div>

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label> <strong>Tanggal Lahir</strong>  <small class="text-danger">*</small></label>
                            <input type="text" class="form-control datepicker" id="tgl_lahir_edit" name="tgl_lahir">
                        </div>
                    </div>
  
                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Anak Ke</strong>  <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="anak_ke_edit" name="anak_ke" onkeypress="return angka(this, event)">
                        </div>
                    </div>

                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Saudara</strong>  <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="saudara_edit" name="saudara" value="0" onkeypress="return angka(this, event)">
                        </div>
                    </div>
  
                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Tinggi</strong>  <small class="text-danger">*</small></label>
                            <div class="input-group">  
                                <input type="text" class="form-control" id="tinggi_edit" name="tinggi" onkeypress="return angka(this, event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">Cm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-1">
                        <div class="form-group">
                            <label> <strong>Berat</strong>  <small class="text-danger">*</small></label>
                            <div class="input-group">  
                                <input type="text" class="form-control" id="berat_edit" name="berat" onkeypress="return angka(this, event)">
                                <div class="input-group-append">
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Orang Tua</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="ortu" id="ortu_edit"></select>
                        </div>
                    </div>  

                    <div class="col-md-12 mb-1">
                        <div class="form-group">
                            <label> <strong>Penjemput</strong> </label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="penjemput" id="penjemput_edit"></select>
                        </div>
                    </div>  
  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm" id="btn_update"><i class="fas fa-save"></i> UPDATE</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();

        view();
        reset();

    });

    function reset() {
        $('#kategori').val("").trigger("change");;
        $('#jenis').val("").trigger("change");;
        $('#registrasi').val("");
        $('#bulanan').val("");
        $('#pembangunan').val("");
        
    }

    $('#btn_add').on('click',function(){
        combo_ortu();
        combo_penjemput();
        combo_jekel();

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_save').on('click', function(){

        if (!$("#nama").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nama").focus();
            return false;

        }

        else if (!$("#jekel").val()) {
            $.toast({
                text: 'kategori HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#jekel").focus();
            return false;

        }  else if (!$("#tmp_lahir").val()) {
            $.toast({
                text: 'TEMPAT LAHIR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tmp_lahir").focus();
            return false;

        } else if (!$("#tgl_lahir").val()) {
            $.toast({
                text: 'TANGGAL LAHIR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tgl_lahir").focus();
            return false;

        } else if (!$("#anak_ke").val()) {
            $.toast({
                text: 'ANAK KE HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#anak_ke").focus();
            return false;

        } 
        
        else if (!$("#saudara").val()) {
            $.toast({
                text: 'SAUDARA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#saudara").focus();
            return false;

        } 

        else if (!$("#tinggi").val()) {
            $.toast({
                text: 'TINGGI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tinggi").focus();
            return false;

        } 

        else if (!$("#berat").val()) {
            $.toast({
                text: 'BERAT HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#berat").focus();
            return false;

        } 

        var nama        = $('#nama').val();
        var jekel       = $('#jekel').val();
        var tmp_lahir   = $('#tmp_lahir').val();
        var tgl_lahir   = $('#tgl_lahir').val();
        var anak_ke     = $('#anak_ke').val();
        var saudara     = $('#saudara').val();
        var pembangunan = $('#pembangunan').val();
        var tinggi      = $('#tinggi').val();
        var berat       = $('#berat').val();
        var ortu        = $('#ortu').val();
        var penjemput   = $('#penjemput').val();
        
        var token       = $('[name=_token]').val();
        var formData    = new FormData();
    
        formData.append('nama', nama);
        formData.append('jekel', jekel);
        formData.append('tmp_lahir', tmp_lahir);
        formData.append('tgl_lahir', tgl_lahir);
        formData.append('anak_ke', anak_ke);
        formData.append('saudara', saudara);
        formData.append('penjemput', penjemput);
        formData.append('ortu', ortu);
        formData.append('berat', berat);
        formData.append('tinggi', tinggi);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.anak.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                    
                    view();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalAdd').modal('hide');

            }
        });

    return false;

    });


    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.anak.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="14%">'),
                            $('<td width="5%" align="center">'),
                            $('<td width="7%" align="left">'),
                            $('<td width="20%" align="left">'),
                            $('<td width="5%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nama)));

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_jekel)));

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].usia)+' Tahun'));

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].tgl_lahir)+'</small>'));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].ortu_alamat)));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<small>'+(data[i].kecamatan)+', '+(data[i].kota)+', '+(data[i].provinsi)+'</small>'));

                        
                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs item_detail" data="'+data[i].anak_kode+'"><i class="fas fa-info-circle"></i></a><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].anak_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].anak_kode+'"><i class="far fa-trash-alt"></i></a></div>');   
                       
                        tr.appendTo($('#show_data'));
                    }

                }
               $('#datatable').DataTable('refresh'); 
            }
        });
    }


    $('#show_data').on('click','.item_detail',function(){

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('dapok.anak.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(r){

                data = r.data;
                ayah_agama = r.ayah_agama;
                ibu_agama = r.ibu_agama;
                ayah_pdk = r.ayah_pdk;
                ibu_pdk = r.ibu_pdk;
                provinsi = r.provinsi;
                kecamatan = r.kecamatan;
                kota = r.kota;

                $('#formModalDetail').modal('show');
                $('#detail_ortu_kode').val(data.ortu_kode);
                $('#detail_ortu_ayah').text(data.ortu_ayah);
                $('#detail_ortu_ayah_nik').text(data.ortu_ayah_nik);
                $('#detail_ortu_ayah_tmp_lahir').text(data.ortu_ayah_tmp_lahir);
                $('#detail_ortu_ayah_tgl_lahir').text(data.ortu_ayah_tgl_lahir);
                $('#detail_ortu_ayah_kerja').text(data.ortu_ayah_kerja);
                $('#detail_ortu_ayah_agama').text(ayah_agama);
                $('#detail_ortu_ayah_pdk').text(ayah_pdk);
                $('#detail_ortu_ayah_wa').text(data.ortu_ayah_wa);
                $('#detail_ortu_ayah_hp').text(data.ortu_ayah_hp);
 
                $('#detail_ortu_ibu').text(data.ortu_ibu);
                $('#detail_ortu_ibu_nik').text(data.ortu_ibu_nik);
                $('#detail_ortu_ibu_tmp_lahir').text(data.ortu_ibu_tmp_lahir);
                $('#detail_ortu_ibu_tgl_lahir').text(data.ortu_ibu_tgl_lahir);
                $('#detail_ortu_ibu_kerja').text(data.ortu_ibu_kerja);
                $('#detail_ortu_ibu_agama').text(ibu_agama);
                $('#detail_ortu_ibu_pdk').text(ibu_pdk);
                $('#detail_ortu_ibu_wa').text(data.ortu_ibu_wa);
                $('#detail_ortu_ibu_hp').text(data.ortu_ibu_hp);
 
                $('#detail_provinsi').text(provinsi);
                $('#detail_kecamatan').text(kecamatan);
                $('#detail_kota').text(kota);
                $('#detail_alamat').text(data.ortu_alamat);

                var ortu = $('detail_ortu_kode').val();
                // console.log(ortu);
                view_anak(id);
 
            }
        });

        return false;

    });

    $('#show_data').on('click','.item_edit',function(){

        var id=$(this).attr('data');

        combo_ortu();
        combo_penjemput();
        combo_jekel();

        $.ajax({
            type : "GET",
            url   : "{{ route('dapok.anak.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(r){

                data = r.data;

                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="id_edit"]').val(data.anak_kode);
                $('#formModalEdit').find('[name="jekel"]').val(data.anak_jekel).trigger("change");
                $('#formModalEdit').find('[name="nama"]').val(data.anak_nama);
                $('#formModalEdit').find('[name="tmp_lahir"]').val(data.anak_tmp_lahir);
                $('#formModalEdit').find('[name="tgl_lahir"]').datepicker('setDate',moment(data.anak_tgl_lahir).format('DD-MM-YYYY'));
                $('#formModalEdit').find('[name="anak_ke"]').val(data.anak_ke);
                $('#formModalEdit').find('[name="saudara"]').val(data.anak_jml_saudara);
                $('#formModalEdit').find('[name="berat"]').val(data.anak_berat);
                $('#formModalEdit').find('[name="tinggi"]').val(data.anak_tinggi);
                $('#formModalEdit').find('[name="ortu"]').val(data.ortu_kode).trigger("change");
                $('#formModalEdit').find('[name="penjemput"]').val(data.pnj_kode).trigger("change");
              
            }
        });

        return false;

    });

    $('#btn_update').on('click',function(){

        if (!$("#nama_edit").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nama_edit").focus();
            return false;

        }

        else if (!$("#jekel_edit").val()) {
            $.toast({
                text: 'kategori HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#jekel_edit").focus();
            return false;

        }  else if (!$("#tmp_lahir_edit").val()) {
            $.toast({
                text: 'TEMPAT LAHIR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tmp_lahir_edit").focus();
            return false;

        } else if (!$("#tgl_lahir_edit").val()) {
            $.toast({
                text: 'TANGGAL LAHIR HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tgl_lahir_edit").focus();
            return false;

        } else if (!$("#anak_ke_edit").val()) {
            $.toast({
                text: 'ANAK KE HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#anak_ke_edit").focus();
            return false;

        } 
        
        else if (!$("#saudara_edit").val()) {
            $.toast({
                text: 'SAUDARA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#saudara_edit").focus();
            return false;

        } 

        else if (!$("#tinggi_edit").val()) {
            $.toast({
                text: 'TINGGI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tinggi_edit").focus();
            return false;

        } 

        else if (!$("#berat_edit").val()) {
            $.toast({
                text: 'BERAT HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#berat_edit").focus();
            return false;

        } 

        var id          = $('#id_edit').val();
        var nama        = $('#nama_edit').val();
        var jekel       = $('#jekel_edit').val();
        var tmp_lahir   = $('#tmp_lahir_edit').val();
        var tgl_lahir   = $('#tgl_lahir_edit').val();
        var anak_ke     = $('#anak_ke_edit').val();
        var saudara     = $('#saudara_edit').val();
        var pembangunan = $('#pembangunan_edit').val();
        var tinggi      = $('#tinggi_edit').val();
        var berat       = $('#berat_edit').val();
        var ortu        = $('#ortu_edit').val();
        var penjemput   = $('#penjemput_edit').val();
        
        var token       = $('[name=_token]').val();
        var formData    = new FormData();
    
        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('jekel', jekel);
        formData.append('tmp_lahir', tmp_lahir);
        formData.append('tgl_lahir', tgl_lahir);
        formData.append('anak_ke', anak_ke);
        formData.append('saudara', saudara);
        formData.append('penjemput', penjemput);
        formData.append('ortu', ortu);
        formData.append('berat', berat);
        formData.append('tinggi', tinggi);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.anak.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                    
                    view();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalAdd').modal('hide');

            }
        });

    return false;

    });

    $('#show_data').on('click','.item_aktif',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Aktifkan Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Aktifkan !",
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
                        swal("Aktif !", "Data Sudah Di-Aktifkan !!.", "success");
                        view();
                    }
                });  
            }
        });
    });

    $('#show_data').on('click','.item_nonaktif',function(){
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
                        view();
                    }
                });  
            }
        });
    });

    function combo_penjemput(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_dapok_penjemput') }}",
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
                    html = '<option value='+(data[i].kat_id)+'>'+(data[i].kat_nama)+'</option>';
                    $('select[name=penjemput]').append(html)
                }
            }
        });

    }

    function combo_jekel(){

        $('select[name=jekel]').empty()
            var html = '';
            html =  '<option value="">--Pilih--</option>'+
                    '<option value="L">Laki-Laki</option>'+
                    '<option value="P">Perempuan</option>';
        $('select[name=jekel]').append(html)

    }


    function combo_ortu(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_dapok_ortu') }}",
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
                    html = '<option value='+(data[i].ortu_kode)+'>'+(data[i].ortu_ayah)+' - '+(data[i].ortu_ibu)+'</option>';
                    $('select[name=ortu]').append(html)
                }
            }
        });

    }

    function combo_tarif_jenis(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_tarif_jenis') }}",
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

    
   


    
</script>


@endsection