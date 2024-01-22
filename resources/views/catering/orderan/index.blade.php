@extends('app.layouts.template')

@section('css')
    <style>

        hr.hr-dashed {
            margin-top: 2rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px dashed #eceff5;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            height: 0;
            overflow: visible;
        }
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

        link.active {
            background: #ffb822;
            color: #fff;
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
                        <h4 class="card-title text-white"><i class="mdi mdi-food-fork-drink"></i>  ORDERAN</h4>          
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
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#orderan" role="tab" aria-selected="true"><b class="font-18"><i class="fas fa-shopping-basket"></i>  Orderan </b> | Total Anak : <b id="total_anak" class="badge badge-light font-15 text-danger"> </b> | Total Menu : <b id="total_order" class="badge badge-light font-15 text-danger"> </b> | Total Tagihan : <b> Rp.</b> <b id="total_tagihan" class="badge badge-light font-15 text-danger"> </b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#terima" role="tab" aria-selected="true"><b class="font-18"><i class="fas fa-clipboard-check"></i>  Di Terima </b> | Total Anak : <b id="total_anak_terima" class="badge badge-light font-15 text-danger"> </b> | Total Menu : <b id="total_order_terima" class="badge badge-light font-15 text-danger"> </b> | Total Tagihan : <b> Rp.</b> <b id="total_tagihan_terima" class="badge badge-light font-15 text-danger"> </b></a>
                            </li>
                       
                        </ul>
        
                    </div>
                </div>
                <hr>
               
                <div class="tab-content">
                    <div class="tab-pane active" id="orderan" role="tabpanel">
                        <div class="table-responsive">
                            <table id="datatable" class="table-sm table table-bordered mb-0 table-centered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th data-ordering="false" style="text-align: center; vertical-align:middle;"> </th>
                                        <th style="text-align: center">NO</th>
                                        <th style="text-align: center">MENU</th>
                                        <th style="text-align: center">ANAK</th>
                                        <th style="text-align: center">HARGA</th>
                                        <th style="text-align: center">QTY</th>
                                        <th  style="text-align: center">TAGIHAN</th>
                                        <th  style ="text-align: center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data"></tbody>
                            </table>
                        </div>	
                        <button type="button" class="btn btn-success waves-effect btn-sm waves-light mt-3" id="terima_orderan"><i class="mdi mdi-check-all mr-2"></i>Terima Orderan</button>
                    </div>
                    <div class="tab-pane " id="terima" role="tabpanel">
                        <div class="table-responsive">
                            <table id="datatable_terima" class="table-sm table table-bordered mb-0 table-centered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th data-ordering="false" style="text-align: center; vertical-align:middle;"> </th>
                                        <th style="text-align: center">NO</th>
                                        <th style="text-align: center">MENU</th>
                                        <th style="text-align: center">ANAK</th>
                                        <th style="text-align: center">HARGA</th>
                                        <th style="text-align: center">QTY</th>
                                        <th  style="text-align: center">TAGIHAN</th>
                                        <th  style ="text-align: center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_terima"></tbody>
                            </table>
                        </div>	
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
        view_terima(tanggal);

    });

    function FilterTanggal(select){
        var tanggal  = $('#filter_tanggal').val();
        view(tanggal);
        view_terima(tanggal);
    
    }

    function reset() {
        $('#menu').val("").trigger("change");
        $('#qty').val("");
    }
    
    $('#terima_orderan').on('click',function(e){
                //var semua=$(this).attr('data');
        e.preventDefault();
        var semua = [];

        $('input:checkbox[name=sub_chk]:checked').each(function(){
            semua.push($(this).val());
        });

        var _token = $('meta[name=csrf-token]').attr('content');

        swal({
                title: "Anda Yakin Terima Orderan Ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Terima !",
                closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                var _token = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type : "GET",
                    url   : "{{ route('catering.orderan.terima') }}",
                    dataType : "JSON",
                    data : {semua,_token},
                    success: function(data){
                        var tanggal  = $('#filter_tanggal').val();
                        view(tanggal);
                        view_terima(tanggal);
                        swal("Di Terima !", "Orderan Sudah Di Terima !!.", "success");
                    }
                });  
            }
        });

    });

    function view(tanggal) {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.orderan.view') }}",
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
                            $('<td width="1%" align="center">'),
                            $('<td width="10%">'),
                            $('<td width="15%">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="1%" align="center">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="center">')
                        ]);
             
                        tr.find('td:nth-child(1)').append($('<div>')
                            .html('<input href="javascript:;" type="checkbox" id="sub_chk" class="sub_chk" name="sub_chk" value="'+ data[i].detail_id +'">'));                           
                        
                        tr.find('td:nth-child(2)').html((i + 1));

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].menu_nama)+'</b>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].kat_nama)+'</small>'));    

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].anak_jekel)+' - '+(data[i].usia_anak)+'</small>'));                      

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html(data[i].detail_harga));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html(data[i].detail_qty));      

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html('<b class="font-13 text-danger">'+(data[i].detail_total)+'</b>')); 

                        if ((data[i].detail_status) == 'O' ) {

                            tr.find('td:nth-child(8)').append('<span class="badge badge-soft-danger">Belum di Terima</span>');
                        } 
                        
                        else {

                            tr.find('td:nth-child(8)').append('<span class="badge badge-soft-success">Sudah di Terima</span>');
                        }                      

                        tr.appendTo($('#show_data'));
                    }
                }

               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_terima(tanggal) {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.orderan.view_terima') }}",
            async: true,
            dataType: 'JSON',
            data:{tanggal:tanggal},
            success: function(r) {
                var i;
                $('#datatable_terima').DataTable().destroy(); 
                $('#show_data_terima').empty();
                data = r.data;
                
                document.getElementById("total_anak_terima").innerHTML= r.total_anak;
                document.getElementById("total_order_terima").innerHTML= r.total_order;
                document.getElementById("total_tagihan_terima").innerHTML= r.total_tagihan;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="1%" align="center">'),
                            $('<td width="10%">'),
                            $('<td width="15%">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="1%" align="center">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="center">')
                        ]);
             
                        tr.find('td:nth-child(1)').append($('<div>')
                            .html('<input href="javascript:;" type="checkbox" id="sub_chk" class="sub_chk" name="sub_chk" value="'+ data[i].detail_id +'">'));                           
                        
                        tr.find('td:nth-child(2)').html((i + 1));

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].menu_nama)+'</b>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].kat_nama)+'</small>'));    

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].anak_jekel)+' - '+(data[i].usia_anak)+'</small>'));                      

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html(data[i].detail_harga));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html(data[i].detail_qty));      

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html('<b class="font-13 text-danger">'+(data[i].detail_total)+'</b>')); 

                        if ((data[i].detail_status) == 'O' ) {

                            tr.find('td:nth-child(8)').append('<span class="badge badge-soft-danger">Belum di Terima</span>');
                        } 

                        else {

                            tr.find('td:nth-child(8)').append('<span class="badge badge-soft-success">Sudah di Terima</span>');
                        }                      

                        tr.appendTo($('#show_data_terima'));
                    }
                }

               $('#datatable_terima').DataTable('refresh'); 
            }
        });
    }

</script>


@endsection