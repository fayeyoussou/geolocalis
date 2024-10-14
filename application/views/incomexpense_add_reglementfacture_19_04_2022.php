    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Modifier mouvement de caisse':'Ajouter un reglement de facture' ?> <?php if((isset($incomexpensedetails))){ ?>    N°  <?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['t_num_facture']:'' ?>  <?php }else{?> N° R<?= $numeroreglement; }?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">dashboard</a></li>
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
                    <a class="nav-link active" id="custom-tabs-one-cheque-tab" data-toggle="pill" href="#custom-tabs-one-cheque" role="tab" aria-controls="custom-tabs-one-cheque" aria-selected="true">CHEQUE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-espece-tab" data-toggle="pill" href="#custom-tabs-one-espece" role="tab" aria-controls="custom-tabs-one-espece" aria-selected="false">ESPECE</a>
                  </li>
					<li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-journal-tab" data-toggle="pill" href="#custom-tabs-one-journal" role="tab" aria-controls="custom-tabs-one-journal" aria-selected="false">JOURNAL</a>
                  </li>


                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-cheque" role="tabpanel" aria-labelledby="custom-tabs-one-cheque-tab">
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_reglementfacture_cheque'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

						<div class="col-sm-6 col-md-4">
                                  <div class="form-group">
                                      <label class="form-label">Transitaire</label>
                                      <select id="ie_transitaire_id"  class="form-control selectized"   name="ie_transitaire_id">
                                          <option value="">Selectionner le transitaire</option>
                                          <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                                              <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_transitaire_id'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
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
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
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
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
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
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "REGLEMENT"; ?>">
			      <input type="hidden" id="ie_espece_cheque" name="ie_espece_cheque" value="<?php echo "CHEQUE"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "income"; ?>">           <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="R<?= $numeroreglement; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'AJOUTER CHEQUE' ?></button>
      </div>
    </form>
             </div>
    </section>
                  </div>
					  
					  
                  <div class="tab-pane fade" id="custom-tabs-one-espece" role="tabpanel" aria-labelledby="custom-tabs-one-espece-tab">

<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_reglementfacture_cheque'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 <!--<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Factures<span class="form-required">*</span></label>
                     <select id="ie_trip_id" class="form-control selectized"    style="width: 100%;"  name="ie_trip_id" >
                        <option value="">Sélectionner les factures </option>
                        <?php  //foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php //echo output($facturelists['t_id']) ?>"><?php //echo output($facturelists['t_id']) ?> - <?php //echo output($facturelists['t_num_facture']); ?></option>
                        <?php  //} ?>
                     </select>
                  </div>
               </div>-->
					  
							<div class="col-sm-6 col-md-4">
                                  <div class="form-group">
                                      <label class="form-label">Transitaire</label>
                                      <select id="ie_transitaire_id"  class="form-control selectized"   name="ie_transitaire_id">
                                          <option value="">Selectionner le transitaire</option>
                                          <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                                              <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_transitaire_id'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
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
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
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
                  <input type="hidden" id="ie_type_mouvement" name="ie_type_mouvement" value="<?php echo "REGLEMENT"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "income"; ?>">           <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="R<?= $numeroreglement; ?>">


			      <input type="hidden" id="ie_espece_cheque" name="ie_espece_cheque" value="<?php echo "ESPECE"; ?>">
        
			  <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'MODIFIER ESPECE':'AJOUTER ESPECE' ?></button>
      </div>
    </form>
             </div>
    </section>					  
	  
                  </div>
					  
<div class="tab-pane fade" id="custom-tabs-one-journal" role="tabpanel" aria-labelledby="custom-tabs-one-journal-tab">

<section class="content">
   <div class="container-fluid">
       <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php echo base_url();?>incomexpense/journalreglement_facture">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">

				
				<div class="col-md-4">
				<div class="form-group">
                     <label class="form-label">N° Réglement<span class="form-required"></span></label>
                     <input type="text" required="true" class="form-control form-control-sm" value="<?php echo isset($_POST['ie_numero_enregistrement']) ? $_POST['ie_numero_enregistrement'] : ''; ?>" id="ie_numero_enregistrement" name="ie_numero_enregistrement" placeholder="N° Réglement">
                   </div>	
                 </div>				
				
				
				<div class="col-md-4">
				<div class="form-group">
                     <label class="form-label">Factures<span class="form-required"></span></label>
                     <select id="ie_ieb_id" class="form-control selectized" style="width: 100%;"  name="ie_ieb_id">
                        <option value="">Sélectionner les factures </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_ieb_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_id']) ?> - <?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
                   </div>	
                 </div>	
				
                              <div class="col-sm-6 col-md-4">
                                  <label class="form-label">Client</label>
                                  <div class="form-group">
                                      <select id="t_customer_id"  class="form-control selectized"  name="t_customer_id">

                                          <option value="">Selectionner client</option>
                                          <?php foreach ($customerlist as $key => $customerlists) { ?>
                                              <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                                          <?php  } ?>
                                      </select>
                                  </div>
                              </div>

                              <!-- Debut transitaire-->

                              <div class="col-sm-6 col-md-4">
                                  <div class="form-group">
                                      <label class="form-label">Transitaire</label>
                                      <select id="t_transitaire"  class="form-control selectized"   name="t_transitaire">
                                          <option value="">Selectionner le transitaire</option>
                                          <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                                              <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                                          <?php  } ?>
                                      </select>
                                  </div>
                              </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="incomeexpense_from" name="incomeexpense_from" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" placeholder="Date début">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="incomeexpense_to" name="incomeexpense_to" value="<?php echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" placeholder="Date fin">

                      </div>
                    </div>				
				
				
<!--               <div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Date début</label>
                     <div class="col-sm-7 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php //echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" id="incomeexpense_from" name="incomeexpense_from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Date fin</label>
                     <div class="col-sm-7 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php //echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" id="incomeexpense_to" name="incomeexpense_to" placeholder="Date fin">
                     </div>
                  </div>
               </div>-->
                
             <!--<div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Objet</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" class="form-control form-control-sm" value="<?php //echo isset($_POST['ie_objet']) ? $_POST['ie_objet'] : ''; ?>" id="ie_objet" name="ie_objet" placeholder="Date To">
                     </div>
                  </div>
               </div>-->      
				
				
				
                              <div class="col-sm-6 col-md-4">
                                  <label class="form-label">Banque émettrice</label>
                                  <div class="form-group">
                                      <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="<?php echo isset($_POST['ie_banque_emettrice_id']) ? $_POST['ie_banque_emettrice_id'] : ''; ?>">Banque émettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                                  </div>
                              </div>

                              <!-- Debut transitaire-->

                              <div class="col-sm-6 col-md-4">
                                  <div class="form-group">
                                      <label class="form-label">Banque receptrice</label>
                                      <select id="ie_banque_receptrice_id"  class="form-control selectized"  name="ie_banque_receptrice_id" >
                        <option value="<?php echo isset($_POST['ie_banque_receptrice_id']) ? $_POST['ie_banque_receptrice_id'] : ''; ?>">Banque receptrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                                  </div>
                              </div>				

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">N° Conteneur<span class="form-required"></span></label>
                         <input type="text" class="form-control" id="co_numero_conteneur" name="co_numero_conteneur" value="<?php echo isset($_POST['co_numero_conteneur']) ? $_POST['co_numero_conteneur'] : ''; ?>" placeholder="Date début">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">N° BL<span class="form-required"></span></label>
                         <input type="text" class="form-control" id="t_reference" name="t_reference" value="<?php echo isset($_POST['t_reference']) ? $_POST['t_reference'] : ''; ?>" placeholder="N° BL">

                      </div>
                    </div>					
	
				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">N° Chéque/ Espèce<span class="form-required"></span></label>
                         <input type="text" class="form-control" id="ie_numero" name="ie_numero" value="<?php echo isset($_POST['ie_numero']) ? $_POST['ie_numero'] : ''; ?>" placeholder="N° Chéque/ Espèce">

                      </div>
                    </div>					
				
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Rapport</button>
      </div>			 
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php /*if(!empty($incomexpense)){ 
                $CHEQUE = $ESPECE = 0;
                foreach ($incomexpense as $item) {
                    if($item['ie_type']=='CHEQUE') {
                      $CHEQUE += $item['ie_amount'];
                    }
                     if($item['ie_type']=='ESPECE') {
                      $ESPECE += $item['ie_amount'];
                    }
                }
                $SOLDE = $CHEQUE + $ESPECE;*/
            ?>
          
                 <table  class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
<!---->                   <th>Numéro Réglement</th>
                          <th>Transitaire</th>
                          <th>Date</th>
                          <th>Numéro Cheque/Espèce</th>
                          <th>Montant</th>
                          <th>Emettrice</th>
                          <th>Receptrice</th>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
<?php if(!empty($incomexpense)){ ?>
                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
<!---->                           <td><?php echo output($incomexpenses['ie_numero_enregistrement']); ?></td>
                        <td> <?php echo output($incomexpenses['tra_name']); ?></td>
                        <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                        <td><?php echo output($incomexpenses['ie_numero']); ?></td>
                         <td><?php echo output($incomexpenses['ie_amount']); ?></td>
                         <td><?php //echo output($incomexpenses['ie_banque_emettrice_id']); ?> <?php if($incomexpenses['ie_banque_emettrice_id']!=0) {echo output($incomexpenses['banque_emettrice']->ieb_name); }?></td>
                         <td><?php //echo output($incomexpenses['ie_banque_receptrice_id']); ?><?php if($incomexpenses['ie_banque_receptrice_id']!=0) {echo output($incomexpenses['banque_receptrice']->ieb_name); }?></td>
                         <td> <span class="badge <?php echo ($incomexpenses['ie_banque_emettrice_id']!=0) ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($incomexpenses['ie_banque_emettrice_id']!=0) ? 'CHEQUE' : 'ESPECE'; ?></span><?php //if($incomexpenses['ie_type']=='expense') echo output($incomexpenses['ie_amount']); ?></td>
                          <td>   </td>
                        
							<td>
 <?php //$t_validation=''; if(userpermission('lr_trips_validate')) { ?>                                  
<?php  //$t_validation =  $facturelists['t_validation'];?>                           
                                   <?php //if($t_validation=="non_valide") { ?> 
                            <a class="icon" href="#">
                              <i class="fa fa-edit"></i>
                            </a>
<?php //}?>
<?php //}?><!--fin permission-->
								   
						<?php //if(userpermission('lr_trips_detail')) { ?>		   
<a class="icon" href="<?php echo base_url(); ?>incomexpense/details/<?php echo output($incomexpenses['ie_id']); ?>">                           
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php //} ?>		   
 <?php if($incomexpenses['ie_banque_emettrice_id']!=0){?>                                  
 
                           <i class="fa fa-window-close text-blue"></i>
                           
 <?php } ?>								
                          </td>
							
					</tr>
                        <?php } ?>
 
                        <?php } ?>
					 
					 </tbody>
                     
                      <thead>
                        <tr>
                          <th class="w-1"></th>
<!--                          <th>Véhicule</th>
-->                          <th></th>
                          <th>Total</th>
                          <th><?//= $income; ?></th>
                          <th><?//= $expense; ?></th>
                          <th></th>
                        </tr>
                      </thead>                     
                     
                    </table>
                   <?php //} ?>
        </div>
      </div>
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



