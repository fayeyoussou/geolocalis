    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($naturedetails))?'Modifier nature':'Ajouter nature' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">natures</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($naturedetails))?'Modifier nature':'Ajouter nature' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="nature_add" class="card" action="<?php echo base_url();?>nature/<?php echo (isset($naturedetails))?'updatenature':'insertnature'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="na_id" id="na_id" value="<?php echo (isset($naturedetails)) ? $naturedetails[0]['na_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($naturedetails)) ? $naturedetails[0]['na_name']:'' ?>" id="na_name" name="na_name" placeholder="Destination">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($naturedetails)) ? $naturedetails[0]['na_montant']:'' ?>" id="na_montant" name="na_montant" placeholder="Montant">
                      </div>
                    </div>
                    
                        
                    
                        
<div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="na_desc" autocomplete="on" placeholder="Description"  name="na_desc"><?php echo (isset($naturedetails)) ? $naturedetails[0]['na_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="na_created_date" name="na_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($naturedetails))?'Modifier nature':'Ajouter nature' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



