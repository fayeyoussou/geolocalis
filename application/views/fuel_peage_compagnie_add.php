    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($fuel_peage_compagniedetails))?'Modifier compagnie péage':'Ajouter compagnie péage' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">fuel_peage_compagnies</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($fuel_peage_compagniedetails))?'Modifier compagnie péage':'Ajouter compagnie péage' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="fuel_peage_compagnie_add" class="card" action="<?php echo base_url();?>fuel_peage_compagnie/<?php echo (isset($fuel_peage_compagniedetails))?'updatefuel_peage_compagnie':'insertfuel_peage_compagnie'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="cpc_id" id="cpc_id" value="<?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Nom de la Compagnie<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_name']:'' ?>" id="cpc_name" name="cpc_name" placeholder="Nom de la Compagnie">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Téléphone<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_mobile']:'' ?>" id="cpc_mobile" name="cpc_mobile" placeholder="Téléphone">
                      </div>
                    </div>
  
                                         <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_email']:'' ?>" id="cpc_email" name="cpc_email" placeholder="Email">
                      </div>
                    </div>
                    

                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Nom du contact<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_contact_name']:'' ?>" id="cpc_contact_name" name="cpc_contact_name" placeholder="Nom du contact">
                      </div>
                    </div>                      
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Téléphone du contact<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_contact_mobile']:'' ?>" id="cpc_contact_mobile" name="cpc_contact_mobile" placeholder="Téléphone du contact">
                      </div>
                    </div>
                        
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Adresse<span class="form-required">*</span></label>
                        <textarea class="form-control" id="cpc_address" autocomplete="on" placeholder="Adresse"  name="cpc_address"><?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_address']:'' ?></textarea>
                      </div>
                    </div> 
                      
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="cpc_desc" autocomplete="on" placeholder="Description"  name="cpc_desc"><?php echo (isset($fuel_peage_compagniedetails)) ? $fuel_peage_compagniedetails[0]['cpc_desc']:'' ?></textarea>
                      </div>
                    </div>                      
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="cpc_created_date" name="cpc_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($fuel_peage_compagniedetails))?'Modifier compagnie':'Ajouter compagnie' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->

<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                        <th>Compagnie péage</th>
                        <th>Nom</th>
                        <th>Numéro</th>
                        <th>Date d'achat</th>

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
                            <td> <?php echo output($fuel_carte_peagelists['ccc_name']); ?></td>
                       <td> <?php echo output($fuel_carte_peagelists['cpc_name']); ?></td>
                        <td> <?php echo output($fuel_carte_peagelists['cpc_numero']); ?></td>
                        <td><?php echo output($fuel_carte_peagelists['cpc_date_achat']); ?></td>
<!--                        <td><?php //echo output($fuel_carte_peagelists['cc_desc']); ?></td>
-->                         <!--<td><?php //echo output($driverslists['d_license_expdate']); ?>    </td>-->
                        <?php if(userpermission('lr_cust_edit')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>fuel_carte_peage/editfuel_carte_peage/<?php echo output($fuel_carte_peagelists['cpc_id']); ?>">
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