    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($piece_rechange_fournisseurdetails))?'Modifier Fournisseur':'Ajouter Fournisseur' ?> <?php if((isset($piece_rechange_fournisseurdetails))){ ?>    N°  <?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_numero']:'' ?>  <?php }else{?> N° <?= $numeropiece_rechange_fournisseur; }?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/piece_rechange_fournisseur">Liste des fournisseurs</a></li>
              <!--<li class="breadcrumb-item active"><?php echo (isset($piece_rechange_fournisseurdetails))?'Modifier Fournisseur':'Ajouter Fournisseur' ?><?php if((isset($piece_rechange_fournisseurdetails))){ ?>    N°  <?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_numero']:'' ?>  <?php }else{?> N° <?= $numeropiece_rechange_fournisseur; }?> </li>-->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="piece_rechange_fournisseur_add" class="card" action="<?php echo base_url();?>piece_rechange_fournisseur/<?php echo (isset($piece_rechange_fournisseurdetails))?'updatepiece_rechange_fournisseur':'insertpiece_rechange_fournisseur'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="f_id" id="f_id" value="<?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_id']:'' ?>" >

                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php //echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_numero']:'' ?>" id="f_numero" name="f_numero" placeholder="Numéro">
                      </div>
                    </div>-->
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_name']:'' ?>" id="f_name" name="f_name" placeholder="Nom">
                      </div>
                    </div> 
                      
                      
                <div class="col-sm-6 col-md-4">
                   <div class="form-group">
                     <label class="form-label">Type de Fournisseur<span class="form-required">*</span></label>
                     <select id="f_type"  class="form-control" required="true"  name="f_type">
                       <option value="">Selectionner le type de Fournisseur</option>
                        <?php  //foreach ($piece_rechange_fournisseur_typelist as $key => $piece_rechange_fournisseur_typelists) { ?>
                          <option <?php echo (isset($piece_rechange_fournisseurdetails) && $piece_rechange_fournisseurdetails[0]['f_type']=="PNEU") ? 'selected':'' ?> value="PNEU">PNEU</option> 
                          <option <?php echo (isset($piece_rechange_fournisseurdetails) && $piece_rechange_fournisseurdetails[0]['f_type']=="AUTRE") ? 'selected':'' ?> value="AUTRE">AUTRE</option> 
                        <?php  //} ?>
                     </select>
                  </div>
              </div>                      
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Portable<span class="form-required">*</span></label>
                          <input type="text" class="form-control" value="<?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_mobile']:'' ?>" id="f_mobile" name="f_mobile" placeholder="piece_rechange_fournisseur Mobile">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" class="form-control" value="<?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_email']:'' ?>" id="f_email" name="f_email" placeholder="piece_rechange_fournisseur Email">

                      </div>
                    </div>
					  <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" id="f_address" autocomplete="off" placeholder="Address"  name="f_address"><?php echo (isset($piece_rechange_fournisseurdetails)) ? $piece_rechange_fournisseurdetails[0]['f_address']:'' ?></textarea>
                      </div>
                    </div>
                     <?php if(isset($piece_rechange_fournisseurdetails[0]['f_isactive'])) { ?>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                          <label for="f_isactive" class="form-label">Statut Fournisseur</label>
                        <select id="f_isactive" name="f_isactive" class="form-control " required="">
                          <option value="">Selectionner statut Fournisseur</option> 
                          <option <?php echo (isset($piece_rechange_fournisseurdetails) && $piece_rechange_fournisseurdetails[0]['f_isactive']==1) ? 'selected':'' ?> value="1">Actif</option> 
                          <option <?php echo (isset($piece_rechange_fournisseurdetails) && $piece_rechange_fournisseurdetails[0]['f_isactive']==0) ? 'selected':'' ?> value="0">Inactif</option> 
                        </select>
                      </div>
                    <?php } ?>
                    </div>

                    
                   
                    
                   
      
                </div>
              
<?php if((isset($piece_rechange_fournisseurdetails))){}else{ ?>
         <!----> <input type="hidden" id="f_numero" name="f_numero" value="<?= $numeropiece_rechange_fournisseur; ?>">
                 <input type="hidden" id="f_modified_date" name="f_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
			  
<?php } ?>              
                 <input type="hidden" id="f_created_date" name="f_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
			 <input type="hidden" name="f_created_by" id="f_created_by" value="<?php echo 		$this->session->userdata['session_data']['u_id'];
 ?>" >			  

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($piece_rechange_fournisseurdetails))?'Modifier Fournisseur':'Ajouter Fournisseur' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



