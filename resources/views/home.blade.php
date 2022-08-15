@extends('app.layouts.template')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}  

                    
                    <div class="title m-b-md">
                        <form>
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                                <button type="submit" id="btn" class="btn btn-success">Print</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')

<script type="text/javascript">


    $('#btn').on('click',function(){

        var email = $('#email').val();
        var username = $('#username').val();
        var token = $('[name=_token]').val();

        console.log(email);

        var formData = new FormData();

        formData.append('email', email);
        formData.append('username', username);

        formData.append('_token', token);

        $.ajax({
            type : "POST",
            url   : "{{ route('grup.cetak') }}",
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


    // $('form').submit(function(e){
    // 	e.preventDefault();
    // var route = "{{ route('grup.cetak') }}";
    // var formData = {
    //             _token:"{{ csrf_token() }}",
    //             email:$('[name="email"]').val(),
    //             username:$('[name="username"]').val(),
    //         };
    // 	$.post(route, formData, function(data){
    // 		if(data.success == 'true')
    // 			alert('Cetak Data Berhasil...');
    // 		else
    // 			alert('Cetak Data GAGAL...');
    // 	});
    // });



</script>

@endsection
