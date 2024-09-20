    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
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
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">ENTREE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">SORTIE</a>
                  </li>
				<li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-journal-tab" data-toggle="pill" href="#custom-tabs-one-journal" role="tab" aria-controls="custom-tabs-one-journal" aria-selected="false">JOURNAL</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

<!-- DEBUT BANQUE ENTREE-->
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_banque_entree'; ?>" enctype="multipart/form-data">
          <div class="card-body">

                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 <!----><div class="col-sm-6 col-md-12">
                  <div class="form-group">
                     <label class="form-label">Reglement<span class="form-required">*</span></label>
                     <select id="ie_reglement_id" class="form-control selectized"    style="width: 100%;"  name="ie_reglement_id">
                        <option value="">Sélectionner le reglement </option>
                        <?php foreach ($reglementlist as $key => $reglementlists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_id'] == $reglementlists['ie_id']){ echo 'selected';} ?> value="<?php echo output($reglementlists['ie_id']) ?>"><?php echo output($reglementlists['ie_id']) ?> - N° <?php echo output($reglementlists['ie_numero_enregistrement']); ?> - Date du : <?php echo output($reglementlists['ie_date']); ?> - Montant: <?php echo output($reglementlists['ie_amount']); ?> FCFA</option>
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
                        <label for="exampleInputFile">Reçu bordereau de versement</label>
                        <div class="input-group"> 
                           <input type="file" class="form-control" id="file" name="file" <?php //echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_recu_bordereau_versement']:''; ?> <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_recu_bordereau_versement'] != '') ?>>
                        </div>
                        <span  class="bg-gradient-success btn-xs">L'image doit être au format A4 et png</span>
                     </div>
                     <?php 
	
	
	//(isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_recu_bordereau_versement']:'';
	//if($incomexpensedetails[0]['ie_recu_bordereau_versement']==''){ ?>
	<?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_recu_bordereau_versement'] != '') {?>
	
                     <img src = "<?= base_url().'assets/uploads/'.$incomexpensedetails[0]['ie_recu_bordereau_versement']; ?>" alt = "Reçu" height = "50" width = "50" />
                     <button type="button" class="logodelete btn btn-primary">Supprimer</button>
                     <?php } ?>
                  </div>					  
					  
                    <div class="col-sm-6 col-md-4">
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

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier BANQUE REVENU':'Ajouter ENTREE BANQUE' ?></button>
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
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_banque_sortie'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

	<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Compte<span class="form-required">*</span></label>
                     <select id="ie_compte_id"  class="form-control selectized"  name="ie_compte_id" >
                        <option value="">Sélectionner le Compte</option>
                        <?php  foreach ($comptelist as $key => $comptelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_compte_id'] == $comptelists['iec_id']){ echo 'selected';} ?> value="<?php echo output($comptelists['iec_id']) ?>"><?php echo output($comptelists['iec_name']); ?> - Code: <?php echo output($comptelists['iec_code']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>		 

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
                         <label class="form-label">Numéro du chéque<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro du chéque">
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
					  
				<!--<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Banque receptrice<span class="form-required">*</span></label>
                     <select id="ie_banque_receptrice_id"  class="form-control selectized"  name="ie_banque_receptrice_id" >
                        <option value="">Sélectionner Banque receptrice</option>
                        <?php  //foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php //echo output($banquelists['ieb_id']) ?>"><?php //echo output($banquelists['ieb_name']); ?> - <?php //echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  //} ?>
                     </select>
                  </div>
               </div>-->					  
					  
					  
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
                  <input type="hidden" id="ie_espece_cheque" name="ie_espece_cheque" value="<?php echo "CHEQUE"; ?>"><!--ENTREE-->
			        <input type="hidden" id="ie_numero_enregistrement" name="ie_numero_enregistrement" value="BAN000<?= $numero_compteurbanque; ?>">			  

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter BANQUE DEPENSE' ?></button>
      </div>
    </form>
             </div>
    </section>					  
<!-- FIN BANQUE ENTREE-->					  
					  
					  
                  </div>

<!-- DEBUT JOURNAL-->					  
					  
<div class="tab-pane fade" id="custom-tabs-one-journal" role="tabpanel" aria-labelledby="custom-tabs-one-journal-tab">

<section class="content">
   <div class="container-fluid">
       <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php echo base_url();?>incomexpense/addbanque">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">

				
				
               <div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Date début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" id="incomeexpense_from" name="incomeexpense_from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Date fin</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" id="incomeexpense_to" name="incomeexpense_to" placeholder="Date fin">
                     </div>
                  </div>
               </div>
                
             <!--<div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Objet</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" class="form-control form-control-sm" value="<?php //echo isset($_POST['ie_objet']) ? $_POST['ie_objet'] : ''; ?>" id="ie_objet" name="ie_objet" placeholder="Date To">
                     </div>
                  </div>
               </div>-->               
                
               <div class="col-md-6">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-4 col-form-label">Banque émettrice</label>
                     <div class="col-sm-7 form-group">
                        <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="<?php echo isset($_POST['ie_banque_emettrice_id']) ? $_POST['ie_banque_emettrice_id'] : ''; ?>">Banque émettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                     </div>
                  </div>
               </div>
				
				<div class="col-md-6">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-4 col-form-label">Banque receptrice</label>
                     <div class="col-sm-7 form-group">
                        <select id="ie_banque_receptrice_id"  class="form-control selectized"  name="ie_banque_receptrice_id" >
                        <option value="<?php echo isset($_POST['ie_banque_receptrice_id']) ? $_POST['ie_banque_receptrice_id'] : ''; ?>">Banque receptrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                     </div>
                  </div>
               </div>							
				
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer Rapport</button>
               </div>
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
<!---->                   <th>Numéro</th>
                          <th>Date</th>
                          <th>Numéro</th>
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
<!---->                           <td> <?php //echo output($incomexpenses['vech_name']->v_name).'_'.output($incomexpenses['vech_name']->v_registration_no); ?><?php echo output($incomexpenses['ie_numero_enregistrement']); ?></td>
                        <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                        <td><?php //echo output($incomexpenses['vech_name']->v_name).'_'.output($incomexpenses['vech_name']->v_registration_no); ?><?php echo output($incomexpenses['ie_numero']); ?></td>
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
<!--<a class="icon" href="<?php //echo base_url(); ?>incomexpense/details/<?php //echo output($incomexpenses['ie_id']); ?>">                           
                              <i class="fa fa-eye"></i>
                            </a>-->
								   
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
<!-- FIN JOURNAL-->					  
				  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>					  
<!--fin sous tab BANQUE-->					  
					  
                  </div>
    <!-- /.content -->



