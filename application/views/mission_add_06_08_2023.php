    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0 text-dark">Gestion des Missions : <?php echo (isset($missiondetails))?'MODIFIER MISSION':'AJOUTER MISSION' ?>
           <?php if((isset($missiondetails))){ ?> N° <?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_numero']:'' ?>  <?php }else{?> N° M<?= $numeromission; }?> </h1>
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
                <a class="nav-link active" id="custom-tabs-one-livraison-tab" data-toggle="pill" href="#custom-tabs-one-livraison" role="tab" aria-controls="custom-tabs-one-livraison" aria-selected="true">LIVRAISON</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-mise-terre-tab" data-toggle="pill" href="#custom-tabs-one-mise-terre" role="tab" aria-controls="custom-tabs-one-mise-terre" aria-selected="true">2.	MISE A TERRE</a>
              </li>	
				
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-decrochage-tab" data-toggle="pill" href="#custom-tabs-one-decrochage" role="tab" aria-controls="custom-tabs-one-decrochage" aria-selected="true">3.	DECROCHAGE</a>
              </li>	
				
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-garage-tab" data-toggle="pill" href="#custom-tabs-one-garage" role="tab" aria-controls="custom-tabs-one-garage" aria-selected="true">4.	GARAGE / REPARATION</a>
              </li>	
				

				
            				
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
              </li>
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
 <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_type_mission'] == "LIVRAISON"){  ?>
				
				<?php //if($mi_type_mission=="LIVRAISON"){?>          
				<div class="tab-pane fade show active" id="custom-tabs-one-livraison" role="tabpanel" aria-labelledby="custom-tabs-one-livraison-tab">
	<?php /*?><?php */?>			  
				  
       	     	
				  
<!--BEGIN LIST-->                      
<form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >


<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="<?php echo date('Y-m-d'); ?>" required>

                      </div>
                    </div>					  

	<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="mi_trip_id_livraison" id="mi_trip_id_livraison" class="form-control selectized" required>
    <option value="">Selectionner Pregate</option>
    <?php
/*    foreach($pregate as $row)
    {
     echo '<option  value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }*/
    ?>
						 
<?php if(isset($missiondetails)) { foreach($pregate as $row) { ?>
                          <option <?= (isset($missiondetails[0]['mi_trip_id']) && $missiondetails[0]['mi_trip_id'] == $row['pr_trip_id'])?'selected':''?> value="<?= $row['pr_trip_id'] ?>"><?= $row['pr_numero'] ?></option> 
                          <?php } } else {
	
  foreach($pregate as $row)
    {
     echo '<option  value="'.$row['pr_trip_id'].'">'.$row['pr_numero'].'</option>';
    }	
	} ?>
	   
   </select>					  
<!-- END SELECT-->					  
					  
                  </div>
               </div>					  

					  
				  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
                     <select id="mi_conteneur_id_livraison" name="mi_conteneur_id_livraison[]" multiple class="select2" required >
						  <!--<select id="mi_conteneur_id" class="form-control selectized" name="mi_conteneur_id[]" multiple   >input-lg-->
                        <option value="">Sélectionner le Conteneur</option>
                        <?php if(isset($missiondetails)) { foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_conteneur_id'] == $conteneurlists['co_id']){ echo 'selected';} ?> 
								<?= in_array($conteneurlists['co_id'], explode(',', $missiondetails[0]['mi_conteneur_id'])) ? 'selected' : ''; ?>
								value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } } ?>
                     </select>
                  </div>
	
	
               </div>
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Lieu livraison<span class="form-required">*</span></label>
					 
                     <select id="mi_lieu_livraison" name="mi_lieu_livraison"  class="form-control input-lg" required>						 
                        <option value="">Sélectionner le lieu livraison</option>

                        <?php  foreach ($lieu_livraisonlist as $key => $row) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_lieu_livraison'] == $row['ll_id']){ echo 'selected';} ?> value="<?php echo output($row['ll_id']) ?>"><?php echo output($row['ll_name']); ?></option>						 
						<?php  } ?> 
						 
                     </select>
                  </div>
	
	
               </div>	
					  
		<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver_id" class="form-control selectized" name="mi_driver_id" required>
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
                     <select required id="mi_vehicle_id_livraison" class="form-control selectized" name="mi_vehicle_id_livraison" required>
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
				  
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input required type="text" name="mi_quantite_carburant" id="mi_quantite_carburant"  value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_quantite_carburant']:'' ?>"<?php //echo 'value="'.$row_quantite->bc_restant.'"' ?> class="form-control" placeholder="Quantité carburant" required>
                  </div>
               </div> 					  
					  
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" required>
                        <option value="">Sélectionner Remorque</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_type']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>						  


                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage_id" class="form-control selectized" name="mi_carte_peage_id" >
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
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_peage_amount']:'' ?>" name="mi_carte_peage_amount" id="mi_carte_peage_amount" class="form-control" placeholder="Montant péage" >
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
                  
 	<div id="mi_bon_carburant_id_livraison">
	</div>	     
                </div>
<?php if((isset($missiondetails))){ ?> <input type="hidden" id="mi_modified_date" name="mi_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>"> 
			  
<input type="hidden" id="mi_type_mission" name="mi_type_mission" value="LIVRAISON">			  
			  
			  <?php }else{ ?>			  
                 <input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
                  <input type="hidden" id="mi_type_mission" name="mi_type_mission" value="LIVRAISON">			  
			  
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
      </div>
    </form>		
		
<!--END LIST-->		

<!--BEGIN LIST-->
<div class="table-responsive">
          <?php if(!empty($mission_livraison)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
<!--                          <th>N° transaction</th>
-->                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Qté carburant</th>
                          <th>Lieu livraison</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Type de mission</th>
                          <th>Chauffeur</th>
                          <th>Statut</th>
                          <th>Création</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission_livraison as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php //echo output($missions['t_num_facture']); ?><?php //echo ucfirst($missions['facture']->t_num_facture); ?><?= (isset($missions['facture']->t_num_facture))?$missions['facture']->t_num_facture:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							<td> <?php echo output($missions['mi_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mi_quantite_carburant']); ?></td>
							
							<td> <?= (isset($missions['lieu_livraison']->ll_name))?$missions['lieu_livraison']->ll_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>

                           <td><?php //echo output($missions['pr_numero']); ?><?php //echo ucfirst($missions['pregate']->pr_numero); ?><?= (isset($missions['pregate']->pr_numero))?$missions['pregate']->pr_numero:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td>
							<?= join_multi_select($missions['mi_conteneur_id'], 'trip_conteneur', 'co_id', 'co_numero_conteneur'); ?>
							 
							
							 
													   

							
							</td>
                         <td><?php //echo output($missions['type_transport']->ta_name); ?>
							 <?= (isset($missions['mi_type_mission']))?$missions['mi_type_mission']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                        <td><span class="badge <?php echo ($missions['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missions['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span> 							
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

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
								  
                      <?php if(userpermission('lr_mi_edit')) { ?>
                       
                           <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                      
                        <?php } ?>								  

<!--DEBUT DUPLICATION-->
<!--<a class="icon" href="<?php //echo base_url(); ?>mission/duplicate_mission/<?php //echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>-->								  
<!--FIN DUPLICATION-->								  
								  
								  
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
<!--END TAB LIVRAISON-->				  
				  
              </div>
				<?php //} //FIN LIVRAISON?>

<!--DEBUT MISE A TERRE-->
<div class="tab-pane fade show" id="custom-tabs-one-mise-terre" role="tabpanel" aria-labelledby="custom-tabs-one-mise-terre-tab">
				  
				  
       	     	
				  
<!--BEGIN LIST-->                      
<form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >


<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="<?php echo date('Y-m-d'); ?>" required>

                      </div>
                    </div>					  

	<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="mi_trip_id_mise_terre" id="mi_trip_id_mise_terre" class="form-control selectized" required>
    <option value="">Selectionner Pregate</option>
    <?php
/*    foreach($pregate as $row)
    {
     echo '<option  value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }*/
    ?>
						 
<?php if(isset($missiondetails)) { foreach($pregate as $row) { ?>
                          <option <?= (isset($missiondetails[0]['mi_trip_id']) && $missiondetails[0]['mi_trip_id'] == $row['pr_trip_id'])?'selected':''?> value="<?= $row['pr_trip_id'] ?>"><?= $row['pr_numero'] ?></option> 
                          <?php } } else {
	
  foreach($pregate as $row)
    {
     echo '<option  value="'.$row['pr_trip_id'].'">'.$row['pr_numero'].'</option>';
    }	
	} ?>
	   
   </select>					  
<!-- END SELECT-->					  
					  
                  </div>
               </div>					  

					  
				  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
                     <select id="mi_conteneur_id_mise_terre" name="mi_conteneur_id_mise_terre[]" multiple class="select2" required >
						  <!--<select id="mi_conteneur_id" class="form-control selectized" name="mi_conteneur_id[]" multiple   >input-lg-->
                        <option value="">Sélectionner le Conteneur</option>
                        <?php if(isset($missiondetails)) { foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_conteneur_id'] == $conteneurlists['co_id']){ echo 'selected';} ?> 
								<?= in_array($conteneurlists['co_id'], explode(',', $missiondetails[0]['mi_conteneur_id'])) ? 'selected' : ''; ?>
								value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } } ?>
                     </select>
                  </div>
	
	
               </div>
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Lieu livraison<span class="form-required">*</span></label>
					 
                     <select id="mi_lieu_livraison" name="mi_lieu_livraison"  class="form-control input-lg" required>						 
                        <option value="">Sélectionner le lieu livraison</option>
						 
						 <?php //if(isset($missiondetails))  {
	 foreach($lieu_livraisonlist as $row) { ?>
                          <option <?= (isset($missiondetails[0]['mi_lieu_livraison']) && $missiondetails[0]['mi_lieu_livraison'] == $row['ll_id'])?'selected':''?> value="<?= $row['ll_id'] ?>"><?= $row['ll_name'] ?></option> 
                          <?php } 
								//}?>
                     </select>
                  </div>
	
	
               </div>	
					  
		<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver_id" class="form-control selectized" name="mi_driver_id" required>
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
                     <select id="mi_vehicle_id_mise_terre" class="form-control selectized" name="mi_vehicle_id_mise_terre" required>
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
				  
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input required type="text" name="mi_quantite_carburant" id="mi_quantite_carburant"  value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_quantite_carburant']:'' ?>"<?php //echo 'value="'.$row_quantite->bc_restant.'"' ?> class="form-control" placeholder="Quantité carburant" required>
                  </div>
               </div> 					  
					  
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" required>
                        <option value="">Sélectionner Remorque</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_type']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>						  


                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage_id" class="form-control selectized" name="mi_carte_peage_id" >
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
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_peage_amount']:'' ?>" name="mi_carte_peage_amount" id="mi_carte_peage_amount" class="form-control" placeholder="Montant péage" >
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
                  
 	<div id="mi_bon_carburant_id_mise_terre">
	</div>	     
                </div>
<?php if((isset($missiondetails))){ ?> <input type="hidden" id="mi_modified_date" name="mi_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>"> 
<input type="hidden" id="mi_type_mission" name="mi_type_mission" value="MISE_A_TERRE">			  
			  
			  <?php }else{ ?>
<input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
                  <input type="hidden" id="mi_type_mission" name="mi_type_mission" value="MISE_A_TERRE">			  
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
      </div>
    </form>		
		
<!--END LIST-->		

<!--BEGIN LIST-->
<div class="table-responsive">
          <?php if(!empty($mission_mise_a_terre)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
<!--                          <th>N° transaction</th>
-->                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Qté carburant</th>
                          <th>Lieu livraison</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Type de mission</th>
                          <th>Chauffeur</th>
                          <th>Statut</th>
                          <th>Création</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission_mise_a_terre as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php //echo output($missions['t_num_facture']); ?><?php //echo ucfirst($missions['facture']->t_num_facture); ?><?= (isset($missions['facture']->t_num_facture))?$missions['facture']->t_num_facture:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							<td> <?php echo output($missions['mi_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mi_quantite_carburant']); ?></td>
							
							<td> <?= (isset($missions['lieu_livraison']->ll_name))?$missions['lieu_livraison']->ll_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>

                           <td><?php //echo output($missions['pr_numero']); ?><?php //echo ucfirst($missions['pregate']->pr_numero); ?><?= (isset($missions['pregate']->pr_numero))?$missions['pregate']->pr_numero:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td>
							<?= join_multi_select($missions['mi_conteneur_id'], 'trip_conteneur', 'co_id', 'co_numero_conteneur'); ?>
							 
							
							 
													   

							
							</td>
                         <td><?= (isset($missions['mi_type_mission']))?$missions['mi_type_mission']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                        <td><span class="badge <?php echo ($missions['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missions['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span> 							
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

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
								  
                      <?php if(userpermission('lr_mi_edit')) { ?>
                       
                           <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                      
                        <?php } ?>								  

<!--DEBUT DUPLICATION-->
<a class="icon" href="<?php echo base_url(); ?>mission/addmission_suite/<?php echo output($missions['mi_id']); ?>">
                          <i class="fa fa-arrow-right"></i>
                           </a>								  
<!--FIN DUPLICATION-->								  
								  
								  
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
				  
              </div>				
<!--FIN MISE A TERRE-->				
	
<!--DEBUT DECROCHAGE-->	
<div class="tab-pane fade show" id="custom-tabs-one-decrochage" role="tabpanel" aria-labelledby="custom-tabs-one-decrochage-tab">
				  
				  
       	     	
				  
<!--BEGIN LIST-->                      
<form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >


<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="<?php echo date('Y-m-d'); ?>" required>

                      </div>
                    </div>					  

	<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="mi_trip_id_decrochage" id="mi_trip_id_decrochage" class="form-control selectized" required>
    <option value="">Selectionner Pregate</option>
    <?php
/*    foreach($pregate as $row)
    {
     echo '<option  value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }*/
    ?>
						 
<?php if(isset($missiondetails)) { foreach($pregate as $row) { ?>
                          <option <?= (isset($missiondetails[0]['mi_trip_id']) && $missiondetails[0]['mi_trip_id'] == $row['pr_trip_id'])?'selected':''?> value="<?= $row['pr_trip_id'] ?>"><?= $row['pr_numero'] ?></option> 
                          <?php } } else {
	
  foreach($pregate as $row)
    {
     echo '<option  value="'.$row['pr_trip_id'].'">'.$row['pr_numero'].'</option>';
    }	
	} ?>
	   
   </select>					  
<!-- END SELECT-->					  
					  
                  </div>
               </div>					  

					  
				  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
                     <select id="mi_conteneur_id_decrochage" name="mi_conteneur_id[]" multiple class="select2" required >
						  <!--<select id="mi_conteneur_id" class="form-control selectized" name="mi_conteneur_id[]" multiple   >input-lg-->
                        <option value="">Sélectionner le Conteneur</option>
                        <?php if(isset($missiondetails)) { foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option <?php //if((isset($missiondetails)) && $missiondetails[0]['mi_conteneur_id'] == $conteneurlists['co_id']){ echo 'selected';} ?> 
								<?= in_array($conteneurlists['co_id'], explode(',', $missiondetails[0]['mi_conteneur_id'])) ? 'selected' : ''; ?>
								value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } } ?>
                     </select>
                  </div>
	
	
               </div>
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Lieu livraison<span class="form-required">*</span></label>
					 
                     <select id="mi_lieu_livraison" name="mi_lieu_livraison"  class="form-control input-lg" required>						 
                        <option value="">Sélectionner le lieu livraison</option>
						 
						 <?php //if(isset($missiondetails))  {
	 foreach($lieu_livraisonlist as $row) { ?>
                          <option <?= (isset($missiondetails[0]['mi_lieu_livraison']) && $missiondetails[0]['mi_lieu_livraison'] == $row['ll_id'])?'selected':''?> value="<?= $row['ll_id'] ?>"><?= $row['ll_name'] ?></option> 
                          <?php } 
								//}?>
                     </select>
                  </div>
	
	
               </div>	
					  
		<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver_id" class="form-control selectized" name="mi_driver_id" required>
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
                     <select required id="mi_vehicle_id" class="form-control selectized" name="mi_vehicle_id" required >
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
				  
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input required type="text" name="mi_quantite_carburant" id="mi_quantite_carburant"  value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_quantite_carburant']:'' ?>"<?php //echo 'value="'.$row_quantite->bc_restant.'"' ?> class="form-control" placeholder="Quantité carburant" required>
                  </div>
               </div> 					  
					  
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" required>
                        <option value="">Sélectionner Remorque</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_type']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>						  


                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage_id" class="form-control selectized" name="mi_carte_peage_id" >
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
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_peage_amount']:'' ?>" name="mi_carte_peage_amount" id="mi_carte_peage_amount" class="form-control" placeholder="Montant péage" >
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
                  
 	<div id="mi_bon_carburant_id_decrochage">
	</div>	     
                </div>
<?php if((isset($missiondetails))){ ?> <input type="hidden" id="mi_modified_date" name="mi_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>"> 
			  
                  <input type="hidden" id="mi_type_mission" name="mi_type_mission" value="DECROCHAGE">			  			  
			  <?php }else{ ?>
			  
<input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
                  <input type="hidden" id="mi_type_mission" name="mi_type_mission" value="DECROCHAGE">			  
			  
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
      </div>
    </form>		
		
<!--END LIST-->		

<!--BEGIN LIST-->
<div class="table-responsive">
          <?php if(!empty($mission_decrochage)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
<!--                          <th>N° transaction</th>
-->                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Qté carburant</th>
                          <th>Lieu livraison</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Type de mission</th>
                          <th>Chauffeur</th>
                          <th>Statut</th>
                          <th>Création</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission_decrochage as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php //echo output($missions['t_num_facture']); ?><?php //echo ucfirst($missions['facture']->t_num_facture); ?><?= (isset($missions['facture']->t_num_facture))?$missions['facture']->t_num_facture:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							<td> <?php echo output($missions['mi_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mi_quantite_carburant']); ?></td>
							
							<td> <?= (isset($missions['lieu_livraison']->ll_name))?$missions['lieu_livraison']->ll_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>

                           <td><?php //echo output($missions['pr_numero']); ?><?php //echo ucfirst($missions['pregate']->pr_numero); ?><?= (isset($missions['pregate']->pr_numero))?$missions['pregate']->pr_numero:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td>
							<?= join_multi_select($missions['mi_conteneur_id'], 'trip_conteneur', 'co_id', 'co_numero_conteneur'); ?>
							 
							
							 
													   

							
							</td>
                         <td><?= (isset($missions['mi_type_mission']))?$missions['mi_type_mission']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                        <td><span class="badge <?php echo ($missions['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missions['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span> 							
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

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
								  
                      <?php if(userpermission('lr_mi_edit')) { ?>
                       
                           <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                      
                        <?php } ?>								  

<!--DEBUT DUPLICATION-->
<a class="icon" href="<?php echo base_url(); ?>mission/addmission_suite/<?php echo output($missions['mi_id']); ?>">
                          <i class="fa fa-arrow-right"></i>
                           </a>								  
<!--FIN DUPLICATION-->								  
								  
								  
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
				  
              </div>				
<!--FIN DECROCHAGE-->				
				
<!--DEBUT GARAGE-->
<div class="tab-pane fade show" id="custom-tabs-one-garage" role="tabpanel" aria-labelledby="custom-tabs-one-garage-tab">
				  
				  
       	     	
				  
<!--BEGIN LIST-->                      
<form method="post" id="mission" class="card" action="<?php echo base_url();?>mission/<?php echo (isset($missiondetails))?'updatemission':'insertmission'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="mi_id" id="mi_id" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_id']:'' ?>" >


<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date mission<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="mi_date_mission" name="mi_date_mission" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_date_mission']:'' ?>" placeholder="<?php echo date('Y-m-d'); ?>" required>

                      </div>
                    </div>					  

		<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="mi_driver_id" class="form-control selectized" name="mi_driver_id" required>
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
                     <select id="mi_vehicle_id_garage" class="form-control selectized" name="mi_vehicle_id_garage" required>
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
				  
              <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité carburant (litre) <span class="form-required">*</span></label>
                     <input required type="text" name="mi_quantite_carburant" id="mi_quantite_carburant"  value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_quantite_carburant']:'' ?>"<?php //echo 'value="'.$row_quantite->bc_restant.'"' ?> class="form-control" placeholder="Quantité carburant">
                  </div>
               </div> 					  
					  
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Remorque<span class="form-required">*</span></label>
                     <select id="mi_vehicle_remorque_id" class="form-control selectized" name="mi_vehicle_remorque_id" required>
                        <option value="">Sélectionner Remorque</option>
                        <?php  foreach ($vehicleremorquelist as $key => $vehicleremorquelists) { ?>
                        <option <?php if((isset($missiondetails)) && $missiondetails[0]['mi_vehicle_remorque_id'] == $vehicleremorquelists['vr_id']){ echo 'selected';} ?> value="<?php echo output($vehicleremorquelists['vr_id']) ?>"><?php echo output($vehicleremorquelists['vr_type']).' - '. output($vehicleremorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>						  


                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="mi_carte_peage_id" class="form-control selectized" name="mi_carte_peage_id" >
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
                     <input type="text" value="<?php echo (isset($missiondetails)) ? $missiondetails[0]['mi_carte_peage_amount']:'' ?>" name="mi_carte_peage_amount" id="mi_carte_peage_amount" class="form-control" placeholder="Montant péage" >
                  </div>
               </div>	  
                
<!-- Fin Carte Carburant-->                    
                
                  
                      
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
                  
 	<div id="mi_bon_carburant_id_garage">
	</div>	     
                </div>
<?php if((isset($missiondetails))){ ?> <input type="hidden" id="mi_modified_date" name="mi_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>"> <?php }else{ ?>
			  
<input type="hidden" id="mi_created_date" name="mi_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="mi_numero" name="mi_numero" value="M<?= $numeromission; ?>">
                  <input type="hidden" id="mi_type_mission" name="mi_type_mission" value="GARAGE">			  
			  
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="mi_trip_id" name="mi_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="mi_conteneur_id" name="mi_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($missiondetails))?'Modifier mission':'Ajouter mission' ?></button>
      </div>
      </div>
    </form>		
		
<!--END LIST-->		

<!--BEGIN LIST-->
<div class="table-responsive">
          <?php if(!empty($mission_garage)){ ?>
                    <table id="missiontbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° facture</th>
                          <th>N° mission</th>
<!--                          <th>N° transaction</th>
-->                          <th>Date mission</th>
                          <th>Véhicule</th>
                          <th>Qté carburant</th>
                          <th>Lieu livraison</th>
                          <th>Pregate</th>
                          <th>Conteneur</th>
                          <th>Type de mission</th>
                          <th>Chauffeur</th>
                          <th>Statut</th>
                          <th>Création</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission_garage as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php //echo output($missions['t_num_facture']); ?><?php //echo ucfirst($missions['facture']->t_num_facture); ?><?= (isset($missions['facture']->t_num_facture))?$missions['facture']->t_num_facture:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							<td> <?php echo output($missions['mi_numero']); ?></td>
							
							
                          <td> <?php echo output($missions['mi_date_mission']); ?></td>
                           <td> <?php //echo output($missions['v_registration_no']); ?><?php //echo ucfirst($missions['vehicule']->v_registration_no); ?><?= (isset($missions['vehicule']->v_registration_no))?$missions['vehicule']->v_registration_no:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                          <td> <?php echo output($missions['mi_quantite_carburant']); ?></td>
							
							<td> <?= (isset($missions['lieu_livraison']->ll_name))?$missions['lieu_livraison']->ll_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>

                           <td><?php //echo output($missions['pr_numero']); ?><?php //echo ucfirst($missions['pregate']->pr_numero); ?><?= (isset($missions['pregate']->pr_numero))?$missions['pregate']->pr_numero:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td>
							<?= join_multi_select($missions['mi_conteneur_id'], 'trip_conteneur', 'co_id', 'co_numero_conteneur'); ?>
							 
							
							 
													   

							
							</td>
                         <td><?= (isset($missions['mi_type_mission']))?$missions['mi_type_mission']:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                        <td><span class="badge <?php echo ($missions['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missions['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span> 							
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

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
								  
                      <?php if(userpermission('lr_mi_edit')) { ?>
                       
                           <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                      
                        <?php } ?>								  

<!--DEBUT DUPLICATION-->
<!--<a class="icon" href="<?php //echo base_url(); ?>mission/duplicate_mission/<?php //echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>	-->							  
<!--FIN DUPLICATION-->								  
								  
								  
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
				  
              </div>				
<!--FIN GARAGE-->
				
				
				
<!--BEGIN PERTE-->
<div class="tab-pane fade show" id="custom-tabs-one-home-perte" role="tabpanel" aria-labelledby="custom-tabs-one-home-perte-tab">
				  
				  
       	     	
				  
<!--BEGIN LIST-->                      
div		
		
<!--END LIST-->		

				  
				  
              </div>				
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
                         <input type="text" class="form-control datepicker" id="from" name="from" value="" placeholder="Date début" required="true">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="to" name="to" value="" placeholder="Date fin" required="true">

                      </div>
                    </div>		
				
			
<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Type de mission</label>
                        <select id="mi_type_mission" name="mi_type_mission" class="form-control " required="">
                         <option value="">Selectionner Type de mission</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_type_mission']=='LIVRAISON') ? 'selected':'' ?> value="LIVRAISON">LIVRAISON</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_type_mission']=='LIVRAISON') ? 'selected':'' ?> value="LIVRAISON">LIVRAISON</option>     <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_type_mission']=='LIVRAISON') ? 'selected':'' ?> value="LIVRAISON">LIVRAISON</option> 							
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_type_mission']=='LIVRAISON') ? 'selected':'' ?> value="LIVRAISON">LIVRAISON</option> 							
							
							
							
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_type_mission']=='POSITIONNEMENT') ? 'selected':'' ?> value="POSITIONNEMENT">POSITIONNEMENT</option> 
                          <option <?php echo (isset($missiondetails) && $missiondetails[0]['mi_type_mission']=='RESTITUTION_VIDE') ? 'selected':'' ?> value="RESTITUTION_VIDE">RESTITUTION VIDE</option> 
                           
                           
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
                          <th>Type de transport</th>
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
							 <?= (isset($missions['type_transport']->ta_name))?$missions['type_transport']->ta_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
                         <td><?php //echo output($missions['d_name']); ?><?php //echo ucfirst($missions['conducteur']->d_name); ?><?= (isset($missions['conducteur']->d_name))?$missions['conducteur']->d_name:'<span class="badge badge-danger">Non renseigné</span>'; ?></td>
							
                          <td> <?php echo output($missions['mi_created_date']); ?></td>
							

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
								  
                      <?php if(userpermission('lr_mi_edit')) { ?>
                       
                           <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                      
                        <?php } ?>								  
								  
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


