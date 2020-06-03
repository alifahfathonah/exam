<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Jawaban</h1>
    </div>

    <!-- Data Ajar -->
    <div class="card">
        <div class="card-header bg-primary">
            <strong class="text-light"> Form Edit Jawaban </strong>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('dosen/edit_jawaban'); ?>">
                <input type="hidden" name="old_id" value="<?= $old_id; ?>">
                <input type="hidden" name="old_id_d" value="<?= $old_id_d; ?>">
                <input type="hidden" name="old_id_j" value="<?= $old_id_j; ?>">
                <div class="form-group row">
                    <label for="mataKuliah" class="col-sm-2 col-form-label"><strong>Mata Kuliah</strong></label>
                    <div class="col-sm-10">
                        <input type="text" name="kd_matkul" id="mataKuliah" class="form-control" value="<?= $data['nama_matkul']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="soal" class="col-sm-2 col-form-label"><strong>Soal</strong></label>
                    <div class="col-sm-10">
                        <select id="soal" class="form-control">
                            <option><?= $data['soal']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rincianJawaban" class="col-sm-2 col-form-label"><strong> Rincian Jawaban </strong></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="jawaban" id="rincianJawaban" rows="10"><?= $jawaban['jawaban']; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilaiJawaban" class="col-sm-2 col-form-label"><strong>Nilai Jawaban</strong></label>
                    <div class="col-sm-10">
                        <select name="nilai_jawaban" id="nilaiJawaban" class="form-control">
                            <option value="<?= $jawaban['nilai_jawaban']; ?>"><?= $jawaban['nilai_jawaban']; ?></option>
                            <option value="">Pilih Nilai Jawaban</option>
                            <option value="Benar">Benar</option>
                            <option value="Salah">Salah</option>
                        </select>
                    </div>
                </div>
                <a href="<?= base_url('dosen/detail_jawaban/' . $old_id . '/' . $old_id_d); ?>" class="btn btn-info"><i class="fas fa-fw fa-arrow-left"></i> Kembali </a>
                <button type="submit" class="btn btn-success">Edit Jawaban <i class="fa fa-edit"></i></button>
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