    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Détails de la dépense N°<?php echo $incomexpensedetails['ie_numero_enregistrement']; ?>
                
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/incomexpense/addcaisse">Retour</a></li>
              <li class="breadcrumb-item active">Détails de la dépense</li>
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
		
		if(!empty($depense_caisselist)){
/**/      if(count($depense_caisselist)>=1) {
      foreach ($depense_caisselist as $payment) {
          $totalpaidamt += $payment['ioc_amount'];
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
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Montant dépense</span>
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Elements de la dépense N°<?php echo $incomexpensedetails['ie_numero_enregistrement']; ?></a>
                  </li>
                  
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
                      <th>Code</th>
<!--			  <th>Transitaire</th>-->	
					  <th>Compte</th>
					  <th>N° Caisse</th>
				      <th>Libellé </th>                      
<!--                      <th>Type</th>
-->                      <th>Montant </th>
<!--                  <th>Client</th>
-->                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
					  if(!empty($depense_caisselist)){
					//if(isset($paiementreglementdetails)){
					  $count=1;
                           foreach($depense_caisselist as $depense_caisselist){?>
                      <tr>
                      <td><?php echo output($count); $count++; ?></td>
                      <td><?php echo $depense_caisselist['compte']->iec_code;?> - </td>
                      <td><?php echo $depense_caisselist['compte']->iec_name;?></td>
                      <td><?php echo $depense_caisselist['ioc_numero_caisse'];?></td>
						  
                      <td><?php echo $depense_caisselist['ioc_designation']; ?></td>
<!--                      <td><?php //echo $paiementreglementdetails['tp_type']; ?></td>
-->                      <td><?php echo $depense_caisselist['ioc_amount']; ?></td>
                     <td>
                         
 <a class="icon" href="<?php echo base_url(); ?>incomexpense/depense_caisse_delete/<?php echo output($depense_caisselist['ioc_id']); ?>/<?= $incomexpensedetails['ie_id']; ?>"><i class="fa fa-trash text-danger"></i>
</a>
						 
<a class="icon" href="<?php echo base_url(); ?>incomexpense/details_caisse_suite/<?= $incomexpensedetails['ie_id']; ?>/<?php echo output($depense_caisselist['ioc_id']); ?>">
                          <i class="fa fa-arrow-right"></i>
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

 
                                                
                    <br/>           

                <a href="#" class="btn btn-sm btn-success <?= ($incomexpensedetails['ie_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Ajouter une dépense</a>
  
<!--	 <a href="#" class="btn btn-sm btn-success <?//= ($tripdetails['t_trip_amount'] - $totalpaidamt==0)?'disabled':'' ?>" data-toggle="modal" data-target="#modal-AddPayment">Add Payment</a>		-->		  

	 <!--<a href="<?//= base_url(); ?>incomexpense/incomexpense_generation_pdf/<?//= $incomexpensedetails['ie_id']; ?>" target="_blank" class="btn btn-sm btn-success <?//= (($paiementreglementdetails==0))?'disabled':'' ?>" >Générer la incomexpense <i class="fa fa-file-pdf text-danger"></i></a> --><br>		
				  
				  
                <!--<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tripexpense">Frais de voyage</a> -->                 
                </div>              
              <br>
              <div class="text-muted">
 
                <p class="text-sm">Informations sur la dépense
                  <b class="d-block">Numéro dépense: <?= $incomexpensedetails['ie_numero_enregistrement']; ?></b>
                  <b class="d-block">Date: <?= $incomexpensedetails['ie_date']; ?></b>

                  <b class="d-block"> Numéro<?php  if($incomexpensedetails['ie_espece_cheque']=="ESPECE") {?> caisse: <?php }else {?> chéque: <?php }?><?= $incomexpensedetails['ie_numero']; ?></b>
                  <b class="d-block">Montant: <?= $incomexpensedetails['ie_amount']; ?> FCFA</b>
                  <b class="d-block">Type: <?= $incomexpensedetails['ie_espece_cheque']; ?></b>
                <!--  <b class="d-block">Type: <?//= $incomexpensedetails['ie_type']; ie_numero?></b>-->
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
        <h4 class="modal-title">Effectuer l'ajout d'une nouvelle dépense</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="trippayments" action="<?= base_url() ?>incomexpense/insert_depensecaisse" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="totalamount" class="col-sm-4 col-form-label">Montant Total de la dépense</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="ie_amount" value="<?= $incomexpensedetails['ie_amount']; ?>" id="ie_amount"   placeholder="Saisir Montant Total" disabled>
                    </div>
                  </div>

					<div class="form-group row">
                    <label for="ioc_compte_id" class="col-sm-4 col-form-label">Compte</label>
                    <div class="form-group col-sm-8">
                     <select id="ioc_compte_id" class="form-control selectized" style="width: 100%;"  name="ioc_compte_id" required>
                        <option value="">Sélectionner le Compte </option>
                        <?php  foreach ($comptelist as $key => $comptelists) { ?>
                        <option value="<?php echo output($comptelists['iec_id']) ?>"><?php echo output($comptelists['iec_code']); ?> - <?php echo output($comptelists['iec_name']); ?></option>
                        <?php  } ?>
                     </select>
                    </div>
                  </div>					
					
					
                  <div class="form-group row">
                    <label for="ioc_numero_caisse" class="col-sm-4 col-form-label">Numero caisse </label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="ioc_numero_caisse"   >
                    </div>
                  </div>                    
    
					
<div class="form-group row">
                    <label for="ioc_amount" class="col-sm-4 col-form-label">Montant </label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="ioc_amount" value="<?= $incomexpensedetails['ie_amount']-$totalpaidamt; ?>"  >
                    </div>
                  </div>					
					
                <div class="form-group row">
                    <label for="ioc_designation" class="col-sm-4 col-form-label">Désignation</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="ioc_designation" id="ioc_designation" placeholder="Désignation">
                    </div>
                  </div>                    

                </div>
 
                 <input type="hidden" class="form-control" value="<?= "expense"; ?>" name="ioc_type" id="ioc_type" placeholder="ioc_type">
			
			
                 <input type="hidden" class="form-control" value="<?= $incomexpensedetails['ie_id']; ?>" name="ioc_ie_id" id="ioc_ie_id" placeholder="ioc_ie_id">
			
			
			
			
<!-- -->                <input type="hidden" class="form-control" value="<?php echo date('Y-m-d h:i:s'); ?>" name="ioc_created_date" id="ioc_created_date">
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
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