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
<form method="post" id="fuel_carte_carburant_add" class="card" action="<?php echo base_url();?>fuel_carte_carburant/<?php echo (isset($fuel_carte_carburantdetails))?'updatefuel_carte_carburant':'insertfuel_carte_carburant'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cc_id" id="cc_id" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_id']:'' ?>" >

					<div class="col-sm-4 col-md-4">
                          <label class="form-label">Station Service<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="cc_compagnie_id"  class="form-control selectized"  name="cc_compagnie_id" required="true">
                        <option value="">Selectionner la Station Service</option>
                        <?php  foreach ($carte_carburantcompagnielist as $key => $carte_carburantcompagnielists) { ?>
                        <option <?php if((isset($fuel_carte_carburantdetails)) && $fuel_carte_carburantdetails[0]['cc_compagnie_id'] == $carte_carburantcompagnielists['ccc_id']){ echo 'selected';} ?> value="<?php echo output($carte_carburantcompagnielists['ccc_id']) ?>"><?php echo output($carte_carburantcompagnielists['ccc_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php //echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_name']:'' ?>" id="cc_name" name="cc_name" placeholder="Nom de la carte ">
                      </div>
                    </div>-->
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro de la carte<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_numero']:'' ?>" id="cc_numero" name="cc_numero" placeholder="Numéro de la carte">
                      </div>
                    </div>
					  
					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Date d'achat<span class="form-required">*</span></label>
                        <input type="text" name="cc_date_achat" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_date_achat']:'' ?>" class="form-control datepicker" placeholder="Date d'achat" >
                      </div>
                    </div>		
					  
					  
					  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Date d'expiration<span class="form-required">*</span></label>
                        <input type="text" name="cc_date_expiration" value="<?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_date_expiration']:'' ?>" class="form-control datepicker" placeholder="Date d'expiration">
                      </div>
                    </div>
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="fuel_carte_carburant Email">

                      </div>
                    </div>-->

					  

                    <div class="col-sm-7 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="cc_desc" autocomplete="off" placeholder="Description"  name="cc_desc"><?php echo (isset($fuel_carte_carburantdetails)) ? $fuel_carte_carburantdetails[0]['cc_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                     </div>
                   
                   
      
                </div>
                 <input type="hidden" id="cc_created_date" name="cc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
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
                        <th>Carburant restant (litre)</th>
                        <th>Description</th>
                       <!-- <th>Statut</th>-->
                        <?php //if(userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php //} ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($fuel_carte_carburantlist)){ 
                     $count=1;
                        foreach($fuel_carte_carburantlist as $fuel_carte_carburantlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($fuel_carte_carburantlists['ccc_name']); ?></td>
       <!--                <td> <?php //echo output($fuel_carte_carburantlists['cc_name']); ?></td>-->
                        <td> <?php echo output($fuel_carte_carburantlists['cc_numero']); ?></td>
                        <td><?php echo output($fuel_carte_carburantlists['cc_date_achat']); ?></td>
                         <td><?php echo output($fuel_carte_carburantlists['cc_date_expiration']); ?></td>
                        <td><?php echo output($fuel_carte_carburantlists['cc_restant']); ?></td>
                      <td><?php echo output($fuel_carte_carburantlists['cc_desc']); ?></td>
                         <!--<td><?php //echo output($driverslists['d_license_expdate']); ?>    </td>-->
                       
                        <td> <?php if(userpermission('lr_fuel_cc_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_carte_carburant/editfuel_carte_carburant/<?php echo output($fuel_carte_carburantlists['cc_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
							<?php } ?>
							
						<?php if(userpermission('lr_fuel_cc_detail')) { ?>		   
                            <a data-toggle="tooltip" data-placement="top" title="Détail" class="icon" href="<?php echo base_url(); ?>fuel_carte_carburant/details/<?php echo output($fuel_carte_carburantlists['cc_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
								   
						<?php } ?>							
							
                        </td>
                        
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



