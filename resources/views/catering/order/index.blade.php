@extends('app.layouts.template')


@section('content')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                {!! csrf_field() !!}
  
                    
                <input type="hidden" class="form-control datepicker" id="tanggal" name="tanggal" disabled="disabled">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> <strong>Anak</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="anak" id="anak"></select>
                        </div>
                    </div> 

                    <div class="col-md-2">
                        <div class="form-group">
                            <label> <strong>Jadwal Makan</strong>  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="jadwal" id="jadwal"></select>
                        </div>
                    </div> 

                    <div class="col-md-5">
                        <div class="form-group top"> 
                            <label> <strong>Menu</strong>  <small class="text-danger">*</small></label>
                            <div class="input-group">
                                <input type="text" name="kode" id="kode" class="form-control col-md-4" placeholder="Kode Menu">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn btn-primary add" id="menu_view"><i class="fas fa-search"></i></button>
                                </span>
                                <input type="text" name="nama" id="nama" class="form-control" readonly="readonly">
                            </div>                                                   
                        </div>
                    </div>   
                    <div class="col-md-2">
                        <div class="form-group">
                            <label> <strong>Harga</strong>  <small class="text-danger">*</small></label>
                            <input type="text" name="harga" id="harga" class="form-control" readonly="readonly">
                        </div>
                    </div>        
                </div>
                <div class="row">
                    <div class="col-md-9">
                       
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" id="btn_save"><i class="fas fa-plus"></i> TAMBAH </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title">Orderan</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th style="text-align: center">NO</th>
                                <th style="text-align: center">KODE</th>
                                <th style="text-align: center">MENU</th>
                                <th style="text-align: center">NAMA ANAK</th>
                                <th style="text-align: center">JADWAL</th>
                                <th style="text-align: center">HARGA</th>
                                <th style="text-align: center">AKSI</th>
                            </tr>
                        </thead>
                       <tbody id="show_data"></tbody>
                </table>
                <div class="row">
                    <div class="col-md-8">
                
                    </div>
                    <div class="col-md-4" style="text-align: right">
                            <h1 class="text-danger" style="text-align: right"><strong>Rp.</strong><strong id="total"></strong></h1>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-9">
                       
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <a href="{{ route('order.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> BATAL</a>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" id="btn_order"><i class="fas fa-cart-plus"></i> ORDER </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal-lg" id="formModalMenu">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Menu Makanan</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th style="text-align: center">NO</th>
                            <th style="text-align: center">NAMA</th>
                            <th style="text-align: center">KATEGORI</th>
                            <th style="text-align: center">HARGA</th>
                        </tr>
                    </thead>
                   <tbody id="show_data_item"></tbody>
                </table>
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
        $('.datepicker[name=tanggal]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker').datepicker({
          autoclose: true,
          format:'dd-mm-yyyy',
        });  


        combo_anak();
        combo_jadwal();
        view();
        reset();

    });

    function view(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('order.detail_view') }}",
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
                                $('<td class= width="5%" align="center">'),
                                $('<td class= width="5%" align="right">'),
                                $('<td class= width="1%" align="center">')
                            ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].menu_kode)));   
                        
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].menu_nama) + ('  -   ') + ('[ ') + (data[i].kat_nama) + (' ]')));
                            
                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        if((data[i].detail_jadwal) == 'Pagi'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-pill badge-info')
                            .html((data[i].detail_jadwal)));

                        }else if((data[i].detail_jadwal) == 'Siang'){
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-pill badge-warning')
                            .html((data[i].detail_jadwal)));
                        
                        }else{
                            tr.find('td:nth-child(5)').append($('<span>').addClass('badge badge-pill badge-secondary')
                            .html((data[i].detail_jadwal)));
                        }

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].harga_jual_tampil)));     

                        tr.find('td:nth-child(7)').append('<div class="btn-group"><a href="javascript:;" class="btn btn-soft-danger btn-xs item_delete" data="'+data[i].detail_id+'"><i class="fa fa-trash"></i></a></div>');   

                        tr.appendTo($('#show_data'));
                    }

                } else {

                     $('#show_data').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
            //$('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_menu() {

        $.ajax({
            type: 'GET',
            url: "{{ route('catering.menu_view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data_item').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                     
                        var tr = $('<tr>').append([
                            $('<td class= width="1%" align="center">'),
                            $('<td class= width="10%" align="left">'),
                            $('<td class= width="10%" align="left">'),
                            $('<td class= width="1%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<a href="javascript:;" class="barang_pilih" data="'+data[i].menu_kode+'">'+(data[i].menu_nama)+'</a>')); 
                            
                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].kat_nama)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].harga_tampil)));   

                        tr.appendTo($('#show_data_item'));
                    }

                }
            $('#datatable').DataTable('refresh'); 
            }
        });
    }

    $('#show_data_item').on('click','.barang_pilih',function(){

        var id = ($(this).attr('data')).toLowerCase();

        console.log(id);

        $.ajax({
            type: "GET",
            url: "{{ route('catering.menu_edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                
                console.log(data);

                $('[name="kode"]').val(data.menu_kode);
                $('[name="nama"]').val(data.menu_nama);
                $('[name="harga"]').val(data.menu_harga_jual);
                $('#formModalMenu').modal('hide');
            }
        });

        return false;

    });


    function reset() {
        $('#kode').val("");
        $('#nama').val("");
        $('#harga').val("");
        $('#anak').val("").trigger("change");
        $('#jadwal').val("").trigger("change");
    }

    $('#menu_view').on('click',function(){

        $('#formModalMenu').modal('show');
        view_menu();
        view();

    });

    $('#btn_save').on('click', function(){

        if (!$("#anak").val()) {
            $.toast({
                text: 'ANAK HARUS DI PILIH',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#anak").focus();
            return false;

        } 
          else if (!$("#jadwal").val()) {
            
            $.toast({
                text: 'JADWAL MAKAN HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#jadwal").focus();
            return false;

        }
          else if (!$("#kode").val()) {
            
            $.toast({
                text: 'MENU HARUS DI ISI',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });

            $("#kode").focus();
            return false;

        }

        var tanggal = $('#tanggal').val();
        var anak = $('#anak').val();
        var jadwal = $('#jadwal').val();
        var kode = $('#kode').val();
        var nama = $('#nama').val();
        var harga = $('#harga').val();

        //console.log(kode);
        
        var token = $('[name=_token]').val();

        var formData = new FormData();
    
        formData.append('tanggal', tanggal);
        formData.append('anak', anak);
        formData.append('jadwal', jadwal);
        formData.append('kode', kode);
        formData.append('nama', nama);
        formData.append('harga', harga);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('order.detail_save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {
                    
                    view();
                    $.toast({
                        text: 'DATA BERHASIL DI TAMBAHKAN',
                        position: 'top-right',
                        loaderBg: '#fff716',
                        icon: 'success',
                        hideAfter: 3000
                    });
                    reset();
                    $('#formModalAdd').modal('hide');
                
               
            }
        });

     return false;

    });

    $('#show_data').on('click','.item_set',function(){

        var id=$(this).attr('data');

        console.log(id);

        $.ajax({
            type : "GET",
            url   : "{{ route('catering.menu_edit') }}",
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

    $('#btn_order').on('click', function(){

        var token = $('[name=_token]').val();
        var formData = new FormData();

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('order.save') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                swal("Berhasil !", "Makanan Sudah Di Order !!.", "success");
                view();
            }
        });

        return false;

    });

     
    $('#show_data').on('click','.item_edit',function(){

        var id=$(this).attr('data');

        $.ajax({
            type : "GET",
            url   : "{{ route('order.detail_edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(r){

                $('[name="id_edit"]').val(r.detail_id);
                $('[name="kode"]').val(r.menu_kode);
                $('[name="nama"]').val(r.menu_nama);
                $('[name="harga"]').val(r.menu_harga);
                $('[name="anak"]').val(r.anak_nis).trigger("change");
                $('[name="jadwal"]').val(r.detail_jadwal).trigger("change");


            }
        });

        return false;

    });

    $('#formModalEdit').on('shown.bs.modal', function () {
        $('#nama_edit').focus();
    })  

    $('#btn_update').on('click',function(){

        if (!$("#kode_edit").val()) {
            $.toast({
                text: 'KODE HARUS DI ISI',
                position: 'top-left',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#kode_edit").focus();
            return false;

        } 
        else if (!$("#nama_edit").val()) {
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
        else if (!$("#harga_edit").val()) {
            $.toast({
                text: 'HARGA HARUS DI ISI',
                position: 'top-left',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#harga_edit").focus();
            return false;

        } 
      
      
        var kode = $('#kode_edit').val();
        var nama = $('#nama_edit').val();
        var harga = $('#harga_edit').val();

        var token = $('[name=_token]').val();

        var formData = new FormData();

        formData.append('kode', kode);
        formData.append('nama', nama);
        formData.append('harga', harga);
        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('catering.menu_update') }}",
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
                    url   : "{{ route('catering.menu_aktif') }}",
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

    $('#show_data').on('click','.item_delete',function(){
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
                    url   : "{{ route('order.detail_void') }}",
                    dataType : "JSON",
                    data : {id,_token},
                    success: function(data){
                        swal("Hapus !", "Data Sudah Di Hapus !!.", "success");
                        view();
                    }
                });  
            }
        });
    });


    function combo_anak(){

        $('select[name=anak]').empty()
            $.ajax({
                    type  : 'GET',
                    url   : "{{ route('combo_sistem.combo_anak') }}",
                    async : false,
                    dataType : 'JSON',
                    success : function(data){
                        var html = '';
                        var i;
                        $('select[name=anak]').empty()
                            var x = document.getElementById("anak");
                            var option = document.createElement("option");
                            option.text = "Pilih Anak";
                            option.value = "";
                        x.add(option);
                        for(i=0; i<data.length; i++){
                            var html = '';
                            html = '<option value='+(data[i].anak_nis)+'>'+(data[i].anak_nama)+'</option>';
                            $('select[name=anak]').append(html)
                        }
                    }
        });

    }
    
    function combo_jadwal(){
        $('select[name=jadwal]').empty()
            var html = '';
            html = '<option value="">Pilih jadwal Makan</option>'+
                   '<option value="Pagi">Pagi</option>'+
                   '<option value="Siang">Siang</option>'+
                   '<option value="Malam">Malam</option>';
        $('select[name=jadwal]').append(html)
    }
    
</script>


@endsection