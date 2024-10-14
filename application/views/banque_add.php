    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($banquedetails))?'Modifier Banque':'Ajouter Banque' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Client</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($banquedetails))?'Modifier Banque':'Ajouter Banque' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Banque/<?php echo (isset($banquedetails))?'updatebanque':'insertbanque'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ieb_id" id="ieb_id" value="<?php echo (isset($banquedetails)) ? $banquedetails[0]['ieb_id']:'' ?>" >

                   <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Nom de la Banque<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ieb_name" value="<?php echo (isset($banquedetails)) ? $banquedetails[0]['ieb_name']:'' ?>" name="ieb_name" placeholder="Nom de la Banque">
                      </div>
                    </div>
                      
                      
                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Sigle<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ieb_sigle" value="<?php echo (isset($banquedetails)) ? $banquedetails[0]['ieb_sigle']:'' ?>" name="ieb_sigle" placeholder="Sigle">
                      </div>
                    </div>                       
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Numéro compte<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ieb_numero_compte" value="<?php echo (isset($banquedetails)) ? $banquedetails[0]['ieb_numero_compte']:'' ?>" name="ieb_numero_compte" placeholder="Numéro compte">
                      </div>
                    </div>
                      
                     <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Contact<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ieb_contact" value="<?php echo (isset($banquedetails)) ? $banquedetails[0]['ieb_contact']:'' ?>" name="ieb_contact" placeholder="Contact">
                      </div>
                    </div>                      
                    
                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ieb_desc" value="<?php echo (isset($banquedetails)) ? $banquedetails[0]['ieb_desc']:'' ?>" name="ieb_desc" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ieb_created_date" name="ieb_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($banquedetails))?'Modifier Banque':'Ajouter Banque' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



