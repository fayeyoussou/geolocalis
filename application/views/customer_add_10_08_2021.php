    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($customerdetails))?'Modifier Client':'Ajouter Client' ?> <?php if((isset($customerdetails))){ ?>    N°  <?php echo (isset($customerdetails)) ? $customerdetails[0]['c_num_customer']:'' ?>  <?php }else{?> N° CL00<?= $numerocustomer; }?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Clients</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($customerdetails))?'Modifier Client':'Ajouter Client' ?><?php if((isset($customerdetails))){ ?>    N°  <?php echo (isset($customerdetails)) ? $customerdetails[0]['c_num_customer']:'' ?>  <?php }else{?> N° CL00<?= $numerocustomer; }?> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="customer_add" class="card" action="<?php echo base_url();?>customer/<?php echo (isset($customerdetails))?'updatecustomer':'insertcustomer'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="c_id" id="c_id" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_id']:'' ?>" >

                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php //echo (isset($customerdetails)) ? $customerdetails[0]['c_num_customer']:'' ?>" id="c_num_customer" name="c_num_customer" placeholder="Numéro">
                      </div>
                    </div>-->
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_name']:'' ?>" id="c_name" name="c_name" placeholder="Nom">
                      </div>
                    </div> 
                      
                      
                <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Type de client<span class="form-required">*</span></label>
                     <select id="c_type_customer"  class="form-control" required="true"  name="c_type_customer">
                       <option value="">Selectionner le Type de client</option>
                        <?php  foreach ($customer_typelist as $key => $customer_typelists) { ?>
                        <option <?php if((isset($customerdetails)) && $customerdetails[0]['c_type_customer'] == $customer_typelists['typc_id']){ echo 'selected';} ?> value="<?php echo output($customer_typelists['typc_id']) ?>"><?php echo output($customer_typelists['typc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>                      
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Portable<span class="form-required">*</span></label>
                          <input type="text" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_mobile']:'' ?>" id="c_mobile" name="c_mobile" placeholder="Customer Mobile">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_email']:'' ?>" id="c_email" name="c_email" placeholder="Customer Email">

                      </div>
                    </div>
                     <?php if(isset($customerdetails[0]['c_isactive'])) { ?>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                          <label for="c_isactive" class="form-label">Statut client</label>
                        <select id="c_isactive" name="c_isactive" class="form-control " required="">
                          <option value="">Selectionner statut client</option> 
                          <option <?php echo (isset($customerdetails) && $customerdetails[0]['c_isactive']==1) ? 'selected':'' ?> value="1">Actif</option> 
                          <option <?php echo (isset($customerdetails) && $customerdetails[0]['c_isactive']==0) ? 'selected':'' ?> value="0">Inactif</option> 
                        </select>
                      </div>
                    <?php } ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" id="c_address" autocomplete="off" placeholder="Address"  name="c_address"><?php echo (isset($customerdetails)) ? $customerdetails[0]['c_address']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
              
<?php if((isset($customerdetails))){}else{ ?>
          <input type="hidden" id="c_num_customer" name="c_num_customer" value="CL00<?= $numerocustomer; ?>">
<?php } ?>              
                 <input type="hidden" id="c_created_date" name="c_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($customerdetails))?'Modifier Client':'Ajouter Client' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



