<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data KRS</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Data Kartu Rencana Studi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">NIM</th>
                            <th width="30%">Nama Mahasiswa</th>
                            <th width="20%">Program Studi</th>
                            <th width="8%">Semester</th>
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
                                <td><?php echo $r->nim; ?></td>
                                <td><?php echo $r->nama_mhs; ?></td>
                                <td><?php echo $r->nama_prodi; ?></td>
                                <td><?php echo $r->semester; ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="" class="badge badge-pill badge-success">Edit</a> |
                                        <a href="<?= base_url('mahasiswa/detail_krs/' . $r->id_krs . '/' . $r->nim); ?>" class="badge badge-pill badge-warning">Detail</a>
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