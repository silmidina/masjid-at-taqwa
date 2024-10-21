<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MASJID AT-TAQWA | <?= $menu ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">



  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE/dist/js/adminlte.min.js') ?>"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>
  <style>
    .logo-brand {
      opacity: 1;
      width: 7rem;
      margin: 0 10px 0 10px;
      margin-bottom: 10px;
    }

    .brand-link {
      text-align: center;
    }

    .divider-line {
      width: 100%;
      height: 1px;
      background-color: green;
      border: none;
      margin-top: 5px;
    }

    .user-name {
      color: green;
      font-weight: bold;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block user-name"><?= session()->get('nama_user') ?></a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-info elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('admin') ?>" class="brand-link d-flex flex-column justify-content-center align-items-center" style="border: none;">
        <img src="<?= base_url('assets/logo1.png') ?>" class="logo-brand elevation-5">
      </a>


      <!-- Sidebar -->
      <div class="sidebar">
        <hr class="divider-line">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Agenda') ?>" class="nav-link <?= $menu == 'agenda' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Agenda</p>
              </a>
            </li>

            <hr class="divider-line">
            <li class="nav-item <?= $menu == 'kas-masjid' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'kas-masjid' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>
                  Uang Kas Masjid
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('KasMasjid/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-download nav-icon text-success"></i>
                    <p>Kas Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('KasMasjid/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-upload nav-icon text-danger"></i>
                    <p>Kas Keluar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('KasMasjid') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-alt nav-icon text-primary"></i>
                    <p>Rekap Kas</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item <?= $menu == 'kas-sosial' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'kas-sosial' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-hand-holding-heart"></i>
                <p>
                  Uang Kas Sosial
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('KasSosial/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-download nav-icon text-success"></i>
                    <p>Kas Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('KasSosial/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-upload nav-icon text-danger"></i>
                    <p>Kas Keluar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('KasSosial') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-alt nav-icon text-primary"></i>
                    <p>Rekap Kas</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item <?= $menu == 'uang-kas' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'uang-kas' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Laporan Kas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link <?= $menu == 'kas-masuk' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-alt nav-icon text-warning"></i>
                    <p>Laporan Kas Masjid</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-alt nav-icon text-warning"></i>
                    <p>Laporan Kas Sosial</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item <?= $menu == 'qurban' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'qurban' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-handshake"></i>
                <p>
                  Qurban
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Tahun') ?>" class="nav-link <?= $menu == 'qurban' ? 'active' : '' ?>">
                    <i class="nav-icon far fa-circle nav-icon text-success"></i>
                    <p>Tahun Qurban</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle nav-icon text-danger"></i>
                    <p>Peserta Qurban</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>
                  Donasi
                </p>
              </a>
            </li>
            <hr class="divider-line">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('Admin/Setting') ?>" class="nav-link <?= $menu == 'setting' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
                </p>
              </a>
            </li>
            <!-- Control Sidebar -->
            <hr class="divider-line">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Login/LogOut') ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> Logout
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><b><?= $judul ?></b></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php
            if ($page) {
              echo view($page);
            }
            ?>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; <span id="current-year"></span> <a href="https://adminlte.io">MASJID AT-TAQWA</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <script>
    // Script to automatically update the year
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "paging": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
      });
    });
  </script>


</body>

</html>