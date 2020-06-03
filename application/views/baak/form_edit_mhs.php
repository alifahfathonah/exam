<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Mahasiswa</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Edit Mahasiswa</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('baak/edit_mhs'); ?>" method="post">
                <!-- <input type="hidden" name="old_nim" value="<?= $old_nim; ?>"> -->
                <div class="form-group row">
                    <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-3">
                        <input type="text" name="nim" class="form-control" id="NIM" maxlength="10" value="<?= $mhs['nim']; ?>">
                        <?php echo form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_mhs" class="form-control" id="namaMhs" value="<?= $mhs['nama_mhs']; ?>">
                        <?php echo form_error('nama_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="<?= $mhs['jk']; ?>"><?= $mhs['jk']; ?></option>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempatLahir" value="<?= $mhs['tempat_lahir']; ?>">
                        <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tglLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tglLahir" value="<?= $mhs['tgl_lahir']; ?>">
                        <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="telpMhs">No. Telepon</label>
                        <input type="text" name="telp_mhs" id="telpMhs" class="form-control" maxlength="13" value="<?= $mhs['telp_mhs']; ?>">
                        <?php echo form_error('telp_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="emailMhs">Email</label>
                        <input type="text" name="email_mhs" id="emailMhs" class="form-control" value="<?= $mhs['email_mhs']; ?>">
                        <?php echo form_error('email_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="statusMhs">Status</label>
                        <select name="status_mhs" id="statusMhs" class="form-control">
                            <option value="<?= $mhs['status_mhs']; ?>"><?= $mhs['status_mhs']; ?></option>
                            <option value="">Pilih Status Mahasiswa</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Lulus">Lulus</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <?php echo form_error('status_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamatMhs" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat_mhs" class="form-control" id="alamatMhs" value="<?= $mhs['alamat_mhs']; ?>">
                        <?php echo form_error('alamat_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="programStudi">Program Studi</label>
                        <select name="id_prodi" id="programStudi" class="form-control">
                            <option value="<?= $mhs['id_prodi']; ?>"><?= $mhs['nama_prodi']; ?></option>
                            <option value="">Pilih Program Studi</option>
                            <?php
                            foreach ($prodi->result() as $p) {
                                echo "<option value='$p->id_prodi'>$p->nama_prodi</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="thMasuk">Tahun Masuk</label>
                        <input type="text" name="th_masuk" id="thMasuk" value="<?= $mhs['th_masuk']; ?>" disabled class="form-control">
                    </div>
                </div>
                <div class="form-actions">
                    <a href="<?= base_url('baak/data_mhs'); ?>" class="btn btn-info"><i class="fas fa-fw fa-arrow-left"></i>Kembali</a>
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