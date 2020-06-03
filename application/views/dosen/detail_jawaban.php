<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Jawaban</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Data Detail Jawaban </strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="mb-2">
                    <a href="<?= base_url('dosen/add_jawaban/' . $old_id . '/' . $old_id_d); ?>" class="btn btn-info">Tambah Jawaban <i class="fas fa-fw fa-plus-circle"></i> </a>
                </div>
                <input type="hidden" name="old_id" value="<?= $old_id; ?>">
                <input type="hidden" name="old_id_d" value="<?= $old_id_d; ?>">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Soal</th>
                            <th width="30%">Jawaban</th>
                            <th width="8%">Nilai</th>
                            <th width="11%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        foreach ($records as $r) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?= $r->soal; ?></td>
                                <td><?= $r->jawaban; ?></td>
                                <td><?= $r->nilai_jawaban; ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="<?= base_url('dosen/edit_jawaban/' . $r->id_soal . '/' . $r->id_detail_soal . '/' . $r->id_jawaban) ?>" class="badge badge-pill badge-success">Edit</a> |
                                        <a href="<?= base_url('dosen/delete_jawaban/' . $r->id_soal . '/' . $r->id_detail_soal . '/' . $r->id_jawaban) ?>" class="badge badge-pill badge-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="<?= base_url('dosen/detail_data_soal/' . $old_id); ?>" class="btn btn-dark mt-2"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->