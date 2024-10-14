    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($conteneurdetails))?'Modifier du conteneur':'Ajouter conteneur' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">conteneur</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($conteneurdetails))?'Modifier conteneur':'Ajouter conteneur' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="conteneur" class="card" action="<?php echo base_url();?>conteneur/<?php echo (isset($conteneurdetails))?'updateconteneur':'insertconteneur'; ?>">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="co_id" id="co_id" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                          <label class="form-label">Véhicule<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="co_nature"  class="form-control selectized"  name="co_nature" required="true">
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($conteneurdetails)) && $conteneurdetails[0]['co_nature'] == $vechiclelists['co_nature']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['co_nature']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
					  
  
                    <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Conducteur<span class="form-required">*</span></label>
                     <select id="co_zone" required="true" class="form-control selectized"  name="co_zone">
                       <option value="">Selectionner le conducteur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($conteneurdetails)) && $conteneurdetails[0]['co_zone'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date de remplissage<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="co_numero_conteneur" name="co_numero_conteneur" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_numero_conteneur']:'' ?>" placeholder="Date de remplissage">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="co_montant" name="co_montant" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_montant']:'' ?>" placeholder="Quantité">

                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Type de conteneur<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="co_type_conteneur" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_type_conteneur']:'' ?>" name="co_type_conteneur" placeholder="Montant">
                      </div>
                    </div>
					  
					  
					  
					  
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="co_adresse_livraison" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_adresse_livraison']:'' ?>" name="co_adresse_livraison" placeholder="Commentaire sur le conteneur">
                      </div>
                    </div>
      
                </div>
                 <input type="hidden" id="co_created_date" name="co_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($conteneurdetails))?'Modifier conteneur':'Ajouter conteneur' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



