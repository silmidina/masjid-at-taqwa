 <!-- /.col -->
 <div class="col-md-12">
   <div class="card card-info">
     <div class="card-header">
       <h3 class="card-title">Data <?= $menu ?></h3>
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
           <tr>
             <th width="50">No</th>
             <th>Tahun</th>
             <th>Opsi</th>
           </tr>
         </thead>
         <tbody>
           <?php $no = 1;
            foreach ($tahun as $key => $value) { ?>
             <tr>
               <td><?= $no++ ?></td>
               <td>
                 <?= $value['tahun_h'] ?>H / <?= $value['tahun_m'] ?>M <?= date('Y') == $value['tahun_m'] ? '<span class="right badge badge-success">Active</span>' : '' ?>
               </td>

               <td>
                 <a href="<?= base_url('PesertaQurban/KelompokQurban/' . $value['id_tahun']) ?>" class="btn btn-flat btn-sm btn-primary"><i class="fas fa-layer-group"></i> Kelompok Qurban</a>
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