    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier une carte carburant':'Ajouter une carte carburant' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Cartes carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier carte carburant':'Ajouter carte carburant' ?></li>
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
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($fuel_carte_carburantdetails))?'Modifier carte carburant':'Ajouter carte carburant' ?></a>
              </li>
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<!-- FORM-->
<form method="post" id="fuel_carte_carburant_add" class="card" action="<?php echo base_url();?>fuel_carte_carburant_recharge/<?php echo (isset($fuel_carte_carburantdetails))?'updatefuel_carte_carburant':'insertfuel_carte_carburant_recharge'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="ccr_id" id="ccr_id" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['ccr_id']:'' ?>" >

					  
		<div class="col-sm-6 col-md-6">
                          <label class="form-label">Réglement 1<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ccr_incomeexpense_id"  class="form-control selectized"  name="ccr_incomeexpense_id" required="true">
                        <option value="">Selectionner le Réglement</option>
                        <?php  foreach ($incomeexpenselist as $key => $incomeexpenselists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['ccr_incomeexpense_id'] == $incomeexpenselists['ie_id']){ echo 'selected';} ?> value="<?php echo output($incomeexpenselists['ie_id']) ?>"><?php echo output($incomeexpenselists['ie_numero']).' - '. output($incomeexpenselists['ie_numero']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
					<div class="col-sm-6 col-md-4">
                          <label class="form-label">Carte<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ccr_carte_id"  class="form-control selectized"  name="ccr_carte_id" >
                        <option value="">Selectionner la carte</option>
                        <?php  foreach ($carte_carburantlist as $key => $carte_carburantlists) { ?>
                        <option <?php if((isset($fueldetails)) && $fueldetails[0]['ccr_carte_id'] == $carte_carburantlists['cc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantlists['cc_id']) ?>"><?php echo output($carte_carburantlists['cc_name']).' - '. output($carte_carburantlists['cc_numero']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Quantite<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['ccr_fuel_quantity']:'' ?>" id="ccr_fuel_quantity" name="ccr_fuel_quantity" placeholder="Numéro de la carte">
                      </div>
                    </div>
					  
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Prix du litre<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_fuelprice" name="ccr_fuelprice" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_fuelprice']:'655' ?>" placeholder="655">

                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant total<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ccr_amount" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_amount']:'' ?>" name="ccr_amount" placeholder="Montant total">
                      </div>
                    </div>
					  
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro ticket (Reçu)<span class="form-required">*</span></label>
                         <input type="text" class="form-control" id="ccr_number_ticket" name="ccr_number_ticket" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['ccr_number_ticket']:'' ?>" placeholder="Numéro ticket">

                      </div>
                    </div>					  
					  
					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Date<span class="form-required">*</span></label>
                        <input type="text" name="ccr_fueldate" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['ccr_fueldate']:'' ?>" class="form-control datepicker" placeholder="Date d'achat" >
                      </div>
                    </div>		


					  

                    <div class="col-sm-7 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="ccr_desc" autocomplete="off" placeholder="Description"  name="ccr_desc"><?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['ccr_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                     </div>
                   
                   
      
                </div>
                 <input type="hidden" id="ccr_created_date" name="ccr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_carte_carburantdetails))?'Modifier carte carburant':'Ajouter carte carburant' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  
				  
              </div>


            </div>
          </div>
          <!-- /.card -->
        </div>
<!--EN NAV-->		
	

    </section>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                        <th>Station service</th>
<!--                        <th>Nom</th>
-->                        <th>Numéro</th>
                        <th>Date d'achat</th>
                        <th>Date d'expiration</th>
                        <th>Description</th>
                       <!-- <th>Statut</th>-->
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($fuel_carte_carburantlist)){ 
                     $count=1;
                        foreach($fuel_carte_carburantlist as $fuel_carte_carburantlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($fuel_carte_carburantlists['cccr_name']); ?></td>
       <!--                <td> <?php //echo output($fuel_carte_carburantlists['ccr_name']); ?></td>-->
                        <td> <?php echo output($fuel_carte_carburantlists['ccr_numero']); ?></td>
                        <td><?php echo output($fuel_carte_carburantlists['ccr_date_achat']); ?></td>
                         <td><?php echo output($fuel_carte_carburantlists['ccr_date_expiration']); ?></td>
                       <td><?php echo output($fuel_carte_carburantlists['ccr_desc']); ?></td>
                         <!--<td><?php //echo output($driverslists['d_license_expdate']); ?>    </td>-->
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_carte_carburant/editfuel_carte_carburant/<?php echo output($fuel_carte_carburantlists['ccr_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                        </td>
                        <?php } ?>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
    <!-- /.content -->



