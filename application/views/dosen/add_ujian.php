<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Ujian</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Buat Ujian Baru </strong>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('dosen/tambah_ujian'); ?>">
                <div class="form-group">
                    <label for="namaDosen"><strong> Nama Dosen </strong></label>
                    <input type="text" name="nama_dosen" class="form-control" id="namaDosen" value="<?= $dosen['nama_dosen']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="mataKuliah"><strong> Mata Kuliah</strong></label>
                    <select class="form-control" id="mataKuliah" name="kd_matkul">
                        <option value="">Pilih Mata Kuliah yang Diajar</option>
                        <?php
                        foreach ($matkul->result() as $m) {
                            echo "<option value='$m->kd_matkul'>$m->nama_matkul</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipeUjian"><strong> Tipe Ujian </strong></label>
                    <select class="form-control" id="tipeUjian" name="tipe_ujian">
                        <option value="">Pilih Tipe Ujian</option>
                        <option value="UTS">Ujian Tengah Semester</option>
                        <option value="UAS">Ujian Akhir Semester</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Buat Soal <i class="fas fa-fw fa-arrow-right"></i> </button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->