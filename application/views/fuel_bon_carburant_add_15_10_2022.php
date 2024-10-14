    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier un bon de carburant':'Ajouter un bon de carburant' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Cartes carburant</a></li>
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
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier bon de carburant':'Ajouter bon de carburant' ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
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
                          <label class="form-label">Carte<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="bc_carte_id"  class="form-control selectized"  name="bc_carte_id" >
                        <option value="">Selectionner la carte</option>
                        <?php  foreach ($carte_carburantlist as $key => $carte_carburantlists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['bc_carte_id'] == $carte_carburantlists['cc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantlists['cc_id']) ?>"><?php echo output($carte_carburantlists['cc_name']).' - '. output($carte_carburantlists['cc_numero']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
					  <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Numéro<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="bc_numero" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_numero']:'' ?>" name="bc_numero" placeholder="Numéro">
                      </div>
                    </div>

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
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="bc_date" name="bc_date" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_date']:'echo date("Y-m-d")' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité (L)<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="bc_quantite" name="bc_quantite" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_quantite']:'' ?>" placeholder="Quantité (L)">

                      </div>
                    </div>
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
                 <input type="hidden" id="bc_created_date" name="bc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_bon_carburantdetails))?'Modifier carburant':'Ajouter carburant' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  
				  
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

				  <!--BEGIN JOURNAL-->
<form method="post" id="fuel_report" class="card basicvalidation" action="">
         <div class="card-body">
            <div class="row">
				
				<div class="col-sm-4 col-md-3">
                          <label class="form-label">Station<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="cc_compagnie_id"  class="form-control selectized"  name="cc_compagnie_id" required="true">
                        <option value="all">Selectionner la Station service</option>
                        <?php  foreach ($carte_carburantcompagnielist as $key => $carte_carburantcompagnielists) { ?>
                        <option  value="<?php echo output($carte_carburantcompagnielists['ccc_id']) ?>"><?php echo output($carte_carburantcompagnielists['ccc_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
				
				
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_from" class="col-sm-5 col-form-label">Début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['fuel_from']) ? $_POST['fuel_from'] : ''; ?>" id="fuel_from" name="fuel_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_to" class="col-sm-5 col-form-label">Fin</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['fuel_to']) ? $_POST['fuel_to'] : ''; ?>" id="fuel_to" name="fuel_to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               
               <input type="hidden" id="fuelreport" name="fuelreport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer Rapport</button>
               </div>
            </div>
         </div>
   </div>
   </form>				  
				  <!--END JOURNAL-->
				  
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
<!--EN NAV-->		
	

    </section>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
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
                           <td> <?php echo output($fuels['vech_name']->v_name);; ?></td>
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
      </div>
   </div>
</section>
    <!-- /.content -->



