    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fueldetails))?'Modifier recharge carburant':'Ajouter recharge carburant' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/fuel_carte_carburant_recharge">Carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fueldetails))?'Modifier recharge carburant':'Ajouter recharge carburant' ?></li>
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
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier carte carburant':'Ajouter carte carburant' ?></a>
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
<form method="post" id="fuel" class="card" action="<?php echo base_url();?>fuel_carte_carburant_recharge/<?php echo (isset($fueldetails))?'updatefuel':'insertfuel'; ?>">

                  <div class="row">
                   <input type="hidden" name="ccr_id" id="ccr_id" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_id']:'' ?>" >

					  
				<div class="col-sm-6 col-md-6">
                          <label class="form-label">Réglement 1<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ccr_incomeexpense_id"  class="form-control selectized"  name="ccr_incomeexpense_id" required="true">
                        <option value="">Selectionner le Réglement</option>
                        <?php  foreach ($incomeexpenselist as $key => $incomeexpenselists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['ccr_incomeexpense_id'] == $incomeexpenselists['ie_id']){ echo 'selected';} ?> value="<?php echo output($incomeexpenselists['ie_id']) ?>"><?php echo output($incomeexpenselists['ie_numero']).' - '. output($incomeexpenselists['ie_numero']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
                    <div class="col-sm-6 col-md-6">
                          <label class="form-label">Carte<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ccr_carte_id"  class="form-control selectized"  name="ccr_carte_id" required="true">
                        <option value="">Selectionner la carte</option>
                        <?php  foreach ($carte_carburantlist as $key => $carte_carburantlists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['ccr_carte_id'] == $carte_carburantlists['cc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantlists['cc_id']) ?>"><?php echo output($carte_carburantlists['cc_name']).' - '. output($carte_carburantlists['cc_numero']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
					  
  
                    
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date de recharge<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="ccr_fueldate" name="ccr_fueldate" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_fueldate']:'' ?>" placeholder="Date de recharge">

                      </div>
                    </div>
					  
					<!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">N° BC<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_bc" name="ccr_bc" value="<?php //echo (isset($fueldetails)) ? $fueldetails[0]['ccr_bc']:'' ?>" placeholder="N° BC">

                      </div>
                    </div>-->					  
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_fuel_quantity" name="ccr_fuel_quantity" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_fuel_quantity']:'' ?>" placeholder="Quantité">

                      </div>
                    </div>
 
 
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Prix du litre<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_fuelprice" name="ccr_fuelprice" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_fuelprice']:'655' ?>" placeholder="655">

                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant total<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ccr_amount" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_amount']:'' ?>" name="ccr_amount" placeholder="Montant total">
                      </div>
                    </div>
					  
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro ticket (Reçu)<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_numero_ticket" name="ccr_numero_ticket" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_numero_ticket']:'' ?>" placeholder="Numéro ticket">

                      </div>
                    </div>
                      

                     <div class="col-sm-6 col-md-9">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="ccr_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_desc']:'' ?>" name="ccr_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ccr_created_date" name="ccr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fueldetails))?'Modifier recharge carburant':'Ajouter recharge carburant' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  
				  
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

				  <!--BEGIN JOURNAL-->
<form method="post" id="fuel_report" class="card basicvalidation" action="">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6 col-md-3">
                  <div class="form-group row">
                     <label for="fuel_from" class="col-sm-5 col-form-label">Date début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['fuel_from']) ? $_POST['fuel_from'] : ''; ?>" id="fuel_from" name="fuel_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4">
                  <div class="form-group row">
                     <label for="fuel_to" class="col-sm-5 col-form-label">Date fin </label>
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
                    <table id="fueltbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                           <th>Numéro carte</th>
                          <th>N° BC</th>
                          <th>Quantité</th>
                          <th>Prix</th>
                          <th>Prix total</th>
                          <th>Date</th>
                          <th>Commentaire</th>
                          <?php if(userpermission('lr_fuel_ccc_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel)){  $count=1;
                           foreach($fuel as $fuels){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($fuels['cc_name']->cc_name); ?></td>
                           <td> <?php echo output($fuels['ccr_bc']); ?></td>
                           <td> <?php echo output($fuels['ccr_fuel_quantity']); ?></td>
                           <td><?php echo output($fuels['ccr_fuelprice']); ?></td>
                           <td><?php echo output($fuels['ccr_amount']); ?></td>
                           <td><?php echo output($fuels['ccr_fueldate']); ?></td>
                           <td><?php echo output($fuels['ccr_desc']); ?></td>
                           <?php if(userpermission('lr_fuel_ccc_edit')) { ?>
                              <td>
                            <?php if(userpermission('lr_fuel_ccc_edit')) { ?>      
                            <a class="icon" href="<?php echo base_url(); ?>fuel_carte_carburant_recharge/editfuel/<?php echo output($fuels['ccr_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a> <?php } ?>
                            
                            <?php if(userpermission('lr_fuel_ccc_delete')) { ?>      
                            <a class="icon" href="<?php echo base_url(); ?>fuel_carte_carburant_recharge/deletefuel/<?php echo output($fuels['ccr_id']); ?>">
                              <i class="fa fa-trash text-danger"></i>
                            </a> <?php } ?>      
                          </td>
                          <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                    
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



