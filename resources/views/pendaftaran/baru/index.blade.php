@extends('app.layouts.template')



@section('content')


@include('pendaftaran.baru.modal_anak')

@endsection

@section('js')

{{-- <script type="text/javascript">

    $(document).ready(function(){

        $('.datepicker').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' });
        $('.datepicker[name=daftar_tanggal]').val(moment().format('DD-MM-YYYY'));
        $('.datepicker').datepicker({
          autoclose: true,
          format:'dd-mm-yyyy',
        });  

        // $( "#daftar_tanggal" ).datepicker(moment(new Date(),"YYYY-MM-DD").utcOffset(0, true).format());
        //$( "#daftar_tanggal" ).datepicker({dateFormat:"DD-MM-YYYY"}).datepicker("setDate",new Date());
        
        var tgl       = $('#daftar_tanggal').val();
        
        console.log(tgl);

        combo_blm();
        combo_jenis();
        combo_perusahaan();
        view_tarif();
        view_daftar();
        reset();

    });

    function reset() {
        $('#daftar_anak').val("");
        $('#daftar_nis').val("");
        $('#anak_nama').val("");
        $('#anak_tmp_lahir').val("");
        $('#anak_tgl_lahir').val("");
        $('#anak_jekel').val("");
        $('#anak_ke').val("");
        $('#jml_saudara').val("");
        $('#ortu_nama').val("");
        $('#ortu_pekerjaan').val("");
        $('#ortu_hp').val("");
        $('#ortu_alamat').val("");
        $('#harga_jual').val("");
        document.getElementById("anak_jekel").focus();
    }

    $('#btn_add').on('click',function(){

        $('#formModalAdd').modal('show');
        reset();

    });

    $('#btn_cari').on('click', function() {
        $('#formModalAnak').modal('show');
        view_anak();
    });


    function view_daftar(kode) {

        $.ajax({
            type: 'GET',
            url: "{{ route('pendaftaran.view') }}",
            async: true,
            data : {kode:kode},
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_daftar').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="2%">'),
                            $('<td width="10%" align="center">'),
                            $('<td width="20%" align="left">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nis)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tarif_reg)));  

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].tarif_spp)));   

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].tarif_pembg)));   

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].tarif_pembg)));   

                        tr.find('td:nth-child(8)').append('<div class="d-flex"><a href="javascript:;" class="text-warning font-w600 mr-4 item_pilih2" data="'+data[i].daftar_kode+'">EDIT</a><a href="javascript:;" class="text-danger font-w600 mr-4 item_pilih2" data="'+data[i].daftar_kode+'">HAPUS</a></div>'); 

                        tr.appendTo($('#show_data_daftar'));
                    }

                }
                //$('#datatable').DataTable('refresh'); 
            }
        });
    }

    function view_anak() {

        $.ajax({
            type: 'GET',
            url: "{{ route('anak.view') }}",
            async: true,
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_anak').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td class= width="5%" align="left">'),
                            $('<td class= width="50%">'),
                            $('<td class= width="50%">'),
                            $('<td class= width="10%" align="center">'),
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].anak_nis)));   

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].anak_nama)));   

                        tr.find('td:nth-child(4)').append('<a href="javascript:;" class="btn btn-rounded btn-success btn-xs item_pilih"  data="'+data[i].anak_nis+'"><i class="fa fa-check"></i>  Pilih</a>'); 

                        tr.appendTo($('#show_data_anak'));
                    }

                }
                //$('#datatable').DataTable('refresh'); 
            }
        });
    }

    
    function showFilterPerusahaan(select){
        var filter_perusahaan=$('#perusahaan').val();
        var filter_jenis=$('#jenis').val();
        
        view_tarif(filter_perusahaan,filter_jenis);
    }

    function showFilterJenis(select){
        var filter_perusahaan=$('#perusahaan').val();
        var filter_jenis=$('#jenis').val();

        view_tarif(filter_perusahaan,filter_jenis);
    }

    function view_tarif(filter_perusahaan,filter_jenis) {

        $.ajax({
            type: 'GET',
            url: "{{ route('tarif.view') }}",
            async: true,
            data : {perusahaan:filter_perusahaan,jenis:filter_jenis},
            dataType: 'JSON',
            success: function(r) {
                var i;
                //$('#datatable').DataTable().destroy(); 
                $('#show_data_tarif').empty();
                data = r.data;
                if (data.length) {
                    for (i = 0; i < data.length; i++) {

                        var tr = $('<tr>').append([
                            $('<td width="5%" align="center">'),
                            $('<td width="15%">'),
                            $('<td width="15%">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">'),
                            $('<td width="15%" align="right">')
                        ]);

                        tr.find('td:nth-child(1)').html((i + 1));

                        tr.find('td:nth-child(2)').append($('<div>')
                            .html((data[i].kode)));  

                        tr.find('td:nth-child(3)').append($('<div>')
                            .html((data[i].kode)));   

                        tr.find('td:nth-child(4)').append($('<div>')
                            .html((data[i].tarif_reg)));   

                        tr.find('td:nth-child(5)').append($('<div>')
                            .html((data[i].tarif_spp)));  

                        tr.find('td:nth-child(6)').append($('<div>')
                            .html((data[i].tarif_pembg)));   

                        tr.find('td:nth-child(7)').append($('<div>')
                            .html((data[i].tarif_pembg)));   

                        tr.appendTo($('#show_data_tarif'));
                    }

                }
                    //$('#datatable').DataTable('refresh'); 
            }
        });
    }


    $('#show_data_anak').on('click','.item_pilih',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('anak.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $('[name="daftar_nis"]').val(data.anak_nis);
                $('[name="daftar_anak"]').val(data.anak_nama);
                $('[name="perusahaan"]').val(data.ortu_ayah_peru_id);

                $('#formModalAnak').modal('hide');
            }
        });

        return false;

    });

    $('#show_data_anak2').on('click','.item_pilih2',function(){

        var id = $(this).attr('data');

        $.ajax({
            type: "GET",
            url: "{{ route('anak.edit') }}",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $('[name="daftar_nis2"]').val(data.anak_nis);
            }
        });

        return false;

    });



    $('#btn_simpan').on('click', function(){
    
        
        var anak_nis       = $('#anak_nis').val();
        var anak_nama       = $('#anak_nama').val();
        var anak_tmp_lahir  = $('#anak_tmp_lahir').val();
        var anak_tgl_lahir  = $('#anak_tgl_lahir').val();
        var anak_jekel      = $('#anak_jekel').val();
        var anak_ke         = $('#anak_ke').val();
        var jml_saudara     = $('#jml_saudara').val();

        var ortu_nama       = $('#ortu_nama').val();
        var ortu_pekerjaan  = $('#ortu_pekerjaan').val();
        var ortu_hp         = $('#ortu_hp').val();
        var ortu_alamat     = $('#ortu_alamat').val();

        var token = $('[name=_token]').val();

       

        var formData = new FormData();
    
        formData.append('anak_nis', anak_nis);
        formData.append('anak_nama', anak_nama);
        formData.append('anak_tmp_lahir', anak_tmp_lahir);
        formData.append('anak_tgl_lahir', anak_tgl_lahir);
        formData.append('anak_jekel', anak_jekel);
        formData.append('anak_ke', anak_ke);
        formData.append('jml_saudara', jml_saudara);

        formData.append('ortu_nama', ortu_nama);
        formData.append('ortu_pekerjaan', ortu_pekerjaan);
        formData.append('ortu_hp', ortu_hp);
        formData.append('ortu_alamat', ortu_alamat);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.anak') }}",
            dataType: "JSON",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#formModalAdd').modal('hide');
                swal("Berhasil!", "Data Berhasil Disimpan", "success");
            }
        });
    
        return false;

    });


    $('#btn_proses').on('click', function(){
    
    
    var daftar_tanggal       = $('#daftar_tanggal').val();
    var daftar_nis           = $('#daftar_nis').val();
    var daftar_anak          = $('#daftar_anak').val();
    var perusahaan           = $('#perusahaan').val();
    var jenis                = $('#jenis').val();

    console.log(daftar_anak);
    
    var token = $('[name=_token]').val();

    var formData = new FormData();

        formData.append('daftar_nis', daftar_nis);
        formData.append('daftar_anak', daftar_anak);
        formData.append('perusahaan', perusahaan);
        formData.append('jenis', jenis);

        formData.append('_token', token);

        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.save') }}",
            dataType: "JSON",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $.toast({
                        text: 'BERHASIL',
                        position: 'top-right',
                        loaderBg: '#2bc155',
                        icon: 'success',
                        hideAfter: 3000
                    });
                     
                    view_daftar(); 
                    reset();

                }
            });

        return false;

    });

    function combo_jenis(){

    $('select[name=jenis]').empty()
        $.ajax({
                type  : 'GET',
                url   : "{{ route('combo_sistem.combo_jenis_pendaftaran') }}",
                async : false,
                dataType : 'JSON',
                success : function(data){
                    var html = '';
                    var i;
                    $('select[name=jenis]').empty()
                    for(i=0; i<data.length; i++){
                        var html = '';
                        html = '<option value='+(data[i].jenis_id)+'>'+(data[i].jenis_nama)+'</option>';
                        $('select[name=jenis]').append(html)
                    }
                }
            });

    }

    function combo_blm(){

        $('select[name=daftar_blm]').empty()
            var html = '';
            html = '<option value="B">Baru</option>'+
                   '<option value="L">Lama</option>';
        $('select[name=daftar_blm]').append(html)

    }

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
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_nama)+'</option>';
                    $('select[name=grup]').append(html)
                }
            }
        });

    }

    function combo_perusahaan(){

        $.ajax({
            type  : 'GET',
            url   : "{{ route('combo_sistem.combo_perusahaan') }}",
            async : false,
            dataType : 'JSON',
            success : function(data){
                var html = '';
                var i;
                $('select[name=perusahaan]').empty()
                for(i=0; i<data.length; i++){
                    var html = '';
                    html = '<option value='+(data[i].grup_id)+'>'+(data[i].grup_kode)+' - '+(data[i].peru_nama)+'</option>';
                    $('select[name=perusahaan]').append(html)
                }
            }
        });

    }



</script> --}}


@endsection