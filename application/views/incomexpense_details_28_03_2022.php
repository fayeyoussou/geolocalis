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
                      <span class="info-box-text text-center text-muted">Montant Réglement</span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $incomexpensedetails['ie_amount']; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant utilisé<!----></span>
                      <span class="info-box-number text-center text-muted mb-0"><?= $totalpaidamt; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"><?= ($incomexpensedetails['ie_amount'] > $totalpaidamt)?'Restant':'Excès' ?></span>
                      <span class="info-box-number text-center text-muted mb-0"><?= preg_replace('/[^\d\.]+/','',$incomexpensedetails['ie_amount'] - $totalpaidamt)  ?> <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">

                    

                    
<!-- Debut tab--> 
 <div >
	 
<!-- DEBUT TAB-->
<div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Paiements de factures du réglement N°<?php echo $incomexpensedetails['ie_numero_enregistrement']; ?></a>
                  </li>
                  <!--<li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Profile</a>
                  </li>-->
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
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<div class="card-body">
                      <?php //echo "bonjou jdhqsjr"; //if(!empty($conteneurdetails)) { echo "bonjour"; ?>
               
                   <table class="table table-bordered table-striped" width="100%">
                  <thead>                  
                    <tr>
                      <th>N°</th>
                      <th>N°Facture</th>
<!---->				  <th>Transitaire</th>
					  <th>Client</th>
				      <th>Montant facture</th>                      
                      <th>Type</th>
                      <th>Montant versé</th>
<!--                  <th>Client</th>
-->                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
					  if(!empty($paiementreglementdetails)){
					//if(isset($paiementreglementdetails)){
					  $count=1;
                           foreach($paiementreglementdetails as $paiementreglementdetails){?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo $paiementreglementdetails['facture']->t_num_facture;?></td>

                      <td><?php echo $paiementreglementdetails['transitaire']->tra_name; ?></td>
                      <td><?php echo $paiementreglementdetails['client']->c_name;?></td>
						  
                      <td><?php echo $paiementreglementdetails['facture']->t_trip_amount; ?></td>
                      <td><?php echo $paiementreglementdetails['tp_type']; ?></td>
                      <td><?php echo $paiementreglementdetails['tp_amount']; ?></td>
                     <td>
                         
 <a class="icon" href=""><i class="fa fa-trash text-danger"></i>
</a>                      
                          
                          </td>
                    </tr>
                    <?php
                                                                           
//echo $montanttotal_conteneur += $montant_conteneur;
//echo $facturedetails['t_nombre_ags'];                                                                           
//echo $nombreags += $facturedetails['t_nombre_ags'];                                                                           
                           // $montantags=$facturedetails['t_nombre_ags'];                                              
                    }
					  
					  }
					  ?>
                  </tbody>
                       
                </table>
<?php //}// FIN controle Exportation ou Transport?>       

                 <?php 
/*                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun conteneur n\'est ajouté à la Facture  !.</div>';
                     }*/
                     ?>
                </div>
                  </div>
<!--                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     2
                  </div>-->

                </div>
              </div>
              <!-- /.card -->
            </div>	 
<!-- FIN TAB-->	 

            
          </div>                   
<!-- Fin tab-->                    
                    
                    
                    
                    
                    
                    
                </div>

              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
 <div class="mt-2 mb-3">
<!--                <a href="#" class="btn btn-sm btn-success <?//= ($incomexpensedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un paiement</a>-->
<!--                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-incomexpenseexpense">Dépenses</a>-->
 
                                                
                    <br/>           
             <!--   <a href="<?//= base_url(); ?>incomexpense/incomexpense_generation/<?//= $incomexpensedetails['tp_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Aperçu de la incomexpense</a><br>-->

<!--                <a href="<?//= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> <br>-->                   
<!--                <a href="<?//= base_url(); ?>incomexpense/invoice/<?//= $incomexpensedetails['t_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Generate Invoice</a>
-->                
                <a href="#" class="btn btn-sm btn-success <?//= ($incomexpensedetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter un Réglement</a>
				  
<a href="<?= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?= $incomexpensedetails['ie_id']; ?>" target="_blank" class="btn btn-sm btn-success" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> <br>				  
				  
                <!--<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a> -->                 
                </div>              
              <br>
              <div class="text-muted">
 
                <p class="text-sm">Informations le réglement
                  <b class="d-block">Numéro réglement: <?= $incomexpensedetails['ie_numero_enregistrement']; ?></b>
                  <b class="d-block">Date: <?= $incomexpensedetails['ie_date']; ?></b>

                  <b class="d-block"> Numéro<?php  if($incomexpensedetails['ie_espece_cheque']=="ESPECE") {?> caisse: <?php }else {?> chéque: <?php }?><?= $incomexpensedetails['ie_numero']; ?></b>
                  <b class="d-block">Montant: <?= $incomexpensedetails['ie_amount']; ?> FCFA</b>
                  <b class="d-block">Type: <?= $incomexpensedetails['ie_espece_cheque']; ?></b>
                <!--  <b class="d-block">Type: <?//= $incomexpensedetails['ie_type']; ie_numero?></b>-->
                </p>
                  
                <p class="text-sm">Informations Banque
                 <?php  if($incomexpensedetails['ie_espece_cheque']=="CHEQUE") {?> <b class="d-block">Banque émettrice: <?php //if($incomexpensedetails['ie_banque_emettrice_id']!=0) {echo output($banquedetails['banque_emettrice']->ieb_name); }?><?//= $banquedetails['ieb_name']; ?></b><?php }?>
                  <b class="d-block">Banque receptrice: <?php //if($incomexpensedetails['ie_banque_receptrice_id']!=0) {echo output($banquedetails['banque_receptrice']->ieb_name); }?><?//= $banquedetails['ieb_name']; ?></b>
                </p>                  
                  
<!--                  <p class="text-sm">Informations du client
                  <b class="d-block"><?//= $customerdetails['c_name']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_mobile']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_email']; ?></b>
                  <b class="d-block"><?//= $customerdetails['c_address']; ?></b>
                </p>-->
<!--                <p class="text-sm">Informations du chauffeur
                  <?php //if(isset($driverdetails['d_name'])) { ?>
                  <b class="d-block"><?//= $driverdetails['d_name']; ?></b>
                  <b class="d-block"><?//= $driverdetails['d_mobile']; ?></b>
                  <b class="d-block"><?//= $driverdetails['d_licenseno']; ?></b>
                  <?php  //} else { echo '<b class="d-block"><span class="badge badge-danger">Encore à attribuer</span></b>'; } ?>
                </p>-->

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
                    <input type="text" class="form-control" name="ie_amount" value="<?= $incomexpensedetails['ie_amount']; ?>"  placeholder="Saisir Montant Total" disabled>
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
                       <input type="text" class="form-control" name="tp_amount"  placeholder="Montant à verser">
                    </div>
                  </div>                    
                    
                    <div class="form-group row">
                    <label for="tp_type" class="col-sm-4 col-form-label">Type</label>
                    <div class="form-group col-sm-8">
                     <select name="tp_type" id="tp_type" required="true" class="form-control">
                      <option value="">Sélectionner un Type </option>
                      <option value="Solder">Solder</option>

                      <option value="Avance">Avance</option>						 
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
            
            
            
            
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['ie_id']; ?>" name="tp_ie_id" id="tp_ie_id" placeholder="tp_ie_id">
<!-- -->                <input type="hidden" class="form-control" value="<?= date('Y-m-d'); ?>" name="tp_date" id="tp_date" placeholder="tp_date">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer Paiement</button>
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