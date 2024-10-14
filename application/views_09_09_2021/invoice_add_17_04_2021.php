    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($invoicedetails))?'Modifier une facture':'Ajouter une facture' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Enrégistrement facture</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($invoicedetails))?'Modifier une facture':'Ajouter une facture' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <form method="post" id="invoice_add" class="card"  action="<?php echo base_url();?>invoice/<?php echo (isset($invoicedetails))?'updateinvoice':'insertinvoice'; ?>">
         <div class="card-body">
            <div class="row">
               <input type="text" name="i_id" id="i_id" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_id']:'' ?>" >
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Nom du client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                        <option value="">Selectionner le client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Distination<span class="form-required">*</span></label>
                     <select id="i_zone"  class="form-control"  name="i_zone" >
                        <option value="">Selectionner la destination</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_zone'] == $vechiclelists['z_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['z_id']) ?>"><?php echo output($vechiclelists['z_destination']).' - '. output($vechiclelists['z_distance']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
<!--          
selection du Conducteur
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Conducteur<span class="form-required">*</span></label>
                     <select id="t_driver"  class="form-control"  name="t_driver">
                       <option value="">Selectionner le Conducteur</option>
                        <?php  //foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php //if((isset($invoicedetails)) && $invoicedetails[0]['t_driver'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php //echo output($driverlists['d_id']) ?>"><?php //echo output($driverlists['d_name']); ?></option>
                        <?php  //} ?>
                     </select>
                  </div>
               </div>
-->
               

				
							
				
<!-- DEBUT-->
               
	
			   <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_nom_navire']:'' ?>" name="i_nom_navire" value="" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>				
				
				
			<div class="col-sm-6 col-md-3">
                  <label class="form-label">Destination<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_zone"  class="form-control selectized" required="true" name="t_zone">
                        <option value="">Selectionner la destination</option>
                        <?php foreach ($zonelist as $key => $zonelist) { ?>
                        <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['t_zone'] == vehicle_destinationlist['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelist['z_id']) ?>"><?php echo output($zonelist['z_destination']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>				
				

			   <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro de référence<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_reference']:'' ?>" name="i_reference" value="" class="form-control" placeholder="Numéro de référence">
                  </div>
               </div>	
				
				<!--FIN-->
								
				
               
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant total<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['t_invoice_amount']:'' ?>" name="t_invoice_amount" value="" class="form-control" placeholder="Montant total">
                  </div>
               </div>
				
<!-- debut conteneur-->	
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro du conteneur<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_container']:'' ?>" name="i_container" value="" class="form-control" placeholder="Numéro du conteneur">
                  </div>
               </div>				
<!-- debut conteneur-->	
				
<!-- debut facture-->	
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro de la facture<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['t_num_facture']:'' ?>" name="t_num_facture" value="" class="form-control" placeholder="Numéro de la facture">
                  </div>
               </div>				
<!-- debut facture-->					
				

				<div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Nature</label>
                     <select name="i_nature" id="i_nature" required="true" class="form-control">
                      <option value="">Sélectionner une nature</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_nature'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Avec TVA</option>

                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_nature'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Sans TVA</option>						 
                    </select>
                  </div>
                </div>				
				
               
               <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Statut de la facture</label>
                     <select name="i_invoice_status" id="i_invoice_status" required="true" class="form-control">
                      <option value="">Sélectionner le statut de la facture</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_invoice_status'] =='yettostart'){ echo 'selected';} ?> value="yettostart">No démarré</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_invoice_status'] =='ongoing'){ echo 'selected';} ?> value="ongoing">En cours</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_invoice_status'] == 'completed'){ echo 'selected';} ?> value="completed">Terminé</option>						  
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_invoice_status'] =='cancelled'){ echo 'selected';} ?> value="cancelled">Annulé</option>
                    </select>
                  </div>
                </div>
                <?php if(!isset($invoicedetails)) {  ?>
                <!--<div class="col-sm-6 col-md-5">
                 <div class="form-group">
                     <label class="form-label">Email</label>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" value="1" name="bookingemail" id="bookingemail" class="custom-control-input" id="bookingemail">
                      <label class="custom-control-label" for="bookingemail">Faut-il envoyer un e-mail de confirmation de réservation au client ?</label>
                    </div>
                  </div>
            </div>
             </div>-->
           <?php } ?>

            </div>
  
            <input type="text" id="i_date_debut" name="i_date_debut" value="<?php echo date('Y-m-d'); ?>">
            <input type="text" id="i_end_date" name="i_end_date" value="<?php echo date('Y-m-d'); ?>">
            <input type="text" id="t_invoice_tolat" name="t_invoice_tolat" value="1">
            <input type="text" id="t_invoice_tolog" name="t_invoice_tolog" value="1">
            <input type="text" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="text" id="i_created_date" name="i_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($invoicedetails))?'Modifier':'Ajouter' ?></button>
            </div>
      </form>
             </div>
    </section>
    <!-- /.content -->



