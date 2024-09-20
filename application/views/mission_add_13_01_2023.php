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
              <li class="breadcrumb-item active"><?php echo (isset($missiondetails))?'MODIFIER MISSION':'AJOUTER MISSION' ?></li>
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
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">AJOUTER MISSION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
              </li>
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				  
				  
       	     	
				  
<!--BEGIN LIST-->                      
<form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >

					  
					  
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

					  
				  
<!--				<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Bon carburant<span class="form-required">*</span></label>
                     <select id="mi_bon_carburant_id" name="mi_bon_carburant_id" class="form-control input-lg">
                        <option value="">Sélectionner le Bon carburant</option>

                     </select>
                  </div>
               </div>-->
					  
					  
<!--				<div id="mi_bon_carburant_id">

               </div>-->					  
					  
					  
					  
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input type="text" name="mi_quantite_carburant" id="mi_quantite_carburant"  value=""<?php //echo 'value="'.$row_quantite->bc_restant.'"' ?> class="form-control" placeholder="Quantité carburant">
                  </div>
               </div> 					  
					  
					  
<!----><div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="mi_trip_id" id="mi_trip_id" class="form-control selectized">
    <option value="">Selectionner Pregate</option>
    <?php
    foreach($pregate as $row)
    {
     echo '<option value="'.$row->pr_trip_id.'">'.$row->pr_id.''.$row->pr_numero.'</option>';
    }
    ?>
   </select>					  
<!-- END SELECT-->					  
					  
                  </div>
               </div>					  

					  
				  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
                     <select id="mi_conteneur_id" name="mi_conteneur_id" class="form-control input-lg">
                        <option value="">Sélectionner le Conteneur</option>

                     </select>
                  </div>
               </div>						  
					  
	<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Lieu de restitution<span class="form-required">*</span></label>
                     <select id="mi_lieu_restitution_id" name="mi_lieu_restitution_id" class="form-control input-lg">
                        <option value="">Sélectionner le Lieu de restitution</option>

                     </select>
                  </div>
               </div>					  
					  
					  
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="<?php echo date('Y-m-d'); ?>">

                      </div>
                    </div>
                       
					  
					  
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
                     <label class="form-label">Remorque<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" >
                        <option value="">Sélectionner Remorque</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_type']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                      
			  
<!-- Debut Carte Carburant--> 
            
 
					  
                        

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
                
<!--                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Prix au litre<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($missiondetails)) ? $missiondetails[0]['s_fuelprice']:'655' ?>"  name="s_fuelprice" id="s_fuelprice" class="form-control" placeholder="<?php //echo "655"; ?>">
                  </div>
               </div> -->
					  
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

                
   <!-- FIN MISSION-->
                  <?php //} ?> 
					  
					  
                     <?php //if(isset($customerdetails[0]['c_isactive'])) { ?>
                    

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="mi_description" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_description']:'' ?>" name="mi_description" placeholder="Description">
                      </div>
                    </div>
                  
 	<div id="mi_bon_carburant_id">
	</div>	     
                </div>
<?php if((isset($missiondetails))){}else{ ?>			  
                 <input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
      </div>
    </form>		
		
<!--END LIST-->		

				  
				  
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
				  

<!--BEGIN LIST-->				  
<div class="table-responsive">
          <?php if(!empty($mission)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Lieu de restitution</th>
                          <th>Chauffeur</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($missions['t_num_facture']); ?></td>
                            <td> <?php echo output($missions['mi_numero']); ?></td>
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php echo output($missions['v_registration_no']); ?></td>

                           <td><?php echo output($missions['pr_numero']); ?></td>
                         <td><?php echo output($missions['co_numero_conteneur']); ?></td>
                         <td><?php echo output($missions['clr_name']); ?></td>
                         <td><?php echo output($missions['d_name']); ?></td>

                          <?php 
							   
						$mi_annulation=''; 
					    $mi_annulation =  $missions['mi_annulation']; 							   
							   
							   if(userpermission('lr_mi_edit')) { ?>
                              <td>
								  <?php if($mi_annulation=="annule"){?>
                            <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a><?php }?>
							<?php  if(userpermission('lr_mi_add')) { ?>	  
								<a class="icon" href="<?php echo base_url(); ?>mission/mission_details/<?php echo output($missions['mi_id']); ?>">
								  <i class="fa fa-eye"></i>
								</a>
							<?php } ?>
								  
								  <?php if(userpermission('lr_mi_cancel')) { ?>								   
                <?php //$mi_annulation=''; $mi_annulation =  $missions['mi_annulation']; //echo $t_annulation;
                        if($mi_annulation=="non_annule") { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Annulation" class="icon" class="icon" href="<?php echo base_url(); ?>mission/mission_annulation/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-ban text-green"></i>
                           </a>                                    
                   <?php } else { ?>  
<a href="<?php echo base_url(); ?>mission/mission_demande_annulation/<?php echo output($missions['mi_id']); ?>" class="btn btn-sm btn-danger <?//= ($incomexpensedetails['ie_amount'] - $totalpaidamt==0)?'disabled':'' ?>" >Demander validation</a>								  
 <i class="fa fa-ban text-danger"></i>
                                                             
                     <?php }  // fin controle?>  
                     <?php }  // fin controle?>  
								  
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucune mission trouvée !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>				  
<!--END LIST-->				  
				  
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


