@extends('app.layouts.template')

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
                <h4 class="card-title">Total Tagihan</h4>
            </div>
            <div class="card-body">
                   
                  <h1 class="text-danger" style="text-align: right">Rp.<strong id="total"></strong></h1>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered mb-0 table-centered">
                    <thead>
                        <tr>
                            <th style="text-align: center">NO</th>
                            <th style="text-align: center">KODE ORDER</th>
                            <th style="text-align: center">MENU</th>
                            <th style="text-align: center">NAMA ANAK</th>
                            <th style="text-align: center">STATUS</th>
                            <th style="text-align: center">HARGA</th>
                            <th style="text-align: center">STATUS</th>
                        </tr>
                    </thead>
                   <tbody id="show_data"></tbody>
            </table>
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


@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();
        $('.datepicker').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });
        $('.datepicker[name=tanggal_awal]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker[name=tanggal_akhir]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker').datepicker({
          autoclose: true,
          format:'dd-mm-yyyy',
        });  
        
        combo_status();
        view();

    });

    function view(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('order.data_view') }}",
            async: true,
            data : {kode:kode},
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                total = r.total;

                console.log(total);

                document.getElementById("total").innerHTML="<b>"+total+"</b>";

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                   
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="5%" align="center">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="left">'),
                                $('<td class= width="10%" align="center">'),
                                $('<td class= width="5%" align="right">'),
                                $('<td class= width="5%" align="center">'),
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].order_kode)));   
                        
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
                            .html('OPEN'));
                            tr.find('td:nth-child(7)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs status_set" data="'+data[i].detail_id+'"><i class="fas fa-align-justify"></i></a></div>');   
                        } else if((data[i].detail_status) == 'P'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-primary')
                            .html('PROSES'));
                            tr.find('td:nth-child(7)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs status_set" data="'+data[i].detail_id+'"><i class="fas fa-align-justify"></i></a></div>');   
                        } else if ((data[i].detail_status) == 'S'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-success')
                            .html('SELESAI'));
                            tr.find('td:nth-child(7)').append('<div class="btn-group"><i class="fas fa-check-circle text-success"></i></a></div>');   
                        }

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].harga_jual_tampil)));     
                        
                      
                        
                        tr.appendTo($('#show_data'));
                    }

                } else {

                     $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
            //$('#datatable').DataTable('refresh'); 
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
                view();
            
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
                view();
            }
        });

        return false;
        });

    
</script>


@endsection