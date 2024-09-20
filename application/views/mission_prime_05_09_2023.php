    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0 text-dark">Gestion des Primes des Missions </h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($missiondetails))?'MODIFIER':'AJOUTER' ?></li>
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
                <a class="nav-link active" id="custom-tabs-one-garage-tab" data-toggle="pill" href="#custom-tabs-one-garage" role="tab" aria-controls="custom-tabs-one-garage" aria-selected="true">PRIME</a>
              </li>	
				
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">PAIEMENT</a>
              </li>
              
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
 
<div class="tab-pane fade show active" id="custom-tabs-one-garage" role="tabpanel" aria-labelledby="custom-tabs-one-garage-tab">
				  
				  
       	     	
				  
<!--BEGIN LIST-->                      
<form method="post" id="mission_report" class="card basicvalidation" action="<?php echo base_url();?>mission/primemission">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">


				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" value="<?php echo isset($_POST['from']) ? $_POST['from'] : ''; ?>" id="from" name="from" value="" placeholder="Date début" required="true">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" value="<?php echo isset($_POST['to']) ? $_POST['to'] : ''; ?>" id="to" name="to" value="" placeholder="Date fin" required="true">

                      </div>
                    </div>		
				
			
<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="driver" class="form-control selectized" name="driver" required>
                       <option value="all">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div> 

				
               <input type="hidden" id="mission_report_prime" name="mission_report_prime" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Journal</button>
      </div>			 
         </div>
   </div>
   </form>		
		
<!--END LIST-->		

<!--BEGIN LIST-->
<div class="table-responsive">
          <?php if(!empty($mission_prime)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° mission</th>
                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Prime</th>
                          <th>Type de mission</th>
                          <th>Chauffeur</th>
                          <th>Profil</th>
                          <th>Création</th>

                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission_prime as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            
							<td> <?php echo output($missions['mp_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mp_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mp_amount']); ?></td>
							
                         <td><?= (isset($missions['mission']->mi_type_mission))?$missions['mission']->mi_type_mission:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                        <td><?= (isset($missions['conducteur']->d_profil))?$missions['conducteur']->d_profil:'<span class="badge badge-danger">Non renseigné</span>'; ?>							
							
                          <td> <?php echo output($missions['mp_created_date']); ?></td>
							


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
				  
              </div>				
<!--FIN GARAGE-->
				
				
				
<!--BEGIN PERTE-->
<!--<div class="tab-pane fade show" id="custom-tabs-one-home-perte" role="tabpanel" aria-labelledby="custom-tabs-one-home-perte-tab">

				  
				  
              </div>-->				
<!--END PERTE-->				
				
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

<!-- BEGIN ADD-->				  
<section class="content">
   <div class="container-fluid">
       <form method="post" id="mission_report" class="card basicvalidation" action="<?php echo base_url();?>mission/addmission">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">


				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" value="<?php echo isset($_POST['from']) ? $_POST['from'] : ''; ?>" id="from" name="from" value="" placeholder="Date début" required="true">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin2<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" value="<?php echo isset($_POST['to']) ? $_POST['to'] : ''; ?>" id="to" name="to" value="" placeholder="Date fin" required="true">

                      </div>
                    </div>		
				
			
<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Type de mission</label>
                        <select id="type_mission" name="type_mission" class="form-control " required="">
                         <option value="all">Selectionner toutes les missions</option> 
                          <option <?php echo (isset($_POST['type_mission']) && ($_POST['type_mission'] == "LIVRAISON")) ? 'selected':'' ?> value="LIVRAISON">LIVRAISON</option> 
                          <option <?php echo (isset($_POST['type_mission']) && ($_POST['type_mission'] == "MISE_A_TERRE")) ? 'selected':'' ?> value="MISE_A_TERRE">MISE A TERRE</option>     
							<option <?php echo (isset($_POST['type_mission']) && ($_POST['type_mission'] == "DECROCHAGE")) ? 'selected':'' ?> value="DECROCHAGE">DECROCHAGE</option> 							
                          <option <?php echo (isset($_POST['type_mission']) && ($_POST['type_mission'] == "GARAGE")) ? 'selected':'' ?> value="GARAGE">GARAGE</option> 
                          <option <?php echo (isset($_POST['type_mission']) && ($_POST['type_mission'] == "POSITIONNEMENT")) ? 'selected':'' ?> value="POSITIONNEMENT">POSITIONNEMENT</option> 
                          <option <?php echo (isset($_POST['type_mission']) && ($_POST['type_mission'] == "RESTITUTION_VIDE")) ? 'selected':'' ?> value="RESTITUTION_VIDE">RESTITUTION VIDE</option> 
                           
                           
                        </select>

                      </div>
                    </div> 

				
               <input type="hidden" id="mission_report" name="mission_report" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Journal</button>
      </div>			 
         </div>
   </div>
   </form>
  
<!--LISTE JOURNAL-->
<div class="card">
        <div class="card-body p-0">
            <?php if(!empty($journal_mission)){ 
             ?>
                   <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
<!--                          <th>N° transaction</th>
-->                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Type mission</th>
                          <th>Chauffeur</th>
                          <th>Création</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($journal_mission as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php //echo output($missions['t_num_facture']); ?><?php //echo ucfirst($missions['facture']->t_num_facture); ?><?= (isset($missions['facture']->t_num_facture))?$missions['facture']->t_num_facture:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							<td> <?php echo output($missions['mi_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>

                           <td><?php //echo output($missions['pr_numero']); ?><?php //echo ucfirst($missions['pregate']->pr_numero); ?><?= (isset($missions['pregate']->pr_numero))?$missions['pregate']->pr_numero:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td>
							<?= join_multi_select($missions['mi_conteneur_id'], 'trip_conteneur', 'co_id', 'co_numero_conteneur'); ?>
							 
							
							 
													   

							
							</td>
                         <td><?php //echo output($missions['type_transport']->ta_name); ?>
							 <?= (isset($missions['mi_type_mission']))?$missions['mi_type_mission']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

                          <?php 
							   
						$mi_annulation=''; 
					    $mi_annulation =  $missions['mi_annulation']; 							   
							   
							   if(userpermission('lr_mi_edit')) { ?>
                              <td>
								  <?php if($mi_annulation=="annule"){?>
								  <?php if($mi_validation==0){?>
                            <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a><?php } }?>
								  
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
								  
                      <?php if(userpermission('lr_mi_edit')) { ?>
                       <?php if($mi_validation==0){?>
                           <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                      
                        <?php } } ?>								  
								  
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                     <?php }  ?>
        </div>
      </div>	
<!--END LIST JOURNAL-->	
	
	
   </div>
				  

<!--BEGIN LIST-->				  
				  
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
	
 

/*BEGIN  */
$('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur",
    method:"POST",
    data:{mi_trip_id:mi_trip_id},
    success:function(data)
    {
     $('#mi_conteneur_id').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });

/*BEGIN TYPE TRANSPORT*/
	
/*BEGIN AJAX VEHICULE*/	
$('#mi_vehicle_id').change(function(){
  var mi_vehicle_id = $('#mi_vehicle_id').val();
  if(mi_vehicle_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant",
    method:"POST",
    data:{mi_vehicle_id:mi_vehicle_id},
    success:function(data)
    {
     $('#mi_bon_carburant_id').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });	
/*END AJAX VEHICULE*/
	
/*END  DECROCHAGE*/	
	

/*BEGIN LIVRAISON*/
$('#mi_trip_id_livraison').change(function(){
  var mi_trip_id_livraison = $('#mi_trip_id_livraison').val();
  if(mi_trip_id_livraison != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur_livraison",
    method:"POST",
    data:{mi_trip_id_livraison:mi_trip_id_livraison},
    success:function(data)
    {
     $('#mi_conteneur_id_livraison').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });

/*BEGIN TYPE TRANSPORT*/
	
/*BEGIN AJAX VEHICULE*/	
$('#mi_vehicle_id_livraison').change(function(){
  var mi_vehicle_id_livraison = $('#mi_vehicle_id_livraison').val();
  if(mi_vehicle_id_livraison != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_livraison",
    method:"POST",
    data:{mi_vehicle_id_livraison:mi_vehicle_id_livraison},
    success:function(data)
    {
     $('#mi_bon_carburant_id_livraison').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });	
/*END AJAX VEHICULE*/
	
/*BEGIN DECROCHAGE*/

$('#mi_trip_id_decrochage').change(function(){
  var mi_trip_id_decrochage = $('#mi_trip_id_decrochage').val();
  if(mi_trip_id_decrochage != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur_decrochage",
    method:"POST",
    data:{mi_trip_id_decrochage:mi_trip_id_decrochage},
    success:function(data)
    {
     $('#mi_conteneur_id_decrochage').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });

$('#mi_vehicle_id_decrochage').change(function(){
  var mi_vehicle_id_decrochage = $('#mi_vehicle_id_decrochage').val();
  if(mi_vehicle_id_decrochage != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_decrochage",
    method:"POST",
    data:{mi_vehicle_id_decrochage:mi_vehicle_id_decrochage},
    success:function(data)
    {
     $('#mi_bon_carburant_id_decrochage').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });	
/*END DECROCHAGE*/
	
	
/*BEGIN MISE A TERRE*/
$('#mi_trip_id_mise_terre').change(function(){
  var mi_trip_id_mise_terre = $('#mi_trip_id_mise_terre').val();
  if(mi_trip_id_mise_terre != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur_mise_terre",
    method:"POST",
    data:{mi_trip_id_mise_terre:mi_trip_id_mise_terre},
    success:function(data)
    {
     $('#mi_conteneur_id_mise_terre').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });

/*BEGIN TYPE TRANSPORT*/
	
/*BEGIN AJAX VEHICULE*/	
$('#mi_vehicle_id_mise_terre').change(function(){
  var mi_vehicle_id_mise_terre = $('#mi_vehicle_id_mise_terre').val();
  if(mi_vehicle_id_mise_terre != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_mise_terre",
    method:"POST",
    data:{mi_vehicle_id_mise_terre:mi_vehicle_id_mise_terre},
    success:function(data)
    {
     $('#mi_bon_carburant_id_mise_terre').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });	
/*END AJAX VEHICULE*/
	
/*END MISE A TERRE*/	
	

/*BEGIN GARAGE*/
$('#mi_trip_id_garage').change(function(){
  var mi_trip_id_garage = $('#mi_trip_id_garage').val();
  if(mi_trip_id_garage != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur_garage",
    method:"POST",
    data:{mi_trip_id_garage:mi_trip_id_garage},
    success:function(data)
    {
     $('#mi_conteneur_id_garage').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });

/*BEGIN TYPE TRANSPORT*/
	
/*BEGIN AJAX VEHICULE*/	
$('#mi_vehicle_id_garage').change(function(){
  var mi_vehicle_id_garage = $('#mi_vehicle_id_garage').val();
  if(mi_vehicle_id_garage != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_garage",
    method:"POST",
    data:{mi_vehicle_id_garage:mi_vehicle_id_garage},
    success:function(data)
    {
     $('#mi_bon_carburant_id_garage').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });	
/*END AJAX VEHICULE*/	
/*END GARAGE*/	
	
	
/*BEGIN SUITE*/
$('#mi_trip_id_suite').change(function(){
  var mi_trip_id_suite = $('#mi_trip_id_suite').val();
  if(mi_trip_id_suite != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur_suite",
    method:"POST",
    data:{mi_trip_id_suite:mi_trip_id_suite},
    success:function(data)
    {
     $('#mi_conteneur_id_suite').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });

/*BEGIN TYPE TRANSPORT*/
	
/*BEGIN AJAX VEHICULE*/	
$('#mi_vehicle_id_suite').change(function(){
  var mi_vehicle_id_suite = $('#mi_vehicle_id_suite').val();
  if(mi_vehicle_id_suite != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_suite",
    method:"POST",
    data:{mi_vehicle_id_suite:mi_vehicle_id_suite},
    success:function(data)
    {
     $('#mi_bon_carburant_id_suite').html(data);
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
  }
 });	

	
});	
</script>


