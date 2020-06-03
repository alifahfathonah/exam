<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Mahasiswa</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Mahasiswa</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <form action="<?= base_url('baak/form_mhs'); ?>" method="post">
                <div class="form-group row">
                    <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-3">
                        <input type="text" name="nim" class="form-control" id="NIM" placeholder="10 Digit" maxlength="10" value="<?php echo set_value('nim'); ?>">
                        <?php echo form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_mhs" class="form-control" id="namaMhs" placeholder="Nama Lengkap" value="<?php echo set_value('nama_mhs'); ?>">
                        <?php echo form_error('nama_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempatLahir" placeholder="Kota Tempat Lahir">
                        <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="tglLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tglLahir">
                        <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="telpMhs">No. Telepon</label>
                        <input type="text" name="telp_mhs" id="telpMhs" class="form-control" placeholder="Nomor yang aktif" maxlength="13" value="<?php echo set_value('telp_mhs'); ?>">
                        <?php echo form_error('telp_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="emailMhs">Email</label>
                        <input type="text" name="email_mhs" id="emailMhs" class="form-control" placeholder="Email yang aktif" value="<?php echo set_value('email_mhs'); ?>">
                        <?php echo form_error('email_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamatMhs" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat_mhs" class="form-control" id="alamatMhs" placeholder="Alamat Lengkap" value="<?php echo set_value('alamat_mhs'); ?>">
                        <?php echo form_error('alamat_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="programStudi">Program Studi</label>
                        <select name="id_prodi" id="programStudi" class="form-control">
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
                        <select name="th_masuk" id="thMasuk" class="form-control">
                            <option value="">Pilih Tahun Masuk</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-dark"> <i class="fa fa-check"></i> Simpan</button>
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