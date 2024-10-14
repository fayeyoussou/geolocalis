    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1 class="m-0 text-dark">Gestion des Missions : <?php echo (isset($missiondetails))?'MODIFIER MISSION':'AJOUTER MISSION' ?>
           <?php if((isset($missiondetails))){ ?> N° <?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_numero']:'' ?>  <?php }else{?> N° M<?= $numeromission; }?> </h1>
          </div><!-- /.col -->
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($missiondetails))?'DEMANDE ANNULATION MISSION':'AJOUTER MISSION' ?></li>
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
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">VALIDATION</a>
              </li>
              
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				  
				  
       	     <form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'insertdemandeannulationmission_validation':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >

					  
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Véhicule<span class="form-required">*</span></label>
                     <select id="mi_vehicle_id" class="form-control selectized" name="mi_vehicle_id" disabled >
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>" ><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  

					  
					  
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input type="text" name="mi_quantite_carburant" id="mi_quantite_carburant"  value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_quantite_carburant']:'' ?>" class="form-control" placeholder="Quantité carburant" readonly>
                  </div>
               </div> 					  
					  
					  
<!----><div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
<input type="text" name="mi_quantite_carburant"   value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['pr_numero']:'' ?>" class="form-control" placeholder="Quantité carburant" readonly>					  
					  
<!-- END SELECT-->					  
					  
                  </div>
               </div>					  

					  
				  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
<input type="text" name="co_numero_conteneur"   value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['co_numero_conteneur']:'' ?>" class="form-control" placeholder="Quantité carburant" readonly>
                  </div>
               </div>						  
					  
					  
					  
					  
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="<?php echo date('Y-m-d'); ?>" readonly>

                      </div>
                    </div>
                       
					  
					  
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver_id" class="form-control selectized" name="mi_driver_id" disabled>
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_driver_id'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                
   
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" disabled>
                        <option value="">Sélectionner Remorque</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>" disabled><?php echo output($vehicleremorquelists['vr_type']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                      
			  
<!-- Debut Carte Carburant--> 
            
 
					  
                        

<!-- Debut Carte Carburant--> 

                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage_id" class="form-control selectized" name="mi_carte_peage_id" disabled>
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_peagelist as $key => $carte_peagelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_carte_peage_id'] == $carte_peagelists['cp_id']){ echo 'selected';} ?> value="<?php echo output($carte_peagelists['cp_id']) ?>" disabled><?php echo output($carte_peagelists['cp_name']).' - '. output($carte_peagelists['cp_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>             
                
<!--                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Prix au litre<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['s_fuelprice']:'655' ?>"  name="s_fuelprice" id="s_fuelprice" class="form-control" placeholder="<?php //echo "655"; ?>">
                  </div>
               </div> -->
					  
				<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant péage<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_peage_amount']:'' ?>" name="mi_carte_peage_amount" id="mi_carte_peage_amount" class="form-control" placeholder="Montant péage" readonly>
                  </div>
               </div>	  
                
<!-- Fin Carte Carburant-->                    
                
                 <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais AGS <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_frais_ags']:'' ?>" name="mi_frais_ags" id="mi_frais_ags" class="form-control" placeholder="Frais AGS " readonly>
                  </div>
               </div> 
                      
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Autres Frais <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_autre_frais']:'' ?>" name="mi_autre_frais" id="mi_autre_frais" class="form-control" placeholder="Autres Frais">
                  </div>
               </div>                       

                
   <!-- FIN MISSION-->
                  <?php //} ?> 
					  
					  
                     <?php //if(isset($customerdetails[0]['c_isactive'])) { ?>
                    

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="mi_description" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_description']:'' ?>" name="mi_description" placeholder="Description">
                      </div>
                    </div>
					 <br/> 
					 
                  
<!-- 	<div id="mi_bon_carburant_id">
	</div>-->	     
                </div>
			  
 <h2>Détails sur le motif d'annulation</h2>		
	 <div class="row">		  
			  <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Motif<span class="form-required">*</span></label>
                     <select id="mo_motif_id" class="form-control selectized" name="mo_motif_id" disabled>
                        <option value="">Sélectionner motif</option>
                        <?php  foreach ($trip_mission_type_annulationlist as $key => $type_annulationlists) { ?>
                        <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $type_annulationlists['ta_id']){ echo 'selected';} ?> value="<?php echo output($type_annulationlists['ta_id']) ?>"><?php echo output($type_annulationlists['ta_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
			  
			  <div class="col-sm-6 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description de la demande d'annulation</label>
                          <input type="text" class="form-control" id="mo_desc" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['mo_desc']:'' ?>" name="mo_desc" placeholder="Description" readonly>
                      </div>
                    </div>
		  </div>
			  
<?php //if((isset($missiondetails))){}else{ ?>			  
                 <!--<input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php //echo date('Y-m-d h:i:s'); ?>">-->
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['co_id']:'' ?>">
                   <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['pr_id']:'' ?>">
<!--                  <input type="hidden" id="mi_numero" name="mi_numero" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['co_id']:'' ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['co_id']:'' ?>">-->
<?php //} ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'VALIDATION':'Ajouter mission' ?></button>
      </div>
    </form>	
				  
<!--BEGIN LIST-->                      
		
		
<!--END LIST-->		

				  
				  
              </div>
				
				
				


<!-- BEGIN ADD-->				  
				  
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


<script>
	
$(document).ready(function(){
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_trip_id:mi_trip_id},
    success:function(data)
    {
     $('#mi_conteneur_id').html(data);
//     $('#city').html('<option value="">Select City-BAS</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
 //  $('#city').html('<option value="">Select City else</option>');
  }
 });

/* BEGIN LIEU RESTITUTION*/	
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_lieu_restitution",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_trip_id:mi_trip_id},
    success:function(data)
    {
     $('#mi_lieu_restitution_id').html(data);
//     $('#city').html('<option value="">Select City-BAS</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
 //  $('#city').html('<option value="">Select City else</option>');
  }
 });	
/* END LIEU RESTITUTION*/	
	
	
/*BEGIN AJAX VEHICULE*/	
$('#mi_vehicle_id').change(function(){
  var mi_vehicle_id = $('#mi_vehicle_id').val();
  if(mi_vehicle_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_vehicle_id:mi_vehicle_id},
    success:function(data)
    {
     $('#mi_bon_carburant_id').html(data);
//     $('#city').html('<option value="">Select City-BAS</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
 //  $('#city').html('<option value="">Select City else</option>');
  }
 });	
/*END AJAX VEHICULE*/	
	
/*BEGIN AJAX VEHICULE SUR QUANTITE*/	
$('#mi_bon_carburant_id').change(function(){
  var mi_bon_carburant_id = $('#mi_bon_carburant_id').val();
  if(mi_bon_carburant_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_quantite",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_bon_carburant_id:mi_bon_carburant_id},
    success:function(data)
    {
     $('#mi_quantite_carburant').html(data);
//     $('#city').html('<option value="">Select City-BAS</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
 //  $('#city').html('<option value="">Select City else</option>');
  }
 });	
/*END AJAX VEHICULE SUR QUANTITE*/	

 
});	
</script>


