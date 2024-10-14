    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des missions
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des missions</li>
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
          <?php if(!empty($mission)){ ?>
                    <table id="missiontbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° mission</th>
                          <th>Véhicule</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Montant</th>
                          <th>Type</th>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($mission as $missions){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($missions['mi_numero']);  ?></td>
                           <td> <?php //echo output($missions['vech_name']->v_name).'_'.output($missions['vech_name']->v_registration_no); ?></td>
                           <td> <?php echo output($missions['mi_date_mission']); ?></td>

                           <td><?php echo output($missions['mi_description']); ?></td>
                         <td><?php echo output($missions['mi_driver']); ?></td>
                        <td>  <span class="badge <?php echo ($missions['mi_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($missions['mi_isactive']=='1') ? 'Plein' : 'Vide'; ?></span>  </td>
                          <?php if(userpermission('lr_mi_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>mission/editmission/<?php echo output($missions['mi_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
								  
                          <a class="icon" href="<?php echo base_url(); ?>mission/mission_details/<?php echo output($missions['mi_id']); ?>">
                           <i class="fa fa-eye"></i>
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
                     echo '<div class="alert alert-warning">Aucun revenu ou dépense trouvé !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



