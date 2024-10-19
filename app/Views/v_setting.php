 <div class="col-md-12">
   <div class="card card-success">
     <div class="card-header">
       <h3 class="card-title"><?= $menu ?></h3>
       <div class="card-tools">
         <button type="button" class="btn btn-tool"><i class="fas fa-mosque"></i>
         </button>
       </div>
     </div>
     <div class="card-body">
       <?php
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-info">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
        echo form_open('Admin/UpdateSetting') ?>
       <div class="form-group">
         <label>Nama Masjid</label>
         <input name="nama_masjid" value="<?= $setting['nama_masjid'] ?>" class="form-control">
       </div>
       <div class="form-group">
         <label>Kab/Kota</label>
         <select name="id_kota" class="form-control select2">
           <?php if (!empty($kota) && is_array($kota)) { ?>
             <?php foreach ($kota['data'] as $kotaItem) { // Pastikan untuk mengakses elemen yang benar 
              ?>
               <option value="<?= $kotaItem['id'] ?>" <?= $kotaItem['id'] == $setting['id_kota'] ? 'selected' : '' ?>><?= $kotaItem['lokasi'] ?></option>
             <?php } ?>
           <?php } else { ?>
             <option value="">Data kota tidak tersedia</option>
           <?php } ?>
         </select>
       </div>

       <div class="form-group">
         <label>Alamat</label>
         <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
       </div>

       <button class="btn btn-info">Simpan</button>
       <?php echo form_close() ?>
     </div>
   </div>
 </div>

 <script>
   $(function() {
     //Initialize Select2 Elements
     $('.select2').select2()
   });
 </script>