<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Soal</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Data Detail Soal </strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="mb-2">
                    <a href="<?= base_url('dosen/add_soal/' . $old_id); ?>" class="btn btn-info">Tambah Soal <i class="fas fa-fw fa-plus-circle"></i> </a>
                </div>
                <input type="hidden" name="old_id" value="<?= $old_id; ?>">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="7%">No</th>
                            <th width="40%">Soal</th>
                            <th width="10%">Jenis Soal</th>
                            <th width="13%">Options</th>
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
                            <td><?= $r->jenis_soal; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('dosen/edit_soal/' . $r->id_soal . '/' . $r->id_detail_soal) ?>" class="badge badge-pill badge-success">Edit Soal</a> |
                                    <a href="<?= base_url('dosen/delete_soal/' . $r->id_soal . '/' . $r->id_detail_soal) ?>" class="badge badge-pill badge-danger">Hapus Soal</a>
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
    <a href="<?= base_url('dosen/soal'); ?>" class="btn btn-dark mt-2"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->