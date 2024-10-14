    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($reglementdetails))?'Modifier reglement':'Ajouter reglement' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">reglements</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($reglementdetails))?'Modifier reglement':'Ajouter reglement' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="reglement_add" class="card" action="<?php echo base_url();?>reglement/<?php echo (isset($reglementdetails))?'updatereglement':'insertreglement'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="tp_id" id="tp_id" value="<?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tp_id']:'' ?>" >

<div class="col-sm-6 col-md-12">
                  <div class="form-group">
                     <label class="form-label">Facture<span class="form-required">*</span></label>
                     <select id="tp_trip_id"  class="form-control selectized"  name="tp_trip_id" >
                        <option value="">Sélectionner Facture</option>
                        <?php  foreach ($facturelist as $key => $facturelists) { ?>
                        <option <?php if((isset($reglementdetails)) && $reglementdetails[0]['tp_trip_id'] == $facturelists['t_id']){ echo 'selected';} ?> value="<?php echo output($facturelists['t_id']) ?>"> N°: <?php echo output($facturelists['t_num_facture']); ?> - Montant: <?php echo output($facturelists['t_trip_amount']); ?> - Montant restant: <?php echo output($facturelists['t_num_facture']); ?>- Transitaire: <?php echo output($facturelists['t_num_facture']); ?>- Client: <?php echo output($facturelists['t_num_facture']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
                      
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Montant à verser<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tp_amount']:'' ?>" id="tp_amount" name="tp_amount" placeholder="Montant à verser">
                      </div>
                    </div>
                    
  <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Type<span class="form-required">*</span></label>
                          <div class="form-group col-sm-12">
                     <select name="tp_type" id="tp_type" required="true" class="form-control selectized">
                      <option value="">Sélectionner un Type </option>
                      <option <?php if((isset($reglementdetails)) && $reglementdetails[0]['tp_type'] == 'Espece'){ echo 'selected';} ?>  value="Espece">Espéce</option>

                      <option <?php if((isset($reglementdetails)) && $reglementdetails[0]['tp_type'] == 'Cheque'){ echo 'selected';} ?> value="Cheque">Chéque</option>						 
                    </select>
                    </div>
                      </div>
                    </div>
                      
                      <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Numéro bordereau<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tp_numero_bordereau']:'' ?>" id="tp_numero_bordereau" name="tp_numero_bordereau" placeholder="Numéro bordereau">
                      </div>
                    </div>           
                  
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description<span class="form-required">*</span></label>
                        <textarea class="form-control" id="tp_notes" autocomplete="on" placeholder="Description"  name="tp_notes"><?php echo (isset($reglementdetails)) ? $reglementdetails[0]['tp_notes']:'' ?></textarea>
                      </div>
                    </div>                        
                        
                    </div>
 
      
                </div>
                 <input type="hidden" id="tp_created_date" name="tp_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($reglementdetails))?'Modifier reglement':'Ajouter reglement' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



