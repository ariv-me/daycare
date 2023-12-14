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

<div class="modal fade  bd-example-modal" id="formModalBayar">
    <div class="modal-dialog modal-lg bg-white" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <i class="mdi mdi-cash-multiple"></i> <strong>Pembayaran</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-lg-12">
                        
                                <div class="row bg-white">
                                    <div class="col-lg-12">
                                        <input type="hidden" id="trs_kode" name="trs_kode">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="">
                                                    <h6 class="mb-0"><b>Tanggal Daftar :</b> </h6> <p id="tgl_daftar"></p>
                                                    <h6 class="mb-0"><b>Kode Pendaftaran :</b></h6> <p id="daftar_kode"></p>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-md-4">                                            
                                                <div class="float-left">
                                                    <address class="font-13">
                                                        <strong class="font-14">Nama :</strong>
                                                        <p class="mb-0" id="nama_anak"></p>
                                                        <strong class="font-14">Jenis Kelamin :</strong>
                                                        <p class="mb-0" id="jekel"></p>
                                                        <strong class="font-14">Lahir :</strong>
                                                        <p class="mb-0" id="tgl_lahir"></p>
                                                        
                                                    </address>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-md-4">
                                                <div class="">
                                                    <address class="font-13">
                                                        <strong class="font-14">Paket:</strong>
                                                        <p class="mb-0" id="tarif"></p>
                                                    </address>
                                                </div>
                                            </div> <!--end col-->                                           
                                                                             
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0 table-centered">
                                                <thead>
                                                    <tr>
                                                        <th width="1%" style="text-align: center; vertical-align: middle;">NO</th>
                                                        <th width="20%" style="text-align: center; vertical-align: middle;">TARIF</th>
                                                        <th width="30%" style="text-align: right; vertical-align: middle;">TOTAL</th>
                                                    </tr>
                               
                                                </thead>
                                                <tbody id="show_data_detail">
                                                
                                                </tbody>
                                            </table><!--end /table--> 
                                            <hr>
                                            <div class="row2">
                                                <div class="col-sm-7">
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-3 col-form-label text-right">Tanggal Bayar</small></label>
                                                        <div class="col-sm-5">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                 <input type="text" id="tgl_bayar" name="tgl_bayar" class="form-control datepicker" >
                                                            </div>
                                                        </div>
                                                    </div>   

                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-3 col-form-label text-right">Keterangan</small></label>
                                                        <div class="col-sm-9">
                                                            <textarea id="keterangan" name="keterangan" class="form-control" maxlength="225" rows="3"></textarea>
                                                        </div>
                                                    </div>     
                            
                                                        
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Sub Total</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="total_biaya" name="total_biaya" class="form-control sub-total geser_kanan" disabled>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Diskon</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="input_diskon" name="input_diskon" class="form-control diskon geser_kanan " onkeyup="sum();" onkeypress="return angka(this, event)">
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Pembayaran</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="input_bayar" name="input_bayar" class="form-control diskon geser_kanan " onkeyup="input_bayar();" onkeypress="return angka(this, event)">
                                                            </div>
                                                        </div>
                                                    </div>   

                                                    <div class="form-group row">
                                                        <label for="example-password-input" class="col-sm-5 col-form-label text-right">Grand Total</small></label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Rp. </span>
                                                                </div>
                                                                 <input type="text" id="grand_total" name="grand_total" class="form-control geser_kanan grand-total" onkeypress="return angka(this, event)" disabled>
                                                            </div>
                                                        </div>
                                                    </div>     
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>  <!--end col-->                                      
                                </div><!--end row-->
                        
                    </div><!--end col-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" id="btn_save"><i class="fab fa-cc-mastercard"></i> BAYAR</button>
            </div>
        </div>
    </div>
</div>

@endsection
