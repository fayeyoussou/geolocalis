    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Edit Income/Expense':'Pièces de rechange' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Customer</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails))?'Edit Income/Expense':'Pièces de rechange' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense_piece_rechange':'insertincomexpense_piece_rechange'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                                        <?php if(isset($incomexpensedetails)) { ?>

                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >
                 <?php } ?>
                    <div class="col-sm-6 col-md-3">
                          <label class="form-label">Véchicule<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="ie_v_id"  class="form-control"  name="ie_v_id" >
                        <option value="">Selectionner Véchicule</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_v_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>
					  
				<div class="col-sm-6 col-md-3">
                          <label class="form-label">Catégorie<span class="form-required">*</span></label>
                      <div class="form-group">
                         <select id="categorie_piece_rechange_id"  class="form-control"  name="categorie_piece_rechange_id" >
                        <option value="">Selectionner Catégorie</option>
                        <?php  foreach ($categorielist as $key => $categorielists) { ?>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['categorie_piece_rechange_id'] == $categorielists['icpr_id']){ echo 'selected';} ?> value="<?php echo output($categorielists['icpr_id']) ?>"><?php echo output($categorielists['icpr_name']); ?></option>
                        <?php  } ?>
                     </select>
                      </div>
                    </div>					  
					  
                    <!--<div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Type<span class="form-required">*</span></label>
                         <select name="ie_type" id="ie_type" class="form-control">
                        <option value="">Select type</option>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'income'){ echo 'selected';} ?> value="income">Income</option>
                        <option <?php //if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'expense'){ echo 'selected';} ?> value="expense">Expense</option>
                      </select>
                      </div>
                    </div>-->
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Amount">
                      </div>
                    </div>
                    
                   
      
                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                 <input type="hidden" id="ie_type" name="ie_type" value="expense">
                 <input type="hidden" id="ie_piece_rechange" name="ie_piece_rechange" value="1">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'MODIFIER':'AJOUTER' ?></button>
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
          <?php if(!empty($incomexpense)){ ?>
                    <table id="incomexpensetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Catégorie</th>
                          <th>Vehicule</th>
                          <th>Date</th>
                          <th>Montant</th>
                          <?php if(userpermission('lr_ie_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
	                       <td> <?php echo output($incomexpenses['categorie']->icpr_name); ?></td>
						   <td> <?php echo output($incomexpenses['vech_name']->v_registration_no); ?></td>
                           <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                         <td><?php echo output($incomexpenses['ie_amount']); ?></td>
						
                          <td>  <span class="badge <?php echo ($incomexpenses['ie_type']=='income') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($incomexpenses['ie_type']=='income') ? 'Income' : 'Expense'; ?></span>  </td>
                          <?php if(userpermission('lr_ie_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>incomexpense/editincomexpense/<?php echo output($incomexpenses['ie_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
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
                     echo '<div class="alert alert-warning">No income or expense found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>

