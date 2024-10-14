<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des transitaires
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Liste des transitaires</li>
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
                        <th>Portable</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <?php if(userpermission('lr_tra_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($transitairelist)){ 
                     $count=1;
                        foreach($transitairelist as $transitairelists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($transitairelists['tra_name']); ?></td>
                        <td> <?php echo output($transitairelists['tra_mobile']); ?></td>
                        <td><?php echo output($transitairelists['tra_email']); ?></td>
                        <td><?php echo output($transitairelists['tra_address']); ?></td>

                        <?php if(userpermission('lr_tra_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>transitaire/edittransitaire/<?php echo output($transitairelists['tra_id']); ?>">
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
