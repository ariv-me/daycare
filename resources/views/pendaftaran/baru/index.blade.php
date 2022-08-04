@extends('app.layouts.template')

@section('content')

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Baru</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <div class="row">
                        <div class="col-md-12 order-md-1">
            
                            {!! csrf_field() !!}
    
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="state">NIS <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" id="daftar_nis" name="daftar_nis" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="state">Nama Anak <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-1">
                                            <input type="text" class="form-control" id="daftar_anak" name="daftar_anak" disabled="disabled">
                                            <div class="input-group-append">
                                                <button type="button" id="btn_add" class="btn btn-outline-primary mb-2" data-toggle="modal"><i class="fa fa-plus"></i></button>
                                                <button type="button" id="btn_cari" class="btn btn-outline-warning mb-2" data-toggle="modal"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="state">Perusahaan <span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="perusahaan" id="perusahaan"  onchange="showFilterPerusahaan(this)"></select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="state">Jenis Pendaftaran <span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="jenis" id="jenis"  onchange="showFilterJenis(this)"></select>
                                    </div>
                                   
       
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-hover table-responsive-sm">
                                        <thead>
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
    
                                <hr class="mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="button" id="btn_proses">Proses</button>
              
                        </div>
                    </div>
                </div>
                
            </div>
        </div> 
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Total Harga</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 order-md-1">
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-rounded btn-danger btn-event w-100"><span class="btn-icon-left text-danger"><i class="fa fa-close"></i>
                        </span>Batal</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-rounded btn-primary btn-event w-100"><span class="btn-icon-left text-primary"><i class="fa fa-shopping-cart"></i>
                        </span>Bayar</button>
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

            </div>
        </div>
    </div>
</div>


<!--******************* Modal Add ********************-->
@include('pendaftaran.baru.modal_add')
@include('pendaftaran.baru.modal_anak')

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        combo_jenis();
        combo_anak_jekel();
        combo_wali_jekel();
        combo_pekerjaan();
        combo_perusahaan();
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
                            $('<td width="5%" align="center">'),
                            $('<td width="10%">'),
                            $('<td width="60%">'),
                            $('<td width="10%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nis)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(4)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-rounded btn-info btn-xs item_pilih" data="'+data[i].anak_nis+'">PILIH</a></div>'); 

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



    $('#btn_simpan').on('click', function(){
    
        
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

    $('#btn_proses').on('click', function(){
    
    
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



</script>


@endsection