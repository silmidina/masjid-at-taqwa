<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MASJID AT-TAQWA | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

  <style>
    .logo-brand {
      opacity: 1;
      width: 10rem;
      margin: 0 10px 0 10px;
      margin-bottom: 10px;
    }

    .brand-link {
      text-align: center;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <img src="<?= base_url('assets/logo1.png') ?>" class="logo-brand elevation-5">
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('errors')) : ?>
          <div class="alert alert-danger" role="alert">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
              <div><i class="fas fa-exclamation-triangle"></i> <?= $error ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('gagal')) : ?>
          <div class="alert alert-danger" role="alert">
            <div><i class="fas fa-exclamation-triangle"></i> <?= session()->getFlashdata('gagal') ?></div>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-warning" role="alert">
            <?= session()->getFlashdata('pesan') ?>
          </div>
        <?php endif; ?>


        <?= form_open('Login/CekLogin'); ?>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email" value="<?= old('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="text-danger">
          <?= ($validation->hasError('email')) ? '<i class="fas fa-exclamation-circle"></i> ' . $validation->getError('email') : ''; ?>
        </p>

        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" value="<?= old('password'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="text-danger">
          <?= ($validation->hasError('password')) ? '<i class="fas fa-exclamation-circle"></i> ' . $validation->getError('password') : ''; ?>
        </p>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">LOGIN</button>
          </div>
          <!-- /.col -->
        </div>
        <?= form_close(); ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000)
  </script>
</body>

</html>