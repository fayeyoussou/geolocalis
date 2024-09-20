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
      <div class="container-fluid">
       	      <form method="post" id="fuel" class="card" action="<?php echo base_url();?>fuel_carte_carburant_recharge/<?php echo (isset($fueldetails))?'updatefuel':'insertfuel'; ?>">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="ccr_id" id="ccr_id" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_id']:'' ?>" >

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
					  
					<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">N° BC<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_bc" name="ccr_bc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_bc']:'' ?>" placeholder="N° BC">

                      </div>
                    </div>					  
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_fuel_quantity" name="ccr_fuel_quantity" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_fuel_quantity']:'' ?>" placeholder="Quantité">

                      </div>
                    </div>
 
 
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Prix du litre<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_fuelprice" name="ccr_fuelprice" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_fuelprice']:'' ?>" placeholder="Prix du litre">

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
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro chèque<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_numero_cheque" name="ccr_numero_cheque" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_numero_cheque']:'' ?>" placeholder="Numéro chèque">

                      </div>
                    </div>					  
					  
					  
                     <div class="col-sm-6 col-md-12">
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
             </div>
    </section>
    <!-- /.content -->



