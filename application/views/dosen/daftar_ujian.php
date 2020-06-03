<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Ujian</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Daftar Ujian </strong>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th>Mata Kuliah</th>
                        <th width="15%">Tanggal Ujian</th>
                        <th width="15%">Waktu Mulai</th>
                        <th width="15%">Waktu Selesai</th>
                        <th width="12%">Token</th>
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
                            <td><?= $r->nama_matkul; ?></td>
                            <td><?= date('d F Y', strtotime($r->tgl_ujian)); ?></td>
                            <td><?= $r->waktu_mulai_ujian; ?></td>
                            <td><?= $r->waktu_selesai_ujian; ?></td>
                            <td><?= $r->token_ujian; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('dosen/edit_ujian/' . $r->id_ujian . '/' . $r->id_soal) ?>" class="badge badge-pill badge-success">Edit</a> |
                                    <a href="<?= base_url('dosen/delete_ujian/' . $r->id_ujian) ?>" class="badge badge-pill badge-danger">Hapus</a>
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