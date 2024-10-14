    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Information carburant
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Information carburant</li>
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
                    <table id="fuel_carte_carburant_rechargetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                           <th>Date de remplissage</th>
                          <th>Véhicule</th>
                          <th>Quantité</th>
                          <th>Prix total</th>
                          <th>Rempli par</th>
                           <th>Relevé du compteur kilométrique</th>
                          <th>Commentaire</th>
                          <?php if(userpermission('lr_fuel_carte_carburant_recharge_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($fuel_carte_carburant_recharge)){  $count=1;
                           foreach($fuel_carte_carburant_recharge as $fuel_carte_carburant_recharges){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($fuel_carte_carburant_recharges['v_fuel_carte_carburant_rechargefilldate']); ?></td>
                           <td> <?php echo output($fuel_carte_carburant_recharges['vech_name']->v_name); ?></td>
                           <td> <?php echo output($fuel_carte_carburant_recharges['v_fuel_carte_carburant_recharge_quantity']); ?></td>
                           <td><?php echo output($fuel_carte_carburant_recharges['v_fuel_carte_carburant_rechargeprice']); ?></td>
                           <td><?php echo output($fuel_carte_carburant_recharges['filled_by']->d_name); ?></td>
                           <td><?php echo output($fuel_carte_carburant_recharges['v_odometerreading']); ?></td>
                           <td><?php echo output($fuel_carte_carburant_recharges['v_fuel_carte_carburant_rechargecomments']); ?></td>
                           <?php if(userpermission('lr_fuel_carte_carburant_recharge_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>fuel_carte_carburant_recharge/editfuel_carte_carburant_recharge/<?php echo output($fuel_carte_carburant_recharges['v_fuel_carte_carburant_recharge_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
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



