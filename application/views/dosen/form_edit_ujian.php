<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Ujian</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Form Edit Ujian </strong>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('dosen/proses_edit_ujian'); ?>">
                <div class="form-group row">
                    <input type="hidden" name="old_id" value="<?= $old_id ?>">
                    <label for="mataKuliah" class="col-sm-2 col-form-label"><strong>Mata Kuliah</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mataKuliah" value="<?= $ujian['nama_matkul'];?>" disabled></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tglUjian" class="col-sm-2 col-form-label"><strong>Tanggal Ujian</strong></label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_ujian" class="form-control" id="tglUjian" value="<?= $ujian['tgl_ujian']; ?>">
                        <?php echo form_error('tgl_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktuMulai" class="col-sm-6 col-form-label"><strong>Waktu Mulai Ujian</strong></label>
                    <label for="waktuSelesai" class="col-sm-6 col-form-label"><strong>Waktu Selesai Ujian</strong></label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="time" id="waktuMulai" name="waktu_mulai_ujian" class="form-control" value="<?= $ujian['waktu_mulai_ujian']; ?>">
                        <?php echo form_error('waktu_mulai_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="time" id="waktuSelesai" name="waktu_selesai_ujian" class="form-control" value="<?= $ujian['waktu_selesai_ujian']; ?>">
                        <?php echo form_error('waktu_selesai_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <a href="<?= base_url('dosen/daftar_ujian'); ?>" class="btn btn-info"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-dark">Edit Ujian <i class="fa fa-edit"></i></button>
                <button type="reset" class="btn btn-danger">Hapus <i class="fa fa-times"></i></button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->