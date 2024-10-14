<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Validation des notifications
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Synthéses</a></li>
               <li class="breadcrumb-item active">Validation des notifications</li>
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
					
					
              <!---->  <li class="nav-item"><a class="nav-link active" href="#carburant" data-toggle="tab">VALIDATION BONS DE CARBURANT</a></li>
					
					<li class="nav-item"><a class="nav-link" href="#paiement" data-toggle="tab">VALIDATION PAIEMENT CARBURANT</a></li>
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
               <table class="datatableexport table card-table table-vcenter">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Station service</th>
                          <th>Numéro BC</th>
                          <th>Véhicule</th>
                          <th>Quantité</th>
                          <th>Restant</th>
                          <th>Statut</th>
                          <th>Création</th>
<!--                          <th>Commentaire</th>
-->                          <th>Validation</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_bon_carburant)){  $count=1;
                           foreach($fuel_bon_carburant as $fuels){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($fuels['bc_date']); ?></td>
                            <td> <?php echo output($fuels['ccc_name']); ?></td>
                           <td> <?php echo output($fuels['bc_numero']); ?></td>
                           <td> <?php echo output($fuels['v_registration_no']); ?></td>
                           <td><?php echo output($fuels['bc_quantite']); ?></td>
                           <td><?php echo output($fuels['v_quantite_restant']); ?></td>
  <!--                         <td><?php //echo output($fuels['bc_type']); ?></td>-->
                        <td><span class="badge <?php echo ($fuels['bc_type']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($fuels['bc_type']=='1') ? 'Validé' : 'Non validé'; ?></span>  
                        </td>							
                           <td><?php echo output($fuels['bc_created_date']); ?></td>
<!--                           <td><?php //echo output($fuels['bc_desc']); ?></td>
-->                           <td>
							
							
<!--VALIDATION-->	
<!--debut validation-->                                    
                <?php //$t_validation=''; $t_validation =  $facturelists['t_validation']; //echo $t_annulation;
							   
				if(userpermission('lr_fuel_validation')) { 			   
                        if($fuels['bc_type']=='0') { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php echo base_url(); ?>fuel_bon_carburant/fuel_bon_carburant_validation/<?php echo output($fuels['bc_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?>
					 <?php }  // fin controle?>							
<!--Fin validation-->  								  
<!--VALIDATION-->								
							
							</td>

                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>                   
                  </div>					
<!-- END TAB CARBURANT-->					

                  

					
<!-- DEBUT PAIEMENT CARBURANT -->					
<div class="tab-pane"  id="paiement">
<div class="table-responsive">
               <table class="datatableexport table card-table table-vcenter">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Station service</th>
                          <th>Numéro BC</th>
<!--                          <th>Commentaire</th>
-->                          <th>Statut</th>
                          <th>Création</th>
                          <th>Validation</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_bon_carburant_tab_paiement_list)){  $count=1;
                           foreach($fuel_bon_carburant_tab_paiement_list as $paiement){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($paiement['ccrp_date']); ?></td>
                            <td> <?php echo output($paiement['ccc_name']); ?></td>
                           <td> <?= join_multi_select($paiement['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_numero'); ?></td>

  <!--                         <td><?php //echo output($fuels['bc_type']); ?></td>-->
                        <td><span class="badge <?php echo ($paiement['ccrp_statut']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($paiement['ccrp_statut']=='1') ? 'Validé' : 'Non validé'; ?></span>  
                        </td>							
                           <td><?php echo output($paiement['ccrp_created_date']); ?></td>
<!--                           <td><?php //echo output($fuels['bc_desc']); ?></td>
-->                           <td>
							
							
<!--VALIDATION-->	
<!--debut validation-->                                    
                <?php //$t_validation=''; $t_validation =  $facturelists['t_validation']; //echo $t_annulation;
							   
				/*if(userpermission('lr_fuel_validation')) {*/ 			   
                        if($paiement['ccrp_statut']=='0') { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php echo base_url(); ?>fuel_bon_carburant/fuel_bon_carburant_paiement_validation/<?php echo output($paiement['ccrp_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?>
					 <?php /*}*/  // fin controle?>							
<!--Fin validation-->  								  
<!--VALIDATION-->								
							
							</td>

                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>	
	
 </div>	
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