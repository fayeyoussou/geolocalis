    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($transitairedetails))?'Modifier Transitaire':'Ajouter Transitaire' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Transitaires</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($transitairedetails))?'Modifier Transitaire':'Ajouter Transitaire' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="transitaire_add" class="card" action="<?php echo base_url();?>transitaire/<?php echo (isset($transitairedetails))?'updatetransitaire':'inserttransitaire'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($transitairedetails)) ? $transitairedetails[0]['t_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($transitairedetails)) ? $transitairedetails[0]['t_name']:'' ?>" id="t_name" name="t_name" placeholder="transitaire Name">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Portable<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($transitairedetails)) ? $transitairedetails[0]['t_mobile']:'' ?>" id="t_mobile" name="t_mobile" placeholder="transitaire Mobile">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php echo (isset($transitairedetails)) ? $transitairedetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="transitaire Email">

                      </div>
                    </div>
                     <?php if(isset($transitairedetails[0]['t_isactive'])) { ?>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                          <label for="t_isactive" class="form-label">Statut Transitaire</label>
                        <select id="t_isactive" name="t_isactive" class="form-control " required="">
                          <option value="">Selectionner statut Transitaire</option> 
                          <option <?php echo (isset($transitairedetails) && $transitairedetails[0]['t_isactive']==1) ? 'selected':'' ?> value="1">Actif</option> 
                          <option <?php echo (isset($transitairedetails) && $transitairedetails[0]['t_isactive']==0) ? 'selected':'' ?> value="0">Inactif</option> 
                        </select>
                      </div>
                    <?php } ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="t_address" autocomplete="off" placeholder="Address"  name="t_address"><?php echo (isset($transitairedetails)) ? $transitairedetails[0]['t_address']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($transitairedetails))?'Modifier Transitaire':'Ajouter Transitaire' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



