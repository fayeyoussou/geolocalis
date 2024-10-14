    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informations sur les mouvements
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a>| <a href="<?= base_url(); ?>reports/incomeexpense">Rapport</a></li>
              <li class="breadcrumb-item active">Informations sur les mouvements</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
          <?php if(!empty($incomexpense)){ ?>
                    <table id="incomexpensetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date reception</th>
                          <th>Factures</th>
                          <th>Banque Emettrice</th>
                          <th>Objet</th>
						  <th>Numéro de caisse</th>
                          <th>Encaissement</th>
                          <th>Decaissement</th>
                          <th>Type</th>
                          <th>Banque</th>
                          <?php if(userpermission('lr_ie_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                           <td> <?php //echo join_multi_select($incomexpenses['ie_id'], 'trips', 't_id', 't_id'); ?></td>
                           <td> <?php echo output($incomexpenses['ie_banque_emettrice_id']); ?></td>
                           <td> <?php echo output($incomexpenses['ie_objet']); ?></td>
                           <td> <?php echo output($incomexpenses['ie_numero']); ?></td>
                         <td><?php if($incomexpenses['ie_type']=='CHEQUE') echo output($incomexpenses['ie_amount']); ?></td>
                         <td><?php if($incomexpenses['ie_type']=='ESPECE') echo output($incomexpenses['ie_amount']); ?></td>                          <td>  <span class="badge <?php //echo ($incomexpenses['ie_type_mouvement_caisse']=='Règlement factures') ? 'badge-success' : 'badge-danger'; ?> "><?php //echo ($incomexpenses['ie_type_mouvement_caisse']=='Caisse et dépenses') ? 'badge-success' : 'badge-danger'; ?><?php //echo ($incomexpenses['ie_type_mouvement_caisse']=='Banque') ? 'badge-success' : 'badge-danger'; ?>
							
						<?php  if ($incomexpenses['ie_type_mouvement_caisse'] == 'Règlement factures') {?>
							
						<?php }?>	
							</span>   
							<?php  if ($incomexpenses['ie_type_mouvement_caisse'] == 'Transport') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">Ajouter conteneur </a>      
                 <?php }?> </td>
<!--                           <td><?php //echo output($incomexpenses['ie_description']); ?></td>
-->
				<td> <?php if($incomexpenses['ie_bordereau_versement']==""){ ?><a href="<?php echo base_url(); ?>incomexpense/editincomexpense/<?php echo output($incomexpenses['ie_id']); ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-AddPayment">Banque </a><?php }else{?><?php echo output($incomexpenses['ie_bordereau_versement']); ?> du <?php echo output($incomexpenses['ie_date_versement']); ?><?php }?> </td>
                          <?php if(userpermission('lr_ie_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>incomexpense/editincomexpense/<?php echo output($incomexpenses['ie_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } ?>
                          
                          
                      </tbody>
                      <thead>
                        <tr>
                          <th class="w-1"></th>
                          <th></th>
                          <th></th>
                          <th>Total</th>
                          <th>Encaissement</th>
                          <th>Decaissement</th>
                          <th></th>
                          <?php //if(userpermission('lr_ie_edit')) { ?>
                          <th></th>
                          <?php //} ?>
                        </tr>
                      </thead>                        
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun mouvement n\'est trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->

<div class="modal fade show" id="modal-AddPayment" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Banque</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/updateincomexpense">
                <div class="card-body">
                  <!----><div class="form-group row">
                    <label for="ie_bordereau_versement" class="col-sm-4 col-form-label">Bordereau de versement</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="ie_bordereau_versement" value="" id="ie_bordereau_versement" placeholder="Numéro du bordereau de versement" >
                    </div>
                  </div>
                  <!----><div class="form-group row">
                    <label for="ie_date_versement" class="col-sm-4 col-form-label">Date du versement</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control datepicker" name="ie_date_versement" value="" id="ie_date_versement" placeholder="Date du versement" >
                    </div>
                  </div>
<!--                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">ie_bordereau_versement</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="ie_bordereau_versement" id="tp_amount" placeholder="Pay">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>-->
                <!--</div>-->
<!--                 <input type="hidden" class="form-control" value="<?//= $tripdetails['t_id']; ?>" name="tp_trip_id" id="tp_trip_id" placeholder="tp_trip_id">
                 <input type="hidden" class="form-control" value="<?//= $tripdetails['t_vechicle']; ?>" name="tp_v_id" id="tp_v_id" placeholder="tp_v_id">-->
		<input type="hidden" id="ie_type" name="ie_type" value="<?php echo "Encaissement"; ?>">
      <div class="modal-footer justify-content-between">
                 <input type="text" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="ie_id" id="ie_id">        
		  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer Banque</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
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

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

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
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
