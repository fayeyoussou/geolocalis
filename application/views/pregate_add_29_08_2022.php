    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestion des Pregates : <?php echo (isset($pregatedetails))?'Modifier Pregate':'Ajouter Pregate' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pregatedetails))?'Modifier Pregate':'Ajouter Pregate' ?></li>
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
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">AJOUTER PREGATE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
              </li>
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				  
				  
       	     <form method="post" id="" class="card" action="<?php echo base_url();?>pregate/<?php echo (isset($pregatedetails))?'updatepregate':'insertpregate'; ?>">
	<div class="row">
<!---->                   <input type="hidden" name="pr_id" id="pr_id" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_id']:'' ?>" >

                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_numero']:'' ?>" name="pr_numero" class="form-control" placeholder="Numéro">
                  </div>
               </div>                        
                      
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro BL<span class="form-required">*</span></label>
                     <select id="pr_trip_id"  class="form-control selectized"  name="pr_trip_id" >
                        <option value="">Sélectionner le BL</option>
                        <?php $count=1;  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($pregatedetails)) && $pregatedetails[0]['pr_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php //echo $count; ?>  <?php //echo output($facturelists['t_id']); ?> <?php echo output($facturelists['t_reference']); ?></option>
                        <?php  $count++;} ?>
                     </select>
                  </div>
               </div>                      
                      


                <!--DEBUT Date mi_eir_plein-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date reception <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_date_reception']:'' ?>" name="pr_date_reception" class="form-control datepicker" placeholder="Date reception">
                  </div>
               </div>                
                <!-- FIN Date line--> 

                <!--DEBUT Date line-->                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date line <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_date_line']:'' ?>" name="pr_date_line" class="form-control datepicker" placeholder="Date line">
                  </div>
               </div>                
                <!-- FIN Date line-->                 

              
					  
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($pregatedetails)) ? $pregatedetails[0]['pr_nombre_conteneur']:'' ?>" name="pr_nombre_conteneur" class="form-control" placeholder="Nombre de conteneurs">
                  </div>
               </div> 
					  
                     <?php //if(isset($customerdetails[0]['pr_statut'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="pr_statut" class="form-label">Statut</label>
                        <select id="pr_statut" name="pr_statut" class="form-control selectized"required="">
                          <option value="">Selectionner statut</option> 
                          <option <?php echo (isset($pregatedetails) && $pregatedetails[0]['pr_statut']==1) ? 'selected':'' ?> value="1">Plein</option> 
                          <option <?php echo (isset($pregatedetails) && $pregatedetails[0]['pr_statut']==0) ? 'selected':'' ?> value="0">Vide</option> 
                        </select>
                      </div>
                    </div>
					  <?php //} ?>
					  
   <!-- FIN MISSION-->
                  <?php //} ?> 
       
                </div>	
				 
      <div class="modal-footer">

      <button type="submit" class="btn btn-primary"> <?php echo (isset($pregatedetails))?'Modifier pregate':'Ajouter pregate' ?></button>
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
                          <th>Facture</th>
                          <th>Réference</th>
                          <th>Date reception</th>
                          <th>Date line</th>
                          <th>Type</th>
                          <?php if(userpermission('lr_pr_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($pregate as $pregates){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($pregates['pr_trip_id']); ?><?php //echo output($pregates['vech_name']->v_name).'_'.output($pregates['vech_name']->v_registration_no); ?></td>
                           <td> <?php echo output($pregates['pr_numero']); ?></td>

                           <td><?php echo output($pregates['pr_date_reception']); ?></td>
                         <td><?php echo output($pregates['pr_date_line']); ?></td>
                          <td>  <span class="badge <?php echo ($pregates['pr_statut']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($pregates['pr_statut']=='1') ? 'Fait' : 'Line'; ?></span>  </td>
                          <?php if(userpermission('lr_pr_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>pregate/editpregate/<?php echo output($pregates['pr_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
							<?php  if(userpermission('lr_mi_add')) { ?>	  
								<a class="icon" href="<?php echo base_url(); ?>conteneur/pregate/<?php echo output($pregates['pr_trip_id']); ?>">
								  <i class="fa fa-eye"></i>
								</a>
							<?php } ?>
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun revenu ou dépense trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>			
			
        </div>
      </div>		
<!--END LIST-->		

				  
				  
              </div>
				
				
				
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

<!-- BEGIN ADD-->				  
<section class="content">
   <div class="container-fluid">
       <form method="post" id="addpregate_report" class="card basicvalidation" action="<?php echo base_url();?>pregate/addpregate">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">


				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début reception / line<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="from" name="from" value="" placeholder="Date début reception / line" required="true">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin reception / line<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="to" name="to" value="" placeholder="Date fin reception / line" required="true">

                      </div>
                    </div>				
	
					
			
                      <?php //if(isset($customerdetails[0]['pr_statut'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="pr_statut" class="form-label">Statut</label>
                        <select id="pr_statut" name="pr_statut" class="form-control selectized">
                          <option value="all">Selectionner statut</option> 
                          <option value="1">Plein</option> 
                          <option value="0">Vide</option> 
                        </select>
                      </div>
                    </div>
					  <?php //} ?>                             

                      <?php //if(isset($customerdetails[0]['pr_statut'])) { ?>
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="type" class="form-label">Recherche</label>
                        <select id="type" name="type" class="form-control selectized" required="true">
                          <option value="">Selectionner votre recherche</option> 
                          <option value="line">Date line</option> 
                          <option value="reception">Date de reception</option> 
                        </select>
                      </div>
                    </div>
					  <?php //} ?> 
									
				
               <input type="hidden" id="pregate_add_report" name="pregate_add_report" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Journal</button>
      </div>			 
         </div>
   </div>
   </form>
    
   </div>
</section>				  
<!-- END ADD-->				  
				  
				  
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>		
		
<!--END TAB-->		
		
		
      
    </section>
    <!-- /.content -->



