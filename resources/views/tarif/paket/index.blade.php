@extends('app.layouts.template')



@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                     <h4 class="card-title"><i class="mdi mdi-cash-multiple"></i> TARIF - PAKET</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"></i> TAMBAH DATA </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
     					
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center">NO</th>
                                <th style="text-align: center">KODE</th>
                                <th style="text-align: center">NAMA</th>
                                <th style="text-align: center">GRUP</th>
                                <th style="text-align: center">JENIS</th>
                                <th style="text-align: center">KATEGORI</th>
                                <th style="text-align: center">HARGA</th>
                                <th style="text-align: center">AKSI</th>
                            </tr>
                        </thead>
                       <tbody id="show_data"></tbody>
                    </table>
   
            </div>
        </div>
    </div>
</div>


<div class="modal fade  bd-example-modal" id="formModalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="fas fa-plus-circle"></i> <strong>Tarif - Paket</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label> <strong>Jenis</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jenis" id="jenis"></select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label> <strong>Kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori"></select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label> <strong>Grup</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="grup" id="grup"></select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="nama" id="nama">
                        </div>
                    </div>

                    <div class="col-md-9">
                        <label> <strong>Item</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <select class="form-control custom-select select2" style="width: 100%;" name="item" id="item"></select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="button" class="btn btn-outline-primary  btn-block btn-xs waves-effect waves-light mt-2" id="detail_save_add"> <i class="fas fa-plus-circle ml-1"></i> Tambah</button>
                    </div>
                 
                </div>
                <hr>
                <table id="" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th style="text-align: center">NO</th>
                            <th style="text-align: center">NAMA</th>
                            <th style="text-align: center">NOMINAL</th>
                            <th style="text-align: center">AKSI</th>
                        </tr>
                    </thead>
                   <tbody id="detail_add"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" id="btn_save"><i class="fas fa-save"></i> SAVE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="fas fa-pencil"></i> <strong>Tarif - Paket</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">
                    <input class="form-control" type="hidden" name="id_edit" id="id_edit">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label> <strong>Jenis</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jenis" id="jenis_edit"></select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label> <strong>Kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori_edit"></select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label> <strong>Grup</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="grup" id="grup_edit"></select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="nama" id="nama_edit">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label> <strong>Item</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <select class="form-control custom-select select2" style="width: 100%;" name="item" id="item_edit"></select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="button" class="btn btn-outline-primary  btn-block btn-xs waves-effect waves-light mt-2" id="detail_save_edit"> <i class="fas fa-plus-circle ml-1"></i> Tambah</button>
                    </div>
                 
                </div>
                <hr>
                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th style="text-align: center">NO</th>
                            <th style="text-align: center">NAMA</th>
                            <th style="text-align: center">NOMINAL</th>
                            <th style="text-align: center">AKSI</th>
                        </tr>
                    </thead>
                   <tbody id="detail_edit"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-xs" id="btn_update"><i class="fas fa-save"></i> UPDATE</button>
            </div>
        </div>
    </div>
</div>






@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();
        view();
        reset();

    });

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="5%" align="center">'),
                            $('<td width="20%">'),
                            $('<td width="15%" align="left">'),
                            $('<td width="5%" align="left">'),
                            $('<td width="5%" align="left">'),
                            $('<td width="7%" align="right">'),
                            $('<td width="1%" align="center">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].tarif_kode)));   
                            
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].tarif_nama)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].grup_nama)));

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].jenis_nama)));

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].kat_nama)));   

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html('<b>'+(data[i].total)+'</b>'));   
                        

                        tr.find('td:nth-child(8)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].tarif_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].tarif_kode+'"><i class="fa fa-trash"></i></a></div>');                          
                      
                        

                        tr.appendTo($('#show_data'));
                    }

                }
            $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function detail_add(id) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.detail_view') }}",
            async: true,
            dataType: 'JSON',
            data:{id:id},
            success: function(r) {
                var i;
              
                $('#detail_add').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="30%" align="left">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="1%" align="center">')
                        ]);
                       
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].detail_nama)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b>'+(data[i].nominal)+'</b>'));   

                        tr.find('td:nth-child(4)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-danger btn-xs detail_delete" data="'+data[i].detail_id+'"><i class="fa fa-trash"></i></a></div>');  

                        tr.appendTo($('#detail_add'));
                    }

                } else {

                        $('#detail_add').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }

            }
        });
    }

    function detail_edit(id) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.detail_view') }}",
            async: true,
            dataType: 'JSON',
            data:{id:id},
            success: function(r) {
                var i;
                $('#detail_edit').empty();
                data = r.data;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="30%" align="left">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="1%" align="center">')
                        ]);
                       
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].detail_nama)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b>'+(data[i].nominal)+'</b>'));   

                        tr.find('td:nth-child(4)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-danger btn-xs detail_delete" data="'+data[i].detail_id+'"><i class="fa fa-trash"></i></a></div>');  

                        tr.appendTo($('#detail_edit'));
                    }

                } else {

                        $('#detail_edit').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }


            }
        });
    }

    function reset() {
        $('#kode').val("");
        $('#nama').val("");
        $('#harga').val("");
        $('#harga_jual').val("");
    }

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        $('#id_edit').val("");
        detail_add();
        combo_tarif_item();
        combo_tarif_jenis();
        combo_tarif_kategori();
        combo_grup();
        reset();

    });

    

    $('#btn_save').on('click', function(){

        if (!$("#jenis").val()) {
            $.toast({
                text: 'JENIS HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#jenis").focus();
            return false;

        } 
            
        else if (!$("#kategori").val()) {
            $.toast({
                text: 'KATEGORI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kategori").focus();
            return false;

        } 

        else if (!$("#grup").val()) {
            $.toast({
                text: 'GRUP HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#grup").focus();
            return false;

        } 

        else if (!$("#nama").val()) {
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

        var jenis        = $('#jenis').val();
        var nama         = $('#nama').val();
        var kategori     = $('#kategori').val();
        var grup         = $('#grup').val();

        var token = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('jenis', jenis);
        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('grup', grup);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tarif.save') }}",
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

    $('#btn_update').on('click', function(){

        if (!$("#jenis_edit").val()) {
            $.toast({
                text: 'JENIS HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#jenis_edit").focus();
            return false;

        } 
            
        else if (!$("#kategori_edit").val()) {
            $.toast({
                text: 'KATEGORI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kategori_edit").focus();
            return false;

        } 
        
        else if (!$("#grup_edit").val()) {
            $.toast({
                text: 'GRUP HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#grup_edit").focus();
            return false;

        } 

        else if (!$("#nama_edit").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#nama_edit").focus();
            return false;

        } 

        var id           = $('#id_edit').val();
        var jenis        = $('#jenis_edit').val();
        var kategori     = $('#kategori_edit').val();
        var grup         = $('#grup_edit').val();
        var nama         = $('#nama_edit').val();

        var token = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('id', id);
        formData.append('jenis', jenis);
        formData.append('kategori', kategori);
        formData.append('grup', grup);
        formData.append('nama', nama);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tarif.update') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                    
                    view();
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalEdit').modal('hide');
                
               
            }
        });

     return false;

    });

  
    $('#detail_save_add').on('click', function(){


        if (!$("#item").val()) {
            $.toast({
                text: 'ITEM HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#item").focus();
            return false;

        } 
        var item = $('#item').val();
        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('item', item);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tarif.detail_save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                
                $('#item').val("").trigger("change");
                detail_add();
                detail_view();
                view();
            }
        });

        return false;

    });

    $('#detail_save_edit').on('click', function(){


        if (!$("#item_edit").val()) {
            $.toast({
                text: 'ITEM HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#item_edit").focus();
            return false;

        } 
        var item = $('#item_edit').val();
        var kode = $('#id_edit').val();
        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('item', item);
        formData.append('kode', kode);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tarif.detail_save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                
                $('#item').val("").trigger("change");
                detail_edit(kode);
                view();
            }
        });

        return false;

    });

    $('#show_data').on('click','.item_edit',function(){

            var id=$(this).attr('data');

            $.when(
               combo_tarif_item(),
               combo_tarif_jenis(),
               combo_tarif_kategori(),
               combo_grup(),
               detail_edit(id),
            )
            .done(function() {

                $('.select2').select2();

                $.ajax({
                    type : "GET",
                    url   : "{{ route('tarif.edit') }}",
                    dataType : "JSON",
                    data : {id:id},
                    success: function(data){

                        $('#formModalEdit').modal('show');
                        $('#formModalEdit').find('[name="id_edit"]').val(data.tarif_kode);
                        $('#formModalEdit').find('[name="jenis"]').val(data.jenis_kode).trigger("change");
                        $('#formModalEdit').find('[name="kategori"]').val(data.kat_kode).trigger("change");
                        $('#formModalEdit').find('[name="grup"]').val(data.grup_kode).trigger("change");
                        $('#formModalEdit').find('[name="nama"]').val(data.tarif_nama);

                    }
                });
            })

        return false;

    });

   
    $('#detail_edit').on('click','.detail_delete',function(){
        
        var id   = $(this).attr('data');
        var kode = $('#id_edit').val();
        
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
                    url   : "{{ route('tarif.detail_nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Hapus !!.", "success");
                        detail_edit(kode);
                        view();
                    }
                });  
            }
        });
    
    });

    $('#detail_add').on('click','.detail_delete',function(){
        
        var id   = $(this).attr('data');
        var kode = $('#id_edit').val();

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
                    url   : "{{ route('tarif.detail_nonaktif') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Non-Aktif !", "Data Sudah Di-Hapus !!.", "success");
                        detail_add(kode);
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
                    url   : "{{ route('tarif.nonaktif') }}",
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
                    url   : "{{ route('tarif.aktif') }}",
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
                var x = document.getElementById("grup");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].grup_kode)+'>'+(data[i].grup_nama)+'</option>';
                    $('select[name=grup]').append(html)
                }
            }
        });

    }

    function combo_tarif_kategori(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_tarif_kategori') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=kategori]').empty()
                var x = document.getElementById("kategori");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].kat_kode)+'>'+(data[i].kat_nama)+'</option>';
                    $('select[name=kategori]').append(html)
                }
            }
        });

    }

    function combo_tarif_item(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_tarif_item') }}",
            async : false,
            dataType : 'JSON',
            success : function(r){
                data = r.data;
                var html = '';
                var i;
                $('select[name=item]').empty()
                var x = document.getElementById("item");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].item_id)+'>'+(data[i].item_nama)+' - <small>'+(data[i].item_nominal)+'</small></option>';
                    $('select[name=item]').append(html)
                }
            }
        });

    }

    function combo_tarif_jenis(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_tarif_jenis') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=jenis]').empty()
                var x = document.getElementById("jenis");
                    var option = document.createElement("option");
                    option.text = "--Pilih--";
                    option.value = '';
                    x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html =  
                            '<option value='+(data[i].jenis_kode)+'>'+(data[i].jenis_nama)+'</option>';
                    $('select[name=jenis]').append(html)
                }
            }
        });

    }



    
    /*-- FUNGSI --*/


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