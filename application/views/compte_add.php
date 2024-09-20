    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($comptedetails))?'Modifier compte':'Ajouter compte' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">comptes</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($comptedetails))?'Modifier compte':'Ajouter compte' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="compte_add" class="card" action="<?php echo base_url();?>compte/<?php echo (isset($comptedetails))?'updatecompte':'insertcompte'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="iec_id" id="iec_id" value="<?php echo (isset($comptedetails)) ? $comptedetails[0]['iec_id']:'' ?>" >

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                          <label class="form-label">Compte <span class="form-required text-red">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($comptedetails)) ? $comptedetails[0]['iec_name']:'' ?>" id="iec_name" name="iec_name" placeholder="Compte">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Code <span class="form-required text-red">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($comptedetails)) ? $comptedetails[0]['iec_code']:'' ?>" id="iec_code" name="iec_code" placeholder="Code">
                      </div>
                    </div>

                        
                   <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                        <textarea class="form-control" id="iec_desc" autocomplete="off" placeholder="Description"  name="iec_desc"><?php echo (isset($comptedetails)) ? $comptedetails[0]['iec_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="iec_created_date" name="iec_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($comptedetails))?'Modifier compte':'Ajouter compte' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



