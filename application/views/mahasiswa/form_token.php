<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800">Form Token</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Form Token</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php echo $this->session->flashdata('message'); ?>
                <form action="<?= base_url('mahasiswa/form_token'); ?>" method="post">
                <input type="text" name="id_ujian" value="<?= $ujian['id_ujian']; ?>">
                <input type="text" name="id_soal" value="<?= $ujian['id_soal']; ?>">
                    <input type="text" name="token_ujian" class="form-control">
                    <button type="submit" class="btn btn-primary mt-3">Mulai Ujian</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->