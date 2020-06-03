<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Mata Kuliah</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Edit Mata Kuliah</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('baak/proses_edit_matkul'); ?>" method="post">
                <input type="hidden" name="old_kd" value="<?= $old_kd; ?>">
                <div class="form-group row">
                    <label for="kodeMatkul" class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
                    <div class="col-sm-3">
                        <input type="text" name="kd_matkul" class="form-control" id="kodeMatkul" placeholder="4 Digit" maxlength="4" value="<?= $matkul['kd_matkul']; ?>">
                        <?php echo form_error('kd_matkul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMatkul" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_matkul" class="form-control" id="namaMatkul" placeholder="Nama Mata Kuliah" value="<?= $matkul['nama_matkul']; ?>">
                        <?php echo form_error('nama_matkul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlahSks" class="col-sm-2 col-form-label">Jumlah SKS</label>
                    <div class="col-sm-3">
                        <input type="text" name="jumlah_sks" class="form-control" id="jumlahSks" placeholder="Masukkan jumlah sks" value="<?= $matkul['jumlah_sks']; ?>">
                        <?php echo form_error('jumlah_sks', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('baak/data_matkul'); ?>" class="btn btn-info"><i class="fas fa-fw fa-arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-edit"></i> Edit Data</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Container fluid  -->