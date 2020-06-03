<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Detail Mahasiswa</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Data Detail Mahasiswa</h6>
        </div>
        <div class="card-body">
            <table class="table-form" width="100%">
                <h6><strong>Informasi Pribadi</strong></h6>
                <tr>
                    <td width="30%">Nomor Induk Mahasiswa</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['nim']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Nama Lengkap Mahasiswa</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['nama_mhs']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Jenis Kelamin</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['jk']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Tempat Lahir</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['tempat_lahir']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Tanggal Lahir</td>
                    <td width="1%">:</td>
                    <td><?= date('d F Y', strtotime($mhs['tgl_lahir'])); ?></td>
                </tr>
                <tr>
                    <td width="30%">Status</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['status_mhs']; ?></td>
                </tr>
            </table>

            <table class="table-form" width="100%">
                <h6 class="mt-4"><strong>Kontak</strong></h6>
                <tr>
                    <td width="30%">Alamat Lengkap</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['alamat_mhs']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Kota</td>
                    <td width="1%">:</td>
                    <td>Kota</td>
                </tr>
                <tr>
                    <td width="30%">Provinsi</td>
                    <td width="1%">:</td>
                    <td>Provinsi</td>
                </tr>
                <tr>
                    <td width="30%">Negara</td>
                    <td width="1%">:</td>
                    <td>Negara</td>
                </tr>
                <tr>
                    <td width="30%">No. Telepon</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['telp_mhs']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Email</td>
                    <td width="1%">:</td>
                    <td><?= $mhs['email_mhs']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <a href="<?= base_url('baak/data_mhs'); ?>" class="btn btn-info mb-2" style="margin-top: -15px;"> <i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Container fluid  -->