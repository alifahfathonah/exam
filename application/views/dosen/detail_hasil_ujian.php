<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Ujian</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"><?= $get_mhs['nama_mhs']; ?> - <?= $get_mhs['nama_prodi']; ?> <?= $get_mhs['nama_kelas']; ?>/<?= $get_mhs['semester']; ?> </strong>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                $n = 1;

                foreach ($records as $row) {
                    ?>
                <div class="col-md-12">
                    <?= $n++; ?>. <label class="col-form-label"><?= $row->soal; ?></label><br>
                    <label class="col-form-label ml-3"> <strong> Jawaban </strong></label><br>
                    <label class="col-form-label ml-3"><?= $row->jawaban; ?></label><br>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>