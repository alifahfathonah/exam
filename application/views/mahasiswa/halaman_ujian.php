<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800">Halaman Ujian</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Halaman Ujian</h6>
        </div>
        <div class="card-body">
            <div class="row">
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
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->