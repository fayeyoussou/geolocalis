    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($type_tache_manutentiondetails))?'Modifier type_tache_manutention':'Ajouter type_tache_manutention' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">type_tache_manutentions</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($type_tache_manutentiondetails))?'Modifier type_tache_manutention':'Ajouter type_tache_manutention' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="type_tache_manutention_add" class="card" action="<?php echo base_url();?>type_tache_manutention/<?php echo (isset($type_tache_manutentiondetails))?'updatetype_tache_manutention':'inserttype_tache_manutention'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="ttach_id" id="ttach_id" value="<?php echo (isset($type_tache_manutentiondetails)) ? $type_tache_manutentiondetails[0]['ttach_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($type_tache_manutentiondetails)) ? $type_tache_manutentiondetails[0]['ttach_name']:'' ?>" id="ttach_name" name="ttach_name" placeholder="Destination">
                      </div>
                    </div>
                    
        
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="ttach_desc" autocomplete="on" placeholder="Description"  name="ttach_desc"><?php echo (isset($type_tache_manutentiondetails)) ? $type_tache_manutentiondetails[0]['ttach_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="ttach_created_date" name="ttach_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($type_tache_manutentiondetails))?'Modifier type_tache_manutention':'Ajouter type_tache_manutention' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



