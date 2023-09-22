@extends('app.layouts.template')

@section('css')
    <style>
        .grand-total {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            min-width: 0;
            margin-bottom: 0;
            font-size: 15px;
            padding-right: 0.3rem;
            font-weight: bold;
            color: #08ca4f
        }
        .sub-total {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            min-width: 0;
            margin-bottom: 0;
            font-size: 15px;
            padding-right: 0.3rem;
            font-weight: bold;
        }
        .diskon {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            min-width: 0;
            margin-bottom: 0;
            font-size: 15px;
            padding-right: 0.3rem;
            font-weight: bold;
            color: #ff0002
        }

        
        .row2 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: 0px;
            margin-left: 0px;
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
                        <h4 class="card-title text-white"><i class="fas fa-cart-arrow-down"></i>  TAGIHAN</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <a href="{{ route('pendaftaran.transaksi.index') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> PENDAFTARAN </a>
                        <a href="{{ route('pendaftaran.tagihan.add') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> TAGIHAN </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="box-body">	
                    <div class="table-responsive">
                        <table id="datatable" class="table-sm table table-bordered mb-0 table-centered dt-responsive table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: center">ANAK</th>
                                    <th style="text-align: center">ORTU</th>
                                    <th  style="text-align: center">TAGIHAN</th>
                                    <th  style="text-align: center">JATUH TEMPO</th>
                                    <th  style ="text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="show_data"></tbody>
                        </table>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalBayar">
    <div class="modal-dialog modal-lg bg-white" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-cash-multiple"></i> <strong>Pembayaran</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                        
                                <div class="row bg-white">
                                    <div class="col-lg-12">
                                        <input type="hidden" id="trs_kode" name="trs_kode">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <h6 class="mb-0"><b>Tanggal Daftar :</b> </h6> <p id="tgl_daftar"></p>
                                                    <h6 class="mb-0"><b>Kode Pendaftaran :</b></h6> <p id="daftar_kode"></p>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-md-4">                                            
                                                <div class="float-left">
                                                    <address class="font-13">
                                                        <strong class="font-14">Nama :</strong>
                                                        <p class="mb-0" id="nama_anak"></p>
                                                        <strong class="font-14">Jenis Kelamin :</strong>
                                                        <p class="mb-0" id="jekel"></p>
                                                        <strong class="font-14">Lahir :</strong>
                                                        <p class="mb-0" id="tgl_lahir"></p>
                                                        
                                                    </address>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-md-4">
                                                <div class="">
                                                    <address class="font-13">
                                                        <strong class="font-14">Paket:</strong>
                                                        <p class="mb-0" id="tarif"></p>
                                                    </address>
                                                </div>
                                            </div> <!--end col-->                                           
                                                                             
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0 table-centered">
                                                <thead>
                                                    <tr>
                                                        <th width="1%" style="text-align: center; vertical-align: middle;">NO</th>
                                                        <th width="20%" style="text-align: center; vertical-align: middle;">TARIF</th>
                                                        <th width="30%" style="text-align: right; vertical-align: middle;">TOTAL</th>
                                                    </tr>
                               
                                                </thead>
                                                <tbody id="show_data_detail">
                                                
                                                </tbody>
                                            </table><!--end /table--> 
                                            <hr>
                                            <div class="row2">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-3 col-form-label text-right">Tanggal Bayar</small></label>
                                                        <div class="col-sm-5">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                 <input type="text" id="tgl_bayar" name="tgl_bayar" class="form-control datepicker" >
                                                            </div>
                                                        </div>
                                                    </div>   

                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-3 col-form-label text-right">Untuk Bulan</small></label>
                                                        <div class="col-sm-5">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                 <input type="text" id="untuk_bulan" name="untuk_bulan" class="form-control bulan datepicker" >
                                                            </div>
                                                        </div>
                                                    </div>     

                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-3 col-form-label text-right">Keterangan</small></label>
                                                        <div class="col-sm-9">
                                                            <textarea id="keterangan" name="keterangan" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                                        </div>
                                                    </div>     
                            
                                                        
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Sub Total</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="total_biaya" name="total_biaya" class="form-control sub-total geser_kanan" disabled>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Diskon</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="input_diskon" name="input_diskon" class="form-control diskon geser_kanan " onkeyup="sum();" onkeypress="return angka(this, event)">
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Pembayaran</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="input_bayar" name="input_bayar" class="form-control diskon geser_kanan " onkeyup="input_bayar();" onkeypress="return angka(this, event)">
                                                            </div>
                                                        </div>
                                                    </div>   

                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Grand Total</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="grand_total" name="grand_total" class="form-control geser_kanan grand-total" onkeypress="return angka(this, event)" disabled>
                                                            </div>
                                                        </div>
                                                    </div>     
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>  <!--end col-->                                      
                                </div><!--end row-->
                        
                    </div><!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" id="btn_save"><i class="fab fa-cc-mastercard"></i> BAYAR</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        
        $('.datepicker[name=tgl_bayar]').val(moment().format('DD-MM-YYYY'));

        $("#untuk_bulan").datepicker( {
            viewMode: "months",
            minViewMode: "months",
            autoClose: true,
            format: 'MM'
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });


        // $('.datepicker').datepicker({
        //     autoclose: true,
        //     format:'dd-mm-yyyy',
        // });

        view();
        reset();

    });

    function reset() {
        $('#nama').val("");
    }

    $('#btn_add').on('click',function(){

        $("#nama").val("");
        $('#formModalAdd').modal('show');
        reset();

    });


    $('#btn_save').on('click', function(){

        if (!$("#untuk_bulan").val()) {
            $.toast({
                text: 'BULAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#untuk_bulan").focus();
            return false;

        } 
        
        else if (!$("#input_bayar").val()) {
            $.toast({
                text: 'PEMBAYARAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#input_bayar").focus();
            return false;

        } 

        var tgl_bayar   = $('#tgl_bayar').val();
        var kode        = $('#trs_kode').val();
        var sub_total   = $('#total_biaya').val();
        var diskon      = $('#input_diskon').val();
        var grand_total = $('#grand_total').val();
        var bayar       = $('#input_bayar').val();
        var bulan       = $('#untuk_bulan').val();
        var keterangan  = $('#keterangan').val();

        console.log(grand_total);
        
        var token       = $('[name=_token]').val();
        var formData    = new FormData();
    
        formData.append('tgl_bayar', tgl_bayar);
        formData.append('kode', kode);
        formData.append('sub_total', sub_total);
        formData.append('diskon', diskon);
        formData.append('bayar', bayar);
        formData.append('bulan', bulan);
        formData.append('keterangan', keterangan);
        formData.append('grand_total', grand_total);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.tagihan.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                    
                    view();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalBayar').modal('hide');
                
               
            }
        });

    return false;

    });




    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.tagihan.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        if((data[i].anak_aktif) == 'Y'){
                            var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="10%">'),
                                $('<td width="10%">'),
                                $('<td width="9%">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="4%" align="left">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#ffedc6;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="20%">'),
                                $('<td width="7%">'),
                                $('<td width="5%">'),
                                $('<td width="10%">'),
                                $('<td width="10%">'),
                                $('<td width="10%">'),
                                $('<td width="15%" align="left">')
                            ]);

                        }
             
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].anak_jekel)+' - '+(data[i].anak_tgl_lahir)+'</small>'));                      

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].ortu_ayah)+' - <small class="text-muted">(Ayah)</span></small>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].ortu_ibu)+' - <small class="text-muted">(Ibu)</span></small>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].kat_nama)+' - '+(data[i].tarif_nama)+'</b>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b class="text-danger font-20">'+(data[i].tarif_total)+'</b>'));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html(data[i].trs_jatuh_tempo));                        
                    
                        tr.find('td:nth-child(6)').append('<div class="mb-1"><a href="'+(data[i].edit)+'" class="btn btn-block btn-soft-warning btn-xs text-left"><i class="fas fa-pencil-alt"></i> EDIT</a>');   
                        tr.find('td:nth-child(6)').append('<div><a href="javascript:;" class="btn btn-block btn-soft-primary btn-xs text-left item_bayar" data="'+data[i].trs_kode+'"><i class="far fa-credit-card"></i> BAYAR</a></div>');   

                        tr.appendTo($('#show_data'));
                    }
                }

               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_detail(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.tagihan.detail_view') }}",
            async: true,
            dataType: 'JSON',
            data:{kode:kode},
            success: function(r) {
                var i;
                
                $('#show_data_detail').empty();
                data = r.data;
            
                $('[name="total_biaya"]').val(r.total);
                $('[name="grand_total"]').val(r.total);

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="70%" align="left">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].tarif_nama))); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].detail)));   

                        tr.appendTo($('#show_data_detail'));
                    }


                } else {

                    $('#show_data_detail').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });

    }
    


    $('#show_data').on('click','.item_bayar',function(){

        var id=$(this).attr('data');
        $.ajax({
            type : "GET",
            url   : "{{ route('pendaftaran.tagihan.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                var anak_jekel = data.anak_jekel;

                if (anak_jekel == 'L'){
                    var jekel = 'Laki-Laki';
                } else {
                    var jekel = 'Perempuan';
                }

                document.getElementById("tgl_daftar").innerHTML= data.trs_tgl;
                document.getElementById("daftar_kode").innerHTML= data.trs_kode;
                document.getElementById("nama_anak").innerHTML= data.anak_nama;
                document.getElementById("jekel").innerHTML= jekel;
                document.getElementById("tgl_lahir").innerHTML= data.anak_tmp_lahir +' | '+ data.anak_tgl_lahir ;
                
                document.getElementById("tarif").innerHTML= data.tarif_nama +' - '+  data.kat_nama ;

                $('#formModalBayar').modal('show');
                $('#formModalBayar').find('[name="trs_kode"]').val(data.trs_kode);
                $('#formModalBayar').find('[name="input_diskon"]').val("0");
                
                view_detail(id);
            }
        });

    return false;

    });

      

    $('#btn_update').on('click',function(){

        if (!$("#nama_edit").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-left',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nama_edit").focus();
            return false;

        } 
      
        var id = $('#id_edit').val();
        var nama = $('#nama_edit').val();
        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('tarif.jenis.update') }}",
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
                    url   : "{{ route('tarif.jenis.aktif') }}",
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
                    url   : "{{ route('tarif.jenis.nonaktif') }}",
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

    function format2(n, currency) {

        var hasil = currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1.");
        return hasil = hasil.substring(0, hasil.length-3)

    }

    function sum() {

        var total = document.getElementById('total_biaya').value;
        var diskon = document.getElementById('input_diskon').value;

        var total_string = total.toString();
        var total_split = total_string.split(".");
        var total_baru = total_split.join("");

        var diskon_string = diskon.toString();
        var diskon_split = diskon_string.split(".");
        var diskon_baru = diskon_split.join("");

        var hasil_rupiah =  parseInt(total_baru) - parseInt(diskon_baru);

        if (!isNaN(hasil_rupiah)) {

            var hasil = format2(hasil_rupiah,"");
                document.getElementById('grand_total').value = hasil;
        }

    }

    function input_bayar() {

        var total = document.getElementById('total_biaya').value;
        var bayar = document.getElementById('input_bayar').value;

        var total_string = total.toString();
        var total_split = total_string.split(".");
        var total_baru = total_split.join("");

        var bayar_string = bayar.toString();
        var bayar_split = bayar_string.split(".");
        var bayar_baru = bayar_split.join("");


        var hasil_rupiah = parseInt(total_baru) - parseInt(bayar_baru);
        var hasil = format2(hasil_rupiah,"");
                document.getElementById('grand_total').value = hasil;

        // if (total_baru > bayar_baru) {

          

        //     // if (!isNaN(hasil_rupiah)) {

                
        //     // }

        // } else {

        //     var hasil_rupiah = 0;
        //     var hasil = format2(hasil_rupiah,"");
        //     document.getElementById('grand_total').value = hasil;

        // }

    }


    var diskon    = document.getElementById('input_diskon');
    var bayar     = document.getElementById('input_bayar');

    bayar.addEventListener('keyup', function(e)
    {
        bayar.value = formatRupiah(this.value);
    });

    diskon.addEventListener('keyup', function(e)
    {
        diskon.value = formatRupiah(this.value);
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