    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bookings
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Bookings</li>
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
                    <table id="facturetbl" class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Customer</th>
                          <th>Vechicle</th>
                          <th>Type</th>
                          <th>Driver</th>
                          <th>facture Status</th>
                           <?php if(userpermission('lr_trips_list_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($facturelist)){ 
                           $count=1;
                           foreach($facturelist as $facturelists){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php //echo output($facturelists['t_vechicle_details']->v_name); ?><?= (isset($facturelists['t_vechicle_details']->v_name))?$facturelists['t_vechicle_details']->v_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>
                           <td><?php echo ucfirst($facturelists['t_type']); ?></td>
                           <td><?= (isset($facturelists['t_driver_details']->d_name))?$facturelists['t_driver_details']->d_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>
                           <td> <?php 
                              switch($facturelists['t_trip_status']){
                                  case 'nodemarre':
                                      $status = '<span class="badge badge-info">No démarré</span>';
                                      break;
                                  case 'encours':
                                      $status = '<span class="badge badge-success">En cours</span>';
                                       break;
                                  case 'termine':
                                      $status = '<span class="badge badge-warning">Terminé</span>';
                                       break;
                                  case 'annule':
                                      $status = '<span class="badge badge-danger">Annulé</span>'; 
                                       break; 
   
                                }

                              ?>
                             <?=  $status ?>  
                            </td>
                             <?php if(userpermission('lr_trips_list_edit')) { ?>
                               <td>
                            <a class="icon" href="<?php echo base_url(); ?>facture/editfacture/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a> | 
                            <a class="icon" href="<?php echo base_url(); ?>facture/details/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-eye"></i>
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



