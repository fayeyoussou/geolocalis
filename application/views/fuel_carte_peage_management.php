<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des cartes de péage
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des cartes de péage</li>
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
                        <th>Nom</th>
                        <th>Numéro de la carte</th>
                        <th>Date d'achat</th>
                        <th>Description</th>
                        <th>Création</th><!---->
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($fuel_carte_peagelist)){ 
                     $count=1;
                        foreach($fuel_carte_peagelist as $fuel_carte_peagelists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($fuel_carte_peagelists['cp_name']); ?></td>
                        <td> <?php echo output($fuel_carte_peagelists['cp_numero']); ?></td>
                        <td><?php echo output($fuel_carte_peagelists['cp_date_achat']); ?></td>
                        <td><?php echo output($fuel_carte_peagelists['cp_desc']); ?></td>
                         <!----><td><?php echo output($fuel_carte_peagelists['cp_created_date']); ?>    </td>
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_carte_peage/editfuel_carte_peage/<?php echo output($fuel_carte_peagelists['cp_id']); ?>">
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
