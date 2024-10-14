    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier une carte carburant':'Ajouter une carte carburant' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">cartes carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier carte carburant':'Ajouter carte carburant' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="fuel_carte_carburant_add" class="card" action="<?php echo base_url();?>fuel_carte_carburant/<?php echo (isset($fuel_carte_carburantdetails))?'updatefuel_carte_carburant':'insertfuel_carte_carburant'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cc_id" id="cc_id" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_name']:'' ?>" id="cc_name" name="cc_name" placeholder="Nom de la carte ">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro de la carte<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_numero']:'' ?>" id="cc_numero" name="cc_numero" placeholder="Numéro de la carte">
                      </div>
                    </div>
					  
					<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Date d'achat<span class="form-required">*</span></label>
                        <input type="text" name="cc_date_achat" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_date_achat']:'' ?>" class="form-control datepicker" placeholder="Date d'achat" >
                      </div>
                    </div>					  
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="fuel_carte_carburant Email">

                      </div>
                    </div>-->

					  
                    </div>

                    <div class="col-sm-6 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="cc_desc" autocomplete="off" placeholder="Description"  name="cc_desc"><?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="cc_created_date" name="cc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_carte_carburantdetails))?'Modifier carte carburant':'Ajouter carte carburant' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



