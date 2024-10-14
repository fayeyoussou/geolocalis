 
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails du transitaire : <?= output($cartedetails['cc_numero']) ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Accueil</a></li>
              <li class="breadcrumb-item active">Détails du transitaire</li>
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

<!--                <h3 class="profile-username text-center"><?//= ucwords($cartedetails['v_name']); ?></h3>-->

<!--                <p class="text-muted text-center"><?//= ucwords($cartedetails['v_type']); ?></p>-->

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nombre de factures</b> <a class="float-right"><?//= count($bookings); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre de conteneurs</b> <a class="float-right"><?//= count($conteneur); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre de clients</b> <a class="float-right"><?//= count($customer); ?></a>
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
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Informations sur le transitaire</a></li>
                  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Factures</a></li>
                  <li class="nav-item"><a class="nav-link" href="#vechicle_geofence" data-toggle="tab">Conteneurs</a></li>
                <li class="nav-item"><a class="nav-link" href="#customer" data-toggle="tab">Clients</a></li>
                 <li class="nav-item"><a class="nav-link" href="#ristourne" data-toggle="tab">Ristourne</a></li>
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
                                      Description
                                  </th>
                                  <th class="percent25">
                                    Montant
                                  </th>
                                  <th class="percent25">
                                      Type
                                  </th>
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($vechicle_incomexpense)){ 
                            $count=1;
                            foreach($vechicle_incomexpense as $incomexpensdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($incomexpensdata['ie_date']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_description']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_amount']);?>
                                  </td>
                                  <td>
                                     <?php echo ($incomexpensdata['ie_type']=='income')?'<span class="right badge badge-success">Income</span>':'<span class="right badge badge-danger">Expense</span>'; ?>
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
                <a href="#" class="btn btn-sm btn-danger <?//= ($incomexpensedetails['ie_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un paiement ristourne</a>
  
<!--	 <a href="#" class="btn btn-sm btn-success <?//= ($tripdetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Add Payment</a>		-->		  
<!--<a href="<?//= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?//= $incomexpensedetails['ie_id']; ?>" target="_blank" class="btn btn-sm btn-success <?//= (($paiementreglementdetails==0))?'disabled':'' ?>" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a>--> <br>		
				  
				  
                <!--<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a> -->                 
                </div>					  
					  
					  
                     <table id="incomexpenstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Facture
                                  </th>
                                  <th class="percent25">
                                      Date
                                  </th>
                                  <th class="percent25">
                                    Montant facture
                                  </th>
                                   <th class="percent25">
                                    Ristourne
                                  </th>
								  <th class="percent25">
                                      Statut
                                  </th>
                                  <th class="percent15">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($ristourne)){ 
                            $count=1;
                            foreach($ristourne as $ristourne){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($ristourne['t_num_facture']);?>
                                  </td>
                                  <td>
                                     <?php echo output($ristourne['t_date_facture']);?>
                                  </td>
                                  <td>
                                     <?php echo output($ristourne['t_trip_amount']);?>
                                  </td>
                                    <td>
                                     <?php echo output($ristourne['t_ristourne_amount']);?>
                                  </td>
								  <td>
									  
								  
									  
                                     <?php echo ($ristourne['t_ristourne_paye']=='paye')?'<span class="right badge badge-success">PAYE</span>':'<span class="right badge badge-danger">NON PAYE</span>'; ?>
                                  </td>
                                 <td> <a class="icon" href="">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>                                 
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Nom </td>
                      <td><?= output($cartedetails['cc_numero']) ?></td>
                    </tr>
<!--                    <tr>
                      <td>Nom</td>
                      <td><?//= output($cartedetails['v_name']) ?></td>
                    </tr>-->
                    <tr>
                      <td>Structure</td>
                      <td><?= output($cartedetails['cc_amount']) ?></td>
                    </tr>
                      <tr>
                      <td>Téléphone mobile</td>
                      <td><?= output($cartedetails['cc_restant']) ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?= output($cartedetails['cc_date_achat']) ?></td>
                    </tr>
<!--                    <tr>
                      <td>N° du moteur</td>
                      <td><?//= output($cartedetails['v_engine_no']) ?></td>
                    </tr>-->

                     <!--<tr>
                      <td>Type</td>
                      <td><?//= output($cartedetails['v_type']) ?></td>
                    </tr>-->
                     <tr>
                      <td>Adresse</td>
                      <td><?= output($cartedetails['cc_date_expiration']) ?></td>
                    </tr>
                     <tr>
                      <td>Date de création </td>
                      <td><?= output($cartedetails['cc_created_date']) ?></td>
                    </tr>
                     <tr>
                      <td>Date de Modification</td>
                      <td><?//= output($cartedetails['tra_modified_date']) ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-3">
                 <!-- <a href="<?//= base_url(); ?>transition/edittransition/<?//= $cartedetails['tra_id']; ?>">
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
					  

            <?php //echo (isset($incomexpensedetails))?'Modifier une opération de banque':'Ajouter une opération de banque' ?> N° B<?//= $numero_compteurbanque; ?>
            
					  
<div class="modal-body">
        <form class="form-horizontal" id="trippayments" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_paiement_ristourne_banque'; ?>" method="post">
                <div class="card-body">
					
					
					
					
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="ie_amount" value="<?php// echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Montant">
                    </div>
                  </div>
					
				<div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">N° chéque </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="ie_numero" value="<?php //echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro du chéque">
                    </div>
                  </div>
					
					
					
					
					
				<div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Date reception </label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date de reception">
                    </div>
                  </div>					


										
					

                </div>
            
            

			
		
			
			
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