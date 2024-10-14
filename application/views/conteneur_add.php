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
       	      <form method="post" id="conteneur" class="card" action="<?php echo base_url();?>conteneur/<?php echo (isset($conteneurdetails))?'updateconteneur':'updateconteneur'; ?>">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="co_id" id="co_id" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_id']:'' ?>" >

                    <!--<div class="col-sm-6 col-md-3">
                          <label class="form-label">Numéro facture<span class="form-required">*</span></label>
                      <div class="form-group">
                       <input type="text" required="true" class="form-control" id="t_num_facture" name="t_num_facture" value="<?php //echo (isset($conteneurdetails)) ? $conteneurdetails[0]['t_num_facture']:'' ?>" placeholder="Numéro facture" readonly>  
                      </div>
                    </div>-->
					  
					  
  
                    <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Zone<span class="form-required">*</span></label>

                      <select id="co_zone"  class="form-control"  name="co_zone">
                       <option value="">Selectionner la zone</option>
                        <?php  foreach ($zonelist as $key => $zonelists) { ?>
                        <option <?php if((isset($conteneurdetails)) && $conteneurdetails[0]['co_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                      
                  </div>
               </div>
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro du conteneur<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control" id="co_numero_conteneur" name="co_numero_conteneur" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_numero_conteneur']:'' ?>" placeholder="Numéro du contenreur">

                      </div>
                    </div>
                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Montant<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="co_montant" name="co_montant" value="<?php //echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_montant']:'' ?>" placeholder="Montant">

                      </div>
                    </div>-->
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Type de conteneur<span class="form-required">*</span></label>
<select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php if((isset($conteneurdetails)) && $conteneurdetails[0]['co_type_conteneur'] =='20_pieds'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php if((isset($conteneurdetails)) && $conteneurdetails[0]['co_type_conteneur'] =='40_pieds'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
                    </select>
                      </div>
                    </div>
                      

					  
					  
					  
					  
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Adresse livraison</label>
                          <input type="text" class="form-control" id="co_adresse_livraison" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_adresse_livraison']:'' ?>" name="co_adresse_livraison" placeholder="Adresse livraison">
                      </div>
                    </div>
                      
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="co_description" value="<?php echo (isset($conteneurdetails)) ? $conteneurdetails[0]['co_description']:'' ?>" name="co_description" placeholder="Commentaire">
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



