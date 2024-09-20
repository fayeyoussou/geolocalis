    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Synthèse
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Synthèse </li>
                
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
<!-- debut onglet-->
          <!--Debut transport-->
          <div class="active tab-pane" id="transport">
              <div class="post">
                  <div class="user-block">
                      <!--<h2 class="m-0 text-dark">transport</h2> -->
                      <form method="post" id="facture_synthese" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'booking'; ?>">
                          <div class="row">
                              <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >


                              <div class="col-sm-6 col-md-3">
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

                              <div class="col-sm-6 col-md-3">
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

                              <!-- Fin zone-->



                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Nom du navire</label>
                                      <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                                  </div>
                              </div>
                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Référence / N° BL</label>
                                      <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL"  >
                                  </div>
                              </div>


                              <!--Debut Nombre de conteneurs-->

                              <!-- -->                <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Nombre de conteneurs</label>
                                      <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur"  >
                                  </div>
                              </div>
                              <!--Fin Nombre de conteneurs-->




                              <!-- debut taxe-->

                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Taxe</label>
                                      <select name="t_taxe" id="t_taxe"  class="form-control selectized">
                                          <option value="">Sélectionner taxe</option>
                                          <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Entreprise (Avec TVA)</option>

                                          <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Particulier (Sans TVA)</option>
                                      </select>
                                  </div>
                              </div>

                              <!-- debut taxe-->


                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Nombre AGS</label>
                                      <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_ags']:'' ?>" name="t_nombre_ags" id="t_nombre_ags" class="form-control" placeholder="Nombre AGS">
                                  </div>
                              </div>
                              <!-- debut AGS-->

                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Date facture </label>
                                      <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>"  >
                                  </div>
                              </div>




                              <!-- debut taxe-->

                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Ristourne</label>
                                      <select name="t_ristourne" id="t_ristourne"  class="form-control selectized">
                                          <option value="">Sélectionner Ristourne</option>
                                          <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='avec_ristourne'){ echo 'selected';} ?> value="avec_ristourne">Avec ristourne</option>

                                          <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='sans_ristourne'){ echo 'selected';} ?> value="sans_ristourne">Sans ristourne</option>
                                      </select>
                                  </div>
                              </div>

                              <!-- debut taxe-->


                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Montant Ristourne</label>
                                      <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_ristourne_amount']:'' ?>" name="t_ristourne_amount" id="t_ristourne_amount" class="form-control" placeholder="Montant Ristourne">
                                  </div>
                              </div>


                              <!-- Debut Type de reglement-->

                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Conditions de réglement</label>
                                      <select id="t_type_reglement"  class="form-control selectized"   name="t_type_reglement">
                                          <option value="">Selectionner la conditions de réglement</option>
                                          <?php  foreach ($type_reglementlist as $key => $type_reglementlists) { ?>
                                              <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_type_reglement'] == $type_reglementlists['tr_id']){ echo 'selected';} ?> value="<?php echo output($type_reglementlists['tr_id']) ?>"><?php echo output($type_reglementlists['tr_name']); ?> </option>
                                          <?php  } ?>
                                      </select>
                                  </div>
                              </div>

                              <!-- Fin Type de reglement-->

                              <!-- Debut reglement-->

                              <!---->               <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Réglement</label>
                                      <select id="t_reglement"  class="form-control selectized"   name="t_reglement">
                                          <option value="">Selectionner réglement</option>
                                          <?php  foreach ($reglementlist as $key => $reglementlists) { ?>
                                              <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_reglement'] == $reglementlists['tg_id']){ echo 'selected';} ?> value="<?php echo output($reglementlists['tg_id']) ?>"><?php echo output($reglementlists['tg_name']); ?> </option>
                                          <?php  } ?>
                                      </select>
                                  </div>
                              </div>

                              <!-- Debut compagnie-->

                              <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Compagnie</label>
                                      <select id="t_compagnie"  class="form-control selectized"   name="t_compagnie">
                                          <option value="">Selectionner compagnie</option>
                                          <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                                              <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                                          <?php  } ?>
                                      </select>
                                  </div>
                              </div>
                              
                              
<div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Date début</label>
                                      <input type="text" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_from']) ? $_POST['booking_from'] : ''; ?>" id="booking_from" name="booking_from" placeholder="Date From">
                                  </div>
                              </div>
                              
                              
                            <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                      <label class="form-label">Date fin</label>
                                      <input type="text" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_to']) ? $_POST['booking_to'] : ''; ?>" id="booking_to" name="booking_to" placeholder="Date To">
                                  </div>
                              </div>                              

                              <!-- Fin compagnie-->



                              <!-- debut Nature-->






                          </div>


                         <div class="card-footer text-right">
                              <button type="submit" class="btn btn-primary"> Afficher le rapport</button>
                          </div>
                      </form>

                  </div>
              </div>

          </div>
          <!--Debut transport-->


          <!-- Fin onglet-->
          
       
             </div>
    </section>
    <!-- /.content -->



