
<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php
                if(!isset($this->session->userdata['session_data'])) {
                $url=base_url();
                header("location: $url");
              }  
                $data = sitedata();
                $total_segments = $this->uri->total_segments(); 
                echo ucwords(str_replace('_', ' ', $this->uri->segment(1))).' | '.output($data['s_companyname'])  ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

<!--    <link rel="stylesheet" href="<?//= base_url(); ?>assets/convertNumbersIntoWords.php">
--><!--  <!-- Ionicons -->
  <!-- Them//e style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">

    
  <section class="col-12" class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
          
        <h2 class="page-header">
          <img src="<?= base_url().'assets/uploads/'.$data['s_logo'] ?>">
        </h2>
      </div>
        <br>
         <h3 class="page-header">
<!--          <small class="float-right">Date: <?//= date('d-m-Y') ?></small>-->
        </h3>
      </div>
      <!-- /.col -->
    </div><br><br>
    <!-- info row -->
      <br>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
<div align="center">
        <h1>FACTURE</h></div>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       <h4> Client</h2>
        <address><h3>
          <strong><?= $customerdetails['c_name']; ?></strong><br>
          <?= $customerdetails['c_address']; ?><br>
          Téléphone: <?= $customerdetails['c_mobile']; ?><br>
          E-mail: <?= $customerdetails['c_email']; ?></h3>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col"><h3>
        <b>Date:<?= output($facturedetails['t_date_facture']) ?></b><br>
        <b>Facture N°:<?= output($facturedetails['t_num_facture']) ?></b><br>
        <b>Référence BL N°:</b> <?= output($facturedetails['t_reference']) ?><br>
        <b>Nom du navire:</b> <?= output($facturedetails['t_nom_navire']) ?><br>
        <b>Compagnie:</b> <?//= output($facturedetails['cc_name']) ?><br>
</h3>
     </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
      <?php
      $totalpaidamt = 0;
      if(count($paymentdetails)>=1) {
      foreach ($paymentdetails as $payment) {
          $totalpaidamt += $payment['tp_amount'];
      } }
      ?>
    <!-- Table row -->
<br><br>      
<?php if(!empty($conteneurdetails)) { ?>      
    <br>
      <div class="row">
      <div class="col-12 table-responsive">
        
<?php if((!empty($facturedetails)) && ($facturedetails['t_type_facturation']=='Transport') || ($facturedetails['t_type_facturation']=='Exportation')) { ?>  

<table class="table table-striped" >
          <thead><?= output($facturedetails['t_type_facturation']) ?>
              
    <?php //if((isset($facturedetails)) && (($facturedetails['t_type_facturation'] =='importation') || ($facturedetails['t_type_facturation'] =='exportation') ) ){ ?>           
              
          <tr >
            <th><h3>N° Ordre</h3></th>
            <th><h3>Désignation</h3></th>
            <th><h3>N° Conteneur</h3></th>
            <th><h3>Type</h3></th>
            <th><h3>Destination</h3></th>
<!--            <th>Prix unitaire</th>
-->            <th><h3>Montant</h3></th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
                           foreach($conteneurdetails as $conteneurdetails){ 
                               $type='';$montant_conteneur=0;$montant=0; ?>
              
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
                              
                                ?> 
              
              <?php //if(isset($conteneurdetails['nature_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination);} ?> - <?php 
                        //if($conteneurdetails['co_type_conteneur']!='') {
                          //if($conteneurdetails['co_type_conteneur']=='20_pieds') { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; $type='20 pieds'; } else { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;$type='40 pieds'; }}  ?>              
              
              <?php //echo output($montant=$type_conteneur+$conteneurdetails['nature_name']->na_montant);?>
                      <tr  >
                      <td><h3><?php echo output($count); $count++; ?></h3></td>
                     <td><h3><?php echo output($facturedetails['t_type_facturation']); ?></h3></td>
                       <td><h3><?php echo output($conteneurdetails['co_numero_conteneur']); ?></h3></td>
                      <td><h3><?php echo output($type);?></h3></td>
                      <td><h3><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></h3></td>
                      <td><h2><?php echo output($montant_conteneurAffiche)?></h2></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
              <?php //} ?>
                    <?php 
                              $montanttotal += $montant_conteneur; } ?>
              
              
          </tbody>
        </table>          
<?php }?> 
          
<?php if((!empty($facturedetails)) && ($facturedetails['t_type_facturation']=='Immobilisation')) { ?>  
   <?= output($facturedetails['t_type_facturation']) ?>    

<table class="table table-striped" >
          <thead><?= output($facturedetails['t_type_facturation']) ?>
              
    <?php //if((isset($facturedetails)) && (($facturedetails['t_type_facturation'] =='importation') || ($facturedetails['t_type_facturation'] =='exportation') ) ){ ?>           
              
          <tr >
            <th><h3>N° Ordre</h3></th>
            <th><h3>Désignation</h3></th>
            <th><h3>Lieu</h3></th>
            <th><h3>Période</h3></th>
            <th><h3>Nombre de jours</h3></th>
<!--            <th>Prix unitaire</th>
-->            <th><h3>Montant</h3></th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
                           foreach($conteneurdetails as $conteneurdetails){ 
                               $type='';$montant_conteneur=0;$montant=0; ?>
              
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); ?> 

                      <tr  >
                      <td><h3><?php echo output($count); $count++; ?></h3></td>
                     <td><h3><?php echo output($facturedetails['t_type_facturation']); ?></h3></td>
                       <td><h3><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></h3></td>
                      <td><h3><?php echo output($conteneurdetails['co_date_heure_debut']); ?> 6 <?php echo output($conteneurdetails['co_date_heure_fin']); ?></h3></td>
                      <td><h3><?php echo output($conteneurdetails['co_numero_conteneur']); ?></h3></td>
                      <td><h2><?php echo output($montant_conteneurAffiche)?></h2></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
              <?php //} ?>
                    <?php 
                              $montanttotal += $montant_conteneur; } ?>
              
              
          </tbody>
        </table>          
          
          
<?php }?> 
          
<?php if((!empty($facturedetails)) && ($facturedetails['t_type_facturation']=='Detention')) { ?>  
   <?= output($facturedetails['t_type_facturation']) ?>    sqdqsdqs   
<table class="table table-striped" >
          <thead><?= output($facturedetails['t_type_facturation']) ?>
              
    <?php //if((isset($facturedetails)) && (($facturedetails['t_type_facturation'] =='importation') || ($facturedetails['t_type_facturation'] =='exportation') ) ){ ?>           
              
          <tr >
            <th><h3>N° Ordre</h3></th>
            <th><h3>Désignation</h3></th>
            <th><h3>N° Conteneur</h3></th>
            <th><h3>Type</h3></th>
            <th><h3>Destination</h3></th>
<!--            <th>Prix unitaire</th>
-->            <th><h3>Montant</h3></th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
                           foreach($conteneurdetails as $conteneurdetails){ 
                               $type='';$montant_conteneur=0;$montant=0; ?>
              
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
                              
                                ?> 
              
              <?php //if(isset($conteneurdetails['nature_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination);} ?> - <?php 
                        //if($conteneurdetails['co_type_conteneur']!='') {
                          //if($conteneurdetails['co_type_conteneur']=='20_pieds') { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; $type='20 pieds'; } else { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;$type='40 pieds'; }}  ?>              
              
              <?php //echo output($montant=$type_conteneur+$conteneurdetails['nature_name']->na_montant);?>
                      <tr  >
                      <td><h3><?php echo output($count); $count++; ?></h3></td>
                     <td><h3><?php echo output($facturedetails['t_type_facturation']); ?></h3></td>
                       <td><h3><?php echo output($conteneurdetails['co_numero_conteneur']); ?></h3></td>
                      <td><h3><?php echo output($type);?></h3></td>
                      <td><h3><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></h3></td>
                      <td><h2><?php echo output($montant_conteneurAffiche)?></h2></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
              <?php //} ?>
                    <?php 
                              $montanttotal += $montant_conteneur; } ?>
              
              
          </tbody>
        </table>          
<?php }?> 
          
<?php if((!empty($facturedetails)) && ($facturedetails['t_type_facturation']=='Manutention')) { ?>  
   <?= output($facturedetails['t_type_facturation']) ?>    sqdqsdqs   
 <table class="table table-striped" >
          <thead><?= output($facturedetails['t_type_facturation']) ?>
              
    <?php //if((isset($facturedetails)) && (($facturedetails['t_type_facturation'] =='importation') || ($facturedetails['t_type_facturation'] =='exportation') ) ){ ?>           
              
          <tr >
            <th><h3>N° Ordre</h3></th>
            <th><h3>Désignation</h3></th>
            <th><h3>N° Conteneur</h3></th>
            <th><h3>Type</h3></th>
            <th><h3>Destination</h3></th>
<!--            <th>Prix unitaire</th>
-->            <th><h3>Montant</h3></th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
                           foreach($conteneurdetails as $conteneurdetails){ 
                               $type='';$montant_conteneur=0;$montant=0; ?>
              
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
                              
                                ?> 
              
              <?php //if(isset($conteneurdetails['nature_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination);} ?> - <?php 
                        //if($conteneurdetails['co_type_conteneur']!='') {
                          //if($conteneurdetails['co_type_conteneur']=='20_pieds') { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; $type='20 pieds'; } else { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;$type='40 pieds'; }}  ?>              
              
              <?php //echo output($montant=$type_conteneur+$conteneurdetails['nature_name']->na_montant);?>
                      <tr  >
                      <td><h3><?php echo output($count); $count++; ?></h3></td>
                     <td><h3><?php echo output($facturedetails['t_type_facturation']); ?></h3></td>
                       <td><h3><?php echo output($conteneurdetails['co_numero_conteneur']); ?></h3></td>
                      <td><h3><?php echo output($type);?></h3></td>
                      <td><h3><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></h3></td>
                      <td><h2><?php echo output($montant_conteneurAffiche)?></h2></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
              <?php //} ?>
                    <?php 
                              $montanttotal += $montant_conteneur; } ?>
              
              
          </tbody>
        </table>         
<?php }?> 
          
<?php if((!empty($facturedetails)) && ($facturedetails['t_type_facturation']=='Transfert')) { ?>  
   <?= output($facturedetails['t_type_facturation']) ?>    sqdqsdqs   
 
          <table class="table table-striped" >
          <thead><?= output($facturedetails['t_type_facturation']) ?>
              
    <?php //if((isset($facturedetails)) && (($facturedetails['t_type_facturation'] =='importation') || ($facturedetails['t_type_facturation'] =='exportation') ) ){ ?>           
              
          <tr >
            <th><h3>N° Ordre</h3></th>
            <th><h3>Désignation</h3></th>
            <th><h3>N° Conteneur</h3></th>
            <th><h3>Type</h3></th>
            <th><h3>Destination</h3></th>
<!--            <th>Prix unitaire</th>
-->            <th><h3>Montant</h3></th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
                           foreach($conteneurdetails as $conteneurdetails){ 
                               $type='';$montant_conteneur=0;$montant=0; ?>
              
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
                              
                                ?> 
              
              <?php //if(isset($conteneurdetails['nature_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination);} ?> - <?php 
                        //if($conteneurdetails['co_type_conteneur']!='') {
                          //if($conteneurdetails['co_type_conteneur']=='20_pieds') { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; $type='20 pieds'; } else { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;$type='40 pieds'; }}  ?>              
              
              <?php //echo output($montant=$type_conteneur+$conteneurdetails['nature_name']->na_montant);?>
                      <tr  >
                      <td><h3><?php echo output($count); $count++; ?></h3></td>
                     <td><h3><?php echo output($facturedetails['t_type_facturation']); ?></h3></td>
                       <td><h3><?php echo output($conteneurdetails['co_numero_conteneur']); ?></h3></td>
                      <td><h3><?php echo output($type);?></h3></td>
                      <td><h3><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></h3></td>
                      <td><h2><?php echo output($montant_conteneurAffiche)?></h2></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
              <?php //} ?>
                    <?php 
                              $montanttotal += $montant_conteneur; } ?>
              
              
          </tbody>
        </table>
<?php }?>            
          
      </div>
      <!-- /.col -->
    </div>
      
      <?php } //FIN DIV?>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
         <?//= output($data['s_inovice_termsandcondition']) ?>
        </p> 
      </div>
      <div class="col-2"></div>
      <!-- /.col -->
      <div class="col-4">
<?php //if(!empty($conteneurdetails)) { ?>      

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%"><h3>AGS:</h3></th>
              <td><?//$ags=1250; ?><?$montantags=$facturedetails['t_nombre_conteneur'] * $ags ?>  <b><h3><?= $montantagsAfficher = number_format($montantags, 0, ',', ' '); ?></h3></b> <?//= output($data['s_price_prefix']).$facturedetails['t_trip_amount'] ags_montant?></td>
            </tr>
     
            <tr>
             <th style="width:50%"> <h3>Total HT:</h3></th>
                <?php $montantHT=0;$montantTTC=0?>
                
              <td><? $montantHT=$montanttotal+$montantags; //$facturedetails['t_trip_amount'] ?>  <b><h3><?= $montantHTAfficher = number_format($montantHT, 0, ',', ' '); ?></h3></b><?//= output($data['s_price_prefix']).$facturedetails['t_trip_amount'] ?></td>
            </tr> 
<?php if($facturedetails['t_taxe']=='avec_tva'){?>              
<tr>
              <th style="width:50%"><h3>Taxe 18%:</h3></th>
              <td><? $montantTVA=($montantHT*18)/100; //$facturedetails['t_trip_amount'] ?>  <b><h3><?= $montantTVAAfficher = number_format($montantTVA, 0, ',', ' '); ?></h3></b>
                  
                  </td>
            </tr>              
<?php }?>              
            <tr><? $montantTTC=0 ?>
              <th><h3><?php if($facturedetails['t_taxe']=='avec_tva'){?> Montant TTC<?php }else {?>Montant total<?php }?>:</h3></th>
              <td><b><? $montantTTC=$montantTVA+$montantHT ?> <h3><?= $montantTTCAfficher = number_format($montantTTC, 0, ',', ' '); ?></h3></b></td>
            </tr>
<?php
/*
$val = $this->load->librarie('convertNumbersIntoWords');
$figure = 1234567890;
echo $this->convertNumbersIntoWords->convert_number($figure);*/
?>
        
<script src="<?php echo base_url(); ?>assets/nombre_en_lettre.js">
    
var nombre_en_lettre = require('<?php echo base_url(); ?>assets/nombre_en_lettre.js');

console.log(nombre_en_lettre("12 236.24"));
// douze mille deux cent trente-six virgule vingt-quatre

console.log(nombre_en_lettre("85454.98", "Dinnar", "Centimes"));
// quatre-vingt-cinq mille quatre cent cinquante-quatre Dinnar et quatre-vingt-dix-huit Centimes    
</script>            
            </table>
        </div>
      <?php //}?>
          
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

        <br>
        <br>
        <br>
        <br>
        <br>
    La Direction
         <br>
        <br>
        <br>
        <br> 
           <br>
        <br>
        <br>
        <br>
        <br>
<footer class="main-footer">
            <img src="<?= base_url().'assets/uploads/'.$data['s_pied'] ?>">
</footer>   
<!-- ./wrapper -->

<script type="text/javascript"> 
 window.addEventListener("load", window.print());
</script>
<!---->    
    
<!--<script type="text/javascript" src="<?//= base_url(); ?>/assets/numbertowordconvert.js">
    
    var number = 1525;  
    var Inwords = toWordsconver(number);
</script> -->   
</body>
</html>
