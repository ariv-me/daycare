@extends('app.layouts.template')



@section('content')

<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Baru</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <div class="row">
                        <div class="col-md-12 order-md-1">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="state"><small> Pendaftaran </small><span class="text-danger">*</span> </label>
                                    <div class="input-group mb-1">
                                        <select class="form-control" style="width: 50%;" name="daftar_blm" id="daftar_blm"></select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="state"><small> Tanggal </small><span class="text-danger">*</span> </label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend input-info">
                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="daftar_tanggal" name="daftar_tanggal" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="state"><small> Petugas </small><span class="text-danger">*</span> </label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend input-info">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $app['kar_nama_awal'] }}" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Total Bayar</h4>
            </div>
            <div class="card-body">
    
                    <div class="text-right mt-4">
                            <h1>8.000.000</h1>
                    </div>
            </div>
        </div> 
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <div class="row">
                        <div class="col-md-12 order-md-1">
            
                            {!! csrf_field() !!}                          
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <label for="state"><small> NIS </small><span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" id="daftar_nis" name="daftar_nis" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="state"><small> Nama Anak </small><span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" id="daftar_anak" name="daftar_anak" disabled="disabled">
                                            <div class="input-group-append">
                                                <button type="button" id="btn_cari" class="btn btn-outline-warning mb-2" data-toggle="modal"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="state"><small> Perusahaan </small><span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="perusahaan" id="perusahaan"  onchange="showFilterPerusahaan(this)"></select>
                                    </div>

                                    <div class="col-md-3 mb-1">
                                        <label for="state"><small> Jenis Pendaftaran </small><span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="jenis" id="jenis"  onchange="showFilterJenis(this)"></select>
                                    </div>

                                    <div class="col-md-1 mt-2">
                                        <button class="btn btn-primary mt-4 btn-sl-sm" id="btn_proses" type="button"><span><i class="fa fa-plus"></i></span></button>
                                    </div>
    
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table primary-table-stripped">
                                        <thead class="tabel-tarif">
                                            <tr>
                                                <th class="width80">#</th>
                                                <th>TARIF KODE</th>
                                                <th>REGISTRASI</th>
                                                <th>SPP</th>
                                                <th>PEMBANGUNAN</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data_tarif">
                                            
                                        </tbody>
                                    </table>
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
                <h4 class="card-title">Detail</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead></thead>
                            <tr>
                                <th> <strong> NIS </strong></th>
                                <th> <strong> NAMA </strong></th>
                                <th style="text-align: right"> <strong> REGISTRASI </strong></th>
                                <th style="text-align: right"> <strong> SPP </strong></th>
                                <th style="text-align: right"> <strong> PEMBANGUNAN </strong></th>
                                <th> <strong> AKSI </strong></th>
                            </tr>
                        </thead>
                        <tbody id="show_data_daftar">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--******************* Modal Add ********************-->
@include('pendaftaran.baru.modal_add')
@include('pendaftaran.baru.modal_anak')
@include('pendaftaran.baru.modal_add_ortu')
@include('pendaftaran.baru.modal_cari_ortu')

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $( "#daftar_tanggal" ).datepicker({dateFormat:"DD-MM-YYYY"}).datepicker("setDate",new Date());
        
        var tgl       = $('#daftar_tanggal').val();
        
        console.log(tgl);

        combo_blm();
        combo_ortu();
        combo_anak();
        combo_jenis();
        combo_anak_jekel();
        combo_wali_jekel();
        combo_perusahaan();
        combo_kerja_ayah();
        combo_kerja_ibu();
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
        document.getElementById("anak_jekel").focus();
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
        view_anak2();
        reset();

    });

    $('#btn_cari_ortu').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });

    function view_daftar() {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_daftar').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="6%">'),
                            $('<td width="15%">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="3%" align="right">'),
                        ]);

                        // tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(1)').append($('<div>')
                            .html((data[i].anak_nis)));   

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].tarif_reg)));  

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tarif_spp)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].tarif_pembg)));   

                        tr.find('td:nth-child(6)').append('<div class="d-flex"><a href="javascript:;" class="text-warning font-w600 mr-4 item_pilih2" data="'+data[i].daftar_kode+'">EDIT</a><a href="javascript:;" class="text-danger font-w600 mr-4 item_pilih2" data="'+data[i].daftar_kode+'">HAPUS</a></div>'); 

                        tr.appendTo($('#show_data_daftar'));
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
                $('[name="perusahaan"]').val(data.ortu_ayah_peru_id);

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



    $('#btn_simpan').on('click', function(){
    
        
        var anak_nis       = $('#anak_nis').val();
        var anak_nama       = $('#anak_nama').val();
        var anak_tmp_lahir  = $('#anak_tmp_lahir').val();
        var anak_tgl_lahir  = $('#anak_tgl_lahir').val();
        var anak_jekel      = $('#anak_jekel').val();
        var anak_ke         = $('#anak_ke').val();
        var jml_saudara     = $('#jml_saudara').val();

        var ortu_nama       = $('#ortu_nama').val();
        var ortu_pekerjaan  = $('#ortu_pekerjaan').val();
        var ortu_hp         = $('#ortu_hp').val();
        var ortu_alamat     = $('#ortu_alamat').val();

        var token = $('[name=_token]').val();

       

        var formData = new FormData();
    
        formData.append('anak_nis', anak_nis);
        formData.append('anak_nama', anak_nama);
        formData.append('anak_tmp_lahir', anak_tmp_lahir);
        formData.append('anak_tgl_lahir', anak_tgl_lahir);
        formData.append('anak_jekel', anak_jekel);
        formData.append('anak_ke', anak_ke);
        formData.append('jml_saudara', jml_saudara);

        formData.append('ortu_nama', ortu_nama);
        formData.append('ortu_pekerjaan', ortu_pekerjaan);
        formData.append('ortu_hp', ortu_hp);
        formData.append('ortu_alamat', ortu_alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.anak') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#formModalAdd').modal('hide');
                swal("Berhasil!", "Data Berhasil Disimpan", "success");
            }
        });
    
        return false;

    });

    $('#btn_simpan_ortu').on('click', function(){
        
        if (!$("#ortu_nama_ayah").val()) {
            $.toast({
                text: 'NAMA AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_nama_ayah").focus();
            return false;

        } else if (!$("#ortu_kerja_ayah").val()) {
            $.toast({
                text: 'KERJA AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_kerja_ayah").focus();
            return false;

        } else if (!$("#ortu_hp_ayah").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_hp_ayah").focus();
            return false;

        } else if (!$("#ortu_hp_ayah").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_hp_ayah").focus();
            return false;

        } else if (!$("#ortu_ayah_alamat").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_ayah_alamat").focus();
            return false;

        } else if (!$("#ortu_nama_ibu").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_nama_ibu").focus();
            return false;

        } else if (!$("#ortu_kerja_ibu").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_kerja_ibu").focus();
            return false;

        } else if (!$("#ortu_hp_ibu").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_hp_ibu").focus();
            return false;

        } else if (!$("#ortu_ibu_alamat").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#ortu_ibu_alamat").focus();
            return false;
        }
        
        var ortu_nama_ayah       = $('#ortu_nama_ayah').val();
        var ortu_kerja_ayah      = $('#ortu_kerja_ayah').val();
        var ortu_hp_ayah         = $('#ortu_hp_ayah').val();
        var ortu_ayah_alamat     = $('#ortu_ayah_alamat').val();
        
        var ortu_nama_ibu        = $('#ortu_nama_ibu').val();
        var ortu_kerja_ibu       = $('#ortu_kerja_ibu').val();
        var ortu_hp_ibu         = $('#ortu_hp_ibu').val();
        var ortu_ibu_alamat      = $('#ortu_ibu_alamat').val();

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('ortu_nama_ayah', ortu_nama_ayah);
        formData.append('ortu_kerja_ayah', ortu_kerja_ayah);
        formData.append('ortu_hp_ayah', ortu_hp_ayah);
        formData.append('ortu_ayah_alamat', ortu_ayah_alamat);

        formData.append('ortu_nama_ibu', ortu_nama_ibu);
        formData.append('ortu_kerja_ibu', ortu_kerja_ibu);
        formData.append('ortu_hp_ibu', ortu_hp_ibu);
        formData.append('ortu_ibu_alamat', ortu_ibu_alamat);

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
                combo_ortu();
            }
        });
    
        return false;

    });

    $('#btn_proses').on('click', function(){
    
    
    var daftar_tanggal       = $('#daftar_tanggal').val();
    var daftar_nis           = $('#daftar_nis').val();
    var daftar_anak          = $('#daftar_anak').val();
    var perusahaan           = $('#perusahaan').val();
    var jenis                = $('#jenis').val();

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
                $('select[name=ortu_kerja_ayah]').empty()
                var x = document.getElementById("ortu_kerja_ayah");
                    var option = document.createElement("option");
                    option.text = "Pilih";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=ortu_kerja_ayah]').append(html)
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
                $('select[name=ortu_kerja_ibu]').empty()
                var x = document.getElementById("ortu_kerja_ibu");
                    var option = document.createElement("option");
                    option.text = "Pilih";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = 
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=ortu_kerja_ibu]').append(html)
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
                $('select[name=perusahaan]').empty()
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=perusahaan]').append(html)
                }
            }
        });

    }

    function combo_ortu_perusahaan(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_perusahaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=ortu_perusahaan]').empty()
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=ortu_perusahaan]').append(html)
                }
            }
        });

    }



</script>


@endsection