    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($pregatedetails))?'Modifier pregate':'Ajouter pregate' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pregatedetails))?'Modifier pregate':'Ajouter pregate' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="pregate" class="card" action="<?php echo base_url();?>pregate/<?php echo (isset($pregatedetails))?'updatepregate':'insertpregate'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="pr_id" id="pr_id" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_id']:'' ?>" >

                   <!--   <div class="col-sm-6 col-md-3">
                          <label class="form-label">Facture<span class="form-required">*</span></label>
                    <div class="form-group">
                         <select id="pr_trip"  class="form-control"  name="pr_trip" >
                        <option value="">Selectionner Facture</option>
                        <?php//  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php// if((isset($pregatedetails)) && $pregatedetails[0]['pr_trip'] == $vechiclelists['pr_id']){ echo 'selected';} ?> value="<?php //echo output($vechiclelists['pr_id']) ?>"><?php //echo output($vechiclelists['t_num_facture'])); ?></option>
                        <?php  //} ?>
                     </select>
                      </div>
                    </div>-->
                      
                      
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Facture<span class="form-required">*</span></label>
                     <select id="pr_trip"  class="form-control" required="true" name="pr_trip" >
                        <option value="">Sélectionner Facture</option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_trip'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                      
                      
           <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Conteneur<span class="form-required">*</span></label>
                     <select id="pr_conteneur"  class="form-control" required="true"  name="pr_conteneur" >
                        <option value="">Sélectionner Conteneur</option>
                        <?php  foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_conteneur'] == $conteneurlists['co_id']){ echo 'selected';} ?> value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                      
                   
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Statut<span class="form-required">*</span></label>
                         <select name="pr_statut" id="pr_statut" class="form-control">
                        <option value="">Selectionner le statut</option>
                             
                      <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_statut'] =='nodemarre'){ echo 'selected';} ?> value="nodemarre">No démarré</option>
                      <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_statut'] == 'encours'){ echo 'selected';} ?> value="encours">En cours</option>
                      <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_statut'] =='termine'){ echo 'selected';} ?> value="termine">Terminé</option>
                      <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_statut'] =='annule'){ echo 'selected';} ?> value="annule">Annulé</option>                             
                      </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date reception<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="pr_date_reception" name="pr_date_reception" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_date_reception']:'' ?>" placeholder="Date reception">

                      </div>
                    </div>
                      
                <!--DEBUT Date line-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date line <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_date_line']:'' ?>" name="pr_date_line" value="" class="form-control datepicker" placeholder="Date line">
                  </div>
               </div>                
                <!-- FIN Date line-->                          
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="pr_description" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_description']:'' ?>" name="pr_description" placeholder="Description">
                      </div>
                    </div>
                    
                    
                   
      
                </div>
                 <input type="hidden" id="pr_created_date" name="pr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($pregatedetails))?'Modifier pregate':'Ajouter pregate' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



