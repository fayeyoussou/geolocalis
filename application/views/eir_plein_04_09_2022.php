    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des eir_pleins
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des eir_pleins</li>
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
          <?php if(!empty($eir_plein)){ ?>
                    <table id="eir_pleintbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>N° eir_plein</th>
                          <th>Véhicule</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Montant</th>
                          <th>Type</th>
                          <?php if(userpereir_plein('lr_ei_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($eir_plein as $eir_pleins){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($eir_pleins['ei_numero']);  ?></td>
                           <td> <?php //echo output($eir_pleins['vech_name']->v_name).'_'.output($eir_pleins['vech_name']->v_registration_no); ?></td>
                           <td> <?php echo output($eir_pleins['ei_date_eir_plein']); ?></td>

                           <td><?php echo output($eir_pleins['ei_description']); ?></td>
                         <td><?php echo output($eir_pleins['ei_driver']); ?></td>
                        <td>  <span class="badge <?php echo ($eir_pleins['ei_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($eir_pleins['ei_isactive']=='1') ? 'Plein' : 'Vide'; ?></span>  </td>
                          <?php if(userpereir_plein('lr_ei_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>eir_plein/editeir_plein/<?php echo output($eir_pleins['ei_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
								  
                          <a class="icon" href="<?php echo base_url(); ?>eir_plein/eir_plein_details/<?php echo output($eir_pleins['ei_id']); ?>">
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



