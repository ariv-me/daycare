@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title text-white"><i class="mdi mdi-cash-multiple"></i> TARIF - HARGA</h4>
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
                            <th style="text-align: center">NO</th>
                            <th style="text-align: center">KODE</th>
                            <th style="text-align: center">NAMA</th>
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
                <h5 class="modal-title"> <strong>Tambah Data Harga</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama" class="form-control col-md-12">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>Kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori"></select>
                        </div>
                    </div>   
  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Registrasi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="registrasi" id="registrasi" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-3">
                        <label> <strong>Gizi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="gizi" id="gizi" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  

                    <div class="col-md-12 mb-3">
                        <label> <strong>Bulanan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="bulanan" id="bulanan" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Pembangunan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="pembangunan" id="pembangunan" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
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

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>Nama</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="nama" id="nama_edit" class="form-control col-md-12">
                        </div>
                    </div> 

                    <div class="col-md-12 mb-0">
                        <div class="form-group">
                            <label> <strong>kategori</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="kategori" id="kategori_edit"></select>
                        </div>
                    </div>  
                 
                    <div class="col-md-12 mb-3">
                        <label> <strong>Registrasi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="registrasi" id="registrasi_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Gizi</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="gizi" id="gizi_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Bulanan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="bulanan" id="bulanan_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
                        </div>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label> <strong>Pembangunan</strong>  <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="pembangunan" id="pembangunan_edit" class="form-control col-md-12" maxlength="15" onkeypress="return angka(this, event)">
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

        combo_kategori();
        combo_tarif_jenis();

        view();
        reset();


    });

    function reset() {
        $('#kategori').val("").trigger("change");;
        $('#jenis').val("").trigger("change");;
        $('#registrasi').val("");
        $('#bulanan').val("");
        $('#pembangunan').val("");
        
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

        else if (!$("#kategori").val()) {
            $.toast({
                text: 'kategori HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kategori").focus();
            return false;

        }  else if (!$("#registrasi").val()) {
            $.toast({
                text: 'REGISTRASI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#registrasi").focus();
            return false;

        } else if (!$("#gizi").val()) {
            $.toast({
                text: 'GIZI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#gizi").focus();
            return false;

        } else if (!$("#bulanan").val()) {
            $.toast({
                text: 'BULANAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#bulanan").focus();
            return false;

        } else if (!$("#pembangunan").val()) {
            $.toast({
                text: 'PEMBANGUNAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#pembangunan").focus();
            return false;

        } 

        var nama    = $('#nama').val();
        var kategori    = $('#kategori').val();
        var gizi       = $('#gizi').val();
        var registrasi  = $('#registrasi').val();
        var bulanan     = $('#bulanan').val();
        var pembangunan = $('#pembangunan').val();
        
        var token = $('[name=_token]').val();
        var formData = new FormData();
    
        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('gizi', gizi);
        formData.append('registrasi', registrasi);
        formData.append('bulanan', bulanan);
        formData.append('pembangunan', pembangunan);
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


                        if((data[i].void) == 'T'){
                            var tr = $('<tr>').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="3%">'),
                                $('<td width="20%">'),
                                $('<td width="5%">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="1%" align="center">')

                            ]);

                        } else {

                            var tr = $('<tr style="background-color:#fee6ec;">').append([
                                $('<td width="1%" align="center">'),
                                $('<td width="3%">'),
                                $('<td width="15%">'),
                                $('<td width="5%">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="7%" align="right">'),
                                $('<td width="1%" align="center">')
                
                            ]);

                        }

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].tarif_kode))); 
                            
                        tr.find('td:nth-child(3)').append($('<div>')
                           .html('<b>'+(data[i].tarif_nama)+'</b>'));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].kat_nama)));  

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].reg_tampil)));

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].tarif_gizi)));

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].spp_tampil)));   

                        tr.find('td:nth-child(8)').append($('<div>')
                            .html((data[i].pembangunan_tampil)));   
                            
                        tr.find('td:nth-child(9)').append($('<div>')
                            .html('<b class="text-danger">'+(data[i].total_bayar)+'</b>'));   
                        
                        
                        if((data[i].void) == 'T'){

                            tr.find('td:nth-child(10)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-warning btn-xs item_edit" data="'+data[i].tarif_kode+'"><i class="fas fa-pencil-alt"></i></a><a href="javascript:;" class="btn btn-soft-danger btn-xs item_nonaktif" data="'+data[i].tarif_kode+'"><i class="mdi mdi-window-close"></i></a></div>');   

                        } else {
                            tr.find('td:nth-child(10)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-info btn-xs item_aktif" data="'+data[i].tarif_kode+'"><i class="mdi mdi-check"></i></a></div>');   
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
            url   : "{{ route('tarif.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="id_edit"]').val(data.tarif_kode);
                $('#formModalEdit').find('[name="kategori"]').val(data.kat_id).trigger("change");
                $('#formModalEdit').find('[name="nama"]').val(data.tarif_nama);
                $('#formModalEdit').find('[name="gizi"]').val(data.tarif_gizi);
                $('#formModalEdit').find('[name="registrasi"]').val(data.tarif_reg);
                $('#formModalEdit').find('[name="bulanan"]').val(data.tarif_spp);
                $('#formModalEdit').find('[name="pembangunan"]').val(data.tarif_pembg);
              
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

        else if (!$("#kategori_edit").val()) {
            $.toast({
                text: 'kategori HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kategori_edit").focus();
            return false;

        } else if (!$("#registrasi_edit").val()) {
            $.toast({
                text: 'REGISTRASI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#registrasi_edit").focus();
            return false;

        } else if (!$("#gizi_edit").val()) {
            $.toast({
                text: 'REGISTRASI HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#gizi_edit").focus();
            return false;

        } else if (!$("#bulanan_edit").val()) {
            $.toast({
                text: 'BULANAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#bulanan_edit").focus();
            return false;

        } else if (!$("#pembangunan_edit").val()) {
            $.toast({
                text: 'PEMBANGUNAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#pembangunan_edit").focus();
            return false;

        } 
      
        var id          = $('#id_edit').val();
        var nama        = $('#nama_edit').val();
        var kategori    = $('#kategori_edit').val();
        var gizi        = $('#gizi_edit').val();
        var registrasi  = $('#registrasi_edit').val();
        var bulanan     = $('#bulanan_edit').val();
        var pembangunan = $('#pembangunan_edit').val();

        var token = $('[name=_token]').val();
        var formData = new FormData();

        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('kategori', kategori);
        formData.append('gizi', gizi);
        formData.append('registrasi', registrasi);
        formData.append('bulanan', bulanan);
        formData.append('pembangunan', pembangunan);
        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('tarif.update') }}",
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

    function combo_kategori(){

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
                    html = '<option value='+(data[i].kat_id)+'>'+(data[i].kat_nama)+'</option>';
                    $('select[name=kategori]').append(html)
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
                    html = '<option value='+(data[i].jenis_id)+'>'+(data[i].jenis_nama)+'</option>';
                    $('select[name=jenis]').append(html)
                }
            }
        });

    }

    
    /*-- FORMAT RUPIAH --*/

    var registrasi_rupiah  = document.getElementById('registrasi');
    var bulanan_rupiah     = document.getElementById('bulanan');
    var pembangunan_rupiah = document.getElementById('pembangunan');
    
	registrasi_rupiah.addEventListener('keyup', function(e)
	{
		registrasi_rupiah.value = formatRupiah(this.value);
	});

	bulanan_rupiah.addEventListener('keyup', function(e)
	{
		bulanan_rupiah.value = formatRupiah(this.value);
	});

	pembangunan_rupiah.addEventListener('keyup', function(e)
	{
		pembangunan_rupiah.value = formatRupiah(this.value);
	});

    var registrasi_rupiah_edit  = document.getElementById('registrasi_edit');
    var bulanan_rupiah_edit     = document.getElementById('bulanan_edit');
    var pembangunan_rupiah_edit = document.getElementById('pembangunan_edit');
    
	registrasi_rupiah_edit.addEventListener('keyup', function(e)
	{
		registrasi_rupiah_edit.value = formatRupiah(this.value);
	});

	bulanan_rupiah_edit.addEventListener('keyup', function(e)
	{
		bulanan_rupiah_edit.value = formatRupiah(this.value);
	});

	pembangunan_rupiah_edit.addEventListener('keyup', function(e)
	{
		pembangunan_rupiah_edit.value = formatRupiah(this.value);
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