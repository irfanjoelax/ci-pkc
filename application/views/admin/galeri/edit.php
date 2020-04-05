<?php $this->load->view('layout/backend/header') ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Ubah Galeri
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="<?php echo site_url('galeri/update/'.$galeri->id_galeri) ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txt_nama" class="col-md-2 control-label">Judul Galeri</label>
                        <div class="col-md-8">
                            <input type="text" name="txt_nama" id="txt_nama" class="form-control" value="<?php echo $galeri->nama_galeri ?>"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img_galeri" class="col-md-2 control-label">Gambar</label>
                        <div class="col-md-10">
                            <input type="file" name="img_galeri" id="img_galeri" class="form-control">
                            <i>Gambar harus beresolusi 640 x 420</i>
                            <br><br>
                            <img width="200" height="180" src="<?php echo base_url('asset/gambar/galeri/'.$galeri->gambar_galeri) ?>"><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan Perubahan</button>
                            <a href="<?php echo site_url('galeri') ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Batal</a>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>

<?php $this->load->view('layout/backend/footer') ?>

</body>
</html