<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800">Daftar Ujian</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Daftar Ujian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php echo $this->session->flashdata('message'); ?>
                <input type="hidden" name="nim" value="<?= $detail_mhs['nim']; ?>">
                <input type="hidden" name="id_krs" value="<?= $detail_mhs['id_krs']; ?>">
                <input type="hidden" name="semester" value="<?= $detail_mhs['semester']; ?>">

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col">Jadwal Ujian</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <a>
                            <?php

                            foreach ($daftar_ujian as $r) {
                                ?>
                                <tr>
                                    <td><?= $r->nama_matkul; ?></td>
                                    <td><?= date('d F Y', strtotime($r->tgl_ujian)); ?></td>
                                    <td>
                                        <div class="text-center">
                                            <a href="<?= base_url('mahasiswa/form_token/' . $r->id_ujian . '/' . $r->id_soal) ?>" class="badge badge-pill badge-success">Masuk Ujian</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->