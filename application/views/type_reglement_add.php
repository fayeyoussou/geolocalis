    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($type_reglementdetails))?'Modifier type_reglement':'Ajouter type_reglement' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">type_reglements</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($type_reglementdetails))?'Modifier type_reglement':'Ajouter type_reglement' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="type_reglement_add" class="card" action="<?php echo base_url();?>type_reglement/<?php echo (isset($type_reglementdetails))?'updatetype_reglement':'inserttype_reglement'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="tr_id" id="tr_id" value="<?php echo (isset($type_reglementdetails)) ? $type_reglementdetails[0]['tr_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($type_reglementdetails)) ? $type_reglementdetails[0]['tr_name']:'' ?>" id="tr_name" name="tr_name" placeholder="Destination">
                      </div>
                    </div>
                                        
                        
                    
                        
<div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="tr_desc" autocomplete="on" placeholder="Description"  name="tr_desc"><?php echo (isset($type_reglementdetails)) ? $type_reglementdetails[0]['tr_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="tr_created_date" name="tr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($type_reglementdetails))?'Modifier type_reglement':'Ajouter type_reglement' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



