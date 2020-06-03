<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Soal</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Form Input Soal </strong>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('dosen/add_soal'); ?>">
                <input type="hidden" name="old_id" value="<?= $old_id; ?>">
                <div class="form-group row">
                    <label for="kdMatkul" class="col-sm-2 col-form-label"><strong>Mata Kuliah</strong></label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_matkul" id="kdMatkul" class="form-control" value="<?= $data['nama_matkul']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tipeUjian" class="col-sm-2 col-form-label"><strong>Tipe Ujian</strong></label>
                    <div class="col-sm-10">
                        <input type="text" name="tipe_ujian" id="tipeUjian" class="form-control" value="<?= $data['tipe_ujian']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="soal" class="col-sm-2 col-form-label"><strong>Soal</strong></label>
                    <div class="col-sm-10">
                        <select id="soal" class="form-control">
                            <option>+ Tambah Soal</option>
                            <?php
                            foreach ($soal->result() as $s) {
                                echo "<option value='$s->id_detail_soal'>$s->soal</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rincianSoal" class="col-sm-2 col-form-label"><strong>Rincian Soal</strong></label>
                    <div class="col-sm-10">
                        <textarea name="soal" class="form-control" rows="10" placeholder="Inputkan soal" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenisSoal" class="col-sm-2 col-form-label"><strong>Jenis Soal</strong></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenisSoal" name="jenis_soal" required>
                            <option value="">Pilih Jenis Soal</option>
                            <option value="Pilihan Ganda">Pilihan Ganda</option>
                            <option value="Essay">Essay</option>
                        </select>
                        <?php echo form_error('jenis_soal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="nilaiSoal" class="col-sm-2 col-form-label"><strong>Nilai Soal</strong></label>
                    <div class="col-sm-10">
                        <input type="text" id="nilaiSoal" name="nilai_soal" class="form-control" placeholder="Nilai Setiap Soal">
                        <?php echo form_error('nilai_soal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div> -->
                <a href="<?= base_url('dosen/detail_soal/' . $old_id); ?>" class="btn btn-info"> <i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-dark">Tambah Soal <i class="fas fa-fw fa-plus"></i></button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- <script>
    tinymce.init({
        selector: 'textarea',
        height: 350,
        resize: false,
        plugins: [
            "a11ychecker advcode advlist anchor autolink codesample colorpicker fullscreen help image imagetools tinydrive",
            " lists link media noneditable powerpaste preview",
            " searchreplace table template textcolor tinymcespellchecker visualblocks wordcount mentions"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image tinydrive",
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ],
        spellchecker_dialog: true,
        spellchecker_whitelist: ['Ephox', 'Moxiecode'],
        tinydrive_demo_files_url: '/docs/demo/tiny-drive-demo/demo_files.json',
        tinydrive_token_provider: function(success, failure) {
            success({
                token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo'
            });
        }
    });
</script> -->