    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Information sur conteneurs
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Information du pregate N° <?php //echo output($detailconteneurs['pr_numero']);?> de la facture N°<?php //echo output($detailconteneurs['pr_numero']);?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">
        <div class="card-body p-0">
         <div class="table-responsive">
                    <table id="conteneurtbl" class="table card-table table-vcenter text-nowrap">

                        <thead>
                        <tr>
                          <th class="w-1">N°</th>
                           <th>N° conteneur</th>
                          <th>Destination</th>
                          <th>Type</th>
<!--                          <th>Nature</th>-->
                          <th>Montant</th>
                          <?php //if(userpermission('lr_co_edit')) { ?>
                          <?php //} ?>
							
                          <?php if(userpermission('lr_co_edit')) { ?>
                          <th>MISSION</th>
                          <th>EIR PLEIN</th>
                          <th>EIR VIDE</th>
                          <th>Action</th>
                          <?php } ?>							
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($conteneur)){  $count=1;
                           foreach($conteneur as $conteneurs){
                               $type='';$type_conteneur=0;$montant=0;
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td><?php echo output($conteneurs['co_numero_conteneur']); ?> </td>
                           <td><?php if(isset($conteneurs['zone_name']->z_destination)){echo output($conteneurs['zone_name']->z_destination);} ?></td>                                       <td><?php 
                        if($conteneurs['co_type_conteneur']!='') {
                          if($conteneurs['co_type_conteneur']=='20_pieds') { $type='20 pieds'; } else { $type='40 pieds'; }}  ?>
                          <?php echo output($type);?></td>           
<!--                           <td> <?php //if(isset($conteneurs['nature_name']->na_name)){echo output($conteneurs['nature_name']->na_name);}?></td>-->
                           <td> <?php echo output($conteneurs['co_montant']);?></td>
                           <?php if(userpermission('lr_co_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>mission/addmission/<?php echo output($conteneurs['co_trip_id']); ?>/<?php echo output($conteneurs['co_id']); ?>">
                              <!--<i class="fa fa-edit"></i>--> Mission
                            </a>
                          </td>
                          <?php } ?>
							
                           <?php if(userpermission('lr_co_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>eir_plein/addeir_plein/<?php echo output($conteneurs['co_trip_id']); ?>/<?php echo output($conteneurs['co_id']); ?>">
                              <!--<i class="fa fa-edit"></i>-->Eir Plein
                            </a>
                          </td>
                          <?php } ?>
							
                          <?php if(userpermission('lr_co_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>eir_vide/addeir_vide/<?php echo output($conteneurs['co_trip_id']); ?>/<?php echo output($conteneurs['co_id']); ?>">
                              <!--<i class="fa fa-edit"></i>-->Eir Vide
                            </a>
                          </td>
                          <?php } ?>
							
                          <?php if(userpermission('lr_co_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>conteneur/editconteneur/<?php echo output($conteneurs['co_id']); ?>">
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
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



