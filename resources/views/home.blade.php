@extends('app.layouts.template')

@section('css')
    <style>
        .crm-activity-height {
            height: 25px;
        }
    </style>
@endsection

@section('content')
<div class="col-12 mt-3">
    <div class="card calendar-cta">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    {{-- <img src="assets/images/widgets/calendar.svg" alt="" class="" height="150"> --}}
                    <img src="{{ asset('resources/templates3/view/assets/images/logo-sm.png') }}" alt="" class="" height="80">
                </div><!--end col-->
                <div class="col">
                    <h5 class="font-20">Selamat Datang</h5>
                    <span class="ml-1 nav-user-name hidden-sm">Hello, <strong> {{ Auth::user()->name }} </strong></span>
                </div><!--end col-->
                
            </div><!--end row-->
        </div><!--end card-body-->
    </div><!--end card-->
</div>
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 font-weight-semibold">Total Member</p>
                            <h2 class="my-2" id="member_total"></h2>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <i class="dripicons-user-group"></i>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col--> 
        <div class="col-md-6 col-lg-4">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">                                                
                        <div class="col">
                            <p class="text-dark mb-1 font-weight-semibold">Laki-Laki</p>
                            <h2 class="text-info my-2" id="member_laki"></h2>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <i class="text-info mdi mdi-gender-male"></i>
                            </div>
                        </div> 
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col--> 
        <div class="col-md-6 col-lg-4">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">                                                
                        <div class="col">
                            <p class="text-dark mb-1 font-weight-semibold">Perempuan</p>
                            <h2 class="text-pink my-2" id="member_perempuan"></h2>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <i class="text-pink mdi mdi-gender-female"></i>
                            </div>
                        </div> 
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->         
    </div>
</div>
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">                      
                    <h4 class="card-title">Data yang belum bayar SPP</h4>                      
                </div><!--end col-->
                <div class="col-auto"> 
                    
                </div>
            </div>  <!--end row-->                                  
        </div><!--end card-header-->
        <div class="card-body">
            <div class="tab-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Anak  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="filter_anak" id="filter_anak" onchange="filterAnak(this)"></select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Bulan  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="filter_bulan" id="filter_bulan" onchange="filterBulan(this)"></select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Terbayar  </label><br>
                            <span  class="h3 text-success text-strong mt-2">Rp. </span><span class="h3 text-success mt-2" id="total_terbayar"></span>      
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Tagihan  </label><br>
                            <span  class="h3 text-danger text-strong mt-2">Rp. </span><span class="h3 text-danger mt-2" id="total_tagihan"></span>      
                        </div>
                    </div>
                </div>
        
                    <div class="table-responsive">
                        <table id="" class="table-sm table mb-0 table-centered dt-responsive table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th style="text-align: center">NO</th>
                                    <th style="text-align: left">ANAK</th>
                                    <th style="text-align: left">TRANSAKSI</th>
                                    <th  style="text-align: left">JATUH TEMPO</th>
                                    <th  style="text-align: right">TAGIHAN</th>
                                </tr>
                            </thead>
                            <tbody id="show_data"></tbody>
                        </table>
                    </div>	
                </div>
               
            </div>
        </div><!--end card-body--> 
    </div><!--end card--> 
</div>

@endsection

@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        
        $('.datepicker[name=tgl_bayar]').val(moment().format('DD-MM-YYYY'));
        $('.select2').select2();
        
        $("#filter_bulan").datepicker( {
            viewMode: "months",
            minViewMode: "months",
            autoClose: true,
            format: 'MM'
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        $('#filter_bulan').val('Semua');

        combo_filter_anak();
        combo_filter_bulan();

        var anak  = $('#filter_anak').val();
        var bulan = $('#filter_bulan').val();

        tagihan(anak,bulan);
        member();
    

    });

    function filterAnak(){
        var anak = $('#filter_anak').val();
        var bulan = $('#filter_bulan').val();

        tagihan(anak,bulan);
    }

    function filterBulan(){
        var anak = $('#filter_anak').val();
        var bulan = $('#filter_bulan').val();

        tagihan(anak,bulan);
    }




    function tagihan(anak,bulan) {

        $.ajax({
            type: 'GET',
            url: "{{ route('dashboard.tagihan') }}",
            async: true,
            dataType: 'JSON',
            data:{anak:anak,bulan:bulan},
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                data = r.data;
                
                document.getElementById("total_terbayar").innerHTML= r.lunas;
                document.getElementById("total_tagihan").innerHTML= r.total;


                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="10%">'),
                            $('<td width="10%">'),
                            $('<td width="5%">'),
                            $('<td width="5%" align="right">'),
                        ]);
             
                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html('<b class="font-13">'+(data[i].anak_nama)+'</b>')); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].tarif_nama)));  

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html(data[i].trs_jatuh_tempo));      

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html('<b class="text-dark font-15">'+(data[i].tarif_total)+'</b>'));          

                        tr.appendTo($('#show_data'));
                    }
                }

               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function member() {

        $.ajax({
            type: 'GET',
            url: "{{ route('dashboard.member') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                
                data = r.data;
          
                document.getElementById("member_total").innerHTML= r.total;
                document.getElementById("member_laki").innerHTML= r.pria;
                document.getElementById("member_perempuan").innerHTML= r.perempuan;

            }
        });

    }
    


    $('#show_data').on('click','.item_bayar',function(){

        var id=$(this).attr('data');
        $.ajax({
            type : "GET",
            url   : "{{ route('tagihan.edit') }}",
            dataType : "JSON",
            data : {id:id},
            success: function(data){

                var anak_jekel = data.anak_jekel;

                if (anak_jekel == 'L'){
                    var jekel = 'Laki-Laki';
                } else {
                    var jekel = 'Perempuan';
                }

                document.getElementById("tgl_daftar").innerHTML= data.trs_tgl;
                document.getElementById("daftar_kode").innerHTML= data.trs_kode;
                document.getElementById("nama_anak").innerHTML= data.anak_nama;
                document.getElementById("jekel").innerHTML= jekel;
                document.getElementById("tgl_lahir").innerHTML= data.anak_tmp_lahir +' | '+ data.anak_tgl_lahir ;
                
                document.getElementById("tarif").innerHTML= data.tarif_nama +' - '+  data.kat_nama ;

                $('#formModalBayar').modal('show');
                $('#formModalBayar').find('[name="trs_kode"]').val(data.trs_kode);
                $('#formModalBayar').find('[name="input_diskon"]').val("0");

                $('#filter_bulan').val('Semua');

                var anak  = $('#filter_anak').val();
                var bulan = $('#filter_bulan').val();

                view(anak,bulan);
                                
                view_detail(id);
            }
        });

    return false;

    });


    function combo_filter_anak(){

        $('select[name=filter_anak]').empty()
        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo.combo_dapok_anak') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=filter_anak]').empty()
                var x = document.getElementById("filter_anak");
                        var option = document.createElement("option");
                        option.text = "Semua Anak";
                        option.value = 'Semua';
                        x.add(option);
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].anak_kode)+'>'+(data[i].anak_nama)+'</option>';
                    $('select[name=filter_anak]').append(html)
                }
            }
        });

    }

    function combo_filter_bulan(){

    $('select[name=filter_bulan]').empty()
        var html = '';
        html = '<option value="Semua">Semua Bulan</option>'+
            '<option value="01">Januari</option>'+
            '<option value="02">Februari</option>'+
            '<option value="03">Maret</option>'+
            '<option value="04">April</option>'+
            '<option value="05">Mei</option>'+
            '<option value="06">Juni</option>'+
            '<option value="07">Juli</option>'+
            '<option value="08">Agustus</option>'+
            '<option value="09">September</option>'+
            '<option value="10">Oktober</option>'+
            '<option value="11">November</option>'+
            '<option value="12">Desember</option>';

        $('select[name=filter_bulan]').append(html)

    }

  
    
</script>

@endsection
