<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Soal</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Data Pemilihan Mata Kuliah </strong>
        </div>
        <div class="card-body">
            <div class="mb-2">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#addDataModal">Tambah <i class="fas fa-fw fa-plus"></i></a>
            </div>
            <div class="table-responsive">
                <?php echo $this->session->flashdata('message'); ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="7%">No</th>
                            <th width="30%">Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th width="15%">Tipe Ujian</th>
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
                            <td><?= $r->nama_dosen; ?></td>
                            <td><?= $r->nama_matkul; ?></td>
                            <td><?= $r->tipe_ujian; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('dosen/detail_soal/' . $r->id_soal) ?>" class="badge badge-pill badge-warning">Tambah Soal</a>
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


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="addDataModalLabel"> <strong> Form Pilih Mata Kuliah </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('dosen/add_matkul'); ?>">
                <div class="form-group ml-3 mr-3 mt-3">
                    <label for="namaDosen"><strong> Nama Dosen </strong></label>
                    <input type="text" class="form-control" id="namaDosen" value="<?= $dosen['nama_dosen']; ?>" disabled>
                </div>
                <div class="form-group ml-3 mr-3 mt-3">
                    <label for="kdMatkul"><strong>Mata Kuliah</strong></label>
                    <select class="form-control" id="mataKuliah" name="kd_matkul" required>
                        <option value="">Pilih Mata Kuliah yang Diajar</option>
                        <?php
                        foreach ($ajar->result() as $a) {
                            echo "<option value='$a->kd_matkul'>$a->nama_matkul</option>";
                        }
                        ?>
                    </select>
                    <?php echo form_error('kd_matkul', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group ml-3 mr-3 mt-3">
                    <label for="tipeUjian"><strong>Tipe Ujian</strong></label>
                    <select class="form-control" id="tipeUjian" name="tipe_ujian" required>
                        <option value="">Pilih Tipe Ujian</option>
                        <option value="UTS">Ujian Tengah Semester</option>
                        <option value="UAS">Ujian Akhir Semester</option>
                    </select>
                    <?php echo form_error('tipe_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-dark ml-3 mr-3 m2-3 mb-3">Simpan <i class="fas fa-fw fa-plus-circle"></i></button>
            </form>
        </div>
    </div>
</div>