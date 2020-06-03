<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Kelas</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Kelas</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <form action="<?= base_url('baak/form_kelas'); ?>" method="post">
                <div class="form-group row">
                    <label for="namaKelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-3">
                        <input type="text" name="nama_kelas" class="form-control" id="namaKelas" placeholder="Masukan nama kelas"  value="<?php echo set_value('nama_kelas'); ?>">
                        <?php echo form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMatkul" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_matkul" class="form-control" id="namaMatkul" placeholder="Nama Mata Kuliah" value="<?php echo set_value('nama_matkul'); ?>">
                        <?php echo form_error('nama_matkul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlahSks" class="col-sm-2 col-form-label">Jumlah SKS</label>
                    <div class="col-sm-3">
                        <input type="text" name="jumlah_sks" class="form-control" id="jumlahSks" placeholder="Masukkan jumlah sks" value="<?php echo set_value('jumlah_sks'); ?>">
                        <?php echo form_error('jumlah_sks', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
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