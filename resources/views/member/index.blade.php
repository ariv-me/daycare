@extends('app.layouts.template')

@section('css')
    <style>
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
    </style>
@endsection

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            
            <div class="card-header bg-success">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title text-white"><i class="mdi mdi-account-check-outline"></i>  MEMBER</h4>          
                    </div><!--end col-->
                    {{-- <div class="col-auto"> 
                        <a href="{{ route('pendaftaran.transaksi.index') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> PENDAFTARAN </a>
                        <a href="{{ route('tagihan.add') }}" type="button" class="btn btn-warning btn-xs text-white"><i class="fas fa-plus-circle"></i> TAGIHAN </a>
                    </div><!--end col--> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Kategori  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="filter_kategori" id="filter_kategori" onchange="filterKategori(this)"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="subject">Grup  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="filter_grup" id="filter_grup" onchange="filterGrup(this)"></select>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    
                    <div class="col-12 col-lg-6 col-xl"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">                                                                        
                                        <span class="h4 text-pink" id="perempuan"></span>      
                                        <h6 class="text-uppercase text-muted mt-2 m-0">Perempuan</h6>                
                                    </div><!--end col-->
                                </div> <!-- end row -->
                            </div><!--end card-body-->
                        </div> <!--end card-body-->                     
                    </div>
                    <div class="col-12 col-lg-6 col-xl"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">                                                                        
                                        <span class="h4 text-info" id="laki-laki"></span>      
                                        <h6 class="text-uppercase text-muted mt-2 m-0">Laki-Laki</h6>                
                                    </div><!--end col-->
                                </div> <!-- end row -->
                            </div><!--end card-body-->
                        </div> <!--end card-body-->                     
                    </div>
                    <div class="col-12 col-lg-6 col-xl"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">                                                                        
                                        <span class="h4 text-dark" id="total"></span>      
                                        <h6 class="text-uppercase text-muted mt-2 m-0">Total</h6>                
                                    </div><!--end col-->
                                </div> <!-- end row -->
                            </div><!--end card-body-->
                        </div> <!--end card-body-->                     
                    </div>
                </div>

                <hr>
               
                <div class="box-body">	
                    <div class="table-responsive">
                        <table id="datatable" class="table-sm table table-bordered mb-0 table-centered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: center">ANAK</th>
                                    <th style="text-align: center">MEMBER</th>
                                    <th  style="text-align: center">GRUP</th>
                                    <th  style="text-align: center">KATEGORI</th>
                                    <th  style ="text-align: center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="show_data"></tbody>
                        </table>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalEdit">
    <div class="modal-dialog bg-white" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-cash-multiple"></i> <strong>Update Member</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                        
                                <div class="row bg-white">
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Paket <small class="text-danger">*</small></label>
                                            <select class="form-control custom-select select2" style="width: 100%;" name="paket" id="paket"  onchange="showFilterPaket(this)"></select>
                                        </div>
                                    </div>                                 
                                </div><!--end row-->
                        
                    </div><!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" id="btn_update"><i class="fab fa-cc-mastercard"></i> BAYAR</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade  bd-example-modal" id="formModalNonaktif">
    <div class="modal-dialog bg-white" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-cash-multiple"></i> <strong>Non-Aktif</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                    <input type="hidden" id="id_nonaktif" name="id_nonaktif">
                        
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Tanggal <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control datepicker" id="tanggal" name="tanggal">
                                        </div>
                                    </div>                         
                                    <div class="col-md-12 mt-1">
                                        <div class="mb-1">
                                            <label class="form-label" for="username">Alasan <small class="text-danger">*</small></label>
                                            <textarea class="form-control" rows="3" id="alasan" name="alasan"></textarea>
                                        </div>
                                    </div>                         
                                </div><!--end row-->
                        
                    </div><!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-xs" id="btn_nonaktif"><i class="fas fa-save"></i> SIMPAN</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        
        $('.datepicker[name=tanggal]').val(moment().format('DD-MM-YYYY'));
        $('.select2').select2();
        
        $('.datepicker').datepicker({
            autoclose: true,
            format:'dd-mm-yyyy',
        });

        $('#filter_grup').val('Semua');

        combo_filter_kategori();
        combo_filter_grup();

        var kategori  = $('#filter_kategori').val();
        var bulan = $('#filter_grup').val();

        view(kategori,bulan);
    

    });

    function filterKategori(){
        var kategori = $('#filter_kategori').val();
        var grup = $('#filter_grup').val();

        view(kategori,grup);
    }

    function filterGrup(){
        var kategori = $('#filter_kategori').val();
        var grup = $('#filter_grup').val();

        view(kategori,grup);
    }


    function reset() {
        $('#nama').val("");
    }


    $('#btn_nonaktif').on('click', function(){
        
        if (!$("#tanggal").val()) {
            $.toast({
                text: 'TANGGAL MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#tanggal").focus();
            return false;

        } 

        else if (!$("#alasan").val()) {
            $.toast({
                text: 'ALASAN MASIH KOSONG',
                position: 'top-right',
                loaderBg: '#fff716',
                icon: 'error',
                hideAfter: 3000
            });
            $("#alasan").focus();
            return false;

        } 



        var id          = $('#id_nonaktif').val();
        var tanggal     = $('#tanggal').val();
        var alasan      = $('#alasan').val();
        var token       = $('[name=_token]').val();
        var formData    = new FormData();
    
        formData.append('id', id);
        formData.append('tanggal', tanggal);
        formData.append('alasan', alasan);
        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('member.nonaktif') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(r) {

                    $('#tanggal').val("");
                    $('#alasan').val("");
                    
                    var kategori = $('#filter_kategori').val();
                    var grup = $('#filter_grup').val();

                    view(kategori,grup);
                    swal("Berhasil!", "Data Berhasil Disimpan", "success");
                    $('#formModalNonaktif').modal('hide');
                
               
            }
        });

    return false;

    });

    function view(kategori,grup) {

        $.ajax({
            type: 'GET',
            url: "{{ route('member.view') }}",
            async: true,
            dataType: 'JSON',
            data:{kategori:kategori,grup:grup},
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                
                document.getElementById("laki-laki").innerHTML= r.pria;
                document.getElementById("perempuan").innerHTML= r.perempuan;
                document.getElementById("total").innerHTML= r.total;

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="10%">'),
                            $('<td width="10%">'),
                            $('<td width="5%" align="left">'),
                            $('<td width="5%" align="center">'),
                            $('<td width="1%" align="center">')
                        ]);
             
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<small class="text-muted">'+(data[i].anak_jekel)+' - '+(data[i].usia_anak)+'</small>'));                      

                        // tr.find('td:nth-child(3)').append($('<div>')
                        //     .html((data[i].ortu_ibu)+' - <small class="text-muted">(Ibu)</span></small>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<small class="text-muted"><i class="far fa-calendar-check"></i> '+(data[i].tgl_member)+ ' - <span class="text-info">' +(data[i].lama_member)+' </span></small>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html('<b>'+(data[i].tarif_nama)+'</b>'));  

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html(data[i].grup));      

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html(data[i].kat_nama));      

                        if ((data[i].member_aktif) == 'Y' ) {

                            tr.find('td:nth-child(6)').append('<div class="dropdown d-inline-block float-center"><a class="nav-link btn btn-xs btn-soft-primary waves-effect waves-light dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" href="#" class="btn btn-soft-warning btn-xs"> <span>Aktif </span> <i class="las la-angle-down ms-1"></i></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4"><a class="dropdown-item item_edit"  href="javascript:;" data="'+data[i].member_id+'" ><i class="fas fa-edit"></i> Update Member</a><a class="dropdown-item item_nonaktif " href="javascript:;" data="'+data[i].member_id+'" ><i class="far fa-trash-alt"></i> Non-Aktif</a></div></div>');

                        } 
                        
                        else {
                            tr.find('td:nth-child(6)').append($('<div>')
                                .html('<span class="badge badge-soft-danger px-2">Tidak Aktif</span>'));
                        }                      

                        tr.appendTo($('#show_data'));
                    }
                }

               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_detail(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tagihan.detail_view') }}",
            async: true,
            dataType: 'JSON',
            data:{kode:kode},
            success: function(r) {
                var i;
                
                $('#show_data_detail').empty();
                data = r.data;

                console.log(data);
            
                $('[name="total_biaya"]').val(r.total);
                $('[name="grand_total"]').val(r.total);

                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="70%" align="left">'),
                            $('<td width="10%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].tarif_nama))); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].detail)));   

                        tr.appendTo($('#show_data_detail'));
                    }


                } else {

                    $('#show_data_detail').append('<tr><td colspan="10">Data Kosong</td></tr>');

                }
                

            }
        });

    }
    


    $('#show_data').on('click','.item_edit',function(){

        var id=$(this).attr('data');
        $.ajax({
            type : "GET",
            url   : "{{ route('member.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                $('#formModalEdit').modal('show');
                $('#formModalEdit').find('[name="trs_kode"]').val(data.trs_kode);
                $('#formModalEdit').find('[name="input_diskon"]').val("0");
            }
        });

        return false;

    });

    $('#show_data').on('click','.item_nonaktif',function(){

        var id=$(this).attr('data');
        $.ajax({
            type : "GET",
            url   : "{{ route('member.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                $('#formModalNonaktif').modal('show');
                $('#formModalNonaktif').find('[name="id_nonaktif"]').val(data.member_id);
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

    function combo_filter_kategori(){

        $('select[name=filter_kategori]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_kategori') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=filter_kategori]').empty()
                var x = document.getElementById("filter_kategori");
                        var option = document.createElement("option");
                        option.text = "Semua";
                        option.value = 'Semua';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].kat_kode)+'>'+(data[i].kat_nama)+'</option>';
                    $('select[name=filter_kategori]').append(html)
                }
            }
        });

    }

    function combo_filter_grup(){

        $('select[name=filter_grup]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_grup_detail') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=filter_grup]').empty()
                var x = document.getElementById("filter_grup");
                        var option = document.createElement("option");
                        option.text = "Semua";
                        option.value = 'Semua';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_kode)+'>'+(data[i].detail_nama)+'</option>';
                    $('select[name=filter_grup]').append(html)
                }
            }
        });

    }
    
</script>


@endsection