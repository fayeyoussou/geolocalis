    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($invoicedetails))?'Edit invoice':'Add invoice' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">invoice</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($invoicedetails))?'Edit invoice':'Add invoice' ?></li>
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
                   <input type="hidden" name="i_id" id="i_id" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">Registration Number</label>
                      <div class="form-group">
                        <input type="text" name="i_nom_navire" id="i_nom_navire" class="form-control" placeholder="Registration Number" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_nom_navire']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">invoice Name</label>
                      <div class="form-group">
                        <input type="text" name="i_num_facture" id="i_num_facture" class="form-control" placeholder="invoice Name" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_num_facture']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Model</label>
                        <input type="text" name="i_reference" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_reference']:'' ?>" class="form-control" placeholder="Model">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Chassis No</label>
                        <input type="text" name="i_nature" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_nature']:'' ?>" class="form-control" placeholder="Chassis No">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Engine No</label>
                        <input type="text" name="v_engine_no" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['v_engine_no']:'' ?>" class="form-control" placeholder="Engine No">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Manufactured By</label>
                        <input type="text" name="v_manufactured_by" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['v_manufactured_by']:'' ?>" class="form-control" placeholder="Manufactured By">
                      </div>
                    </div>
                    </div>
                           <div class="row">
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">invoice Type</label>
                        <select id="v_type" name="v_type" class="form-control " required="">
                         <option value="">Select invoice Type</option> 
                          <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['v_type']=='CAR') ? 'selected':'' ?> value="CAR">CAR</option> 
                          <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['v_type']=='MOTORCYCLE') ? 'selected':'' ?> value="MOTORCYCLE">MOTORCYCLE</option> 
                          <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['v_type']=='TRUCK') ? 'selected':'' ?> value="TRUCK">TRUCK</option> 
                          <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['v_type']=='BUS') ? 'selected':'' ?> value="BUS">BUS</option> 
                           <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['v_type']=='TAXI') ? 'selected':'' ?> value="TAXI">TAXI</option> 
                           <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['v_type']=='BICYCLE') ? 'selected':'' ?> value="BICYCLE">BICYCLE</option> 
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="v_color" class="form-label">invoice Color<small> (To show in Map)</small></label>
                        <input id="add-device-color" name="v_color" class="jscolor {valueElement:'add-device-color', styleElement:'add-device-color', hash:true, mode:'HSV'} form-control"  value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['v_color']:'#F399EB' ?>" required>
                      </div>
                    </div>
                    <?php if(isset($invoicedetails[0]['i_nature'])) { ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="i_nature" class="form-label">invoice Status</label>
                        <select id="i_nature" name="i_nature" class="form-control " required="">
                          <option value="">Select invoice Status</option> 
                          <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['i_nature']==1) ? 'selected':'' ?> value="1">Active</option> 
                          <option <?php echo (isset($invoicedetails) && $invoicedetails[0]['i_nature']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                        </select>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Registration Expiry Date</label>
                        <input type="text" required="" name="v_reg_exp_date" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['v_reg_exp_date']:'' ?>" class="form-control datepicker" placeholder="Registration Expiry Date">
                      </div>
                  </div>
                   
                    </div>
                    <hr>
                    <div class="form-label"><b>GPS API Details(Feed GPS Data)</b></div>
                     <div class="row">
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API URL</label>
                        <input type="text" name="v_api_url" class="form-control" placeholder="API URL" value="<?php echo base_url();?>api" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API Username</label>
                        <input type="text" id="v_api_username" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['v_api_username']:'' ?>" name="v_api_username" class="form-control" placeholder="API Username" readonly>
                      </div>
                    </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API Password</label>
                        <input type="text" name="v_api_password" class="form-control" placeholder="API Password" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['v_api_password']:random_string('nozero', 6) ?>"  readonly>
                      </div>
                    </div>
                  </div>
                </div>
                  <input type="hidden" id="i_created_by" name="i_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                   <input type="hidden" id="i_created_date" name="i_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($invoicedetails))?'Update invoice':'Add invoice' ?></button>
                </div>
              </form>
             </div>
    </section>
    <!-- /.content -->



