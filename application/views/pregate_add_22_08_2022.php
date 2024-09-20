    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($pregatedetails))?'Modifier Pregate':'Ajouter Pregate' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pregatedetails))?'Modifier Pregate':'Ajouter Pregate' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="" class="card" action="<?php echo base_url();?>pregate/<?php echo (isset($pregatedetails))?'updatepregate':'insertpregate'; ?>">
          <div class="card-body">

                 
                  <div class="row">
<!---->                   <input type="hidden" name="pr_id" id="pr_id" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_id']:'' ?>" >

                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_numero']:'' ?>" name="pr_numero" class="form-control" placeholder="Numéro">
                  </div>
               </div>                        
                      
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Facture<span class="form-required">*</span></label>
                     <select id="pr_trip_id"  class="form-control selectized"  name="pr_trip_id" >
                        <option value="">Sélectionner Facture</option>
                        <?php $count=1;  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo $count; ?> - <?php echo output($facturelists['t_id']); ?> - <?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  $count++;} ?>
                     </select>
                  </div>
               </div>                      
                      


                <!--DEBUT Date mi_eir_plein-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date reception <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_date_reception']:'' ?>" name="pr_date_reception" class="form-control datepicker" placeholder="Date reception">
                  </div>
               </div>                
                <!-- FIN Date line--> 

                <!--DEBUT Date line-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date line <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_date_line']:'' ?>" name="pr_date_line" class="form-control datepicker" placeholder="Date line">
                  </div>
               </div>                
                <!-- FIN Date line-->                 

              
					  
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_nombre_conteneur']:'' ?>" name="pr_nombre_conteneur" class="form-control" placeholder="Nombre de conteneurs">
                  </div>
               </div> 
					  
                     <?php //if(isset($customerdetails[0]['pr_statut'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="pr_statut" class="form-label">Statut</label>
                        <select id="pr_statut" name="pr_statut" class="form-control selectized"required="">
                          <option value="">Selectionner statut</option> 
                          <option <?php echo (isset($pregatedetails) && $pregatedetails[0]['pr_statut']==1) ? 'selected':'' ?> value="1">Plein</option> 
                          <option <?php echo (isset($pregatedetails) && $pregatedetails[0]['pr_statut']==0) ? 'selected':'' ?> value="0">Vide</option> 
                        </select>
                      </div>
                    </div>
					  <?php //} ?>
					  
   <!-- FIN MISSION-->
                  <?php //} ?> 
                       

      
                </div>
<!--                <input type="hidden" id="t_statut_pregate" name="t_statut_pregate" value="<?php //echo "oui"; ?>">--> 
  
      <div class="modal-footer">

      <button type="submit" class="btn btn-primary"> <?php echo (isset($pregatedetails))?'Modifier pregate':'Ajouter pregate' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



