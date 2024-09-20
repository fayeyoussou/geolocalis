    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php //echo (isset($fuel_carte_carburantdetails))?'Modifier un bon de carburant':'Ajouter un bon de carburant' ?>
<?php echo (isset($fuel_carte_carburantdetails))?'MODIFIER BON CARBURANT':'AJOUTER BON CARBURANT' ?>
           <?php if((isset($fuel_carte_carburantdetails))){ ?> N° <?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['bc_numero']:'' ?>  <?php }else{?> N° BC<?= $numerobon_carburant; }?>				
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Bon carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier bon de carburant':'Ajouter bon de carburant' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
		
<!--BEGIN NAV-->		
<div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier bon de carburant':'AJOUTER UN BON DE CARBURANT' ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-paiement-tab" data-toggle="pill" href="#custom-tabs-one-paiement" role="tab" aria-controls="custom-tabs-one-paiement" aria-selected="false">DEMANDE DE PAIEMENT</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<!-- FORM-->
<form method="post" id="fuel_bon_carburant" class="card" action="<?php echo base_url();?>fuel_bon_carburant/<?php echo (isset($fuel_bon_carburantdetails))?'updatefuel_bon_carburant':'insertfuel_bon_carburant'; ?>">

                  <div class="row">
                   <input type="hidden" name="bc_id" id="bc_id" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_id']:'' ?>" >
					  
					  
<div class="col-sm-6 col-md-3">
                          <label class="form-label">Station service<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="bc_compagnie_id" required="true" class="form-control selectized"  name="bc_compagnie_id" >
                        <option value="">Selectionner la station</option>
                        <?php  foreach ($fuel_compagnielist as $key => $fuel_compagnielists) { ?>
                        <option <?php if((isset($fuel_bon_carburantdetails)) && $fuel_bon_carburantdetails[0]['bc_compagnie_id'] == $fuel_compagnielists['ccc_id']){ echo 'selected';} ?> value="<?php echo output($fuel_compagnielists['ccc_id']) ?>"><?php echo output($fuel_compagnielists['ccc_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
<!--					  <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Numéro BC<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" id="bc_numero" value="<?php //echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_numero']:'' ?>" name="bc_numero" placeholder="Numéro">
                      </div>
                    </div>-->

                    <div class="col-sm-6 col-md-3">
                          <label class="form-label">Véhicule<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="bc_vehicule_id"  class="form-control selectized"  name="bc_vehicule_id" required="true">
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($fuel_bon_carburantdetails)) && $fuel_bon_carburantdetails[0]['bc_vehicule_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="bc_driver_id" class="form-control selectized" name="bc_driver_id" required>
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($fuel_bon_carburantdetails)) && $fuel_bon_carburantdetails[0]['bc_driver_id'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
					  
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="bc_date" name="bc_date" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité (L)<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control" id="bc_quantite" name="bc_quantite" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_quantite']:'' ?>" placeholder="Quantité (L)">

                      </div>
                    </div>
					  
                   <?php if(isset($fuel_bon_carburantdetails[0]['bc_type'])) { ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="bc_type" class="form-label">Statut </label>
                        <select id="bc_type" name="bc_type" class="form-control selectized" required="">
                          <option value="">Selectionner le statut </option> 
                          <option <?php echo (isset($fuel_bon_carburantdetails) && $fuel_bon_carburantdetails[0]['bc_type']==1) ? 'selected':'' ?> value="1">Validé</option> 
                          <option <?php echo (isset($fuel_bon_carburantdetails) && $fuel_bon_carburantdetails[0]['bc_type']==0) ? 'selected':'' ?> value="0">Non Validé</option> 
                        </select>
                      </div>
                    </div>
                  <?php } ?>					  
					  
                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Montant<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="bc_montant" name="bc_montant" value="<?php //echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_montant']:'' ?>" placeholder="Montant">

                      </div>
                    </div>-->
					  
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="bc_desc" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_desc']:'' ?>" name="bc_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>

      
                </div>
<?php if((isset($fuel_bon_carburantdetails))){}else{ ?>	
                 <input type="hidden" id="bc_created_date" name="bc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="bc_numero" name="bc_numero" value="BC<?= $numerobon_carburant; ?>">
  <?php } ?>
 
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_bon_carburantdetails))?'Modifier carburant':'AJOUTER CARBURANT' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  

<!--DEBUT LIST-->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table class="datatableexport table card-table table-vcenter">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Station service</th>
                          <th>Numéro BC</th>
                          <th>Véhicule</th>
                          <th>Chauffeur</th>
                          <th>Quantité</th>
                          <th>Restant</th>
                          <th>Statut</th>
                          <th>Création</th>
                          <th>Validation</th>
                          <?php if(userpermission('lr_fuel_edit')) { ?>
                         <!-- <th>Action</th>-->
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_bon_carburant)){  $count=1;
                           foreach($fuel_bon_carburant as $fuels){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($fuels['bc_date']); ?></td>
                            <td> <?= (isset($fuels['compagnie']->ccc_name))?$fuels['compagnie']->ccc_name:'<span class="badge badge-danger">Non renseigné</span>'; ?><?php //echo output($fuels['ccc_name']); ?></td>
                           <td> <?php echo output($fuels['bc_numero']); ?></td>
                           <td><?= (isset($fuels['vehicule']->v_registration_no))?$fuels['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?> <?php //echo output($fuels['v_registration_no']); ?></td>
                           <td><?= (isset($fuels['chauffeur']->d_name))?$fuels['chauffeur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?> <?php //echo output($fuels['v_registration_no']); ?></td>							
                           <td><?php echo output($fuels['bc_quantite']); ?></td>
                           <td><?= (isset($fuels['vehicule']->v_quantite_restant))?$fuels['vehicule']->v_quantite_restant:'<span class="badge badge-danger">Non renseigné</span>'; ?><?php //echo output($fuels['v_quantite_restant']); ?></td>
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
                           <!--<a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php //echo base_url(); ?>fuel_bon_carburant/fuel_bon_carburant_validation/<?php //echo output($fuels['bc_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a> -->                                   
                   <?php } // fin controle?>
					 <?php }  // fin controle?>	
					
							<?php  if($fuels['bc_type']=='1') { ?>  

                           <a data-toggle="tooltip" data-placement="top" title="Générer la facture PDF" class="icon" href="<?php echo base_url(); ?>fuel_bon_carburant/fuel_bon_carburant_pdf/<?php echo output($fuels['bc_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a>
                                                             
                     <?php }  // fin controle?>
<!--Fin validation-->  								  
<!--VALIDATION-->								
							
							</td>
                           <?php if(userpermission('lr_fuel_edit')) { ?>

                          <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>				  
<!--FIN LIST-->				  
				  
				  
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

				  <!--BEGIN JOURNAL-->
<form method="post" id="fuel_report" class="card basicvalidation" action="<?php echo base_url();?>fuel_bon_carburant/addfuel_bon_carburant">
         <div class="card-body">
            <div class="row">
				
				<div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-3 col-form-label">Véhicule</label>
                     <div class="col-sm-8 form-group">
                        <select required="true" id="booking_vechicle"  class="form-control selectized"  name="vechicle">
                           <option value="all">Tous les véhicules</option>
                       <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
							
                        
						<option <?php echo (isset($_POST['vechicle']) && ($_POST['vechicle'] == $vechiclelists['v_id'])) ? 'selected':'' ?> value="<?php echo output($vechiclelists['v_id']) ?>">	
							<?php echo output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                        </select>
                     </div>
                  </div>
               </div>				
				
				
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_from" class="col-sm-5 col-form-label">Début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['from']) ? $_POST['from'] : ''; ?>" id="fuel_from" name="from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_to" class="col-sm-5 col-form-label">Fin</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['to']) ? $_POST['to'] : ''; ?>" id="fuel_to" name="to" placeholder="Date fin">
                     </div>
                  </div>
               </div>
               
               <input type="hidden" id="journal_bon_carburant" name="journal_bon_carburant" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer Rapport</button>
               </div>
         </div>
   </div>
   </form>				  
				  <!--END JOURNAL-->

<!--BEGIN LIST-->
<div class="card">
        <div class="card-body p-0">
            <?php if(!empty($fuel_journal_bon_carburant)){ 
             ?>
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
                         <th>Validation</th>--> 
                          <?php if(userpermission('lr_fuel_edit')) { ?>
                         <!-- <th>Action</th>-->
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_journal_bon_carburant)){  $count=1;
                           foreach($fuel_journal_bon_carburant as $fuels){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($fuels['bc_date']); ?></td>
                            <td> <?php echo output($fuels['compagnie']->ccc_name); ?></td>
                           <td> <?php echo output($fuels['bc_numero']); ?></td>
                           <td> <?php echo output($fuels['vech_name']->v_registration_no); ?></td>
                           <td><?php echo output($fuels['bc_quantite']); ?></td>
                           <td><?php echo output($fuels['vech_name']->v_quantite_restant); ?></td>
  <!--                         <td><?php //echo output($fuels['bc_type']); ?></td>-->
                        <td><span class="badge <?php echo ($fuels['bc_type']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($fuels['bc_type']=='1') ? 'Validé' : 'Non validé'; ?></span>  
                        </td>							
                           <td><?php echo output($fuels['bc_created_date']); ?></td>
<!--                           <td><?php //echo output($fuels['bc_desc']); ?></td>
-->
                           <?php if(userpermission('lr_fuel_edit')) { ?>
                              <td>
							  
								  
								  
							
                          </td>
                          <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
                     <?php }  ?>
        </div>
      </div>				  
<!--END LIST-->				  
				  
				  
              </div>

<!--BEGIN ADD BON CARBURANT-->	
<div class="tab-pane fade" id="custom-tabs-one-paiement" role="tabpanel" aria-labelledby="custom-tabs-one-paiement-tab">

	 <!--BEGIN PAIEMENT-->
<form method="post" id="fuel_carte_carburant_add" class="card" action="<?php echo base_url();?>fuel_bon_carburant/<?php echo (isset($fuel_carte_carburantdetails))?'updatefuel_carte_carburant':'insert_paiementfuel_bon_carburant'; ?>">  
          <div class="card-body"> 
			  
                  <div class="row">
                   <input type="hidden" name="ccrp_id" id="ccrp_id" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['ccrp_id']:'' ?>" >

	
<!-- BEGIN SELECT-->
		<!--<div class="col-sm-3 col-md-3">	-->			  

<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="ccrp_date" name="ccrp_date" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['ccrp_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
					  
					  <div class="col-sm-3 col-md-4">
                          <label class="form-label">Station de service<span class="form-required">*</span></label>
                      <div class="form-group">
                            <select name="ccrp_compagnie_id" id="mi_trip_id" class="form-control selectized" required>
    <option value="">Selectionner une Station de service</option>
    <?php
    foreach($station_service as $row)
    {
     echo '<option value="'.$row->ccc_id.'">'.$row->ccc_id.''.$row->ccc_name.'</option>';
    }
    ?>
   </select>
                      </div>
                    </div>
<!--</div>-->				
<!-- END SELECT-->					  
					  
		<!--<div class="col-sm-3 col-md-3">
                          <label class="form-label">Numéro chéque <span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ccr_incomeexpense_id"  class="form-control selectized"  name="ccr_incomeexpense_id" required="true">
                        <option value="">Selectionner le Numéro chéque</option>
                        <?php  //foreach ($incomeexpenselist as $key => $incomeexpenselists) { ?>
                        <option <?php //if((isset($fueldetails)) && $fueldetails[0]['ccr_incomeexpense_id'] == $incomeexpenselists['ie_id']){ echo 'selected';} ?> value="<?php //echo output($incomeexpenselists['ie_id']) ?>"><?php //echo output($incomeexpenselists['ie_numero_enregistrement']).' - N° '. output($incomeexpenselists['ie_numero']); ?></option>
                        <?php  //} ?>
                     </select>
                      </div>
                    </div>-->					  
					  
					<!--<div class="col-sm-6 col-md-3">
                          <label class="form-label">Carte<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ccr_carte_id"  class="form-control selectized"  name="ccr_carte_id" >
                        <option value="">Selectionner la carte</option>
                        <?php //$count1=0; foreach ($carte_carburantlist as $key => $carte_carburantlists) { $count1++;?>
                        <option <?php //if((isset($fueldetails)) && $fueldetails[0]['ccr_carte_id'] == $carte_carburantlists['cc_id']){ echo 'selected';} if($count1==1){echo 'selected';}?> value="<?php //echo output($carte_carburantlists['cc_id']) ?>" ><?php //echo output($carte_carburantlists['cc_name']).' - '. output($carte_carburantlists['cc_numero']); ?></option>
                        <?php  //} ?>
                     </select>
                      </div>
                    </div>-->					  
       
                     </div>
                   
 <!--BEGIN -->
			  
			  
			  
<div class="col-sm-6 col-md-6">
                  <div class="form-group">
                     <label class="form-label"> Numéro bon de commande<span class="form-required">*</span></label>
                     <select id="mi_conteneur_id" name="ccrp_bon_carburant_id[]" class="select2" multiple required >

                        <option value="">Sélectionner les numéros bon de commande</option>

                     </select>
                  </div>
               </div>
			  
							  
					  
<!--END -->	                  
      
                </div>
                 <input type="hidden" id="ccrp_date" name="ccrp_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_carte_carburantdetails))?'Modifier paiement carburant':'Ajouter paiement carburant' ?></button>
      </div>
    </form>				  
	 <!--END PAIEMENT-->
	
<!--BEGIN LIST PAYMENT-->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table class="datatableexport table card-table table-vcenter">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Station service</th>
                          <th>Numéro BC</th>
<!--                          <th>Commentaire</th>
-->                          <th>Validation</th>
                          <th>Création</th>
                          <?php if(userpermission('lr_fuel_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
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
                           <td>
							  <?php 

$result = join_multi_select($paiement['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_id');							   

							   
foreach(explode(',',$result) as $str)
{
  $str = str_replace('"','',$str);
  echo $str . '<br />';
	
$row_bc = "";		
$requete_bc="";	 
	 $requete_bc = "bc_id=$str";

/*  $this->db->where($requete_bc);
 // $this->db->order_by('mi_id', 'desc');
  $query = $this->db->get('fuel_bon_carburant');
  $row_bc = $query->row();*/
$requete="";
		//$requete="ccc_id=cc_compagnie_id";
		$query = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id',$str)->order_by('bc_id','desc')->get()->result_array();

//	foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
		//if($row_bc != '')
	foreach($query as $row_bc)
	{
			echo $row_bc['bc_id'];
		 echo $bc_quantite = $row_bc['bc_quantite'];			
		 echo $bc_numero = $row_bc['bc_numero'];			
		 echo $bc_vehicule_id = $row_bc['bc_vehicule_id'];			
		 echo "date= ".$bc_date = $row_bc['bc_date'];
		}
	
}							   
							   
/*//$val='1|tomate|16|fraise';
$array_val = explode(',', $result);
$array_produits = array();
for($a=0; a<count($array_val); $a+=2){
$array_produits [$array_val[$a]] = $array_val[$a+1]; 
//la on stockes dans l'array_produits l'index de l'array=id_produit donc la premiere valeur et comme valeur à cet index la deuxième valeur
//exemple: $array_produits [1]=tomate  $array_produits [16]=fraise
}
//affichage des liens:
// Si le membre a des produits dans ses favoris
							   
if (count($array_val)>0)
{
    // boucle sur l'array_produits
        foreach ($array_produits as $id=>$nom){
        echo '<p><a href="../produits/produit.php?id='.$id.'">'.$nom.'</a>,&nbsp;</p>';
         } }*/							   
							   ?> 
							   
							   
							   <?php /*$result = join_multi_select($paiement['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_id');
$resultexplode = explode(',', $result);
$paiement = join_multi_select($paiement['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_id');
 $count = count($resultexplode);

	echo "count=".$count;

for ($i = 0; $i < $count; $i++) {
	echo $i;
	echo $id = print_r(explode(',', $resultexplode, $i));

}*///exit;?>
							   
<?= join_multi_select($paiement['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_numero'); ?></td>

  <!--                         <td><?php //echo output($fuels['bc_type']); ?></td>-->
                        <td><span class="badge <?php echo ($paiement['ccrp_statut']=='Y') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($paiement['ccrp_statut']=='Y') ? 'Validé' : 'Non validé'; ?></span>  
                        </td>							
                           <td><?php echo output($paiement['ccrp_created_date']); ?></td>
<!--                           <td><?php //echo output($fuels['bc_desc']); ?></td>
-->                         <td>  
                           <?php if(userpermission('lr_fuel_edit')) { ?>
                              
							  
								  
						<?php } ?>		  
						<?php //if($paiement['ccrp_statut']=='1') {?>	 
								  
								  
								    <a data-toggle="tooltip" data-placement="top" title="Générer la facture PDF" class="icon" href="<?php echo base_url(); ?>fuel_bon_carburant/fuel_bon_carburant_paiement_pdf/<?php echo output($paiement['ccrp_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-red"></i>
                           </a>
								  
                            
								  <?php //} ?>	
                          </td>
                          
                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>	
<!--END LIST PAYMENT-->	
	
              </div>				
<!--END ADD BONCARBURANT-->				
				
            </div>
          </div>
          <!-- /.card -->
        </div>
<!--EN NAV-->		
	

    </section>

    <!-- /.content -->

<script>
	
	
  $(document).ready(function() {
	  
	
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>fuel_bon_carburant/fetch_conteneur",
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
	  
	  
	  
    $('.form-validate').validate({
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    $('.check-select-all-p').on('change', function() {

      $('.check-select-p').attr('checked', $(this).is(':checked'));
      
    })

    $('.table-DT').DataTable({
      "ordering": false,
    });
  })

</script>

