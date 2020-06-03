<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Data Dosen</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">NID</th>
                            <th width="30%">Nama Dosen</th>
                            <th width="15%">Jenis Kelamin</th>
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
                                <td><?php echo $r->nid; ?></td>
                                <td><?php echo $r->nama_dosen; ?></td>
                                <td><?php echo $r->jk; ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="<?= base_url('baak/detail_dosen/' . $r->nid) ?>" class="badge badge-pill badge-warning">Detail</a> |
                                        <a href="<?= base_url('baak/edit_dosen/' . $r->nid) ?>" class="badge badge-pill badge-success">Edit</a>
                                        <!-- <a href="<?= base_url('baak/delete_dosen/' . $r->nid) ?>" class="badge badge-pill badge-danger">Delete</a> -->
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