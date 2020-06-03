<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Jawaban</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Data Soal Ujian </strong>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th width="30%">Nama Dosen</th>
                        <th>Mata Kuliah</th>
                        <th width="15%">Tipe Ujian</th>
                        <th width="13%">Options</th>
                    </tr>
                </thead>
                <a>
                    <?php
                    $i = 1;

                    foreach ($records as $r) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?= $r->nama_dosen; ?></td>
                            <td><?= $r->nama_matkul; ?></td>
                            <td><?= $r->tipe_ujian; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('dosen/detail_data_soal/' . $r->id_soal) ?>" class="badge badge-pill badge-warning">Lihat Soal</a>
                                </div>
                            </td>
                        </tr>
                    <?php
                }
                ?>
                </a>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->