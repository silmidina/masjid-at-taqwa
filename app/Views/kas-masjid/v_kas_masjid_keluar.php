<div class="col-md-12">
  <?php
  if ($kas == null) {
    $pengeluaran[] = 0;
  } else {
    foreach ($kas as $key => $value) {
      $pengeluaran[] = $value['kas_keluar'];
    }
  }
  ?>
  <div class="alert alert-danger alert-dismissible">

    <h5><i class="nav-icon fas fa-money-bill-wave"></i> Total Pengeluaran Kas Masjid</h5>
    <h4>Rp. <?= number_format(array_sum($pengeluaran), 0) ?></h4>
  </div>
</div>

<div class="col-md-12">
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Data <?= $menu ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah
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
            <th>Jumlah</th>
            <th>Opsi</th>

          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($kas as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['tanggal'] ?></td>
              <td><?= $value['ket'] ?></td>
              <td class="text-right">Rp. <?= number_format($value['kas_keluar'], 0) ?></td>


            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>