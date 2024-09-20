    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Modifier une opération de banque':'Ajouter une opération de banque' ?> N° BAN000<?= $numero_compteurbanque; ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Banque</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails))?'Modifier une opération de banque':'Ajouter une opération de banque' ?> </li>      
                
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="tab-pane" id="banque">

<!-- debut sous tab BANQUE-->
<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
<!--                  <li class="pt-2 px-3"><h3 class="card-title">Card Title</h3></li>
-->                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Entrée</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Sortie</a>
                  </li>
				
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

<!-- DEBUT BANQUE ENTREE-->
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_banque'; ?>" enctype='multipart/form-data'>
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 <!--<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Factures<span class="form-required">*</span></label>
                     <select id="ie_ieb_id" class="form-control selectized"    style="width: 100%;"  name="ie_ieb_id[]" multiple>
                        <option value="">Sélectionner les factures </option>
                        <?php // foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_ieb_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php //echo output($facturelists['t_id']) ?>"><?php //echo output($facturelists['t_id']) ?> - <?php //echo output($facturelists['t_num_facture']); ?></option>
                        <?php  //} ?>
                     </select>
                  </div>
               </div>-->

					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label"> Objet des opérations <span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_objet" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_objet']:'' ?>" name="ie_objet" placeholder="Nature des opérations">
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
                         <label class="form-label">Numéro du chéque<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro du chéque">
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
                        <label for="exampleInputFile">Reçu de la banque</label>
                        <div class="input-group"> 
                           <input type="file" class="form-control" id="file" name="file" <?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_recu_bordereau_versement']:''; ?>>
                        </div>
                        <span  class="bg-gradient-success btn-xs">L'image doit être au format A4 et png</span>
                     </div>
                     <?php 
	
	
	//(isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_recu_bordereau_versement']:'';
	if($incomexpensedetails[0]['ie_recu_bordereau_versement']==''){ ?>
                     <img src = "<?= base_url().'assets/uploads/'.$incomexpensedetails[0]['ie_recu_bordereau_versement']; ?>" alt = "Reçu" height = "50" width = "50" />
                     <button type="button" class="logodelete btn btn-primary">Supprimer</button>
                     <?php } ?>
                  </div>					  
					  
                    <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "BANQUE"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "income"; ?>"><!--ENTREE-->
                  <input type="hidden" id="ie_espece_cheque" name="ie_espece_cheque" value="<?php echo "CHEQUE"; ?>"><!--ENTREE-->
			        <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="BAN000<?= $numero_compteurbanque; ?>">
			  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier BANQUE REVENU':'Ajouter BANQUE REVENU' ?></button>
      </div>
    </form>
             </div>
    </section>					  
<!-- FIN BANQUE ENTREE-->
					  
					  
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

<!-- DEBUT BANQUE SORTIE-->
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_banque'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 

					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label"> libellé des opérations <span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_nature" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_nature']:'' ?>" name="ie_nature" placeholder="libellé des opérations">
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
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "BANQUE"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "expense"; ?>"><!--SORITE-->

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter BANQUE DEPENSE' ?></button>
      </div>
    </form>
             </div>
    </section>					  
<!-- FIN BANQUE ENTREE-->					  
					  
					  
                  </div>

					  
				  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>					  
<!--fin sous tab BANQUE-->					  
					  
                  </div>
    <!-- /.content -->



