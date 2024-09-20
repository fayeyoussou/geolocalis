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
          $totalpaidamt += $payment['ie_amount'];
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
                      <span class="info-box-number text-center text-muted mb-0"><?= $incomexpensedetails['t_trip_amount']; ?></span>
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
                      <span class="info-box-text text-center text-muted"><?= ($incomexpensedetails['t_trip_amount'] > $totalpaidamt)?'Restant':'Excès' ?></span>
                      <span class="info-box-number text-center text-muted mb-0"><?= preg_replace('/[^\d\.]+/','',$incomexpensedetails['t_trip_amount'] - $totalpaidamt)  ?> <span>
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
                          <?= $incomexpensedetails['t_trip_fromlocation']; ?>
                        </span>
                        <span class="description"><?= $incomexpensedetails['t_start_date']; ?></span>
                      </div>
                    </div> à
                     <div class="col-lg-5">
                      <div class="user-block">
                        <span class="username">
                          <?= $incomexpensedetails['t_trip_tolocation']; ?>
                        </span>
                        <span class="description"><?= $incomexpensedetails['t_end_date']; ?></span>
                      </div>
                       </div>
                        <div class="col-lg-4"></div>
                        <?php 
                        if($incomexpensedetails['t_totaldistance']!='') {
                          if($incomexpensedetails['t_type']=='single') { $dist = $incomexpensedetails['t_totaldistance']; } else { $dist = $incomexpensedetails['t_totaldistance']*2; }  ?>
                          <?= $incomexpensedetails['t_type']; ?> avec total <?= $dist; ?> km 
                        <?php } ?>
                     </div>
                    </div>

                    
<!-- Debut tab--> 
 <div >
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-conteneur-tab" data-toggle="pill" href="#custom-tabs-conteneur" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">incomexpense</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-reglement-tab" data-toggle="pill" href="#custom-tabs-one-reglement" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Réglements</a>
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
                  <div class="tab-pane fade show active" id="custom-tabs-conteneur" role="tabpanel" aria-labelledby="custom-tabs-conteneur-tab">
                   
<!-- Debut conteneur-->

<!-- debut numéro conteneur--> 
                    <!-- <h5>Numéros conteneurs:</h5> -->                   
            <div class="card-body">
                      <?php if(!empty($conteneurdetails)) { ?>
<?php // FIN controle Exportation ou Transport
if((($incomexpensedetails['t_type_facturation'])=="Exportation") || (($incomexpensedetails['t_type_facturation'])=="Transport")) 
{                
?>                
                
                   <table class="table table-bordered table-striped" width="100%">
                  <thead>                  
                    <tr>
                      <th>N°</th>
                      <th>Numéro conteneur</th>
                      <!--<th>Désignation</th>-->
                      <th>Type</th>
                      <th>Destination</th>
                      <th>Montant</th>
<!--                      <th>Date saisie</th>
-->                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
 $ags=1271;
$montantags=0;
$nombreags= 0;                                                           

        $type='';$montant_conteneur=0;$montant=0;$count=1;$montanttotal_conteneur=0;
                           foreach($conteneurdetails as $conteneurdetails){ $montant_conteneur=0; ?>

                      
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($conteneurdetails['co_numero_conteneur']); ?></td>
                      <!--<td><?php //if(isset($incomexpensedetails['t_type_facturation'])){echo output($incomexpensedetails['t_type_facturation']);}?></td>-->
                      <td>
                          <?php if(isset($conteneurdetails['co_type_conteneur'])){$type=$conteneurdetails['co_type_conteneur']; ?><?php if($type=='20_pieds'){ echo "20 pieds";} else {echo "40 pieds";} ?><?php } ?></td>
                      <td><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></td>
                      <td><?php echo output($conteneurdetails['co_montant']); ?></td>
                     <td>
                   <!--      <a class="icon" href="<?php //echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                         
               <a href="<?php //echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">M </a>  -->                            
                         
 <a class="icon" href="<?php echo base_url(); ?>incomexpense/conteneurincomexpense_delete/<?php echo output($conteneurdetails['co_id']); ?>/<?= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i>
</a>                      
<!-- <a class="icon" href="<?php //echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a> -->
                         
                         
               <a href="<?php echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php echo output($conteneurdetails['co_id']); ?>/<?= $incomexpensedetails['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">M </a>                          
                          </td>
                    </tr>
                    <?php
                                                                           
//echo $montanttotal_conteneur += $montant_conteneur;
//echo $incomexpensedetails['t_nombre_ags'];                                                                           
//echo $nombreags += $incomexpensedetails['t_nombre_ags'];                                                                           
                           // $montantags=$incomexpensedetails['t_nombre_ags'];                                              
                    } ?>
                  </tbody>
                       
                </table>
<?php }// FIN controle Exportation ou Transport?>       
                
                
<?php // FIN controle Exportation ou Transport
if((($incomexpensedetails['t_type_facturation'])=="Detention")) 
{                
?>                
                
                   <table class="table table-bordered table-striped" width="100%">
                  <thead>                  
                    <tr>
                      <th>N°</th>
                      <th>Numéro conteneur</th>
                       <th>Date début</th>
                      <th>Date fin</th>
                        <th>Type</th>
                       <th>Taux</th>
 <!--                      <th>Coût</th>
 -->                     <th>Détention</th>
                      <th>Montant</th>

<!--                      <th>Date saisie</th>
-->                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
 $ags=1271;
$montantags=0;
$nombreags= 0;                                                           

        $type='';$montant_conteneur=0;$montant=0;$count=1;$montanttotal_conteneur=0;
                           foreach($conteneurdetails as $conteneurdetails){ $montant_conteneur=0; ?>

                      
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($conteneurdetails['co_numero_conteneur']); ?></td>
                       <td><?php echo output($conteneurdetails['co_date_heure_debut']); ?></td>
                      <td><?php echo output($conteneurdetails['co_date_heure_fin']); ?></td>                     
<?php if(isset($conteneurdetails['co_type_conteneur'])){$type=$conteneurdetails['co_type_conteneur']; ?><?php if($type=='20_pieds'){  $type="20 pieds"; $montant=15000;} else {$type="40 pieds";$montant=25000;} ?><?php } ?>                          

<!--                      <td><?php //if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php //if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php //echo output($conteneurdetails['co_adresse_livraison']) ;} ?></td>-->
                      <td><?php echo output($type); ?></td>
                       <td><?php echo output($montant); ?></td>
                     <td><?php echo output($conteneurdetails['co_nombre_jour_franchise']); ?></td>
                      <td><?php echo output($conteneurdetails['co_montant']); ?></td>

                     <td>
                   <!--      <a class="icon" href="<?php //echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                         
               <a href="<?php //echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">M </a>  -->                            
                         
 <a class="icon" href="<?php echo base_url(); ?>incomexpense/conteneurincomexpense_delete/<?php echo output($conteneurdetails['co_id']); ?>/<?= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i>
</a>                      
<!-- <a class="icon" href="<?php //echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a> -->
                         
                         
               <a href="<?php echo base_url(); ?>incomexpense/conteneurincomexpense_edit/<?php echo output($conteneurdetails['co_id']); ?>/<?= $incomexpensedetails['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">M </a>                          
                          </td>
                    </tr>
                    <?php
                                                                           
//echo $montanttotal_conteneur += $montant_conteneur;
//echo $incomexpensedetails['t_nombre_ags'];                                                                           
//echo $nombreags += $incomexpensedetails['t_nombre_ags'];                                                                           
                           // $montantags=$incomexpensedetails['t_nombre_ags'];                                              
                    } ?>
                  </tbody>
                       
                </table>
<?php }// FIN controle Exportation ou Transport?>                       
                
                
                
<?php //echo $montanttotal_conteneur;
//$montant_conteneur_20=;
//$montant_conteneur_40=;                                                           
/*                                                           
if(($incomexpensedetails['t_type_facturation'])=="Exportation")// Debut du controle if
{
 $ags=1500;   
}
else
{
 $ags=1271;
}                                                           
                                                           
$montantags= $incomexpensedetails['t_nombre_ags']* $ags; 
$montantHT=0;$montantTTC=0;//$montanttotal=0;        

//Calcul montant hors taxe    
$montantHT=$montanttotal_conteneur+$montantags;   
 
if($incomexpensedetails['t_taxe']=='avec_tva')
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));

    $divmontantTVA = floor($montantTVA / 5);
    $modmontantTVA = $montantTVA % 5;

    If ($modmontantTVA > 0) $addmontantTVA = 5;
    Else $addmontantTVA = 0;

    echo $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA;  
//$montantTVAAfficher =0;    
//$montantTVAAfficher = number_format($montantTVAArrondi, 0, ',', ' ');    
//$montantTVAAfficher = number_format($montantTVA, 0, ',', ' ');    

//$montant_total="Montant TTC";    
$montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;

    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
//$montantTTCAfficher =0;
//$montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
//$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
// début conversion nombre en lettres
//$val = $this->load->library('convertir_nombre_lettre');

// 09 08 2021    
//$nombre = intval($montantTTC);
$nombre = ceil($montantTTCArrondi);
}                                                            

$montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;

    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
//$montantTTCAfficher =0;
//$montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
//$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
// début conversion nombre en lettres
//$val = $this->load->library('convertir_nombre_lettre');

// 09 08 2021    
//$nombre = intval($montantTTC);
$nombre = ceil($montantTTCArrondi);
                                                           
                                                           
*/                                                           
                                                           
                ?>
                 <?php 
/**/                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun conteneur n\'est ajouté à la incomexpense  !.</div>';
                     }
                     ?>
                </div>                    
<!-- Fin tab conteneur-->                    
                      
<!-- Fin conteneur-->                      
                      
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-reglement" role="tabpanel" aria-labelledby="custom-tabs-one-reglement-tab">
                      
<!-- Début tab reglement-->                                          

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
                        <a class="icon" href="<?php echo base_url(); ?>incomexpense/incomexpensepayment_delete/<?php echo output($paymentdetails['tp_id']); ?>/<?= $incomexpensedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
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
                  <!--<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                  </div>-->
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
 
<?php $t_type_facturation=''; $t_type_facturation= $incomexpensedetails['t_type_facturation'];?> 
                  
                  <?php  if ($t_type_facturation == 'Immobilisation')  {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-immobilisation">Immobilisation</a> 
                 <?php } ?>
          
                 <?php if($incomexpensedetails['t_type_facturation']=='Manutentation') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-manutention">Manutention</a>  
                 <?php }?>
                  
                 <?php if ($incomexpensedetails['t_type_facturation']=='Detention') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-detention">Detention</a>                  
                 <?php }?>
                <?php  if ($incomexpensedetails['t_type_facturation'] == 'Transport') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">Ajouter conteneur </a>      
                 <?php }?> 
                <?php if ($incomexpensedetails['t_type_facturation'] == 'Exportation') {?>
                  
                 <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-export">Ajouter conteneur</a>  
                  <?php }?>                  
                 <?php  if ($incomexpensedetails['t_type_facturation'] == 'Transfert') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-transfert">Transfert</a>                  
                  <?php }?>                                                 
                    <br/>           
                <a href="<?= base_url(); ?>incomexpense/incomexpense_generation/<?= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Aperçu de la incomexpense</a><br>

                <a href="<?= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> <br>                   
<!--                <a href="<?//= base_url(); ?>incomexpense/invoice/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generate Invoice</a>
-->                
                <a href="#" class="btn btn-sm btn-success <?= ($incomexpensedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un Réglement</a>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a>                  
                </div> 
              <br>
              <div class="text-muted">
 
                <p class="text-sm">Informations la incomexpense
                  <b class="d-block">Date: <?= $incomexpensedetails['t_date_incomexpense']; ?></b>
                  <b class="d-block">Nombre de conteneurs: <?= $incomexpensedetails['t_nombre_conteneur']; ?></b>
                  <b class="d-block">Type: <?= $incomexpensedetails['t_type_facturation']; ?></b>
                  <b class="d-block">AGS: <?= $incomexpensedetails['t_nombre_ags']; ?></b>
                </p>
                  
                <p class="text-sm">Informations du client
                  <b class="d-block"><?= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?= $customerdetails['c_address']; ?></b>
                </p>                  
                  
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
                  <b class="d-block"><a target="_new" href="<?= base_url().'incomexpensetracking/'.$incomexpensedetails['t_trackingcode']; ?>"><?= base_url().'incomexpensetracking/'.$incomexpensedetails['t_trackingcode']; ?></a></b>
                </p>
                <p><div class="col-6"><a href="<?= base_url() ?>incomexpense/sendtracking?email=<?= urlencode($customerdetails['c_email']); ?>&trackingcode=<?= $incomexpensedetails['t_trackingcode'] ?>&t_id=<?= $incomexpensedetails['t_id'] ?>" class="btn btn-sm btn-success">Partager avec le client</a></div></p>
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
        <form class="form-horizontal" id="trippayments" action="<?= base_url() ?>incomexpense/incomexpensepayment" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant Total</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="totalamount" value="<?= $incomexpensedetails['t_trip_amount']; ?>" id="totalamount" placeholder="Saisir Montant Total" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="paidamount" class="col-sm-4 col-form-label">Montant  restant</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="pendingamount" value="<?= $incomexpensedetails['t_trip_amount']-$totalpaidamt; ?>" id="pendingamount" placeholder="Montant restant" disabled>
                    </div>
                  </div>

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
                      <option value="espece">Espéce</option>

                      <option value="cheque">Chéque</option>						 
                    </select>
                    </div>
                  </div>
                    

                    
                <div class="form-group row">
                    <label for="tp_numero_bordereau" class="col-sm-4 col-form-label">Numéro bordereau</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="tp_numero_bordereau" id="tp_numero_bordereau" placeholder="Numéro bordereau">
                    </div>
                  </div>                    
                    
                   <div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Saisir Notes"></textarea>
                    </div>
                  </div>
                </div>
            
            
            
            
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="tp_trip_id" id="tp_trip_id" placeholder="tp_trip_id">
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_vechicle']; ?>" name="tp_v_id" id="tp_v_id" placeholder="tp_v_id">
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
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_start_date']; ?>" name="ie_date" id="ie_date">
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">
                 <input type="hidden" class="form-control" value="expense" name="ie_type" id="ie_type">
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="addincomexpenseexpense_incomexpense_id" id="addincomexpenseexpense_incomexpense_id">
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
<input type="hidden" class="form-control" value="<?php echo $incomexpensedetails['t_type_facturation'];?>" name="t_type_facturation" id="t_type_facturation">
<input type="hidden" class="form-control" value="<?php echo $incomexpensedetails['t_taxe']?>" name="t_taxe" id="t_taxe">            
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

<!-- Debut Export-->

<div class="modal fade show" id="modal-export" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter export incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseconteneur" action="<?= base_url() ?>incomexpense/addincomexpenseconteneur" method="post">
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($naturelists['na_id']) ?>"><?php //echo output($naturelists['na_name']); ?></option>
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $incomexpensedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $incomexpensedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
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
        <h4 class="modal-title">Ajouter le transfert incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseconteneur" action="<?= base_url() ?>incomexpense/addincomexpenseconteneur" method="post">
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($naturelists['na_id']) ?>"><?php //echo output($naturelists['na_name']); ?></option>
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
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $incomexpensedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $incomexpensedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
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
        <h4 class="modal-title">Immobilisation de la incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseconteneur" action="<?= base_url() ?>incomexpense/addincomexpenseconteneur" method="post">
                <div class="card-body">
                  <!--<div class="form-group row">
                    <label for="co_nature" class="col-sm-4 col-form-label">Nature</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_nature" id="co_nature" placeholder="Nature">
                        
                        
                    </div>
                  </div>-->
                    
                  <!--<div class="form-group row">
                    <label for="co_zone" class="col-sm-4 col-form-label">Zone</label>
                    <div class="form-group col-sm-8">
<select id="co_zone"  class="form-control"  name="co_zone">
                       <option value="">Selectionner la zone</option>
                        <?php  //foreach ($zoneselect as $key => $zonelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php //echo output($zonelists['z_id']) ?>"><?php //echo output($zonelists['z_destination']); ?></option>
                        <?php  //} ?>
                     </select>
                    </div>
                  </div>-->  
                    
                <div class="form-group row">
                    <label for="co_vehicle" class="col-sm-4 col-form-label">Véhicule</label>
                    <div class="form-group col-sm-8">
<select id="co_vehicle"  class="form-control"  name="co_vehicle">
                       <option value="">Selectionner le Véhicule</option>
                        <?php  foreach ($vehicleselect as $key => $vehiclelists) { ?>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($vehiclelists['v_id']) ?>"><?php echo output($vehiclelists['v_registration_no']); ?></option>
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($vehicle_remorquelists['vr_id']) ?>"><?php echo output($vehicle_remorquelists['vr_name']).' - '. output($vehicle_remorquelists['vr_numero_immatriculation']); ?></option>
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

                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
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
        <h4 class="modal-title">Ajouter manutention de la incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseconteneur" action="<?= base_url() ?>incomexpense/addincomexpenseconteneur" method="post">
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']); ?></option>
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($type_tache_manutentions['ttach_id']) ?>"><?php echo output($type_tache_manutentions['ttach_name']); ?></option>
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
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($articlelists['art_id']) ?>"><?php echo output($articlelists['art_name']); ?></option>
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
                      <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="20_pieds">20 pieds</option>

                      <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="40_pieds">40 pieds</option>						 
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
<!--                 <input type="hidden" class="form-control" value="<?//= $incomexpensedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $incomexpensedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
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
        <h4 class="modal-title">Ajouter detention de la incomexpense N°<?= $incomexpensedetails['ie_numero_enregistrement']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addincomexpenseconteneur" action="<?= base_url() ?>incomexpense/addincomexpenseconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">N° du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                        
<!--                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">                        
-->                        
                    </div>
                  </div>

                
                    <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Type de conteneur</label>
                    <div class="form-group col-sm-8">
                     <select name="co_type_conteneur" id="co_type_conteneur" required="true" class="form-control">
                      <option value="">Sélectionner un Type de conteneur</option>
                      <option value="20_pieds">20 pieds</option>

                      <option value="40_pieds">40 pieds</option>						 
                    </select>
                    </div>
                  </div>                    
  
  <!-- FIN Type de conteneur-->                     
                    
                <!----> <div class="form-group row">
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

                    <?php 
 
/*$date1 = $incomexpensedetails['t_start_date'];
$date2 = $incomexpensedetails['t_end_date'];    
echo $diff = abs(strtotime($date2) - strtotime($date1));  */          

            
$date1 = date("Y-m-d",strtotime($incomexpensedetails['t_start_date']));
$date2 = date("Y-m-d",strtotime($incomexpensedetails['t_end_date']));

$diff = abs(strtotime($date2) - strtotime($date1));

$annee = floor($diff / (365*60*60*24));
$mois = floor(($diff - $annee * 365*60*60*24) / (30*60*60*24));
$jour = floor(($diff - $annee * 365*60*60*24 - $mois*30*60*60*24)/ (60*60*24));              
 
//echo $nombre_jour_franchise=$zonedetails['z_nombre_jour_detention'];              
$nombre_jour_franchise=3;              
              
            ?> 
            <div class="form-group row">
                    <label for="co_nombre_jour_franchise" class="col-sm-4 col-form-label">Franchise</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_nombre_jour_franchise" value="<?= $jour;?>"  id="co_nombre_jour_franchise"  readonly>
                      
                    </div>
                  </div>                    
                    
  
            <div class="form-group row">
                    <label for="co_nombre_jour_franchise" class="col-sm-4 col-form-label">Detention</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_nombre_jour_franchise" value="<?= $jour-$nombre_jour_franchise;?>"  id="co_nombre_jour_franchise"  readonly>
                      
                    </div>
                  </div>                    
                    
            
           
<!-- -->                <input type="text" class="form-control" value="<?= $incomexpensedetails['t_start_date']; ?>" name="co_date_heure_debut" id="co_date_heure_debut">
<!-- -->               <input type="text" class="form-control" value="<?= $incomexpensedetails['t_end_date']; ?>" name="co_date_heure_fin" id="$co_date_heure_fin"> 
<!-- -->                <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_zone']; ?>" name="co_zone" id="co_zone">
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
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