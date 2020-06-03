<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Soal & Jawaban</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Daftar Soal & Jawaban </strong>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('dosen/proses_tampil_daftar'); ?>">
                <div class="form-group row">
                    <label for="dosen" class="col-sm-2 col-form-label">Dosen Pengampu</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_dosen" id="dosen" class="form-control" value="<?= $dosen['nama_dosen']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mataKuliah" class="col-sm-2 col-form-label">Pilih Ujian</label>
                    <div class="col-sm-10">
                        <select name="id_soal" id="mataKuliah" class="form-control">
                            <option value=""><?= $get_soal['tipe_ujian'] .  ' - ' .  $get_soal['nama_matkul'] . ' - ' . $get_soal['tahun']; ?></option>
                            <option value="">Pilih Ujian</option>
                            <?php
                            foreach ($data_soal as $ds) {
                                echo "<option value='$ds->id_soal'>$ds->tipe_ujian - $ds->nama_matkul - $ds->tahun</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success float-right">Tampilkan</button>
            </form>
        </div>
        <div class="row ml-2">
            <?php
            $n = 1;

            foreach ($soal as $s) {
                ?>
            <div class="col-md-12">
                <?= $n++; ?>. <label class="col-form-label"><?= $s['soal']; ?></label>
                <ol type="A">
                    <?php
                        foreach ($s['jawaban'] as $key => $row) {
                            $key = $key;
                            ?>
                    <li><?php echo $row->jawaban; ?></li>
                    <?php
                        }
                        ?>
                </ol>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->