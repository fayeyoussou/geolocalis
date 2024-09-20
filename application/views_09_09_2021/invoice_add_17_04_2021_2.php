    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($invoicedetails))?'Modifier facture':'Ajouter facture' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Enrégistrement facture</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($invoicedetails))?'Modifier facture':'Ajouter facture' ?></li>
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
               <input type="hidden" name="i_id" id="i_id" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_id']:'' ?>" >
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="i_customer"  class="form-control selectized" required="true" name="i_customer">
                        <option value="">Sélectionner le client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_customer'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="i_transitaire"  class="form-control"  name="i_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_transitaire'] == $transitairelists['t_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['t_id']) ?>"><?php echo output($transitairelists['t_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                
                
<!-- debut destinataire-->
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Destination<span class="form-required">*</span></label>
                     <select id="i_zone"  class="form-control"  name="i_zone">
                       <option value="">Selectionner la destination</option>
                        <?php  foreach ($zonelist as $key => $zonelists) { ?>
                        <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['i_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>                
<!--Fin destinataire-->  
                

                <!--Debut date factuation-->
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facturation<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_date_facturation']:'' ?>" name="i_date_facturation" value="" class="form-control datepicker" placeholder="Date facturation">
                  </div>
               </div>                
                
                <!--Fin date facturation-->
 
                <!--Debut Nom du navire-->                
                
                <div class="col-sm-6 col-md-5">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_nom_navire']:'' ?>" name="i_nom_navire" value="" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>                
                <!--Fin Nom du navire-->   
                
                
                  <!--Début Montant facture-->   
                <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_reference']:'' ?>" name="i_reference" value="" class="form-control" placeholder="Référence / N° BL">
                  </div>
               </div>
                <!--Fin Montant facture-->   
                
                 <!--Debut Numéro-->                
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_num_facture']:'' ?>" name="i_num_facture" value="" class="form-control" placeholder="Numéro">
                  </div>
               </div>                
                <!--Fin Numéro-->   
                
                
                  <!--Début Montant facture-->   
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant total de la facture<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['t_invoice_amount']:'' ?>" name="t_invoice_amount" value="" class="form-control" placeholder="Montant total de la facture">
                  </div>
               </div>
                <!--Fin Montant facture-->   
               
                
               
                <!--Debut  Numéro container-->   
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro container<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($invoicedetails)) ? $invoicedetails[0]['i_numero_container']:'' ?>" name="i_numero_container" id="t_invoice_fromlocation" class="form-control" placeholder="Numéro container">
                  </div>
               </div>
                <!--Fin  Numéro container-->   
                
                
                
               
               <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Statut facture</label>
                     <select name="t_invoice_status" id="t_invoice_status" required="true" class="form-control">
                      <option value="">invoice Status</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['t_invoice_status'] =='nodemarre'){ echo 'selected';} ?> value="nodemarre">No démarré</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['t_invoice_status'] == 'encours'){ echo 'selected';} ?> value="encours">En cours</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['t_invoice_status'] =='temermine'){ echo 'selected';} ?> value="temermine">Terminé</option>
                      <option <?php if((isset($invoicedetails)) && $invoicedetails[0]['t_invoice_status'] =='annule'){ echo 'selected';} ?> value="annule">Annulé</option>
                    </select>
                  </div>
                </div>
                
<!-- debut nature-->
                
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
                
  <!-- debut nature-->
              
                
                
<!--                <?php //if(!isset($invoicedetails)) {  ?>
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
           <?php //} ?>-->

            </div>
  
<!--            <input type="hidden" id="t_invoice_fromlat" name="t_invoice_fromlat" value="1">
            <input type="hidden" id="t_invoice_fromlog" name="t_invoice_fromlog" value="1">
            <input type="hidden" id="t_invoice_tolat" name="t_invoice_tolat" value="1">
            <input type="hidden" id="t_invoice_tolog" name="t_invoice_tolog" value="1">-->
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="i_created_date" name="i_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($invoicedetails))?'Modifier Facture invoice':'Ajouter Facture' ?></button>
            </div>
      </form>
             </div>
    </section>
    <!-- /.content -->



