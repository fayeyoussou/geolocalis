    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails de la facture N°<?= $facturedetails['t_num_facture']; ?> 
                à
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Détails de la facture et du voyage</li>
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
/*      if(count($trip_conteneur)>=1) {
      foreach ($trip_conteneur as $payment) {
         // $totalpaidamt += $payment['tp_amount'];
      } }*/
      ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant total</span>
                      <span class="info-box-number text-center text-muted mb-0"><?//= $facturedetails['t_trip_amount']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant payé</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $totalpaidamt; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><?= ($facturedetails['t_trip_amount'] > $totalpaidamt)?'Restant':'Excès' ?></span>
                      <span class="info-box-number text-center text-muted mb-0"><?= preg_replace('/[^\d\.]+/','',$facturedetails['t_trip_amount'] - $totalpaidamt)  ?> <span>
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
                          <?= $facturedetails['t_trip_fromlocation']; ?>
                        </span>
                        <span class="description"><?= $facturedetails['t_start_date']; ?></span>
                      </div>
                    </div> à
                     <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?= $facturedetails['t_trip_tolocation']; ?>
                        </span>
                        <span class="description"><?= $facturedetails['t_end_date']; ?></span>
                      </div>
                       </div>
                        <div class="col-lg-4"></div>
                        <?php 
                        if($facturedetails['t_totaldistance']!='') {
                          if($facturedetails['t_type']=='single') { $dist = $facturedetails['t_totaldistance']; } else { $dist = $facturedetails['t_totaldistance']*2; }  ?>
                          <?= $facturedetails['t_type']; ?> avec total <?= $dist; ?> km 
                        <?php } ?>
                     </div>
                    </div>


<!-- debut numéro conteneur--> 
                     <h5>Numéros conteneurs:</h5>                    
            <div class="card-body">
                      <?php if(!empty($conteneurdetails)) { ?>
                   <table class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th>N°</th>
                      <th>Numéro conteneur</th>
                      <th>Désignation</th>
                      <th>Type</th>
                      <th>Destination</th>
                      <th>Montant</th>
<!--                      <th>Date saisie</th>
-->                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $type='';$montant_conteneur=0;$montant=0;$count=1;
                           foreach($conteneurdetails as $conteneurdetails){ ?>
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                        if($conteneurdetails['co_type_conteneur']=='40_pieds') 
                          {      
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                        }
                              $type='40 pieds'; 
                          }}  ?> 
                      
                      <?php //$montant=$type_conteneur + $conteneurdetails['nature_name']->na_montant;?>
                      
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($conteneurdetails['co_numero_conteneur']); ?></td>
                      <td><?php if(isset($facturedetails['t_type_facturation'])){echo output($facturedetails['t_type_facturation']);}?></td>
                      <td>
                          <?php echo output($type);?></td>
                      <td><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></td>
                      <td><?php echo output($montant_conteneur);?></td>
                     <td>
                        <a class="icon" href="<?php echo base_url(); ?>facture/conteneurfacture_edit/<?php echo output($conteneurdetails['co_id']); ?>/<?= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                         
                <a href="<?php echo base_url(); ?>facture/conteneurfacture_edit/<?php echo output($conteneurdetails['co_id']); ?>/<?= $facturedetails['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">Ajouter conteneur </a>                           
                         
                        <a class="icon" href="<?php echo base_url(); ?>facture/conteneurfacture_delete/<?php echo output($conteneurdetails['co_id']); ?>/<?= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>                         
                         
                          </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                 <?php 
/**/                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun conteneur trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
                </div>                    
<!-- Fin conteneur-->                    
                    

                     <h5>Activités de paiement:</h5>
                    <div class="post clearfix">
                      <?php if(!empty($paymentdetails)) { ?>
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
                           foreach($paymentdetails as $paymentdetails){ ?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($paymentdetails['tp_amount']); ?></td>
                      <td><?php echo output($paymentdetails['tp_notes']); ?></td>
                      <td><?php echo output($paymentdetails['tp_created_date']); ?></td>
                      <td>
                        <a class="icon" href="<?php echo base_url(); ?>facture/facturepayment_delete/<?php echo output($paymentdetails['tp_id']); ?>/<?= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                 <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun détail de paiement trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
                </div>
                    
                    
                    
                    
                </div>

              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="mt-2 mb-3">
<!--                <a href="#" class="btn btn-sm btn-success <?//= ($facturedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un paiement</a>-->
<!--                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-factureexpense">Dépenses</a>-->
 
<?php $t_type_facturation=''; $t_type_facturation= $facturedetails['t_type_facturation'];?> 
                  
                  <?php  if ($t_type_facturation == 'Immobilisation')  {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-immobilisation">Immobilisation</a> 
                 <?php } ?>
          
                 <?php if($facturedetails['t_type_facturation']=='Manutentation') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-manutention">Manutention</a>  
                 <?php }?>
                  
                 <?php if ($facturedetails['t_type_facturation']=='Detention') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-detention">Detention</a>                  
                 <?php }?>
                <?php  if ($facturedetails['t_type_facturation'] == 'Transport') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">Ajouter conteneur </a>      
                 <?php }?> 
                <?php if ($facturedetails['t_type_facturation'] == 'Exportation') {?>
                  
                 <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-export">Ajouter conteneur</a>  
                  <?php }?>                  
                 <?php  if ($facturedetails['t_type_facturation'] == 'Transfert') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-transfert">Transfert</a>                  
                  <?php }?>                                                 
                    <br/>           
                <a href="<?= base_url(); ?>facture/facture_generation/<?= $facturedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Aperçu de la facture</a><br>

                <a href="<?= base_url(); ?>facture/facture_generation_pdf/<?= $facturedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la facture <i class="fa fa-file-pdf text-danger"></i></a> <br>                   
<!--                <a href="<?//= base_url(); ?>facture/invoice/<?//= $facturedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generate Invoice</a>
-->                
                  
                </div> 
              <br>
              <div class="text-muted">
                <p class="text-sm">Informations du client
                  <b class="d-block"><?= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_address']; ?></b>
                </p>
                <p class="text-sm">Informations du chauffeur
                  <?php if(isset($driverdetails['d_name'])) { ?>
                  <b class="d-block"><?= $driverdetails['d_name']; ?></b>
                  <b class="d-block"><?= $driverdetails['d_mobile']; ?></b>
                  <b class="d-block"><?= $driverdetails['d_licenseno']; ?></b>
                  <?php  } else { echo '<b class="d-block"><span class="badge badge-danger">Encore à attribuer</span></b>'; } ?>
                </p>
                 <p class="text-sm">Lien de suivi
                  <b class="d-block"><a target="_new" href="<?= base_url().'facturetracking/'.$facturedetails['t_trackingcode']; ?>"><?= base_url().'facturetracking/'.$facturedetails['t_trackingcode']; ?></a></b>
                </p>
                <p><div class="col-6"><a href="<?= base_url() ?>facture/sendtracking?email=<?= urlencode($customerdetails['c_email']); ?>&trackingcode=<?= $facturedetails['t_trackingcode'] ?>&t_id=<?= $facturedetails['t_id'] ?>" class="btn btn-sm btn-success">Partager avec le client</a></div></p>
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
        <h4 class="modal-title">Effectuer un paiement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="facturepayments" action="<?= base_url() ?>facture/facturepayment" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant Total</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="totalamount" value="<?= $facturedetails['t_trip_amount']; ?>" id="totalamount" placeholder="Saisir Montant Total" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="paidamount" class="col-sm-4 col-form-label">Montant  restant</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="pendingamount" value="<?= $facturedetails['t_trip_amount']-$totalpaidamt; ?>" id="pendingamount" placeholder="Montant restant" disabled>
                    </div>
                  </div>
                    
                    
                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">Payé</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_amount" id="tp_amount" placeholder="Payé">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Saisir Notes"></textarea>
                    </div>
                  </div>
                </div>
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="tp_facture_id" id="tp_facture_id" placeholder="tp_facture_id">
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_vechicle']; ?>" name="tp_v_id" id="tp_v_id" placeholder="tp_v_id">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer Paiement</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade show" id="modal-factureexpense" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter des frais - facture facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureexpense" action="<?= base_url() ?>facture/addfactureexpense" method="post">
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
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_start_date']; ?>" name="ie_date" id="ie_date">
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">
                 <input type="hidden" class="form-control" value="expense" name="ie_type" id="ie_type">
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="addfactureexpense_facture_id" id="addfactureexpense_facture_id">
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
        <h4 class="modal-title">Ajouter import Facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                        
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
                    
                    
                   <!--<div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Nature</label>
                    <div class="form-group col-sm-8">
<select id="co_nature"  class="form-control"  name="co_nature">
                       <option value="">Selectionner la nature</option>
                        <?php // foreach ($natureselect as $key => $naturelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($naturelists['na_id']) ?>"><?php //echo output($naturelists['na_name']); ?></option>
                        <?php  //} ?>
                     </select>
                    </div>
                  </div>-->  

<!-- debut Type de conteneur-->
                
                    <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $facturedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter Import</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin Import-->

<!-- Debut Export-->

<div class="modal fade show" id="modal-export" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter export Facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                        
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
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>  
                    
                    
                   <!--<div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Nature</label>
                    <div class="form-group col-sm-8">
<select id="co_nature"  class="form-control"  name="co_nature">
                       <option value="">Selectionner la nature</option>
                        <?php // foreach ($natureselect as $key => $naturelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($naturelists['na_id']) ?>"><?php //echo output($naturelists['na_name']); ?></option>
                        <?php  //} ?>
                     </select>
                    </div>
                  </div>-->  

<!-- debut Type de conteneur-->
                
                    <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $facturedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter Export</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin export-->

<!-- Debut transfert-->

<div class="modal fade show" id="modal-transfert" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter le transfert Facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur/ Nature</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                        
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
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>  
                    
                    
                   <!--<div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Nature</label>
                    <div class="form-group col-sm-8">
<select id="co_nature"  class="form-control"  name="co_nature">
                       <option value="">Selectionner la nature</option>
                        <?php // foreach ($natureselect as $key => $naturelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($naturelists['na_id']) ?>"><?php //echo output($naturelists['na_name']); ?></option>
                        <?php  //} ?>
                     </select>
                    </div>
                  </div>-->  

<!-- debut Type de conteneur-->
                
                    <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $facturedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter Transfert</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin Transfert-->





<!-- Debut Immobilisation-->

<div class="modal fade show" id="modal-immobilisation" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Immobilisation de la Facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <!--<div class="form-group row">
                    <label for="co_nature" class="col-sm-4 col-form-label">Nature</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_nature" id="co_nature" placeholder="Nature">
                        
                        
                    </div>
                  </div>-->
                    
                  <div class="form-group row">
                    <label for="co_zone" class="col-sm-4 col-form-label">Zone</label>
                    <div class="form-group col-sm-8">
<select id="co_zone"  class="form-control"  name="co_zone">
                       <option value="">Selectionner la zone</option>
                        <?php  foreach ($zoneselect as $key => $zonelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>  
                    
                <div class="form-group row">
                    <label for="co_vehicle" class="col-sm-4 col-form-label">Véhicule</label>
                    <div class="form-group col-sm-8">
<select id="co_vehicle"  class="form-control"  name="co_vehicle">
                       <option value="">Selectionner le Véhicule</option>
                        <?php  foreach ($vehicleselect as $key => $vehiclelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($vehiclelists['v_id']) ?>"><?php echo output($vehiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div> 
                    
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Montant véhicule</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="co_vehicle_montant" value="" placeholder="Montant véhicule" >
                    </div>
                  </div>                       
                    
                <div class="form-group row">
                    <label for="co_vehicle_remorque" class="col-sm-4 col-form-label">Véhicule remorque</label>
                    <div class="form-group col-sm-8">
<select id="co_vehicle_remorque"  class="form-control"  name="co_vehicle_remorque">
                       <option value="">Selectionner le Véhicule remorque</option>
                        <?php  foreach ($vehicle_remorqueselect as $key => $vehicle_remorquelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($vehicle_remorquelists['vr_id']) ?>"><?php echo output($vehicle_remorquelists['vr_name']).' - '. output($vehicle_remorquelists['vr_numero_immatriculation']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>                    
                    
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Montant remorque véhicule</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="co_vehicle_remorque_montant" value="" placeholder="Montant restant" >
                    </div>
                  </div>                    
                            
                <div class="form-group row">
                    <label for="co_adresse_livraison" class="col-sm-4 col-form-label">Adresse de livraison</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_adresse_livraison" name="co_adresse_livraison" rows="2" placeholder="Adresse de livraison"></textarea>
                    </div>
                  </div>                    
   
                <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Description</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>

                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter Immobilisation</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin Immobilisation-->


<!-- Debut manutention-->

<div class="modal fade show" id="modal-manutention" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter manutention de la Facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                       
                    </div>
                  </div>
                    
                  <div class="form-group row">
                    <label for="co_zone" class="col-sm-4 col-form-label">Zone</label>
                    <div class="form-group col-sm-8">
<select id="co_zone"  class="form-control"  name="co_zone">
                       <option value="">Selectionner la zone</option>
                        <?php  foreach ($zoneselect as $key => $zonelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>  
                    

                <div class="form-group row">
                    <label for="co_trip_type_tache_manutention" class="col-sm-4 col-form-label">Nature facturation</label>
                    <div class="form-group col-sm-8">
<select id="co_trip_type_tache_manutention"  class="form-control"  name="co_trip_type_tache_manutention">
                       <option value="">Selectionner Nature facturation</option>
                        <?php  foreach ($type_tache_manutentionselect as $key => $type_tache_manutentions) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($type_tache_manutentions['ttach_id']) ?>"><?php echo output($type_tache_manutentions['ttach_name']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>       
                    
                    
                    <div class="form-group row">
                    <label for="co_article" class="col-sm-4 col-form-label">Nature article</label>
                    <div class="form-group col-sm-8">
<select id="co_article"  class="form-control"  name="co_article">
                       <option value="">Selectionner la Nature article</option>
                        <?php  foreach ($articleselect as $key => $articlelists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($articlelists['art_id']) ?>"><?php echo output($articlelists['art_name']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>
                    
<!-- debut Type de conteneur-->
                
                    <div class="form-group row">
                    <label for="co_type_conteneur" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
                    </select>
                    </div>
                  </div>                    
                    
                     
  
                <div class="form-group row">
                    <label for="co_date_heure_debut" class="col-sm-4 col-form-label">Date début</label>
                    <div class="form-group col-sm-8">
                      <input type="text" required="true" class="form-control datepicker" id="co_date_heure_debut" name="co_date_heure_debut" value="" placeholder="Date début">
                    </div>
                  </div>  
                    
                <div class="form-group row">
                    <label for="co_date_heure_fin" class="col-sm-4 col-form-label">Date fin</label>
                    <div class="form-group col-sm-8">
                      <input type="text" required="true" class="form-control datepicker" id="co_date_heure_fin" name="co_date_heure_fin" value="" placeholder="Date fin">
                    </div>
                  </div>                    
  

                     <div class="form-group row">
                    <label for="co_montant" class="col-sm-4 col-form-label">Montant</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_montant" id="co_montant" placeholder="Montant">
                       
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $facturedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter conteneur</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin manutention-->

<!-- Debut detention-->

<div class="modal fade show" id="modal-detention" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter detention de la Facture N°<?= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                        
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
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>  
                    
                <div class="form-group row">
                    <label for="co_date_heure_debut" class="col-sm-4 col-form-label">Date début</label>
                    <div class="form-group col-sm-8">
                      <input type="text" required="true" class="form-control datepicker" id="co_date_heure_debut" name="co_date_heure_debut" value="" placeholder="Date début">
                    </div>
                  </div>  
                    
                <div class="form-group row">
                    <label for="co_date_heure_fin" class="col-sm-4 col-form-label">Date fin</label>
                    <div class="form-group col-sm-8">
                      <input type="text" required="true" class="form-control datepicker" id="co_date_heure_fin" name="co_date_heure_fin" value="" placeholder="Date fin">
                    </div>
                  </div> 
                
                    <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
                    </select>
                    </div>
                  </div>                    
                    
                  <div class="form-group row">
                    <label for="co_montant" class="col-sm-4 col-form-label">Montant</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_montant" id="co_montant" placeholder="Montant">
                       
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $facturedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter detention</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin detention-->
