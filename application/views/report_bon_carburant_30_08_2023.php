<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-8">
            <h1 class="m-0 text-dark">Validation et journal des bons de carburant
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
               <!--<li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Synthéses</a></li>-->
               <li class="breadcrumb-item active">Validation & bons de carburant</li>
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
 
					<li class="nav-item"><a class="nav-link" href="#journal" data-toggle="tab">JOURNAL DES BONS DE CARBURANT</a></li>
					
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
					
<!--DEBUT JOURNAL BON CARBURANT-->	
<div class="tab-pane"  id="journal">
	
<form method="post" id="booking_report" class="card basicvalidation" action="<?php echo base_url();?>reports/booking">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="booking_from" class="col-sm-5 col-form-label">Rapport de</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_from']) ? $_POST['booking_from'] : ''; ?>" id="booking_from" name="booking_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-5 col-form-label">Rapport à</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_to']) ? $_POST['booking_to'] : ''; ?>" id="booking_to" name="booking_to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-3 col-form-label">Véhicule</label>
                     <div class="col-sm-8 form-group">
                        <select required="true" id="booking_vechicle"  class="form-control selectized"  name="booking_vechicle">
                           <option value="all">Tous les véhicules</option>
                           <?php foreach ($vehiclelist as $key => $vechiclelists) { ?>
                           <option <?php echo (isset($_POST['booking_vechicle']) && ($_POST['booking_vechicle'] == $vechiclelists['v_id'])) ? 'selected':'' ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="bookingreport" name="bookingreport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer le Rapport</button>
               </div>
            </div>
         </div>
   </div>
   </form>	
	
<div class="table-responsive">
               <table class="datatableexport table card-table table-vcenter">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Numéro BC</th>
                          <th>Quantité</th>
<!---->                           <th>Montant</th>
                         <th>Statut</th>
                          <th>Création</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_bon_carburant_tab_journal_list)){  $count=1;
                           foreach($fuel_bon_carburant_tab_journal_list as $journal){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($journal['fjc_date']); ?></td>
                            <td> <?php //echo output($journal['bon_carburant']->bc_numero);
								
if(isset($journal['bon_carburant']->bc_numero)){echo output($journal['bon_carburant']->bc_numero);}	else{
	echo "Non renseigné";
}							
								
								?></td>
                           <td> <?php //echo output($journal['bon_carburant']->bc_quantite); 
							   if(isset($journal['bon_carburant']->bc_quantite)){echo output($journal['bon_carburant']->bc_quantite);}	else{
	echo "Non renseigné";
}?><?//= join_multi_select($paiement['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_numero'); ?></td>

  <!---->                         <td><?php 
							   
if(isset($journal['bon_carburant']->bc_montant)){echo output($journal['bon_carburant']->bc_montant);}	else{
	echo "Non renseigné";
}							   
							   //echo output($journal['bon_carburant']->bc_montant); ?></td>
                        <td><span class="badge <?php 
							   
	if(isset($journal['bon_carburant']->bc_type)){						   
							   
							   
							   
							   echo ($journal['bon_carburant']->bc_type=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($journal['bon_carburant']->bc_type=='1') ? 'Validé' : 'Non validé'; 
							
}	else{
	echo "Non renseigné";
}								
							?></span>  
                        </td>							
                           <td><?php echo output($journal['fjc_created_date']); ?></td>


                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>	
	
 </div>					
					
<!--FIN JOURNAL BON CARBURANT-->					
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>


   </div>
</section>
<!-- /.content -->