@extends('app.layouts.template')

@section('content')

<div class="row">
    <div class="col-xl-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> 
                    <strong>Pendaftaran Orang Tua</strong>               
                </h4>
                
            </div>
            <div class="card-body">
                
                    <div class="row">
                        <div class="col-md-12">
                            {!! csrf_field() !!}

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name"> <small>Nama Ayah</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
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
                                        <select class="form-control" id="kerja_ayah" name="kerja_ayah"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state"><small> Perusahaan </small><span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <select class="form-control" style="width: 50%;" name="perusahaan_ayah" id="perusahaan_ayah"></select>
                                            <div class="input-group-append">
                                                <button type="button" id="btn_add" class="btn btn-outline-primary mb-2" data-toggle="modal"><i class="fa fa-plus"></i></button>
                                                <button type="button" id="btn_cari" class="btn btn-outline-warning mb-2" data-toggle="modal"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name"> <small>No HP</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="hp_ayah" name="hp_ayah" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-3">
                                        <label for="name"> <small>No WA</small></label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="hp_ayah" name="hp_ayah" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-6 mb-3">
                                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" rows="1" id="ayah_alamat" name="ayah_alamat">
                                        </div>
                                    </div>       
                                </div>
                        </div>
                    </div>
               
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6> <strong>Data Ibu </strong></h6>
            </div>
            <div class="card-body">
                
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name"> <small>Nama Ibu</small> <span class="text-danger">*</span> </label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="name"> <small>Pekerjaan</small> <span class="text-danger">*</span> </label>
                        <select class="form-control" id="kerja_ibu" name="kerja_ibu"></select>
                    </div>
                    <div class="col-md-3">
                        <label for="name"> <small>Perusahaan</small> <span class="text-danger">*</span> </label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="hp_ibu" name="hp_ibu" onkeypress="return angka(this, event)" maxlength="15">
                        </div>
                    </div>      
                    <div class="col-md-12">
                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                        <div class="input-group mb-2">
                            <textarea class="form-control" rows="2" id="ibu_alamat" name="ibu_alamat"></textarea>  
                        </div>
                    </div>           
                </div>


            </div>

        </div>
    </div>
</div>


<!--******************* Modal Add ********************-->
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

        combo_blm();
        combo_ortu();
        combo_anak();
        combo_jenis();
        combo_anak_jekel();
        combo_wali_jekel();
        combo_perusahaan();
        combo_kerja_ayah();
        combo_kerja_ibu();
        combo_jenis_pekerjaan();
        view_tarif();
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
        $('#nama').val("");
        $('#pekerjaan').val("");
        $('#hp').val("");
        $('#alamat').val("");
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

    function view_anak2() {

        $.ajax({
            type: 'GET',
            url: "{{ route('anak.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_anak2').empty();
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

                        tr.find('td:nth-child(4)').append('<div class="d-flex"><small><a href="javascript:;" class="btn btn-success btn-xs shadow  sharp mr-2 item_pilih2" data="'+data[i].anak_nis+'"><i class="fa fa-check"></i>  Pilih</a></small></div>'); 

                        tr.appendTo($('#show_data_anak2'));
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



    $('#btn_simpan').on('click', function(){
    
        
        var anak_nama       = $('#anak_nama').val();
        var anak_tmp_lahir  = $('#anak_tmp_lahir').val();
        var anak_tgl_lahir  = $('#anak_tgl_lahir').val();
        var anak_jekel      = $('#anak_jekel').val();
        var anak_ke         = $('#anak_ke').val();
        var jml_saudara     = $('#jml_saudara').val();

        var nama       = $('#nama').val();
        var pekerjaan  = $('#pekerjaan').val();
        var hp         = $('#hp').val();
        var alamat     = $('#alamat').val();

        var token = $('[name=_token]').val();

       

        var formData = new FormData();
    
        formData.append('anak_nama', anak_nama);
        formData.append('anak_tmp_lahir', anak_tmp_lahir);
        formData.append('anak_tgl_lahir', anak_tgl_lahir);
        formData.append('anak_jekel', anak_jekel);
        formData.append('anak_ke', anak_ke);
        formData.append('jml_saudara', jml_saudara);

        formData.append('nama', nama);
        formData.append('pekerjaan', pekerjaan);
        formData.append('hp', hp);
        formData.append('alamat', alamat);

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
        
        if (!$("#nama_ayah").val()) {
            $.toast({
                text: 'NAMA AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#nama_ayah").focus();
            return false;

        } else if (!$("#kerja_ayah").val()) {
            $.toast({
                text: 'KERJA AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kerja_ayah").focus();
            return false;

        } else if (!$("#hp_ayah").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#hp_ayah").focus();
            return false;

        } else if (!$("#hp_ayah").val()) {
            $.toast({
                text: 'HP AYAH MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#hp_ayah").focus();
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

        } else if (!$("#nama_ibu").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#nama_ibu").focus();
            return false;

        } else if (!$("#kerja_ibu").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kerja_ibu").focus();
            return false;

        } else if (!$("#hp_ibu").val()) {
            $.toast({
                text: 'HP IBU MASIH KOSONG',
                position: 'top-center',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#hp_ibu").focus();
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
        
        var nama_ayah       = $('#nama_ayah').val();
        var kerja_ayah      = $('#kerja_ayah').val();
        var hp_ayah         = $('#hp_ayah').val();
        var ayah_alamat     = $('#ayah_alamat').val();
        
        var nama_ibu        = $('#nama_ibu').val();
        var kerja_ibu       = $('#kerja_ibu').val();
        var hp_ibu         = $('#hp_ibu').val();
        var ibu_alamat      = $('#ibu_alamat').val();

        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('nama_ayah', nama_ayah);
        formData.append('kerja_ayah', kerja_ayah);
        formData.append('hp_ayah', hp_ayah);
        formData.append('ayah_alamat', ayah_alamat);

        formData.append('nama_ibu', nama_ibu);
        formData.append('kerja_ibu', kerja_ibu);
        formData.append('hp_ibu', hp_ibu);
        formData.append('ibu_alamat', ibu_alamat);

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
                    
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].id)+'>'+(data[i].ayah)+'</option>';
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
                $('select[name=kerja_ayah]').empty()
                var x = document.getElementById("kerja_ayah");
                    var option = document.createElement("option");
                    option.text = "Nothing Selected";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=kerja_ayah]').append(html)
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
                $('select[name=kerja_ibu]').empty()
                var x = document.getElementById("kerja_ibu");
                    var option = document.createElement("option");
                    option.text = "Nothing Selected";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = 
                            '<option value='+(data[i].kerja_id)+'>'+(data[i].kerja_nama)+'</option>';
                    $('select[name=kerja_ibu]').append(html)
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
                $('select[name=perusahaan_ayah]').empty()
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=perusahaan_ayah]').append(html)
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
                $('select[name=perusahaan_ayah]').empty()
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=perusahaan_ayah]').append(html)
                }
            }
        });

    }



</script>


@endsection