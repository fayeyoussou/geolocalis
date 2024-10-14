
<!DOCTYPE html>
<html>
<head>
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
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="col-12" class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="<?= base_url().'assets/uploads/'.$data['s_logo'] ?>">
          <small class="float-right">Date: <?= date('d-m-Y') ?></small>
        </h2>
      </div><br>
      <!-- /.col -->
    </div><br><br>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        De
        <address>
          <strong><?= $data['s_companyname'] ?></strong><br>
         <?=  str_replace(",", '<br>', $data['s_address']); ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Destination
        <address>
          <strong><?= $customerdetails['c_name']; ?></strong><br>
          <?= $customerdetails['c_address']; ?><br>
          Téléphone: <?= $customerdetails['c_mobile']; ?><br>
          E-mail: <?= $customerdetails['c_email']; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Facture N°<?= output($data['s_inovice_prefix']).date('Ym').$facturedetails['t_id']; ?></b><br>
        <br>
        <b>N° d'ordre:</b> <?= output($facturedetails['t_id']) ?><br>
        <b>Paiement dû:</b> <?= date('d-m-Y') ?><br>
        <b>N° d'ordre:</b> <?= output($facturedetails['t_id']) ?><br>
        <b>Paiement dû:</b> <?= date('d-m-Y') ?><br>
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
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>N° ordre</th>
            <th>Référence</th>
            <th>Désignation</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Montant</th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1250;
                           foreach($conteneurdetails as $conteneurdetails){ $type='';$type_conteneur=0;$montant=0; ?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo output($conteneurdetails['co_numero_conteneur']); ?></td>
                      <td><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination);} ?> - <?php 
                        if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; $type='20 pieds'; } else { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;$type='40 pieds'; }}  ?>
                          <?php echo output($type);?></td>
                      <td><?php echo "1"; //output($conteneurdetails['co_montant']); ?></td>
                      <td><?php echo output($type_conteneur); ?></td>
                      <td><?php echo output($montant=$type_conteneur+$conteneurdetails['nature_name']->na_montant);?></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
                    <?php $montanttotal=$montanttotal+$montant; } ?>
              
              
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
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

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">AGS:</th>
              <td><?//$ags=1250; ?><?=$facturedetails['t_nombre_conteneur'] * $ags ?>  <?//= $data['s_price_prefix']; ?> <?//= output($data['s_price_prefix']).$facturedetails['t_trip_amount'] ags_montant?></td>
            </tr>
     
            <tr>
              <th style="width:50%">Sous total:</th>
              <td><?= $montanttotal; //$facturedetails['t_trip_amount'] ?>  <?//= $data['s_price_prefix']; ?> <?//= output($data['s_price_prefix']).$facturedetails['t_trip_amount'] ?></td>
            </tr>              
            <tr>
              <th>Payé:</th>
              <td><?= output($totalpaidamt); ?> <?= $data['s_price_prefix']; ?><?//= output($data['s_price_prefix']).$totalpaidamt ?></td>
            </tr>
            <?php if($facturedetails['t_trip_amount'] - $totalpaidamt !=0) { ?>
            <tr>
              <th><?= ($facturedetails['t_trip_amount'] > $totalpaidamt)?'Restant':'Sur plus' ?>:</th>
              <td><?= output($facturedetails['t_trip_amount'] - $totalpaidamt); ?> <?= $data['s_price_prefix']; ?><? //= output($data['s_price_prefix']) .preg_replace('/[^\d\.]+/','',$facturedetails['t_trip_amount'] - $totalpaidamt)  ?></td>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
