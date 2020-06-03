<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/cic.png') ?>">
    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>tinymce/js/tinymce/tinymce.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Examik cic</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading mt-3">
                Dosen
            </div>
            <!-- Nav Item - Dashboard -->
            <?php
            $page = $this->uri->segment('2');
            ?>
            <li class="nav-item <?= ($page == 'index') ? 'active' : '' ?>">
                <a class="nav-link " href="<?= base_url('dosen/index') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= ($page == 'soal') ? 'active' : '' ?> <?= ($page == 'data_matkul') ? 'active' : '' ?> <?= ($page == 'daftar_soal_jawaban') ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Management Soal</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= ($page == 'soal') ? 'active' : '' ?>" href="<?= base_url('dosen/soal'); ?>"><i class="fa fa-list"></i> Kelola Soal</a>
                        <a class="collapse-item <?= ($page == 'data_matkul') ? 'active' : '' ?>" href="<?= base_url('dosen/data_matkul'); ?>"><i class="fa fa-tasks"></i> Kelola Jawaban</a>
                        <a class="collapse-item <?= ($page == 'daftar_soal_jawaban') ? 'active' : '' ?>" href="<?= base_url('dosen/daftar_soal_jawaban'); ?>"><i class="fa fa-file"></i> Daftar Soal & Jawaban</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?= ($page == 'kelola_ujian') ? 'active' : '' ?> <?= ($page == 'daftar_ujian') ? 'active' : '' ?> <?= ($page == 'hasil_ujian') ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Management Ujian</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= ($page == 'kelola_ujian') ? 'active' : '' ?>" href="<?= base_url('dosen/kelola_ujian'); ?>"><i class="fas fa-fw fa-plus"></i> Tambah Ujian</a>
                        <a class="collapse-item <?= ($page == 'daftar_ujian') ? 'active' : '' ?>" href="<?= base_url('dosen/daftar_ujian'); ?>"><i class="fas fa-fw fa-file"></i> Daftar Ujian</a>
                        <a class="collapse-item <?= ($page == 'hasil_ujian') ? 'active' : '' ?>" href="<?= base_url('dosen/hasil_ujian'); ?>"><i class="fas fa-fw fa-list-alt"></i> Hasil Ujian</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Title -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <label for="">
                                <h2 class="text-primary"><b>STMIK CIC CIREBON</b></h2>
                            </label>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <!-- <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div> -->
                                    </div>
                                    <!-- <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div> -->
                                </a>
                                <!-- <a class="dropdown-item text-center small text-gray-500" href="">Show All Notification</a> -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_user']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="<?= base_url('dosen/profil'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?= base_url('login/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->