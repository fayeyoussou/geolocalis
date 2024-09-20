    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($reglementdetails))?'Modifier reglement':'Ajouter reglement' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">reglements</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($reglementdetails))?'Modifier reglement':'Ajouter reglement' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="reglement_add" class="card" action="<?php echo base_url();?>reglement/<?php echo (isset($reglementdetails))?'updatereglement':'insertreglement'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="tg_id" id="tg_id" value="<?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tg_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tg_name']:'' ?>" id="tg_name" name="tg_name" placeholder="Destination">
                      </div>
                    </div>
                    
                    
                        
                    
                        
<div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="tg_created_date" autocomplete="on" placeholder="Description"  name="tg_created_date"><?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tg_created_date']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="na_created_date" name="na_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($reglementdetails))?'Modifier reglement':'Ajouter reglement' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



