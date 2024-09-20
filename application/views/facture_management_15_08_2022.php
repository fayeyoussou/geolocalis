    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des factures1
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des factures</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
        <div class="table-responsive">
			
			<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">FACTURES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">RECHERCHE</a>
                  </li>

                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

					  <!--BEGIN LIST-->
					  
<table class="datatableexport table card-table table-vcenter">                       
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Désignation</th>
                          <th>N° Proforma</th>
                          <th>N° facture</th>
                          <th>Modéle facture</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                          <th>Date</th>
                          <th>Montant</th>
                          <th>TVA</th>
<!--                      <th>Statut facture</th>-->
                          <th>Réglement</th>
                          <th>Validation</th>
                         <?php if(userpermission('lr_trips_list_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($facturelist)){ 
                           $count=1;
                           foreach($facturelist as $facturelists){
                           ?>
                        <tr>
                            <td> <?php echo output($count); $count++; ?></td>
                          <td> <?php echo ucfirst($facturelists['t_type_facturation']); ?></td>
                          <td> <?php echo output($facturelists['t_num_proforma']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_num_facture']); ?> <?php //if(isset($facturelists['t_num_facture'])){echo output($facturelists['t_num_facture']);}else {echo output($facturelists['t_num_proforma']);} ?></td>                         <td> <?php echo ucfirst($facturelists['t_modele_facture']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>
                           <td><?php if($facturelists['t_validation']=="non_valide") {echo "Facture non validée";}else { echo ucfirst($facturelists['t_trip_amount']); }?></td>
                           <td><?php if($facturelists['t_validation']=="non_valide") {echo "Facture non validée";}else { echo ucfirst($facturelists['t_montant_tva']); }?></td>
<!--                           <td><?//= (isset($facturelists['t_driver_details']->d_name))?$facturelists['t_driver_details']->d_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>
--> <!--                          <td> <?php /*
                              switch($facturelists['t_trip_status']){
                                  case 'nodemarre':
                                      $status = '<span class="badge badge-info">No démarré</span>';
                                      break;
                                  case 'encours':
                                      $status = '<span class="badge badge-success">En cours</span>';
                                       break;
                                  case 'termine':
                                      $status = '<span class="badge badge-warning">Terminé</span>';
                                       break;
                                  case 'annule':
                                      $status = '<span class="badge badge-danger">Annulé</span>'; 
                                       break; 
   
                                }*/

                              ?>
                             <?//=  $status ?>  
                            </td>-->
                            
                          <!-- <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>--> 
                           <td><?= (isset($facturelists['t_reglement_details']->tg_name))?$facturelists['t_reglement_details']->tg_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>                       
                            
                         <td> <?php 
                              switch($facturelists['t_validation']){
                                  case 'valide':
                                      $status = '<span class="badge badge-info">Validé</span>';
                                      break;
                                  case 'non_valide':
                                      $status = '<span class="badge badge-danger">Non validé</span>'; 
                                       break; 
   
                                }

                              ?>
                             <?=  $status ?>  
                            </td>
                            
                             <?php //if(userpermission('lr_trips_list_edit')) { ?>
                               <td>
 <?php $t_validation=''; if(userpermission('lr_trips_validate')) { ?>                                  
<?php  $t_validation =  $facturelists['t_validation'];?>                           
                                   <?php if($t_validation=="non_valide") { ?> 
                            <a class="icon" href="<?php echo base_url(); ?>facture/editfacture/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
<?php }?>
<?php }?><!--fin permission-->
								   
						<?php if(userpermission('lr_trips_detail')) { ?>		   
                            <a data-toggle="tooltip" data-placement="top" title="Détail" class="icon" href="<?php echo base_url(); ?>facture/details/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php } ?>		   
                                   
<!--                <a href="<?//= base_url(); ?>facture/facture_management/<?//= $facturelists['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-conteneur"><i class="fa fa-eye"></i></a>-->
  
 

<!--debut validation-->                                    
                <?php //$t_validation=''; $t_validation =  $facturelists['t_validation']; //echo $t_annulation;
                        if($t_validation=="non_valide") { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Validation" class="icon" class="icon" href="<?php echo base_url(); ?>facture/facture_validation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?>                                    
<!--Fin validation-->                                    
                                   
                                   
<!--debut annulation-->   
<?php if(userpermission('lr_trips_cancel')) { ?>								   
                <?php $t_annulation=''; $t_annulation =  $facturelists['t_annulation']; //echo $t_annulation;
                        if($t_annulation=="non_annule") { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Annulation" class="icon" class="icon" href="<?php echo base_url(); ?>facture/facture_annulation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-ban text-green"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i data-toggle="tooltip" data-placement="top" title="Facture validée" class="icon" class="fa fa-ban text-danger"></i>
                                                             
                     <?php }  // fin controle?>                                     
 <?php }  // fin permission?> 
<!--                             <a class="icon" href="<?php //echo base_url(); ?>facture/facture_generation/<?php //echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-file-alt text-blue"></i>
                           </a> -->
								   
<?php if(userpermission('lr_trips_generation_pdf')) { ?>									   
                          <?php //if($facturelists['t_num_facture']!="") { ?>          
                             <a data-toggle="tooltip" data-placement="top" title="Générer la facture PDF" class="icon" href="<?php echo base_url(); ?>facture/facture_generation_pdf/<?php echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a>
 <?php }  // fin permission?>								   
                      <?php // }  else {?>
                             <!--<a class="icon" href="<?php //echo base_url(); ?>facture/facture_proforma_generation_pdf/<?php //echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a> -->                                    
                   
                    <?php //}  // fin controle?>                                   
                                   
                <?php //if($facturelists['t_annulation']=="annulee") { ?>  

<?php if(userpermission('lr_trips_delete')) { ?>								   
				<?php if(($t_validation=="non_valide") || ($t_annulation=="non_annule")) { ?> 
                           <a class="icon" href="<?php echo base_url(); ?>facture/facture_delete/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a>                                    
                   <?php } else{ ?>
								   
                    <i class="fa fa-trash text-grey"></i>
                    <?php } ?>
<?php }  // fin controle?>								   
								   
                          <?php if($facturelists['t_modele_facture']=="PROFORMA") { ?> 
                             <a class="icon" href="<?php echo base_url(); ?>facture/facture_transformation_proforma/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-paste text-red"></i>
                           </a>                                    
                          <?php } ?>
                          </td>
                          <?php //} //fin controle ligne 100; edit ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>					  
					  <!--END LIST-->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

<!--BEGIN RECHERCHE-->					  
<section class="content">
   <div class="container-fluid">
       <form method="post" id="incomeexpense_report" class="card basicvalidation" action="">
<!--
<?php //echo base_url();?>incomexpense/journalreglement_facture

<form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">
				
				<div class="col-md-4">
				<div class="form-group">
                     <label class="form-label">Factures<span class="form-required"></span></label>
                     <select id="ie_ieb_id" class="form-control selectized" style="width: 100%;"  name="ie_ieb_id">
                        <option value="">Sélectionner les factures </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_ieb_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_id']) ?> - <?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
                   </div>	
                 </div>	
				
                              

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
				

 
				
				
				
                              

                              <!-- Debut transitaire-->

                              				

				

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">N° BL<span class="form-required"></span></label>
                         <input type="text" class="form-control" id="t_reference" name="t_reference" value="<?php echo isset($_POST['t_reference']) ? $_POST['t_reference'] : ''; ?>" placeholder="N° BL">

                      </div>
                    </div>					
	
									
				
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Rapport</button>
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
<!---->                   <th>Numéro Facture</th>
                          <th>BL</th>
                          <th>Date</th>
<!--                          <th>Numéro Cheque/Espèce</th>
                          <th>Montant</th>
                          <th>Emettrice</th>
                          <th>Receptrice</th>
                          <th>Type</th>-->

                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
<?php if(!empty($incomexpense)){ ?>
                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
<!---->                           <td><?php echo output($incomexpenses['ie_numero_enregistrement']); ?></td>
                        <td> <?php //echo output($incomexpenses['tra_name']); ?></td>
                        <td> <?php //echo output($incomexpenses['ie_date']); ?></td>
                        <td><?php //echo output($incomexpenses['ie_numero']); ?></td>


                        
							<td>
 <?php //$t_validation=''; if(userpermission('lr_trips_validate')) { ?>                                  
<?php  //$t_validation =  $facturelists['t_validation'];?>                           
                                   <?php //if($t_validation=="non_valide") { ?> 
                            <a class="icon" href="<?php echo base_url(); ?>incomexpense/editreglement/<?php echo output($incomexpenses['ie_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
<?php //}?>
<?php //}?><!--fin permission-->
								   
						<?php //if(userpermission('lr_trips_detail')) { ?>		   
<a class="icon" href="<?php echo base_url(); ?>incomexpense/details/<?php echo output($incomexpenses['ie_id']); ?>">                           
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php //} ?>
								
						<?php if(userpermission('lr_reglement_delete'))
							   //if(isset(userpermission('lr_reglement_delete'))
								  //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';}
								  { 

								?>		   
<a class="icon" href="<?php echo base_url(); ?>incomexpense/reglement_delete/<?php echo output($incomexpenses['ie_id']); ?>">                           
                              <i class="fa fa-window-close danger"></i>
                            </a>
								   
						<?php } ?>								
								
 <?php if($incomexpenses['ie_banque_emettrice_id']!=0){?>                                  
 
                           <i class="fa fa-window-close text-blue"></i>
                           
 <?php } ?>								
                          </td>
							
					</tr>
                        <?php } ?>
 
                        <?php } ?>
					 
					 </tbody>
                     
                    
                     
                    </table>
                   <?php //} ?>
        </div>
      </div>
   </div>
</section>					  
<!--END RECHERCHE-->					  
					  
                  </div>
                  
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
			
                   <!-- <table id="facturetbl" class="table card-table table-vcenter text-nowrap">-->
                        
                    <!--<table id="facturetbl" class="table table-bordered table-vcenter text-nowrap table-striped"> -->                       
                     
                   
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->


<!-- Debut conteneur-->


<!-- Fin conteneur-->



