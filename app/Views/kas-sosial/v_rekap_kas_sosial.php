<div class="col-md-12">
  <?php
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
  <div class="alert alert-primary alert-dismissible">
    <h5><i class="nav-icon fas fa-money-bill-wave"></i> Saldo Kas Sosial</h5>
    Pemasukan : Rp. <?= number_format(array_sum($pemasukan_s), 0) ?>,-
    <br>Pengeluaran : Rp. <?= number_format(array_sum($pengeluaran_s), 0) ?>,-
    <hr>
    <h4>Saldo Akhir : Rp. <?= number_format($saldokassosial, 0) ?>,-</h4>
  </div>
</div>

<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data <?= $menu ?></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool"><i class="fas fa-mosque"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table" id="example1">
        <thead>
          <tr class="text-center">
            <th width="50">No</th>
            <th width="100">Tanggal</th>
            <th>Keterangan</th>
            <th>Kas Masuk</th>
            <th>Kas Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($kas_s as $key => $value) { ?>
            <tr class="<?= $value['status'] == 'Masuk' ? 'text-success' : 'text-danger' ?>">
              <td><?= $no++ ?></td>
              <td><?= $value['tanggal'] ?></td>
              <td><?= $value['ket'] ?></td>
              <td class="text-right">Rp. <?= number_format($value['kas_masuk'], 0) ?>,-</td>
              <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?>,-</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>