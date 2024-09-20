<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rapport de factures
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Synthéses</a></li>
               <li class="breadcrumb-item active">Rapport de factures</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <form method="post" id="booking_report" class="card basicvalidation" action="<?php echo base_url();?>reports/booking">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="booking_from" class="col-sm-5 col-form-label">Rapport de</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['from']) ? $_POST['from'] : ''; ?>" id="booking_from" name="from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-5 col-form-label">Rapport à</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['to']) ? $_POST['to'] : ''; ?>" id="booking_to" name="to" placeholder="Date fin">
                     </div>
                  </div>
               </div>
               
               <input type="hidden" id="bookingreport" name="bookingreport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer le Rapport</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">

        <div class="card-body p-0">
           <?php if(!empty($triplist)){ ?>
         <table class="datatableexport table card-table table-vcenter">                       
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Désignation</th>
                          <th>N° Proforma</th>
                          <th>N° facture</th>
                          <th>Modéle facture</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                          <th>Date</th>
                          <th>Montant</th>
                          <th>TVA</th>
<!--                      <th>Statut facture</th>-->
                          <th>Réglement</th>
                          <th>Validation</th>
                          <th>Création</th>
                         
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($triplist)){ 
                           $count=1;
							$montant_total_tva =0;
							$montant_total_facture = 0;
                           foreach($triplist as $facturelists){
                           ?>
                        <tr>
                            <td> <?php echo output($count); $count++; ?></td>
                          <td> <?php echo ucfirst($facturelists['t_type_facturation']); ?></td>
                          <td> <?php echo output($facturelists['t_num_proforma']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_num_facture']); ?> </td>                         <td> <?php echo ucfirst($facturelists['t_modele_facture']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>
                           <td><?php if($facturelists['t_validation']=="non_valide") {echo "Facture non validée";}else { echo ucfirst($facturelists['t_trip_amount']); $montant_total_facture += $facturelists['t_trip_amount'];}?></td>
                           <td><?php if($facturelists['t_validation']=="non_valide") {echo "Facture non validée";}else { echo ucfirst($facturelists['t_montant_tva']); 
                      $montant_total_tva += $facturelists['t_montant_tva'];
                    }?></td>
<!--                          <?php echo ucfirst($facturelists['t_date_facture']); ?></td>--> 
                           <td><?= (isset($facturelists['t_reglement_details']->tg_name))?$facturelists['t_reglement_details']->tg_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>                       
                            
                         <td> <?php 
                              switch($facturelists['t_validation']){
                                  case 'valide':
                                      $status = '<span class="badge badge-info">Validé</span>';
                                      break;
                                  case 'non_valide':
                                      $status = '<span class="badge badge-danger">Non validé</span>'; 
                                       break; 
   
                                }

                              ?>
                             <?=  $status ?>  
                            </td>
                          <td> <?php echo output($facturelists['t_created_date']); ?></td>
							
                            
                             <?php //if(userpermission('lr_trips_list_edit')) { ?>
                               
                          <?php //} //fin controle ligne 100; edit ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
	
	<!--BEGIN ADD TOTAL-->
<thead>
                        <tr>
                          <th class="w-1"></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
						  <th></th>
                          <th></th>
						  <th></th>
                          <th></th>
						  <th></th>
						  <th></th>
                        </tr>
                      </thead>	

	<!--END ADD TOTAL-->
	
                    </table>    <?php  } ?>      
        </div>
        <!-- /.card-body -->
      </div>


   </div>
</section>
<!-- /.content -->