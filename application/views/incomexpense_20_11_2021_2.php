    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informations sur les mouvements
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a>| <a href="<?= base_url(); ?>reports/incomeexpense">Rapport</a></li>
              <li class="breadcrumb-item active">Informations sur les mouvements</li>
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
          <?php if(!empty($incomexpense)){ ?>
                    <table id="incomexpensetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Date</th>
                          <th>Facture</th>
                          <th>Bénéficiaire</th>
                          <th>Objet</th>
						  <th>Numéro de caisse</th>
                          <th>Encaissement</th>
                          <th>Decaissement</th>
                          <th>Type</th>
                          <th>Banque</th>
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
                           <td> <?php echo output($incomexpenses['ie_date']); ?></td>
                           <td> <?php echo output($incomexpenses['facture']->t_num_facture); ?></td>
                           <td> <?php echo output($incomexpenses['facture']->t_customer_id); ?></td>
                           <td> <?php echo output($incomexpenses['ie_objet']); ?></td>
                           <td> <?php echo output($incomexpenses['ie_numero_caisse']); ?></td>
                         <td><?php if($incomexpenses['ie_type']=='Encaissement') echo output($incomexpenses['ie_amount']); ?></td>
                         <td><?php if($incomexpenses['ie_type']=='Decaissement') echo output($incomexpenses['ie_amount']); ?></td>                          <td>  <span class="badge <?php echo ($incomexpenses['ie_type']=='Encaissement') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($incomexpenses['ie_type']=='Encaissement') ? 'Encaissement' : 'Decaissement'; ?></span>                  <?php  if ($incomexpenses['ie_type'] == 'Transport') {?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import">Ajouter conteneur </a>      
                 <?php }?> </td>
<!--                           <td><?php //echo output($incomexpenses['ie_description']); ?></td>
-->
				<td> <?php if($incomexpenses['ie_numero_caisse']!=""){ ?><a href="<?php echo base_url(); ?>incomexpense/editincomexpense/<?php echo output($incomexpenses['ie_id']); ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-AddPayment">Banque </a><?php }else{?><?php echo output($incomexpenses['ie_bordereau_versement']); ?> du <?php echo output($incomexpenses['ie_date_versement']); ?><?php }?> </td>
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
                      <thead>
                        <tr>
                          <th class="w-1"></th>
                          <th></th>
                          <th></th>
                          <th>Total</th>
                          <th>Encaissement</th>
                          <th>Decaissement</th>
                          <th></th>
                          <?php //if(userpermission('lr_ie_edit')) { ?>
                          <th></th>
                          <?php //} ?>
                        </tr>
                      </thead>                        
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucun mouvement n\'est trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->

<div class="modal fade show" id="modal-AddPayment" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Banque</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/updateincomexpense">
                <div class="card-body">
                  <!----><div class="form-group row">
                    <label for="ie_bordereau_versement" class="col-sm-4 col-form-label">Bordereau de versement</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="ie_bordereau_versement" value="" id="ie_bordereau_versement" placeholder="Numéro du bordereau de versement" >
                    </div>
                  </div>
                  <!----><div class="form-group row">
                    <label for="ie_date_versement" class="col-sm-4 col-form-label">Date du versement</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control datepicker" name="ie_date_versement" value="" id="ie_date_versement" placeholder="Date du versement" >
                    </div>
                  </div>
<!--                  <div class="form-group row">
                    <label for="tp_amount" class="col-sm-4 col-form-label">ie_bordereau_versement</label>
                    <div class="form-group col-sm-8">
                       <input type="text" class="form-control" name="ie_bordereau_versement" id="tp_amount" placeholder="Pay">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tp_notes" class="col-sm-4 col-form-label">Notes</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="tp_notes" name="tp_notes" rows="2" placeholder="Enter Notes"></textarea>
                    </div>
                  </div>-->
                <!--</div>-->
<!--                 <input type="hidden" class="form-control" value="<?//= $tripdetails['t_id']; ?>" name="tp_trip_id" id="tp_trip_id" placeholder="tp_trip_id">
                 <input type="hidden" class="form-control" value="<?//= $tripdetails['t_vechicle']; ?>" name="tp_v_id" id="tp_v_id" placeholder="tp_v_id">-->
		<input type="hidden" id="ie_type" name="ie_type" value="<?php echo "Encaissement"; ?>">
      <div class="modal-footer justify-content-between">
                 <input type="text" class="form-control" value="<?= $incomexpenses['ie_id']; ?>" name="ie_id" id="ie_id">        
		  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer Banque</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

