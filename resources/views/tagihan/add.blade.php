@extends('app.layouts.template')

@section('css')
    <style>

        .nav-border .nav-item.show .nav-link, .nav-border .nav-link.active {
            background: #ffffff;
            color: #2a2a2a;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            border-bottom: 3px solid #FF9800;
            padding-bottom: 0px;
        }

        .nav-border .nav-item.show .nav-link, .nav-border{
            background: #fbb617;
            color: #ffffff;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            border-bottom: 3px solid #03d87f;
            padding-bottom: 0px;
        }

        .la, .las, .lar, .lal, .lad, .lab {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
            font-size: 27px;
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

            <input type="hidden" id="trs_kode" name="trs_kode">
            <input type="hidden" id="anak_kode" name="anak_kode">

            <input type="text" id="periode" name="periode">
            <input type="text" id="grup" name="grup">
            <input type="text" id="kategori" name="kategori">

            <h4 class="card-title bg-light p-2 mb-2"><i class="fas fa-edit"></i>  TAGIHAN</h4>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="username">Tanggal <small class="text-danger">*</small></label>
                                <input type="text" class="form-control datepicker" id="tgl_daftar" name="tgl_daftar">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="useremail">Jatuh Tempo <small class="text-danger">*</small></label>
                                <input type="text" class="form-control datepicker" id="jatuh_tempo" name="jatuh_tempo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="subject">Pilih Anak  <small class="text-danger">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="anak" id="anak" onchange="showAnak(this)"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="subject">Paket  <small class="text-danger">*</small></label>
                                <select class="form-control custom-select select2" style="width: 100%;" name="paket" id="paket"  onchange="showFilterPaket(this)"></select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-4">
                            <button type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light btn-block mt-1" id="detail_save"><i class="fas fa-plus mr-2"></i>Tambahkan</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <table class="table table-sm table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th width="1%" style="text-align: center; vertical-align: middle;" rowspan="2">NO</th>
                                <th width="20%" style="text-align: center; vertical-align: middle;" rowspan="2">ITEM TARIF</th>
                                <th style="text-align: center" colspan="5">BIAYA</th>
                            </tr>
        
                        </thead>
                        <tbody id="show_data_tarif">
                        
                        </tbody>
                    </table><!--end /table--> 
                    <table class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th width="72%" style="text-align: center; vertical-align: middle;" colspan="2">TOTAL BIAYA</th>
                                <th style="text-align: right;background:white; color:#ff0002" id="total_tarif"></th>
                            </tr>
                        </thead>
                    </table><!--end /table-->
                </div>
            </div>
            <h4 class="card-title bg-light p-2 mb-2"><i class="mdi mdi-cash-multiple"></i>  INFO TARIF & TOTAL BIAYA</h4>            
            <div class="table-responsive-sm">
                <table class="table table-sm table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th width="1%" style="text-align: center; vertical-align: middle;">NO</th>
                            <th width="20%" style="text-align: center; vertical-align: middle;">TARIF</th>
                            <th width="5%" style="text-align: center; vertical-align: middle;">AKSI</th>
                            <th width="30%" style="text-align: right; vertical-align: middle;">TOTAL</th>
                        </tr>
    
                    </thead>
                    <tbody id="show_data_detail">
                    
                    </tbody>
                </table><!--end /table--> 
                <table class="table table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th width="71%" style="text-align: right; vertical-align: middle;" colspan="2">TOTAL BIAYA</th>
                            <th style="text-align: right;background:white; color:#ff0002" id="total_biaya"></th>
                        </tr>
                    </thead>
                </table><!--end /table-->
            </div>

            </div><!--end card-body-->
            <div class="card-footer float-right d-print-none">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                        <div class="text-center text-danger"><small class="font-12">Pastikan Semua Data Sudah Lengkap Sebelum Menyimpan</small></div>
                    </div><!--end col-->
                    <div class="col-lg-12 col-xl-4">
                        <div class="float-right d-print-none">
                            <button id="btn_simpan" class="btn btn-success btn-sm"><i class="fas fa-save"></i> DAFTAR</button>
                        </div>
                    </div><!--end col-->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();

        $('.datepicker[name=tgl_daftar]').val(moment().format('DD-MM-YYYY'));
       // $('.datepicker[name=jatuh_tempo]').val(moment().format('DD-MM-YYYY'));

        $('.datepicker').datepicker({
            autoclose: true,
            format:'dd-mm-yyyy',
        });

        combo_anak();
        combo_paket();

        view_detail();



    });

    function reset() {
        $('#tgl_daftar').val("");
        $('#jatuh_tempo').val("");
        $('#paket').val("").trigger("change");
        $('#anak').val("").trigger("change");
    }

    function showAnak(select){

        var kode  = $('#anak').val();
        view_anak(kode);

    }



    $('#btn_simpan').on('click', function(){

        var total = $('#total_biaya').text();
       
        if (!$("#tgl_daftar").val()) {
            $.toast({
                text: 'NAMA ANAK MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#tgl_daftar").focus();
            return false;

        } 
        
        else if (!$("#jatuh_tempo").val()) {
            $.toast({
                text: 'JATUH TEMPO MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#jatuh_tempo").focus();
            return false;

        } 

        else if ( total == "0") {
            $.toast({
                text: 'TRANSAKSI TIDAK ADA',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#paket").focus();
            return false;

        }    

        var total_biaya     = $('#total_biaya').text();
        var anak        = $('#anak').val(); 
        var periode     = $('#periode').val(); 
        var tgl_daftar  = $('#tgl_daftar').val(); 
        var jatuh_tempo = $('#jatuh_tempo').val(); 
        var kategori    = $('#kategori').val(); 
        var grup        = $('#grup').val(); 
        var paket        = $('#paket').val(); 
        var token       = $('[name=_token]').val();
        var formData    = new FormData();

        formData.append('anak', anak);
        formData.append('periode', periode);
        formData.append('tgl_daftar', tgl_daftar);
        formData.append('jatuh_tempo', jatuh_tempo);
        formData.append('kategori', kategori);
        formData.append('grup', grup);
        formData.append('paket', paket);
        formData.append('total_biaya', total_biaya);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tagihan.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                swal("Berhasil!", "Data Berhasil Di Simpan", "success");

            }
        });
    
        return false;

    });

    $('#detail_save').on('click', function(){

        if (!$("#tgl_daftar").val()) {
            $.toast({
                text: 'NAMA ANAK MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#tgl_daftar").focus();
            return false;

        } 

        else if (!$("#paket").val()) {
            $.toast({
                text: 'PAKET MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#paket").focus();
            return false;

        } 
        
        var periode         = $('#periode').val();
        var kategori        = $('#kategori').val();
        var grup            = $('#grup').val();
        var paket           = $('#paket').val();
        var anak_kode       = $('#anak_kode').val(); 
        var trs_kode        = $('#trs_kode').val(); 
        var token           = $('[name=_token]').val();
        var formData        = new FormData();

        formData.append('anak_kode', anak_kode);
        formData.append('trs_kode', trs_kode);
        formData.append('periode', periode);
        formData.append('grup', grup);
        formData.append('paket', paket);
        formData.append('kategori', kategori);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.detail.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {

                view_detail();
                swal("Berhasil!", "Data Berhasil Di Simpan", "success");

            }
        });
    
        return false;

    });


     // TRANSAKSI

    function view_detail() {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.detail.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                
                $('#show_data_detail').empty();
                data = r.data;
            
                document.getElementById("total_biaya").innerHTML='<b class="text-danger font-20">'+r.total+'</b>';

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="70%" align="left">'),
                            $('<td width="1%" align="center">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b class="text-dark">'+(data[i].tarif_nama)+'</b>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b class="text-danger font-15">'+(data[i].detail)+'</b>'));   

                        tr.find('td:nth-child(3)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-danger btn-xs item_delete" data="'+data[i].detail_kode+'"><i class="fa fa-trash"></i></a></div>');                          


                        tr.appendTo($('#show_data_detail'));
                    }


                } else {

                    $('#show_data_detail').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });

    }

    function view_tarif(paket) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.view_transaksi') }}",
            async: true,
            data : {paket:paket},
            dataType: 'JSON',
            success: function(r) {
                var i;
                
                $('#show_data_tarif').empty();
                data = r.data;
            
                
                document.getElementById("total_tarif").innerHTML='<b class="text-info font-15">'+r.total_tarif+'</b>';

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="25%" align="left">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<span class="text-success">'+(data[i].item_nama)+'</span>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b>'+(data[i].detail_total_tampil)+'</b>'));   

                        tr.appendTo($('#show_data_tarif'));
                    }


                } else {

                    $('#show_data_tarif').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });

    }

    function view_anak(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('dapok.anak.view_anak_tagihan') }}",
            async: true,
            data : {kode:kode},
            dataType: 'JSON',
            success: function(r) {
                var i;
                
                data = r.data;

                console.log(data);
                
                $('#periode').val(data.periode_id);
                $('#grup').val(data.grup_kode);
                $('#kategori').val(data.kat_kode);
                
            }
        });

    }


    $('#show_data_detail').on('click','.item_delete',function(){
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Hapus Data Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('pendaftaran.detail.delete') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        view_detail();
                        swal("Di Hapus !", "Data Sudah Di-Hapus !!.", "success");
                    }
                });  
            }
        });
    });

   
    function showFilterPaket(select){

        var paket  = $('#paket').val();
        view_tarif(paket);

    }

    function combo_paket(kategori){

    $('select[name=paket]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_tarif_paket2') }}",
            async : false,
            data : {kategori:kategori},
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
                    html = '<option value='+(data[i].tarif_kode)+'>'+(data[i].tarif_nama)+'</option>';
                    $('select[name=paket]').append(html)
                }
            }
        });

    }

    function combo_anak(){

        $('select[name=anak]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_dapok_anak') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=anak]').empty()
                var x = document.getElementById("anak");
                        var option = document.createElement("option");
                        option.text = "--Pilih--";
                        option.value = '';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].anak_kode)+'>'+(data[i].anak_nama)+'</option>';
                    $('select[name=anak]').append(html)
                }
            }
        });

    }


</script>


@endsection