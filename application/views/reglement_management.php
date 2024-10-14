<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des règlements
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des règlements</li>
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
                        <th>Facture</th>
                        <th>Montant</th>
                        <th>N° bordereau</th>
                        <th>Type</th>
                        <th>Note</th>
                        <th>Date</th>
<!--                        <th>Description</th>
-->                        <?php if(userpermission('lr_tg_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($reglementlist)){ 
                     $count=1;
                        foreach($reglementlist as $reglementlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($reglementlists['t_num_facture']->t_num_facture); ?></td>
                        <td> <?php echo output($reglementlists['tp_amount']); ?></td>
                         <td> <?php echo output($reglementlists['tp_numero_bordereau']); ?></td>
                        <td> <?php //echo output($reglementlists['tp_type']); ?><span class="badge <?php echo ($reglementlists['tp_type']=='Espece') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($reglementlists['tp_type']=='Cheque') ? 'Cheque' : 'Espece'; ?></span></td>
                        <td> <?php echo output($reglementlists['tp_notes']); ?></td>
                        <td> <?php echo output($reglementlists['tp_created_date']); ?></td>
                       <td>
                        <?php if(userpermission('lr_tg_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>reglement/editreglement/<?php echo output($reglementlists['tp_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                         <?php } ?>
 
                        <?php if(userpermission('lr_tg_delete')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>reglement/reglement_delete/<?php echo output($reglementlists['tp_id']); ?>">
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
