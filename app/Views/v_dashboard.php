<?php
if ($kas_m == null) {
  $pemasukan_m[] = 0;
  $pengeluaran_m[] = 0;
} else {
  foreach ($kas_m as $key => $value) {
    $pemasukan_m[] = $value['kas_masuk'];
    $pengeluaran_m[] = $value['kas_keluar'];
  }
}
$saldokasmasjid = array_sum($pemasukan_m) - array_sum($pengeluaran_m);

if ($kas_s == null) {
  $pemasukan_s[] = 0;
  $pengeluaran_s[] = 0;
} else {
  foreach ($kas_s as $key => $value) {
    $pemasukan_s[] = $value['kas_masuk'];
    $pengeluaran_s[] = $value['kas_keluar'];
  }
}
$saldokassosial = array_sum($pemasukan_s) - array_sum($pengeluaran_s);
?>

<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-primary">
    <div class="inner">
      <h4>Saldo Kas Masjid</h4>
      <h5>Rp. <?= number_format($saldokasmasjid, 0) ?>,-</h5>
    </div>
    <div class="icon">
      <i class="nav-icon fas fa-money-bill-wave"></i>
    </div>
    <a href="<?= base_url('KasMasjid') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<!-- ./col -->
<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h4>Saldo Kas Sosial</h4>
      <h5>Rp. <?= number_format($saldokassosial, 0) ?>,-</h5>
    </div>
    <div class="icon">
      <i class="nav-icon fas fa-hand-holding-heart"></i>
    </div>
    <a href="<?= base_url('KasSosial') ?>" class="small-box-footer">Rincian <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4 col-12">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3>44</h3>

      <p>Kas Keluar</p>
    </div>
    <div class="icon">
      <i class="nav-icon fas fa-file-upload"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>