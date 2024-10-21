 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-info">
     <div class="card-header">
       <h3 class="card-title">Data <?= $judul ?></h3>
       <div class="card-tools">
         <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Kelompok
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
                 <div class="card-tools">
                   <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-tambah-anggota"><i class="fas fa-plus"></i> Tambah Anggota
                   </button>
                 </div>

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
                    $anggota = $db->table('anggota_kelompok')
                      ->where('id_kelompok', $value['id_kelompok'])
                      ->get()->getResultArray();
                    $no = 1;

                    foreach ($anggota as $key => $anggota) {
                      $biaya = $db->table('anggota_kelompok')
                        ->where('id_kelompok', $anggota['id_kelompok'])
                        ->select('anggota_kelompok.id_kelompok')
                        ->groupBy('anggota_kelompok.id_kelompok')
                        ->selectSum('anggota_kelompok.biaya')
                        ->get()->getRowArray();


                    ?>
                     <tr>
                       <td><?= $no++ ?></td>
                       <td><?= $anggota['nama_peserta'] ?></td>
                       <td>Rp. <?= number_format($anggota['biaya'], 0)
                                ?></td>
                     </tr>
                   <?php } ?>
                   <tr class="text-primary">
                     <td></td>
                     <td><b>Total Biaya :</b></td>
                     <td><b>Rp. <?= $anggota == null ? '0' : number_format($biaya['biaya'], 0) ?></b></td>
                   </tr>
                 </table>

               </div>
               <!-- /.card-body -->
               <div class="card-header">

               </div>
               <div class="card-footer">
                 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-kelompok<?= $value['id_kelompok'] ?>"><i class="fas fa-trash"></i> Delete Kelompok
                 </button>
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

 <!-- modal-tambah Kelompok -->
 <div class="modal fade" id="modal-tambah">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Tambah Kelompok</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <?php echo form_open('PesertaQurban/InsertKelompok') ?>
         <input value="<?= $tahun['id_tahun'] ?>" name="id_tahun" hidden>
         <div class="form-group">
           <label>Nama Kelompok</label>
           <input class="form-control" name="nama_kelompok" required>
         </div>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-info">Simpan</button>
       </div>
       <?php echo form_close() ?>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal-tambah Kelompok -->

 <?php foreach ($kelompok as $key => $value) { ?>
   <!-- modal-delete Kelompok -->
   <div class="modal fade" id="delete-kelompok<?= $value['id_kelompok'] ?>">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Delete <?= $judul ?></h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           Apakah Anda Ingin Menghapus Data ? <br>
           <b> <?= $value['nama_kelompok'] ?></b>
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <a href="<?= base_url('PesertaQurban/DeleteKelompok/' . $tahun['id_tahun'] . '/' . $value['id_kelompok']) ?>" class="btn btn-danger">Delete</a>
         </div>

       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal-delete Kelompok -->
 <?php } ?>