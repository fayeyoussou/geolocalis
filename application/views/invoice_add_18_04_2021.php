    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($invoicedetails))?'Modifier une carte de péage':'Ajouter une carte de péage' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">cartes de péage</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($invoicedetails))?'Modifier cartes de péage':'Ajouter cartes de péage' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="invoice_add" class="card" action="<?php echo base_url();?>invoice/<?php echo (isset($invoicedetails))?'updateinvoice':'insertinvoice'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cp_id" id="cp_id" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['cp_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['cp_name']:'' ?>" id="cp_name" name="cp_name" placeholder="Nom de la carte ">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro de la carte<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['cp_numero']:'' ?>" id="cp_numero" name="cp_numero" placeholder="Numéro de la carte">
                      </div>
                    </div>
					  
					<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Date d'achat<span class="form-required">*</span></label>
                        <input type="text" name="cp_date_achat" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['cp_date_achat']:'' ?>" class="form-control datepicker" placeholder="Date d'achat" >
                      </div>
                    </div>					  
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($invoicedetails)) ? $invoicedetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="invoice Email">

                      </div>
                    </div>-->

					  
                    </div>

                    <div class="col-sm-6 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="cp_desc" autocomplete="off" placeholder="Description"  name="cp_desc"><?php echo (isset($invoicedetails)) ? $invoicedetails[0]['cp_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="i_created_date" name="i_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($invoicedetails))?'Modifier carte de péage':'Ajouter carte de péage' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



