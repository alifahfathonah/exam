<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Detail KRS</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Data Detail Kartu Rencana Studi</h6>
        </div>
        <div class="card-body">
            <form>
                <form>
                    <div class="form-row mb-4">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/kirito.jpg'); ?>" class="rounded float-left ml-5" alt="Foto Profil Mahasiswa" width="180" height="180">
                        </div>
                        <div class="col">
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="NIM" class="col col-form-label"><strong>NIM </strong></label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control-plaintext" readonly id="NIM" value="<?= $mhs['nim']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="namaMhs" class="col col-form-label"><strong>Nama Mahasiswa </strong></label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control-plaintext" readonly id="namaMhs" value="<?= $mhs['nama_mhs']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="prodi" class="col col-form-label"><strong>Program Studi </strong></label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control-plaintext" readonly id="prodi" value="<?= $mhs['nama_prodi']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="semester" class="col col-form-label"><strong>Semester </strong></label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control-plaintext" readonly id="semester" value="<?= $mhs['semester']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matkul1"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul1" value="<?= $matkul['matkul1']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matkul2"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul2" value="<?= $matkul['matkul2']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matkul3"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul3" value="<?= $matkul['matkul3']; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matkul1"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul1" value="<?= $matkul['matkul4']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matkul2"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul2" value="<?= $matkul['matkul5']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matkul3"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul3" value="<?= $matkul['matkul6']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matkul1"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul1" value="<?= $matkul['matkul7']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matkul2"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul2" value="<?= $matkul['matkul8']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="matkul3"><strong>Mata Kuliah : </strong></label>
                        <input type="text" class="form-control-plaintext" readonly id="matkul3" value="<?= $matkul['matkul9']; ?>">
                    </div>
                </div>
            </form>
            <a href="<?= base_url('mahasiswa/krs'); ?>" class="btn btn-dark"> <i class="fas fa-fw fa-arrow-left"></i> Kembali </a>
        </div>
    </div>
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Container fluid  -->