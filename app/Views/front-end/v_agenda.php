 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-outline card-success">
     <div class="card-header">
       <h3 class="card-title">Data <?= $judul ?> Bulan <?= date('M Y') ?></h3>

       <div class="card-tools">
         <button type="button" class="btn btn-tool"><i class="fas fa-mosque"></i>
         </button>
       </div>
       <!-- /.card-tools -->
     </div>
     <!-- /.card-header -->
     <div class="card-body">
       <div class="row">
         <?php
          foreach ($agenda as $key => $value) { ?>
           <!-- /.col -->
           <div class="col-md-6 col-sm-6 col-12">
             <div class="info-box">
               <span class="info-box-icon"><i class="fas fa-bullhorn fa-2x text-info"></i></span>

               <div class="info-box-content">
                 <span class="info-box-text">Kegiatan</span>
                 <span class="info-box-number"><?= $value['nama_kegiatan'] ?></span>

                 <div class="progress">
                   <div class="progress-bar" style="width: 0%"></div>
                 </div>
                 <span class="progress-description">
                   <i class="fas fa-calendar-alt text-info"></i> <?= $value['tanggal'] ?>
                   <i class="fas fa-clock text-info"></i> <?= $value['jam'] ?>
                 </span>
               </div>
               <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
           </div>
         <?php } ?>
       </div>
     </div>
     <!-- /.card-body -->
   </div>
   <!-- /.card -->
 </div>