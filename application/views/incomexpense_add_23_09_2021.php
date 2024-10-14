    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails))?'Modifier Pièce de caisse':'Ajouter Pièce de caisse' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Client</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails))?'Modifier Pièce de caisse':'Ajouter Pièce de caisse' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	     <form method="post" id="Income_Expense" class="card" action="<?php echo base_url();?>Incomexpense/<?php echo (isset($incomexpensedetails))?'updateincomexpense':'insertincomexpense'; ?>">
          <div class="card-body">

                 
                  <div class="row">
                   <input type="hidden" name="ie_id" id="ie_id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_id']:'' ?>" >

                   <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Bénéficiaire<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_beneficiaire" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_beneficiaire']:'' ?>" name="ie_beneficiaire" placeholder="Bénéficiaire">
                      </div>
                    </div>
                      
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label class="form-label">Objet<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_objet" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_objet']:'' ?>" name="ie_objet" placeholder="Objet">
                      </div>
                    </div>
                      
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Montant<span class="form-required">*</span></label>
                          <input type="text" class="form-control" id="ie_amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_amount']:'' ?>" name="ie_amount" placeholder="Montant">
                      </div>
                    </div>                      
                      
                      
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Type<span class="form-required">*</span></label>
                         <select name="ie_type" id="ie_type" class="form-control">
                        <option value="">Selectionner un type</option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'Encaissement'){ echo 'selected';} ?> value="Encaissement">Encaissement</option>
                        <option <?php if((isset($incomexpensedetails)) && $incomexpensedetails[0]['ie_type'] == 'Decaissement'){ echo 'selected';} ?> value="Decaissement">Decaissement</option>
                      </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Date<span class="form-required">*</span></label>
                         <input type="text" class="form-control datepicker" id="ie_date" name="ie_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_date']:'' ?>" placeholder="Date">

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Description</label>
                          <input type="text" class="form-control" id="ie_description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['ie_description']:'' ?>" name="ie_description" placeholder="Description">
                      </div>
                    </div>

                </div>
                 <input type="hidden" id="ie_created_date" name="ie_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails))?'Modifier Pièce de Caisse':'Ajouter Pièce de Caisse' ?></button>
      </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



