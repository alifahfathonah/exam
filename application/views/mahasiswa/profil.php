<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 mt-3 text-gray-800">Profil Mahasiswa</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <?php echo $this->session->flashdata('message'); ?>
                    <img src="<?= base_url('assets/img/profile/mahasiswa.jpg'); ?>" alt="Foto Profil" class="img-thumbnail">
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-sm-3 col-form-label"><strong>NIM</strong></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" disabled value="<?= $mhs['nim']; ?>">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-sm-3 col-form-label"><strong>Nama</strong></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" disabled value="<?= $mhs['nama_mhs']; ?>">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-sm-3 col-form-label"><strong>Program Studi</strong></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" disabled value="<?= $mhs['nama_prodi']; ?>">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-sm-3 col-form-label"><strong>Tahun Masuk</strong></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" disabled value="<?= $mhs['th_masuk']; ?>">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-sm-3 col-form-label"><strong>Username</strong></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" disabled value="<?= $akun['username']; ?>">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <label for="" class="col-sm-3 col-form-label"><strong>Password</strong></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="<?= $akun['password']; ?>">
                        </div>
                    </div>
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#addDataModal">Ganti Password <i class="fas fa-fw fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="addDataModalLabel"> <strong> Form Ganti Password</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('mahasiswa/updateAkun'); ?>">
                <input type="hidden" name="id" value="<?= $akun['id']; ?>">
                <div class="form-group ml-3 mr-3 mt-3">
                    <label for="password"><strong>Password</strong></label>
                    <input type="text" name="password" id="password" class="form-control" value="<?= $akun['password']; ?>">
                </div>
                <button type="submit" class="btn btn-dark ml-3 mr-3 m2-3 mb-3">Simpan<i class="fas fa-fw fa-plus-circle"></i></button>
            </form>
        </div>
    </div>
</div>