<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des compagnies
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des compagnies</li>
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
                        <th>Montant</th>
<!--                        <th>Description</th>
-->                        <?php if(userpermission('lr_cc_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($compagnielist)){ 
                     $count=1;
                        foreach($compagnielist as $compagnielists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($compagnielists['cc_name']); ?></td>
                        <td> <?php echo output($compagnielists['cc_address']); ?></td>
                        <td>
                        <?php if(userpermission('lr_cc_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>compagnie/editcompagnie/<?php echo output($compagnielists['cc_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                         <?php } ?>
 
                        <?php if(userpermission('lr_cc_delete')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>compagnie/compagnie_delete/<?php echo output($compagnielists['cc_id']); ?>">
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
