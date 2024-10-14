    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_carte_peagedetails))?'Modifier une carte peage':'Ajouter une carte peage' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Cartes carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_carte_peagedetails))?'Modifier carte peage':'Ajouter carte peage' ?></li>
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
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($fuel_carte_peagedetails))?'Modifier carte peage':'Ajouter carte peage' ?></a>
              </li>
				
				<li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-journal-tab" data-toggle="pill" href="#custom-tabs-one-journal" role="tab" aria-controls="custom-tabs-one-journal" aria-selected="true">JOURNAL</a>
              </li>				
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<!-- FORM-->
<form method="post" id="fuel_carte_peage_add" class="card" action="<?php echo base_url();?>fuel_carte_peage/<?php echo (isset($fuel_carte_peagedetails))?'updatefuel_carte_peage':'insertfuel_carte_peage'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cp_id" id="cp_id" value="<?php echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['cp_id']:'' ?>" >

					<div class="col-sm-4 col-md-4">
                          <label class="form-label">Gestionnaire Autoroute<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="cp_compagnie_id"  class="form-control selectized"  name="cp_compagnie_id" required="true">
                        <option value="">Selectionner le Gestionnaire Autoroute</option>
                        <?php  foreach ($carte_peagecompagnielist as $key => $carte_peagecompagnielists) { ?>
                        <option <?php if((isset($fuel_carte_peagedetails)) && $fuel_carte_peagedetails[0]['cp_compagnie_id'] == $carte_peagecompagnielists['cpc_id']){ echo 'selected';} ?> value="<?php echo output($carte_peagecompagnielists['cpc_id']) ?>"><?php echo output($carte_peagecompagnielists['cpc_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>	
					  
<div class="col-sm-6 col-md-3">
                          <label class="form-label">Véchicule<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="cp_v_id"  class="form-control"  name="cp_v_id" >
                        <option value="">Selectionner Véchicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($fuel_carte_peagedetails)) && $fuel_carte_peagedetails[0]['cp_v_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php //echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['cp_name']:'' ?>" id="cp_name" name="cp_name" placeholder="Nom de la peage ">
                      </div>
                    </div>-->
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Numéro de la peage<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['cp_numero']:'' ?>" id="cp_numero" name="cp_numero" placeholder="Numéro de la peage">
                      </div>
                    </div>
					  
					<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Date d'achat<span class="form-required">*</span></label>
                        <input type="text" name="cp_date_achat" value="<?php echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['cp_date_achat']:'' ?>" class="form-control datepicker" placeholder="Date d'achat" >
                      </div>
                    </div>		
					  
					  
					  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Date d'expiration<span class="form-required">*</span></label>
                        <input type="text" name="cp_date_expiration" value="<?php echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['cp_date_expiration']:'' ?>" class="form-control datepicker" placeholder="Date d'expiration">
                      </div>
                    </div>
					  
					  
                    <!--<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="false" class="form-control" value="<?php //echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['t_email']:'' ?>" id="t_email" name="t_email" placeholder="fuel_carte_peage Email">

                      </div>
                    </div>-->

					  

                    <div class="col-sm-7 col-md-8">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="cp_desc" autocomplete="off" placeholder="Description"  name="cp_desc"><?php echo (isset($fuel_carte_peagedetails)) ? $fuel_carte_peagedetails[0]['cp_desc']:'' ?></textarea>
                      </div>
                    </div>
                   
                     </div>
                   
                   
      
                </div>
                 <input type="hidden" id="cp_created_date" name="cp_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_carte_peagedetails))?'Modifier carte peage':'Ajouter carte peage' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  
				  
              </div>

<!-- BEGIN DIV JOURNAL -->
<div class="tab-pane fade show" id="custom-tabs-one-journal" role="tabpanel" aria-labelledby="custom-tabs-one-journal-tab">
<!-- FORM-->
ssss
		   
<!--END FORM-->				  
				  
              </div>				
				
<!--END DIV JOURNAL-->				
				
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
                        <th>Gestionnaire Autoroute</th>
<!-- -->                       <th>Véhicule</th>
                        <th>Numéro</th>
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
                     <?php if(!empty($fuel_carte_peagelist)){ 
                     $count=1;
                        foreach($fuel_carte_peagelist as $fuel_carte_peagelists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($fuel_carte_peagelists['cpc_name']); ?></td>
       <!-- -->               <td> <?php echo output($fuel_carte_peagelists['v_registration_no']); ?></td>
                        <td> <?php echo output($fuel_carte_peagelists['cp_numero']); ?></td>
                        <td><?php echo output($fuel_carte_peagelists['cp_date_achat']); ?></td>
                         <td><?php echo output($fuel_carte_peagelists['cp_date_expiration']); ?></td>
                       <td><?php echo output($fuel_carte_peagelists['cp_desc']); ?></td>
                         <!--<td><?php //echo output($driverslists['d_license_expdate']); ?>    </td>-->
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_carte_peage/editfuel_carte_peage/<?php echo output($fuel_carte_peagelists['cp_id']); ?>">
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



