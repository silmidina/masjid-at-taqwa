<!-- /.col -->
<div class="col-md-12">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Laporan Kas Sosial</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool"><i class="fas fa-mosque"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <div>Bulan</div>
            <select name="bulan" id="bulan" class="form-control">
              <option value="">-Pilih Bulan-</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <div>Tahun</div>
            <div class="col-10 input-group">
              <select name="tahun" id="tahun" class="form-control">
                <option value="">-Pilih Tahun-</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
                <option value="2031">2031</option>
                <option value="2032">2032</option>
              </select>
              <span class="input-group-append">
                <button class="btn btn-primary" onclick="ViewLaporan()">View</button>
                <button class="btn btn-warning" onclick="PrintLaporan()"><i class="fas fa-print"></i> Print</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12" id="printarea">
        <div class="text-center">
          <h3><b><?= $masjid['nama_masjid'] ?></b></h3>
          <p><?= $masjid['alamat'] ?><br><b>Laporan Kas Masjid</b></p>
        </div>
        <div class="Tabel">
          <!-- Data laporan akan ditampilkan di sini setelah memilih bulan dan tahun -->
        </div>
      </div>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<script>
  function ViewLaporan() {
    let bulan = $('#bulan').val();
    let tahun = $('#tahun').val();
    if (bulan === '') {
      alert('Bulan Belum Dipilih!');
    } else if (tahun === '') {
      alert('Tahun Belum Dipilih!');
    } else {
      $.ajax({
        type: "POST",
        url: "<?= base_url('KasSosial/ViewLaporan') ?>",
        data: {
          bulan: bulan,
          tahun: tahun
        },
        dataType: "JSON",
        success: function(response) {
          if (response.data) {
            $('.Tabel').html(response.data);
          }
        }
      });
    }
  }

  function PrintLaporan() {
    var printContent = document.getElementById('printarea').innerHTML;
    var newWin = window.open('', '', 'width=800, height=600');
    newWin.document.write('<html><head><title>Cetak Laporan</title>');
    newWin.document.write('</head><body>');
    newWin.document.write(printContent);
    newWin.document.write('</body></html>');
    newWin.document.close();
    newWin.print();

    // Tutup jendela setelah jeda waktu agar proses cetak selesai
    newWin.onafterprint = function() {
      newWin.close();
    };
  }
</script>