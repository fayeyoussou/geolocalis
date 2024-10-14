    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($zone_destinationdetails))?'Modifier un lieu de restitution':'Ajouter un lieu de restitution' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Lieu de restitution</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($zone_destinationdetails))?'Modifier lieu de restitution':'Ajouter lieu de restitution' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="zone_destination_add" class="card" action="<?php echo base_url();?>zone_destination/<?php echo (isset($zone_destinationdetails))?'updatezone_destination':'insertzone_destination'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="zd_id" id="zd_id" value="<?php echo (isset($zone_destinationdetails)) ? $zone_destinationdetails[0]['zd_id']:'' ?>" >

					<div class="col-sm-4 col-md-4">
                          <label class="form-label">Zone<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="zd_zone_id"  class="form-control selectized"  name="zd_zone_id" required="true">
                        <option value="">Selectionner la Zone</option>
                        <?php  foreach ($zonelist as $key => $zonelists) { ?>
                        <option <?php if((isset($zone_destinationdetails)) && $zone_destinationdetails[0]['zd_zone_id'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
					  
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Destination<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zone_destinationdetails)) ? $zone_destinationdetails[0]['zd_name']:'' ?>" id="zd_name" name="zd_name" placeholder="Destination">
                      </div>
                    </div>
                    
					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Quantité (L)<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zone_destinationdetails)) ? $zone_destinationdetails[0]['zd_quantite']:'' ?>" id="zd_quantite" name="zd_quantite" placeholder="Quantité (L)">
                      </div>
                    </div>					  
										  
					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Frais de voyage<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zone_destinationdetails)) ? $zone_destinationdetails[0]['zd_fraisvoyage']:'' ?>" id="zd_fraisvoyage" name="zd_fraisvoyage" placeholder="Frais de voyage">
                      </div>
                    </div>					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($zone_destinationdetails)) ? $zone_destinationdetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="zone_destination Email">

                      </div>
                    </div>-->

					  

                    <div class="col-sm-7 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="zd_desc" autocomplete="off" placeholder="Description"  name="zd_desc"><?php echo (isset($zone_destinationdetails)) ? $zone_destinationdetails[0]['zd_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                     </div>
                   
                   
      
                </div>
                 <input type="hidden" id="zd_created_date" name="zd_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($zone_destinationdetails))?'Modifier lieu de restitution':'Ajouter lieu de restitution' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



