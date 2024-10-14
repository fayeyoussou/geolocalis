<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">les motifs des pertes  
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Motif perte</li>
            </ol>
         </div>
      </div>
      <?php if(userpermission('lr_mi_motif_perte_action')) { ?>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
      Ajouter le motif de la perte 
      </button>
      <?php } ?>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="vehiclelisttbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                        <th>Motif</th>
                        <th>Description</th>
                        <th>Date de création</th>
                        <?php if(userpermission('lr_mi_motif_perte_action')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($motif_perte)){  $count=1;
                        foreach($motif_perte as $motif_pertes){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($motif_pertes['mp_name']); ?></td>
                        <td> <?php echo output($motif_pertes['mp_desc']); ?></td>
                        <td> <?php echo output($motif_pertes['mp_created_date']); ?></td>
                        <?php if(userpermission('lr_mi_motif_perte_action')) { ?>
                        <td>
  
                           <a class="icon" href="<?php echo base_url(); ?>mission/mission_motif_perte_delete/<?php echo output($motif_pertes['mp_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a> 
                        </td>
                        <?php } ?>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="modal fade show" id="modal-add" aria-modal="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Ajouter un motif de la perte </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="geofencesave" method="post" action="<?php echo base_url(); ?>mission/addmission_motif_perte">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="geo_name" class="col-sm-4 col-form-label">Motif de la perte </label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="mp_name" id="mp_name" required="true" placeholder="Saississez le motif de la perte">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="Cateogry" class="col-sm-4 col-form-label">Description</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="mp_desc" id="mp_desc" required="true" placeholder="Saississez la description">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
         <button type="submit" id="geofenvaluesave" class="btn btn-primary">Ajouter le motif de la perte </button>
         </div>
         </form>
      </div>
   </div>
</div>