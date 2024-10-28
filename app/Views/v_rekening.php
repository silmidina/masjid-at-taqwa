 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-info">
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
       <?php if (session()->getFlashdata('pesan')) : ?>
         <div class="alert alert-info" role="alert">
           <?= session()->getFlashdata('pesan') ?>
         </div>
       <?php endif; ?>
       <table class="table" id="example1">
         <thead>
           <tr>
             <th width="50">No</th>
             <th width="50"></th>
             <th>Rekening</th>
             <th>Opsi</th>
           </tr>
         </thead>
         <tbody>
           <?php $no = 1;
            foreach ($rek as $key => $value) { ?>
             <tr>
               <td><?= $no++ ?></td>
               <td>
                 <i class="fas fa-money-check fa-3x text-success"></i>
               </td>
               <td>
                 <h4><b><?= $value['nama_bank'] ?></b></h4>
                 <h5><?= $value['no_rek'] ?><br></h5>
                 <h5>a.n : <?= $value['atas_nama'] ?></h5>

               </td>
               <td>
                 <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit<?= $value['id_rekening'] ?>"><i class="fas fa-pencil-alt"></i></button>
                 <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value['id_rekening'] ?>"><i class="fas fa-trash"></i></button>
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



 <!-- modal-tambah -->
 <div class="modal fade" id="modal-tambah">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Tambah <?= $menu ?></h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <?php echo form_open('Rekening/InsertData') ?>
         <div class="form-group">
           <label>Nama Bank</label>
           <input type="text" name="nama_bank" class="form-control" required>
         </div>
         <div class="form-group">
           <label>No Rekening</label>
           <input type="text" name="no_rek" class="form-control" required>
         </div>
         <div class="form-group">
           <label>Atas Nama</label>
           <input type="text" name="atas_nama" class="form-control" required>
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
 <!-- /.modal-tambah -->

 <!-- modal-edit -->
 <?php foreach ($rek as $key => $value) { ?>
   <div class="modal fade" id="modal-edit<?= $value['id_rekening'] ?>">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Edit <?= $menu ?></h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <?php echo form_open('Rekening/UpdateData/' . $value['id_rekening']) ?>
           <div class="form-group">
             <label>Nama Bank</label>
             <input type="text" class="form-control" name="nama_bank" value="<?= $value['nama_bank'] ?>">
           </div>
           <div class="form-group">
             <label>No Rekening</label>
             <input type="text" class="form-control" name="no_rek" value="<?= $value['no_rek'] ?>">
           </div>
           <div class="form-group">
             <label>Atas Nama</label>
             <input type="text" class="form-control" name="atas_nama" value="<?= $value['atas_nama'] ?>">
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
   <!-- /.modal-edit -->

   <!-- modal-delete -->
   <div class="modal fade" id="modal-delete<?= $value['id_rekening'] ?>">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Delete <?= $menu ?></h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">

           Apakah Anda Ingin Menghapus Data ? <br>
           <b> <?= $value['nama_bank'] ?></b>
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <a href="<?= base_url('Rekening/DeleteData/' . $value['id_rekening']) ?>" class="btn btn-danger">Delete</a>
         </div>

       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal-edit -->
 <?php } ?>