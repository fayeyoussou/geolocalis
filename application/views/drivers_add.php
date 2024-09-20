    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($driverdetails))?'Modifier Conducteur':'Ajouter Conducteur' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Conducteur</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($driverdetails))?'Modifier Conducteur':'Ajouter Conducteur' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="add_driver" class="card" action="<?php echo base_url();?>drivers/<?php echo (isset($driverdetails))?'updatedriver':'insertdriver'; ?>">
                <div class="card-body">

                  
                  <div class="row">
                   <input type="hidden" name="d_id" id="d_id" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Nom du conducteur<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="d_name" id="d_name" class="form-control" placeholder="Nom du conducteur" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_name']:'' ?>" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Portable<span class="form-required">*</span></label>
                        <input type="text" name="d_mobile" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_mobile']:'' ?>" class="form-control" placeholder="Portable" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">N° Permis<span class="form-required">*</span></label>
                        <input type="text" name="d_licenseno" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_licenseno']:'' ?>" class="form-control" placeholder="N° Permis" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Date d'expiration License<span class="form-required">*</span></label>
                        <input type="text" name="d_license_expdate" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_license_expdate']:'' ?>" class="form-control datepickerpastdisable" placeholder="Date d'expiration License" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">

                        <div class="form-group">
                        <label class="form-label">Date d'adhésion<span class="form-required">*</span></label>
                        <input type="text" name="d_doj" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_doj']:'' ?>" class="form-control datepicker" placeholder="Date d'adhésion" >
                      </div>
                    </div>
                    
                    
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="d_is_active" class="form-label">Statut du conducteur</label>
                        <select id="d_is_active" name="d_is_active" class="form-control " required="">
                          <option value="">Selectionner statut du conducteur</option> 
                          <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_is_active']==1) ? 'selected':'' ?> value="1">Actif</option> 
                          <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_is_active']==0) ? 'selected':'' ?> value="0">Inactif</option> 
                        </select>
                      </div>
                    </div>
					  
<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="d_profil" class="form-label">Profil du conducteur</label>
                        <select id="d_profil" name="d_profil" class="form-control " required="">
                          <option value="">Selectionner profil du conducteur</option> 
                          <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_profil']=="PERMANENT") ? 'selected':'' ?> value="PERMANENT">PERMANENT</option> 
                          <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_profil']=="PRESTATAIRE") ? 'selected':'' ?> value="0">PRESTATAIRE</option> 
                        </select>
                      </div>
                    </div>					  
					  
                    </div>
      
                </div>
                  <input type="hidden" id="d_created_by" name="d_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                   <input type="hidden" id="d_created_date" name="d_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($driverdetails))?'Modifier conducteur':'Ajouter conducteur' ?></button>
                </div>
              </form>
             </div>
    </section>
    <!-- /.content -->



