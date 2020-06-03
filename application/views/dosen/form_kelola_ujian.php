<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Ujian</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Form Kelola Ujian </strong>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('dosen/kelola_ujian'); ?>">
                <div class="form-group row">
                    <label for="soalUjian" class="col-sm-2 col-form-label"><strong>Soal Ujian</strong></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="soalUjian" name="id_soal">
                            <option value="">Pilih Soal Ujian</option>
                            <?php
                            foreach ($soal_ujian->result() as $sj) {
                                echo "<option value='$sj->id_soal'>$sj->tipe_ujian - $sj->nama_matkul - $sj->tahun</option>";
                            }
                            ?>
                        </select>
                        <?php echo form_error('id_soal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tglUjian" class="col-sm-2 col-form-label"><strong>Tanggal Ujian</strong></label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_ujian" class="form-control" id="tglUjian" value="<?php echo set_value('tgl_ujian'); ?>">
                        <?php echo form_error('tgl_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktuMulai" class="col-sm-6 col-form-label"><strong>Waktu Mulai Ujian</strong></label>
                    <label for="waktuSelesai" class="col-sm-6 col-form-label"><strong>Waktu Selesai Ujian</strong></label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="time" id="waktuMulai" name="waktu_mulai_ujian" class="form-control" value="<?php echo set_value('waktu_mulai_ujian'); ?>">
                        <?php echo form_error('waktu_mulai_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="time" id="waktuSelesai" name="waktu_selesai_ujian" class="form-control" value="<?php echo set_value('waktu_selesai_ujian'); ?>">
                        <?php echo form_error('waktu_selesai_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Simpan Ujian <i class="fa fa-check"></i></button>
                <button type="reset" class="btn btn-danger">Hapus <i class="fa fa-times"></i></button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->