<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Detail Dosen</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-light">Data Detail Dosen</h6>
        </div>
        <div class="card-body">
            <table class="table-form" width="100%">
                <h6><strong>Informasi Pribadi</strong></h6>
                <tr>
                    <td width="30%">Nomor Induk Dosen</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['nid']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Nama Lengkap Dosen</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['nama_dosen']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Jenis Kelamin</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['jk']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Tempat Lahir</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['tempat_lahir']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Tanggal Lahir</td>
                    <td width="1%">:</td>
                    <td><?= date('d F Y', strtotime($dosen['tgl_lahir'])); ?></td>
                </tr>
                <tr>
                    <td width="30%">Status</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['status_dosen']; ?></td>
                </tr>
            </table>

            <table class="table-form" width="100%">
                <h6 class="mt-4"><strong>Kontak</strong></h6>
                <tr>
                    <td width="30%">Alamat Lengkap</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['alamat_dosen']; ?></td>
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
                    <td><?= $dosen['telp_dosen']; ?></td>
                </tr>
                <tr>
                    <td width="30%">Email</td>
                    <td width="1%">:</td>
                    <td><?= $dosen['email_dosen']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <a href="<?= base_url('baak/data_dosen'); ?>" class="btn btn-info mb-2" style="margin-top: -15px;"> <i class="fas fa-fw fa-arrow-left"></i> Kembali</a>

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Container fluid  -->