<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?> Bulan <?= date('M Y') ?></h3>
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
          foreach ($kas as $key => $value) { ?>
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