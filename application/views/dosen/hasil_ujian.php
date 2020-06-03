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

                <button class="btn btn-success mb-2" style="align:right;">Tampilkan</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="7%">No</th>
                            <th>Nama Mahasiswa</th>
                            <th width="30%">Jurusan</th>
                            <th width="13%">Options</th>
                        </tr>
                    </thead>
                </table>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
</script>