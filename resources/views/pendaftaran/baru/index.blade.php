@extends('app.layouts.template')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Baru</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 order-md-1">
                        <form class="needs-validation" novalidate="">

                            <h4 class="mb-3">Data Anak</h4>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Nama Anak <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="state">Tempat Lahir <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">Tgl Lahir <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="state">Jenis Kelamin <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">Agama <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
   
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="What would you like to see?"></textarea>
                                </div>
                            </div>

                            <hr class="mb-4">

                            <h4 class="mb-3">Data Wali</h4>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Nama Wali <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="state">Jenis Kelamin <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">Status Hubungan <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Ayah</option>
                                        <option>Ibu</option>
                                        <option>Paman</option>
                                        <option>Wali</option>
                                    </select>
                                </div>
   
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="state">No Hp <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">No WA </label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="What would you like to see?"></textarea>
                                </div>
                            </div>

                            <hr class="mb-4">

                            <h4 class="mb-3">Pendaftaran</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="state">Jenis Customers <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Semen Padang Group</option>
                                        <option>Umum</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">Perusahaan <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Semen Padang</option>
                                        <option>Yayasan Semen Padang</option>
                                        <option>Semen Padang Hospital</option>
                                        <option>Klinik Semen Padang</option>
                                        <option>Pasoka</option>
                                        <option>Wali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="state">Jenis Pendaftaran <span class="text-danger">*</span> </label>
                                    <select class="d-block w-100" id="state" required="">
                                        <option value="">Pilih...</option>
                                        <option>Member</option>
                                        <option>Harian</option>
                                    </select>
                                </div>
                            </div>

                       
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection