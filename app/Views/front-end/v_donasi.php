 <!-- /.col -->
 <div class="col-md-4">
   <div class="card card-info">
     <div class="card-header">
       <h3 class="card-title">Kirim Donasi Ke Rekening Dibawah Ini</h3>

       <div class="card-tools">
         <button type="button" class="btn btn-tool"><i class="fas fa-mosque"></i>
         </button>
       </div>
       <!-- /.card-tools -->
     </div>
     <!-- /.card-header -->
     <div class="card-body">
       <table class="table">
         <tbody>
           <?php
            foreach ($rek as $key => $value) { ?>
             <tr>
               <td>
                 <i class="fas fa-money-check fa-2x text-success"></i>
               </td>
               <td>
                 <h5><b><?= $value['nama_bank'] ?></b></h5>
                 <h6><?= $value['no_rek'] ?><br></h6>
                 <h6>a.n : <?= $value['atas_nama'] ?></h6>
               </td>

             </tr>
           <?php } ?>
         </tbody>
       </table>
     </div>
     <!-- /.card-body -->
   </div>
   <!-- /.card -->
 </div>


 <!-- /.col -->
 <div class="col-md-8">
   <div class="card card-info">
     <div class="card-header">
       <h3 class="card-title">Konfirmasi Pengiriman Donasi</h3>

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
       <?php echo form_open_multipart('Home/KirimDonasi') ?>
       <div class="row">
         <div class="col-6">
           <div class="form-group">
             <label>Rek Tujuan</label>
             <select name="id_rekening" class="form-control">
               <option value="">-Pilih Rekening Tujuan-</option>
               <?php foreach ($rek as $key => $value) { ?>
                 <option value="<?= $value['id_rekening'] ?>"><?= $value['nama_bank'] ?> | <?= $value['no_rek'] ?></option>
               <?php } ?>
             </select>
           </div>
         </div>
         <div class="col-6">
           <div class="form-group">
             <label>Jenis Donasi Untuk : </label>
             <select name="jenis_donasi" class="form-control">
               <option value="">-Pilih Jenis Donasi-</option>
               <option value="Masjid">Masjid</option>
               <option value="Sosial">Sosial</option>
             </select>
           </div>
         </div>
       </div>
       <div class="form-group">
         <label>Nama Bank Pengirim</label>
         <input type="text" name="nama_bank" class="form-control" required>
       </div>
       <div class="form-group">
         <label>No Rekening Pengirim</label>
         <input type="text" name="no_rek" class="form-control" required>
       </div>
       <div class="form-group">
         <label>Nama Pengirim</label>
         <input type="text" name="nama_pengirim" class="form-control" required>
       </div>
       <div class="form-group">
         <label>Jumlah Donasi (Rp.)</label>
         <input type="number" name="jumlah" class="form-control" required>
       </div>
       <div class="form-group">
         <label>Bukti Transfer</label>
         <input type="file" name="bukti" class="form-control" accept="image/*" required>
       </div>
     </div>
     <div class="modal-footer justify-content-between">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Kirim</button>
     </div>
     <?php echo form_close() ?>
   </div>
   <!-- /.card-body -->
 </div>
 <!-- /.card -->
 </div>