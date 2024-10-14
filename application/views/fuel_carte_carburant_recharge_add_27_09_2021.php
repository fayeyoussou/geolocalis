    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_carte_carburant_rechargedetails))?'Modifier du carburant':'Ajouter du carburant' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_carte_carburant_rechargedetails))?'Modifier du carburant':'Ajouter du carburant' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="fuel_carte_carburant_recharge" class="card" action="<?php echo base_url();?>fuel_carte_carburant_recharge/<?php echo (isset($fuel_carte_carburant_rechargedetails))?'updatefuel_carte_carburant_recharge':'insertfuel_carte_carburant_recharge'; ?>">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="v_fuel_carte_carburant_recharge_id" id="v_fuel_carte_carburant_recharge_id" value="<?php echo (isset($fuel_carte_carburant_rechargedetails)) ? $fuel_carte_carburant_rechargedetails[0]['v_fuel_carte_carburant_recharge_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                          <label class="form-label">Véhicule<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="v_id"  class="form-control selectized"  name="v_id" required="true">
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($fuel_carte_carburant_rechargedetails)) && $fuel_carte_carburant_rechargedetails[0]['v_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
					  
  
                    <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Conducteur<span class="form-required">*</span></label>
                     <select id="v_fuel_carte_carburant_rechargeaddedby" required="true" class="form-control selectized"  name="v_fuel_carte_carburant_rechargeaddedby">
                       <option value="">Selectionner le conducteur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($fuel_carte_carburant_rechargedetails)) && $fuel_carte_carburant_rechargedetails[0]['v_fuel_carte_carburant_rechargeaddedby'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date de remplissage<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="v_fuel_carte_carburant_rechargefilldate" name="v_fuel_carte_carburant_rechargefilldate" value="<?php echo (isset($fuel_carte_carburant_rechargedetails)) ? $fuel_carte_carburant_rechargedetails[0]['v_fuel_carte_carburant_rechargefilldate']:'' ?>" placeholder="Date de remplissage">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="v_fuel_carte_carburant_recharge_quantity" name="v_fuel_carte_carburant_recharge_quantity" value="<?php echo (isset($fuel_carte_carburant_rechargedetails)) ? $fuel_carte_carburant_rechargedetails[0]['v_fuel_carte_carburant_recharge_quantity']:'' ?>" placeholder="Quantité">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro du kilometrage<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="v_odometerreading" name="v_odometerreading" value="<?php echo (isset($fuel_carte_carburant_rechargedetails)) ? $fuel_carte_carburant_rechargedetails[0]['v_odometerreading']:'' ?>" placeholder="Numéro du kilometrage">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="v_fuel_carte_carburant_rechargeprice" value="<?php echo (isset($fuel_carte_carburant_rechargedetails)) ? $fuel_carte_carburant_rechargedetails[0]['v_fuel_carte_carburant_rechargeprice']:'' ?>" name="v_fuel_carte_carburant_rechargeprice" placeholder="Montant">
                      </div>
                    </div>
					  
					  
					  
					  
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="v_fuel_carte_carburant_rechargecomments" value="<?php echo (isset($fuel_carte_carburant_rechargedetails)) ? $fuel_carte_carburant_rechargedetails[0]['v_fuel_carte_carburant_rechargecomments']:'' ?>" name="v_fuel_carte_carburant_rechargecomments" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>
                    <?php if(!isset($fuel_carte_carburant_rechargedetails)) {  ?>
                    	<br>
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Besoin d'ajouter des frais ?</label>
                           <input class="form-control form-check-input" id="exp" name="exp" type="checkbox">
                      </div>
                    </div>
                	<?php } ?>

      
                </div>
                 <input type="hidden" id="v_created_date" name="v_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_carte_carburant_rechargedetails))?'Modifier carburant':'Ajouter carburant' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



