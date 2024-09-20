    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">compagnies</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="compagnie_add" class="card" action="<?php echo base_url();?>compagnie/<?php echo (isset($compagniedetails))?'updatecompagnie':'insertcompagnie'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cc_id" id="cc_id" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom de la Compagnie<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_name']:'' ?>" id="cc_name" name="cc_name" placeholder="Compagnie">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Mobile<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_mobile']:'' ?>" id="cc_mobile" name="cc_mobile" placeholder="Mobile">
                      </div>
                    </div>
                    
                        
                    
                        
<div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" id="cc_address" autocomplete="on" placeholder="Description"  name="cc_address"><?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_address']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="cc_created_date" name="cc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



