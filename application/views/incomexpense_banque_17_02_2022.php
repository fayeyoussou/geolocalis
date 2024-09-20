<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-8">
            <h1 class="m-0 text-dark">Rapport du journal de la banque
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Rapport</a></li>
               <li class="breadcrumb-item active">Journal</li>
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
       <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php echo base_url();?>incomexpense/journal_facture">
<!--     <form method="post" id="incomeexpense_report" class="card basicvalidation" action="<?php //echo base_url();?>reports/incomeexpense">-->
         <div class="card-body">
            <div class="row">

				<div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Factures</label>
                     <div class="col-sm-6 form-group">
<select id="ie_ieb_id" class="form-control selectized"    style="width: 100%;"  name="ie_ieb_id[]" >
                        <option value="">Sélectionner les factures </option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_ieb_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"><?php echo output($facturelists['t_id']) ?> - <?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
                     </div>
                  </div>
               </div>

				
               <div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_from" class="col-sm-5 col-form-label">Date début</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_from']) ? $_POST['incomeexpense_from'] : ''; ?>" id="incomeexpense_from" name="incomeexpense_from" placeholder="Date début">
                     </div>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Date fin</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['incomeexpense_to']) ? $_POST['incomeexpense_to'] : ''; ?>" id="incomeexpense_to" name="incomeexpense_to" placeholder="Date fin">
                     </div>
                  </div>
               </div>
                
             <!--<div class="col-md-3">
                  <div class="form-group row">
                     <label for="incomeexpense_to" class="col-sm-5 col-form-label">Objet</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" class="form-control form-control-sm" value="<?php //echo isset($_POST['ie_objet']) ? $_POST['ie_objet'] : ''; ?>" id="ie_objet" name="ie_objet" placeholder="Date To">
                     </div>
                  </div>
               </div>-->               
                
               <div class="col-md-6">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-4 col-form-label">Banque émettrice</label>
                     <div class="col-sm-7 form-group">
                        <select id="ie_banque_emettrice_id"  class="form-control selectized"  name="ie_banque_emettrice_id" >
                        <option value="<?php echo isset($_POST['ie_banque_emettrice_id']) ? $_POST['ie_banque_emettrice_id'] : ''; ?>">Banque émettrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_emettrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                     </div>
                  </div>
               </div>
				
				<div class="col-md-6">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-4 col-form-label">Banque receptrice</label>
                     <div class="col-sm-7 form-group">
                        <select id="ie_banque_receptrice_id"  class="form-control selectized"  name="ie_banque_receptrice_id" >
                        <option value="<?php echo isset($_POST['ie_banque_receptrice_id']) ? $_POST['ie_banque_receptrice_id'] : ''; ?>">Banque receptrice</option>
                        <?php  foreach ($banquelist as $key => $banquelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_banque_receptrice_id'] == $banquelists['ieb_id']){ echo 'selected';} ?> value="<?php echo output($banquelists['ieb_id']) ?>"><?php echo output($banquelists['ieb_name']); ?> - <?php echo output($banquelists['ieb_sigle']); ?></option>
                        <?php  } ?>
                     </select>
                     </div>
                  </div>
               </div>							
				
               <input type="hidden" id="incomeexpensereport" name="incomeexpensereport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Générer Rapport</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php if(!empty($incomexpense)){ 
                $income = $expense = 0;
                foreach ($incomexpense as $item) {
                    if($item['ie_type']=='income') {
                      $income += $item['ie_amount'];
                    }
                     if($item['ie_type']=='expense') {
                      $expense += $item['ie_amount'];
                    }
                }
                $total = $income - $expense;
            ?>
          <div class="row">
          <div class="col-12 col-sm-6 col-md-2">
     
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total CHEQUE</span>
                <span class="info-box-number"><?= $income; ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-thumbs-down"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total ESPECE</span>
                <span class="info-box-number"><?= $expense; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-calculator"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?= ($total>=0)?'SOLDE':'Dépassement'; ?></span>
                <span class="info-box-number"><?= $total; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
                 <table  class="datatableexport table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
<!---->                   <th>Numéro</th>
                          <th>Date</th>
                          <th>Numéro du chéque</th>
                          <th>Montant</th>
                          <th>Type</th>
                          <th>Actions</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
<!---->                           <td> <?php //echo output($incomexpenses['vech_name']->v_name).'_'.output($incomexpenses['vech_name']->v_registration_no); ?><?php echo output($incomexpenses['ie_numero_enregistrement']); ?></td>
                        <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                        <td><?php //echo output($incomexpenses['vech_name']->v_name).'_'.output($incomexpenses['vech_name']->v_registration_no); ?><?php echo output($incomexpenses['ie_numero']); ?></td>
                         <td><?php echo output($incomexpenses['ie_amount']); //if($incomexpenses['ie_type']=='income') echo output($incomexpenses['ie_amount']); ?></td>
                         <td> <span class="badge <?php echo ($incomexpenses['ie_type']=='income') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($incomexpenses['ie_type']=='income') ? 'income' : 'expense'; ?></span><?php //if($incomexpenses['ie_type']=='expense') echo output($incomexpenses['ie_amount']); ?></td>
                          <td>   </td>
                        <td><?php //echo output($incomexpenses['ie_description']); ?></td>    </tr>
                        <?php } ?>
                      </tbody>
                     
                      <thead>
                        <tr>
                          <th class="w-1"></th>
<!--                          <th>Véhicule</th>
-->                          <th></th>
                          <th>Total</th>
                          <th><?= $income; ?></th>
                          <th><?= $expense; ?></th>
                          <th></th>
                        </tr>
                      </thead>                     
                     
                    </table>
                   <?php } ?>
        </div>
      </div>
   </div>
</section>
