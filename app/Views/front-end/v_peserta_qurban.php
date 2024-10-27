 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-info">
     <div class="card-header">
       <h3 class="card-title">Data <?= $judul ?></h3>
       <div class="card-tools">
         <button type="button" class="btn btn-tool"><i class="fas fa-mosque"></i>
         </button>
       </div>

       <!-- /.card-tools -->
     </div>
     <!-- /.card-header -->
     <div class="card-body">
       <?php if (session()->getFlashdata('pesan')) : ?>
         <div class="alert alert-info" role="alert">
           <?= session()->getFlashdata('pesan') ?>
         </div>
       <?php endif; ?>
       <div class="row">
         <?php foreach ($kelompok as $key => $value) { ?>
           <!-- /.col -->
           <div class="col-md-6">
             <div class="card card-outline card-info">
               <div class="card-header">
                 <h3 class="card-title"><?= $value['nama_kelompok'] ?></h3>
                 <!-- /.card-tools -->
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                 <table class="table table-borderless">
                   <tr>
                     <th>No</th>
                     <th>Nama Peserta</th>
                     <th>Biaya</th>
                   </tr>
                   <?php
                    $db = \Config\Database::connect();
                    $peserta = $db->table('peserta_kelompok')
                      ->where('id_kelompok', $value['id_kelompok'])
                      ->get()->getResultArray();
                    $no = 1;

                    foreach ($peserta as $key => $peserta) {
                      $biaya = $db->table('peserta_kelompok')
                        ->where('id_kelompok', $peserta['id_kelompok'])
                        ->select('peserta_kelompok.id_kelompok')
                        ->groupBy('peserta_kelompok.id_kelompok')
                        ->selectSum('peserta_kelompok.biaya')
                        ->get()->getRowArray();
                    ?>
                     <tr>
                       <td><?= $no++ ?></td>
                       <td><?= $peserta['nama_peserta'] ?></td>
                       <td>Rp. <?= number_format($peserta['biaya'], 0)
                                ?></td>
                     </tr>
                   <?php } ?>
                   <tr class="text-primary">
                     <td></td>
                     <td><b>Total Biaya :</b></td>
                     <td><b>Rp. <?= $peserta == null ? '0' : number_format($biaya['biaya'], 0) ?></b></td>
                   </tr>
                 </table>

               </div>

             </div>
             <!-- /.card -->
           </div>
         <?php } ?>
       </div>
     </div>
     <!-- /.card-body -->
   </div>
   <!-- /.card -->
 </div>