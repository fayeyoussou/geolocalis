    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($facturedetails))?'Modifier la facture':'Ajouter facture' ?><?php if((isset($facturedetails))){ ?>    N°  <?php echo (isset($facturedetails)) ? $facturedetails[0]['t_num_facture']:'' ?>  <?php }else{?> N° F<?= $numerofacture; }?>  
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Facture</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?> </li>      
                
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
<!-- debut onglet-->
<div >
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#transport" data-toggle="tab">Transport</a></li>
                  <li class="nav-item"><a class="nav-link" href="#exportation" data-toggle="tab">Exportation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#transfert" data-toggle="tab">Transfert</a></li>
                    <li class="nav-item"><a class="nav-link" href="#immobilisation" data-toggle="tab">Immobilisation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#manutentation" data-toggle="tab">Manutentation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#detention" data-toggle="tab">Détention</a></li>             
                  <li class="nav-item"><a class="nav-link" href="#forfait" data-toggle="tab">Forfait</a></li> 
				</ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    
<!--Debut transport-->               
                    <div class="active tab-pane" id="transport">
                    <div class="post">
                      <div class="user-block">
<!--<h2 class="m-0 text-dark">transport</h2> -->
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  


                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL" required="true" >
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                
 
                
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control selectized">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Entreprise (Avec TVA)</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Particulier (Sans TVA)</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->   
                
<!-- debut AGS-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">AGS</label>
                     <select name="t_ags" id="t_ags" required="true" class="form-control">
                      <option value="">Sélectionner AGS</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='avec_ags'){ echo 'selected';} ?> value="avec_ags">Avec AGS</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='sans_ags'){ echo 'selected';} ?> value="sans_ags">Sans AGS</option>						 
                    </select>
                  </div>
                </div>-->                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre AGS<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_ags']:'' ?>" name="t_nombre_ags" id="t_nombre_ags" class="form-control" placeholder="Nombre AGS">
                  </div>
               </div>                 
  <!-- debut AGS-->                  
  
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Rabais<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_rabais']:'' ?>" name="t_rabais" id="t_rabais" class="form-control" placeholder="Rabais">
                  </div>
               </div>                  
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
                 
               
<!-- debut taxe-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Ristourne</label>
                     <select name="t_ristourne" id="t_ristourne" required="true" class="form-control selectized">
                      <option value="">Sélectionner Ristourne</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='avec_ristourne'){ echo 'selected';} ?> value="avec_ristourne">Avec ristourne</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='sans_ristourne'){ echo 'selected';} ?> value="sans_ristourne">Sans ristourne</option>						 
                    </select>
                  </div>
                </div>  -->              
                
  <!-- debut taxe-->       
                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Ristourne supplémentaire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_ristourne_additional']:'' ?>" name="t_ristourne_additional" id="t_ristourne_additional" class="form-control" placeholder="Ristourne supplémentaire">
                  </div>
               </div>                
                
                


  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized" required="true"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->

<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>				
 
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>				
				
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire ">
                      </div>
                    </div>                
                

            </div>
 
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
            <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Transport">
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>      
                      
                  </div>
 <!--Debut transport-->               

                    <!-- /.tab-pane -->
                  <div class="tab-pane" id="exportation">
                    <!-- The timeline -->
<div class="post">
                      <div class="user-block">
<!--exportation-->
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">

            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  

                
          
            
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL" required="true" >
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                

                
<!-- debut AGS-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">AGS</label>
                     <select name="t_ags" id="t_ags" required="true" class="form-control">
                      <option value="">Sélectionner AGS</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='avec_ags'){ echo 'selected';} ?> value="avec_ags">Avec AGS</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='sans_ags'){ echo 'selected';} ?> value="sans_ags">Sans AGS</option>						 
                    </select>
                  </div>
                </div> -->               

            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre AGS<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_ags']:'' ?>" name="t_nombre_ags" id="t_nombre_ags" class="form-control" placeholder="Nombre AGS">
                  </div>
               </div>                   
                
  <!-- debut AGS-->                  
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
             
               
<!-- debut taxe-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Ristourne</label>
                     <select name="t_ristourne" id="t_ristourne" required="true" class="form-control selectized">
                      <option value="">Sélectionner Ristourne</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='avec_ristourne'){ echo 'selected';} ?> value="avec_ristourne">Avec ristourne</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='sans_ristourne'){ echo 'selected';} ?> value="sans_ristourne">Sans ristourne</option>						 
                    </select>
                  </div>
                </div>  -->              
                
  <!-- debut taxe-->       
                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Ristourne supplémentaire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_ristourne_additional']:'' ?>" name="t_ristourne_additional" id="t_ristourne_additional" class="form-control" placeholder="Ristourne supplémentaire">
                  </div>
               </div>                
                
                
<!-- Debut Type de reglement--> 

               
                
<!-- Fin Type de reglement-->                  
                
  <!-- Debut reglement--> 

<!---->               

  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized" required="true"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>				
 
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>	              
 
         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                

            </div>
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
            <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Exportation">
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>
                  </div>

                  <div class="tab-pane" id="transfert">
<div class="post">
                      <div class="user-block">
transfert
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  

                
          
            
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required"></span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required"></span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL"  >
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                
            
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control selectized">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Taxe </option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Ya pas de taxe</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->   
                
<!-- debut AGS-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">AGS</label>
                     <select name="t_ags" id="t_ags" required="true" class="form-control selectized">
                      <option value="">Sélectionner AGS</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='avec_ags'){ echo 'selected';} ?> value="avec_ags">Avec AGS</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='sans_ags'){ echo 'selected';} ?> value="sans_ags">Sans AGS</option>						 
                    </select>
                  </div>
                </div> -->               
             <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre AGS<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_ags']:'' ?>" name="t_nombre_ags" id="t_nombre_ags" class="form-control" placeholder="Nombre AGS">
                  </div>
               </div>                  
  <!-- debut AGS-->                  
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

        
               
<!-- debut taxe-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Ristourne</label>
                     <select name="t_ristourne" id="t_ristourne" required="true" class="form-control selectized">
                      <option value="">Sélectionner Ristourne</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='avec_ristourne'){ echo 'selected';} ?> value="avec_ristourne">Avec ristourne</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='sans_ristourne'){ echo 'selected';} ?> value="sans_ristourne">Sans ristourne</option>						 
                    </select>
                  </div>
                </div> -->               
                
  <!-- debut taxe-->       
                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Ristourne supplémentaire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_ristourne_additional']:'' ?>" name="t_ristourne_additional" id="t_ristourne_additional" class="form-control" placeholder="Ristourne supplémentaire">
                  </div>
               </div>                
                
                
<!-- Debut Type de reglement--> 

               
                
<!-- Fin Type de reglement-->                  
                
  <!-- Debut reglement--> 

<!---->               

  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->
              
 <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>				
 
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>	
         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                

            </div>
          
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
            <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Transfert">
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>                
                  </div>
                    
                  <div class="tab-pane" id="immobilisation">
<div class="post">
                      <div class="user-block">
immobilisation
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  



               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL" >
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!--               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php //echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div> -->                
                <!--Fin Nombre de conteneurs-->  
                
                   <!--Debut Nombre de jours immobilisation-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de jours <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_jour_immobilisation']:'' ?>" name="t_nombre_jour_immobilisation" value="" class="form-control" placeholder="Nombre de jours immobilisation" required="true">
                  </div>
               </div>               
                <!--Fin Nombre de jours immobilisation-->  
                
                
  
                
             
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
            
               
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Période Début <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_start_date']:'' ?>" name="t_start_date" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>                 
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Période fin <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_end_date']:'' ?>" name="t_end_date" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div> 
                
                
<!-- debut Nature transfert-->
                
                <!--<div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Nature transfert</label>
                     <select name="t_nature_transfert" id="t_nature_transfert" required="true" class="form-control selectized">
                      <option value="">Sélectionner Nature transfert</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature_transfert'] =='vrac'){ echo 'selected';} ?> value="vrac">Vrac</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_nature_transfert'] =='conteneur'){ echo 'selected';} ?> value="conteneur">Conteneur</option>						 
                    </select>
                  </div>
                </div>-->                
                
  <!-- debut Nature transfert--> 
                
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control selectized">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Entreprise (Avec TVA)</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Particulier (Sans TVA)</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->                 

               
                
<!-- Fin Type de reglement-->                  
                
  <!-- Debut reglement--> 

<!---->               

  <!-- Debut compagnie--> 

<!--               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized" required="true"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  //foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php //echo output($compagnielists['cc_id']) ?>"><?php //echo output($compagnielists['cc_name']); ?> </option>
                        <?php  //} ?>
                     </select>
                  </div>
              </div>-->
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->
  
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>				
 
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>					
 
         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire ">
                      </div>
                    </div>                
                

            </div>
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
            <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Immobilisation">
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="manutentation">
                    <!-- The timeline -->
<div class="post">
                      <div class="user-block">
manutentation
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  
                
               
         
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire</label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL</label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL" >
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                
                   <!--Debut Nombre de jours immobilisation-->                
                

                
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control selectized">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Entreprise (Avec TVA)</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Particulier (Sans TVA)</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->   
                
                 
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>				
 
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>					
 
         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                

            </div><?//= $numerofacture; ?>
  
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
          <input type="text" id="cpt_numero" name="cpt_numero" value="<?= $numerofacture; ?>">                              
            <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Manutentation">
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>
                  </div>

                  <div class="tab-pane" id="detention">
                    <div class="post">
                      <div class="user-block">

                          
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  

                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL" required="true" >
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre de conteneurs<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_conteneur']:'' ?>" name="t_nombre_conteneur" value="" class="form-control" placeholder="Nombre de conteneur" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Période Début <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_start_date']:'' ?>" name="t_start_date" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>                 
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Période fin <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_end_date']:'' ?>" name="t_end_date" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>
                
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control selectized">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Entreprise (Avec TVA)</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Particulier (Sans TVA)</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->   

            
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
   <!-- Debut zone--> 

                
<!--  -->               <div class="col-sm-6 col-md-3">
              <div class="form-group">
                     <label class="form-label">Zone<span class="form-required">*</span></label>
                     <select id="t_zone"  class="form-control selectized" required="true" name="t_zone">
                       <option value="">Selectionner la zone</option>
                        <?php  foreach ($zonelist as $key => $zonelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_zone'] == $zonelists['z_id']){ echo 'selected';} ?> value="<?php echo output($zonelists['z_id']) ?>"><?php echo output($zonelists['z_destination']).' - '. output($zonelists['z_nombre_jour_detention']); ?> Jours</option>
                        <?php  } //?>
                     </select>
                   </div>
                 </div>
                
<!-- Fin zone-->        
               

                

<!-- Debut Type de reglement--> 

               
                
<!-- Fin Type de reglement-->                  
                
  <!-- Debut reglement--> 

<!---->               

  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized" required="true"  name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->
  <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>				
 
 
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>	            
 
         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                

            </div>
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
             <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Detention">                           
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>
                  </div>                    
 
<!-- debut forfait-->					

					<div class="active tab-pane" id="forfait">
                    <div class="post">
                      <div class="user-block">
<!--<h2 class="m-0 text-dark">transport</h2> -->
                          <form method="post" id="facture_add" class="card"  action="<?php echo base_url();?>facture/<?php echo (isset($facturedetails))?'updatefacture':'insertfacture'; ?>">
            <div class="row">
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_id']:'' ?>" >
  
<div class="col-sm-6 col-md-6">
                  <div class="form-group">
                     <label class="form-label">Désignation<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_designation']:'' ?>" name="t_designation" id="t_designation" class="form-control" placeholder="Désignation">
                  </div>
               </div>				
               
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Client<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control selectized" required="true" name="t_customer_id">
                         
                        <option value="">Selectionner client</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
 
<!-- Debut transitaire--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Transitaire<span class="form-required">*</span></label>
                     <select id="t_transitaire"  class="form-control selectized" required="true"  name="t_transitaire">
                       <option value="">Selectionner le transitaire</option>
                        <?php  foreach ($transitairelist as $key => $transitairelists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_transitaire'] == $transitairelists['tra_id']){ echo 'selected';} ?> value="<?php echo output($transitairelists['tra_id']) ?>"><?php echo output($transitairelists['tra_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin zone-->  


                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nom du navire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nom_navire']:'' ?>" name="t_nom_navire" id="t_nom_navire" class="form-control" placeholder="Nom du navire">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Référence / N° BL<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_reference']:'' ?>" name="t_reference" id="t_reference" class="form-control" placeholder="Référence / N° BL">
                  </div>
               </div>

                
                 <!--Debut Nombre de conteneurs-->                
                
<!-- -->                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Montant<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_trip_amount']:'' ?>" name="t_trip_amount" value="" class="form-control" placeholder="Montant" required="true" >
                  </div>
               </div>               
                <!--Fin Nombre de conteneurs-->  
                
 
                
                
<!-- debut taxe-->
                
                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Taxe</label>
                     <select name="t_taxe" id="t_taxe" required="true" class="form-control selectized">
                      <option value="">Sélectionner taxe</option>
                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='avec_tva'){ echo 'selected';} ?> value="avec_tva">Entreprise (Avec TVA)</option>

                      <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_taxe'] =='sans_tva'){ echo 'selected';} ?> value="sans_tva">Particulier (Sans TVA)</option>						 
                    </select>
                  </div>
                </div>                
                
  <!-- debut taxe-->   
                
<!-- debut AGS-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">AGS</label>
                     <select name="t_ags" id="t_ags" required="true" class="form-control">
                      <option value="">Sélectionner AGS</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='avec_ags'){ echo 'selected';} ?> value="avec_ags">Avec AGS</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ags'] =='sans_ags'){ echo 'selected';} ?> value="sans_ags">Sans AGS</option>						 
                    </select>
                  </div>
                </div>-->                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Nombre AGS<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_nombre_ags']:'' ?>" name="t_nombre_ags" id="t_nombre_ags" class="form-control" placeholder="Nombre AGS">
                  </div>
               </div>                 
  <!-- debut AGS-->                  
  
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Rabais<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_rabais']:'' ?>" name="t_rabais" id="t_rabais" class="form-control" placeholder="Rabais">
                  </div>
               </div>                  
                
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Date facture <span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_date_facture']:'' ?>" name="t_date_facture" value="" class="form-control datepicker" placeholder="<?php echo date('Y-m-d'); ?>" required="true" >
                  </div>
               </div>  

                
                 
               
<!-- debut taxe-->
                
<!--                <div class="col-sm-6 col-md-3">
                 <div class="form-group">
                     <label class="form-label">Ristourne</label>
                     <select name="t_ristourne" id="t_ristourne" required="true" class="form-control selectized">
                      <option value="">Sélectionner Ristourne</option>
                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='avec_ristourne'){ echo 'selected';} ?> value="avec_ristourne">Avec ristourne</option>

                      <option <?php //if((isset($facturedetails)) && $facturedetails[0]['t_ristourne'] =='sans_ristourne'){ echo 'selected';} ?> value="sans_ristourne">Sans ristourne</option>						 
                    </select>
                  </div>
                </div>  -->              
                
  <!-- debut taxe-->       
                
                
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Ristourne supplémentaire<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_ristourne_additional']:'' ?>" name="t_ristourne_additional" id="t_ristourne_additional" class="form-control" placeholder="Ristourne supplémentaire">
                  </div>
               </div>                
 
            <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantité vrac<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_bulk_quantity']:'' ?>" name="t_bulk_quantity" id="t_bulk_quantity" class="form-control" placeholder="Quantité vrac">
                  </div>
               </div>  				
				
                
<!-- Debut Type de reglement--> 

               
                
<!-- Fin Type de reglement-->                  
                
  <!-- Debut reglement--> 

<!---->               

  <!-- Debut compagnie--> 

               <div class="col-sm-6 col-md-3">
                   <div class="form-group">
                     <label class="form-label">Compagnie<span class="form-required">*</span></label>
                     <select id="t_compagnie"  class="form-control selectized"   name="t_compagnie">
                       <option value="">Selectionner compagnie</option>
                        <?php  foreach ($compagnielist as $key => $compagnielists) { ?>
                        <option <?php if((isset($facturedetails)) && $facturedetails[0]['t_compagnie'] == $compagnielists['cc_id']){ echo 'selected';} ?> value="<?php echo output($compagnielists['cc_id']) ?>"><?php echo output($compagnielists['cc_name']); ?> </option>
                        <?php  } ?>
                     </select>
                  </div>
              </div>
                
<!-- Fin compagnie-->                 
                
                
                
<!-- debut Nature-->

<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais divers<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_frais_divers']:'' ?>" name="t_frais_divers" id="t_frais_divers" class="form-control" placeholder="Frais divers" >
                  </div>
               </div>	
				
<div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Frais impression<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($facturedetails)) ? $facturedetails[0]['t_impression']:'' ?>" name="t_impression" id="t_impression" class="form-control" placeholder="Frais impression" >
                  </div>
               </div>				
 
         
                <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Commentaire</label>
                          <input type="text" class="form-control" id="t_desc" value="<?php echo (isset($fueldetails)) ? $fueldetails[0]['t_desc']:'' ?>" name="t_desc" placeholder="Commentaire sur le carburant">
                      </div>
                    </div>                
                

            </div>
 
<?php if((isset($facturedetails))){}else{ ?>
          <input type="hidden" id="t_num_facture" name="t_num_facture" value="F<?= $numerofacture; ?>">
          <input type="hidden" id="t_modele_facture" name="t_modele_facture" value="FACTURE">                              
<?php } ?>
            <input type="hidden" id="t_type_facturation" name="t_type_facturation" value="Forfait">
            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($facturedetails))?'Modifier facture':'Ajouter facture' ?></button>
            </div>
      </form>
                          
                   </div>
                  </div>      
                      
                  </div>
 <!--Debut transport-->               
					
					
<!-- fin forfait-->					
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>          
          
<!-- Fin onglet-->          
          
       
             </div>
    </section>
    <!-- /.content -->



