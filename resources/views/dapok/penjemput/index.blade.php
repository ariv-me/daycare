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
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title"><i class="mdi mdi-account-multiple-outline"></i> ORANG TUA</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"></i> TAMBAH DATA </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-hover dt-responsive dataTable table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th  style="text-align: center; vertical-align: middle;">NO</th>
                            <th  style="text-align: center; vertical-align: middle;">NAMA</th>
                            <th  style="text-align: center; vertical-align: middle;">HP</th></th>
                            <th  style="text-align: center; vertical-align: middle;">WA</th></th>
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
                <h5 class="modal-title"> <strong>Tambah Data Harga</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama" class="form-control col-md-12">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>Kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori"></select>
                        </div>
                    </div>   
  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Registrasi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="registrasi" id="registrasi" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-3">
                        <label> <strong>Gizi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="gizi" id="gizi" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-3">
                        <label> <strong>Bulanan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="bulanan" id="bulanan" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Pembangunan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="pembangunan" id="pembangunan" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
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
                <h5 class="modal-title"> <strong>Edit Data Harga</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <input type="hidden" name="id_edit" id="id_edit" class="form-control">

                <div class="row">

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama_edit" class="form-control col-md-12">
                        </div>
                    </div> 

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori_edit"></select>
                        </div>
                    </div>  
                 
                    <div class="col-md-12 mb-3">
                        <label> <strong>Registrasi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="registrasi" id="registrasi_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Gizi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="gizi" id="gizi_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Bulanan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="bulanan" id="bulanan_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Pembangunan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="pembangunan" id="pembangunan_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
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

        combo_kategori();
        combo_tarif_jenis();

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

        else if (!$("#kategori").val()) {
            $.toast({
                text: 'kategori HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kategori").focus();
            return false;

        }  else if (!$("#registrasi").val()) {
            $.toast({
                text: 'REGISTRASI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#registrasi").focus();
            return false;

        } else if (!$("#gizi").val()) {
            $.toast({
                text: 'GIZI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#gizi").focus();
            return false;

        } else if (!$("#bulanan").val()) {
            $.toast({
                text: 'BULANAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#bulanan").focus();
            return false;

        } else if (!$("#pembangunan").val()) {
            $.toast({
                text: 'PEMBANGUNAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#pembangunan").focus();
            return false;

        } 

        var nama    = $('#nama').val();
        var kategori    = $('#kategori').val();
        var gizi       = $('#gizi').val();
        var registrasi  = $('#registrasi').val();
        var bulanan     = $('#bulanan').val();
        var pembangunan = $('#pembangunan').val();
        
        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('gizi', gizi);
        formData.append('registrasi', registrasi);
        formData.append('bulanan', bulanan);
        formData.append('pembangunan', pembangunan);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('dapok.ortu.save') }}",
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


    function view_anak(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.anak.view_anak') }}",
            async: true,
            dataType: 'JSON',
            data: {kode:kode},
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data_anak').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="14%">'),
                            $('<td width="7%" align="center">'),
                            $('<td width="7%" align="center">'),
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nama))); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_jekel))); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_tgl_lahir))); 

                        tr.appendTo($('#show_data_anak'));
                    }

                }
               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.ortu.view') }}",
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
                            $('<td width="7%">'),
                            $('<td width="7%">'),
                            $('<td width="20%" align="left">'),
                            $('<td width="5%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].ortu_ayah)+' - <small class="text-muted">(Ayah)</span></small>')); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].ortu_ibu)+' - <small class="text-muted">(Ibu)</span></small>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<small>'+(data[i].ortu_ayah_hp)+' - <span class="text-muted">(Ayah)</span></small>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<small>'+(data[i].ortu_ibu_hp)+' - <span class="text-muted">(Ibu)</span></small>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<small>'+(data[i].ortu_ayah_wa)+' -  <span class="text-muted">(Ayah)</span></small>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<small>'+(data[i].ortu_ibu_wa)+' - <span class="text-muted">(Ibu)</span></small>')); 

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].ortu_alamat)));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<small>'+(data[i].kecamatan)+', '+(data[i].kota)+', '+(data[i].provinsi)+'</small>'));
                        
                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs item_detail" data="'+data[i].ortu_kode+'"><i class="fas fa-info-circle"></i></a><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].ortu_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].ortu_kode+'"><i class="far fa-trash-alt"></i></a></div>');   
                       
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
            url   : "{{ route('dapok.ortu.edit') }}",
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

        $.ajax({
            type : "GET",
            url   : "{{ route('dapok.ortu.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="id_edit"]').val(data.tarif_kode);
                $('#formModalEdit').find('[name="kategori"]').val(data.kat_id).trigger("change");
                $('#formModalEdit').find('[name="nama"]').val(data.tarif_nama);
                $('#formModalEdit').find('[name="gizi"]').val(data.tarif_gizi);
                $('#formModalEdit').find('[name="registrasi"]').val(data.tarif_reg);
                $('#formModalEdit').find('[name="bulanan"]').val(data.tarif_spp);
                $('#formModalEdit').find('[name="pembangunan"]').val(data.tarif_pembg);
              
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

        else if (!$("#kategori_edit").val()) {
            $.toast({
                text: 'kategori HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kategori_edit").focus();
            return false;

        } else if (!$("#registrasi_edit").val()) {
            $.toast({
                text: 'REGISTRASI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#registrasi_edit").focus();
            return false;

        } else if (!$("#gizi_edit").val()) {
            $.toast({
                text: 'REGISTRASI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#gizi_edit").focus();
            return false;

        } else if (!$("#bulanan_edit").val()) {
            $.toast({
                text: 'BULANAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#bulanan_edit").focus();
            return false;

        } else if (!$("#pembangunan_edit").val()) {
            $.toast({
                text: 'PEMBANGUNAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#pembangunan_edit").focus();
            return false;

        } 
      
        var id          = $('#id_edit').val();
        var nama        = $('#nama_edit').val();
        var kategori    = $('#kategori_edit').val();
        var gizi        = $('#gizi_edit').val();
        var registrasi  = $('#registrasi_edit').val();
        var bulanan     = $('#bulanan_edit').val();
        var pembangunan = $('#pembangunan_edit').val();

        var token = $('[name=_token]').val();
        var formData = new FormData();

        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('gizi', gizi);
        formData.append('registrasi', registrasi);
        formData.append('bulanan', bulanan);
        formData.append('pembangunan', pembangunan);
        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('dapok.ortu.update') }}",
            dataType : "JSON",
            data : formData,
            cache : false,
            processData : false,
            contentType : false,
            success: function(data){
                $('#formModalEdit').modal('hide');
                swal("Berhasil!", "Data Berhasil Diupdate", "success");
                view();
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
                    url   : "{{ route('dapok.ortu.aktif') }}",
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
                    url   : "{{ route('dapok.ortu.nonaktif') }}",
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

    function combo_kategori(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_tarif_kategori') }}",
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

    
    /*-- FORMAT RUPIAH --*/

    var registrasi_rupiah  = document.getElementById('registrasi');
    var bulanan_rupiah     = document.getElementById('bulanan');
    var pembangunan_rupiah = document.getElementById('pembangunan');
    
	registrasi_rupiah.addEventListener('keyup', function(e)
	{
		registrasi_rupiah.value = formatRupiah(this.value);
	});

	bulanan_rupiah.addEventListener('keyup', function(e)
	{
		bulanan_rupiah.value = formatRupiah(this.value);
	});

	pembangunan_rupiah.addEventListener('keyup', function(e)
	{
		pembangunan_rupiah.value = formatRupiah(this.value);
	});

    var registrasi_rupiah_edit  = document.getElementById('registrasi_edit');
    var bulanan_rupiah_edit     = document.getElementById('bulanan_edit');
    var pembangunan_rupiah_edit = document.getElementById('pembangunan_edit');
    
	registrasi_rupiah_edit.addEventListener('keyup', function(e)
	{
		registrasi_rupiah_edit.value = formatRupiah(this.value);
	});

	bulanan_rupiah_edit.addEventListener('keyup', function(e)
	{
		bulanan_rupiah_edit.value = formatRupiah(this.value);
	});

	pembangunan_rupiah_edit.addEventListener('keyup', function(e)
	{
		pembangunan_rupiah_edit.value = formatRupiah(this.value);
	});


    function formatRupiah(angka, prefix)
	{

		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}


    
</script>


@endsection