    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des factures 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des factures</li>
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">FACTURES </a>
                  </li>
                  

                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

					  <!--BEGIN LIST-->
	<!-- BEGIN FORMS-->
<form method="post" id="incomeexpense_report" class="card basicvalidation" action="">
<!--
<?php //echo base_url();?>incomexpense/journalreglement_facture

<form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">
				

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date début<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="from" name="from" value="<?php echo isset($_POST['from']) ? $_POST['from'] : ''; ?>" placeholder="Date début">

                      </div>
                    </div>

				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date fin<span class="form-required"></span></label>
                         <input type="text" class="form-control datepicker" id="to" name="to" value="<?php echo isset($_POST['to']) ? $_POST['to'] : ''; ?>" placeholder="Date fin">

                      </div>
                    </div>	
				
				
				<div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="statut" class="form-label">Statut</label>
                        <select id="statut" name="statut" class="form-control selectized" required="">
                          <option value="All">Selectionner le Statut</option> 
                          <?php if(!empty($statut)) { foreach($statut as $v_groupdata) { ?>
                          <option <?php echo (isset($_POST['statut']) && ($_POST['statut'] == $v_groupdata['st_id'])) ? 'selected':'' ?> value="<?= $v_groupdata['st_id'] ?>"><?= $v_groupdata['st_name'] ?></option> 
                          <?php } } ?>
                        </select>
                      </div>
                    </div>				
				

				
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1" align="middle">
				
            </div>
			 
<div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> Générer Rapport</button>
      </div>			 
         </div>
   </div>
   </form>					  
	<!-- END FORMS-->					  
					  
					  
<table class="datatableexport table card-table table-vcenter">                       
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Désignation</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                          <th>N° facture</th>
                          <th>Modéle facture</th>
                          <th>Statut</th>
                          <th>Date</th>
                          <th>Création</th>
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
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
						<td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>							
                           <td> <?php echo ucfirst($facturelists['t_num_facture']); ?> </td>                         
							<td> <?php echo ucfirst($facturelists['t_modele_facture']); ?></td>
                           
							


                           <td> <?php if(isset($facturelists['t_statut_details']->st_name)){echo output($facturelists['t_statut_details']->st_name);} ?></td>							
							
                           <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>
                           <td><?php echo ucfirst($facturelists['t_created_date']); ?></td>
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
						  <th><?php /*if($montant_total_tva){$montant_total_tva = number_format($montant_total_tva, 0, ',', ' ');echo output($montant_total_tva);}*/ ?><?//= $montant_total_tva; ?></th>
                          <th><?//= $montant_total_facture; ?><?php /*if($montant_total_facture){$montant_total_facture = number_format($montant_total_facture, 0, ',', ' ');echo output($montant_total_facture);}*/ ?></th>
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



