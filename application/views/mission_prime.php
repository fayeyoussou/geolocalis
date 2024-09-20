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
                <a class="nav-link active" id="custom-tabs-one-garage-tab" data-toggle="pill" href="#custom-tabs-one-garage" role="tab" aria-controls="custom-tabs-one-garage" aria-selected="true">LISTE DES PRIMES NON PAYEES</a>
              </li>	
				
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">AJOUTER LA DEMANDE DE PRIME N°: MP<?= $numerobon_prime_payments; ?></a>
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
  <!-- </div>-->
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

<section class="content">
   <div class="container-fluid">
       <form method="post" id="fuel_carte_carburant_add" class="card" action="<?php echo base_url();?>mission/insert_paiementprime">  
          <div class="card-body"> 
			  
                  <div class="row">
                   <input type="hidden" name="mpp_id" id="mpp_id" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['mpp_id']:'' ?>" >

	
<!-- BEGIN SELECT-->
		<!--<div class="col-sm-3 col-md-3">	-->			  

<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date de la demande de paye<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="mpp_date_demande" name="mpp_date_demande" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['mpp_date_demande']:'' ?>" placeholder="Date de la demande de paye">

                      </div>
                    </div>
					  
					  
<!--</div>-->				
<!-- END SELECT-->					  
					  
<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Période: Date début<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" value="<?php echo isset($_POST['mpp_date_debut']) ? $_POST['mpp_date_debut'] : ''; ?>" id="mpp_date_debut" name="mpp_date_debut" value="" placeholder="Date début" required="true">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Période: Date fin<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" value="<?php echo isset($_POST['mpp_date_fin']) ? $_POST['mpp_date_fin'] : ''; ?>" id="mpp_date_fin" name="mpp_date_fin" value="" placeholder="Date fin" required="true">

                      </div>
                    </div>		
				
			
<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mpp_driver_id" class="form-control selectized" name="mpp_driver_id" required>
                       <option value=0>Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div> 
	
					  
					  
					  
       
                     </div>
                   
 <!--BEGIN -->
			  
			  
			  

			  
							  
					  
<!--END -->	                  
      
                </div>
				 <!--<input type="hidden" id="mpp_date_demande" name="mpp_date_demande" value="<?php //echo date('Y-m-d'); ?>">-->                
				  <input type="hidden" id="mpp_created_date" name="mpp_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">                
                  <input type="hidden" id="mpp_numero" name="mpp_numero" value="MP<?= $numerobon_prime_payments; ?>">
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_carte_carburantdetails))?'Modifier paiement carburant':'Ajouter demande de paiement de prime' ?> N° MP<?= $numerobon_prime_payments; ?></button>
      </div>
    </form>
  
<!--LISTE JOURNAL-->
<div class="card">
        <div class="card-body p-0">
            <?php if(!empty($mission_prime_tab_paiement_list)){ 
             ?>
                   <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>N° </th>
                          <th>Validation</th>
                          <th>Création</th>
                          <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission_prime_tab_paiement_list as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($missions['mpp_date_demande']); ?></td>
							<td> <?php echo output($missions['mpp_numero']); ?></td>
							
							<td>
								<span class="badge <?php echo ($missions['mpp_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missions['mpp_validation']=='1') ? 'Validé' : 'Non validé'; ?></td>
							
                          <td> <?php echo output($missions['mpp_created_date']); ?></td>

                          <td>
<!--DEBUT MODIFICATION & VALIDATION-->
								   
 <?php $mpp_validation=0; 
		if(userpermission('lr_mi_prime_validation')) { ?>                                  
<?php  $mpp_validation =  $missions['mpp_validation'];?>                  
                 <?php if($mpp_validation==0) { ?> 
                            <a class="icon" href="<?php echo base_url(); ?>mission/editmissionprime/<?php echo output($missions['mpp_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
				<?php }?>				   
<?php }?><!--fin permission-->
<!--FIN MODIFICATION & VALIDATION-->							  
<!--DEBUT DETAIL-->	
						<?php if(userpermission('lr_mi_prime_detail')) { ?>		   
                            <a data-toggle="tooltip" data-placement="top" title="Détail" class="icon" href="<?php echo base_url(); ?>mission/detailmissionprime/<?php echo output($missions['mpp_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php } ?>								  
<!--FIN DETAIL-->							  
							  
<!--DEBUT VALIDATION-->	
<?php 
		if(userpermission('lr_mi_prime_validation')) { ?>							  
 <?php //$t_validation=''; $t_validation =  $facturelists['t_validation']; //echo $t_annulation;
                        if($mpp_validation==0) { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php echo base_url(); ?>mission/validationprimemission/<?php echo output($missions['mpp_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?> 
							  
                     <?php }  // fin controle VALIDATION?>  							  
							  
<!--FIN VALIDATION-->
							  
<!--DEBUT PDF-->
 <a data-toggle="tooltip" data-placement="top" title="Générer la facture PDF" class="icon" href="<?php echo base_url(); ?>mission/generationmissionprime_pdf/<?php echo output($missions['mpp_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a>							  
<!--FIN PDF-->							  
							  
							
							</td>							   
						
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

				  
				  
              </div>

            </div>
			  
			  
          </div>
			
			
  <!--      </div>
	
	
      </div>-->		
		
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


