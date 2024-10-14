    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($compagnie_lieu_restitutiondetails))?'Modifier un lieu de restitution':'Ajouter un lieu de restitution' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Lieu de restitution</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($compagnie_lieu_restitutiondetails))?'Modifier lieu de restitution':'Ajouter lieu de restitution' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="compagnie_lieu_restitution_add" class="card" action="<?php echo base_url();?>compagnie_lieu_restitution/<?php echo (isset($compagnie_lieu_restitutiondetails))?'updatecompagnie_lieu_restitution':'insertcompagnie_lieu_restitution'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="clr_id" id="clr_id" value="<?php echo (isset($compagnie_lieu_restitutiondetails)) ? $compagnie_lieu_restitutiondetails[0]['clr_id']:'' ?>" >

					<div class="col-sm-4 col-md-4">
                          <label class="form-label">Compagnie maritime<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="clr_compagnie_id"  class="form-control selectized"  name="clr_compagnie_id" required="true">
                        <option value="">Selectionner la Compagnie maritime</option>
                        <?php  foreach ($carte_carburantcompagnielist as $key => $carte_carburantcompagnielists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['clr_compagnie_id'] == $carte_carburantcompagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantcompagnielists['cc_id']) ?>"><?php echo output($carte_carburantcompagnielists['cc_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
					  
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Lieu de restitution<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagnie_lieu_restitutiondetails)) ? $compagnie_lieu_restitutiondetails[0]['clr_name']:'' ?>" id="clr_name" name="clr_name" placeholder="Lieu de restitution">
                      </div>
                    </div>
                    
					  
										  
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($compagnie_lieu_restitutiondetails)) ? $compagnie_lieu_restitutiondetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="compagnie_lieu_restitution Email">

                      </div>
                    </div>-->

					  

                    <div class="col-sm-7 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="" id="clr_desc" autocomplete="off" placeholder="Description"  name="clr_desc"><?php echo (isset($compagnie_lieu_restitutiondetails)) ? $compagnie_lieu_restitutiondetails[0]['clr_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                     </div>
                   
                   
      
                </div>
                 <input type="hidden" id="clr_created_date" name="clr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($compagnie_lieu_restitutiondetails))?'Modifier lieu de restitution':'Ajouter lieu de restitution' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



