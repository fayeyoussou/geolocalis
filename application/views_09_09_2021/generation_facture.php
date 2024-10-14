<table class="table table-striped" >
          <thead><?= output($facturedetails['t_type_facturation']) ?>
              
    <?php //if((isset($facturedetails)) && (($facturedetails['t_type_facturation'] =='importation') || ($facturedetails['t_type_facturation'] =='exportation') ) ){ ?>           
              
          <tr >
            <th><h3>N° Ordre</h3></th>
            <th><h3>Désignation</h3></th>
            <th><h3>N° Conteneur</h3></th>
            <th><h3>Type</h3></th>
            <th><h3>Destination</h3></th>
<!--            <th>Prix unitaire</th>
-->            <th><h3>Montant</h3></th>
<!--            <th></th>
            <th>Sous total</th>
-->          </tr>
          </thead>
          <tbody>
          

                                   <?php $count=1;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
                           foreach($conteneurdetails as $conteneurdetails){ 
                               $type='';$montant_conteneur=0;$montant=0; ?>
              
<?php /**/
                       /**/ if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
                              
                                ?> 
              
              <?php //if(isset($conteneurdetails['nature_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination);} ?> - <?php 
                        //if($conteneurdetails['co_type_conteneur']!='') {
                          //if($conteneurdetails['co_type_conteneur']=='20_pieds') { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; $type='20 pieds'; } else { $type_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;$type='40 pieds'; }}  ?>              
              
              <?php //echo output($montant=$type_conteneur+$conteneurdetails['nature_name']->na_montant);?>
                      <tr  >
                      <td><h3><?php echo output($count); $count++; ?></h3></td>
                     <td><h3><?php echo output($facturedetails['t_type_facturation']); ?></h3></td>
                       <td><h3><?php echo output($conteneurdetails['co_numero_conteneur']); ?></h3></td>
                      <td><h3><?php echo output($type);?></h3></td>
                      <td><h3><?php if(isset($conteneurdetails['zone_name']->z_destination)){echo output($conteneurdetails['zone_name']->z_destination) ;} ?> <?php if(isset($conteneurdetails['co_adresse_livraison'])){?> - <?php echo output($conteneurdetails['co_adresse_livraison']) ;} ?></h3></td>
                      <td><h2><?php echo output($montant_conteneurAffiche)?></h2></td>

<!--                          <td>
                        <a class="icon" href="<?php //echo base_url(); ?>facture/conteneurfacture_delete/<?php //echo output($conteneurdetails['co_id']); ?>/<?//= $facturedetails['t_id']; ?>"><i class="fa fa-trash text-danger"></i></a>
                      </td>-->
                    </tr>
              <?php //} ?>
                    <?php 
                              $montanttotal += $montant_conteneur; } ?>
              
              
          </tbody>
        </table>