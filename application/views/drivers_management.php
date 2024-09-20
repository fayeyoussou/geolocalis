<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Information du chauffeur
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
               <li class="breadcrumb-item active">Information du chauffeur</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="driverslisttbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                        <th>Nom chauffeur</th>
                        <th>Portable</th>
                        <th>N° Permis</th>
                        <th>Date expiration license</th>
                        <th>Date d'adhésion</th>
                        <th>Statut</th>
                        <th>Profil</th>
                        <th>Création</th>
                        <?php if(userpermission('lr_drivers_list_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($driverslist)){  $count=1;
                        foreach($driverslist as $driverslists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($driverslists['d_name']); ?></td>
                        <td> <?php echo output($driverslists['d_mobile']); ?></td>
                        <td><?php echo output($driverslists['d_licenseno']); ?></td>
                        <td><?php echo output($driverslists['d_license_expdate']); ?></td>
                        <td><?php echo output($driverslists['d_doj']); ?></td>
                        <td>  <span class="badge <?php echo ($driverslists['d_profil']=='PERMANENT') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($driverslists['d_profil']=='PERMANENT') ? 'PERMANENT' : 'PRESTATAIRE'; ?></span>  </td>
                         <td>  <span class="badge <?php echo ($driverslists['d_is_active']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($driverslists['d_is_active']=='1') ? 'Active' : 'Inactive'; ?></span>  </td>
                       <td><?php echo output($driverslists['d_created_date']); ?></td>
						 
                        <?php if(userpermission('lr_drivers_list_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>drivers/editdriver/<?php echo output($driverslists['d_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                        </td>
                        <?php } }  } ?>
                     </tr>
                  </tbody>
               </table>
              
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</section>
<!-- /.content -->