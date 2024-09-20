<aside class="main-sidebar elevation-1 sidebar-dark-orange">
   <?php $data = sitedata();  ?>
   <a href="<?= base_url(); ?>dashboard" class="brand-link">
   <img src="<?= base_url().'assets/uploads/'.$data['s_logo'] ?>" class="brand-image img-circle elevation-1 frlogo">
   <span class="brand-text font-weight-light"><?php echo ucfirst(output($this->session->userdata['session_data']['name'])); ?></span>
   </a>
   <div class="sidebar">
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="<?= base_url(); ?>dashboard" class="nav-link <?php echo activate_menu('dashboard');?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Tableau de bord
                  </p>
               </a>
            </li>
 
			 <li class="nav-item has-treeview <?php echo ((activate_menu('facture'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addfacture'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('viewfacture'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editfacture'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('vehiclegroup'))=='active') ? 'menu-open':'' ?>">
				 
               <a href="#" class="nav-link <?php echo activate_menu('facture');?> <?php echo activate_menu('addfacture');?><?php echo activate_menu('viewfacture');?><?php echo activate_menu('editfacture');?><?php echo activate_menu('vehiclegroup');?>">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                     Facture
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
 <?php if(userpermission('lr_trips_add')) { ?>
				<li class="nav-item">
                     <a href="<?= base_url(); ?>facture/addfacture" class="nav-link <?php echo activate_menu('addfacture');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une facture</p>
                     </a>
                  </li>				   
<?php }?>				   

 <?php //if(userpermission('lr_trips_list_edit')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>facture" class="nav-link <?php echo activate_menu('facture');?><?php echo activate_menu('editfacture');?><?php echo activate_menu('viewfacture');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des factures</p>
                     </a>
                  </li>	
<?php //}?>				   

 <?php if(userpermission('lr_trips_add')) { ?>
				   
      				<li class="nav-item">
                     <a href="<?= base_url(); ?>facture/addfacture_proforma" class="nav-link <?php echo activate_menu('addfacture_proforma');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une proforma</p>
                     </a>
                  </li>	             
  <?php }?>                 
                <li class="nav-item">
                     <a href="<?= base_url(); ?>facture/facture_synthese" class="nav-link <?php echo activate_menu('booking');?>">
                        <i class="fas fa-cosg icon nav-icon"></i>
                        <p>Synthèse</p>
                     </a>
                  </li>                     
				   
   
               </ul>
            </li>
<!--Debut comptabilité-->
           <?php   if(userpermission('lr_ie_list') || userpermission('lr_ie_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('incomexpense'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addincomexpense'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editincomexpense'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('addreglement_facture'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('addcaisse'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('addbanque'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('banque'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('incomexpense_reglementfacture'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('incomexpense');?> <?php echo activate_menu('editincomexpense');?> <?php echo activate_menu('addincomexpense');?>">
                  <i class="nav-icon fa fa-dollar-sign"></i>
                  <p>
                     <!--Revenus & dépenses-->Comptabilité
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                 <?php  if(userpermission('lr_ie_list')) { ?>
					<li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/addreglement_facture" class="nav-link <?php echo activate_menu('incomexpense');?> <?php echo activate_menu('addcaisse');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Réglement facture</p>
                     </a>
                  </li>  
				   
				   <li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/incomexpense_reglementfacture" class="nav-link <?php echo activate_menu('incomexpense_reglementfacture');?> <?php echo activate_menu('incomexpense_reglementfacture');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Journal du reglement facture</p>
                     </a>
                  </li>
				   
				   
					<li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/addbanque" class="nav-link <?php echo activate_menu('incomexpense');?> <?php echo activate_menu('addbanque');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Opération de banque</p>
                     </a>
                  </li>  
				   
				   <li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/banque" class="nav-link <?php echo activate_menu('banque');?> <?php echo activate_menu('banque');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Journal de la banque</p>
                     </a>
                  </li>				   
				   
				   
					<li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/addcaisse" class="nav-link <?php echo activate_menu('incomexpense');?> <?php echo activate_menu('addcaisse');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Opération de caisse</p>
                     </a>
                  </li>  
				   
				   <li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/caisse" class="nav-link <?php echo activate_menu('caisse');?> <?php echo activate_menu('caisse');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Journal de la caisse</p>
                     </a>
                  </li>					   
				   
				   
				   
				   
   			   
				    <?php } ?>

              
                   
               </ul>
            </li>
			 
			 <?php } ?>			 
<!--Fin comptabilité-->			 
             
			 <!-- debut mission-->
            <?php if(userpermission('lr_mi_list') || userpermission('lr_mi_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('mission'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addmission'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editmission'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('mission');?> <?php echo activate_menu('addmission');?><?php echo activate_menu('editmission');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Mission
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>

<ul class="nav nav-treeview">
 <?php if(userpermission('lr_pr_add')) { ?>	
				<li class="nav-item">
                     <a href="<?= base_url(); ?>facture/addpregate" class="nav-link <?php echo activate_menu('addpregate');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter pregate</p>
                     </a>
                  </li>				   
 <?php }?> 				   
<?php if(userpermission('lr_pr_edit')) { ?>				   
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>facture/pregate" class="nav-link <?php echo activate_menu('facture');?><?php echo activate_menu('editfacture');?><?php echo activate_menu('viewfacture');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des pregates</p>
                     </a>
                  </li>		
 <?php }?>     				            
               </ul>                
                
                
                <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_mi_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>mission" class="nav-link <?php echo activate_menu('mission');?><?php echo activate_menu('editmission');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des Missions</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_mi_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>mission/addmission" class="nav-link <?php echo activate_menu('addmission');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter mission</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>                
                
            </li>
            <?php } ?>				   
				   
				   
     		 <!-- fin mission-->	
  
			 <!-- debut conteneur-->
            <?php if(userpermission('lr_co_list') || userpermission('lr_co_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('conteneur'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addconteneur'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editconteneur'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('conteneur');?> <?php echo activate_menu('addconteneur');?><?php echo activate_menu('editconteneur');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Conteneur
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_co_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>conteneur" class="nav-link <?php echo activate_menu('conteneur');?><?php echo activate_menu('editconteneur');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des conteneurs</p>
                     </a>
                  </li>
                  <?php } //if(userpermission('lr_co_add')) { ?>
<!--                  <li class="nav-item">
                     <a href="<?//= base_url(); ?>conteneur/addconteneur" class="nav-link <?php //echo activate_menu('addconteneur');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter conteneur</p>
                     </a>
                  </li>-->
                  <?php //} ?>
               </ul>
            </li>
            <?php } ?>				   
				   
				   
     		 <!-- fin zone-->             
             
			 <!-- debut zone-->
            <?php if(userpermission('lr_zo_list') || userpermission('lr_zo_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('zone'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addzone'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editzone'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('zone');?> <?php echo activate_menu('addzone');?><?php echo activate_menu('editzone');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Zone
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_zo_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>zone" class="nav-link <?php echo activate_menu('zone');?><?php echo activate_menu('editzone');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des Zones</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_zo_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>zone/addzone" class="nav-link <?php echo activate_menu('addzone');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter zone</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>				   
				   
				   
     		 <!-- fin zone-->	             
 			 <!-- debut reglement-->
            <?php if(userpermission('lr_tg_list') || userpermission('lr_tg_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('reglement'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addreglement'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editreglement'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('reglement');?> <?php echo activate_menu('addreglement');?><?php echo activate_menu('editreglement');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Réglement
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_tg_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reglement" class="nav-link <?php echo activate_menu('reglement');?><?php echo activate_menu('editreglement');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des reglements</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_tg_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reglement/addreglement" class="nav-link <?php echo activate_menu('addreglement');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter reglement</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>				   
				   
				   
     		 <!-- fin reglement-->	             
  
 			 <!-- debut type reglement-->
            <?php if(userpermission('lr_tr_list') || userpermission('lr_tr_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('type_reglement'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addtype_reglement'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('edittype_reglement'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('type_reglement');?> <?php echo activate_menu('addtype_reglement');?><?php echo activate_menu('edittype_reglement');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Type reglement
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_tr_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>type_reglement" class="nav-link <?php echo activate_menu('type_reglement');?><?php echo activate_menu('edittype_reglement');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des types reglements</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_tr_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>type_reglement/addtype_reglement" class="nav-link <?php echo activate_menu('addtype_reglement');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter type de reglement</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>				   
				   
				   
     		 <!-- fin type reglement-->	             

             <?php if(userpermission('lr_mi_list') || userpermission('lr_mi_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('mission'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addmission'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editmission'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('mission');?> <?php echo activate_menu('addmission');?><?php echo activate_menu('editmission');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Mission
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_mi_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>mission" class="nav-link <?php echo activate_menu('mission');?><?php echo activate_menu('editmission');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des Missions</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_mi_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>mission/addmission" class="nav-link <?php echo activate_menu('addmission');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter mission</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>            
 			 <!-- debut nature-->
<!--            <?php //if(userpermission('lr_na_list') || userpermission('lr_na_add')) { ?>
            <li class="nav-item has-treeview <?php //echo ((activate_menu('nature'))=='active') ? 'menu-open':'' ?>
               <?php //echo ((activate_menu('addnature'))=='active') ? 'menu-open':'' ?><?php //echo ((activate_menu('editnature'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php //echo activate_menu('nature');?> <?php //echo activate_menu('addnature');?><?php //echo activate_menu('editnature');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     nature
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php //if(userpermission('lr_na_list')) { ?>
                  <li class="nav-item">
                     <a href="<?//= base_url(); ?>nature" class="nav-link <?php //echo activate_menu('nature');?><?php //echo activate_menu('editnature');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des natures</p>
                     </a>
                  </li>
                  <?php //} if(userpermission('lr_na_add')) { ?>
                  <li class="nav-item">
                     <a href="<?//= base_url(); ?>nature/addnature" class="nav-link <?php //echo activate_menu('addnature');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter nature</p>
                     </a>
                  </li>
                  <?php //} ?>
               </ul>
            </li>
            <?php //} ?>	-->			   
				   
				   
     		 <!-- fin nature-->	             
             
             
             
 			 <!-- debut compagnie-->
            <?php //if(userpermission('lr_fuel_cc_list') || userpermission('lr_cc_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('compagnie'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addcompagnie'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editcompagnie'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('compagnie');?> <?php echo activate_menu('addcompagnie');?><?php echo activate_menu('editcompagnie');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Compagnie
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_fuel_cc_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>compagnie" class="nav-link <?php echo activate_menu('compagnie');?><?php echo activate_menu('editcompagnie');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des compagnies</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_fuel_cc_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>compagnie/addcompagnie" class="nav-link <?php echo activate_menu('addcompagnie');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter compagnie</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php //} ?>				   
				   
				   
     		 <!-- fin compagnie-->	             
             
<!-- DEBUT CARBURANT-->
            <?php   if(userpermission('lr_fuel_list') || userpermission('lr_fuel_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('fuel'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addfuel'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('editfuel'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('fuel');?> <?php echo activate_menu('addfuel');?><?php echo activate_menu('editfuel');?>">
                  <i class="nav-icon fa fa-battery-three-quarters"></i>
                  <p>
                     Carburants
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_fuel_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel" class="nav-link <?php echo activate_menu('fuel');?> <?php echo activate_menu('editfuel');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Gestion du carburant</p>
                     </a>
                  </li>
                   <?php } if(userpermission('lr_fuel_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel/addfuel" class="nav-link <?php echo activate_menu('addfuel');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter carburant</p>
                     </a>
                  </li>
				  <?php } ?> 
                   
                <?php  if(userpermission('lr_fuel_ccc_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_carburant_recharge" class="nav-link <?php echo activate_menu('fuel');?> <?php echo activate_menu('editfuel_carte_carburant_recharge');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Gestion des recharges carburant</p>
                     </a>
                  </li>
                   <?php } if(userpermission('lr_fuel_ccc_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge" class="nav-link <?php echo activate_menu('addfuel_carte_carburant_recharge');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une recharge carburant</p>
                     </a>
                  </li>
				  <?php } ?>                    
                   
				   
				<li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_peage/addfuel_carte_peage" class="nav-link <?php echo activate_menu('addfuel_carte_peage');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une carte de péage</p>
                     </a>
                  </li>				   
				   
				   
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_peage" class="nav-link <?php echo activate_menu('fuel_carte_peage');?><?php echo activate_menu('editfuel_carte_peage');?><?php echo activate_menu('viewfuel_carte_peage');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des carte de péage</p>
                     </a>
                  </li>					   

<!-- debut fuel_carte_carburant-->				   
				<li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_carburant/addfuel_carte_carburant" class="nav-link <?php echo activate_menu('addfuel_carte_carburant');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une carte de carburant</p>
                     </a>
                  </li>				   
				   
				   
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_carburant" class="nav-link <?php echo activate_menu('fuel_carte_carburant');?><?php echo activate_menu('editfuel_carte_carburant');?><?php echo activate_menu('viewfuel_carte_carburant');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des cartes de carburant</p>
                     </a>
                  </li>	

<!-- Fin fuel_carte_carburant-->				   

				<li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_compagnie/addfuel_compagnie" class="nav-link <?php echo activate_menu('addfuel_compagnie');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une compagnie petrolière</p>
                     </a>
                  </li>				   
				   
				   
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_compagnie" class="nav-link <?php echo activate_menu('fuel_compagnie');?><?php echo activate_menu('editfuel_compagnie');?><?php echo activate_menu('viewfuel_compagnie');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des compagnies petrolières</p>
                     </a>
                  </li>	
                   
				<li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_peage/addfuel_carte_peage" class="nav-link <?php echo activate_menu('addfuel_carte_peage');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter une carte de péage</p>
                     </a>
                  </li>				   
				   
				   
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>fuel_carte_peage" class="nav-link <?php echo activate_menu('fuel_carte_peage');?><?php echo activate_menu('editfuel_carte_peage');?><?php echo activate_menu('viewfuel_carte_peage');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des carte de péage</p>
                     </a>
                  </li>	                   
                   
                   
                   
                   
                   
                   
                   <?php //} Fin if ?>
               </ul>
            </li> 
             
              <?php } ?>
<!-- FIN CARBURANT-->             
             
             
			 
			 
            <?php if(userpermission('lr_drivers_list') || userpermission('lr_drivers_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('drivers'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('adddrivers'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editdriver'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('drivers');?> <?php echo activate_menu('adddrivers');?><?php echo activate_menu('editdriver');?>">
                  <i class="nav-icon fas fa-user-secret"></i>
                  <p>
                     Conducteurs
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_drivers_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>drivers" class="nav-link <?php echo activate_menu('drivers');?><?php echo activate_menu('editdriver');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des conducteurs</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_drivers_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>drivers/adddrivers" class="nav-link <?php echo activate_menu('adddrivers');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter conducteur</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
             
             <!-- debut voyages-->


             <!-- Fin voyages-->             
             
             <?php if(userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('customer'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addcustomer'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editcustomer'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('customer');?> <?php echo activate_menu('addcustomer');?><?php echo activate_menu('editcustomer');?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                     Clients
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_cust_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>customer" class="nav-link <?php echo activate_menu('customer');?><?php echo activate_menu('editcustomer');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Gestion des clients</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_cust_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>customer/addcustomer" class="nav-link <?php echo activate_menu('addcustomer');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter client</p>
                     </a>
                  </li>
                   <?php } ?>
                   
                <?php  if(userpermission('lr_typcust_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>customer_type" class="nav-link <?php echo activate_menu('customer_type');?><?php echo activate_menu('editcustomer_type');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Gestion des types de client</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_typcust_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>customer_type/addcustomer_type" class="nav-link <?php echo activate_menu('addcustomer_type');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter type client</p>
                     </a>
                  </li>
                   <?php } ?>                   
               </ul>
            </li>
              <?php } ?>
             
             
			 <!-- debut Transitaire-->
            <?php //if(userpermission('lr_drivers_list') || userpermission('lr_drivers_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('transitaire'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addtransitaire'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('edittransitaire'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('transitaire');?> <?php echo activate_menu('addtransitaire');?><?php echo activate_menu('edittransitaire');?>">
                  <i class="nav-icon fas fa-user-secret"></i>
                  <p>
                     Transitaire
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php //if(userpermission('lr_drivers_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>transitaire" class="nav-link <?php echo activate_menu('transitaire');?><?php echo activate_menu('edittransitaire');?><?php echo activate_menu('viewtransitaire');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des transitaires</p>
                     </a>
                  </li>	
                  <?php //} if(userpermission('lr_drivers_add')) { ?>
				<li class="nav-item">
                     <a href="<?= base_url(); ?>transitaire/addtransitaire" class="nav-link <?php echo activate_menu('addtransitaire');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter un transitaire</p>
                     </a>
                  </li>	
                  <?php //} ?>
               </ul>
            </li>
            <?php //} ?>				   
				   
     		 <!-- fin Transitaire-->             
             
 
			 <!-- debut vehicule-->
            <?php //if(userpermission('lr_drivers_list') || userpermission('lr_drivers_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('vehicle'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addvehicle'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editvehicle'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('vehicle');?> <?php echo activate_menu('addvehicle');?><?php echo activate_menu('editvehicle');?>">
                  <i class="nav-icon fas fa-user-secret"></i>
                  <p>
                     Véhicule
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
 				   <?php if(userpermission('lr_vech_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>vehicle" class="nav-link <?php echo activate_menu('vehicle');?><?php echo activate_menu('editvehicle');?><?php echo activate_menu('viewvehicle');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des véhicules</p>
                     </a>
                  </li>
                 <?php } if(userpermission('lr_vech_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>vehicle/addvehicle" class="nav-link <?php echo activate_menu('addvehicle');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter un véhicule</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_vech_group')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>vehicle/vehiclegroup" class="nav-link <?php echo activate_menu('vehiclegroup');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Types de véhicules</p>
                     </a>
                  </li>
                <?php } ?>
				<li class="nav-item">
                     <a href="<?= base_url(); ?>vehicle_remorque/addvehicle_remorque" class="nav-link <?php echo activate_menu('addvehicle_remorque');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter un véhicule remorque</p>
                     </a>
                  </li>				   
				   
				   
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>vehicle_remorque" class="nav-link <?php echo activate_menu('vehicle_remorque');?><?php echo activate_menu('editvehicle_remorque');?><?php echo activate_menu('viewvehicle_remorque');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Liste des véhicules remorques</p>
                     </a>
                  </li>	

                   
               </ul>
            </li>
            <?php //} ?>				   
	
             
			   
				   
				   
             
				   
     		 <!-- fin Transitaire-->             
                          
             
            <?php  // if(userpermission('lr_fuel_list') || userpermission('lr_fuel_add')) { } ?>
            
            <?php   if(userpermission('lr_reminder_list') || userpermission('lr_reminder_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('reminder'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addreminder'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editreminder'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('reminder');?> <?php echo activate_menu('addreminder');?><?php echo activate_menu('editreminder');?>">
                  <i class="nav-icon fas fa fa-bullhorn"></i>
                  <p>
                     Rappel
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_reminder_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reminder" class="nav-link <?php echo activate_menu('reminder');?><?php echo activate_menu('editreminder');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Gestion des rappels</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_reminder_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reminder/addreminder" class="nav-link <?php echo activate_menu('addreminder');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter un rappel</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
			  <?php } ?>
			 
			 
 
			 
            <?php   if(userpermission('lr_tracking') || userpermission('lr_liveloc')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('tracking'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('livestatus'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('tracking');?> <?php echo activate_menu('livestatus');?>">
                  <i class="nav-icon fa fa-map-pin"></i>
                  <p>
                     Suivi
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                 <?php  if(userpermission('lr_tracking')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>tracking" class="nav-link <?php echo activate_menu('tracking');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Historique des suivis</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_liveloc')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>tracking/livestatus" class="nav-link <?php echo activate_menu('livestatus');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Suivre en direct</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
             <?php }  if(userpermission('lr_geofence_add') || userpermission('lr_geofence_list') || userpermission('lr_geofence_events')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('addgeofence'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('geofenceevents'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('geofence'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('geofence');?> <?php echo activate_menu('addgeofence');?> <?php echo activate_menu('geofenceevents');?>">
                  <i class="nav-icon fa fa-street-view"></i>
                  <p>
                    Gardiennage virtuel<!--Gardiennage virtuel(Geofence)-->
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_geofence_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>geofence/addgeofence" class="nav-link <?php echo activate_menu('addgeofence');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Ajouter un géorepérage</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_geofence_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>geofence" class="nav-link <?php echo activate_menu('geofence');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Gestion géorepérage</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_geofence_events')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>geofence/geofenceevents" class="nav-link <?php echo activate_menu('geofenceevents');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Evénements géorepérage</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
          <?php }  if(userpermission('lr_reports')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('incomeexpense'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('booking'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('fuels'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('booking');?><?php echo activate_menu('fuels');?><?php echo activate_menu('incomeexpense');?>">
                  <i class="nav-icon fa fa-calculator" aria-hidden="true"></i>
                  <p>
                     Rapports
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reports/booking" class="nav-link <?php echo activate_menu('booking');?>">
                        <i class="fas fa-cosg icon nav-icon"></i>
                        <p>Voyages</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reports/incomeexpense" class="nav-link <?php echo activate_menu('incomeexpense');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Revenus & dépenses</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reports/fuels" class="nav-link <?php echo activate_menu('fuels');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Carburants</p>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } if(userpermission('lr_settings')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('websitesetting'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('smtpconfig'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('email_template'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('edit_email_template'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('websitesetting');?><?php echo activate_menu('email_template');?> <?php echo activate_menu('smtpconfig');?><?php echo activate_menu('edit_email_template');?>">
                  <i class="nav-icon fa fa-dollar-sign"></i>
                  <p>
                     Réglages
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>settings/websitesetting" class="nav-link <?php echo activate_menu('websitesetting');?>">
                        <i class="fas fa-cosg icon nav-icon"></i>
                        <p>Réglages Généraux</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>settings/smtpconfig" class="nav-link <?php echo activate_menu('smtpconfig');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Configuration SMTP</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>settings/email_template" class="nav-link <?php echo activate_menu('email_template');?><?php echo activate_menu('edit_email_template');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Templates de l'email</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item has-treeview <?php echo ((activate_menu('users'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('adduser'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('edituser'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('users');?> <?php echo activate_menu('edituser');?><?php echo activate_menu('adduser');?>">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                     Utilisateurs
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>users" class="nav-link <?php echo activate_menu('users');?> <?php echo activate_menu('edituser');?>">
                        <i class="fas fa-cosg icon nav-icon"></i>
                        <p>Gestion des Utilisateurs</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>users/adduser" class="nav-link <?php echo activate_menu('adduser');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter utilisateur</p>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <li class="nav-item">
               <a href="<?= base_url(); ?>resetpassword" class="nav-link <?php echo activate_menu('resetpassword');?>">
                  <i class="nav-icon fa fa-key"></i>
                  <p>
                     Changer Mot de Passe
                  </p>
               </a>
            </li>
         </ul>
      </nav>
   </div>
</aside>
<div class="content-wrapper pb-2 mb-0">
