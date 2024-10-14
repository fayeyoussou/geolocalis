<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lieu de livraison</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Lieu de livraison</li>
            </ol>
         </div>
      </div>
      <?php if(userpermission('lr_mi_lieu_livraison_action')) { ?>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
      Ajouter un Lieu de livraison</button>
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
                        <?php if(userpermission('lr_mi_lieu_livraison_action')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($lieu_livraison)){  $count=1;
                        foreach($lieu_livraison as $lieu_livraisons){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($lieu_livraisons['ll_name']); ?></td>

                        <td> <?php echo output($lieu_livraisons['ll_desc']); ?></td>
                        <td> <?php echo output($lieu_livraisons['ll_created_date']); ?></td>
                        <?php if(userpermission('lr_mi_lieu_livraison_action')) { ?>
                        <td>
  
                           <a class="icon" href="<?php echo base_url(); ?>mission/mission_lieu_livraison_delete/<?php echo output($lieu_livraisons['ll_id']); ?>">
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
            <h4 class="modal-title">Ajouter un nouveau Lieu de livraison</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="geofencesave" method="post" action="<?php echo base_url(); ?>mission/addmission_lieu_livraison">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="geo_name" class="col-sm-4 col-form-label">Lieu de livraison</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="ll_name" id="ll_name" required="true" placeholder="Saississez le Lieu de livraison">
                     </div>
                  </div>
				   
<div class="form-group row">

                    				   
				   
                  <div class="form-group row">
                     <label for="Cateogry" class="col-sm-4 col-form-label">Description</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="ll_desc" id="ll_desc" required="true" placeholder="Saississez la description">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
         <button type="submit" id="geofenvaluesave" class="btn btn-primary">Enregistrer</button>
         </div>
         </form>
      </div>
   </div>
</div>