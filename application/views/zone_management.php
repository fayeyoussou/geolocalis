<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des zones
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des zones</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                        <th>Destination</th>
                        <th>Distance (KM)</th>
                        <th>Plafond carburant (L)</th>
                        <th>Jours de franchise</th>
                        <th>Montant 20 pieds</th>
                        <th>Montant 40 pieds</th>
                        <th>Ristourne 20 pieds</th>
                        <th>Ristourne 40 pieds</th>						 
                        <th>Création</th>						 
<!--                        <th>Description</th>
-->                        <?php if(userpermission('lr_zo_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($zonelist)){ 
                     $count=1;
                        foreach($zonelist as $zonelists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($zonelists['z_destination']); ?></td>
                        <td> <?php echo output($zonelists['z_distance']); ?></td>
                        <td> <?php echo output($zonelists['z_plafond_carburant']); ?></td>
                        <td> <?php echo output($zonelists['z_nombre_jour_detention']); ?></td>
                        <td><?php echo output($zonelists['z_montant_conteneur_20']); ?></td>
                        <td><?php echo output($zonelists['z_montant_conteneur_40']); ?></td>
                         <td><?php echo output($zonelists['z_montant_ristourne_20']); ?></td>
                        <td><?php echo output($zonelists['z_montant_ristourne_40']); ?></td>
                        <td><?php echo output($zonelists['z_created_date']); ?></td>
						 
                       <td>
                        <?php if(userpermission('lr_zo_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>zone/editzone/<?php echo output($zonelists['z_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                         <?php } ?>
 
                        <?php if(userpermission('lr_zo_delete')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>zone/zone_delete/<?php echo output($zonelists['z_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a>                             
                        <?php } ?>
                        </td>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
