    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails du reglement N°<?php echo $incomexpensedetails['ie_numero_enregistrement']; ?> 
                
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Détails du reglement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">
      <?php
      $totalpaidamt = 0;
/**/      if(count($paymentdetails)>=1) {
      foreach ($paymentdetails as $payment) {
        //  $totalpaidamt += $payment['ie_amount'];
      } }
      ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant total</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $incomexpensedetails['ie_amount']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant payé</span>
                      <span class="info-box-number text-center text-muted mb-0"><?//= $totalpaidamt; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><?php //= ($incomexpensedetails['t_trip_amount'] > $totalpaidamt)?'Restant':'Excès' ?></span>
                      <span class="info-box-number text-center text-muted mb-0"><?//= preg_replace('/[^\d\.]+/','',$incomexpensedetails['t_trip_amount'] - $totalpaidamt)  ?> <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Aperçu:</h4>
                    <div class="post">
                      <div class="row">
                      <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?//= $incomexpensedetails['t_trip_fromlocation']; ?>
                        </span>
                        <span class="description"><?//= $incomexpensedetails['t_start_date']; ?></span>
                      </div>
                    </div> à
                     <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?//= $incomexpensedetails['t_trip_tolocation']; ?>
                        </span>
                        <span class="description"><?//= $incomexpensedetails['t_end_date']; ?></span>
                      </div>
                       </div>
                        <div class="col-lg-4"></div>
                        <?php 
                        /*if($incomexpensedetails['t_totaldistance']!='') {
                          if($incomexpensedetails['t_type']=='single') { $dist = $incomexpensedetails['t_totaldistance']; } else { $dist = $incomexpensedetails['t_totaldistance']*2; } */ ?>
                          <?//= $incomexpensedetails['t_type']; ?> avec total <?//= $dist; ?> km 
                        <?php //} ?>
                     </div>
                    </div>

                    
<!-- Debut tab--> 
 <div >
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<!--                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-conteneur-tab" data-toggle="pill" href="#custom-tabs-conteneur" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">incomexpense</a>
                  </li>-->
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-reglement-tab" data-toggle="pill" href="#custom-tabs-one-reglement" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Paiements de factures du réglement N°<?php echo $incomexpensedetails['ie_numero_enregistrement']; ?></a>
                  </li>
<!--                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li>-->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  
                  <div class="tab-pane fade" id="custom-tabs-one-reglement" role="tabpanel" aria-labelledby="custom-tabs-one-reglement-tab">
                      
<!-- Début tab reglement-->                                          

                    <div class="post clearfix">
                      <?php if(!empty($paiementdetails)) { ?>
                   <table class="table table-bordered table-sm">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Montant</th>
                      <th>Commentaires</th>
                      <th>Payé le</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $count=1;
                           foreach($paiementdetails as $paiementdetails){ ?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php //echo output($paymentdetails['tp_amount']); ?></td>
                      <td><?php echo output($paiementdetails['tp_notes']); ?></td>
                      <td><?php echo output($paiementdetails['tp_created_date']); ?></td>
                      <td>
                        <a class="icon" href="<?php echo base_url(); ?>incomexpense/incomexpensepayment_delete/<?php echo output($paiementdetails['tp_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                 <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun paiement n\'est éffectué pour la incomexpense !.</div>';
                     }
                     ?>
                </div>

<!-- Fin tab reglement-->                                          
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>                   
<!-- Fin tab-->                    
                    
                    
                    
                    
                    
                    
                </div>

              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="mt-2 mb-3">
<!--                <a href="#" class="btn btn-sm btn-success <?//= ($incomexpensedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un paiement</a>-->
<!--                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-incomexpenseexpense">Dépenses</a>-->
 
<?php $t_type_facturation=''; //$t_type_facturation= $incomexpensedetails['t_type_facturation'];?> 
                  
                  <?php  if ($t_type_facturation == 'Immobilisation')  {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-immobilisation">Immobilisation</a> 
                 <?php } ?>
          
                 <?php if($t_type_facturation=='Manutentation') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-manutention">Manutention</a>  
                 <?php }?>
                  
                 <?php if ($t_type_facturation=='Detention') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-detention">Detention</a>                  
                 <?php }?>
                <?php  if ($t_type_facturation == 'Transport') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">Ajouter conteneur </a>      
                 <?php }?> 
                <?php if ($t_type_facturation == 'Exportation') {?>
                  
                 <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-export">Ajouter conteneur</a>  
                  <?php }?>                  
                 <?php  if ($t_type_facturation == 'Transfert') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-transfert">Transfert</a>                  
                  <?php }?>                                                 
                    <br/>           
             <!--   <a href="<?//= base_url(); ?>incomexpense/incomexpense_generation/<?//= $incomexpensedetails['tp_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Aperçu de la incomexpense</a><br>-->

<!--                <a href="<?//= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> <br>-->                   
<!--                <a href="<?//= base_url(); ?>incomexpense/invoice/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generate Invoice</a>
-->                
                <a href="#" class="btn btn-sm btn-success <?//= ($incomexpensedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un Réglement</a>
                <!--<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a> -->                 
                </div> 
              <br>
              <div class="text-muted">
 
                <p class="text-sm">Informations le réglement
                  <b class="d-block">Date: <?//= $incomexpensedetails['t_date_incomexpense']; ?></b>
                  <b class="d-block">Nombre de conteneurs: <?//= $incomexpensedetails['t_nombre_conteneur']; ?></b>
                  <b class="d-block">Type: <?//= $incomexpensedetails['t_type_facturation']; ?></b>
                  <b class="d-block">AGS: <?//= $incomexpensedetails['t_nombre_ags']; ?></b>
                </p>
                  
                <p class="text-sm">Informations du client
                  <b class="d-block"><?//= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_address']; ?></b>
                </p>                  
                  
                  <p class="text-sm">Informations du client
                  <b class="d-block"><?//= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_address']; ?></b>
                </p>
                <p class="text-sm">Informations du chauffeur
                  <?php if(isset($driverdetails['d_name'])) { ?>
                  <b class="d-block"><?//= $driverdetails['d_name']; ?></b>
                  <b class="d-block"><?//= $driverdetails['d_mobile']; ?></b>
                  <b class="d-block"><?//= $driverdetails['d_licenseno']; ?></b>
                  <?php  } else { echo '<b class="d-block"><span class="badge badge-danger">Encore à attribuer</span></b>'; } ?>
                </p>

              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
    </section>
<div class="modal fade show" id="modal-AddPayment" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Effectuer le paiement d'une facture</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="trippayments" action="<?= base_url() ?>incomexpense/trippayment" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant Total du réglement</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="totalamount" value="<?= $incomexpensedetails['ie_amount']; ?>"  placeholder="Saisir Montant Total" disabled>
                    </div>
                  </div>
                  <!--<div class="form-group row">
                    <label for="paidamount" class="col-sm-4 col-form-label">Montant  restant</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="pendingamount" value="<?//= $incomexpensedetails['t_trip_amount']-$totalpaidamt; ?>" id="pendingamount" placeholder="Montant restant" disabled>
                    </div>
                  </div>-->

                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Montant à verser</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_amount" id="tp_amount" placeholder="Montant à verser">
                    </div>
                  </div>                    
                    
                    <div class="form-group row">
                    <label for="tp_type" class="col-sm-4 col-form-label">Type</label>
                    <div class="form-group col-sm-8">
                     <select name="tp_type" id="tp_type" required="true" class="form-control">
                      <option value="">Sélectionner un Type </option>
                      <option value="espece">Solder</option>

                      <option value="cheque">Avance</option>						 
                    </select>
                    </div>
                  </div>
                    
<div class="form-group row">
                    <label for="tp_type" class="col-sm-4 col-form-label">Facture</label>
                    <div class="form-group col-sm-8">
                     <select id="tp_trip_id" class="form-control" style="width: 100%;"  name="tp_trip_id">
                        <option value="">Sélectionner la facture </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php //echo output($facturelists['t_id']) ?><?php echo output($facturelists['t_num_facture']); ?> - <?php echo output($facturelists['t_trip_amount']); ?> </option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>
					
					
                    
                <!--<div class="form-group row">
                    <label for="tp_numero_bordereau" class="col-sm-4 col-form-label">Numéro bordereau</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_numero_bordereau" id="tp_numero_bordereau" placeholder="Numéro bordereau">
                    </div>
                  </div>-->                    
                    
                   <!--<div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Saisir Notes"></textarea>
                    </div>
                  </div>-->
                </div>
            
            
            
            
                 <input type="text" class="form-control" value="<?= $incomexpensedetails['ie_id']; ?>" name="tp_ie_id" id="tp_ie_id" placeholder="tp_ie_id">
<!-- -->                <input type="text" class="form-control" value="<?= date('Y-m-d'); ?>" name="tp_date" id="tp_date" placeholder="tp_date">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer Paiement</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<div class="modal fade show" id="modal-tripexpense" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter des frais de voyage</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addtripexpense" action="<?= base_url() ?>trips/addtripexpense" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="ie_amount" class="col-sm-4 col-form-label">Montant</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="ie_amount" id="ie_amount" placeholder="Enter amount">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ie_description" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" required="true" id="ie_description" name="ie_description" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>
                </div>
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_start_date']; ?>" name="ie_date" id="ie_date">
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">
                 <input type="hidden" class="form-control" value="expense" name="ie_type" id="ie_type">
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="addtripexpense_trip_id" id="addtripexpense_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer les dépenses</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<div class="modal fade show" id="modal-incomexpenseexpense" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter des frais - incomexpense incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseexpense" action="<?= base_url() ?>incomexpense/addincomexpenseexpense" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="ie_amount" class="col-sm-4 col-form-label">Montant</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="ie_amount" id="ie_amount" placeholder="Saisir le Montant">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ie_description" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" required="true" id="ie_description" name="ie_description" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>
                </div>
                 <input type="hidden" class="form-control" value="<?//= $incomexpensedetails['t_start_date']; ?>" name="ie_date" id="ie_date">
                 <input type="hidden" class="form-control" value="<?//= $incomexpensedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">
                 <input type="hidden" class="form-control" value="expense" name="ie_type" id="ie_type">
                 <input type="hidden" class="form-control" value="<?//= $incomexpensedetails['t_id']; ?>" name="addincomexpenseexpense_incomexpense_id" id="addincomexpenseexpense_incomexpense_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer dépenses</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


<!-- Debut Import-->

<div class="modal fade show" id="modal-import" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter import incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseconteneur" action="<?= base_url() ?>incomexpense/<?php echo (isset($conteneuredit))?'updateincomexpenseconteneur':'addincomexpenseconteneur'; ?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" value="<?php echo (isset($conteneuredit)) ? $conteneuredit[0]['co_numero_conteneur']:''; ?>" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur 2">
                        
<!--                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">                        
-->                        
                    </div>
                  </div>
                    
                  <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Zone</label>
                    <div class="form-group col-sm-8">
<select id="co_zone"  class="form-control"  name="co_zone">
                       <option value="">Selectionner la zone</option>
                        <?php  foreach ($zoneselect as $key => $zonelists) { ?>
                        <option <?php if((isset($conteneur_details)) && $conteneur_details[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>  
                
                    <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
                    </select>
                    </div>
                  </div>                    
                    
                        
                
  <!-- FIN Type de conteneur-->                     
                    
                <div class="form-group row">
                    <label for="co_adresse_livraison" class="col-sm-4 col-form-label">Adresse de livraison</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_adresse_livraison" name="co_adresse_livraison" rows="2" placeholder="Adresse de livraison"></textarea>
                    </div>
                  </div>                    
   
                <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Description</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"><?php echo (isset($conteneuredit)) ? $conteneuredit[0]['co_description']:''; ?></textarea>
                    </div>
                  </div>                       
                    
                </div>
<?php 
//$montantags=$nombreags * $ags;
//echo "nombre ags".$montantags=$incomexpensedetails['t_nombre_ags'];
            
            
            
?>
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
<input type="hidden" class="form-control" value="<?php echo $incomexpensedetails['t_trip_amount'];?>" name="t_trip_amount" id="t_trip_amount">
<input type="hidden" class="form-control" value="<?php echo $incomexpensedetails['t_nombre_ags'];?>" name="t_nombre_ags" id="t_nombre_ags">       
<input type="hidden" class="form-control" value="<?php //echo $incomexpensedetails['t_type_facturation'];?>" name="t_type_facturation" id="t_type_facturation">
<input type="hidden" class="form-control" value="<?php //echo $incomexpensedetails['t_taxe']?>" name="t_taxe" id="t_taxe">            
            <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter Transport</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin Import-->



<!-- Debut manutention-->


<!-- Fin manutention-->

<!-- Debut detention-->


<!-- Fin detention-->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>