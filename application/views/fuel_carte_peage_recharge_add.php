    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fueldetails))?'Modifier recharge peage':'Ajouter recharge peage' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/fuel_carte_peage_recharge">Carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fueldetails))?'Modifier recharge peage':'Ajouter recharge peage' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="fuel" class="card" action="<?php echo base_url();?>fuel_carte_peage_recharge/<?php echo (isset($fueldetails))?'updatefuel':'insertfuel'; ?>">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="cpr_id" id="cpr_id" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['cpr_id']:'' ?>" >

                    <div class="col-sm-6 col-md-6">
                          <label class="form-label">Carte<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="cpr_carte_id"  class="form-control selectized"  name="cpr_carte_id" required="true">
                        <option value="">Selectionner la carte</option>
                        <?php  foreach ($carte_peagelist as $key => $carte_peagelists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['cpr_carte_id'] == $carte_peagelists['cc_id']){ echo 'selected';} ?> value="1<?php //echo output($carte_peagelists['cc_id']) ?>"><?php //echo output($carte_peagelists['cc_name']).' - '. output($carte_peagelists['cc_numero']); ?>SSS</option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
					  
  
                    
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date de recharge<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="cpr_date" name="cpr_date" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['cpr_date']:'' ?>" placeholder="Date de recharge">

                      </div>
                    </div>
                    
                      
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant total<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="cpr_amount" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['cpr_amount']:'' ?>" name="cpr_amount" placeholder="Montant total">
                      </div>
                    </div>
					  
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro ticket (Reçu)<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="cpr_number_ticket" name="cpr_number_ticket" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['cpr_number_ticket']:'' ?>" placeholder="Numéro ticket">

                      </div>
                    </div>
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro chèque<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="cpr_number_cheque" name="cpr_number_cheque" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['cpr_number_cheque']:'' ?>" placeholder="Numéro chèque">

                      </div>
                    </div>						  
					  
					  
                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="cpr_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['cpr_desc']:'' ?>" name="cpr_desc" placeholder="Commentaire sur le peage">
                      </div>
                    </div>


      
                </div>
                 <input type="hidden" id="cpr_created_date" name="cpr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fueldetails))?'Modifier recharge peage':'Ajouter recharge peage' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



