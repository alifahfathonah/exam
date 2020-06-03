<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Detail Jurusan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light"><?= $jurusan['nama_prodi']; ?> - <?= $jurusan['nama_kelas']; ?>/<?= $jurusan['semester']; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">NIM</th>
                            <th width="30%">Nama Mahasiswa</th>
                            <th width="10%">JK</th>
                            <th width="15%">Tempat Lahir</th>
                            <th width="15%">Tanggal Lahir</th>

                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        foreach ($records as $r) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $r->nim; ?></td>
                                <td><?php echo $r->nama_mhs; ?></td>
                                <td><?php echo $r->jk; ?></td>
                                <td><?php echo $r->tempat_lahir; ?></td>
                                <td><?php echo date('d F Y', strtotime($r->tgl_lahir)); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="<?= base_url('baak/data_jurusan'); ?>" class="btn btn-info" style="margin-top: -15px;"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Container fluid  -->