<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Missions
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Synthéses</a></li>
               <li class="breadcrumb-item active">Missions</li>
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
      
    <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">


  <!--                <li class="nav-item"><a class="nav-link active" href="#annulation_mission" data-toggle="tab">ANNULATION MISSION</a></li>-->
					
					
              <!---->  <li class="nav-item"><a class="nav-link active" href="#carburant" data-toggle="tab">VALIDATION DES MISSIONS</a></li>
					
					<!--<li class="nav-item"><a class="nav-link" href="#paiement" data-toggle="tab">VALIDATION PAIEMENT CARBURANT</a></li>-->
                 <!---->
               </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
 <!--<div class="tab-pane active"  id="annulation_mission">
                    <table id="vgeofencetbl" class="table table-striped projects">
                          <thead>
                              <tr>

						  <th>N°</th>
                          <th>Motif</th>
                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Lieu de restitution</th>
                          <th>Chauffeur</th>
						  <th>Action</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            <?php //if(!empty($validation_missionlist)){ 
                            //$count=1;
                           // foreach($validation_missionlist as $validation_missionlists){
                            ?>
                              <tr>
                           <td> <?php //echo output($count); $count++; ?></td>
                           <td> <?php //echo output($validation_missionlists['ta_name']); ?></td>
                           <td> <?php //echo output($validation_missionlists['mi_date_mission']); ?></td>
                           <td> <?php //echo output($validation_missionlists['v_registration_no']); ?></td>
                           <td><?php //echo output($validation_missionlists['pr_numero']); ?></td>
                           <td><?php //echo output($validation_missionlists['co_numero_conteneur']); ?></td>
                           <td><?php //echo output($validation_missionlists['clr_name']); ?></td>
                           <td><?php //echo output($validation_missionlists['d_name']); ?></td>
                           <td><a href="<?php //echo base_url(); ?>mission/mission_demande_annulation_validation/<?php //echo output($validation_missionlists['mi_id']); ?>" class="btn btn-sm btn-danger <?//= ($incomexpensedetails['ie_amount'] - $totalpaidamt==0)?'disabled':'' ?>" >Valider la demande</a>								  
</td>
                              </tr>
                          <?php //} } ?>
                          </tbody>
                      </table>
                  </div>-->                 
                  <!-- /.tab-pane -->
                  
					
<!-- BEGIN TAB CARBURANT-->	
<div class="tab-pane active"  id="carburant">
                    <!-- The timeline -->
 <div class="table-responsive">
          <?php if(!empty($mission)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
<!--                          <th>N° transaction</th>
-->                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Qté carburant</th>
                          <th>Lieu livraison</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Type de mission</th>
                          <th>Description</th>
                          <th>Chauffeur</th>
                          <th>Suite</th>
                          <th>Création</th>
                          <?php //if(userpermission('lr_mi_edit')) { ?>
                          <th>Validation</th>
                          <?php //} ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php //echo output($missions['t_num_facture']); ?><?php //echo ucfirst($missions['facture']->t_num_facture); ?><?= (isset($missions['facture']->t_num_facture))?$missions['facture']->t_num_facture:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							<td> <?php echo output($missions['mi_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mi_quantite_carburant']); ?></td>
							
							<td> <?= (isset($missions['lieu_livraison']->ll_name))?$missions['lieu_livraison']->ll_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>

                           <td><?php //echo output($missions['pr_numero']); ?><?php //echo ucfirst($missions['pregate']->pr_numero); ?><?= (isset($missions['pregate']->pr_numero))?$missions['pregate']->pr_numero:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td>
							<?= join_multi_select($missions['mi_conteneur_id'], 'trip_conteneur', 'co_id', 'co_numero_conteneur'); ?>
							 
							
							 
													   

							
							</td>
                         <td><?php //echo output($missions['type_transport']->ta_name); ?>
							 <?= (isset($missions['mi_type_mission']))?$missions['mi_type_mission']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mi_desc']); ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td> 
							
                        <td>  <?= (isset($missions['mi_mission_id']))?$missions['mi_mission_id']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>							
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

                          <?php 
							   
						$mi_annulation=''; 
					    $mi_annulation =  $missions['mi_annulation']; 							   
							   
							   //if(userpermission('lr_mi_edit')) { ?>
                              <td>
								  
                <?php  if($missions['mi_validation']=='0') { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php echo base_url(); ?>mission/mission_validation/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?>								  	<?php //if($missions['mi_mission_id']!=0){?>							  
<a class="icon" target="_blank" href="<?php echo base_url(); ?>mission/mission_suite_report/<?php if($missions['mi_mission_id']!=0){echo output($missions['mi_mission_id']);}else{ echo output($missions['mi_id']); }?>">                           
                              <i class="fa fa-eye"></i>
                            </a><?php	//}?>							  
                          </td>
                        <?php //} ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucune mission à validée n est trouvée !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>                   
                  </div>					
<!-- END TAB CARBURANT-->					

                  

					
<!-- DEBUT PAIEMENT CARBURANT -->					
<!--<div class="tab-pane"  id="paiement">
	
	
 </div>-->	
<!-- FIN PAIEMENT CARBURANT -->					
					
					
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>


   </div>
</section>
<!-- /.content -->