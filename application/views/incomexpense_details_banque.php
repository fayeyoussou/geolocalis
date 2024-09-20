    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails de l'opération banque N°<?php echo $incomexpensedetails['ie_numero_enregistrement']; ?> 
                
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Détails de l'opération banque</li>
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
		
		if(!empty($paiementreglementdetails)){
/**/      if(count($paiementreglementdetails)>=1) {
      foreach ($paiementreglementdetails as $payment) {
          $totalpaidamt += $payment['tp_amount'];
      } 
	}
		}
		
		
 /*     $totalpaidamt2 = 0;
     if(count($paymentdetails2)>=1) {
      foreach ($paymentdetails2 as $payment2) {
          $totalpaidamt2 += $payment2['ie_amount'];
      } }	*/	
      ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              
              <div class="row">
                <div class="col-12">

                    

                    
<!-- Debut tab--> 
 <div >
	 
<!-- DEBUT TAB-->
	<table id="bookingstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      N° Facture
                                  </th>
                                  <th class="percent25">
                                      Clients
                                  </th>
                                  <th class="percent25">
                                    Montant facture
                                  </th>
                                  <th class="percent25">
                                    Ristourne
                                  </th>
 
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($incomexpensedetails)) {
                            $count=1;
                            foreach($incomexpensedetails as $bookingsdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                   <td><?php echo output($bookingsdata['t_num_facture']);?></td>
                                  <td>
                                     <?php echo output($bookingsdata['t_customer_details']->c_name);?>
                                  </td>
                                  <td>
                                     <?php //echo output($bookingsdata['t_trip_amount']);?><?php  if($bookingsdata['t_trip_amount']==0) { echo '<span class="badge badge-danger">Facture non validée</span>';}else { echo $bookingsdata['t_trip_amount']; }?>
                                  </td>
                                  <td>
                                     <?php echo output($bookingsdata['t_ristourne_amount']);?>
                                  </td>
                                  <td> <!--<a class="icon" target="_blank" href="<?php //echo base_url(); ?>trips/details/<?php //echo output($bookingsdata['t_id']); ?>">
                                     <i class="fa fa-eye"></i>
                                    </a> -->
                                  </td>
                              </tr>
                              <?php } } ?>
                          </tbody>
                      </table> 
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

  
<!--	 <a href="#" class="btn btn-sm btn-success <?//= ($tripdetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Add Payment</a>		-->		  
<a href="<?= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?= $incomexpensedetails['ie_id']; ?>" target="_blank" class="btn btn-sm btn-success <?= (($paiementreglementdetails==0))?'disabled':'' ?>" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> <br>		
				  
				  
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
                  
                <p class="text-sm">Informations Banque<?php //echo $paiementreglementdetails['transitaire']->tra_name; ?>
                 <?php  if($incomexpensedetails['ie_espece_cheque']=="CHEQUE") {?> 
					<b class="d-block">Banque émettrice: <?php if($incomexpensedetails['ie_banque_emettrice_id']!=0) { echo $banqueemettrice['ieb_name']; ?> <?php }?></b>
					<?php }?>
                  <b class="d-block">Banque receptrice: <?php if($incomexpensedetails['ie_banque_receptrice_id']!=0) { echo output($banquereceptrice['ieb_name']); ?> <?php }?></b>
 
                  <b class="d-block">Transitaire: <?php //if($incomexpensedetails['ie_banque_receptrice_id']!=0) { echo output($incomexpensedetails['tra_name']); ?> <?php //echo output($incomexpensedetails['tra_name']); //}?></b>				  
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