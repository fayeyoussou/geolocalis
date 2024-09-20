    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_bon_carburantdetails))?'MODIFIER LE BC : ':'AJOUTER UN BON DE CARBURANT' ?> <?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_numero']:'' ?>				
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Bon carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier bon de carburant':'Ajouter bon de carburant' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
		
<!--BEGIN NAV-->		
<div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($fuel_bon_carburantdetails))?'MODIFIER LE BON DE CARBURANT : ':'AJOUTER UN BON DE CARBURANT' ?><?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_numero']:'' ?></a>
              </li>
              
              
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              
 <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<!-- FORM-->
<form method="post" id="fuel_bon_carburant" class="card" action="<?php echo base_url();?>fuel_bon_carburant/<?php echo (isset($fuel_bon_carburantdetails))?'updatefuel_bon_carburant':'insertfuel_bon_carburant'; ?>">

                  <div class="row">
                   <input type="hidden" name="bc_id" id="bc_id" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_id']:'' ?>" >
					  
					  
<div class="col-sm-6 col-md-3">
                          <label class="form-label">Station service<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="bc_compagnie_id" required="true" class="form-control selectized"  name="bc_compagnie_id" >
                        <option value="">Selectionner la station</option>
                        <?php  foreach ($fuel_compagnielist as $key => $fuel_compagnielists) { ?>
                        <option <?php if((isset($fuel_bon_carburantdetails)) && $fuel_bon_carburantdetails[0]['bc_compagnie_id'] == $fuel_compagnielists['ccc_id']){ echo 'selected';} ?> value="<?php echo output($fuel_compagnielists['ccc_id']) ?>"><?php echo output($fuel_compagnielists['ccc_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  


                    <div class="col-sm-6 col-md-3">
                          <label class="form-label">Véhicule<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="bc_vehicule_id"  class="form-control selectized"  name="bc_vehicule_id" required="true">
                        <option value="">Selectionner le véhicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($fuel_bon_carburantdetails)) && $fuel_bon_carburantdetails[0]['bc_vehicule_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Chauffeur<span class="form-required">*</span></label>
                     <select id="bc_driver_id" class="form-control selectized" name="bc_driver_id" required>
                       <option value="">Selectionner chauffeur</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($fuel_bon_carburantdetails)) && $fuel_bon_carburantdetails[0]['bc_driver_id'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>					  
					  
					  
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control datepicker" id="bc_date" name="bc_date" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Quantité (L)<span class="form-required">*</span></label>
                         <input type="text" required="true" class="form-control" id="bc_quantite" name="bc_quantite" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_quantite']:'' ?>" placeholder="Quantité (L)">

                      </div>
                    </div>
					  
                   <?php if(isset($fuel_bon_carburantdetails[0]['bc_type'])) { ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="bc_type" class="form-label">Statut </label>
                        <select id="bc_type" name="bc_type" class="form-control selectized" required="">
                          <option value="">Selectionner le statut </option> 
                          <option <?php echo (isset($fuel_bon_carburantdetails) && $fuel_bon_carburantdetails[0]['bc_type']==1) ? 'selected':'' ?> value="1">Validé</option> 
                          <option <?php echo (isset($fuel_bon_carburantdetails) && $fuel_bon_carburantdetails[0]['bc_type']==0) ? 'selected':'' ?> value="0">Non Validé</option> 
                        </select>
                      </div>
                    </div>
                  <?php } ?>					  
					  
                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Montant<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="bc_montant" name="bc_montant" value="<?php //echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_montant']:'' ?>" placeholder="Montant">

                      </div>
                    </div>-->
					  
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="bc_desc" value="<?php echo (isset($fuel_bon_carburantdetails)) ? $fuel_bon_carburantdetails[0]['bc_desc']:'' ?>" name="bc_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>

      
                </div>
<?php if((isset($fuel_bon_carburantdetails))){}else{ ?>	
                 <input type="hidden" id="bc_created_date" name="bc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                  <input type="hidden" id="bc_numero" name="bc_numero" value="BC<?= $numerobon_carburant; ?>">
  <?php } ?>
 
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_bon_carburantdetails))?'Modifier carburant':'AJOUTER CARBURANT' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  

<!--DEBUT LIST-->
				  
<!--FIN LIST-->				  
				  
				  
              </div>				
				
            </div>
          </div>
          <!-- /.card -->
        </div>
<!--EN NAV-->		
	

    </section>

    <!-- /.content -->

<script>
	
	
  $(document).ready(function() {
	  
	
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>fuel_bon_carburant/fetch_conteneur",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_trip_id:mi_trip_id},
    success:function(data)
    {
     $('#mi_conteneur_id').html(data);
//     $('#city').html('<option value="">Select City-BAS</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
 //  $('#city').html('<option value="">Select City else</option>');
  }
 });	  
	  
	  
	  
    $('.form-validate').validate({
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    $('.check-select-all-p').on('change', function() {

      $('.check-select-p').attr('checked', $(this).is(':checked'));
      
    })

    $('.table-DT').DataTable({
      "ordering": false,
    });
  })

</script>

