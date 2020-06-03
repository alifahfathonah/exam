<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jurusan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Data Jurusan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="7%">No</th>
                            <th width="25%">Program Studi</th>
                            <th width="8%">Kelas</th>
                            <th width="8%">Semester</th>
                            <th width="10%">Th. Akademik</th>
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
                            <td><?php echo $r->nama_prodi; ?></td>
                            <td><?php echo $r->nama_kelas; ?></td>
                            <td><?php echo $r->semester; ?></td>
                            <td><?php echo $r->th_akademik; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('baak/detail_jurusan/' . $r->id_jurusan) ?>" class="badge badge-pill badge-warning">Detail Jurusan</a>
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
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Container fluid  -->