<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Marque du pneu
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">une vouvelle marque</li>
            </ol>
         </div>
      </div>
      <?php if(userpermission('lr_piece_rechange_marque_action')) { ?>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
      Ajouter une vouvelle marque 
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
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date de création</th>
                        <?php if(userpermission('lr_piece_rechange_marque_action')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($piece_rechange_marque)){  $count=1;
                        foreach($piece_rechange_marque as $vehiclegroupdata){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($vehiclegroupdata['m_name']); ?></td>
                        <td> <?php echo output($vehiclegroupdata['m_desc']); ?></td>
                        <td> <?php echo output($vehiclegroupdata['m_created_date']); ?></td>
                        <?php if(userpermission('lr_piece_rechange_marque_action')) { ?>
                        <td>
                           
                           <a class="icon" href="<?php echo base_url(); ?>piece_rechange_marque/piece_rechange_marque_delete/<?php echo output($vehiclegroupdata['m_id']); ?>">
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
            <h4 class="modal-title">Ajouter une vouvelle marque </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="geofencesave" method="post" action="<?php echo base_url(); ?>piece_rechange_marque/addpiece_rechange_marque">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="geo_name" class="col-sm-4 col-form-label">Nom</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="m_name" id="m_name" required="true" placeholder="Enter Group Name">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="Cateogry" class="col-sm-4 col-form-label">Description</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="m_desc" id="m_desc" required="true" placeholder="Enter Description">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
         <button type="submit" id="geofenvaluesave" class="btn btn-primary">Enregistrer</button>
			 <input type="hidden" name="m_created_by" id="m_created_by" value="<?php echo $this->session->userdata['session_data']['u_id'];
 ?>" >
		<input type="hidden" id="m_created_date" name="m_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  			 
         </div>
         </form>
      </div>
   </div>
</div>