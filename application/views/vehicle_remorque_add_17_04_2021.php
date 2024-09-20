    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($vehicle_remorquedetails))?'Modifier une carte de péage':'Ajouter une carte de péage' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">véhicule remorque</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($vehicle_remorquedetails))?'Modifier véhicule remorque':'Ajouter véhicule remorque' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="vehicle_remorque_add" class="card" action="<?php echo base_url();?>vehicle_remorque/<?php echo (isset($vehicle_remorquedetails))?'updatevehicle_remorque':'insertvehicle_remorque'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="vr_id" id="vr_id" value="<?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_name']:'' ?>" id="vr_name" name="vr_name" placeholder="Nom de la carte ">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro de la carte<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_numero_immatriculation']:'' ?>" id="vr_numero_immatriculation" name="vr_numero_immatriculation" placeholder="Numéro de la carte">
                      </div>
                    </div>
					  
					<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Date d'achat<span class="form-required">*</span></label>
                        <input type="text" name="vr_type" value="<?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_type']:'' ?>" class="form-control datepicker" placeholder="Date d'achat" >
                      </div>
                    </div>					  
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="vehicle_remorque Email">

                      </div>
                    </div>-->

					  
                    </div>

                    <div class="col-sm-6 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="vr_desc" autocomplete="off" placeholder="Description"  name="vr_desc"><?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="vr_created_date" name="vr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($vehicle_remorquedetails))?'Modifier carte de péage':'Ajouter carte de péage' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



