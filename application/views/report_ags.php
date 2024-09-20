<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rapport AGS
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Rapport</a></li>
               <li class="breadcrumb-item active">Rapport AGS</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <form method="post" id="fuel_report" class="card basicvalidation" action="<?php echo base_url();?>reports/ags">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_from" class="col-sm-5 col-form-label">Rapport de</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['fuel_from']) ? $_POST['fuel_from'] : ''; ?>" id="fuel_from" name="fuel_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_to" class="col-sm-5 col-form-label">Rapport à</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['fuel_to']) ? $_POST['fuel_to'] : ''; ?>" id="fuel_to" name="fuel_to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-3 col-form-label">Véhicule</label>
                     <div class="col-sm-8 form-group">
                        <select required="true" id="fuel_vechicle"  class="form-control selectized"  name="fuel_vechicle">
                           <option value="all">Tous les véhicules</option>
                           <?php foreach ($vehiclelist as $key => $vechiclelists) { ?>
                           <option <?php echo (isset($_POST['booking_vechicle']) && ($_POST['booking_vechicle'] == $vechiclelists['v_id'])) ? 'selected':'' ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="fuelreport" name="fuelreport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer Rapport AGS</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php if(!empty($fuel)){ 
             ?>
                   <table class="datatableexport table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                           <th>Date </th>
                          <th>Mission</th>
                          <th>Montant</th>
                          <th>Type</th>
                         <th>Véhicule</th>
<!--                            <th>Relevé du compteur kilométrique</th>
                          <th>Commentaires</th>
-->                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel)){ 
				 			$montant = 0;  
				 			$montanttotal = 0;  
				 			$count=1;
                           foreach($fuel as $fuels){
							   
							   $montanttotal += $fuels['tja_mi_amount'];
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($fuels['tja_date']); ?></td>
                           <td> <?php //echo output($fuels['vech_name']->v_name); ?><?php echo output($fuels['tja_mi_numero']); ?></td>
                           <td> <?php echo output($fuels['tja_mi_amount']); ?></td>
                           <td><?php echo output($fuels['tja_type']); ?></td>
                           <td><?php echo output($fuels['vech_name']->v_registration_no); ?></td>
<!--                           <td><?php //echo output($fuels['v_odometerreading']); ?></td>
                           <td><?php //Secho output($fuels['v_fuelcomments']); ?></td>-->
                        </tr>
                        <?php } } ?>
                      </tbody>
					  <thead>
                        <tr>
                          <th class="w-1"></th>
<!--                          <th>Véhicule</th>
-->                          <th></th>
                          <th>Total</th>
                          <th><?= $montanttotal; ?></th>
                          <th><?php //s$Decaissement; ?></th>
                          <th></th>
                        </tr>
                      </thead> 
                    </table>
                     <?php }  ?>
        </div>
      </div>
   </div>
</section>
