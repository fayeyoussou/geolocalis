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
                  <li class="nav-item"><a class="nav-link active" href="#encaissement" data-toggle="tab">Encaissement</a></li>
                  <li class="nav-item"><a class="nav-link" href="#decaissement" data-toggle="tab">Décaissement</a></li>
                  <li class="nav-item"><a class="nav-link" href="#banque" data-toggle="tab">Banque</a></li>
            
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    
<!--Debut transport-->               
                    <div class="active tab-pane" id="encaissement">
                    <div class="post">
                      <div class="user-block">
<!--<h2 class="m-0 text-dark">transport</h2> -->
                          <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

 <div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Facture<span class="form-required">*</span></label>
                     <select id="ie_trip_id"  class="form-control selectized"  name="ie_trip_id" >
                        <option value="">Sélectionner Facture</option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
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
                         <label class="form-label">Numéro pièce / Numéro chéque <span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero_caisse" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero_caisse']:'' ?>" name="ie_numero_caisse" placeholder="Numéro pièce de caisse">
                      </div>
                    </div>					  

					  
					  
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Type Mouvement<span class="form-required">*</span></label>
                         <select name="ie_espece_cheque" id="ie_espece_cheque" class="form-control selectized">
                        <option value="">Selectionner un type</option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_espece_cheque'] == 'CHEQUE'){ echo 'selected';} ?> value="CHEQUE">CHEQUE </option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_espece_cheque'] == 'ESPECE'){ echo 'selected';} ?> value="ESPECE">ESPECE </option>
            </select>
                      </div>
                    </div>
					  
<div class="col-sm-6 col-md-4">
                  <div class="form-group">
                     <label class="form-label">Banque<span class="form-required">*</span></label>
                     <select id="ie_trip_id"  class="form-control selectized"  name="ie_trip_id" >
                        <option value="">Sélectionner Banque</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_ieb_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "Encaissement"; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier Pièce de Caisse':'Ajouter Pièce de Caisse' ?></button>
      </div>
    </form>
             </div>
    </section>
                          
                   </div>
                  </div>      
                      
                  </div>
 <!--Debut transport-->               

                    <!-- /.tab-pane -->
                  <div class="tab-pane" id="decaissement">
                    <!-- The timeline -->
<div class="post">
                      <div class="user-block">
decaissement
						  <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

                   <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Bénéficiaire<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_beneficiaire" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_beneficiaire']:'' ?>" name="ie_beneficiaire" placeholder="Bénéficiaire">
                      </div>
                    </div>
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Objet<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_objet" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_objet']:'' ?>" name="ie_objet" placeholder="Objet">
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
                         <label class="form-label">Numéro pièce de caisse<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero_caisse" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero_caisse']:'' ?>" name="ie_numero_caisse" placeholder="Numéro pièce de caisse">
                      </div>
                    </div>					  
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Type<span class="form-required">*</span></label>
                         <select name="ie_type" id="ie_type" class="form-control selectized">
                        <option value="">Selectionner un type</option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'alimentation_caisse'){ echo 'selected';} ?> value="alimentation_caisse">Alimentation caisse </option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'reglement_facture'){ echo 'selected';} ?> value="reglement_facture">Règlement facture </option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'decaissement_caisse'){ echo 'selected';} ?> value="decaissement_caisse">Décaissement caisse </option>             </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                    <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "Decaissement"; ?>">

      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier Pièce de Caisse':'Ajouter Pièce de Caisse' ?></button>
      </div>
    </form>
             </div>
    </section>
						  
						  
                          
                   </div>
                  </div>
                  </div>

                  <div class="tab-pane" id="banque">
<div class="post">
                      <div class="user-block">
banque
                          <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

                   <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Bénéficiaire<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_beneficiaire" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_beneficiaire']:'' ?>" name="ie_beneficiaire" placeholder="Bénéficiaire">
                      </div>
                    </div>
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Objet<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_objet" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_objet']:'' ?>" name="ie_objet" placeholder="Objet">
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
                         <label class="form-label">Numéro pièce de caisse<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_numero_caisse" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_numero_caisse']:'' ?>" name="ie_numero_caisse" placeholder="Numéro pièce de caisse">
                      </div>
                    </div>					  
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Type<span class="form-required">*</span></label>
                         <select name="ie_type" id="ie_type" class="form-control selectized">
                        <option value="">Selectionner un type</option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'alimentation_caisse'){ echo 'selected';} ?> value="alimentation_caisse">Alimentation caisse </option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'reglement_facture'){ echo 'selected';} ?> value="reglement_facture">Règlement facture </option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'decaissement_caisse'){ echo 'selected';} ?> value="decaissement_caisse">Décaissement caisse </option>             </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                 <input type="hidden" id="ie_type" name="ie_type" value="<?php echo "Banque"; ?>">
 
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier Pièce de Caisse':'Ajouter Pièce de Caisse' ?></button>
      </div>
    </form>
             </div>
    </section>
                          
                   </div>
                  </div>                
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



