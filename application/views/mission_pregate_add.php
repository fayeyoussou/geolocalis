    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?> <?//= $numeromission; ?>
				
				<?php if((isset($missiondetails))){ ?> N° <?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_numero']:'' ?>  <?php }else{?> N° M<?= $numeromission; }?> 
				
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >

                   <!--   <div class="col-sm-6 col-md-3">
                          <label class="form-label">Facture<span class="form-required">*</span></label>
                    <div class="form-group">
                         <select id="mi_trip"  class="form-control"  name="mi_trip" >
                        <option value="">Selectionner Facture</option>
                        <?php//  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php// if((isset($missiondetails)) && $missiondetails[0]['mi_trip'] == $vechiclelists['mi_id']){ echo 'selected';} ?> value="<?php //echo output($vechiclelists['mi_id']) ?>"><?php //echo output($vechiclelists['mi_num_facture'])); ?></option>
                        <?php  //} ?>
                     </select>
                      </div>
                    </div>-->
                      
                      
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Facture<span class="form-required">*</span></label>
                     <select id="mi_trip"  class="form-control selectized"  name="mi_trip" >
                        <option value="">Sélectionner Facture</option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_trip'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                      
                      
           <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Conteneur<span class="form-required">*</span></label>
                     <select id="mi_conteneur"  class="form-control selectized"  name="mi_conteneur" >
                        <option value="">Sélectionner Conteneur</option>
                        <?php  foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_conteneur'] == $conteneurlists['co_id']){ echo 'selected';} ?> value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                      
                   
                      
                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Statut<span class="form-required">*</span></label>
                         <select name="mi_statut" id="mi_statut" class="form-control">
                        <option value="">Selectionner le statut</option>
                             
                      <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_statut'] =='nodemarre'){ echo 'selected';} ?> value="nodemarre">No démarré</option>
                      <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_statut'] == 'encours'){ echo 'selected';} ?> value="encours">En cours</option>
                      <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_statut'] =='termine'){ echo 'selected';} ?> value="termine">Terminé</option>
                      <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_statut'] =='annule'){ echo 'selected';} ?> value="annule">Annulé</option>                             
                      </select>
                      </div>
                    </div>-->
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="Date mission">

                      </div>
                    </div>
                      
                <!--DEBUT Date line-->                
<!--                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date line <span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_line']:'' ?>" name="mi_date_line" value="" class="form-control datepicker" placeholder="Date line">
                  </div>
               </div>  -->              
                <!-- FIN Date line-->                          
   
                      
   <!-- DEBUT MISSION-->
       <?php //if((isset($missiondetails))){ ?> 

                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver" class="form-control selectized" name="mi_driver">
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_driver'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                

              
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Véhicule<span class="form-required">*</span></label>
                     <select id="mi_vehicle" class="form-control selectized" name="mi_vehicle" >
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque Véhicule<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque" class="form-control selectized" name="mi_vehicle_remorque" >
                        <option value="">Sélectionner Remorque Véhicule</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_name']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                      
  
					  
<!-- Debut Carte Carburant--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carburant<span class="form-required">*</span></label>
                     <select id="mi_carte_carburant" class="form-control selectized"  name="mi_carte_carburant">
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_carburantlist as $key => $carte_carburantlists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_carte_carburant'] == $carte_carburantlists['cc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantlists['cc_id']) ?>"><?php echo output($carte_carburantlists['cc_name']).' - '. output($carte_carburantlists['cc_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant carburant <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_carburant_amount']:'' ?>" name="mi_carte_carburant_amount" id="mi_carte_carburant_amount" class="form-control" placeholder="Montant carburant">
                  </div>
               </div>                
  
                
<!--            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_carburant_quantite']:'' ?>" name="mi_carte_carburant_quantite" id="mi_carte_carburant_quantite" class="form-control" placeholder="Montant carburant">
                  </div>
               </div>-->
                
<!-- Fin Carte Carburant-->   

<!-- Debut Carte Carburant--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage" class="form-control selectized" name="mi_carte_peage">
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_peagelist as $key => $carte_peagelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_carte_peage'] == $carte_peagelists['cp_id']){ echo 'selected';} ?> value="<?php echo output($carte_peagelists['cp_id']) ?>"><?php echo output($carte_peagelists['cp_name']).' - '. output($carte_peagelists['cp_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant <span class="form-required">*</span></label>
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
                    
<!--              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque Véhicule<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque"  class="form-control"  name="mi_vehicle_remorque" >
                        <option value="">Sélectionner Remorque</option>
                        <?php  //foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php //echo output($vehicleremorquelists['vr_id']) ?>"><?php //echo output($vehicleremorquelists['vr_name']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  //} ?>
                     </select>
                  </div>
               </div>               
 
   -->                

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
                          <input type="text" class="form-control" id="mi_desc" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_desc']:'' ?>" name="mi_desc" placeholder="Description">
                      </div>
                    </div>
                    
                    
                   
      
                </div>
<?php if((isset($missiondetails))){}else{ ?>			  
                 <input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
 <?php } ?>
                   <input type="text" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
			  <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



