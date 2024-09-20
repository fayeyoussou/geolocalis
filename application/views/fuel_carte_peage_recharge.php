    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des cartes de recharges peage
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li><li class="breadcrumb-item"><a href="<?= base_url(); ?>/fuel_carte_peage_recharge/addfuel_carte_peage_recharge">Ajouter</a></li>
              <li class="breadcrumb-item active">Liste</li>
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
                    <table id="fueltbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                           <th>Numéro carte</th>
                          <th>Quantité</th>
                          <th>Prix</th>
                          <th>Prix total</th>
                          <th>Date</th>
                          <th>Commentaire</th>
                          <?php if(userpermission('lr_fuel_ccc_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel)){  $count=1;
                           foreach($fuel as $fuels){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($fuels['cc_name']->cc_name); ?></td>
                           <td> <?php echo output($fuels['cpr_fuel_quantity']); ?></td>
                           <td><?php echo output($fuels['cpr_fuelprice']); ?></td>
                           <td><?php echo output($fuels['cpr_amount']); ?></td>
                           <td><?php echo output($fuels['cpr_fueldate']); ?></td>
                           <td><?php echo output($fuels['cpr_desc']); ?></td>
                           <?php if(userpermission('lr_fuel_ccc_edit')) { ?>
                              <td>
                            <?php if(userpermission('lr_fuel_ccc_edit')) { ?>      
                            <a class="icon" href="<?php echo base_url(); ?>fuel_carte_peage_recharge/editfuel/<?php echo output($fuels['ccr_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a> <?php } ?>
                            
                            <?php if(userpermission('lr_fuel_ccc_delete')) { ?>      
                            <a class="icon" href="<?php echo base_url(); ?>fuel_carte_peage_recharge/deletefuel/<?php echo output($fuels['ccr_id']); ?>">
                              <i class="fa fa-trash text-danger"></i>
                            </a> <?php } ?>      
                          </td>
                          <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                    
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



