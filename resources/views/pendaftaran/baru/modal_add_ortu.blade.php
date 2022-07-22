<div class="modal fade  bd-example-modal-lg" id="formModalAddOrtu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> <strong>Tambah Data Orang Tua</strong> </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <div class="row">
                        <div class="col-md-12 order-md-1">
            
                            {!! csrf_field() !!}
  
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name"> <small>Nama Ayah</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ortu_nama_ayah" name="ortu_nama_ayah">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name"> <small>Pekerjaan</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" id="ortu_kerja_ayah" name="ortu_kerja_ayah"></select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name"> <small>No HP</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ortu_hp_ayah" name="ortu_hp_ayah" onkeypress="return angka(this, event)">
                                        </div>
                                    </div>      
                                    <div class="col-md-12">
                                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <textarea class="form-control" rows="2" id="ortu_ayah_alamat" name="ortu_ayah_alamat"></textarea>
                                        </div>
                                    </div>       
                                </div>
                                <hr class="mb-4">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label for="name"> <small>Nama Ibu</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ortu_nama_ibu" name="ortu_nama_ibu">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name"> <small>Pekerjaan</small> <span class="text-danger">*</span> </label>
                                        <select class="form-control" id="ortu_kerja_ibu" name="ortu_kerja_ibu"></select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name"> <small>No HP</small> <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" id="ortu_hp_ibu" name="ortu_hp_ibu" onkeypress="return angka(this, event)" maxlength="15">
                                        </div>
                                    </div>      
                                    <div class="col-md-12">
                                        <label for="name"> <small>Alamat</small>  <span class="text-danger">*</span> </label>
                                        <div class="input-group mb-2">
                                            <textarea class="form-control" rows="2" id="ortu_ibu_alamat" name="ortu_ibu_alamat"></textarea>  
                                        </div>
                                    </div>           
                                </div>
       
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_ortu">Simpan</button>
            </div>
        </div>
    </div>
</div>

