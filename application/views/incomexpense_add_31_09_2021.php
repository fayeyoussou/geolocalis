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
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#encaissement" data-toggle="tab">Règlement factures </a></li>
                  <li class="nav-item"><a class="nav-link" href="#decaissement" data-toggle="tab">Caisse et dépenses</a></li>
                  <li class="nav-item"><a class="nav-link" href="#banque" data-toggle="tab">Banque</a></li>
            
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    
<!--Debut transport-->               
                    <div class="active tab-pane" id="encaissement">

<!-- debut sous tab REGLEMENT FACTURES-->  
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
                     <select id="ie_ieb_id" class="form-control selectized"    style="width: 100%;"  name="ie_ieb_id[]" multiple>
                        <option value="">Sélectionner les factures </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_ieb_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_id']) ?> - <?php echo output($facturelists['t_num_facture']); ?></option>
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
                  <input type="hidden" id="ie_type_mouvement_caisse" name="ie_type_mouvement_caisse" value="<?php echo "Règlement factures"; ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "CHEQUE"; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier chéque':'Ajouter chéque' ?></button>
      </div>
    </form>
             </div>
    </section>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          
        </div>						
<!-- fin sous tab REGLEMENT FACTURES-->						
                      
                  </div>
 <!--Debut transport-->               

                    <!-- /.tab-pane -->
                  <div class="tab-pane" id="decaissement">
                    <!-- The timeline -->
<!-- debut sous tab CAISSE ET DEPENSE-->
<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
<!--                  <li class="pt-2 px-3"><h3 class="card-title">Card Title</h3></li>
-->                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Profile</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur. 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>

				  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>					  
<!--fin sous tab CAISSE ET DEPENSE-->					  
                  </div>

                  <div class="tab-pane" id="banque">

<!-- debut sous tab BANQUE-->
<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
<!--                  <li class="pt-2 px-3"><h3 class="card-title">Card Title</h3></li>
-->                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Profile</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur. 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>

				  </div>
              </div>
              <!-- /.card -->
            </div>
          </div>					  
<!--fin sous tab BANQUE-->					  
					  
                  </div>
                    
                  
                  <!-- /.tab-pane -->
                  

                                      
                    
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>          
          
<!-- Fin onglet-->          
          
       
             </div>
    </section>
    <!-- /.content -->



