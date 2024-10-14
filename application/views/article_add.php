    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($articledetails))?'Modifier article':'Ajouter article' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">articles</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($articledetails))?'Modifier article':'Ajouter article' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="article_add" class="card" action="<?php echo base_url();?>article/<?php echo (isset($articledetails))?'updatearticle':'insertarticle'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="art_id" id="art_id" value="<?php echo (isset($articledetails)) ? $articledetails[0]['art_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($articledetails)) ? $articledetails[0]['art_name']:'' ?>" id="art_name" name="art_name" placeholder="Destination">
                      </div>
                    </div>
                    
        
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="art_desc" autocomplete="on" placeholder="Description"  name="art_desc"><?php echo (isset($articledetails)) ? $articledetails[0]['art_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="art_created_date" name="art_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($articledetails))?'Modifier article':'Ajouter article' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



