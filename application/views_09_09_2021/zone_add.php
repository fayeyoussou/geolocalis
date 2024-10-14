    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($zonedetails))?'Modifier zone':'Ajouter zone' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">zones</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($zonedetails))?'Modifier zone':'Ajouter zone' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="zone_add" class="card" action="<?php echo base_url();?>zone/<?php echo (isset($zonedetails))?'updatezone':'insertzone'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="z_id" id="z_id" value="<?php echo (isset($zonedetails)) ? $zonedetails[0]['z_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Destination <span class="form-required text-red">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zonedetails)) ? $zonedetails[0]['z_destination']:'' ?>" id="z_destination" name="z_destination" placeholder="Destination">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Distance <span class="form-required text-red">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zonedetails)) ? $zonedetails[0]['z_distance']:'' ?>" id="z_distance" name="z_distance" placeholder="Distance">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant conteneur 20 pieds <span class="form-required text-red">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zonedetails)) ? $zonedetails[0]['z_montant_conteneur_20']:'' ?>" id="z_montant_conteneur_20" name="z_montant_conteneur_20" placeholder="Montant conteneur 20 pieds">

                       </div>
                     </div>
                        
                    <div class="form-group">
                         <label class="form-label">Montant conteneur 40 pieds <span class="form-required text-red">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($zonedetails)) ? $zonedetails[0]['z_montant_conteneur_40']:'' ?>" id="z_montant_conteneur_40" name="z_montant_conteneur_40" placeholder="Montant conteneur 40 pieds">

                      </div>
                        
                   <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                        <textarea class="form-control" id="z_desc" autocomplete="off" placeholder="Description"  name="z_desc"><?php echo (isset($zonedetails)) ? $zonedetails[0]['z_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="z_created_date" name="z_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($zonedetails))?'Modifier zone':'Ajouter zone' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



