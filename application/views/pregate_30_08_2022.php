    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informations sur les Pregates
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Informations sur les Pregates</li>
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
          <?php if(!empty($pregate)){ ?>
                    <table id="pregatetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Facture</th>
                          <th>Réference</th>
                          <th>Date reception</th>
                          <th>Date line</th>
                          <th>Type</th>
                          <?php if(userpermission('lr_pr_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($pregate as $pregates){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($pregates['pr_trip_id']); ?><?php //echo output($pregates['vech_name']->v_name).'_'.output($pregates['vech_name']->v_registration_no); ?></td>
                           <td> <?php echo output($pregates['pr_numero']); ?></td>

                           <td><?php echo output($pregates['pr_date_reception']); ?></td>
                         <td><?php echo output($pregates['pr_date_line']); ?></td>
                          <td>  <span class="badge <?php echo ($pregates['pr_statut']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($pregates['pr_statut']=='1') ? 'Fait' : 'Line'; ?></span>  </td>
                          <?php if(userpermission('lr_pr_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>pregate/editpregate/<?php echo output($pregates['pr_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
							<?php  if(userpermission('lr_mi_add')) { ?>	  
								<a class="icon" href="<?php echo base_url(); ?>conteneur/pregate/<?php echo output($pregates['pr_trip_id']); ?>">
								  <i class="fa fa-eye"></i>
								</a>
							<?php } ?>
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



