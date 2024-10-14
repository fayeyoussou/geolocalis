    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Modifier mouvement de caisse':'Ajouter un reglement de facture' ?> <?php if((isset($incomexpensedetails))){ ?>    N°  <?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['t_num_facture']:'' ?>  <?php }else{?> N° REG000<?= $numeroreglement; }?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Mouvement</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails))?'Modifier mouvement de caisse':'Ajouter un reglement de facture' ?>  </li>      
                
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
<!-- debut onglet-->
<div >
            <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">CHEQUE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">ESPECE</a>
                  </li>


                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_reglementfacture_cheque'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Factures<span class="form-required">*</span></label>
                     <select id="ie_trip_id" class="form-control selectized"    style="width: 100%;"  name="ie_trip_id[]" multiple>
                        <option value="">Sélectionner les factures </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php //echo output($facturelists['t_id']) ?><?php echo output($facturelists['t_num_facture']); ?> - <?php echo output($facturelists['t_trip_amount']); ?> FCFA</option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>

					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label"> Numéro chéque <span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro chéque">
                      </div>
                    </div>
					  
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Montant">
                      </div>
                    </div>                      

				<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Banque émettrice<span class="form-required">*</span></label>
                     <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="">Sélectionner Banque émettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>	
					  
				<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Banque receptrice<span class="form-required">*</span></label>
                     <select id="ie_banque_receptrice_id"  class="form-control selectized"  name="ie_banque_receptrice_id" >
                        <option value="">Sélectionner Banque receptrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
					  
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date de reception<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date de reception">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "Reglement"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "CHEQUE"; ?>">           <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="REG000<?= $numeroreglement; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'AJOUTER CHEQUE' ?></button>
      </div>
    </form>
             </div>
    </section>
                  </div>
					  
					  
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_reglementfacture_espece'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Factures<span class="form-required">*</span></label>
                     <select id="ie_trip_id" class="form-control selectized"    style="width: 100%;"  name="ie_trip_id[]" multiple>
                        <option value="">Sélectionner les factures </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_id']) ?> - <?php echo output($facturelists['t_num_facture']); ?> - <?php echo output($facturelists['t_trip_amount']); ?> FCFA</option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>

					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label"> Numéro de la pièce de caisse <span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro de la pièce de caisse">
                      </div>
                    </div>
					  
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Montant">
                      </div>
                    </div>                      

					
					  
				<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Banque receptrice<span class="form-required">*</span></label>
                     <select id="ie_banque_receptrice_id"  class="form-control selectized"  name="ie_banque_receptrice_id" >
                        <option value="">Sélectionner Banque receptrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
					  
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date de reception<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date de reception">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "Reglement"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "ESPECE"; ?>">           <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="REG000<?= $numeroreglement; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'MODIFIER ESPECE':'AJOUTER ESPECE' ?></button>
      </div>
    </form>
             </div>
    </section>					  
	  
                  </div>
					  
						  
					  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          
        </div>
            <!-- /.nav-tabs-custom -->
          </div>          
          
<!-- Fin onglet-->          
          
       
             </div>
    </section>
    <!-- /.content -->



