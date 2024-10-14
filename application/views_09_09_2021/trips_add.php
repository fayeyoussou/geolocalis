    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($tripdetails))?'Modifier trip':'Ajouter trip' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">trip</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($tripdetails))?'Modifier trip':'Ajouter trip' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <form method="post" id="trip_add" class="card"  action="<?php echo base_url();?>trip/<?php echo (isset($tripdetails))?'updatetrip':'inserttrip'; ?>">
         <div class="card-body">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
       
   
                <?php //if((isset($tripdetails))){ ?> 
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Véhicule<span class="form-required">*</span></label>
                     <select id="t_vechicle"  class="form-control"  name="t_vechicle" >
                        <option value="">Sélectionner Véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_vechicle'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="t_driver"  class="form-control"  name="t_driver">
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_driver'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                
      <?php //} ?>   
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">trip Type<span class="form-required">*</span></label>
                    <select id="t_type"  class="form-control"  name="t_type">
                        <option value="">Select trip Type</option>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_type'] == 'singletrip'){ echo 'selected';} ?> value="singletrip">Single trip</option>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_type'] == 'roundtrip'){ echo 'selected';} ?> value="roundtrip">Round trip</option>
                     </select>
                  </div>
               </div>
              
               <!--<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">trip Start Location<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_fromlocation']:'' ?>" name="t_trip_fromlocation" id="t_trip_fromlocation" class="form-control" placeholder="trip Start Location">
                  </div>
               </div>-->
                
<!-- Debut zone--> 

                
                 <div class="col-sm-6 col-md-3">
              <div class="form-group">
                     <label class="form-label">Destination<span class="form-required">*</span></label>
                     <select id="t_zone"  class="form-control"  name="t_zone">
                       <option value="">Selectionner la destination</option>
                        <?php  foreach ($zonelist as $key => $zonelists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']).' - '. output($zonelists['z_distance']); ?> KM</option>
                        <?php  } ?>
                     </select>
                   </div>
                 </div>
                
<!-- Fin zone-->                

<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_id'] == $transitairelists['t_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['t_id']) ?>"><?php echo output($transitairelists['t_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  
                
                
<!-- Debut Carte Carburant--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carburant<span class="form-required">*</span></label>
                     <select id="t_carte_carburant"  class="form-control"  name="t_carte_carburant">
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_carburantlist as $key => $carte_carburantlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_carte_carburant'] == $carte_carburantlists['cc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantlists['cc_id']) ?>"><?php echo output($carte_carburantlists['cc_name']).' - '. output($carte_carburantlists['cc_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin Carte Carburant-->   

<!-- Debut Carte Carburant--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Carte carte péage<span class="form-required">*</span></label>
                     <select id="t_carte_peage"  class="form-control"  name="t_carte_peage">
                       <option value="">Selectionner la Carte carburant</option>
                        <?php  foreach ($carte_peagelist as $key => $carte_peagelists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_carte_peage'] == $carte_peagelists['cp_id']){ echo 'selected';} ?> value="<?php echo output($carte_peagelists['cp_id']) ?>"><?php echo output($carte_peagelists['cp_name']).' - '. output($carte_peagelists['cp_numero']);  ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin Carte Carburant-->                   
                
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL">
                  </div>
               </div>
               <!--<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">trip Start Date<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($tripdetails)) ? $tripdetails[0]['t_start_date']:'' ?>" name="t_start_date" value="" class="form-control datepicker" placeholder="trip Start Date">
                  </div>
               </div>-->
                
                
                 <!--Debut Numéro-->                
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro conteneur<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_num_conteneur']:'' ?>" name="t_num_conteneur" value="" class="form-control" placeholder="Numéro conteneur">
                  </div>
               </div>                
                <!--Fin Numéro-->  
                
                
<!-- debut nature-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Nature du conteneur</label>
                     <select name="t_nature" id="t_nature" required="true" class="form-control">
                      <option value="">Sélectionner une nature</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Avec TVA</option>

                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Sans TVA</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut nature-->                
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date trip <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_date_trip']:'' ?>" name="t_date_trip" value="" class="form-control datepicker" placeholder="Date trip">
                  </div>
               </div>
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant total de la trip<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_amount']:'' ?>" name="t_trip_amount" value="" class="form-control" placeholder="Montant total de la trip">
                  </div>
               </div>
               
               
            <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Statut trip</label>
                     <select name="t_trip_status" id="t_trip_status" required="true" class="form-control">
                      <option value="">Sélectionner le Statut de la trip</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] =='nodemarre'){ echo 'selected';} ?> value="nodemarre">No démarré</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] == 'encours'){ echo 'selected';} ?> value="encours">En cours</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] =='termine'){ echo 'selected';} ?> value="termine">Terminé</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] =='annule'){ echo 'selected';} ?> value="annule">Annulé</option>
                    </select>
                  </div>
                </div>                
                
                   <!--Debut  Numéro container-->   
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro de la trip<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_num_trip']:'' ?>" name="t_num_trip" id="t_num_trip" class="form-control" placeholder="Numéro de la trip">
                  </div>
               </div>
                <!--Fin  Numéro container-->   
  
<!--DEBUT PREGATE-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date Pré gate <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_date_pregate']:'' ?>" name="t_date_pregate" value="" class="form-control datepicker" placeholder="Date Pré gate">
                  </div>
               </div>                
<!-- FIN PREGATE-->   

               </br> <h4>ATTRIBUER LES CHARGES </h2></br>

                <!--DEBUT Date line-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date line <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_date_line']:'' ?>" name="t_date_line" value="" class="form-control datepicker" placeholder="Date line">
                  </div>
               </div>                
                <!-- FIN Date line--> 
                

                <!--DEBUT Date t_eir_plein-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date EIR plein <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_eir_plein']:'' ?>" name="t_eir_plein" value="" class="form-control datepicker" placeholder="Date EIR plein">
                  </div>
               </div>                
                <!-- FIN Date line--> 

                <!--DEBUT Date line-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date EIR vide <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_eir_vide']:'' ?>" name="t_eir_vide" value="" class="form-control datepicker" placeholder="Date EIR vide">
                  </div>
               </div>                
                <!-- FIN Date line-->                 
                
                
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                
                <?php if(!isset($tripdetails)) {  ?>
                <div class="col-sm-6 col-md-5">
                 <div class="form-group">
                     <label class="form-label">Email</label>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" value="1" name="bookingemail" id="bookingemail" class="custom-control-input" id="bookingemail">
                      <label class="custom-control-label" for="bookingemail">Is need to sent Booking confirmation email to customer?</label>
                    </div>
                  </div>
            </div>
             </div>
           <?php } ?>

            </div>
  
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($tripdetails))?'Update trip':'Add trip' ?></button>
            </div>
      </form>
             </div>
    </section>
    <!-- /.content -->



