@extends('app.layouts.template')

@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="card">
            <div class="card-header bg-success">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title text-white"><i class="mdi mdi-cash-usd"></i>  PEMBAYARAN</h4>          
                    </div><!--end col-->
                    <div class="col-auto"> 
                    </div><!--end col-->
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Anak  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="filter_anak" id="filter_anak" onchange="filterAnak(this)"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Bulan  <small class="text-danger">*</small></label>
                            <select class="form-control custom-select select2" style="width: 100%;" name="filter_bulan" id="filter_bulan" onchange="filterBulan(this)"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="subject">Total  </label><br>
                            <span class="h4 text-danger mt-2" id="total"></span>      
                        </div>
                    </div>
                </div>
                <div class="box-body">					
                    <table id="datatable" class="table table-bordered mb-0 table-centered">
                        <thead>
                            <tr>
                                <th style="text-align: center;  vertical-align:middle;" rowspan="2">NO</th>
                                <th style="text-align: center; vertical-align:middle;" colspan="2" >KODE</th>
                                <th style="text-align: center;  vertical-align:middle;" rowspan="2">ANAK</th>
                                <th style ="text-align: center;  vertical-align:middle;" rowspan="2">TANGGAL</th>
                                <th style ="text-align: center;  vertical-align:middle;" rowspan="2">DISKON</th>
                                <th style ="text-align: center;  vertical-align:middle;" rowspan="2">BAYAR</th>
                                <th style ="text-align: center;  vertical-align:middle;" rowspan="2">TAGIHAN</th>
                                <th style ="text-align: center;  vertical-align:middle;" rowspan="2">#</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">BAYAR</th>
                                <th style="text-align: center">TAGIHAN</th>
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

        $('.select2').select2();

        // $("#filter_bulan").datepicker( {
        //     viewMode: "months",
        //     minViewMode: "months",
        //     autoClose: true,
        //     format: 'mm'
        // }).on('changeDate', function (ev) {
        //     $(this).datepicker('hide');
        // });

        combo_anak();
        combo_bulan();

        $('#filter_bulan').val('Semua');
        var anak  = $('#filter_anak').val();
        var bulan = $('#filter_bulan').val();

        view(anak,bulan);
       

    });

    function filterAnak(){
        var anak = $('#filter_anak').val();
        var bulan = $('#filter_bulan').val();

        view(anak,bulan);
    }

    function filterBulan(){
        var anak = $('#filter_anak').val();
        var bulan = $('#filter_bulan').val();

        view(anak,bulan);
    }

    function view(anak,bulan) {

        $.ajax({
            type: 'GET',
            url: "{{ route('pembayaran.view') }}",
            async: true,
            data:{anak:anak,bulan:bulan},
            dataType: 'JSON',
            success: function(r) {
                var i;
                $('#datatable').DataTable().destroy(); 
                $('#show_data').empty();
                
            
                data = r.data;

               document.getElementById("total").innerHTML='<b class="text-info font-18 mt-2">Rp.'+r.total+'</b>';

                if (data.length) {
                    for (i = 0; i < data.length; i++) {
                    
                        var tr = $('<tr>').append([
                            $('<td width="1%" align="center">'),
                            $('<td width="3%" align="center">'),
                            $('<td width="3%" align="center">'),
                            $('<td width="10%" align="left">'),
                            $('<td width="5%" align="center">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="5%" align="right">'),
                            $('<td width="1%" align="center">'),

                        ]);


                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].bayar_kode))); 

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].trs_kode)));      

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].anak_nama)));                           

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].bayar_tgl)));       

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].diskon)));           

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].total)));      

                        tr.find('td:nth-child(8)').append($('<div>')
                            .html((data[i].sub_total)));     
                        
                        tr.find('td:nth-child(9)').append('<div class="btn-group"><a href="'+(data[i].cetak)+'" class="btn btn-soft-danger btn-xs" target="_blank"><i class="fas fa-print"></i></a></div>');   

                        tr.appendTo($('#show_data'));
                    }

                }
               $('#datatable').DataTable('refresh'); 
            }
        });
    }

    function combo_anak(){

        $('select[name=anak]').empty()
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
                        option.text = "Semua";
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

    function combo_bulan(){

        $('select[name=filter_bulan]').empty()
        var html = '';
        html = '<option value="Semua">Semua</option>'+
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