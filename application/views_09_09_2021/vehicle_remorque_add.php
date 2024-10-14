    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($vehicle_remorquedetails))?'Modifier un vehicule remorque':'Ajouter un vehicule remorque' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">vehicule remorque</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($vehicle_remorquedetails))?'Modifier vehicule remorque':'Ajouter vehicule remorque' ?></li>
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
                          <label class="form-label">Marque<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_manufactured_by']:'' ?>" id="vr_manufactured_by" name="vr_manufactured_by" placeholder="Marque du remorque">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro d'immatriculation<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_numero_immatriculation']:'' ?>" id="vr_numero_immatriculation" name="vr_numero_immatriculation" placeholder="Numéro d'immatriculation">
                      </div>
                    </div>
					  


                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="vr_type" class="form-label">Type de remorque </label>
                        <select id="vr_type" name="vr_type" class="form-control " required="">
                          <option value="">Sélectionner Taille du remorque </option> 
                          <option <?php echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['vr_type']=='Squelette_20') ? 'selected':'' ?> value="Squelette_20">Squelette 20 pieds</option> 
                          <option <?php echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['vr_type']=='Squelette_40') ? 'selected':'' ?> value="Squelette_40">Squelette 40 pieds</option> 
                          <option <?php echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['vr_type']=='Plateau_20') ? 'selected':'' ?> value="Plateau_20">Plateau 20 pieds</option> 
                          <option <?php echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['vr_type']=='Plateau_40') ? 'selected':'' ?> value="Plateau_40">Plateau 40 pieds</option>                         </select>
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
                        <textarea class="form-control" id="vr_desc" autocomplete="on" placeholder="Description"  name="vr_desc"><?php echo (isset($vehicle_remorquedetails)) ? $vehicle_remorquedetails[0]['vr_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="vr_created_date" name="vr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($vehicle_remorquedetails))?'Modifier vehicule remorque':'Ajouter vehicule remorque' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



