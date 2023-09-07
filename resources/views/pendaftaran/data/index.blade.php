@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title text-white"><i class="fas fa-clipboard-list"></i>  DATA - PENDAFTARAN</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <a href="{{ route('pendaftaran.transaksi.index') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> PENDAFTARAN </a>
                        <a href="{{ route('pendaftaran.transaksi.index') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> TAGIHAN </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="box-body">					
                    <table id="datatable" class="table table-sm table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center">NO</th>
                                <th style="text-align: center">ANAK</th>
                                <th style="text-align: center">TGL LAHIR</th>
                                <th  style="text-align: center">JEKEL</th>
                                <th style="text-align: center">ORTU</th>
                                <th  style="text-align: center">PAKET</th>
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
            url: "{{ route('pendaftaran.data.view') }}",
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
                                $('<td width="15%">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="3%" align="center">'),
                                $('<td width="15%">'),
                                $('<td width="15%">'),
                                $('<td width="1%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#ffedc6;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="20%">'),
                                $('<td width="7%">'),
                                $('<td width="5%">'),
                                $('<td width="10%">'),
                                $('<td width="10%">'),
                                $('<td width="5%" align="center">')
                            ]);

                        }
             
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b>'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_tgl_lahir)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_jekel)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<b>Ayah : </b>'+(data[i].ortu_ayah)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<b>Ibu&nbsp;&nbsp;&nbsp; : </b>'+(data[i].ortu_ibu)));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html('<b>'+(data[i].jenis_nama)+'</b>')); 

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html('<b class="text-danger">'+(data[i].tarif_total)+'</b>'));

                    
                        tr.find('td:nth-child(7)').append('<div class="btn-group"><a href="'+(data[i].edit)+'" class="btn btn-soft-warning btn-xs"><i class="fas fa-pencil-alt"></i> EDIT</a><a href="javascript:;" class="btn btn-soft-primary btn-xs item_nonaktif" data="'+data[i].daftar_kode+'"><i class="far fa-credit-card"></i> BAYAR</a></div>');   

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