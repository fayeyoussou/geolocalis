    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des pregates
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des pregates</li>
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
                   <!-- <table id="facturetbl" class="table card-table table-vcenter text-nowrap">-->
                        
                    <table id="facturetbl" class="table table-bordered table-vcenter text-nowrap table-striped">                        
                       
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                         <th>N° facture</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                            <th>Date Debut</th>
                            <th>Date line</th>
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
                          <td> <?php echo ucfirst($facturelists['t_num_facture']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_pregate']); ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_line']); ?></td>
                           <td></td>

                          <?php //} ?>
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


<!-- Debut conteneur-->


<!-- Fin conteneur-->



