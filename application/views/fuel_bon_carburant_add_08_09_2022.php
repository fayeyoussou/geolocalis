    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_bon_carburantdetails))?'Modifier bon de carburant':'Ajouter bon de carburant' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Bon Carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_bon_carburantdetails))?'Modifier bon de carburant':'Ajouter bon de carburant' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="fuel_bon_carburant" class="card" action="<?php echo base_url();?>fuel_bon_carburant/<?php echo (isset($fuel_bon_carburantdetails))?'updatefuel_bon_carburant':'insertfuel_bon_carburant'; ?>">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="bc_id" id="bc_id" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_id']:'' ?>" >
					  
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
             </div>
    </section>
    <!-- /.content -->



