    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestion des Banques
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>banque/addbanque">Ajouter Banque</a></li>                
              <li class="breadcrumb-item active">Gestion des Banques</li>
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
          <?php if(!empty($banque)){ ?>
                    <table id="banquetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">N°</th>
                          <th>Nom</th>
                          <th>Sigle</th>
                          <th>Numéro compte</th>
                          <th>Contact</th>
                         <!-- <th>Description</th>-->
                          <?php //if(userpermission('lr_ie_edit')) { ?>
                          <th>Action</th>
                          <?php //} ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($banque as $banques){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($banques['ieb_name']); ?></td>
                           <td> <?php echo output($banques['ieb_sigle']); ?></td>
                           <td> <?php echo output($banques['ieb_numero_compte']); ?></td>
                           <td><?php echo output($banques['ieb_contact']); ?></td>
                          <!-- <td><?php //echo output($banques['ieb_desc']); ?></td>-->

                          <?php //if(userpermission('lr_ie_edit')) { ?>
                              <td><?php $id=4; if($banques['ieb_id']==$id) { ?>
                            <a class="icon" href="">
                              <?php }else{?>
							 <a class="icon" href="<?php echo base_url(); ?>banque/editbanque/<?php echo output($banques['ieb_id']); ?>">
                              <i class="fa fa-edit"></i>   
						   <?php } ?>
                            </a>
                          </td>
                        <?php //} ?>
                        </tr>
                        <?php } ?>
                          
                          
                      </tbody>
                                              
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">Aucune Banque trouvée !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



