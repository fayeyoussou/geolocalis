    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails de la carte carburant N°<?= $cartedetails['cc_numero']; ?> 
                
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Détails de la carte carburant</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">
      <?php
      $totalpaidamt = 0;
/**/      if(count($rechargedetails)>=1) {
      foreach ($rechargedetails as $recharge) {
          $totalpaidamt += $recharge['ccr_amount'];
      } }
      ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><!--Montant total--></span>
                      <span class="info-box-number text-center text-muted mb-0"><?//= $cartedetails['cc_amount']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><!--Montant payé--></span>
                      <span class="info-box-number text-center text-muted mb-0"><?//= $cc_amount; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"></span>
                      <span class="info-box-number text-center text-muted mb-0"><span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
  <?php /*= ($cartedetails['cc_amount'] > $totalpaidamt)?'Restant':'Excès'*/ ?>                  
<?//= preg_replace('/[^\d\.]+/','',$cartedetails['cc_amount'] - $totalpaidamt)  ?> 
                    
<!-- Debut tab--> 
 <div >
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-recharge-tab" data-toggle="pill" href="#custom-tabs-recharge" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">RECHARGE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-bon_carburant-tab" data-toggle="pill" href="#custom-tabs-one-bon_carburant" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">BON CARBURANT</a>
                  </li>
					
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-paiement_carburant-tab" data-toggle="pill" href="#custom-tabs-one-paiement_carburant" role="tab" aria-controls="custom-tabs-one-paiement" aria-selected="false">PAIEMENT CARBURANT</a>
                  </li>					
  <!--                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-pregate-tab" data-toggle="pill" href="#custom-tabs-one-pregate" role="tab" aria-controls="custom-tabs-one-pregate" aria-selected="false">Pregate</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>-->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  
<!--BEGIRN TAB CONTENEUR-->					
                  <div class="tab-pane fade show active" id="custom-tabs-recharge" role="tabpanel" aria-labelledby="custom-tabs-recharge-tab">
<div class="table-responsive">
               <table id="fueltbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>N° chéque</th>
                          <th>N° ticket</th>
                          <th>Prix</th>
                          <th>Quantité</th>
                          <th>Montant</th>
                          <th>Statut</th>
                          <th>Validation</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_carte_carburant_rechargelist)){  $count=1;
                           foreach($fuel_carte_carburant_rechargelist as $fuels){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td><?php echo output($fuels['ccr_fueldate']); ?></td>
                           <td> <?php echo output($fuels['ie_numero']); ?></td>
                           <td><?php echo output($fuels['ccr_number_ticket']); ?></td>
                           <td><?php echo output($fuels['ccr_fuelprice']); ?></td>
                           <td><?php echo output($fuels['ccr_fuel_quantity']); ?></td>
                           <td><?php $montant = $fuels['ccr_fuelprice']*$fuels['ccr_fuel_quantity']; echo output($montant); ?></td>
                           <td><?php echo output($fuels['ccr_statut']); ?></td>
                           <td><?php echo output($fuels['ccr_validation']); ?></td>

                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
            </div>					  
				  </div>	  
<!--END TAB CONTENEUR-->					
					
					
                  <!--BEGIN TAB BON CARBURANT-->
				<div class="tab-pane fade" id="custom-tabs-one-bon_carburant" role="tabpanel" aria-labelledby="custom-tabs-one-bon_carburant-tab">
<div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Numéro</th>
                          <th>Véhicule</th>
                          <th>Quantité</th>
                          <th>Restant</th>
<!--                          <th>Type</th>-->
                          <th>Commentaire</th>
                          <?php if(userpermission('lr_fuel_edit')) { ?>
                          <th>Action</th>
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
                           <td> <?php echo output($fuels['bc_numero']); ?></td>
                           <td> <?php echo output($fuels['v_registration_no']); ?></td>
                           <td><?php echo output($fuels['bc_quantite']); ?></td>
                           <td><?php echo output($fuels['bc_restant']); ?></td>
  <!--                         <td><?php //echo output($fuels['bc_type']); ?></td>-->
                           <td><?php echo output($fuels['bc_desc']); ?></td>
                           <?php if(userpermission('lr_fuel_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>fuel_bon_carburant/editfuel_bon_carburant/<?php echo output($fuels['bc_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                          </td>
                          <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>					
				</div>		
										  
					<!--END TAB BON CARBURANT-->

<!--BEGIN PAIEMENT CARBURANT-->	
<div class="tab-pane fade" id="custom-tabs-one-paiement_carburant" role="tabpanel" aria-labelledby="custom-tabs-one-paiement_carburant-tab">
<div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Numéro</th>
                          <th>Véhicule</th>
                          <th>Quantité</th>
                          <th>Restant</th>
<!--                          <th>Type</th>-->
                          <th>Commentaire</th>
                          <?php if(userpermission('lr_fuel_edit')) { ?>
                          <th>Action</th>
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
                           <td> <?php echo output($fuels['bc_numero']); ?></td>
                           <td> <?php echo output($fuels['v_registration_no']); ?></td>
                           <td><?php echo output($fuels['bc_quantite']); ?></td>
                           <td><?php echo output($fuels['bc_restant']); ?></td>
  <!--                         <td><?php //echo output($fuels['bc_type']); ?></td>-->
                           <td><?php echo output($fuels['bc_desc']); ?></td>
                           <?php if(userpermission('lr_fuel_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>fuel_bon_carburant/editfuel_bon_carburant/<?php echo output($fuels['bc_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                          </td>
                          <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
               </table>
            </div>					
				</div>					
<!--END PAIEMENT CARBURANT-->					
					
					
<!--BEGIN PREGATE-->					
					
<!--<div class="tab-pane fade" id="custom-tabs-one-pregate" role="tabpanel" aria-labelledby="custom-tabs-one-pregate-tab">
	
</div>-->		
<!--END PREGATE-->					
					
					
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>                   
<!-- Fin tab-->                    
                    
                    
                    
                    
                    
                    
                </div>

              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="mt-2 mb-3">
<!--                <a href="#" class="btn btn-sm btn-success <?//= ($cartedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-Addrecharge">Ajouter un paiement</a>-->
<!--                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-carteexpense">Dépenses</a>-->
 
                  
<!--                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-immobilisation">Immobilisation</a> 
          
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-manutention">Manutention</a> --> 
                  
                  <br/>           
                <!--<a href="<?//= base_url(); ?>carte/carte_generation/<?//= $cartedetails['cc_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Aperçu de la carte</a><br>-->

<!--                <a href="<?//= base_url(); ?>carte/carte_generation_pdf/<?//= $cartedetails['cc_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la carte <i class="fa fa-file-pdf text-danger"></i></a> <br>-->                   
<!--                <a href="<?//= base_url(); ?>carte/invoice/<?//= $cartedetails['cc_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generate Invoice</a>
-->                
                <a href="#" class="btn btn-sm btn-success <?= ($cartedetails['cc_restant'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-Addrecharge">AJOUTER UNE RECHARGE</a>
				  
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-bon_carburant">AJOUTER UN BON CARBURANT</a>							  
                <a href="#" class="btn btn-sm btn-gray" data-toggle="modal" data-target="#modal-paiement_carburant">AJOUTER UN PAIEMENT CARBURANT</a>
				  
              <!--  <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a> -->                 
                </div> 
              <br>
              <div class="text-muted">
 
                <p class="text-sm">Informations la carte
                  <b class="d-block">Numéro: <?= $cartedetails['cc_numero']; ?></b>
<!--                  <b class="d-block">Compagnie: <?//= $cartedetails['ccc_name']; ?></b>
-->                  <b class="d-block">Quantité retante: <?= $cartedetails['cc_restant']; ?></b>
                  <b class="d-block">Date achat: <?= $cartedetails['cc_date_achat']; ?></b>
                  <b class="d-block">Date expiration: <?= $cartedetails['cc_date_expiration']; ?></b>
                </p>
                  
<!--                <p class="text-sm">Informations sur la compagnie
                  <b class="d-block">Montant HT: <?//= $cartedetails['t_trip_amount_ht']; ?></b>
                  <b class="d-block">Ristourne: <?//= $cartedetails['t_ristourne_amount']; ?></b>
                  <b class="d-block">Ristourne supplementaire: <?//= $cartedetails['t_ristourne_additional']; ?></b>
                  <b class="d-block">Rabais: <?//= $cartedetails['t_rabais']; ?></b>
                  <b class="d-block">Montant de la carte: <?//= $cartedetails['t_trip_amount']; ?></b>
                </p>  -->                
                  
<!--                  <p class="text-sm">Informations du client
                  <b class="d-block"><?//= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_address']; ?></b>
                </p>
                <p class="text-sm">Informations du chauffeur
                  <?php //if(isset($driverdetails['d_name'])) { ?>
                  <b class="d-block"><?//= $driverdetails['d_name']; ?></b>
                  <b class="d-block"><?//= $driverdetails['d_mobile']; ?></b>
                  <b class="d-block"><?//= $driverdetails['d_licenseno']; ?></b>
                  <?php // } else { echo '<b class="d-block"><span class="badge badge-danger">Encore à attribuer</span></b>'; } ?>
                </p>-->
<!--                 <p class="text-sm">Lien de suivi
                  <b class="d-block"><a target="_new" href="<?//= base_url().'cartetracking/'.$cartedetails['t_trackingcode']; ?>"><?//= base_url().'cartetracking/'.$cartedetails['t_trackingcode']; ?></a></b>
                </p>
                <p><div class="col-6"><a href="<?//= base_url() ?>carte/sendtracking?email=<?//= urlencode($customerdetails['c_email']); ?>&trackingcode=<?//= $cartedetails['t_trackingcode'] ?>&cc_id=<?//= $cartedetails['cc_id'] ?>" class="btn btn-sm btn-success">Partager avec le client</a></div></p>-->
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
    </section>
<div class="modal fade show" id="modal-Addrecharge" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Effectuer une recharge</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="triprecharges" action="<?= base_url() ?>fuel_carte_carburant/insertfuel_carte_carburant_recharge" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant restant</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="cc_restant" value="<?= $cartedetails['cc_restant']; ?>" id="totalamount" placeholder="Saisir Montant Total" disabled>
                    </div>
                  </div>
 
					
				<div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Numéro chéque</label>
                    <div class="form-group col-sm-8">
					<select id="ccr_incomeexpense_id"  class="form-control selectized"  name="ccr_incomeexpense_id" required="true">
                        <option value="">Selectionner le Numéro chéque</option>
                        <?php  foreach ($incomeexpenselist as $key => $incomeexpenselists) { ?>
                        <option value="<?php echo output($incomeexpenselists['ie_id']) ?>"><?php echo output($incomeexpenselists['ie_numero_enregistrement']).' - N° '. output($incomeexpenselists['ie_numero']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>					
                    
                <div class="form-group row">
                    <label for="ccr_number_ticket" class="col-sm-4 col-form-label">Numéro ticket (Reçu)</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="ccr_number_ticket" id="ccr_number_ticket" placeholder="Numéro ticket (Reçu)">
                    </div>
                  </div>  
					
                <div class="form-group row">
                    <label for="ccr_fueldate" class="col-sm-4 col-form-label">Date</label>
                    <div class="form-group col-sm-8">
                       <input type="text" name="ccr_fueldate" class="form-control datepicker" placeholder="Date" >
                    </div>
                  </div>   
					
					
                   					
                    
                   <div class="form-group row">
                    <label for="ccr_desc" class="col-sm-4 col-form-label">Description</label>
                    <div class="form-group col-sm-8">
                        <textarea class="form-control" id="ccr_desc" autocomplete="off" placeholder="Description"  name="ccr_desc"></textarea>
                    </div>
                  </div>
                </div>
            
            
            
            
                 <input type="text" class="form-control" value="<?= $cartedetails['cc_id']; ?>" name="ccr_carte_id" id="ccr_carte_id" placeholder="">
			     <input type="hidden" id="ccr_created_date" name="ccr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer une recharge</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


<!--BEGIN BON CARBURANT-->
<div class="modal fade show" id="modal-bon_carburant" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AJOUTER UN BON CARBURANT <?//= $cartedetails['cc_restant']; ?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="triprecharges" action="<?= base_url() ?>fuel_bon_carburant/insertfuel_bon_carburant" method="post">
                <div class="card-body">

                  <div class="form-group row">
                    <label for="bc_numero" class="col-sm-4 col-form-label">Numéro BC</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="bc_numero" id="bc_numero" placeholder="Numéro BC" >
                    </div>
                  </div>
					
				<div class="form-group row">
                    <label for="bc_vehicule_id" class="col-sm-4 col-form-label">Véhicule</label>
                    <div class="form-group col-sm-8">
					<select id="bc_vehicule_id"  class="form-control selectized"  name="bc_vehicule_id" required="true">
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>					

                  <div class="form-group row">
                    <label for="bc_date" class="col-sm-4 col-form-label">Date</label>
                    <div class="form-group col-sm-8">
                       <input type="text" required="true" class="form-control datepicker" id="bc_date" name="bc_date"  placeholder="Date">
                    </div>
                  </div>   
					
					
					<div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Quantité (L)</label>
                    <div class="form-group col-sm-8">
                        <input type="text" class="form-control" id="bc_quantite" name="bc_quantite" placeholder="Quantité (L)">
                    </div>
                  </div>	
					
						
                    
                   <div class="form-group row">
                    <label for="bc_desc" class="col-sm-4 col-form-label">Commentaire</label>
                    <div class="form-group col-sm-8">
                      <input type="text" class="form-control" id="bc_desc"  name="bc_desc" placeholder="Commentaire sur le carburant">
                    </div>
                  </div>
                </div>
            
                 <input type="hidden" id="bc_created_date" name="bc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">

                 <input type="hidden" class="form-control" value="<?= $cartedetails['cc_id']; ?>" name="bc_carte_id" id="bc_carte_id" >

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">ENREGISTRER BON CARBURANT</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- END PREGATE-->

<!--BEGIN ADD PAIEMENT CARBURANT-->
<div class="modal fade show" id="modal-paiement_carburant" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">AJOUTER UN PAIEMENT CARBURANT <?//= $cartedetails['cc_restant']; ?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="triprecharges" action="<?= base_url() ?>fuel_bon_carburant/insertfuel_bon_carburant" method="post">
                <div class="card-body">

                  <div class="form-group row">
                    <label for="bc_numero" class="col-sm-4 col-form-label">Numéro BC</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="bc_numero" id="bc_numero" placeholder="Numéro BC" >
                    </div>
                  </div>
					
				<div class="form-group row">
                    <label for="bc_vehicule_id" class="col-sm-4 col-form-label">Véhicule</label>
                    <div class="form-group col-sm-8">
					<select id="bc_vehicule_id"  class="form-control selectized"  name="bc_vehicule_id" required="true">
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>					

                  <div class="form-group row">
                    <label for="bc_date" class="col-sm-4 col-form-label">Date</label>
                    <div class="form-group col-sm-8">
                       <input type="text" required="true" class="form-control datepicker" id="bc_date" name="bc_date"  placeholder="Date">
                    </div>
                  </div>   
					
					
					<div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Quantité (L)</label>
                    <div class="form-group col-sm-8">
                        <input type="text" class="form-control" id="bc_quantite" name="bc_quantite" placeholder="Quantité (L)">
                    </div>
                  </div>	
					
						
                    
                   <div class="form-group row">
                    <label for="bc_desc" class="col-sm-4 col-form-label">Commentaire</label>
                    <div class="form-group col-sm-8">
                      <input type="text" class="form-control" id="bc_desc"  name="bc_desc" placeholder="Commentaire sur le carburant">
                    </div>
                  </div>
                </div>
            
                 <input type="hidden" id="bc_created_date" name="bc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">

                 <input type="hidden" class="form-control" value="<?= $cartedetails['cc_id']; ?>" name="bc_carte_id" id="bc_carte_id" >

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">ENREGISTRER BON CARBURANT</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!--END ADD PAUEMENT CARBURANT-->



	
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>