<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Ujian</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Hasil Ujian </strong>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('dosen/proses_get_hasil'); ?>">
                <div class="form-group row">
                    <label for="id_ujian" class="col-sm-2 col-form-label"><strong>Soal Ujian</strong></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_ujian" name="id_ujian">
                            <option value="<?= $get_ujian['id_ujian']; ?>"><?= $get_ujian['tipe_ujian']; ?> - <?= $get_ujian['nama_matkul']; ?> - <?= $get_ujian['tahun']; ?></option>
                            <option value="">Pilih Soal Ujian</option>
                            <?php
                            foreach ($ujian as $u) {
                                echo "<option value='$u->id_ujian'>$u->tipe_ujian - $u->nama_matkul - $u->tahun</option>";
                            }
                            ?>
                        </select>
                        <?php echo form_error('id_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_ujian" class="col-sm-2 col-form-label"><strong>Tanggal Ujian</strong></label>
                    <div class="col-sm-10">
                        <input type="date" name="tgl_ujian" class="form-control" id="tgl_ujian" value="<?= $get_ujian['tgl_ujian']; ?>">
                        <?php echo form_error('tgl_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Waktu Ujian</strong></label>
                    <div class="col-sm-5">
                        <input type="time" name="waktu_mulai_ujian" class="form-control" id="waktuMulai" value="<?= $get_ujian['waktu_mulai_ujian']; ?>">
                        <?php echo form_error('waktu_mulai_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-5">
                        <input type="time" name="waktu_selesai_ujian" class="form-control" id="waktuSelesai" value="<?= $get_ujian['waktu_selesai_ujian']; ?>">
                        <?php echo form_error('waktu_selesai_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button class="btn btn-success mb-2">Tampilkan</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="7%">No</th>
                            <th>Nama Mahasiswa</th>
                            <th width="30%">Jurusan</th>
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
                            <td><?= $r->nama_mhs; ?></td>
                            <td><?= $r->nama_prodi; ?> <?= $r->nama_kelas; ?>/<?= $r->semester; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?= base_url('dosen/detail_hasil/' . $r->id_hasil_ujian . '/' . $r->nim) ?>" class="badge badge-pill badge-warning">Lihat Hasil</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function view_ujian() {
        var id_ujian = $("#id_ujian").val();
        $.ajax({
            url: '<?= base_url('dosen/get_ujian'); ?>',
            data: "id_ujian=" + id_ujian,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#tgl_ujian').val(obj.tgl_ujian);
        });
    }
</script> -->