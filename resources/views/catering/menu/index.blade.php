@extends('app.layouts.template')



@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title text-white"> <i class="mdi mdi-food-fork-drink"></i> CATERING - MENU</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"></i> TAMBAH DATA </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
     					
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">KODE</th>
                                <th style="text-align: center">NAMA</th>
                                <th style="text-align: center">DESKRIPSI</th>
                                <th style="text-align: center">KATEGORI</th>
                                <th style="text-align: center">HARGA</th>
                                <th style="text-align: center">AKTIF</th>
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
                <h5 class="modal-title"> <strong> <i class="fas fa-plus-circle"></i> Catering - Menu</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label> <strong>Kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori"></select>
                        </div>
                        <div class="form-group mb-2">
                            <label> <strong>Kode</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="kode" id="kode">
                        </div>
                        <div class="form-group mb-2">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label> <strong>Deskripsi</strong>  <small class="text-danger">*</small></label>
                            <textarea class="form-control" rows="2" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                    </div>  
                    <div class="col-md-6 mb-2">
                        <label> <strong>Harga</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="harga" id="harga" class="form-control col-md-12" onkeypress="return angka(this, event)" maxlength="8">
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
                <h5 class="modal-title"> <strong>Edit Data MENU</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label> <strong>Kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori_edit"></select>
                        </div>
                        <div class="form-group mb-2">
                            <label> <strong>Kode</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="kode" id="kode_edit" disabled="disabled">
                        </div>
                        <div class="form-group mb-2">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input class="form-control" name="nama" id="nama_edit">
                        </div>
                        <div class="form-group mb-2">
                            <label> <strong>Deskripsi</strong>  <small class="text-danger">*</small></label>
                            <textarea class="form-control" rows="2" id="deskripsi_edit" name="deskripsi"></textarea>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <label> <strong>Harga</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="harga" id="harga_edit" class="form-control col-md-12">
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

        combo_kategori();
        view();
        reset();

    });

    function view() {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.menu.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        if((data[i].menu_aktif) == 'Y'){
                            var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="15%">'),
                                $('<td width="30%" align="left">'),
                                $('<td width="10%" align="left">'),
                                $('<td width="10%" align="right">'),
                                $('<td width="7%" align="center">'),
                                $('<td width="5%" align="center">')
                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="5%" align="center">'),
                                $('<td width="15%">'),
                                $('<td width="30%" align="left">'),
                                $('<td width="10%" align="left">'),
                                $('<td width="10%" align="right">'),
                                $('<td width="7%" align="center">'),
                                $('<td width="5%" align="center">')
                            ]);

                        }


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].menu_kode)));   
                            
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<strong>'+(data[i].menu_nama)+'</strong'));

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].menu_deskripsi)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].kat_nama)));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html('<strong>'+(data[i].harga)+'</strong'));   

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].menu_aktif)));   
                        
                        if ((data[i].menu_aktif) == 'Y'){
                            tr.find('td:nth-child(8)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].menu_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].menu_kode+'"><i class="mdi mdi-close"></i></a></div>');   
                        }
                        else {
                            tr.find('td:nth-child(8)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].menu_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-info btn-xs item_aktif" data="'+data[i].menu_kode+'"><i class="mdi mdi-check"></i></a></div>');   
                        }
                        

                        tr.appendTo($('#show_data'));
                    }

                }
            $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function reset() {
        $('#kategori').val("").trigger("change");
        $('#kode').val("");
        $('#nama').val("");
        $('#harga').val("");
        $('#deskripsi').val("");
        $('#harga_jual').val("");
    }

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_save').on('click', function(){

         if (!$("#kategori").val()) {
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

        else if (!$("#kode").val()) {
            $.toast({
                text: 'KODE HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kode").focus();
            return false;

        } else if (!$("#nama").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#nama").focus();
            return false;

        } else if (!$("#harga").val()) {
            $.toast({
                text: 'Harga HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#harga").focus();
            return false;

        } 


        var kategori        = $('#kategori').val();
        var kode            = $('#kode').val();
        var nama            = $('#nama').val();
        var harga           = $('#harga').val();
        var deskripsi       = $('#deskripsi').val();
        var token           = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('kode', kode);
        formData.append('kategori', kategori);
        formData.append('nama', nama);
        formData.append('harga', harga);
        formData.append('deskripsi', deskripsi);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.menu.save') }}",
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

        if (!$("#kategori_edit").val()) {
            $.toast({
                text: 'KATEGORI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kategori_edit").focus();
            return false;

        } else if (!$("#nama_edit").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#nama_edit").focus();
            return false;

        } else if (!$("#harga_edit").val()) {
            $.toast({
                text: 'Harga HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#harga_edit").focus();
            return false;

        } 

        var kategori        = $('#kategori_edit').val();
        var kode            = $('#kode_edit').val();
        var nama            = $('#nama_edit').val();
        var harga           = $('#harga_edit').val();
        var deskripsi      = $('#deskripsi_edit').val();

        //console.log(kategori);
        
        var token = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('kode', kode);
        formData.append('kategori', kategori);
        formData.append('nama', nama);
        formData.append('harga', harga);
        formData.append('deskripsi', deskripsi);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.menu.update') }}",
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

    $('#show_data').on('click','.item_set',function(){

        var id=$(this).attr('data');

        console.log(id);

        $.ajax({
            type : "GET",
            url   : "{{ route('catering.menu.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
                $('#formModalSet').modal('show');    
                $('#formModalSet').find('[name="id_set"]').val(data.menu_kode);      
                $('#formModalSet').find('[name="nama_item"]').val("");
                $('#formModalSet').find('[name="kode_item"]').val(data.menu_kode);
                view();
                view_item(id);
              
            }
        });

        return false;

    });

    $('#btn_set').on('click', function(){


        if (!$("#nama_item").val()) {
            $.toast({
                text: 'NAMA HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#nama_item").focus();
            return false;

        } 

        var kode = $('#kode_item').val();
        var nama = $('#nama_item').val();
        
        console.log(nama);

        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('kode', kode);
        formData.append('nama', nama);
        formData.append('harga', harga);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('catering.item_save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                
                $('#nama_item').val("");
                var kode = $('#kode_item').val();
                view_item(kode);
                view();
            }
        });

        return false;

    });

     
    $('#show_data').on('click','.item_edit',function(){

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('catering.menu.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="kode"]').val(data.menu_kode);
                $('#formModalEdit').find('[name="nama"]').val(data.menu_nama);
                $('#formModalEdit').find('[name="harga"]').val(data.menu_harga);
                $('#formModalEdit').find('[name="harga_jual"]').val(data.menu_harga_jual);
                $('#formModalEdit').find('[name="kategori"]').val(data.kat_id).trigger("change");

            }
        });

        return false;

    });

    $('#formModalEdit').on('shown.bs.modal', function () {
        $('#nama_edit').focus();
    })  


    $('#show_data_item').on('click','.item_delete',function(){
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
                    url   : "{{ route('catering.item_delete') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Hapus !", "Data Sudah Di Hapus !!.", "success");
                        var kode = $('#kode_item').val();
                        view_item(kode);
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
                    url   : "{{ route('catering.menu.nonaktif') }}",
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
                    url   : "{{ route('catering.menu.aktif') }}",
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

    function combo_kategori(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_catering_kategori') }}",
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
                            '<option value='+(data[i].kat_id)+'>'+(data[i].kat_nama)+'</option>';
                    $('select[name=kategori]').append(html)
                }
            }
        });

    }



    
    /*-- FUNGSI --*/

    
    var harga  = document.getElementById('harga');
    var harga_edit  = document.getElementById('harga_edit');
    
	harga.addEventListener('keyup', function(e)
	{
		harga.value = formatRupiah(this.value);
	});

    harga_edit.addEventListener('keyup', function(e)
	{
		harga_edit.value = formatRupiah(this.value);
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