@extends('app.layouts.template')

@section('content')

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Baru</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 order-md-1">
                        <form class="needs-validation" novalidate="">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="state">Nama Anak <span class="text-danger">*</span> </label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="firstName" placeholder="Inputkan Nama Anak..." value="" required="">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-outline-warning mb-2" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="state">Jenis Customer <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Semen Padang Grup</option>
                                        <option>Umum</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">Perusahaan<span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Semen Padang Hospital</option>
                                        <option>KLISEPA</option>
                                        <option>Pasoka</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">Jenis Pendaftaran <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Marian - Rp.200.000</option>
                                        <option>Member (Full Day) - Rp.4.500.000</option>
                                        <option>Member (Half Day) - Rp.4.000.000</option>
                                    </select>
                                </div>
   
                            </div>

                           
                            <hr class="mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Proses</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Total Harga</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 order-md-1">
                        
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-rounded btn-danger btn-event w-100"><span class="btn-icon-left text-danger"><i class="fa fa-close"></i>
                        </span>Batal</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-rounded btn-primary btn-event w-100"><span class="btn-icon-left text-primary"><i class="fa fa-shopping-cart"></i>
                        </span>Bayar</button>
                    </div>
                </div>
               
               
            </div>
        </div> 
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail</h4>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>


<!--******************* Modal Add ********************-->
@include('pendaftaran.baru.modal_add')





@endsection