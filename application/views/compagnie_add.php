    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">compagnies</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="compagnie_add" class="card" action="<?php echo base_url();?>compagnie/<?php echo (isset($compagniedetails))?'updatecompagnie':'insertcompagnie'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cc_id" id="cc_id" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom de la Compagnie<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_name']:'' ?>" id="cc_name" name="cc_name" placeholder="Compagnie">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Téléphone<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_mobile']:'' ?>" id="cc_mobile" name="cc_mobile" placeholder="Mobile">
                      </div>
                    </div>
  
                                         <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_email']:'' ?>" id="cc_email" name="cc_email" placeholder="Email">
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Line<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_line']:'' ?>" id="cc_line" name="cc_line" placeholder="Line">
                      </div>
                    </div> 
                      
                      
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Téléphone du contact<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_contact_mobile']:'' ?>" id="cc_contact_mobile" name="cc_contact_mobile" placeholder="Téléphone du contact">
                      </div>
                    </div>                      
                      
                    
                        
                    <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" id="cc_address" autocomplete="on" placeholder="Description"  name="cc_address"><?php echo (isset($compagniedetails)) ? $compagniedetails[0]['cc_address']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="cc_created_date" name="cc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->

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

