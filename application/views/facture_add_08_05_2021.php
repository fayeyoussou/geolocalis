    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?><?php if((isset($facturedetails))){ ?>    N°  <?php echo (isset($facturedetails)) ? $facturedetails[0]['t_num_facture']:'' ?>  <?php }?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Facture</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?> </li>      
                
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
         <div class="card-body">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control select2" required="true" name="t_customer_id">
                         
<!--                     <select id="t_customer_id"  class="form-control select2" required="true" multiple="multiple" name="t_customer_id">-->
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
       
   
                <?php //if((isset($facturedetails))){ ?> 
               
               
                
      <?php //} ?>   
                
<!--               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">facture Type<span class="form-required">*</span></label>
                    <select id="t_type"  class="form-control"  name="t_type">
                        <option value="">Select facture Type</option>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_type'] == 'singlefacture'){ echo 'selected';} ?> value="singlefacture">Single facture</option>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_type'] == 'roundfacture'){ echo 'selected';} ?> value="roundfacture">Round facture</option>
                     </select>
                  </div>
               </div>-->
              
               <!--<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">facture Start Location<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($facturedetails)) ? $facturedetails[0]['t_trip_fromlocation']:'' ?>" name="t_trip_fromlocation" id="t_trip_fromlocation" class="form-control" placeholder="facture Start Location">
                  </div>
               </div>-->
                
<!-- Debut zone--> 

                
<!--                 <div class="col-sm-6 col-md-3">
              <div class="form-group">
                     <label class="form-label">Zone<span class="form-required">*</span></label>
                     <select id="t_zone"  class="form-control" required="true" name="t_zone">
                       <option value="">Selectionner la zone</option>
                        <?php//  foreach ($zonelist as $key => $zonelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($zonelists['z_id']) ?>"><?php //echo output($zonelists['z_destination']).' - '. output($zonelists['z_distance']); ?> KM</option>
                        <?php  //} ?>
                     </select>
                   </div>
                 </div>-->
                
<!-- Fin zone-->                

<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  
                
            
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL" required="true" >
                  </div>
               </div>
               <!--<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">facture Start Date<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($facturedetails)) ? $facturedetails[0]['t_start_date']:'' ?>" name="t_start_date" value="" class="form-control datepicker" placeholder="facture Start Date">
                  </div>
               </div>
                -->
                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                
                   <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Avec TVA</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Sans TVA</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->   
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
                   <!--Debut  Numéro container-->   
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro de la facture<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_num_facture']:'' ?>" name="t_num_facture" id="t_num_facture" class="form-control" placeholder="Numéro de la facture">
                  </div>
               </div>
                <!--Fin  Numéro container-->                  
                
  
                   <!--Debut  Nombre de container-->   
             <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" id="t_nombre_conteneur" class="form-control" placeholder="Nombre de conteneurs">
                  </div>
               </div>
                   <!--Fin  Nombre de container-->   
  
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Ristourne</label>
                     <select name="t_ristourne" id="t_ristourne" required="true" class="form-control">
                      <option value="">Sélectionner Ristourne</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='avec_ristourne'){ echo 'selected';} ?> value="avec_ristourne">Avec ristourne</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='sans_ristourne'){ echo 'selected';} ?> value="sans_ristourne">Sans ristourne</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->       
                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant Ristourne<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_ristourne_amount']:'' ?>" name="t_ristourne_amount" id="t_ristourne_amount" class="form-control" placeholder="Montant Ristourne">
                  </div>
               </div>                
                
                
<!-- Debut Type de reglement--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Type de reglement<span class="form-required">*</span></label>
                     <select id="t_type_reglement"  class="form-control" required="true"  name="t_type_reglement">
                       <option value="">Selectionner le Type de reglement</option>
                        <?php  foreach ($type_reglementlist as $key => $type_reglementlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_type_reglement'] == $type_reglementlists['tr_id']){ echo 'selected';} ?> value="<?php echo output($type_reglementlists['tr_id']) ?>"><?php echo output($type_reglementlists['tr_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin Type de reglement-->                  
                
  <!-- Debut reglement--> 

<!--               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Reglement<span class="form-required">*</span></label>
                     <select id="t_reglement"  class="form-control" required="true"  name="t_reglement">
                       <option value="">Selectionner reglement</option>
                        <?php//  foreach ($reglementlist as $key => $reglementlists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_reglement'] == $reglementlists['tg_id']){ echo 'selected';} ?> value="<?php //echo output($reglementlists['tg_id']) ?>"><?php //echo output($reglementlists['tg_name']); ?> </option>
                        <?php // } ?>
                     </select>
                  </div>
              </div>-->

                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Reglement</label>
                     <select name="t_reglement" id="t_reglement" required="true" class="form-control">
                      <option value="">Sélectionner Reglement</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_reglement'] =='non_paye'){ echo 'selected';} ?> value="non_paye">Non Payé</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_reglement'] =='avance'){ echo 'selected';} ?> value="avance">Avance</option>						 
 
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_reglement'] =='paye'){ echo 'selected';} ?> value="paye">Payé</option>                   
                     </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->  
                
<!-- Fin reglement-->   
                
  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control" required="true"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->
 
<!--                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse de livraison</label>
                          <input type="text" class="form-control" id="t_adresse_livraison" value="<?php //echo (isset($fueldetails)) ? $fueldetails[0]['t_adresse_livraison']:'' ?>" name="t_adresse_livraison" placeholder="Adresse de livraison">
                      </div>
                    </div>  -->               
                
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Nature</label>
                     <select name="t_nature" id="t_nature" required="true" class="form-control">
                      <option value="">Sélectionner Nature</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Avec TVA</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Sans TVA</option>						 
                    </select>
                  </div>
                </div> -->               
                
  <!-- debut Nature-->                   
                
               
<!--                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant total de la facture<span class="form-required">*</span></label>
                     <input type="text" value="<?php// echo (isset($facturedetails)) ? $facturedetails[0]['t_trip_amount']:'' ?>" name="t_trip_amount" value="" class="form-control" placeholder="Montant total de la facture"required="true" >
                  </div>
               </div>-->
               
               
            <!----> <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Statut facture</label>
                     <select name="t_trip_status" id="t_trip_status" required="true" class="form-control">
                      <option value="">Sélectionner le Statut de la facture</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_trip_status'] =='nodemarre'){ echo 'selected';} ?> value="nodemarre">No démarré</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_trip_status'] == 'encours'){ echo 'selected';} ?> value="encours">En cours</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_trip_status'] =='termine'){ echo 'selected';} ?> value="termine">Terminé</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_trip_status'] =='annule'){ echo 'selected';} ?> value="annule">Annulé</option>
                    </select>
                  </div>
                </div>               
                
 

         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                
                <?php //if(!isset($facturedetails)) {  ?>
                <!--<div class="col-sm-6 col-md-5">
                 <div class="form-group">
                     <label class="form-label">Email</label>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" value="1" name="bookingemail" id="bookingemail" class="custom-control-input" id="bookingemail">
                      <label class="custom-control-label" for="bookingemail">Is need to sent Booking confirmation email to customer?</label>
                    </div>
                  </div>
            </div>
             </div>-->
           <?php //} ?>

            </div>
  
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
             </div>
    </section>
    <!-- /.content -->



