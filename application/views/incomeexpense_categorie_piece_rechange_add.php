    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomeexpense_categorie_piece_rechangedetails))?'Modifier une catégorie de pièces de rechange':'Ajouter une catégorie de pièces de rechange' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Cartes carburant</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomeexpense_categorie_piece_rechangedetails))?'Modifier catégorie de pièces de rechange':'Ajouter catégorie de pièces de rechange' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
		
<!--BEGIN NAV-->		
<div class="col-12 col-sm-12">
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><?php echo (isset($incomeexpense_categorie_piece_rechangedetails))?'Modifier catégorie de pièces de rechange':'Ajouter catégorie de pièces de rechange' ?></a>
              </li>
              

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<!-- FORM-->
<form method="post" id="incomeexpense_categorie_piece_rechange_add" class="card" action="<?php echo base_url();?>incomeexpense_categorie_piece_rechange/<?php echo (isset($incomeexpense_categorie_piece_rechangedetails))?'updateincomeexpense_categorie_piece_rechange':'insertincomeexpense_categorie_piece_rechange'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="icpr_id" id="icpr_id" value="<?php echo (isset($incomeexpense_categorie_piece_rechangedetails)) ? $incomeexpense_categorie_piece_rechangedetails[0]['icpr_id']:'' ?>" >


                    <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                         <label class="form-label">Catégorie<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($incomeexpense_categorie_piece_rechangedetails)) ? $incomeexpense_categorie_piece_rechangedetails[0]['icpr_name']:'' ?>" id="icpr_name" name="icpr_name" placeholder="Catégorie">
                      </div>
                    </div>
					  
							
					  
					  
					  

                    
                   
                     </div>
                   
                   
      
                </div>
                 <input type="hidden" id="icpr_created_date" name="icpr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomeexpense_categorie_piece_rechangedetails))?'Modifier catégorie de pièces de rechange':'Ajouter catégorie de pièces de rechange' ?></button>
      </div>
    </form>
		   
<!--END FORM-->				  
				  
              </div>


            </div>
          </div>
          <!-- /.card -->
        </div>
<!--EN NAV-->		
	

    </section>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="custtbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">N°</th>
                        <th>Catégorie</th>

                       <!-- <th>Statut</th>-->
                        <?php //if(userpermission('lr_cust_edit')) { ?>
                        <th>Action</th>
                        <?php //} ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($incomeexpense_categorie_piece_rechangelist)){ 
                     $count=1;
                        foreach($incomeexpense_categorie_piece_rechangelist as $incomeexpense_categorie_piece_rechangelists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($incomeexpense_categorie_piece_rechangelists['icpr_name']); ?></td>
                       
                        <td> <?php if(userpermission('lr_icpr_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>incomeexpense_categorie_piece_rechange/editincomeexpense_categorie_piece_rechange/<?php echo output($incomeexpense_categorie_piece_rechangelists['icpr_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
							<?php //} ?>
							
						<?php //if(userpermission('lr_fuel_icpr_detail')) { ?>		   
<!--                            <a data-toggle="tooltip" data-placement="top" title="Détail" class="icon" href="<?php //echo base_url(); ?>incomeexpense_categorie_piece_rechange/details/<?php //echo output($incomeexpense_categorie_piece_rechangelists['icpr_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>-->
								   
						<?php //} ?>							
							
                        </td>
                        
                     </tr>
                     <?php } } ?>
					  <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
    <!-- /.content -->



