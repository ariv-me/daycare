@extends('app.layouts.template')

@section('css')

    <style>
        .text-danger {
            color: #f5325c !important;
            line-height: 1.8;
        }
    </style>

@endsection

@section('content')

<div class="row mt-3">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title">Data - Orderan</h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                {!! csrf_field() !!}
  
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group top"> 
                            <label> <strong>Tanggal Awal</strong></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control datepicker" id="tanggal_awal" name="tanggal_awal" data-dtp="dtp_1uPaU">
                            </div>                                                   
                        </div>
                    </div>  

                    <div class="col-md-3">
                        <div class="form-group top"> 
                            <label> <strong>Tanggal Akhir</strong></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control datepicker" id="tanggal_akhir" name="tanggal_akhir">
                            </div>                                                   
                        </div>
                    </div>   

                    <div class="col-md-3">
                        <label> <strong>Status</strong></label>
                        <div class="input-group">
                            <select class="form-control custom-select select2" style="width: 100%;" name="status_filter" id="status_filter"></select>
                        </div>                                                   
                    </div>   
                    
                    <div class="col-md-1 mt-4">
                        <button type="button" class="btn btn-primary" id="btn_cari"><i class="fas fa-search"></i> </button>
                    </div>   
                </div>
            </div>

        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Total Piutang</h4>
            </div>
            <div class="card-body">
                   
                  <h1 class="text-danger" style="text-align: right"> <strong>Rp.</strong> <strong id="total">0</strong></h1>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
         
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link  active" data-toggle="tab" href="#order" role="tab" aria-selected="false"><strong><i class="fas fa-cart-arrow-down"></i> ORDER </strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#piutang" role="tab" aria-selected="false"> <strong><i class="fas fa-donate"></i> PIUTANG </strong></a>
                </li>                                                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane p-3 active" id="order" role="tabpanel">
       
                    <table id="datatable" class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th width ="1%" style="text-align: center">NO</th>
                                <th width ="18%" style="text-align: center">KODE</th>
                                <th style="text-align: center">MENU & JADWAL</th>
                                <th style="text-align: center">ANAK</th>
                                <th width ="10%" style="text-align: center">STATUS</th>
                                <th style="text-align: center">HARGA</th>
                                <th width ="5%" style="text-align: center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="show_data"></tbody>
                    </table>
            
                </div>
                <div class="tab-pane p-3" id="piutang" role="tabpanel">
                    <table class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th width ="1%" style="text-align: center">NO</th>
                                <th width ="10%" style="text-align: center">KODE</th>
                                <th style="text-align: center">TANGGAL</th>
                                <th style="text-align: center">STATUS</th>
                                <th style="text-align: center">HARGA</th>
                                <th width ="5%" style="text-align: center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="show_data_piutang">

                        </tbody>
                    </table>
                </div>                                                
            </div>        
      
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalSet">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">

                <input type="hidden" class="form-control" id="id_set" name="id_set">

                <div class="col-md-12">
                    <div class="form-group">
                        <label> <strong> Ubah Status </strong> <small class="text-danger">*</small></label>
                        <select class="form-control custom-select select2"  style="width: 100%;" name="status" id="status"></select>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" id="btn_set"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </div>
       
    </div>
</div>

<div class="modal fade  bd-example-modal-xl" id="formModalBayar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color: #ffffff">

            <div class="modal-body">
            
                {!! csrf_field() !!}
    
                <div class="row">

                    <input type="hidden" class="form-control" name="id_edit" id="id_edit" disabled="disabled">    

                    <div class="col-md-12">
                        <div class="table-responsive-sm">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <table class="border-0" width="150%">
                                            <tr>
                                                <td width="20%"> <b>Kode</b></td>
                                                <td width="5%"> <b> :</b></td>
                                                <td id="order_kode"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%"> <b>Tanggal </b></td>
                                                <td width="5%"> <b> :</b></td>
                                                <td id="tanggal"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%"> <b>Nama</b></td>
                                                <td width="5%"> <b>:</b></td>
                                                <td width="200%" id="nama"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%"> <b>Unit</b></td>
                                                <td width="5%"> <b>:</b></td>
                                                <td width="200%" id="usaha"></td>
                                            </tr>
                                        </table>
                                    </div><!--end col-->                                                                                 
                                </div><!--end row-->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive project-invoice">
                                            <table class="table table-bordered mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th width="5%" style="text-align: center">NO</th>
                                                        <th width="30%" style="text-align: center">MENU</th>
                                                        <th width="15%" style="text-align: center">JADWAL</th> 
                                                        <th width="20%" style="text-align: center">ANAK</th>
                                                        <th width="10%" style="text-align: center">HARGA</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show_data_detail">
                                               </tbody>
                                            </table><!--end table-->
                                        </div>  <!--end /div-->                            
                                    </div>  <!--end col-->                                      
                                </div><!--end row-->

                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <h5 class="mt-4">Terbilang :</h5>
                                            <small id="terbilang" class="font-12"> </small>
                                        </ul>
                                    </div> <!--end col-->                                       
                                    <div class="col-lg-4 align-self-end">
                                        <div class="float-right mt-2">
                                            <div class="form-group row mb-2">
                                                <label for="horizontalInput1" class="col-sm-2 col-form-label"> <strong>TOTAL</strong></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="total_trans" name="total_trans" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="horizontalInput1" class="col-sm-2 col-form-label"> <strong>BAYAR</strong></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="total_trans" name="total_trans">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                                <hr>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                                        <div class="text-center"><small class="font-12">Thank you very much for doing business with us.</small></div>
                                    </div><!--end col-->
                                    <div class="col-lg-12 col-xl-4">
                                        <div class="float-right d-print-none">
                                            <a href="javascript:window.print()" class="btn btn-info"><i class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-primary">Submit</a>
                                            <a href="#" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        combo_status_filter();

        $('.select2').select2();
        $('.datepicker').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });
        $('.datepicker[name=tanggal_awal]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker[name=tanggal_akhir]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker').datepicker({
          autoclose: true,
          format:'dd-mm-yyyy',
        });  

        var tgl_mulai = $('#tanggal_awal').val();
        var tgl_akhir = $('#tanggal_akhir').val();
        var status    = $('#status_filter').val();
        
        console.log(status);

        combo_status();
        view(tgl_mulai,tgl_akhir,status);
        view_piutang(tgl_mulai,tgl_akhir,status);

    });

    $('#btn_cari').on('click',function(){

        var tgl_mulai = $('#tanggal_awal').val();
        var tgl_akhir = $('#tanggal_akhir').val();
        var status    = $('#status_filter').val();

        view(tgl_mulai,tgl_akhir,status);
        view_piutang(tgl_mulai,tgl_akhir,status);

    })

    function view(tgl_mulai,tgl_akhir,status) {

        $.ajax({
            type: 'GET',
            url: "{{ route('order.data_view') }}",
            async: true,
            data : {tgl_mulai:tgl_mulai,tgl_akhir:tgl_akhir,status:status},
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                   
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="5%" align="left">'),
                                $('<td class= width="13%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="5%" align="right">'),
                                $('<td class= width="5%" align="center">'),
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].order_kode)));   

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<i class="mdi mdi-calendar-clock text-dark"></i> '+ (moment(data[i].detail_tgl).format('DD-MM-YYYY')) + ' - ' + (data[i].detail_jam) ));   
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].menu_nama) + ('  -   ') + ('[ ') + (data[i].kat_nama) + (' ]')));
                        
                        if((data[i].detail_jadwal) == 'Pagi'){
                            tr.find('td:nth-child(3)').append($('<div>').addClass('text-success')
                            .html('<i class="mdi mdi-weather-sunset-up text-dark"></i> '+ (data[i].detail_jadwal) ));   

                        }else if((data[i].detail_jadwal) == 'Siang'){
                            tr.find('td:nth-child(3)').append($('<div>').addClass('text-warning')
                            .html('<i class="mdi mdi-weather-sunny text-dark"></i> '+ (data[i].detail_jadwal) ));   
                        
                        }else{
                            tr.find('td:nth-child(3)').append($('<div>').addClass('text-purple')
                            .html('<i class="mdi mdi-weather-night text-dark"></i> '+ (data[i].detail_jadwal) ));
                        }

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_nama) ));

                       

                        if((data[i].detail_status) == 'O'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-danger')
                                .html('Open'));
                            tr.find('td:nth-child(7)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs status_set" data="'+data[i].detail_id+'"><i class="fas fa-align-justify"></i></a></div>');   
                        } else if((data[i].detail_status) == 'P'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-primary')
                                .html('Proses'));
                            tr.find('td:nth-child(7)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs status_set" data="'+data[i].detail_id+'"><i class="fas fa-align-justify"></i></a></div>');   
                        } else if ((data[i].detail_status) == 'S'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-success')
                                .html('Selesai'));
                            tr.find('td:nth-child(7)').append('<div class="btn-group"><i class="fas fa-check-circle text-success"></i></a></div>');   
                        }

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].harga_jual_tampil)));     

                        tr.find('td:nth-child(5)').append($('<span>')
                            .html('<br><i class="mdi mdi-account-outline text-dark"></i> '+ (data[i].petugas_nama) + ' - ' + (data[i].updated_jam) ));   
                      
                        
                        tr.appendTo($('#show_data'));
                    }

                } //else {

                //       $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                //  }
                $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_piutang(tgl_mulai,tgl_akhir,status) {

        $.ajax({
            type: 'GET',
            url: "{{ route('order.piutang_view') }}",
            async: true,
            data : {tgl_mulai:tgl_mulai,tgl_akhir:tgl_akhir,status:status},
            dataType: 'JSON',
            success: function(r) {
                var i;
                // $('#datatable2').DataTable().destroy(); 
                $('#show_data_piutang').empty();
                data = r.data;
                total = r.total;

                document.getElementById("total").innerHTML="<b>"+total+"</b>";
               

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                   
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="5%" align="left">'),
                                $('<td class= width="5%" align="center">'),
                                $('<td class= width="13%" align="center">'),
                                $('<td class= width="10%" align="right">'),
                                $('<td class= width="5%" align="center">'),
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].order_kode)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<i class="mdi mdi-calendar-clock text-dark"></i> '+ (moment(data[i].detail_tgl).format('DD-MM-YYYY')) + ' - ' + (data[i].order_jam) ));  

                        if ((data[i].order_status) == 'U'){
                            tr.find('td:nth-child(4)').append($('<span>').addClass('badge badge-danger')
                                .html('UTANG'));
                        } else {
                            tr.find('td:nth-child(4)').append($('<span>').addClass('badge badge-success')
                                .html('LUNAS'));
                        }

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].total_tampil)));   
                        
                        tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs btn_bayar" data="'+data[i].order_kode+'"><i class="fas fa-align-justify"></i></a></div>');   
                        
                        tr.appendTo($('#show_data_piutang'));
                    }

                } else {

                     $('#show_data_piutang').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
            // $('#datatable2').DataTable('refresh'); 
            }
        });
    }

    function view_detail($id) {

        $.ajax({
            type: 'GET',
            url: "{{ route('order.detail') }}",
            async: true,
            data : {id:$id},
            dataType: 'JSON',
            success: function(r) {
                var i;
                // $('#datatable').DataTable().destroy(); 
                $('#show_data_detail').empty();

                data = r.data;
                kode = r.kode;
                tgl = r.order_tgl;
                nama = r.nama;
                usaha = r.usaha;
                terbilang = r.terbilang;

                document.getElementById("order_kode").innerHTML=kode;
                document.getElementById("tanggal").innerHTML=tgl;
                document.getElementById("nama").innerHTML=nama;
                document.getElementById("usaha").innerHTML=usaha;
                document.getElementById("terbilang").innerHTML=terbilang;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td class= width="1%" align="center">'),
                            $('<td class= width="20%" align="left">'),
                            $('<td class= width="15%" align="center">'),
                            $('<td class= width="15%" align="center">'),
                            $('<td class= width="10%" align="right">')
                        ]);
                    
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].menu_nama)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].detail_jadwal)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_nama)));
                            
                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].harga_tampil)));   

                        tr.appendTo($('#show_data_detail'));
                    }

                }
            // $('#datatable').DataTable('refresh'); 
            }
        });
    }

    

    $('#show_data').on('click','.status_set',function(){

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('order.detail_edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
                $('#formModalSet').modal('show');    
                $('#formModalSet').find('[name="id_set"]').val(data.detail_id);      
                $('#formModalSet').find('[name="status"]').val(data.detail_status).trigger("change");

                var tgl_mulai = $('#tanggal_awal').val();
                var tgl_akhir = $('#tanggal_akhir').val();
                var status    = $('#status_filter').val();

                view(tgl_mulai,tgl_akhir,status);
            
            }
        });

        return false;

    });

    function combo_status(){
        $('select[name=status]').empty()
            var html = '';
            html = '<option value="">Pilih Status</option>'+
                   '<option value="O">Open</option>'+
                   '<option value="P">Proses</option>'+
                   '<option value="S">Selesai</option>';
            $('select[name=status]').append(html)
    }

    function combo_status_filter(){
        $('select[name=status_filter]').empty()
            var html = '';
            html = '<option value="Semua">Semua</option>'+
                   '<option value="O">Open</option>'+
                   '<option value="P">Proses</option>'+
                   '<option value="S">Selesai</option>';
            $('select[name=status_filter]').append(html)
    }

    $('#btn_set').on('click',function(){

        if (!$("#status").val()) {
            $.toast({
                text: 'STATUS HARUS DI ISI',
                position: 'top-left',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#status").focus();
            return false;

        } 
       
        var kode = $('#id_set').val();
        var status = $('#status').val();

        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('kode', kode);
        formData.append('status', status);
        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('order.detail_update') }}",
            dataType : "JSON",
            data : formData,
            cache : false,
            processData : false,
            contentType : false,
            success: function(data){
                $('#formModalSet').modal('hide');
                swal("Berhasil!", "Data Berhasil Diupdate", "success");
                var tgl_mulai = $('#tanggal_awal').val();
                var tgl_akhir = $('#tanggal_akhir').val();
                var status    = $('#status_filter').val();
                view(tgl_mulai,tgl_akhir,status);
                
            }
        });

        return false;
    });

    $('#show_data_piutang').on('click','.btn_bayar',function(){   

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('order.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                $('#formModalBayar').modal('show');    
                $('#formModalBayar').find('[name="id_edit"]').val(data.order_kode);      
                $('#formModalBayar').find('[name="total_trans"]').val(data.order_total);

                var tgl_mulai = $('#tanggal_awal').val();
                var tgl_akhir = $('#tanggal_akhir').val();

                view_piutang(tgl_mulai,tgl_akhir);
                view_detail(id)

            }
        });
   
    });

    $('#btn_bayar').on('click', function(){    

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('order.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(r){

                $('#formModalBayar').modal('show');    
                $('#formModalBayar').find('[name="id_edit"]').val(data.order_kode);      
                $('#formModalBayar').find('[name="total"]').val(data.order_total);

                var tgl_mulai = $('#tanggal_awal').val();
                var tgl_akhir = $('#tanggal_akhir').val();

                view(tgl_mulai,tgl_akhir,status);

            }
        });
    });


    
</script>


@endsection