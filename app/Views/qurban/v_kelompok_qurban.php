 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-info">
     <div class="card-header">
       <h3 class="card-title">Data <?= $menu ?></h3>
       <div class="card-tools">
         <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Kelompok
         </button>
       </div>

       <!-- /.card-tools -->
     </div>
     <!-- /.card-header -->
     <div class="card-body">
       <div class="row">
         <?php foreach ($kelompok as $key => $value) { ?>


           <!-- /.col -->
           <div class="col-md-6">
             <div class="card card-outline card-info">
               <div class="card-header">
                 <h3 class="card-title"><?= $value['nama_kelompok'] ?></h3>
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah-anggota"><i class="fas fa-plus"></i> Tambah Anggota
                   </button>
                 </div>

                 <!-- /.card-tools -->
               </div>
               <!-- /.card-header -->
               <div class="card-body">

               </div>
               <!-- /.card-body -->
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