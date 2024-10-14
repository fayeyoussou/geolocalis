<aside class="main-sidebar elevation-1 sidebar-dark-warning">
   <?php $data = sitedata();  ?>
   <a href="<?= base_url(); ?>/dashboard" class="brand-link">
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
            <li class="nav-item has-treeview <?php echo ((activate_menu('vehicle'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addvehicle'))=='active') ? 'menu-open':'' ?> <?php echo ((activate_menu('viewvehicle'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editvehicle'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('vehiclegroup'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('vehicle');?> <?php echo activate_menu('addvehicle');?><?php echo activate_menu('viewvehicle');?><?php echo activate_menu('editvehicle');?><?php echo activate_menu('vehiclegroup');?>">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                     Véhicules
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
               </ul>
            </li>
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
            <?php if(userpermission('lr_trips_list') || userpermission('lr_trips_list_view')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('trips'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addtrips'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('edittrip'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('details'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('trips');?> <?php echo activate_menu('addtrips');?> <?php echo activate_menu('edittrip');?><?php echo activate_menu('details');?>">
                  <i class="nav-icon fas fa-road"></i>
                  <p>
                     Voyages (trajets)
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_trips_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>trips" class="nav-link <?php echo activate_menu('trips');?><?php echo activate_menu('edittrip');?><?php echo activate_menu('details');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Booking List</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_trips_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>trips/addtrips" class="nav-link <?php echo activate_menu('addtrips');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter un voyage</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
           <?php } ?>
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
               </ul>
            </li>
            <?php }  if(userpermission('lr_fuel_list') || userpermission('lr_fuel_add')) { ?>
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
               </ul>
            </li>
            <?php }  if(userpermission('lr_reminder_list') || userpermission('lr_reminder_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('reminder'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addreminder'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editreminder'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('reminder');?> <?php echo activate_menu('addreminder');?><?php echo activate_menu('editreminder');?>">
                  <i class="nav-icon fas fa fa-bullhorn"></i>
                  <p>
                     Rapport
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_reminder_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reminder" class="nav-link <?php echo activate_menu('reminder');?><?php echo activate_menu('editreminder');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Gestion des rapports</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_reminder_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>reminder/addreminder" class="nav-link <?php echo activate_menu('addreminder');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter rapport</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php }  if(userpermission('lr_ie_list') || userpermission('lr_ie_add')) { ?>
            <li class="nav-item has-treeview <?php echo ((activate_menu('incomexpense'))=='active') ? 'menu-open':'' ?>
               <?php echo ((activate_menu('addincomexpense'))=='active') ? 'menu-open':'' ?><?php echo ((activate_menu('editincomexpense'))=='active') ? 'menu-open':'' ?>">
               <a href="#" class="nav-link <?php echo activate_menu('incomexpense');?> <?php echo activate_menu('editincomexpense');?> <?php echo activate_menu('addincomexpense');?>">
                  <i class="nav-icon fa fa-dollar-sign"></i>
                  <p>
                     Revenus & dépenses
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                 <?php  if(userpermission('lr_ie_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense" class="nav-link <?php echo activate_menu('incomexpense');?> <?php echo activate_menu('editincomexpense');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Revenus & dépenses</p>
                     </a>
                  </li>
                   <?php } if(userpermission('lr_ie_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>incomexpense/addincomexpense" class="nav-link <?php echo activate_menu('addincomexpense');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Ajouter Revenus & dépenses</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php }  if(userpermission('lr_tracking') || userpermission('lr_liveloc')) { ?>
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
                    Gardiennage virtuel(Geofence)
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_geofence_add')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>geofence/addgeofence" class="nav-link <?php echo activate_menu('addgeofence');?>">
                        <i class="nav-icon fas faa-list"></i>
                        <p>Ajouter un géorepérage du véhicule (Geofence)</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_geofence_list')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>geofence" class="nav-link <?php echo activate_menu('geofence');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Gestion géorepérage du véhicule (Geofence)</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_geofence_events')) { ?>
                  <li class="nav-item">
                     <a href="<?= base_url(); ?>geofence/geofenceevents" class="nav-link <?php echo activate_menu('geofenceevents');?>">
                        <i class="nav-icon fas faa-plus"></i>
                        <p>Evénements géorepérage du véhicule (Geofence)</p>
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
