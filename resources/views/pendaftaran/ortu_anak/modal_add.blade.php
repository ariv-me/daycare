<div class="modal fade  bd-example-modal-lg" id="formModalAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Tambah Data Perusahaan</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <div class="row">
                        <div class="col-md-12 order-md-1">
            
                            {!! csrf_field() !!}
    
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><small>Orang Tua</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <select class="form-control" style="width: 50%;" name="ortu" id="ortu"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label><small>Nama Lengkap</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="anak_nama" name="anak_nama" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="name"> <small>Tempat Lahir</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="anak_tmp_lahir" name="anak_tmp_lahir" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"> <small>Tanggal Lahir</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="date" class="form-control" id="anak_tgl_lahir" name="anak_tgl_lahir" required="">
                                        </div>
                                    </div>       
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="name"> <small>Jenis Kelamin</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" style="width: 50%;" name="anak_jekel" id="anak_jekel"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"> <small>Anak Ke</small>  <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name"> <small>Jumlah Saudara</small>  <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="jml_saudara" name="jml_saudara" onkeypress="return angka(this, event)" maxlength="1">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

