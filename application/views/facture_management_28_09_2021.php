    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Liste des factures
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Liste des factures</li>
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
                         <th>Désignation</th>
                         <th>N° facture</th>
                          <th>Client</th>
                          <th>Transitaire</th>
                          <th>Date</th>
<!--                          <th>Statut facture</th>-->
                            <th>Réglement</th>
                            <th>Validation</th>
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
                          <td> <?php echo ucfirst($facturelists['t_type_facturation']); ?></td>
                          <td> <?php echo ucfirst($facturelists['t_num_facture']); ?></td>
                           <td> <?php echo ucfirst($facturelists['t_customer_details']->c_name); ?></td>
                           <td> <?php if(isset($facturelists['t_transitaire_details']->tra_name)){echo output($facturelists['t_transitaire_details']->tra_name);} ?></td>
                           <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>
<!--                           <td><?//= (isset($facturelists['t_driver_details']->d_name))?$facturelists['t_driver_details']->d_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>
--> <!--                          <td> <?php /*
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
   
                                }*/

                              ?>
                             <?//=  $status ?>  
                            </td>-->
                            
                          <!-- <td><?php echo ucfirst($facturelists['t_date_facture']); ?></td>--> 
                           <td><?= (isset($facturelists['t_reglement_details']->tg_name))?$facturelists['t_reglement_details']->tg_name:'<span class="badge badge-danger">Encore à attribuer</span>'; ?></td>                       
                            
                         <td> <?php 
                              switch($facturelists['t_validation']){
                                  case 'valide':
                                      $status = '<span class="badge badge-info">Validé</span>';
                                      break;
                                  case 'non_valide':
                                      $status = '<span class="badge badge-danger">Non validé</span>'; 
                                       break; 
   
                                }

                              ?>
                             <?=  $status ?>  
                            </td>
                            
                             <?php if(userpermission('lr_trips_list_edit')) { ?>
                               <td>
                                   
<?php $t_validation=''; $t_validation =  $facturelists['t_validation'];?>                           
                                   <?php if($t_validation=="non_valide") { ?> 
                            <a class="icon" href="<?php echo base_url(); ?>facture/editfacture/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
<?php }?>                                   
                            <a class="icon" href="<?php echo base_url(); ?>facture/details/<?php echo output($facturelists['t_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
                                   
<!--                <a href="<?//= base_url(); ?>facture/facture_management/<?//= $facturelists['t_id']; ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-conteneur"><i class="fa fa-eye"></i></a>-->
  
 

<!--debut validation-->                                    
                <?php //$t_validation=''; $t_validation =  $facturelists['t_validation']; //echo $t_annulation;
                        if($t_validation=="non_valide") { ?>                                   
                           <a class="icon" href="<?php echo base_url(); ?>facture/facture_validation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-window-close text-danger"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i class="fa fa-check-square text-green"></i>
                                                             
                     <?php }  // fin controle?>                                    
<!--Fin validation-->                                    
                                   
                                   
<!--debut annulation-->                                   
                <?php $t_annulation=''; $t_annulation =  $facturelists['t_annulation']; //echo $t_annulation;
                        if($t_annulation=="non_annule") { ?>                                   
                           <a class="icon" href="<?php echo base_url(); ?>facture/facture_annulation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-ban text-green"></i>
                           </a>                                    
                   <?php } else { ?>  

                           <i class="fa fa-ban text-danger"></i>
                                                             
                     <?php }  // fin controle?>                                     

                             <a class="icon" href="<?php echo base_url(); ?>facture/facture_generation/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-file-alt text-blue"></i>
                           </a> 
                          <?php //if($facturelists['t_num_facture']!="") { ?>          
                             <a class="icon" href="<?php echo base_url(); ?>facture/facture_generation_pdf/<?php echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a>                                    
                      <?php // }  else {?>
                             <!--<a class="icon" href="<?php //echo base_url(); ?>facture/facture_proforma_generation_pdf/<?php //echo output($facturelists['t_id']); ?>" target="_blank">
                           <i class="fa fa-file-pdf text-orange"></i>
                           </a> -->                                    
                   
                    <?php //}  // fin controle?>                                   
                                   
                <?php //if($facturelists['t_annulation']=="annulee") { ?>                                    <?php if(($t_validation=="non_valide") || ($t_annulation=="non_annule")) { ?> 
                           <a class="icon" href="<?php echo base_url(); ?>facture/facture_delete/<?php echo output($facturelists['t_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a>                                    
                   <?php } else{ ?>
                    <i class="fa fa-trash text-grey"></i>
                    <?php } ?>
                          
                           <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import"> test </a>
                           <i class="fa fa-trash text-danger"></i>                                   
                                   
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


<!-- Debut conteneur-->

<div class="modal fade show" id="modal-conteneur" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter le conteneur Facture N°<?= $facturelists['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                    
            <div class="col-sm-8 ">
                 <div class="form-group">
                     <label class="form-label">Nature du conteneur</label>
                     <select name="t_nature" id="t_nature" required="true" class="form-control">
                      <option value="">Sélectionner une nature</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Avec TVA</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_nature'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Sans TVA</option>						 
                    </select>
                  </div>
                </div>   
                    
                    
                    
                  <!--<div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">
                        
                </div>
                  </div>-->
                    
                   <!--<div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Description</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>-->
                </div>
<!--                 <input type="hidden" class="form-control" value="<?//= $facturedetails['t_start_date']; ?>" name="co_created_date" id="co_created_date">-->
<!--                 <input type="text" class="form-control" value="<?//= $facturedetails['t_vechicle']; ?>" name="ie_v_id" id="ie_v_id">-->
<!--                 <input type="text" class="form-control" value="expense" name="ie_type" id="ie_type">-->
            
            
<input type="text" class="form-control" value="<?//= $facturelists['t_id']; ?>" name="co_trip_id" id="co_trip_id">
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter conteneur</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Fin conteneur-->

<div class="modal fade show" id="modal-import" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ajouter import Facture N°<?//= $facturedetails['t_num_facture']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addfactureconteneur" action="<?= base_url() ?>facture/addfactureconteneur" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="co_numero_conteneur" class="col-sm-4 col-form-label">Numéro du conteneur</label>
                    <div class="col-sm-8">
                    <input type="text" value="<?php //echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" class="form-control datetimepicker-input" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur"
                           
                           >
                        
<!--                    <input type="text" class="form-control" pattern="^[0-9]*$" required="true" name="co_numero_conteneur" id="co_numero_conteneur" placeholder="Numéro du conteneur">                        
-->                        
                    </div>
                  </div>
                    
  <!-- FIN Type de conteneur-->                     
                    
                <div class="form-group row">
                    <label for="co_adresse_livraison" class="col-sm-4 col-form-label">Adresse de livraison</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_adresse_livraison" name="co_adresse_livraison" rows="2" placeholder="Adresse de livraison"></textarea>
                    </div>
                  </div>                    
   
                <div class="form-group row">
                    <label for="co_description" class="col-sm-4 col-form-label">Description</label>
                    <div class="form-group col-sm-8">
                      <textarea class="form-control" id="co_description" name="co_description" rows="2" placeholder="Description"></textarea>
                    </div>
                  </div>                       
                    
                </div>
<?php 
//$montantags=$nombreags * $ags;
//echo "nombre ags".$montantags=$facturedetails['t_nombre_ags'];
            
            
            
?>
                 <input type="hidden" class="form-control" value="<?= $facturedetails['t_id']; ?>" name="co_trip_id" id="co_trip_id">
<input type="hidden" class="form-control" value="<?php echo $facturedetails['t_trip_amount'];?>" name="t_trip_amount" id="t_trip_amount">
<input type="hidden" class="form-control" value="<?php echo $facturedetails['t_nombre_ags'];?>" name="t_nombre_ags" id="t_nombre_ags">       
<input type="hidden" class="form-control" value="<?php echo $facturedetails['t_type_facturation'];?>" name="t_type_facturation" id="t_type_facturation">
<input type="hidden" class="form-control" value="<?php echo $facturedetails['t_taxe']?>" name="t_taxe" id="t_taxe">            
            <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Ajouter Transport</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

