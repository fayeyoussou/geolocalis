    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($eir_pleindetails))?'Modifier Eir  / Vide':'Ajouter Eir' ?> <?//= $numeroeir_plein; ?>
				
<!--				<?php //if((isset($eir_pleindetails))){ ?> N° <?php //echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_numero']:'' ?>  <?php //}else{?> N° M<?//= $numeroeir_plein; }?> -->
				
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
			 
			  <li class="breadcrumb-item"><a href="<?= base_url(); ?>">EIR </a></li>				
              <li class="breadcrumb-item active"><?php echo (isset($eir_pleindetails))?'Modifier Eir':'Ajouter Eir' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">

<!-- BEGIN TAB-->	
<div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">EIR PLEINS</a>
              </li>
				
<li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-home-vide-tab" data-toggle="pill" href="#custom-tabs-one-home-vide" role="tab" aria-controls="custom-tabs-one-home-vide" aria-selected="true">EIR VIDES</a>
              </li>				
				
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">JOURNAL</a>
              </li>
<!--              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
              </li>-->
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

				  
<!--BEGIN EIR PLEINS-->				  
<form method="post" id="eir_plein" class="card" action="<?php echo base_url();?>eir/<?php echo (isset($eir_pleindetails))?'updateeir_plein':'inserteir_plein'; ?>">


	
                  <div class="row">
                   <input type="hidden" name="ei_id" id="ei_id" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_id']:'' ?>" >
					<?php //exit;?>  
<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="ei_pregate_id" id="mi_trip_id" class="form-control selectized">
    <option value="">Selectionner Pregate</option>
	   
<?php if(isset($eir_pleindetails)) { foreach($pregate as $row) { ?>
                          <option <?= (isset($eir_pleindetails[0]['ei_pregate_id']) && $eir_pleindetails[0]['ei_pregate_id'] == $row['pr_trip_id'])?'selected':''?> value="<?= $row['pr_trip_id'] ?>"><?= $row['pr_numero'] ?></option> 
                          <?php } } else {
	
 /* foreach($pregate as $row)
    { echo "dd";
     echo '<option  value="'.$row['pr_trip_id'].'">'.$row['pr_numero'].'</option>';
    }	
	}*/     foreach($pregate as $row)
    {
     echo '<option value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }
} ?>
   </select>				  
<!-- END SELECT-->					  
					  
                  </div>
               </div>
	
	<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
                     <select id="mi_conteneur_id" name="ei_conteneur_id" class="form-control input-lg">
                        <option value="">Sélectionner le Conteneur</option>
<?php if(isset($eir_pleindetails)) { foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option  
								<?= in_array($conteneurlists['co_id'], explode(',', $eir_pleindetails[0]['ei_conteneur_id'])) ? 'selected' : ''; ?>
								value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } } ?>
                     </select>
                  </div>
               </div>
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date EIR PLEINS<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="reservationdatetime"  name="ei_date" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_date']:'' ?>" placeholder="Date EIR PLEINS">
                      </div>
                    </div>
					  
				<div class="col-sm-6 col-md-2">
                  <div class="form-group">
                     <label class="form-label">Heure <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_heure']:'' ?>" name="ei_heure" id="ei_heure" class="form-control" placeholder="Heure" required="true">
                  </div>
               </div>					  
					  
            					  
                       
   <!-- DEBUT eir_plein-->
       <?php //if((isset($eir_pleindetails))){ ?> 

					  <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro Transaction <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_numero_transaction']:'' ?>" name="ei_numero_transaction" id="ei_numero_transaction" class="form-control" placeholder="Numéro Transaction" required="true">
                  </div>
               </div>
	
<div class="col-12 col-sm-12" ></div>		
<div class="col-12 col-sm-12" id="mi_id"  name="mi_id">		
 </div>	
                      
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ei_description" value="<?php echo (isset($eir_pleindetails)) ? $eir_pleindetails[0]['ei_description']:'' ?>" name="ei_description" placeholder="Description">
                      </div>
                    </div>
                    
                    
                   
      
                </div>
<?php if((isset($eir_pleindetails))) { ?>
	<input type="hidden" id="ei_modified_date" name="ei_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
	<?php }else { ?>			  
                 <input type="hidden" id="ei_created_date" name="ei_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
<!--                  <input type="hidden" id="ei_numero" name="ei_numero" value="M<?//= $numeroeir_plein; ?>">-->
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="ei_trip_id" name="ei_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="ei_conteneur_id" name="ei_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($eir_pleindetails))?'Modifier Eir Plein':'Ajouter Eir Plein' ?></button>
      </div>
    </form>				  
<!--END EIR PLEINS-->				  
<!--BEGIN LIST-->
<div class="container-fluid">
       	     
<!--BEGIN LIST-->		  
<section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          
<br/>
<br/>
         <div class="table-responsive">
          <?php //if(!empty($eir_plein)){ ?>
                   <!-- <table id="eir_pleintbl" class="table card-table">-->
					<table id="eir_pleintbl" class="datatableexport table card-table table-vcenter">	
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Heure</th>
                        <!--  <th>N° eir vide</th>-->
                          <th>Facture</th>
                          <th>Pregate</th>
                          <th>Mission</th>
                          <th>Conteneur</th>
                           <th>N° transaction</th>
                           <th>Création</th>
                        <!-- <th>N° transaction</th>-->
                          <?php //if(userpereir_plein('lr_ei_edit')) { ?>
                          <th>Action</th>
                          <?php //} ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($eir_plein as $eir_pleins){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($eir_pleins['ei_date']);  ?></td>
                           <td> <?php echo output($eir_pleins['ei_heure']);  ?></td>
                         <!--  <td> <?php //echo output($eir_pleins['ei_numero_transaction']); ?></td>-->
                           <td> <?php echo $eir_pleins['facture']->t_num_facture; ?></td>
                           <td> <?php echo  $eir_pleins['pregate']->pr_numero;?></td>
                           <td> <?php echo output($eir_pleins['mission']->mi_numero);?></td>
                           <td> <?= (isset($eir_pleins['conteneur']->co_numero_conteneur))?$eir_pleins['conteneur']->co_numero_conteneur:'<span class="badge badge-danger">Non renseigné</span>'; ?> </td>							
							<td> <?php echo output($eir_pleins['ei_numero_transaction']);?></td>
							<td> <?php echo output($eir_pleins['ei_created_date']);?></td>
							

                        <!--<td>  <span class="badge <?php //echo ($eir_pleins['ei_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php //echo ($eir_pleins['ei_isactive']=='1') ? 'Plein' : 'Vide'; ?></span>  </td>-->
                          <?php //if(userpereir_plein('lr_ei_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>eir/editeir_plein/<?php echo output($eir_pleins['ei_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a></td>
                        <?php //} ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
/*                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun EIR PLEIN trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }*/
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>  
<!--END LIST-->		  
		  
		  
             </div>				  
<!--END LIST-->				  
              </div>
<!--END EIR PLEINS-->
				
				
<!--BEGIN EIR VIDE-->
<div class="tab-pane fade show" id="custom-tabs-one-home-vide" role="tabpanel" aria-labelledby="custom-tabs-one-home-vide-tab">

				  
<!--BEGIN EIR PLEINS-->				  
<form method="post" id="eir_vide" class="card" action="<?php echo base_url();?>eir/<?php echo (isset($eir_videdetails))?'updateeir_vide':'inserteir_vide'; ?>">


	
                  <div class="row">
                   <input type="hidden" name="ei_id" id="ei_id" value="<?php echo (isset($eir_videdetails)) ? $eir_videdetails[0]['ei_id']:'' ?>" >
					  
<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Pregate<span class="form-required">*</span></label>
				  
<!-- BEGIN SELECT-->
					  
   <select name="ei_pregate_id" id="ei_trip_id" class="form-control selectized">
    <option value="">Selectionner Pregate</option>
    <?php
 /*   foreach($pregate as $row)
    {
     echo '<option value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }*/
    ?>
<?php if(isset($eir_videdetails)) { foreach($pregate as $row) { ?>
                          <option <?= (isset($eir_videdetails[0]['ei_pregate_id']) && $eir_videdetails[0]['ei_pregate_id'] == $row['pr_trip_id'])?'selected':''?> value="<?= $row['pr_trip_id'] ?>"><?= $row['pr_numero'] ?></option> 
                          <?php } } else {
	
 /* foreach($pregate as $row)
    { echo "dd";
     echo '<option  value="'.$row['pr_trip_id'].'">'.$row['pr_numero'].'</option>';
    }	
	}*/     foreach($pregate as $row)
    {
     echo '<option value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }
} ?>	   
   </select>				  
<!-- END SELECT-->					  
					  
                  </div>
               </div>
	
	<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Conteneur<span class="form-required">*</span></label>
                     <select id="ei_conteneur_id" name="ei_conteneur_id" class="form-control input-lg">
                        <option value="">Sélectionner le Conteneur</option>
<?php if(isset($eir_videdetails)) { foreach ($conteneurlist as $key => $conteneurlists) { ?>
                        <option  
								<?= in_array($conteneurlists['co_id'], explode(',', $eir_videdetails[0]['ei_conteneur_id'])) ? 'selected' : ''; ?>
								value="<?php echo output($conteneurlists['co_id']) ?>"><?php echo output($conteneurlists['co_numero_conteneur']); ?></option>
                        <?php  } } ?>
                     </select>
                  </div>
               </div>	
					  
		<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label"> Lieu de restitution<span class="form-required">*</span></label>
                     <select id="ei_lieu_restitution_id" name="ei_lieu_restitution_id" class="form-control input-lg">
                        <option value="">Sélectionner le Lieu de restitution</option>

                     </select>
                  </div>
               </div>					  
					  
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date EIR VIDES<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="reservationdatetime"  name="ei_date" value="<?php echo (isset($eir_videdetails)) ? $eir_videdetails[0]['ei_date']:'' ?>" placeholder="Date EIR VIDES">

                      </div>
                    </div>
					  
				<div class="col-sm-6 col-md-2">
                  <div class="form-group">
                     <label class="form-label">Heure <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_videdetails)) ? $eir_videdetails[0]['ei_heure']:'' ?>" name="ei_heure" id="ei_heure" class="form-control" placeholder="Heure" required="true">
                  </div>
               </div>					  
					  
            					  
                       
   <!-- DEBUT eir_vide-->
       <?php //if((isset($eir_videdetails))){ ?> 

					  <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Numéro Transaction <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($eir_videdetails)) ? $eir_videdetails[0]['ei_numero_transaction']:'' ?>" name="ei_numero_transaction" id="ei_numero_transaction" class="form-control" placeholder="Numéro Transaction" required="true">
                  </div>
               </div>

					  
<!--			<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Mission<span class="form-required">*</span></label>
                     <select id="ei_mission_id" class="form-control selectized" name="ei_mission_id">
                       <option value="">Selectionner mission</option>
                        <?php  //foreach ($missionlist as $key => $missionlists) { ?>
                        <option <?php //if((isset($eir_videdetails)) && $eir_videdetails[0]['ei_mission_id'] == $missionlists['mi_id']){ echo 'selected';} ?> value="<?php //echo output($missionlists['mi_id']) ?>"><?php //echo output($missionlists['mi_numero']); ?></option>
                        <?php  //} ?>
                     </select>
                  </div>
               </div>-->	
					  
<!--<div class="col-sm-6 col-md-3">
                  <div class="row">
                     <label class="form-label"> Mission<span class="form-required">*</span></label>
                     <select id="mi_lieu_restitution_id" name="ei_mission_id" class="form-control input-lg">
                        <option value="">Sélectionner la mission</option>

                     </select>
                  </div>
               </div>-->					  
					  
<!-- BEGIN SELECT-->
					  
<!--   <select name="mi_trip_id" id="mi_trip_id" class="form-control input-lg">
    <option value="">Selectionner Pregate</option>
    <?php
/*    foreach($pregate as $row)
    {
     echo '<option value="'.$row->pr_trip_id.'">'.$row->pr_numero.'</option>';
    }*/
    ?>
   </select>-->
					  
<!--   <select name="ei_mission_id" id="ei_mission_id" class="form-control input-lg">
    <option value="">Selectionner Mission</option>
    <?php
/*    foreach($mission as $row)
    {
     echo '<option value="'.$row->mi_id.'">'.$row->mi_numero.'</option>';
    }*/
    ?>
   </select>-->					  
<!-- END SELECT-->		
	
<div class="col-12 col-sm-12" ></div>		
<div class="col-12 col-sm-12" id="mi_id"  name="mi_id">		
 </div>	
	 
                     <?php //if(isset($customerdetails[0]['c_isactive'])) { ?>
<!--                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="ei_isactive" class="form-label">Statut</label>
                        <select id="ei_isactive" name="ei_isactive" class="form-control selectized"required="">
                          <option value="">Selectionner statut</option> 
                          <option <?php //echo (isset($eir_videdetails) && $eir_videdetails[0]['ei_isactive']==1) ? 'selected':'' ?> value="1">Vide</option> 
                          <option <?php //echo (isset($eir_videdetails) && $eir_videdetails[0]['ei_isactive']==0) ? 'selected':'' ?> value="0">Vide</option> 
                        </select>
                      </div>
                    </div>-->
                    <?php //} ?>

					  
                     <?php //if(isset($eir_videdetails[0]['ei_validation'])) { ?>
<!--                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                          <label for="ei_validation" class="form-label">Validation</label>
                        <select id="ei_validation" name="ei_validation" class="form-control selectized"required="">
                          <option value="">Selectionner la Validation</option> 
                          <option <?php //echo (isset($eir_videdetails) && $eir_videdetails[0]['ei_validation']==1) ? 'selected':'' ?> value="1">Validé</option> 
                          <option <?php //echo (isset($eir_videdetails) && $eir_videdetails[0]['ei_validation']==0) ? 'selected':'' ?> value="0">Non Validé</option> 
                        </select>
                      </div>
                   
                    </div>-->	
					   <?php //} ?>
                       
                      
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ei_description" value="<?php echo (isset($eir_videdetails)) ? $eir_videdetails[0]['ei_description']:'' ?>" name="ei_description" placeholder="Description">
                      </div>
                    </div>
                    
                    
                   
      
                </div>
<?php if((isset($eir_videdetails))) { ?>
	<input type="hidden" id="ei_modified_date" name="ei_modified_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
	<?php }else { ?>			  
                 <input type="hidden" id="ei_created_date" name="ei_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
<!--                  <input type="hidden" id="ei_numero" name="ei_numero" value="M<?//= $numeroeir_vide; ?>">-->
 <?php } ?>
      <div class="modal-footer">
		  
<!--                 <input type="hidden" id="ei_trip_id" name="ei_trip_id" value="<?//= $this->uri->segment(3); ?>">
                  <input type="hidden" id="ei_conteneur_id" name="ei_conteneur_id" value="<?//= $this->uri->segment(4); ?>">	-->	  

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($eir_videdetails))?'Modifier Eir Vide':'Ajouter Eir Vide' ?></button>
      </div>
    </form>				  
<!--END EIR PLEINS-->	
	
<!--BEGIN LIST EIR VIDE-->
<div class="container-fluid">
       	     
<!--BEGIN LIST-->		  
<section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          
<br/>
<br/>
         <div class="table-responsive">
          <?php //if(!empty($eir_vide)){ ?>
                    <!--<table id="eir_videtbl" class="table card-table">-->
					<table id="eir_videtbl" class="datatableexport table card-table table-vcenter">	
	
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Heure</th>
                          <th>N° eir vide</th>
                          <th>Facture</th>
                          <th>Pregate</th>
                          <th>Mission</th>
                          <th>Conteneur</th>
                          <th>N° transaction</th>
                          <th>Création</th>
                          <?php //if(userpereir_vide('lr_ei_edit')) { ?>
                          <th>Action</th>
                          <th></th>
                          <?php //} ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($eir_vide as $eir_vides){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($eir_vides['ei_date']);  ?></td>
                           <td> <?php echo output($eir_vides['ei_heure']);  ?></td>
                         <!--  <td> <?php //echo output($eir_vides['ei_numero_transaction']); ?></td>-->
                           <td> <?php echo $eir_vides['facture']->t_num_facture; ?></td>
                           <td> <?php echo  $eir_vides['pregate']->pr_numero;?></td>
                           <td> <?php echo output($eir_vides['mission']->mi_numero);?></td>
                           <td> <?= (isset($eir_vides['conteneur']->co_numero_conteneur))?$eir_vides['conteneur']->co_numero_conteneur:'<span class="badge badge-danger">Non renseigné</span>'; ?> </td>							
							<td> <?php echo output($eir_vides['ei_numero_transaction']);?></td>
							<td> <?php echo output($eir_vides['ei_created_date']);?></td>
							

                        <!--<td>  <span class="badge <?php //echo ($eir_vides['ei_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php //echo ($eir_vides['ei_isactive']=='1') ? 'vide' : 'Vide'; ?></span>  </td>-->
                          <?php //if(userpereir_vide('lr_ei_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>eir/editeir_vide/<?php echo output($eir_vides['ei_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a></td>
                        <?php //} ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
/*                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun EIR VIDE trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }*/
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>  
<!--END LIST-->		  
		  
		  
             </div>	
<!--END LIST EIR VIDE-->	
				  
              </div>				
<!--END EIR VIDE-->				
				
				
				
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

<form method="post" id="" class="card" action="<?php echo base_url();?>eir/addeir_plein">
	<div class="card-body">
            <div class="row">
               <div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Date Début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" id="incomeexpense_from" name="incomeexpense_from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
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
				
				</div>

            </div>
          </div>
          <!-- /.card -->
<!-- 27 08 2022

</div>
      </div>	-->	
<!--END TAB-->		
		
      <!--LIST-->
    </section>
    <!-- /.content -->


<script>
	
$(document).ready(function(){
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_conteneur",
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

/* BEGIN LIEU RESTITUTION*/	
 $('#mi_trip_id').change(function(){
  var mi_trip_id = $('#mi_trip_id').val();
  if(mi_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_lieu_restitution",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_trip_id:mi_trip_id},
    success:function(data)
    {
     $('#mi_lieu_restitution_id').html(data);
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
/* END LIEU RESTITUTION*/	
	
	
/*BEGIN EIR VIDE*/
	
 $('#ei_trip_id').change(function(){
  var ei_trip_id = $('#ei_trip_id').val();
  if(ei_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>eir/fetch_conteneur_vide",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{ei_trip_id:ei_trip_id},
    success:function(data)
    {
     $('#ei_conteneur_id').html(data);
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

/* BEGIN LIEU RESTITUTION*/	
 $('#ei_trip_id').change(function(){
  var ei_trip_id = $('#ei_trip_id').val();
  if(ei_trip_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>eir/fetch_lieu_restitution_vide",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{ei_trip_id:ei_trip_id},
    success:function(data)
    {
     $('#ei_lieu_restitution_id').html(data);
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
/* END LIEU RESTITUTION*/		
/*END EIR VIDE*/	
	
	
/*BEGIN AJAX VEHICULE*/	
/*$('#mi_vehicle_id').change(function(){
  var mi_vehicle_id = $('#mi_vehicle_id').val();
  if(mi_vehicle_id != '')
  {
   $.ajax({
     url:"<?php //echo base_url(); ?>mission/fetch_bon_carburant",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_vehicle_id:mi_vehicle_id},
    success:function(data)
    {
     $('#mi_bon_carburant_id').html(data);
//     $('#city').html('<option value="">Select City-BAS</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State else</option>');
 //  $('#city').html('<option value="">Select City else</option>');
  }
 });*/	
/*END AJAX VEHICULE*/	
	
/*BEGIN AJAX VEHICULE SUR QUANTITE*/	
$('#mi_bon_carburant_id').change(function(){
  var mi_bon_carburant_id = $('#mi_bon_carburant_id').val();
  if(mi_bon_carburant_id != '')
  {
   $.ajax({
     url:"<?php echo base_url(); ?>mission/fetch_bon_carburant_quantite",
//   url:"<?php //echo base_url(); ?>mission/fetch_state",
    method:"POST",
    data:{mi_bon_carburant_id:mi_bon_carburant_id},
    success:function(data)
    {
     $('#mi_quantite_carburant').html(data);
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
/*END AJAX VEHICULE SUR QUANTITE*/	

 
});	
</script>

	
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

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

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
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


