    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($tripdetails))?'Modifier un voyage':'Ajouter un voyage' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Véhicule</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($tripdetails))?'Modifier un voyage':'Ajouter un voyage' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <form method="post" id="trip_add" class="card"  action="<?php echo base_url();?>Trips/<?php echo (isset($tripdetails))?'updatetrips':'inserttrips'; ?>">
         <div class="card-body">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_id']:'' ?>" >
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Nom du client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                        <option value="">Selectionner le client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Véhicule<span class="form-required">*</span></label>
                     <select id="t_vechicle"  class="form-control"  name="t_vechicle" >
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_vechicle'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Conducteur<span class="form-required">*</span></label>
                     <select id="t_driver"  class="form-control"  name="t_driver">
                       <option value="">Selectionner le Conducteur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_driver'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Type de voyage<span class="form-required">*</span></label>
                    <select id="t_type"  class="form-control"  name="t_type">
                        <option value="">Type de voyage</option>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_type'] == 'singletrip'){ echo 'selected';} ?> value="singletrip">Aller uniquement</option>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_type'] == 'roundtrip'){ echo 'selected';} ?> value="roundtrip">Aller et Retour</option>
                     </select>
                  </div>
				   
				   
				
				   
               </div>

				
			<div class="col-sm-6 col-md-3">
                  <label class="form-label">Type de remorque<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_remorque"  class="form-control selectized" required="true" name="t_remorque">
                        <option value="">Sélectionner remorque</option>
                        <?php foreach ($vehicle_remorquelist as $key => $vehicle_remorquelist) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_remorque'] == $vehicle_remorquelist['gr_id']){ echo 'selected';} ?> value="<?php echo output($vehicle_remorquelist['gr_id']) ?>"><?php echo output($vehicle_remorquelist['gr_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>				
				
<!--               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date de début du voyage<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_fromlocation']:'' ?>" name="t_trip_fromlocation" id="t_trip_fromlocation" class="form-control" placeholder="Date de début du voyage">
                  </div>
               </div>-->
				
<!-- DEBUT-->
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date de facturation<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_date_facturation']:'' ?>" name="t_date_facturation" value="" class="form-control datepicker" placeholder="Date de facturation">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date de reception pregate<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_date_pregate']:'' ?>" name="t_date_pregate" value="" class="form-control datepicker" placeholder="Date de reception pregate">
                  </div>
               </div>
				
				<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date line<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_line_date']:'' ?>" name="t_line_date" value="" class="form-control datepicker" placeholder="Date line">
                  </div>
               </div>

				
			<div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">EIR vide</label>
                     <select name="t_eir_vide" id="t_eir_vide" required="true" class="form-control">
                      <option value="">EIR vide</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_eir_vide'] =='Oui'){ echo 'selected';} ?> value="Oui">Oui</option>

                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_eir_vide'] =='Non'){ echo 'selected';} ?> value="Non">Non</option>						 
                    </select>
                  </div>
                </div>				
				
			<div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">EIR plein</label>
                     <select name="t_eir_plein" id="t_eir_plein" required="true" class="form-control">
                      <option value="">EIR plein</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_eir_plein'] =='Oui'){ echo 'selected';} ?> value="Oui">Oui</option>

                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_eir_plein'] =='Non'){ echo 'selected';} ?> value="Non">Non</option>						 
                    </select>
                  </div>
                </div>				

			<div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Carburant</label>
                     <select name="t_fuel_type_paiement" id="t_fuel_type_paiement" required="true" class="form-control">
                      <option value="">Carburant</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_fuel_type_paiement'] =='Carte'){ echo 'selected';} ?> value="Carte">Carte</option>

                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_fuel_type_paiement'] =='Espece'){ echo 'selected';} ?> value="Espece">Espece</option>						 
                    </select>
                  </div>
                </div>
				
				
			   <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité remplie(litre)<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_fuel_quantite']:'' ?>" name="t_fuel_quantite" value="" class="form-control" placeholder="Quantité remplie (litre)">
                  </div>
               </div>				
				
				
			<div class="col-sm-6 col-md-3">
                  <label class="form-label">Destination<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_zone"  class="form-control selectized" required="true" name="t_zone">
                        <option value="">Selectionner la destination</option>
                        <?php foreach ($zonelist as $key => $zonelist) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_zone'] == vehicle_destinationlist['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelist['z_id']) ?>"><?php echo output($zonelist['z_destination']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>				
				

							<div class="col-sm-6 col-md-3">
                  <label class="form-label">Carte Pèage<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_peage_num_carte"  class="form-control selectized" required="true" name="t_peage_num_carte">
                        <option value="">Selectionner une Carte carburant</option>
                        <?php foreach ($fuel_carte_peagelist as $key => $fuel_carte_peagelist) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_fuel_num_carte'] == $fuel_carte_peagelist['cp_id']){ echo 'selected';} ?> value="<?php echo output($fuel_carte_peagelist['cp_id']) ?>"><?php echo output($fuel_carte_peagelist['cp_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
				
				
			   <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant pèage<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_peage_montant']:'' ?>" name="t_peage_montant" value="" class="form-control" placeholder="Montant pèage">
                  </div>
               </div>	
				
				<!--FIN-->
								
				
               
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant total<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_amount']:'' ?>" name="t_trip_amount" value="" class="form-control" placeholder="Montant total">
                  </div>
               </div>
				
<!-- debut conteneur-->	
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro du conteneur<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_container']:'' ?>" name="t_container" value="" class="form-control" placeholder="Numéro du conteneur">
                  </div>
               </div>				
<!-- debut conteneur-->	
				
<!-- debut facture-->	
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro de la facture<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_num_facture']:'' ?>" name="t_num_facture" value="" class="form-control" placeholder="Numéro de la facture">
                  </div>
               </div>				
<!-- debut facture-->					
               
               <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Statut du voyage</label>
                     <select name="t_trip_status" id="t_trip_status" required="true" class="form-control">
                      <option value="">Statut du voyage</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] =='yettostart'){ echo 'selected';} ?> value="yettostart">No démarré</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] == 'completed'){ echo 'selected';} ?> value="completed">Terminé</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] =='ongoing'){ echo 'selected';} ?> value="ongoing">En cours</option>
                      <option <?php if((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] =='cancelled'){ echo 'selected';} ?> value="cancelled">Annulé</option>
                    </select>
                  </div>
                </div>
                <?php if(!isset($tripdetails)) {  ?>
                <div class="col-sm-6 col-md-5">
                 <div class="form-group">
                     <label class="form-label">Email</label>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" value="1" name="bookingemail" id="bookingemail" class="custom-control-input" id="bookingemail">
                      <label class="custom-control-label" for="bookingemail">Faut-il envoyer un e-mail de confirmation de réservation au client ?</label>
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
               <button type="submit" class="btn btn-primary"> <?php echo (isset($tripdetails))?'Modifier':'Ajouter' ?></button>
            </div>
      </form>
             </div>
    </section>
    <!-- /.content -->



