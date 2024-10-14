    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des factures
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des factures</li>
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
                   <!-- <table id="facturetbl" class="table card-table table-vcenter text-nowrap">-->
                        
                    <table id="facturetbl" class="table table-bordered table-vcenter text-nowrap table-striped">                        
                       
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Désignation</th>
                          <th>N° Proforma</th>
                          <th>N° facture</th>
                          <th>Modéle facture</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                          <th>Date</th>
                          <th>Montant</th>
                          <th>TVA</th>
<!--                      <th>Statut facture</th>-->
                          <th>Réglement</th>
                          <th>Validation</th>
                         <?php if(userpermission('lr_trips_list_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($facturelist)){ 
                           $count=1;
                           foreach($facturelist as $facturelists){
                           ?>
                        <tr>
                            <td> <?php echo output($count); $count++; ?></td>
                          <td> <?php echo ucfirst($facturelists['t_type_facturation']); ?></td>
                          <td> <?php echo output($facturelists['t_num_proforma']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_num_facture']); ?> <?php //if(isset($facturelists['t_num_facture'])){echo output($facturelists['t_num_facture']);}else {echo output($facturelists['t_num_proforma']);} ?></td>                         <td> <?php echo ucfirst($facturelists['t_modele_facture']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>
                           <td><?php if($facturelists['t_validation']=="non_valide") {echo "Facture non validée";}else { echo ucfirst($facturelists['t_trip_amount']); }?></td>
                           <td><?php if($facturelists['t_validation']=="non_valide") {echo "Facture non validée";}else { echo ucfirst($facturelists['t_montant_tva']); }?></td>
<!--                           <td><?//= (isset($facturelists['t_driver_details']->d_name))?$facturelists['t_driver_details']->d_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>
--> <!--                          <td> <?php /*
                              switch($facturelists['t_trip_status']){
                                  case 'nodemarre':
                                      $status = '<span class="badge badge-info">No démarré</span>';
                                      break;
                                  case 'encours':
                                      $status = '<span class="badge badge-success">En cours</span>';
                                       break;
                                  case 'termine':
                                      $status = '<span class="badge badge-warning">Terminé</span>';
                                       break;
                                  case 'annule':
                                      $status = '<span class="badge badge-danger">Annulé</span>'; 
                                       break; 
   
                                }*/

                              ?>
                             <?//=  $status ?>  
                            </td>-->
                            
                          <!-- <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>--> 
                           <td><?= (isset($facturelists['t_reglement_details']->tg_name))?$facturelists['t_reglement_details']->tg_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>                       
                            
                         <td> <?php 
                              switch($facturelists['t_validation']){
                                  case 'valide':
                                      $status = '<span class="badge badge-info">Validé</span>';
                                      break;
                                  case 'non_valide':
                                      $status = '<span class="badge badge-danger">Non validé</span>'; 
                                       break; 
   
                                }

                              ?>
                             <?=  $status ?>  
                            </td>
                            
                             <?php //if(userpermission('lr_trips_list_edit')) { ?>
                               <td>
 <?php $t_validation=''; if(userpermission('lr_trips_validate')) { ?>                                  
<?php  $t_validation =  $facturelists['t_validation'];?>                           
                                   <?php if($t_validation=="non_valide") { ?> 
                            <a class="icon" href="<?php echo base_url(); ?>facture/editfacture/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
<?php }?>
<?php }?><!--fin permission-->
								   
						<?php if(userpermission('lr_trips_detail')) { ?>		   
                            <a data-toggle="tooltip" data-placement="top" title="Détail" class="icon" href="<?php echo base_url(); ?>facture/details/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php } ?>		   
                                   
<!--                <a href="<?//= base_url(); ?>facture/facture_management/<?//= $facturelists['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-conteneur"><i class="fa fa-eye"></i></a>-->
  
 

<!--debut validation-->                                    
                <?php //$t_validation=''; $t_validation =  $facturelists['t_validation']; //echo $t_annulation;
                        if($t_validation=="non_valide") { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php echo base_url(); ?>facture/facture_validation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?>                                    
<!--Fin validation-->                                    
                                   
                                   
<!--debut annulation-->   
<?php if(userpermission('lr_trips_cancel')) { ?>								   
                <?php $t_annulation=''; $t_annulation =  $facturelists['t_annulation']; //echo $t_annulation;
                        if($t_annulation=="non_annule") { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Annulation" class="icon" class="icon" href="<?php echo base_url(); ?>facture/facture_annulation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-ban text-green"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-ban text-danger"></i>
                                                             
                     <?php }  // fin controle?>                                     
 <?php }  // fin permission?> 
<!--                             <a class="icon" href="<?php //echo base_url(); ?>facture/facture_generation/<?php //echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-file-alt text-blue"></i>
                           </a> -->
								   
<?php if(userpermission('lr_trips_generation_pdf')) { ?>									   
                          <?php //if($facturelists['t_num_facture']!="") { ?>          
                             <a data-toggle="tooltip" data-placement="top" title="Générer la facture PDF" class="icon" href="<?php echo base_url(); ?>facture/facture_generation_pdf/<?php echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a>
 <?php }  // fin permission?>								   
                      <?php // }  else {?>
                             <!--<a class="icon" href="<?php //echo base_url(); ?>facture/facture_proforma_generation_pdf/<?php //echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a> -->                                    
                   
                    <?php //}  // fin controle?>                                   
                                   
                <?php //if($facturelists['t_annulation']=="annulee") { ?>  

<?php if(userpermission('lr_trips_delete')) { ?>								   
				<?php if(($t_validation=="non_valide") || ($t_annulation=="non_annule")) { ?> 
                           <a class="icon" href="<?php echo base_url(); ?>facture/facture_delete/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a>                                    
                   <?php } else{ ?>
								   
                    <i class="fa fa-trash text-grey"></i>
                    <?php } ?>
<?php }  // fin controle?>								   
								   
                          <?php if($facturelists['t_modele_facture']=="PROFORMA") { ?> 
                             <a class="icon" href="<?php echo base_url(); ?>facture/facture_transformation_proforma/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-paste text-red"></i>
                           </a>                                    
                          <?php } ?>
                          </td>
                          <?php //} //fin controle ligne 100; edit ?>
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


<!-- Debut conteneur-->


<!-- Fin conteneur-->



