    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_compagniedetails))?'Modifier Station service':'Ajouter Station service' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">fuel_compagnies</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_compagniedetails))?'Modifier Station service':'Ajouter Station service' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="fuel_compagnie_add" class="card" action="<?php echo base_url();?>fuel_compagnie/<?php echo (isset($fuel_compagniedetails))?'updatefuel_compagnie':'insertfuel_compagnie'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="ccc_id" id="ccc_id" value="<?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom de la Station service<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_name']:'' ?>" id="ccc_name" name="ccc_name" placeholder="Nom de la Station service">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Téléphone<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_mobile']:'' ?>" id="ccc_mobile" name="ccc_mobile" placeholder="Téléphone">
                      </div>
                    </div>
  
                                         <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_email']:'' ?>" id="ccc_email" name="ccc_email" placeholder="Email">
                      </div>
                    </div>
                    

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Nom du Gestionnaire<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_contact_name']:'' ?>" id="ccc_contact_name" name="ccc_contact_name" placeholder="Nom du Gestionnaire">
                      </div>
                    </div>                      
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Téléphone du Gestionnaire<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_contact_mobile']:'' ?>" id="ccc_contact_mobile" name="ccc_contact_mobile" placeholder="Téléphone du Gestionnaire">
                      </div>
                    </div>
                        
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" id="ccc_address" autocomplete="on" placeholder="Adresse"  name="ccc_address"><?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_address']:'' ?></textarea>
                      </div>
                    </div> 
                      
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="ccc_desc" autocomplete="on" placeholder="Description"  name="ccc_desc"><?php echo (isset($fuel_compagniedetails)) ? $fuel_compagniedetails[0]['ccc_desc']:'' ?></textarea>
                      </div>
                    </div>                      
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="ccc_created_date" name="ccc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_compagniedetails))?'Modifier Station service':'Ajouter Station service' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->

