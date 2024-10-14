      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails de la mission : <?= output($missiondetails['mi_numero']) ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Accueil</a></li>
              <li class="breadcrumb-item active">Détails de la mission</li>
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
                    <b>Nombre PREGATE</b> <a class="float-right"><?//= count($bookings); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre EIR PLEIN</b> <a class="float-right"><?//= count($conteneur); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nombre EIR VIDE</b> <a class="float-right"><?//= count($customer); ?></a>
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
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">INFORMATION SUR LA MISSION</a></li>
                  <li class="nav-item"><a class="nav-link " href="#pregate" data-toggle="tab">PREGATE</a></li>
                  <li class="nav-item"><a class="nav-link" href="#eir_plein" data-toggle="tab">EIR PLEIN</a></li>
                <li class="nav-item"><a class="nav-link" href="#eir_vide" data-toggle="tab">EIR VIDE</a></li>
<!--                 <li class="nav-item"><a class="nav-link" href="#ristourne" data-toggle="tab">Ristourne</a></li>-->
               </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane " id="pregate">
					
					  <div class="mt-2 mb-3">
					    <a href="#" class="btn btn-sm btn-danger <?//= ($incomexpensedetails['ie_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-pregate">Ajouter pregate</a><br>
					  </div>
                     <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Numéro </td>
                      <td><?= output($missiondetails['mi_numero']) ?></td>
                    </tr>
                    <tr>
                      <td>Statut</td>
                      <td><?//= output($missiondetails['mi_isactive']) ?><span class="badge <?php echo ($missiondetails['mi_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_isactive']=='1') ? 'Plein' : 'Vide'; ?></span> </td>
                    </tr>
                    <tr>
                      <td>Validation</td>
                      <td><?//= output($missiondetails['mi_validation']) ?><span class="badge <?php echo ($missiondetails['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span></td>
                    </tr>

                     <tr>
                      <td>Montant carburant </td>
                      <td><?= output($missiondetails['mi_carte_carburant_amount']) ?></td>
                    </tr>
                     <tr>
                      <td>Montant Pèage</td>
                      <td><?= output($missiondetails['mi_carte_peage_amount']) ?></td>
                    </tr>

					  <tr>
                      <td>Remorque</td>
                      <td><?= output($missiondetails['mi_vehicle_remorque']) ?></td>
                    </tr>
                     <tr>
                      <td>Date de la mission</td>
                      <td><?= output($missiondetails['mi_date_mission']) ?></td>
                    </tr>
                     <tr>
                      <td>Date départ </td>
                      <td><?= output($missiondetails['mi_date_depart']) ?></td>
                    </tr>
                     <tr>
                      <td>Date retour</td>
                      <td><?= output($missiondetails['mi_date_retour']) ?></td>
                    </tr>
                  </tbody>
                </table>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="eir_plein">
                    <!-- The timeline -->
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Numéro </td>
                      <td><?= output($missiondetails['mi_numero']) ?></td>
                    </tr>
                    <tr>
                      <td>Statut</td>
                      <td><?//= output($missiondetails['mi_isactive']) ?><span class="badge <?php echo ($missiondetails['mi_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_isactive']=='1') ? 'Plein' : 'Vide'; ?></span> </td>
                    </tr>
                    <tr>
                      <td>Validation</td>
                      <td><?//= output($missiondetails['mi_validation']) ?><span class="badge <?php echo ($missiondetails['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span></td>
                    </tr>
                      <tr>
                      <td>Véhicule</td>
                      <td><?= output($missiondetails['mi_vehicle']) ?></td>
                    </tr>
                    <tr>
                      <td>Conducteur</td>
                      <td><?= output($missiondetails['mi_driver']) ?></td>
                    </tr>
<!-- -->            <tr>
                      <td>Montant</td>
                      <td><?= output($missiondetails['mi_amount']) ?></td>
                    </tr>

                     <tr>
                      <td>Lieu de restitution</td>
                      <td><?= output($missiondetails['mi_lieu_restitution']) ?></td>
                    </tr>

                     <tr>
                      <td>Date départ </td>
                      <td><?= output($missiondetails['mi_date_depart']) ?></td>
                    </tr>
                     <tr>
                      <td>Date retour</td>
                      <td><?= output($missiondetails['mi_date_retour']) ?></td>
                    </tr>
                  </tbody>
                </table>
                  </div>
					
<!-- BEGIN TAB EIR-->	
<div class="tab-pane" id="eir_vide">
<table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Numéro </td>
                      <td><?= output($missiondetails['mi_numero']) ?></td>
                    </tr>
                    <tr>
                      <td>Statut</td>
                      <td><?//= output($missiondetails['mi_isactive']) ?><span class="badge <?php echo ($missiondetails['mi_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_isactive']=='1') ? 'Plein' : 'Vide'; ?></span> </td>
                    </tr>
                    <tr>
                      <td>Validation</td>
                      <td><?//= output($missiondetails['mi_validation']) ?><span class="badge <?php echo ($missiondetails['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span></td>
                    </tr>
                      <tr>
                      <td>Véhicule</td>
                      <td><?= output($missiondetails['mi_vehicle']) ?></td>
                    </tr>

                     <tr>
                      <td>Date de la mission</td>
                      <td><?= output($missiondetails['mi_date_mission']) ?></td>
                    </tr>
                     <tr>
                      <td>Date départ </td>
                      <td><?= output($missiondetails['mi_date_depart']) ?></td>
                    </tr>
                     <tr>
                      <td>Date retour</td>
                      <td><?= output($missiondetails['mi_date_retour']) ?></td>
                    </tr>
                  </tbody>
                </table>                     
	
                  </div>					
<!-- END TAB EIR-->					

                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Numéro </td>
                      <td><?= output($missiondetails['mi_numero']) ?></td>
                    </tr>
                    <tr>
                      <td>Statut</td>
                      <td><?//= output($missiondetails['mi_isactive']) ?><span class="badge <?php echo ($missiondetails['mi_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_isactive']=='1') ? 'Plein' : 'Vide'; ?></span> </td>
                    </tr>
                    <tr>
                      <td>Validation</td>
                      <td><?//= output($missiondetails['mi_validation']) ?><span class="badge <?php echo ($missiondetails['mi_validation']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missiondetails['mi_validation']=='1') ? 'Validé' : 'Non validé'; ?></span></td>
                    </tr>
                      <tr>
                      <td>Véhicule</td>
                      <td><?= output($missiondetails['mi_vehicle']) ?></td>
                    </tr>
                    <tr>
                      <td>Conducteur</td>
                      <td><?= output($missiondetails['mi_driver']) ?></td>
                    </tr>
<!-- -->            <tr>
                      <td>Montant</td>
                      <td><?= output($missiondetails['mi_amount']) ?></td>
                    </tr>

                     <tr>
                      <td>Lieu de restitution</td>
                      <td><?= output($missiondetails['mi_lieu_restitution']) ?></td>
                    </tr>
                     <tr>
                      <td>Frais AGS</td>
                      <td><?= output($missiondetails['mi_frais_ags']) ?></td>
                    </tr>
                     <tr>
                      <td>Montant carburant </td>
                      <td><?= output($missiondetails['mi_carte_carburant_amount']) ?></td>
                    </tr>
                     <tr>
                      <td>Montant Pèage</td>
                      <td><?= output($missiondetails['mi_carte_peage_amount']) ?></td>
                    </tr>

					  
					  
					  <tr>
                      <td>Remorque</td>
                      <td><?= output($missiondetails['mi_vehicle_remorque']) ?></td>
                    </tr>
                     <tr>
                      <td>Date de la mission</td>
                      <td><?= output($missiondetails['mi_date_mission']) ?></td>
                    </tr>
                     <tr>
                      <td>Date départ </td>
                      <td><?= output($missiondetails['mi_date_depart']) ?></td>
                    </tr>
                     <tr>
                      <td>Date retour</td>
                      <td><?= output($missiondetails['mi_date_retour']) ?></td>
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
  
<!--BEGIN PREGATE-->
<div class="modal fade show" id="modal-pregate" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter Pregate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="trippayments" action="<?= base_url() ?>incomexpense/trippayment" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant Total du réglement</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="ie_amount" value="<?//= $incomexpensedetails['ie_amount']; ?>" id="ie_amount"   placeholder="Saisir Montant Total" disabled>
                    </div>
                  </div>

										
					
					
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Numéro</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="pr_numero" value=""  >
                    </div>
                  </div> 
					
  
					
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Date reception</label>
                    <div class="form-group col-sm-8">
                        <input type="text" class="form-control datepicker" id="pr_date_reception" name="pr_date_reception" value="" placeholder="Date reception">
                    </div>
                  </div>
					
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Numéro</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="pr_numero" value=""  >
                    </div>
                  </div>
					
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Numéro</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="pr_numero" value=""  >
                    </div>
                  </div>					
					
					
					
                    
<!--                    <div class="form-group row">
                    <label for="tp_type" class="col-sm-4 col-form-label">Type</label>
                    <div class="form-group col-sm-8">
                     <select name="tp_type" id="tp_type" required="true" class="form-control">
                      <option value="">Sélectionner un Type </option>
                      <option value="Solder">Solder</option>

                      <option value="Avance">Avance</option>						 
                    </select>
                    </div>
                  </div>-->
                    

					
					
                    
                <!--<div class="form-group row">
                    <label for="tp_numero_bordereau" class="col-sm-4 col-form-label">Numéro bordereau</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_numero_bordereau" id="tp_numero_bordereau" placeholder="Numéro bordereau">
                    </div>
                  </div>-->                    
                    
                   <!--<div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Saisir Notes"></textarea>
                    </div>
                  </div>-->
                </div>

                 <input type="hidden" class="form-control" value="<?= $missiondetails['mi_id']; ?>" name="pr_mission_id" id="pr_mission_id" >
<!--                <input type="hidden" class="form-control" value="<?//= date('Y-m-d'); ?>" name="tp_date" id="tp_date" placeholder="tp_date">--> 
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer pregate</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!--END PREGATE-->
