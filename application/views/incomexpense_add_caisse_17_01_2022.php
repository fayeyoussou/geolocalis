    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Modifier mouvement de caisse':'Ajouter mouvement de caisse' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Mouvement</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails))?'Modifier mouvement de caisse':'Ajouter mouvement de caisse' ?> </li>      
                
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
            <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
<!--                  <li class="pt-2 px-3"><h3 class="card-title">Card Title</h3></li>
-->                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Alimentation caisse - CHEQUE</a>
                  </li>
                 <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-home-espece-tab" data-toggle="pill" href="#custom-tabs-two-home-espece" role="tab" aria-controls="custom-tabs-two-home-espece" aria-selected="true">Alimentation caisse - ESPECE</a>
                  </li>					
					
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Dépenses (Sortie)</a>
                  </li>

					
<!--                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-alimentation-caisse-tab" data-toggle="pill" href="#custom-tabs-two-alimentation-caisse" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Alimentation caisse</a>
                  </li>	-->				

                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
<!-- Debut caisse-->
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_caisse_alimentationcaisse_cheque'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label"> Numéro du chèque <span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero']:'' ?>" name="ie_numero" placeholder="Numéro du chéque">
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
                     <label class="form-label">Banque emettrice<span class="form-required">*</span></label>
                     <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="">Sélectionner Banque emettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
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
                  <input type="hidden" id="ie_type_mouvement_caisse" name="ie_type_mouvement_caisse" value="<?php echo "Alimentation Caisse"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "CHEQUE"; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter une Alimentation Caisse par chéque' ?></button>
      </div>
    </form>
             </div>
    </section>					  
<!-- Fin caisse-->					  
					  
					  
                  </div>
<!-- debut espece-->
					  
<div class="tab-pane fade show" id="custom-tabs-two-home-espece" role="tabpanel" aria-labelledby="custom-tabs-two-home-espece-tab">
<!-- Debut caisse-->
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_caisse_alimentationcaisse_espece'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label"> numéro pièce de caisse<span class="form-required">*</span></label>
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
                  <input type="hidden" id="ie_type_mouvement_caisse" name="ie_type_mouvement_caisse" value="<?php echo "Alimentation Caisse"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "ESPECE"; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter une Alimentation Caisse par ESPECE' ?></button>
      </div>
    </form>
             </div>
    </section>					  
<!-- Fin caisse-->					  
					  
					  
                  </div>					  
<!-- Fin espece-->					  
					  
					  
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

<!-- DEBUT CAISSE ALIMENTATION CAISSE DEPENSE SORTIE-->
<section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense_caisse_alimentationcaisse_depense_sortie'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

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
                          <label class="form-label">Bénéficiaire<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ie_beneficiaire" name="ie_beneficiaire" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_beneficiaire']:'' ?>" placeholder="Bénéficiaire">

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
                        <label for="ie_nature" class="form-label">Nature </label>
                        <select id="ie_nature" name="ie_nature" class="form-control " required="">
                          <option value="">Sélectionner Nature </option> 
                          <option <?php echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['ie_nature']=='Réparation') ? 'selected':'' ?> value="Réparation">Réparation</option> 
                          <option <?php echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['ie_nature']=='Transport') ? 'selected':'' ?> value="Transport">Transport</option> 
                        </select>
                      </div>
                    </div>					  
					  
                    <div class="col-sm-6 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type_mouvement_caisse" name="ie_type_mouvement_caisse" value="<?php echo "CAISSE ALIMENTATION CAISSE DEPENSE SORTIE"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "CHEQUE"; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter ALIMENTATION CAISSE DEPENSE SORTIE' ?></button>
      </div>
    </form>
             </div>
    </section>
	
<!-- FIN CAISSE ALIMENTATION CAISSE DEPENSE SORTIE-->

					  
					  
                  </div>
					  
						  

				  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
            <!-- /.nav-tabs-custom -->
          </div>          
          
<!-- Fin onglet-->          
          
       
             </div>
    </section>
    <!-- /.content -->



