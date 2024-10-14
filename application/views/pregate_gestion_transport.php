    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">GESTION TRANSPORT <?php //echo (isset($pregatedetails))?'Modifier Pregate':'GESTION TRANSPORT ' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pregatedetails))?'Modifier Pregate':'GESTION TRANSPORT ' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
		
		
<!--BEGIN TAB-->		
		
<div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <!--<li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">AJOUTER PREGATE</a>
              </li>-->
              <!--<li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-instance-tab" data-toggle="pill" href="#custom-tabs-one-instance" role="tab" aria-controls="custom-tabs-one-instance" aria-selected="false">INSTANCE</a>
              </li>-->
			<li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">GESTION TRANSPORT </a>
              </li>				
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				  
				  
       	     <form method="post" id="" class="card" action="<?php echo base_url();?>pregate/pregate_gestion_transport">
	<div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Date Début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" id="incomeexpense_from" name="incomeexpense_from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Date Fin</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" id="incomeexpense_to" name="incomeexpense_to" placeholder="Date Fin">
                     </div>
                  </div>
               </div>
               
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Generer le rapport</button>
               </div>
            </div>
         </div>	
				 
      				 
    </form>	
				  
<!--BEGIN LIST-->                      
		
<div class="card">
        <div class="card-body p-0">

<div class="table-responsive">
	
<br/>	
<br/>	
          <?php if(!empty($pregate)){ ?>
                    <table id="pregatetbl" class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Compagnie</th>
                          <th>Facture</th>
                          <th>Réference</th>
                          <th>Date</th>
                          <th>Montant HT</th>
                          <th>Montant AGS</th>
                          <th>Frais Impression</th>
                          <th>Montant TTC</th>
                          <th>Ristourne</th>
                          <th>Type</th>
                          <th>Transitaire</th>
                          <th>Client</th>
                          <th>Urbaine</th>
                          <th>Tracteur</th>
                          <th>Date Liv</th>
                          <th>Heure Liv</th>
                          <th>Date Retour</th>
                          <th>Heure Retour</th>
                          <th>Lieu Restitution</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($pregate as $pregate_instancelists){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($pregate_instancelists['cc_name']); ?></td>                           
							<td> <?php echo output($pregate_instancelists['t_num_facture']); ?></td>
                           <td> <?php echo output($pregate_instancelists['t_reference']); ?></td>

                           <td><?php echo output($pregate_instancelists['t_date_facture']); ?></td>
                          <td><?php echo output($pregate_instancelists['t_trip_amount_ht']);?></td>
                        <td><?php echo output($pregate_instancelists['t_trip_amount']); ?></td>
                          <td>  <?php echo output($pregate_instancelists['t_montant_ags']); ?> </td>
                          <td>  <?php echo output($pregate_instancelists['t_impression']); ?> </td>
                          <td>  <?php echo output($pregate_instancelists['t_ristourne_amount']); ?> </td>							
                          <td><?php 
							   
							    $type=''; 
 if($pregate_instancelists['co_type_conteneur']!='') {
                          if($pregate_instancelists['co_type_conteneur']=='20_pieds') 
                          { 
                            $type='20 pieds'; 
                        } else { 
                           
                              $type='40 pieds'; 
                          }} 
						  echo $type; ?>  </td>							
                          <td>  <?php echo output($pregate_instancelists['tra_name']); ?> </td>
                          <td>  <?php echo output($pregate_instancelists['c_name']); ?> </td>                          
							<td>  <?php echo output($pregate_instancelists['z_destination']); ?> </td>                         
							<td>  <?php echo output($pregate_instancelists['v_registration_no']); ?> </td>                         
							<td>  <?php echo output($pregate_instancelists['ei_date']); ?> </td>
							<td>  <?php echo output($pregate_instancelists['ei_heure']); ?> </td>
							<td>  <?php echo output($pregate_instancelists['ei_date']); ?> </td>
 							<td>  <?php echo output($pregate_instancelists['ei_date']); ?> </td>							
							<td>  <?php echo output($pregate_instancelists['clr_name']); ?> </td>							
                      </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucune gestion de transport trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>			
			
        </div>
      </div>		
<!--END LIST-->		

				  
				  
              </div>
				
<!-- BEGIN INSTANCE-->				
				
<!-- END INSTANCE-->				
				
              

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>		
		
<!--END TAB-->		
		
		
      
    </section>
    <!-- /.content -->



