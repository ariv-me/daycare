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
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title text-white"><i class="mdi mdi-food-fork-drink"></i>  ORDER</h4>          
                    </div><!--end col-->
                    {{-- <div class="col-auto"> 
                        <a href="{{ route('pendaftaran.transaksi.index') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> PENDAFTARAN </a>
                        <a href="{{ route('tagihan.add') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> TAGIHAN </a>
                    </div><!--end col--> --}}
                </div>
            </div>
            <div class="card-body">
               
                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Tanggal  </label>
                            <input type="text" class="form-control datepicker" id="filter_tanggal" name="filter_tanggal" onchange="FilterTanggal(this)">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Total Anak</label> <br>
                            <span class="h4 text-success font-20 mt-2" id="total_anak"></span>      
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Total Orderan</label> <br>
                            <span class="h4 text-success font-20 mt-2" id="total_order"></span>      
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Total Tagihan </label> <br>
                            <span class="h5 text-danger text-strong mt-2">Rp. </span><span class="h4 text-danger font-20 mt-2" id="total_tagihan"></span>      
                        </div>
                    </div>
                </div>

                <hr>
               
                <div class="box-body">	
                    <div class="table-responsive">
                        <table id="datatable" class="table-sm table table-bordered mb-0 table-centered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: center">ANAK</th>
                                    <th style="text-align: center">JUMLAH MENU</th>
                                    <th  style="text-align: center">TAGIHAN</th>
                                    <th  style ="text-align: center">STATUS</th>
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

<div class="modal fade bd-example-modal" id="formModalOrder">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-food-fork-drink"></i> <strong>Order Makanan</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" class="form-control" id="anak_kode" name="anak_kode" disabled>

                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="username">Anak<small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="anak_nama" name="anak_nama" disabled>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label class="form-label" for="username">Menu <small class="text-danger">*</small></label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="menu" id="menu"></select>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <label class="form-label" for="username">Qty <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="qty" name="qty">
                            </div>
                            <div class="col-md-4 mt-2">
                                {{-- <label class="form-label" for="username">Aksi <small class="text-danger">*</small></label> --}}
                                <button type="button" class="btn btn-outline-info btn-sm mt-3 mb-1" data-toggle="modal" id="detail_save"><i class="fas fa-plus-circle"></i> Tambahkan Pesanan </button>
                            </div>
                            
                        </div><!--end row-->
                        <hr>
                        <table id="datatable" class="table table-sm table-bordered dt-responsive nowrap mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">HARGA</th>
                                    <th style="text-align: center">QTY</th>
                                    <th style="text-align: center">TOTAL</th>
                                    <th style="text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="show_data_detail"></tbody>
                        </table>
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th width="83%" style="text-align: right; vertical-align: middle;" colspan="4">TOTAL BIAYA</th>
                                    <th style="text-align: right;background:white; color:#ff0002" id="total_biaya"></th>
                                </tr>
                            </thead>
                        </table><!--end /table-->
                    </div><!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-xs" id="btn_save"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal" id="formModalUpdateOrder">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-food-fork-drink"></i> <strong>Order Makanan</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" class="form-control" id="anak_kode_edit" name="anak_kode" disabled>
                        <input type="hidden" class="form-control" id="order_kode_edit" name="order_kode" disabled>

                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="username">Anak <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="anak_nama_edit" name="anak_nama" disabled>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label class="form-label" for="username">Menu <small class="text-danger">*</small></label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="menu" id="menu_edit"></select>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <label class="form-label" for="username">Qty <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="qty_edit" name="qty">
                            </div>
                            <div class="col-md-4 mt-2">
                                {{-- <label class="form-label" for="username">Aksi <small class="text-danger">*</small></label> --}}
                                <button type="button" class="btn btn-outline-info btn-sm mt-3 mb-1" data-toggle="modal" id="detail_update"><i class="fas fa-plus-circle"></i> Tambahkan Pesanan </button>
                            </div>
                            
                        </div><!--end row-->
                        <hr>
                        <table id="datatable" class="table table-sm table-bordered dt-responsive nowrap mb-0" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">HARGA</th>
                                    <th style="text-align: center">QTY</th>
                                    <th style="text-align: center">TOTAL</th>
                                    <th style="text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="show_data_detail_update"></tbody>
                        </table>
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th width="83%" style="text-align: right; vertical-align: middle;" colspan="4">TOTAL BIAYA</th>
                                    <th style="text-align: right;background:white; color:#ff0002" id="total_biaya_edit"></th>
                                </tr>
                            </thead>
                        </table><!--end /table-->
                    </div><!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" id="btn_delete"><i class="fa fa-trash"></i> BATALKAN PESANAN</button>
                <button type="button" class="btn btn-warning btn-xs" id="btn_update"><i class="fas fa-save"></i> UPDATE</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        
        $('.datepicker[name=filter_tanggal]').val(moment().format('DD-MM-YYYY'));
        $('.select2').select2();
        
        $('.datepicker').datepicker({
            autoclose: true,
            format:'dd-mm-yyyy',
        });

        var tanggal  = $('#filter_tanggal').val();
        view(tanggal);
    

    });

    function FilterTanggal(select){
        var tanggal  = $('#filter_tanggal').val();
        view(tanggal);
    
    }

    function reset() {
        $('#menu').val("").trigger("change");
        $('#qty').val("");
    }
    
    $('#btn_save').on('click', function(){
       
        var tanggal     = $('#filter_tanggal').val();
        var anak_kode   = $('#anak_kode').val();
        var total_biaya = $('#total_biaya').text();
        var token       = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('tanggal', tanggal);
        formData.append('anak_kode', anak_kode);
        formData.append('total_biaya', total_biaya);
        formData.append('_token', token);
 
        $.ajax({
            type: "POST",
            url: "{{ route('catering.order.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                    $('#formModalOrder').modal('hide');
                    var kode = $('#anak_kode').val();                    
                    var tanggal  = $('#filter_tanggal').val();
                    view_detail(kode,tanggal);
                    view(tanggal);

                    swal("Berhasil !", "Data Sudah Di Simpan !!.", "success");
                    reset();
            }
        });

        return false;

    });

    $('#btn_update').on('click', function(){
       
        var order_kode   = $('#order_kode_edit').val();
        var anak_kode    = $('#anak_kode_edit').val();
        var total_biaya  = $('#total_biaya_edit').text();
        var token        = $('[name=_token]').val();

        var formData     = new FormData();

        formData.append('order_kode', order_kode);
        formData.append('anak_kode', anak_kode);
        formData.append('total_biaya', total_biaya);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.order.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                    $('#formModalUpdateOrder').modal('hide');
                    var kode     = $('#anak_kode').val();                    
                    var tanggal  = $('#filter_tanggal').val();
                    view_detail(kode,tanggal);
                    view(tanggal);

                    swal("Berhasil !", "Data Sudah Di Simpan !!.", "success");
                    reset();
            }
        });

        return false;

    });
    
    $('#btn_delete').on('click', function(){
       
        var order_kode   = $('#order_kode_edit').val();
        var anak_kode    = $('#anak_kode_edit').val();
        var token        = $('[name=_token]').val();

        var formData     = new FormData();

        formData.append('order_kode', order_kode);
        formData.append('anak_kode', anak_kode);
        formData.append('total_biaya', total_biaya);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.order.delete') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                    $('#formModalUpdateOrder').modal('hide');
                    var kode     = $('#anak_kode').val();                    
                    var tanggal  = $('#filter_tanggal').val();
                    view_detail(kode,tanggal);
                    view(tanggal);

                    swal("Berhasil !", "Data Sudah Di Simpan !!.", "success");
                    reset();
            }
        });

        return false;

    });

    $('#detail_save').on('click', function(){

        if (!$("#menu").val()) {
            $.toast({
                text: 'MENU HARUS DI PILIH',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#menu").focus();
            return false;

        } 
        else if (!$("#qty").val()) {
            
            $.toast({
                text: 'QTY HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#qty").focus();
            return false;

        }
       
        var anak_kode = $('#anak_kode').val();
        var tanggal = $('#filter_tanggal').val();
        var qty       = $('#qty').val();
        var menu      = $('#menu').val();
        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('tanggal', tanggal);
        formData.append('anak_kode', anak_kode);
        formData.append('qty', qty);
        formData.append('menu', menu);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.order.detail_save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                    var kode     = $('#anak_kode').val();                    
                    var tanggal  = $('#filter_tanggal').val();
                    view_detail(kode,tanggal);
                    view(tanggal);

                    $.toast({
                        text: 'DATA BERHASIL DI TAMBAHKAN',
                        position: 'top-right',
                        loaderBg: '#fff716',
                        icon: 'success',
                        hideAfter: 3000
                    });
                    reset();
            }
        });

        return false;

    });

    $('#detail_update').on('click', function(){

        if (!$("#menu_edit").val()) {
            $.toast({
                text: 'MENU HARUS DI PILIH',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#menu_edit").focus();
            return false;

        } 

        else if (!$("#qty_edit").val()) {
            
            $.toast({
                text: 'QTY HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#qty_edit").focus();
            return false;

        } 

        var tanggal    = $('#filter_tanggal').val();
        var order_kode = $('#order_kode_edit').val();
        var anak_kode  = $('#anak_kode_edit').val();
        var qty        = $('#qty_edit').val();
        var menu       = $('#menu_edit').val();
        var token      = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('tanggal', tanggal);
        formData.append('order_kode', order_kode);
        formData.append('anak_kode', anak_kode);
        formData.append('qty', qty);
        formData.append('menu', menu);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.order.detail_update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                 
                    var kode     = $('#order_kode_edit').val();                    
                    var tanggal  = $('#filter_tanggal').val();
                    view_detail_update(kode,tanggal);
                    view(tanggal);

                    $.toast({
                        text: 'DATA BERHASIL DI TAMBAHKAN',
                        position: 'top-right',
                        loaderBg: '#fff716',
                        icon: 'success',
                        hideAfter: 3000
                    });
                    reset();
            }
        });

        return false;

    });

    function view(tanggal) {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.order.view') }}",
            async: true,
            dataType: 'JSON',
            data:{tanggal:tanggal},
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                
                document.getElementById("total_anak").innerHTML= r.total_anak;
                document.getElementById("total_order").innerHTML= r.total_order;
                document.getElementById("total_tagihan").innerHTML= r.total_tagihan;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="20%">'),
                            $('<td width="5%" align="center">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="center">')
                        ]);
             
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].anak_jekel)+' - '+(data[i].usia_anak)+'</small>'));                      

                        // tr.find('td:nth-child(3)').append($('<div>')
                        //     .html((data[i].ortu_ibu)+' - <small class="text-muted">(Ibu)</span></small>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html(data[i].jumlah_order));      

                        // tr.find('td:nth-child(4)').append($('<div>')
                        //     .html(data[i].kode.order_kode));      

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b class="font-13 text-danger">'+(data[i].tagihan_order)+'</b>')); 

                        if ((data[i].status_order) == '0' ) {

                            tr.find('td:nth-child(5)').append('<div><a class="add_orderan nav-link btn btn-xs btn-outline-success waves-effect waves-light dropdown-toggle arrow-none" id="dLabel4" d role="button" aria-haspopup="false" aria-expanded="false" href="javascript:;" class="btn btn-soft-warning btn-xs" data="'+data[i].anak+'" > <span> <i class="fas fa-shopping-basket"> </i> Order Makanan </span></a></div>');

                        } 
                        
                        else {

                            tr.find('td:nth-child(5)').append('<div><a class="update_orderan nav-link btn btn-xs btn-outline-primary waves-effect waves-light dropdown-toggle arrow-none" id="dLabel4" d role="button" aria-haspopup="false" aria-expanded="false" href="javascript:;" class="btn btn-soft-warning btn-xs" data="'+data[i].order_kode+'" > <span> <i class="fas fa-shopping-basket"> </i> Tambah Orderan </span></a></div>');

                        }                      

                        tr.appendTo($('#show_data'));
                    }
                }

               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_detail(kode,tanggal) {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.order.detail_view') }}",
            async: true,
            dataType: 'JSON',
            data:{kode:kode,tanggal:tanggal},
            success: function(r) {
                var i;
                
                $('#show_data_detail').empty();
                data = r.data;

                console.log(data);
                document.getElementById("total_biaya").innerHTML='<b class="text-danger font-20">'+r.total+'</b>';
            
                $('[name="total_biaya"]').val(r.total);
                $('[name="grand_total"]').val(r.total);

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="50%" align="left">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="1%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b>'+(data[i].menu_nama)+'</b>')); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small>'+(data[i].kat_nama)+'</small>'));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].harga_tampil)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].detail_qty)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].total_tampil))); 

                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-danger btn-xs item_delete" data="'+data[i].detail_id+'"><i class="fa fa-trash"></i></a></div>');  

                        tr.appendTo($('#show_data_detail'));
                    }


                } else {

                    $('#show_data_detail').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });

    }
    
    function view_detail_update(kode,tanggal) {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.order.detail_view_update') }}",
            async: true,
            dataType: 'JSON',
            data:{kode:kode,tanggal:tanggal},
            success: function(r) {
                var i;
                
                $('#show_data_detail_update').empty();
                data = r.data;

                console.log(data);
                document.getElementById("total_biaya_edit").innerHTML='<b class="text-danger font-20">'+r.total+'</b>';
            
                $('[name="total_biaya"]').val(r.total);
                $('[name="grand_total"]').val(r.total);

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="50%" align="left">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="10%" align="right">'),
                            $('<td width="1%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b>'+(data[i].menu_nama)+'</b>')); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small>'+(data[i].kat_nama)+'</small>'));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].harga_tampil)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].detail_qty)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].total_tampil))); 

                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-danger btn-xs item_delete" data="'+data[i].detail_id+'"><i class="fa fa-trash"></i></a></div>');  

                        tr.appendTo($('#show_data_detail_update'));
                    }


                } else {

                    $('#show_data_detail_update').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });

    }
    


    $('#show_data').on('click','.add_orderan',function(){

        var id      = $(this).attr('data');
        var tanggal = $('#filter_tanggal').val();
        view_detail(id,tanggal);
        combo_menu();

        $.ajax({
            type : "GET",
            url   : "{{ route('dapok.anak.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(r){

                data = r.data;

                $('#formModalOrder').modal('show');
                $('#formModalOrder').find('[name="anak_kode"]').val(data.anak_kode);
                $('#formModalOrder').find('[name="anak_nama"]').val(data.anak_nama);
            }
        });

        return false;

    });

    $('#show_data').on('click','.update_orderan',function(){

        var id      = $(this).attr('data');
        var tanggal = $('#filter_tanggal').val();
        view_detail_update(id,tanggal);
        combo_menu();

        $.ajax({
            type : "GET",
            url   : "{{ route('catering.order.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){


                $('#formModalUpdateOrder').modal('show');
                $('#formModalUpdateOrder').find('[name="anak_kode"]').val(data.anak_kode);
                $('#formModalUpdateOrder').find('[name="anak_nama"]').val(data.anak_nama);
                $('#formModalUpdateOrder').find('[name="order_kode"]').val(data.order_kode);
            }
        });

        return false;

    });

    $('#show_data_detail').on('click','.btn_delete',function(){
        
        var id=$(this).attr('data');
        swal({
                title: "Anda Yakin Hapus Semua Pesanan ?",
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
                    url   : "{{ route('catering.order.delete') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        var kode = $('#anak_kode').val();                    
                        view_detail(kode);
                        var tanggal  = $('#filter_tanggal').val();
                        view(tanggal);
                        swal("Di Hapus !", "Data Sudah Di-Hapus !!.", "success");
                    }
                });  
            }
        });
    });

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
                    url   : "{{ route('catering.order.detail_delete') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        var kode = $('#anak_kode').val();                    
                        view_detail(kode);
                        var tanggal  = $('#filter_tanggal').val();
                        view(tanggal); 
                        swal("Di Hapus !", "Data Sudah Di-Hapus !!.", "success");
                    }
                });  
            }
        });
    });

    $('#show_data_detail_update').on('click','.item_delete',function(){
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
                    url   : "{{ route('catering.order.detail_delete') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        var kode = $('#order_kode_edit').val();                    
                        view_detail_update(kode);
                        var tanggal  = $('#filter_tanggal').val();
                        view(tanggal); 
                        swal("Di Hapus !", "Data Sudah Di-Hapus !!.", "success");
                    }
                });  
            }
        });
    });



    function combo_menu(){

        $('select[name=menu]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_catering_menu') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=menu]').empty()
                var x = document.getElementById("menu");
                        var option = document.createElement("option");
                        option.text = "Pilih";
                        option.value = '';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].menu_kode)+'>'+(data[i].kat_nama)+' - '+(data[i].menu_nama)+'</option>';
                    $('select[name=menu]').append(html)
                }
            }
        });

    }

    function combo_filter_kategori(){

        $('select[name=filter_kategori]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kategori') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=filter_kategori]').empty()
                var x = document.getElementById("filter_kategori");
                        var option = document.createElement("option");
                        option.text = "Semua";
                        option.value = 'Semua';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kat_kode)+'>'+(data[i].kat_nama)+'</option>';
                    $('select[name=filter_kategori]').append(html)
                }
            }
        });

    }

    function combo_filter_grup(){

        $('select[name=filter_grup]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_grup_detail') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=filter_grup]').empty()
                var x = document.getElementById("filter_grup");
                        var option = document.createElement("option");
                        option.text = "Semua";
                        option.value = 'Semua';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_kode)+'>'+(data[i].detail_nama)+'</option>';
                    $('select[name=filter_grup]').append(html)
                }
            }
        });

    }
    
</script>


@endsection