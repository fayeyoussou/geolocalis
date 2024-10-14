    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($customer_typedetails))?'Modifier type client':'Ajouter type client' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">customer_types</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($customer_typedetails))?'Modifier type client':'Ajouter type client' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="customer_type_add" class="card" action="<?php echo base_url();?>customer_type/<?php echo (isset($customer_typedetails))?'updatecustomer_type':'insertcustomer_type'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="typc_id" id="typc_id" value="<?php echo (isset($customer_typedetails)) ? $customer_typedetails[0]['typc_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Type client<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($customer_typedetails)) ? $customer_typedetails[0]['typc_name']:'' ?>" id="typc_name" name="typc_name" placeholder="Type client">
                      </div>
                    </div>
                    
                    
                        
                    
                        
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="typc_desc" autocomplete="on" placeholder="Description"  name="typc_desc"><?php echo (isset($customer_typedetails)) ? $customer_typedetails[0]['typc_desc']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="typc_created_date" name="typc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($customer_typedetails))?'Modifier type client':'Ajouter type client' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



