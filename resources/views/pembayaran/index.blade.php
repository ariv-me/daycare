@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
        <div class="card-header bg-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title text-white"><i class="mdi mdi-cash-multiple"></i> DATA - PEMBAYARAN</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"></i> TAMBAH DATA </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="box-body">					
                    <table id="datatable" class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th width ="5%" style="text-align: center">NO</th>
                                <th width ="80%" style="text-align: center">KODE</th>
                                <th width ="10%" style ="text-align: center">TANGGAL</th>
                                <th width ="10%" style ="text-align: center">TAGIHAN</th>
                                <th width ="10%" style ="text-align: center">BAYAR</th>
                            </tr>
                        </thead>
                        <tbody id="show_data"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Tambah Data Kategori</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="nama" id="nama">
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" id="btn_save"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Edit Data Kategori</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <input type="hidden" name="id_edit" id="id_edit" class="form-control">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="nama_edit" id="nama_edit">
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm" id="btn_update"><i class="fas fa-save"></i> UPDATE</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

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

        if (!$("#nama").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nama").focus();
            return false;

        } 

        var nama = $('#nama').val();
        
        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('nama', nama);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tarif.jenis.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                    
                    view();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalAdd').modal('hide');
                
               
            }
        });

    return false;

    });


    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.jenis.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        if((data[i].jenis_aktif) == 'Y'){
                            var tr = $('<tr>').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="50%">'),
                                $('<td class= width="5%" align="center">')

                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td class= width="1%" align="center">'),
                                $('<td class= width="50%">'),
                                $('<td class= width="5%" align="center">')
                
                            ]);

                        }

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].jenis_nama)));   
                        
                        
                        if((data[i].jenis_aktif) == 'Y'){

                            tr.find('td:nth-child(3)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].jenis_id+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].jenis_id+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        } else {
                            tr.find('td:nth-child(3)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs item_aktif" data="'+data[i].jenis_id+'"><i class="mdi mdi-check"></i></a></div>');   
                        }

                        

                        tr.appendTo($('#show_data'));
                    }

                }
               $('#datatable').DataTable('refresh'); 
            }
        });
    }


    $('#show_data').on('click','.item_edit',function(){

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('tarif.jenis.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="id_edit"]').val(data.jenis_id);
                $('#formModalEdit').find('[name="nama_edit"]').val(data.jenis_nama);
            }
        });

    return false;

    });

        $('#formModalEdit').on('shown.bs.modal', function () {
        $('#nama_edit').focus();
    })  

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


    
</script>


@endsection