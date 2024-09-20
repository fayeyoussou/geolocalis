    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Modifier ristourne':'Ajouter ristourne' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails))?'Modifier ristourne':'Ajouter ristourne' ?> </li>      
                
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="tab-pane" id="banque">

<!-- debut sous tab BANQUE-->
<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
<!--                  <li class="pt-2 px-3"><h3 class="card-title">Card Title</h3></li>
-->                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">CAISSE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">BANQUE  </a>
                  </li>
				<li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-journal-tab" data-toggle="pill" href="#custom-tabs-one-journal" role="tab" aria-controls="custom-tabs-one-journal" aria-selected="false">JOURNAL</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

<!-- DEBUT BANQUE ENTREE-->
<section class="content">
      <div class="container-fluid">
       	     <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Ristourne enregistrée sous le numéro Caisse N° C<?= $numero_compteurcaisse; ?></label>
                          
                      </div>
                    </div>
             </div>
    </section>					  
<!-- FIN BANQUE ENTREE-->
					  
					  
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_banque_sortie_ristourne'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

					  <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Ristourne enregistrée sous le numéro Banque N° B<?= $numero_compteurbanque; ?></label>
                          
                      </div>
                    </div>
					  
			 
				  
	<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Transitaire<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="ie_transitaire_id" id="mi_trip_id" class="form-control selectized">
    <option value="">Selectionner Transitaire</option>
	   
<?php if(isset($incomexpensedetails)) { foreach($pregate as $row) { ?>
                          <option <?= (isset($incomexpensedetails[0]['ei_pregate_id']) && $incomexpensedetails[0]['ei_pregate_id'] == $row['pr_trip_id'])?'selected':''?> value="<?= $row['pr_trip_id'] ?>"><?= $row['pr_numero'] ?></option> 
                          <?php } } else {
	
 /* foreach($pregate as $row)
    { echo "dd";
     echo '<option  value="'.$row['pr_trip_id'].'">'.$row['pr_numero'].'</option>';
    }	
	}*/     foreach($transitairelist as $row)
    {
     echo '<option value="'.$row->tra_id.'">'.$row->tra_name.'</option>';
    }
} ?>
   </select>				  
<!-- END SELECT-->					  
					  
                  </div>
               </div>	  
					  
<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Facture<span class="form-required">*</span></label>
                    <!-- <select id="mi_conteneur_id" name="ei_conteneur_id" class="form-control input-lg">-->
						 
					<select id="mi_conteneur_id" name="ie_trip_id[]" multiple class="select2" required >						 
						 
                        <option value="">Sélectionner la Facture</option>
<?php if(isset($eir_pleindetails)) { foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option  
								<?= in_array($conteneurlists['co_id'], explode(',', $eir_pleindetails[0]['ei_conteneur_id'])) ? 'selected' : ''; ?>
								value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } } ?>
                     </select>
                  </div>
               </div>					  
					
					  
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Montant">
                      </div>
                    </div> 
					  
					  
<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro du chéque<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro du chéque">
                      </div>
                    </div>					  

				<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Banque émettrice<span class="form-required">*</span></label>
                     <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="">Sélectionner Banque émettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>	
				  
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date de reception<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date de reception">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description" >
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "BANQUE"; ?>">
                   <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "expense"; ?>"><!--SORITE-->
                 <!--<input type="hidden" id="ie_type" name="ie_type" value="<?php //echo "expense"; ?>">--><!--SORITE-->
                  <input type="hidden" id="ie_espece_cheque" name="ie_espece_cheque" value="<?php echo "CHEQUE"; ?>"><!--ENTREE-->
			        <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="B<?= $numero_compteurbanque; ?>">			  

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter BANQUE DEPENSE' ?></button>
      </div>
    </form>
             </div>
    </section>			  
                  </div>

<!-- DEBUT JOURNAL-->					  
					  
<div class="tab-pane fade" id="custom-tabs-one-journal" role="tabpanel" aria-labelledby="custom-tabs-one-journal-tab">

<section class="content">
   <div class="container-fluid">
       <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php echo base_url();?>incomexpense/journalbanque">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">

                              

                              <!-- Debut transitaire-->

                              

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="incomeexpense_from" name="incomeexpense_from" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" placeholder="Date début">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="incomeexpense_to" name="incomeexpense_to" value="<?php echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" placeholder="Date fin">

                      </div>
                    </div>				
				
			
                              


									
				
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Journal</button>
      </div>			 
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php /*if(!empty($incomexpense)){ 
                $CHEQUE = $ESPECE = 0;
                foreach ($incomexpense as $item) {
                    if($item['ie_type']=='CHEQUE') {
                      $CHEQUE += $item['ie_amount'];
                    }
                     if($item['ie_type']=='ESPECE') {
                      $ESPECE += $item['ie_amount'];
                    }
                }
                $SOLDE = $CHEQUE + $ESPECE;*/
            ?>
          
                 <table  class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
<!---->                   <th>Numéro Banque</th>
                          <th>Date</th>
<!--                          <th>Numéro réglement</th>
-->                          <th>Montant</th>
                          <th>Numéro du bordereau</th>
<!--                          <th>Libellé opérations</th>
-->                          <th>Type</th>
<!--                          <th>Emettrice</th>
-->                          <th>Numéro du chéque</th>
<!--                          <th>Date</th>
                          <th>Description</th>
-->                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
<?php if(!empty($incomexpense)){ ?>
                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
<!---->             <td><?php echo output($incomexpenses['ie_numero_enregistrement']); ?></td>
                        <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                        <td><?php echo output($incomexpenses['ie_numero']); ?></td>
                         <td><?php echo output($incomexpenses['ie_amount']); ?></td>
 <?php if($incomexpenses['ie_banque_receptrice_id']!=0) {echo output($incomexpenses['banque_receptrice']->ieb_name); }?></td>
                        <td> <span class="badge <?php echo ($incomexpenses['ie_banque_emettrice_id']!=0) ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($incomexpenses['ie_banque_emettrice_id']!=0) ? 'CHEQUE' : 'ESPECE'; ?></span><?php //if($incomexpenses['ie_type']=='expense') echo output($incomexpenses['ie_amount']); ?></td>
<!--                           <td>   </td>
                         <td>   </td>-->
                        
							<td>
 <?php //$t_validation=''; if(userpermission('lr_trips_validate')) { ?>                                  
<?php  //$t_validation =  $facturelists['t_validation'];?>                           
                                   <?php //if($t_validation=="non_valide") { ?> 
                            <a class="icon" href="#">
                              <i class="fa fa-edit"></i>
                            </a>
<?php //}?>
<?php //}?><!--fin permission-->
								   
						<?php //if(userpermission('lr_trips_detail')) { ?>		   
<!--<a class="icon" href="<?php //echo base_url(); ?>incomexpense/details_banque/<?php //echo output($incomexpenses['ie_id']); ?>">--> 
								
<!----><a class="icon" href="<?php echo base_url(); ?>incomexpense/details/<?php echo output($incomexpenses['ie_id']); ?>">                           								
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php //} ?>		   
 <?php if($incomexpenses['ie_banque_emettrice_id']!=0){?>                                  
 
                           <i class="fa fa-window-close text-blue"></i>
                           
 <?php } ?>								
                          </td>
							
					</tr>
                        <?php } ?>
 
                        <?php } ?>
					 
					 </tbody>
                     
<!--                      <thead>
                        <tr>
                          <th class="w-1"></th>
                         <th></th>
                          <th>Total</th>
                          <th><?//= $income; ?></th>
                          <th><?//= $expense; ?></th>
                          <th></th>
                        </tr>
                      </thead> -->                    
                     
                    </table>
                   <?php //} ?>
        </div>
      </div>
   </div>
</section>					  
	  
                  </div>						  
<!-- FIN JOURNAL-->					  
				  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>					  
<!--fin sous tab BANQUE-->					  
					  
                  </div>
    <!-- /.content -->

		
		

<script>
	
$(document).ready(function(){
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
  //   url:"<?php echo base_url(); ?>mission/fetch_conteneur",
   url:"<?php echo base_url(); ?>incomexpense/fetch_facture_transitaire",
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
		
