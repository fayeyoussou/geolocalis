    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des factures à annuler
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des factures à annuler</li>
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
			
			<div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">FACTURES A ANNULER</a>
                  </li>
                  

                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

					  <!--BEGIN LIST-->
	<!-- BEGIN FORMS-->
					  
	<!-- END FORMS-->					  
					  
					  
<table class="datatableexport table card-table table-vcenter">                       
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Désignation</th>
                          <th>N° facture</th>
                          <th>Modéle facture</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                          <th>Date</th>
                          
                          <th>Création</th>
                         <?php if(userpermission('lr_trips_list_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($facturelist)){ 
                           $count=1;
							$montant_total_tva =0;
							$montant_total_facture = 0;
                           foreach($facturelist as $facturelists){
                           ?>
                        <tr>
                            <td> <?php echo output($count); $count++; ?></td>
                          <td> <?php echo ucfirst($facturelists['t_type_facturation']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_num_facture']); ?> <?php //if(isset($facturelists['t_num_facture'])){echo output($facturelists['t_num_facture']);}else {echo output($facturelists['t_num_proforma']);} ?></td>                         <td> <?php echo ucfirst($facturelists['t_modele_facture']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>
                          
                          <td> <?php echo output($facturelists['t_created_date']); ?></td>
							
                            
                             <?php //if(userpermission('lr_trips_list_edit')) { ?>
                               <td>
 <?php $t_validation=''; if(userpermission('lr_trips_validate')) { ?>                                  
<?php  $t_validation =  $facturelists['t_validation'];?>                           
                                   <?php if($t_validation=="non_valide") { ?> 
						
								   

				<?php }?>				   
								   
<?php }?><!--fin permission-->
								   
                                   
                                   
<!--Fin validation-->                                    
                                   
                                   
<!--debut annulation-->   
<?php if(userpermission('lr_trips_cancel')) { ?>								   
                <?php $t_annulation=''; $t_annulation =  $facturelists['t_annulation']; //echo $t_annulation;
                        if($t_annulation=="demande_annulation") { ?>                                   
                           <a data-toggle="tooltip" data-placement="top" title="Annulation" class="icon" class="icon" href="<?php echo base_url(); ?>facture/facture_validation_annulation/<?php echo output($facturelists['t_id']); ?>/a_annuler">
                           <i class="fa fa-ban text-green"></i>
                           </a>                                    
                   <?php } ?>   

								   
<?php }  // fin permission?> 
								   
							   
                      <?php // }  else {?>
                             <!--<a class="icon" href="<?php //echo base_url(); ?>facture/facture_proforma_generation_pdf/<?php //echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a> -->                                    
                   
                    <?php //}  // fin controle?>                                   
                                   
                <?php //if($facturelists['t_annulation']=="annulee") { ?>  
                        
                          </td>
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
						  <th><?php
							  
							  if(isset($montant_total_tva)){$montant_total_tva = number_format($montant_total_tva, 0, ',', ' ');echo output($montant_total_tva);} ?><?//= $montant_total_tva; ?></th>
                          <th><?//= $montant_total_facture; ?><?php if(isset($montant_total_facture)){$montant_total_facture = number_format($montant_total_facture, 0, ',', ' ');echo output($montant_total_facture);} ?></th>
                          <th></th>
						  <th></th>
						  <th></th>
                        </tr>
                      </thead>	

	<!--END ADD TOTAL-->
	
                    </table>					  
					  <!--END LIST-->
                  </div>
                  
                  
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
			
                   <!-- <table id="facturetbl" class="table card-table table-vcenter text-nowrap">-->
                        
                    <!--<table id="facturetbl" class="table table-bordered table-vcenter text-nowrap table-striped"> -->                       
                     
                   
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->


<!-- Debut conteneur-->


<!-- Fin conteneur-->



