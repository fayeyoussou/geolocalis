<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des zones de destination
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des zones de destination</li>
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
                        <th>Zone</th>
                        <th>Destination</th>
                        <th>Quantité</th>
                        <th>Frais du voyage</th>
                        <th>Création</th>
                        <th>Description</th>
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($zone_destinationlist)){ 
                     $count=1;
                        foreach($zone_destinationlist as $zone_destinationlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($zone_destinationlists['z_destination']); ?></td>
                       <td> <?php echo output($zone_destinationlists['zd_name']); ?></td>
                       <td> <?php echo output($zone_destinationlists['zd_quantite']); ?></td>
                       <td> <?php echo output($zone_destinationlists['zd_fraisvoyage']); ?></td>
                       <td> <?php echo output($zone_destinationlists['zd_created_date']); ?></td>

                        <td><?php echo output($zone_destinationlists['zd_desc']); ?></td>
                         <!--<td><?php //echo output($driverslists['d_license_expdate']); ?>    </td>-->
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>zone_destination/editzone_destination/<?php echo output($zone_destinationlists['zd_id']); ?>">
                           <i class="fa fa-edit"></i>
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
