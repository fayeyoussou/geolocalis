<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des type_tache_manutentions
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des type_tache_manutentions</li>
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
-->                        <?php if(userpermission('lr_ttach_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($type_tache_manutentionlist)){ 
                     $count=1;
                        foreach($type_tache_manutentionlist as $type_tache_manutentionlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($type_tache_manutentionlists['ttach_name']); ?></td>
                        <td> <?php echo output($type_tache_manutentionlists['ttach_montant']); ?></td>
                        <td>
                        <?php if(userpermission('lr_ttach_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>type_tache_manutention/edittype_tache_manutention/<?php echo output($type_tache_manutentionlists['ttach_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                         <?php } ?>
 
                        <?php if(userpermission('lr_ttach_delete')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>type_tache_manutention/type_tache_manutention_delete/<?php echo output($type_tache_manutentionlists['ttach_id']); ?>">
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
