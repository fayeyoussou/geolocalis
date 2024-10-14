    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestion des Missions : <?php echo (isset($missiondetails))?'Modifier Mission':'Ajouter Mission' ?>
			<?php if((isset($missiondetails))){ ?> N° <?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_numero']:'' ?>  <?php }else{?> N° M<?= $numeromission; }?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($missiondetails))?'Modifier Mission':'Ajouter Mission' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
		
		
<!--BEGIN TAB-->		
		
<div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($missiondetails))?'MODIFIER MISSION':'AJOUTER MISSION' ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
              </li>
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				  
				  
       	     <form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="Date mission">

                      </div>
                    </div>
                       
   <!-- DEBUT MISSION-->
       <?php //if((isset($missiondetails))){ ?> 

                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver_id" class="form-control selectized" name="mi_driver_id">
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_driver_id'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                

              
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Véhicule<span class="form-required">*</span></label>
                     <select id="mi_vehicle_id" class="form-control selectized" name="mi_vehicle_id" >
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque Véhicule<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" >
                        <option value="">Sélectionner Remorque Véhicule</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_name']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                      
  
					  
<!-- Debut Carte Carburant--> 

              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro bon carburant <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_numero_bon_carburant']:'' ?>" name="mi_numero_bon_carburant" id="mi_numero_bon_carburant" class="form-control" placeholder="Numéro bon carburant">
                  </div>
               </div>                
 
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_quantite_carburant']:'' ?>" name="mi_quantite_carburant" id="mi_quantite_carburant" class="form-control" placeholder="Quantité carburant">
                  </div>
               </div> 					  
					  
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant carburant <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_montant_carburant']:'' ?>" name="mi_montant_carburant" id="mi_montant_carburant" class="form-control" placeholder="Montant carburant">
                  </div>
               </div>                

<!-- Debut Carte Carburant--> 

                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage_id" class="form-control selectized" name="mi_carte_peage_id">
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_peagelist as $key => $carte_peagelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_carte_peage_id'] == $carte_peagelists['cp_id']){ echo 'selected';} ?> value="<?php echo output($carte_peagelists['cp_id']) ?>"><?php echo output($carte_peagelists['cp_name']).' - '. output($carte_peagelists['cp_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>              
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant péage<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_peage_amount']:'' ?>" name="mi_carte_peage_amount" id="mi_carte_peage_amount" class="form-control" placeholder="Montant péage">
                  </div>
               </div>                
                
<!-- Fin Carte Carburant-->                    
                
                 <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais AGS <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_frais_ags']:'' ?>" name="mi_frais_ags" id="mi_frais_ags" class="form-control" placeholder="Frais AGS ">
                  </div>
               </div> 
                      
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Autres Frais <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_autre_frais']:'' ?>" name="mi_autre_frais" id="mi_autre_frais" class="form-control" placeholder="Autres Frais">
                  </div>
               </div>                       


                <!--DEBUT Date mi_eir_plein-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date départ <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_depart']:'' ?>" name="mi_date_depart" value="" class="form-control datepicker" placeholder="Date départ">
                  </div>
               </div>                
                <!-- FIN Date line--> 

                <!--DEBUT Date line-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date retour <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_retour']:'' ?>" name="mi_date_retour" value="" class="form-control datepicker" placeholder="Date retour">
                  </div>
               </div>                
                <!-- FIN Date line-->                 
                
   <!-- FIN MISSION-->
                  <?php //} ?> 
					  
					  
                     <?php //if(isset($customerdetails[0]['c_isactive'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="mi_isactive" class="form-label">Statut</label>
                        <select id="mi_isactive" name="mi_isactive" class="form-control selectized"required="">
                          <option value="">Selectionner statut</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_isactive']==1) ? 'selected':'' ?> value="1">Plein</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_isactive']==0) ? 'selected':'' ?> value="0">Vide</option> 
                        </select>
                      </div>
                    <?php //} ?>
                    </div>
					  
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Lieu de restitution <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_lieu_restitution']:'' ?>" name="mi_lieu_restitution" id="mi_lieu_restitution" class="form-control" placeholder="Lieu de restitution">
                  </div>
               </div>  					  
					  
					  
                     <?php if(isset($missiondetails[0]['mi_validation'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="mi_validation" class="form-label">Validation</label>
                        <select id="mi_validation" name="mi_validation" class="form-control selectized"required="">
                          <option value="">Selectionner la Validation</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_validation']==1) ? 'selected':'' ?> value="1">Validé</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_validation']==0) ? 'selected':'' ?> value="0">Non Validé</option> 
                        </select>
                      </div>
                   
                    </div>	
					   <?php } ?>
                       
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="mi_description" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_description']:'' ?>" name="mi_description" placeholder="Description">
                      </div>
                    </div>
                    
                    
                   
      
                </div>
<?php if((isset($missiondetails))){}else{ ?>			  
                 <input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
 <?php } ?>
      <div class="modal-footer">
		  
                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?= $this->uri->segment(4); ?>">		  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
    </form>	
				  
	

				  
				  
              </div>
				
				
				
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

<!-- BEGIN ADD-->				  
<section class="content">
   <div class="container-fluid">
       <form method="post" id="addmission_report" class="card basicvalidation" action="<?php echo base_url();?>mission/addmission">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">


				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début reception / line<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="from" name="from" value="" placeholder="Date début reception / line" required="true">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin reception / line<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="to" name="to" value="" placeholder="Date fin reception / line" required="true">

                      </div>
                    </div>				
	
					
			
                      <?php //if(isset($customerdetails[0]['pr_statut'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="pr_statut" class="form-label">Statut</label>
                        <select id="pr_statut" name="pr_statut" class="form-control selectized">
                          <option value="all">Selectionner statut</option> 
                          <option value="1">Plein</option> 
                          <option value="0">Vide</option> 
                        </select>
                      </div>
                    </div>
					  <?php //} ?>                             

                      <?php //if(isset($customerdetails[0]['pr_statut'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="type" class="form-label">Recherche</label>
                        <select id="type" name="type" class="form-control selectized" required="true">
                          <option value="">Selectionner votre recherche</option> 
                          <option value="line">Date line</option> 
                          <option value="reception">Date de reception</option> 
                        </select>
                      </div>
                    </div>
					  <?php //} ?> 
									
				
               <input type="hidden" id="mission_add_report" name="mission_add_report" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Journal</button>
      </div>			 
         </div>
   </div>
   </form>
    
   </div>
</section>				  
<!-- END ADD-->				  
				  
				  
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>		
		
<!--END TAB-->		
		
		
      
    </section>
    <!-- /.content -->



