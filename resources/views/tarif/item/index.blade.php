@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title text-white"><i class="mdi mdi-cash-multiple"></i> TARIF - PAKET</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" id="btn_add"><i class="fas fa-plus-circle"></i> TAMBAH DATA </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="box-body">					
                    <table id="datatable" class="table table-hover table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th width="1%" style="text-align: center; vertical-align: middle;">NO</th>
                                <th width="6%" style="text-align: center; vertical-align: middle;">KODE</th>
                                <th width="20%" style="text-align: center; vertical-align: middle;">NAMA</th>
                                <th width="10%" style="text-align: center; vertical-align: middle;">JENIS</th>
                                <th width="10%" style="text-align: center; vertical-align: middle;">NOMINAL</th>
                                <th width="5%" style="text-align: center; vertical-align: middle;">AKSI</th>
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
                <h5 class="modal-title"> <i class="fas fa-plus-circle"></i> <strong>Tarif - Item</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama" class="form-control col-md-12">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label> <strong>Jenis</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jenis" id="jenis"></select>
                        </div>
                    </div>   
  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Nominal</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="nominal" id="nominal" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
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
                <h5 class="modal-title"> <strong>Edit Data Harga</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <input type="hidden" name="id_edit" id="id_edit" class="form-control">

                <div class="row">

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama_edit" class="form-control col-md-12">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label> <strong>Jenis</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jenis" id="jenis_edit"></select>
                        </div>
                    </div>   
  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Nominal</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="nominal" id="nominal_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
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

       
        $('.select2').select2();

        combo_jenis_tarif();

        view();
        reset();


    });

    function reset() {
        $('#jenis').val("").trigger("change");;
        $('#nama').val("");
        $('#bulanan').val("");
    }

    $('#btn_add').on('click',function(){
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

        else if (!$("#jenis").val()) {
            $.toast({
                text: 'JENIS HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#jenis").focus();
            return false;

        }  else if (!$("#nominal").val()) {
            $.toast({
                text: 'NOMINAL HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nominal").focus();
            return false;

        } 

        var nama     = $('#nama').val();
        var jenis    = $('#jenis').val();
        var nominal  = $('#nominal').val();
        var token    = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('nama', nama);
        formData.append('jenis', jenis);
        formData.append('nominal', nominal);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('tarif.item.save') }}",
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
            url: "{{ route('tarif.item.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                
                $('#datatable').DataTable().destroy(); 
               

                $('#show_data').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {


                        if((data[i].item_aktif) == 'Y'){
                            var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="5%">'),
                                $('<td width="20%">'),
                                $('<td width="10%">'),
                                $('<td width="10%" align="right">'),
                                $('<td width="1%" align="center">')

                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="5%">'),
                                $('<td width="20%">'),
                                $('<td width="10%">'),
                                $('<td width="10%" align="right">'),
                                $('<td width="1%" align="center">')
                
                            ]);

                        }

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].item_kode))); 
                            
                        tr.find('td:nth-child(3)').append($('<div>')
                           .html('<b>'+(data[i].item_nama)+'</b>'));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].jenis_nama)));  

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<strong>'+(data[i].item_nominal)+'</strong>'));

                        if((data[i].item_aktif) == '&'){

                            tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].tarif_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].tarif_kode+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        } else {
                            tr.find('td:nth-child(6)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs item_aktif" data="'+data[i].tarif_kode+'"><i class="mdi mdi-check"></i></a></div>');   
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
            url   : "{{ route('tarif.item.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="id_edit"]').val(data.item_kode);
                $('#formModalEdit').find('[name="jenis"]').val(data.jenis_id).trigger("change");
                $('#formModalEdit').find('[name="nama"]').val(data.item_nama);
                $('#formModalEdit').find('[name="nominal"]').val(data.item_nominal);
              
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
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nama_edit").focus();
            return false;

        } 

        else if (!$("#jenis_edit").val()) {
            $.toast({
                text: 'JENIS HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#jenis_edit").focus();
            return false;

        } else if (!$("#nominal_edit").val()) {
            $.toast({
                text: 'NOMINAL HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#nominal_edit").focus();
            return false;

        }
       
        var id          = $('#id_edit').val();
        var nama        = $('#nama_edit').val();
        var jenis       = $('#jenis_edit').val();
        var nominal     = $('#nominal_edit').val();

        var token = $('[name=_token]').val();
        var formData = new FormData();

        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('jenis', jenis);
        formData.append('nominal', nominal);
        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('tarif.item.update') }}",
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
                    url   : "{{ route('tarif.item.aktif') }}",
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
                    url   : "{{ route('tarif.item.nonaktif') }}",
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

    function combo_jenis_tarif(){

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
                    html = '<option value='+(data[i].jenis_id)+'>'+(data[i].jenis_nama)+'</option>';
                    $('select[name=jenis]').append(html)
                }
            }
        });

    }

    
    /*-- FORMAT RUPIAH --*/

    var nominal  = document.getElementById('nominal');
    var nominal_edit  = document.getElementById('nominal_edit');
    
	nominal.addEventListener('keyup', function(e)
	{
		nominal.value = formatRupiah(this.value);
	});

    nominal_edit.addEventListener('keyup', function(e)
	{
		nominal_edit.value = formatRupiah(this.value);
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