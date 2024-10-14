<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des comptes
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des comptes</li>
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
                        <th>Compte</th>
                        <th>Code</th>
                        <th>Description</th>
                       <th>Création</th>
<!--                         <th>Montant 40 pieds</th>-->
<!--                        <th>Description</th>
-->                        <?php if(userpermission('lr_comp_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($comptelist)){ 
                     $count=1;
                        foreach($comptelist as $comptelists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($comptelists['iec_name']); ?></td>
                        <td> <?php echo output($comptelists['iec_code']); ?></td>
                        <td> <?php echo output($comptelists['iec_desc']); ?></td>
                      <td> <?php echo output($comptelists['iec_created_date']); ?></td>
                    <!--     <td><?php //echo output($comptelists['z_montant_conteneur_20']); ?></td>
                        <td><?php //echo output($comptelists['z_montant_conteneur_40']); ?></td>-->
                        <td>
                        <?php if(userpermission('lr_comp_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>compte/editcompte/<?php echo output($comptelists['iec_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                         <?php } ?>
 
                        <?php if(userpermission('lr_comp_delete')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>compte/compte_delete/<?php echo output($comptelists['iec_id']); ?>">
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
