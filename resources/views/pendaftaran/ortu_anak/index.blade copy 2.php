@extends('app.layouts.template')

<style>
    .accordion__header {
        background-color: #f5f5f6;
    }
</style>

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Orang Tua & Anak</h4>
            </div>
            <div class="card-body">
                <div id="accordion-six" class="accordion accordion-with-icon">
                    <div class="accordion__item">
                        <div class="accordion__header" data-toggle="collapse" data-target="#with-icon_collapseOne" aria-expanded="true">
                            <span class="accordion__header--icon"></span>
                            <span class="accordion__header--text">Form Input Data Orang Tua</span>
                            <span class="accordion__header--indicator indicator_bordered"></span>
                        </div>
                        <div id="with-icon_collapseOne" class="accordion__body collapse show" data-parent="#accordion-six" style="">
                            <div class="accordion__body--text">
                                <h6> <strong>Data Ayah</strong></h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name"> <small>Nama Ayah</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ayah_nama" name="ayah_nama">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="name"> <small>Tanggal Lahir</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="date" class="form-control" id="ayah_lahir" name="ayah_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="name"> <small>Pekerjaan</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" id="ayah_kerja" name="ayah_kerja"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state"><small> Perusahaan </small><span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <select class="form-control" style="width: 50%;" name="ayah_perusahaan" id="ayah_perusahaan"></select>
                                            <div class="input-group-append">
                                                <button type="button" id="btn_add" class="btn btn-outline-primary mb-2" data-toggle="modal"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="name"> <small>No HP</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ayah_hp" name="ayah_hp" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-2 mt-1">
                                        <label for="name"> <small>No WA</small></label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ayah_wa" name="ayah_wa" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-2 mt-1">
                                        <label for="name"> <small>Agama</small></label>
                                        <div class="input-group mb-2">
                                            <select class="form-control" id="ayah_agama" name="ayah_agama"></select>
                                        </div>
                                    </div>      
                                    <div class="col-md-6 mb-3">
                                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" rows="1" id="ayah_alamat" name="ayah_alamat">
                                        </div>
                                    </div>      
                                </div>
            
                                <h6> <strong>Data Ibu</strong></h6>
                                <hr>
            
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name"> <small>Nama Ibu</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ibu_nama" name="ibu_nama">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="name"> <small>Tanggal Lahir</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="date" class="form-control" id="ibu_lahir" name="ibu_lahir">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="name"> <small>Pekerjaan</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" id="ibu_kerja" name="ibu_kerja"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state"><small> Perusahaan </small><span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <select class="form-control" style="width: 50%;" name="ibu_perusahaan" id="ibu_perusahaan"></select>
                                            <div class="input-group-append">
                                                <button type="button" id="btn_add" class="btn btn-outline-primary mb-2" data-toggle="modal"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="name"> <small>No HP</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ibu_hp" name="ibu_hp" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-2 mt-1">
                                        <label for="name"> <small class="mt-1">No WA</small></label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ibu_wa" name="ibu_wa" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-2 mt-1">
                                        <label for="name"> <small class="mt-1">Agama</small></label>
                                        <div class="input-group mb-2">
                                            <select class="form-control" id="ibu_agama" name="ibu_agama"></select>
                                        </div>
                                    </div>      
                                    <div class="col-md-6 mb-3">
                                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" rows="1" id="ibu_alamat" name="ibu_alamat">
                                        </div>
                                    </div>    
                                    
                                    
                                </div>
                                <hr>
                                <div class="text-right mt-4">
                                    <button class="btn btn-danger btn-sl-sm" type="button"><span class="mr-2"><i class="fa fa-times" aria-hidden="true"></i></span>Batal</button>      
                                    <button class="btn btn-primary btn-sl-sm mr-2" id="btn_simpan_ortu" type="button"><span class="mr-2"><i class="fa fa-save"></i></span>Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion__item">
                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#with-icon_collapseTwo">
                            <span class="accordion__header--icon"></span>
                            <span class="accordion__header--text">Form Input Data Anak</span>
                            <span class="accordion__header--indicator indicator_bordered"></span>
                        </div>
                        <div id="with-icon_collapseTwo" class="collapse accordion__body" data-parent="#accordion-six">
                            <div class="accordion__body--text">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><small>Orang Tua</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <select class="form-control" style="width: 50%;" name="ortu" id="ortu"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><small>Nama Lengkap</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="anak_nama" name="anak_nama" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name"> <small>Tanggal Lahir</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="anak_tgl_lahir" name="anak_tgl_lahir" required="">
                                        </div>
                                    </div> 
                                    <div class="col-md-2">
                                        <label for="name"> <small>Jenis Kelamin</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="anak_jekel" id="anak_jekel"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"> <small>Tempat Lahir</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="anak_tmp_lahir" name="anak_tmp_lahir" required="">
                                        </div>
                                    </div>   
                                    <div class="col-md-3">
                                        <label for="name"> <small>Anak Ke</small>  <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>
                                    <div class="col-md-3 mt-1">
                                        <label for="name"> <small>Jumlah Saudara</small></span> </label>
                                        <input type="text" class="form-control" id="anak_saudara" name="anak_saudara" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>
                                    <div class="col-md-1 mt-1">
                                        <label for="name"> <small>Berat</small></span> </label>
                                        <input type="text" class="form-control" id="anak_berat" name="anak_berat" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>
                                    <div class="col-md-1 mt-1">
                                        <label for="name"> <small>Tinggi</small></span> </label>
                                        <input type="text" class="form-control" id="anak_tinggi" name="anak_tinggi" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>                                
                                          
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-1">
                                        <label for="name"> <small>Agama</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="anak_agama" id="anak_agama"></select>
                                    </div>
                                    
                                    <div class="col-md-8 mt-1">
                                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="anak_alamat" name="anak_alamat" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right mt-4">
                                    <button class="btn btn-danger btn-sl-sm" type="button"><span class="mr-2"><i class="fa fa-times" aria-hidden="true"></i></span>Batal</button>      
                                    <button class="btn btn-primary btn-sl-sm" id="btn_simpan_anak" type="button"><span class="mr-2"><i class="fa fa-save"></i></span>Simpan</button>
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
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Anak</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    {{-- <table id="datatable" class="display min-w850"> --}}
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Orang Tua</th>
                                <th>HP</th>
                                <th>Anak</th>
                                <th>Jekel</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                    </table>
                </div>
            </div>
        </div> 
    </div>

</div>

@include('pendaftaran.ortu_anak.modal_add')
@include('pendaftaran.baru.modal_anak')
@include('pendaftaran.baru.modal_add_ortu')
@include('pendaftaran.baru.modal_cari_ortu')

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        // $('.datepicker').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });
        // $('.datepicker[name=daftar_tanggal]').val(moment().format('DD-MM-YYYY'));
        // $('.datepicker').datepicker({
        //   autoclose: true,
        //   format:'dd-mm-yyyy',
        // });  

        //$( "#daftar_tanggal" ).datepicker(moment(new Date(),"YYYY-MM-DD").utcOffset(0, true).format());
        $( "#daftar_tanggal" ).datepicker({dateFormat:"DD-MM-YYYY"}).datepicker("setDate",new Date());
        
        var tgl       = $('#daftar_tanggal').val();
        
        console.log(tgl);

        combo_ayah_agama();
        combo_ibu_agama();
        combo_anak_agama();
        combo_anak_jekel();
        combo_ortu();
        combo_blm();
        combo_anak();
        combo_jenis();
        combo_wali_jekel();
        combo_perusahaan();
        combo_perusahaan_ibu();
        combo_kerja_ayah();
        combo_kerja_ibu();
        view();
        reset();

    });

    function reset() {
        $('#ayah_nama').val("");
        $('#ayah_lahir').val("");
        $('#ayah_hp').val("");
        $('#ayah_wa').val("");
        $('#ayah_alamat').val("");
        $('#ibu_nama').val("");
        $('#ibu_lahir').val("");
        $('#ibu_hp').val("");
        $('#ibu_wa').val("");
        $('#ibu_alamat').val(""); 
        $('#anak_nama').val(""); 
        $('#anak_tmp_lahir').val(""); 
        $('#anak_ke').val(""); 
        $('#anak_saudara').val(""); 
        $('#anak_berat').val(""); 
        $('#anak_tinggi').val(""); 
        $('#anak_alamat').val(""); 
        document.getElementById("ayah_kerja").focus();
    }

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_cari').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });

    $('#btn_add_ortu').on('click',function(){

        $('#formModalAddOrtu').modal('show');
        view();
        reset();

    });

    $('#btn_cari_ortu').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.view') }}",
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
                            $('<td class= width="2%" align="center">'),
                            $('<td class= width="10%">'),
                            $('<td class= width="60%">'),
                            $('<td class= width="3%" align="right">'),
                            $('<td class= width="5%" align="right">'),
                            $('<td class= width="5%" align="right">'),
                            $('<td class= width="3%" align="right">'),
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].ortu_ayah)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].ortu_ayah_hp)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].anak_jekel)));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].anak_alamat)));   

                       // tr.find('td:nth-child(7)').append('<div class="d-flex"><small><a href="javascript:;" class="btn btn-success btn-xs shadow  sharp mr-2 item_pilih2" data="'+data[i].anak_nis+'"><i class="fa fa-check"></i>  Pilih</a></small></div>'); 

                        tr.appendTo($('#show_data'));
                    }

                }
                //$('#datatable').DataTable('refresh'); 
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
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_anak').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td class= width="5%" align="center">'),
                            $('<td class= width="10%">'),
                            $('<td class= width="60%">'),
                            $('<td class= width="3%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nis)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(4)').append('<div class="d-flex"><small><a href="javascript:;" class="btn btn-success btn-xs shadow  sharp mr-2 item_pilih" data="'+data[i].anak_nis+'"><i class="fa fa-check"></i>  Pilih</a></small></div>'); 

                        tr.appendTo($('#show_data_anak'));
                    }

                }
                //$('#datatable').DataTable('refresh'); 
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
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_tarif').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="5%" align="center">'),
                            $('<td width="20%">'),
                            $('<td width="10%">'),
                            $('<td width="40%">'),
                            $('<td width="10%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].kode)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].tarif_reg)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tarif_spp)));  

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].tarif_pembg)));   

                        // tr.find('td:nth-child(5)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-rounded btn-info btn-xs item_pilih" data="'+data[i].tarif_nis+'">PILIH</a></div>'); 

                        tr.appendTo($('#show_data_tarif'));
                    }

                }
                //$('#datatable').DataTable('refresh'); 
            }
        });
    }


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

    $('#show_data_anak2').on('click','.item_pilih2',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('anak.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $('[name="daftar_nis2"]').val(data.anak_nis);
            }
        });

        return false;

    });



    $('#btn_simpan_anak').on('click', function(){
    
        
        var ortu       = $('#ortu').val();
        var anak_nama       = $('#anak_nama').val();
        var anak_tmp_lahir  = $('#anak_tmp_lahir').val();
        var anak_tgl_lahir  = $('#anak_tgl_lahir').val();
        var anak_jekel      = $('#anak_jekel').val();
        var anak_ke         = $('#anak_ke').val();
        var anak_saudara     = $('#anak_saudara').val();
        var anak_agama     = $('#anak_agama').val();
        var anak_alamat     = $('#anak_alamat').val();
        var anak_berat     = $('#anak_berat').val();
        var anak_tinggi     = $('#anak_tinggi').val();
        var token = $('[name=_token]').val();

        var formData = new FormData();
    
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
            success: function(data) {
                $('#formModalAdd').modal('hide');
                swal("Berhasil!", "Data Berhasil Disimpan", "success");
                reset();
                view();
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
            success: function(data) {
                $('#formModalAddOrtu').modal('hide');
                swal("Berhasil!", "Data Berhasil Disimpan", "success");
                combo_anak_agama();
                combo_anak_jekel();
                combo_ortu();
                reset();
                view();
            }
        });
    
        return false;

    });

    $('#btn_proses').on('click', function(){
    
    
    var daftar_tanggal       = $('#daftar_tanggal').val();
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
                        option.text = "Nothing Selected";
                        option.value = '';
                        x.add(option);
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].ortu_id)+'>'+(data[i].ortu_ayah)+'</option>';
                        $('select[name=ortu]').append(html)
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

        $('select[name=daftar_blm]').empty()
            var html = '';
            html = '<option value="B">Baru</option>'+
                   '<option value="L">Lama</option>';
        $('select[name=daftar_blm]').append(html)

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
                    option.text = "Nothing Selected";
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
                    option.text = "Nothing Selected";
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
                    option.text = "Nothing Selected";
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
                    option.text = "Nothing Selected";
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
                    option.text = "Nothing Selected";
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
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
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
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=ibu_perusahaan]').append(html)
                }
            }
        });

    }



</script>


@endsection