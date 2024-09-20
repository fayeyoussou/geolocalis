    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($eir_pleindetails))?'Modifier Eir Plein':'Ajouter Eir Plein' ?> <?//= $numeroeir_plein; ?>
				
<!--				<?php //if((isset($eir_pleindetails))){ ?> N° <?php //echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_numero']:'' ?>  <?php //}else{?> N° M<?//= $numeroeir_plein; }?> -->
				
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
			 
			  <li class="breadcrumb-item"><a href="<?= base_url(); ?>/conteneur/pregate/<?= $this->uri->segment(3);?>">Pregate</a></li>				
              <li class="breadcrumb-item active"><?php echo (isset($eir_pleindetails))?'Modifier Eir Plein':'Ajouter Eir Plein' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">

<!-- BEGIN SHOW-->	
		
<!--END SHOW-->		
		
      <div class="container-fluid">
       	     <form method="post" id="eir_plein" class="card" action="<?php echo base_url();?>eir_plein/<?php echo (isset($eir_pleindetails))?'updateeir_plein':'inserteir_plein'; ?>">
          <div class="card-body">

                  
			  
                  <div class="row">
                   <input type="hidden" name="ei_id" id="ei_id" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_id']:'' ?>" >
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date eir_plein<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ei_date" name="ei_date" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_date']:'' ?>" placeholder="Date eir_plein">

                      </div>
                    </div>
                       
   <!-- DEBUT eir_plein-->
       <?php //if((isset($eir_pleindetails))){ ?> 

					  <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro Transaction <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_numero_transaction']:'' ?>" name="ei_numero_transaction" id="ei_numero_transaction" class="form-control" placeholder="Numéro Transaction">
                  </div>
               </div>
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="ei_driver_id" class="form-control selectized" name="ei_driver_id">
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($eir_pleindetails)) && $eir_pleindetails[0]['ei_driver_id'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                

              
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Véhicule<span class="form-required">*</span></label>
                     <select id="ei_vehicle_id" class="form-control selectized" name="ei_vehicle_id" >
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($eir_pleindetails)) && $eir_pleindetails[0]['ei_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque Véhicule<span class="form-required">*</span></label>
                     <select id="ei_vehicle_remorque_id" class="form-control selectized" name="ei_vehicle_remorque_id" >
                        <option value="">Sélectionner Remorque Véhicule</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($eir_pleindetails)) && $eir_pleindetails[0]['ei_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_name']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                      
  
					  
<!-- Debut Carte Carburant--> 

              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro bon carburant <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_numero_bon_carburant']:'' ?>" name="ei_numero_bon_carburant" id="ei_numero_bon_carburant" class="form-control" placeholder="Numéro bon carburant">
                  </div>
               </div>                
 
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_quantite_carburant']:'' ?>" name="ei_quantite_carburant" id="ei_quantite_carburant" class="form-control" placeholder="Quantité carburant">
                  </div>
               </div> 					  
					  
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant carburant <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_montant_carburant']:'' ?>" name="ei_montant_carburant" id="ei_montant_carburant" class="form-control" placeholder="Montant carburant">
                  </div>
               </div>                

<!-- Debut Carte Carburant--> 

                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="ei_carte_peage_id" class="form-control selectized" name="ei_carte_peage_id">
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_peagelist as $key => $carte_peagelists) { ?>
                        <option <?php if((isset($eir_pleindetails)) && $eir_pleindetails[0]['ei_carte_peage_id'] == $carte_peagelists['cp_id']){ echo 'selected';} ?> value="<?php echo output($carte_peagelists['cp_id']) ?>"><?php echo output($carte_peagelists['cp_name']).' - '. output($carte_peagelists['cp_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>              
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant péage<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_carte_peage_amount']:'' ?>" name="ei_carte_peage_amount" id="ei_carte_peage_amount" class="form-control" placeholder="Montant péage">
                  </div>
               </div>                
                
<!-- Fin Carte Carburant-->                    
                
<!--                 <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais AGS <span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_frais_ags']:'' ?>" name="ei_frais_ags" id="ei_frais_ags" class="form-control" placeholder="Frais AGS ">
                  </div>
               </div> 
                      
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Autres Frais <span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_autre_frais']:'' ?>" name="ei_autre_frais" id="ei_autre_frais" class="form-control" placeholder="Autres Frais">
                  </div>
               </div>    -->                   


                <!--DEBUT Date ei_eir_plein-->                
<!--                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date départ <span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_date_depart']:'' ?>" name="ei_date_depart" value="" class="form-control datepicker" placeholder="Date départ">
                  </div>
               </div> -->               
                <!-- FIN Date line--> 

                <!--DEBUT Date line-->                
<!--                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date retour <span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_date_retour']:'' ?>" name="ei_date_retour" value="" class="form-control datepicker" placeholder="Date retour">
                  </div>
               </div> -->               
                <!-- FIN Date line-->                 
                
   <!-- FIN eir_plein-->
                  <?php //} ?> 
					  
					  
                     <?php //if(isset($customerdetails[0]['c_isactive'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="ei_isactive" class="form-label">Statut</label>
                        <select id="ei_isactive" name="ei_isactive" class="form-control selectized"required="">
                          <option value="">Selectionner statut</option> 
                          <option <?php echo (isset($eir_pleindetails) && $eir_pleindetails[0]['ei_isactive']==1) ? 'selected':'' ?> value="1">Plein</option> 
                          <option <?php echo (isset($eir_pleindetails) && $eir_pleindetails[0]['ei_isactive']==0) ? 'selected':'' ?> value="0">Vide</option> 
                        </select>
                      </div>
                    <?php //} ?>
                    </div>
					  
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Lieu de restitution <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_lieu_restitution']:'' ?>" name="ei_lieu_restitution" id="ei_lieu_restitution" class="form-control" placeholder="Lieu de restitution">
                  </div>
               </div>  					  
					  
					  
                     <?php if(isset($eir_pleindetails[0]['ei_validation'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="ei_validation" class="form-label">Validation</label>
                        <select id="ei_validation" name="ei_validation" class="form-control selectized"required="">
                          <option value="">Selectionner la Validation</option> 
                          <option <?php echo (isset($eir_pleindetails) && $eir_pleindetails[0]['ei_validation']==1) ? 'selected':'' ?> value="1">Validé</option> 
                          <option <?php echo (isset($eir_pleindetails) && $eir_pleindetails[0]['ei_validation']==0) ? 'selected':'' ?> value="0">Non Validé</option> 
                        </select>
                      </div>
                   
                    </div>	
					   <?php } ?>
                       
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ei_description" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_description']:'' ?>" name="ei_description" placeholder="Description">
                      </div>
                    </div>
                    
                    
                   
      
                </div>
<?php if((isset($eir_pleindetails))){}else{ ?>			  
                 <input type="hidden" id="ei_created_date" name="ei_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
<!--                  <input type="hidden" id="ei_numero" name="ei_numero" value="M<?//= $numeroeir_plein; ?>">-->
 <?php } ?>
      <div class="modal-footer">
		  
                 <input type="hidden" id="ei_trip_id" name="ei_trip_id" value="<?= $this->uri->segment(3); ?>">
                  <input type="hidden" id="ei_conteneur_id" name="ei_conteneur_id" value="<?= $this->uri->segment(4); ?>">		  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($eir_pleindetails))?'Modifier Eir Plein':'Ajouter Eir Plein' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



