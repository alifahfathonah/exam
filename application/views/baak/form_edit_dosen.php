<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Dosen</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Edit Dosen</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('baak/edit_dosen'); ?>" method="post">
                <div class="form-group row">
                    <input type="hidden" name="old_nid" value="<?= $old_nid; ?>">
                    <label for="NID" class="col-sm-2 col-form-label">NID</label>
                    <div class="col-sm-3">
                        <input type="text" name="nid" class="form-control" id="NID" maxlength="10" value="<?= $dosen['nid']; ?>">
                        <?php echo form_error('nid', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaDosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_dosen" class="form-control" id="namaDosen" value="<?= $dosen['nama_dosen']; ?>">
                        <?php echo form_error('nama_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="<?= $dosen['jk']; ?>"><?= $dosen['jk']; ?></option>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempatLahir" value="<?= $dosen['tempat_lahir']; ?>">
                        <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tglLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tglLahir" value="<?= $dosen['tgl_lahir']; ?>">
                        <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="telpDosen">No. Telepon</label>
                        <input type="text" name="telp_dosen" id="telpDosen" class="form-control" maxlength="13" value="<?= $dosen['telp_dosen']; ?>">
                        <?php echo form_error('telp_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="emailDosen">Email</label>
                        <input type="text" name="email_dosen" id="emailDosen" class="form-control" value="<?= $dosen['email_dosen']; ?>">
                        <?php echo form_error('email_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="statusDosen">Status</label>
                        <select name="status_dosen" id="statusDosen" class="form-control">
                            <option value="<?= $dosen['status_dosen']; ?>"><?= $dosen['status_dosen']; ?></option>
                            <option value="">Pilih Status Dosen</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <?php echo form_error('status_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamatDosen" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat_dosen" class="form-control" id="alamatDosen" value="<?= $dosen['alamat_dosen']; ?>">
                        <?php echo form_error('alamat_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('baak/data_dosen'); ?>" class="btn btn-info"><i class="fas fa-fw fa-arrow-left"></i>Kembali</a>
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