<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des Stations de service
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li><li class="breadcrumb-item"><a href="<?= base_url(); ?>/fuel_compagnie/addfuel_compagnie">Ajouter une Station</a></li> 
               <li class="breadcrumb-item active"> Stations de service </li>
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
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Contact</th>
                        <th>Téléphone Contact</th>
                        <th>Description</th>
                        <th>Création</th>
                        <?php //if(userpermission('lr_ccc_edit')) { ?>
                        <th>Action</th>
                        <?php //} ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($fuel_compagnielist)){ 
                     $count=1;
                        foreach($fuel_compagnielist as $fuel_compagnielists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($fuel_compagnielists['ccc_name']); ?></td>
                         <td> <?php echo output($fuel_compagnielists['ccc_address']); ?></td> 
                        <td> <?php echo output($fuel_compagnielists['ccc_email']); ?></td>
                        <td> <?php echo output($fuel_compagnielists['ccc_mobile']); ?></td>
                        <td> <?php echo output($fuel_compagnielists['ccc_contact_name']); ?></td>
                        <td> <?php echo output($fuel_compagnielists['ccc_contact_mobile']); ?></td>
                         <td> <?php echo output($fuel_compagnielists['ccc_desc']); ?></td>
                         <td> <?php echo output($fuel_compagnielists['ccc_created_date']); ?></td>
                       
                          <?php //if(userpermission('lr_ccc_edit')) { ?>
                        <td>
                        <?php //if(userpermission('lr_ccc_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_compagnie/editfuel_compagnie/<?php echo output($fuel_compagnielists['ccc_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                         <?php //} ?>
 
                        <?php //if(userpermission('lr_ccc_delete')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_compagnie/fuel_compagnie_delete/<?php echo output($fuel_compagnielists['ccc_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a>                             
                        <?php //} ?>
                        </td>
                         <?php //} ?>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
