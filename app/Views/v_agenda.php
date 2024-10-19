 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-success">
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
             <th>Nama Agenda</th>
             <th>Opsi</th>
           </tr>
         </thead>
         <tbody>
           <?php $no = 1;
            foreach ($agenda as $key => $value) { ?>
             <tr>
               <td><?= $no++ ?></td>
               <td>
                 <i class="fas fa-bullhorn fa-3x text-success"></i>
               </td>
               <td>
                 <p>
                 <h6><b><?= $value['nama_kegiatan'] ?></b></h6>
                 Tanggal : <?= $value['tanggal'] ?> <br>
                 Jam : <?= $value['jam'] ?> - Selesai </p>
               </td>
               <td>
                 <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit<?= $value['id_agenda'] ?>"><i class="fas fa-pencil-alt"></i></button>
                 <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value['id_agenda'] ?>"><i class="fas fa-trash"></i></button>
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
         <?php echo form_open('Agenda/InsertData') ?>
         <div class="form-group">
           <label>Nama Kegiatan</label>
           <textarea rows="6" name="nama_kegiatan" class="form-control" required></textarea>
         </div>
         <div class="form-group">
           <label>Tanggal</label>
           <input type="date" class="form-control" name="tanggal" required>
         </div>
         <div class="form-group">
           <label>Jam</label>
           <input type="time" class="form-control" name="jam" required>
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
 <?php foreach ($agenda as $key => $value) { ?>
   <div class="modal fade" id="modal-edit<?= $value['id_agenda'] ?>">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title">Edit <?= $menu ?></h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <?php echo form_open('Agenda/UpdateData/' . $value['id_agenda']) ?>
           <div class="form-group">
             <label>Nama Kegiatan</label>
             <textarea rows="6" name="nama_kegiatan" class="form-control"><?= $value['nama_kegiatan'] ?></textarea>
           </div>
           <div class="form-group">
             <label>Tanggal</label>
             <input type="date" class="form-control" name="tanggal" value="<?= $value['tanggal'] ?>">
           </div>
           <div class="form-group">
             <label>Jam</label>
             <input type="time" class="form-control" name="jam" value="<?= $value['jam'] ?>">
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
   <div class="modal fade" id="modal-delete<?= $value['id_agenda'] ?>">
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
           <b> <?= $value['nama_kegiatan'] ?></b>
         </div>
         <div class="modal-footer justify-content-between">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <a href="<?= base_url('Agenda/DeleteData/' . $value['id_agenda']) ?>" class="btn btn-danger">Delete</a>
         </div>

       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   <!-- /.modal-edit -->
 <?php } ?>