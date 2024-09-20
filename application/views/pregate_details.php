 
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails du pregate : <?= output($pregatedetails['pr_numero']) ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Accueil</a></li>
              <li class="breadcrumb-item active">Détails du pregate</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      
    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 
                </div>

<!--                <h3 class="profile-username text-center"><?//= ucwords($pregatedetails['v_name']); ?></h3>-->

<!--                <p class="text-muted text-center"><?//= ucwords($pregatedetails['v_type']); ?></p>-->

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nombre de Mission</b> <a class="float-right"><?//= count($bookings); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre de EIR PLEINS</b> <a class="float-right"><?//= count($conteneur); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre de EIR VIDES</b> <a class="float-right"><?//= count($customer); ?></a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Informations sur le pregate</a></li>
                  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Factures</a></li>
                  <li class="nav-item"><a class="nav-link" href="#vechicle_geofence" data-toggle="tab">Conteneurs</a></li>
                <li class="nav-item"><a class="nav-link" href="#customer" data-toggle="tab">EIR PLEINS</a></li>
                 <li class="nav-item"><a class="nav-link" href="#ristourne" data-toggle="tab">Eir VIDES</a></li>
               </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane " id="bookings">
					  
					  
					  
					  
                     <table id="bookingstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      N° Facture
                                  </th>
                                  <th class="percent25">
                                      Clients
                                  </th>
                                  <th class="percent25">
                                    Montant facture
                                  </th>
                                  <th class="percent25">
                                    Ristourne
                                  </th>
 
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($bookings)) {
                            $count=1;
                            foreach($bookings as $bookingsdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                   <td><?php echo output($bookingsdata['t_num_facture']);?></td>
                                  <td>
                                     <?php echo output($bookingsdata['t_customer_details']->c_name);?>
                                  </td>
                                  <td>
                                     <?php //echo output($bookingsdata['t_trip_amount']);?><?php  if($bookingsdata['t_trip_amount']==0) { echo '<span class="badge badge-danger">Facture non validée</span>';}else { echo $bookingsdata['t_trip_amount']; }?>
                                  </td>
                                  <td>
                                     <?php echo output($bookingsdata['t_ristourne_amount']);?>
                                  </td>
                                  <td> <!--<a class="icon" target="_blank" href="<?php //echo base_url(); ?>trips/details/<?php //echo output($bookingsdata['t_id']); ?>">
                                     <i class="fa fa-eye"></i>
                                    </a> -->
                                  </td>
                              </tr>
                              <?php } } ?>
                          </tbody>
                      </table>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="vechicle_geofence">
                    <!-- The timeline -->
                    <table id="vgeofencetbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Numéro
                                  </th>
                                  <th class="percent25">
                                      Zone
                                  </th>
                                   <th class="percent25">
                                      Pied
                                  </th>
								  <th class="percent25">
                                    Action
                                </th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($conteneur)){ 
                            $count=1;
                            foreach($conteneur as $conteneur){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($conteneur['co_numero_conteneur']);?>
                                  </td>
                                  <td>
                                  <?php if(isset($conteneur['co_type_conteneur'])){$type=$conteneur['co_type_conteneur']; ?><?php if($type=='20_pieds'){ echo "20 pieds";} else {echo "40 pieds";} ?><?php } ?></td>
                                  <td>
                                  <?php if(isset($conteneur['zone_name']->z_destination)){echo output($conteneur['zone_name']->z_destination) ;} ?></td>								  
								  
                                  <td> <!--<a class="icon" href="<?php //echo base_url(); ?>geofence">
                                     <i class="fa fa-eye"></i>
                                    </a> -->
                                  </td>
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>
					
<!-- BEGIN TAB CUSTOMER-->	
<div class="tab-pane" id="customer">
                     <table id="incomexpenstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Date
                                  </th>
                                  <th class="percent25">
                                      Numéro transaction
                                  </th>

                                  <th class="percent25">
                                      Statut
                                  </th>
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($eir_plein)){ 
                            $count=1;
                            foreach($eir_plein as $eir_plein){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>

                                  <td>
                                     <?php echo output($eir_plein['ei_date']);?> -  <?php echo output($eir_plein['ei_heure']);?>
                                  </td>
                                  <td>
                                     <?php echo output($eir_plein['ei_numero_transaction']);?>
                                  </td>
                                  <td>
                                     <?php echo ($eir_plein['ei_validation']=='1')?'<span class="right badge badge-success">Validé</span>':'<span class="right badge badge-danger">Non validé</span>'; ?>
                                  </td>
                                 <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>                                 
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>					
<!-- END TAB CUSTOMER-->					

                  <div class="tab-pane" id="ristourne">
					  
<div class="mt-2 mb-3">
<!--                <a href="#" class="btn btn-sm btn-success <?//= ($incomexpensedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un paiement</a>-->
<!--                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-incomexpenseexpense">Dépenses</a>-->
 
                                                
                    <br/>           
             <!--   <a href="<?//= base_url(); ?>incomexpense/incomexpense_generation/<?//= $incomexpensedetails['tp_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Aperçu de la incomexpense</a><br>-->

<!--                <a href="<?//= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> <br>-->                   
<!--                <a href="<?//= base_url(); ?>incomexpense/invoice/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generate Invoice</a>
-->                
<!--                <a href="#" class="btn btn-sm btn-danger <?//= ($incomexpensedetails['ie_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un paiement ristourne</a>-->
  
<!--	 <a href="#" class="btn btn-sm btn-success <?//= ($tripdetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Add Payment</a>		-->		  
<!--<a href="<?//= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?//= $incomexpensedetails['ie_id']; ?>" target="_blank" class="btn btn-sm btn-success <?//= (($paiementreglementdetails==0))?'disabled':'' ?>" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a>--> <br>		
				  
				  
                <!--<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a> -->                 
                </div>					  
					  
					  
                     <div class="tab-pane" id="customer">
                     <table id="incomexpenstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Date
                                  </th>
                                  <th class="percent25">
                                      Numéro transaction
                                  </th>

                                  <th class="percent25">
                                      Statut
                                  </th>
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($eir_vide)){ 
                            $count=1;
                            foreach($eir_vide as $eir_vide){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>

                                  <td>
                                     <?php echo output($eir_vide['ei_date']);?> -  <?php echo output($eir_vide['ei_heure']);?>
                                  </td>
                                  <td>
                                     <?php echo output($eir_vide['ei_numero_transaction']);?>
                                  </td>
                                  <td>
                                     <?php echo ($eir_vide['ei_validation']=='1')?'<span class="right badge badge-success">Validé</span>':'<span class="right badge badge-danger">Non validé</span>'; ?>
                                  </td>
                                 <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>                                 
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Numéro </td>
                      <td><?= output($pregatedetails['pr_numero']) ?></td>
                    </tr>
<!--                    <tr>
                      <td>Nom</td>
                      <td><?//= output($pregatedetails['v_name']) ?></td>
                    </tr>-->
                    <tr>
                      <td>Date reception</td>
                      <td><?= output($pregatedetails['pr_date_reception']) ?></td>
                    </tr>
                      <tr>
                      <td>Date line</td>
                      <td><?= output($pregatedetails['pr_date_line']) ?></td>
                    </tr>
                    <tr>
                      <td>Nombre de conteneurs</td>
                      <td><?= output($pregatedetails['pr_nombre_conteneur']) ?></td>
                    </tr>
<!--                    <tr>
                      <td>N° du moteur</td>
                      <td><?//= output($pregatedetails['v_engine_no']) ?></td>
                    </tr>-->

                     <!--<tr>
                      <td>Type</td>
                      <td><?//= output($pregatedetails['v_type']) ?></td>
                    </tr>-->
                     <tr>
                      <td>Statut</td>
                      <td><?= output($pregatedetails['pr_statut']) ?></td>
                    </tr>
                     <tr>
                      <td>Note </td>
                      <td><?= output($pregatedetails['pr_notes']) ?></td>
                    </tr>
                    <tr>
                      <td>Date de création</td>
                      <td><?= output($pregatedetails['pr_created_date']) ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-3">
                 <!-- <a href="<?//= base_url(); ?>transition/edittransition/<?//= $pregatedetails['tra_id']; ?>">
                   <button type="button" class="btn btn-block btn-success btn-sm">Modifier Information</button>
                 </a>
-->                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class="modal fade show" id="modal-AddPayment" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Effectuer le paiement ristourne</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-cheque-tab" data-toggle="pill" href="#custom-tabs-one-cheque" role="tab" aria-controls="custom-tabs-one-cheque" aria-selected="true">CHEQUE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-espece-tab" data-toggle="pill" href="#custom-tabs-one-espece" role="tab" aria-controls="custom-tabs-one-espece" aria-selected="false">ESPECE</a>
                  </li>


                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-cheque" role="tabpanel" aria-labelledby="custom-tabs-one-cheque-tab">

<!-- BEGIN -->					  
					  

            <?php echo (isset($incomexpensedetails))?'Modifier une opération de banque':'Ajouter une opération de banque' ?> N° B<?= $numero_compteurbanque; ?>
            
					  
<div class="modal-body">
        <form class="form-horizontal" id="trippayments" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_paiement_ristourne_banque'; ?>" method="post">
                <div class="card-body">
					
					
					
					
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="ie_amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Montant">
                    </div>
                  </div>
					
				<div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">N° chéque </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro du chéque">
                    </div>
                  </div>
					
					
<div class="form-group row">
                    <label for="tp_type" class="col-sm-4 col-form-label">Banque émettrice</label>
                    <div class="form-group col-sm-8">
                     <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="">Sélectionner Banque émettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>					
					
					
				<div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Date reception </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date de reception">
                    </div>
                  </div>					


					<div class="form-group row">
                    <label for="tp_type" class="col-sm-4 col-form-label">Facture</label>
                    <div class="form-group col-sm-8">
                     <select id="ie_trip_id" class="form-control selectized" style="width: 100%;"  name="ie_trip_id[]" multiple>
                        <option value="">Sélectionner la facture </option>
                        <?php  foreach ($facture_pregate as $key => $facturelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php //echo output($facturelists['t_id']) ?><?php echo output($facturelists['t_num_facture']); ?> - <?php echo output($facturelists['t_trip_amount']); ?> - BL: <?php echo output($facturelists['t_reference']); ?> </option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>					
					

                </div>
            
            
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "BANQUE"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "expense"; ?>"><!--SORITE-->
                  <input type="hidden" id="ie_espece_cheque" name="ie_espece_cheque" value="<?php echo "CHEQUE"; ?>"><!--ENTREE-->
                  <input type="hidden" id="ie_ristourne_tva" name="ie_ristourne_tva" value="<?php echo "RISTOURNE"; ?>"><!--RISTOURNE-->			        
			  	  <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="B<?= $numero_compteurbanque; ?>">	
			
			  	  <input type="hidden" id="ie_pregate_id" name="ie_pregate_id" value="<?= $pregatedetails['tra_id']; ?>	">	
			
		
			
			
<!--                 <input type="hidden" class="form-control" value="<?//= date('Y-m-d'); ?>" name="tp_date" id="tp_date" placeholder="tp_date">-->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer Paiement Ristourne</button>
      </div>
      </form>
    </div>					  
					  
<!-- END-->                  </div>
					  
					  
                  <div class="tab-pane fade" id="custom-tabs-one-espece" role="tabpanel" aria-labelledby="custom-tabs-one-espece-tab">

					  
	  B
                  </div>
					  
					  
					  
                </div>
              </div>
              <!-- /.card -->
            </div>		  
		  
		  
    </div>
  </div>
</div>
</div>