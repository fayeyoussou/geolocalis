 
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails du transitaire : <?= output($transitairedetails['tra_name']) ?>
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

<!--                <h3 class="profile-username text-center"><?//= ucwords($transitairedetails['v_name']); ?></h3>-->

<!--                <p class="text-muted text-center"><?//= ucwords($transitairedetails['v_type']); ?></p>-->

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nombre de factures</b> <a class="float-right"><?= count($bookings); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre de conteneurs</b> <a class="float-right"><?= count($conteneur); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre de clients</b> <a class="float-right"><?= count($customer); ?></a>
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
                 <li class="nav-item"><a class="nav-link" href="#vechicle_incomexpense" data-toggle="tab">Ristourne</a></li>
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

                  <div class="tab-pane" id="customer2">
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
                            <?php if(!empty($customer)){ 
                            $count=1;
                            foreach($customer as $customer){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($customer['c_name']);?>
                                  </td>
                                  <td>
                                     <?php echo output($customer['c_name']);?>
                                  </td>
                                  <td>
                                     <?php echo output($customer['c_name']);?>
                                  </td>
                                  <td>
                                     <?php //echo ($incomexpensdata['ie_type']=='income')?'<span class="right badge badge-success">Income</span>':'<span class="right badge badge-danger">Expense</span>'; ?>
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
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Nom </td>
                      <td><?= output($transitairedetails['tra_name']) ?></td>
                    </tr>
<!--                    <tr>
                      <td>Nom</td>
                      <td><?//= output($transitairedetails['v_name']) ?></td>
                    </tr>-->
                    <tr>
                      <td>Structure</td>
                      <td><?= output($transitairedetails['tra_structure']) ?></td>
                    </tr>
                      <tr>
                      <td>Téléphone mobile</td>
                      <td><?= output($transitairedetails['tra_mobile']) ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?= output($transitairedetails['tra_email']) ?></td>
                    </tr>
<!--                    <tr>
                      <td>N° du moteur</td>
                      <td><?//= output($transitairedetails['v_engine_no']) ?></td>
                    </tr>-->

                     <!--<tr>
                      <td>Type</td>
                      <td><?//= output($transitairedetails['v_type']) ?></td>
                    </tr>-->
                     <tr>
                      <td>Adresse</td>
                      <td><?= output($transitairedetails['tra_address']) ?></td>
                    </tr>
                     <tr>
                      <td>Date de création </td>
                      <td><?= output($transitairedetails['tra_created_date']) ?></td>
                    </tr>
                     <tr>
                      <td>Date de Modification</td>
                      <td><?= output($transitairedetails['tra_modified_date']) ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-3">
                 <!-- <a href="<?//= base_url(); ?>transition/edittransition/<?//= $transitairedetails['tra_id']; ?>">
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
