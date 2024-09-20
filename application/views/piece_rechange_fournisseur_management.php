<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Information du Fournisseur
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>piece_rechange_fournisseur/addpiece_rechange_fournisseur">Ajouter un Fournisseur</a></li>
               <li class="breadcrumb-item active"></li>
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
<!-- -->                       <th>Type de Fournisseur</th>
                        <th>Portable</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Statut</th>
                        <th>Création</th>
                        <?php if(userpermission('lr_piece_rechange_fournisseur_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($piece_rechange_fournisseurlist)){ 
                     $count=1;
                        foreach($piece_rechange_fournisseurlist as $piece_rechange_fournisseurlists){
                        ?>
                     <tr>
                        <td> <?php echo output($piece_rechange_fournisseurlists['f_numero']); //output($count); $count++; ?></td>
                        <td> <?php echo output($piece_rechange_fournisseurlists['f_name']); ?></td>
<!-- -->                       <td> <?php echo output($piece_rechange_fournisseurlists['f_type']); ?></td>
                        <td> <?php echo output($piece_rechange_fournisseurlists['f_mobile']); ?></td>
                        <td><?php echo output($piece_rechange_fournisseurlists['f_email']); ?></td>
                        <td><?php echo output($piece_rechange_fournisseurlists['f_address']); ?></td>
                         <td>  <span class="badge <?php echo ($piece_rechange_fournisseurlists['f_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($piece_rechange_fournisseurlists['f_isactive']=='1') ? 'Active' : 'Inactive'; ?></span>  </td>
                        <td><?php echo output($piece_rechange_fournisseurlists['f_created_date']); ?></td>
						 
                        <?php if(userpermission('lr_piece_rechange_fournisseur_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>piece_rechange_fournisseur/editpiece_rechange_fournisseur/<?php echo output($piece_rechange_fournisseurlists['f_id']); ?>">
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
