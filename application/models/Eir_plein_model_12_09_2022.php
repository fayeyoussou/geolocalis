<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class eir_plein_model extends CI_Model{
	
	public function add_eir_plein($data) { 

		return $this->db->insert('trip_mission_eir_plein',$data);
		
/*$dataCompteur_eir_plein = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

return $this->db->insert('trip_compteur_eir_plein', $dataCompteur_eir_plein); */		
	}
	
	public function get_eir_pleindetails($ei_id) { 
		return $this->db->select('*')->from('trip_mission_eir_plein')->where('ei_id',$ei_id)->get()->result_array();
	} 	
	
    
/*	public function getall_facturelist() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	} */
    
	public function getall_facture() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	}    
  
	/**/ public function getall_conteneur() { 
		return $this->db->select('*')->from('trip_conteneur')->get()->result_array();
	}  
    
	public function getall_vechicle() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	} 
    
	public function getall_vehicle_remorque() { 
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	}  
	
	
	public function getall_vehicle_remorque_eir_plein() { 
		   
		$facture = "";
		$conteneur = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$type_conteneur = $this->db->select('co_type_conteneur')->from('trip_conteneur')->where('co_id',$conteneur)->get()->result_array();
		
		if($type_conteneur['co_type_conteneur']=='20_pieds')
		{
			$requete = "vr_type='$Squelette_20' || vr_type='$Plateau_20'";
		}else{
			$requete = "vr_type='$Squelette_40' || vr_type='$Plateau_40'";
		}
			
		// echo (isset($vehicle_remorquedetails) && $vehicle_remorquedetails[0]['vr_type']=='Squelette_20') ? 'selected':'' 
			 
		//	$exist = $this->db->select('*')->from('trips')->where($requete)->get()->result_array();//modifier		
		
		//$remorque = $this->db->select('*')->from('trip_conteneur')->get()->result_array();
		
		return $this->db->select('*')->from('vehicle_remorque')->where($requete)->get()->result_array();
	} 	
    
/*     public function get_numeroeir_plein() { 
			return $this->db->count_all_results('trip_compteur_eir_plein');
}*/	 
	
	
	public function getall_carte_carburantlist() { 
		return $this->db->select('*')->from('fuel_carte_carburant')->get()->result_array();
	}    
 /* Fin Carte carburant*/

    	public function getall_driverlist() { 
		return $this->db->select('*')->from('drivers')->get()->result_array();
	}
    
    /* debut zone*/   
	public function getall_zonelist() { 
		return $this->db->select('*')->from('zone')->get()->result_array();
	} 
    
    
/*	public function getall_vehicleremorque() { 
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	} */
    
/*	public function getall_vehicle_remorquelist() { 
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	} */   
 /* Fin zone*/   

    
    
  /* debut Carte carburant*/   
/*	public function getall_carte_carburantlist() { 
		return $this->db->select('*')->from('fuel_carte_carburant')->get()->result_array();
	} */   
 /* Fin Carte carburant*/
    
    
  /* debut carte péage*/   
/*	public function getall_carte_peagelist() { 
		return $this->db->select('*')->from('fuel_carte_peage')->get()->result_array();
	} */   
 /* Fin carte péage*/
    
  /* debut transitaire*/   
	public function getall_transitairelist() { 
		return $this->db->select('*')->from('transitaire')->get()->result_array();
	}    
 /* Fin transitaire*/        
    
    
  /* debut carte péage*/   
	public function getall_carte_peagelist() { 
		return $this->db->select('*')->from('fuel_carte_peage')->get()->result_array();
	}    
 /* Fin carte péage*/    

    public function getall_eir_plein() { 
		return $this->db->select('*')->from('trip_mission_eir_plein')->order_by('ei_id','desc')->get()->result_array();
		//return $this->db->select('*')->from('compagnie')->order_by('cc_id','desc')->get()->result_array();
	}	
	
	
	
	public function editeir_plein($conteneur) { 
		return $this->db->select('*')->from('trip_mission_eir_plein')->where('ei_conteneur_id',$conteneur)->get()->result_array();
	}
	
/*	public function editeir_plein($e_id) { 
		return $this->db->select('*')->from('trip_mission_eir_plein')->where('ei_id',$e_id)->get()->result_array();
	}	*/
	
	public function updateeir_plein() { 
		$this->db->where('ei_id',$this->input->post('ei_id'));
		return $this->db->update('trip_mission_eir_plein',$this->input->post());
	}
	public function getvechicle_eir_plein($ei_id) { 
		return $this->db->select('*')->from('trip_mission_eir_plein')->where('ie_pr_id',$pr_id)->order_by('ei_id','DESC')->get()->result_array();
	} 
	public function eir_plein_reports($from,$to,$pr_id) { 
		$neweir_plein = array();
		if($pr_id=='all') {
			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to);
		} else {
			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to,'ie_pr_id'=>$pr_id);
		}

        
        		$eir_plein = $this->db->select('*')->from('trips')->where($where)->order_by('t_id','desc')->get()->result_array();
		if(!empty($eir_plein)) {
			foreach ($tripdata as $key => $tripdataval) {
				$neweir_plein[$key] = $tripdataval;
				$neweir_plein[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				$neweir_plein[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['t_vechicle'])->get()->row();
				$neweir_plein[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
/* Debut ajout*/
				$neweir_plein[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$tripdataval['t_zone'])->get()->row();

				$neweir_plein[$key]['t_destinataire_details'] =   $this->db->select('*')->from('destinataire')->where('d_id',$tripdataval['t_destinataire'])->get()->row();

				$neweir_plein[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$tripdataval['t_carte_carburant'])->get()->row();

				$neweir_plein[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$tripdataval['t_carte_peage'])->get()->row();
                
                
/* Fin ajout*/
                
            }
			return $neweir_plein;
		}
        
        else 
		{
			return array();
		}
	}
	
	
/*BEGIN AJAX*/	
	
	
/*	function fetch_mission($ei_mission_id)
 { 
  		
//  $this->db->where('mi_id', $ei_mission_id);
//  $this->db->order_by('co_id', 'ASC');
  $query = $this->db->get('trip_mission');
  $row = $query->result();	 

//  $output .= ".$row->mi_conteneur_id.";
//  $output .= '<option value="'.$row->co_id.'">'.$row->co_numero_conteneur.'</option>';

  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->co_id.'">'.$row->co_numero_conteneur.'</option>';
  }
  return $output;
 }*/
	
 function fetch_mission()
 {
 // $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("trip_mission");
  return $query->result();
 }	
	
	
 function fetch_information_mission($ei_mission_id)
 { 
 /* 
  $this->db->where('mi_id', $ei_mission_id);
  $this->db->order_by('mi_id', 'ASC');
  $query = $this->db->get('trip_mission');

	echo $query = "SELECT v_name,mi_conteneur_id,mi_numero FROM
trip_mission,trips,trip_conteneur,drivers,vehicles,vehicle_remorque,compagnie_lieu_restitution,compagnie
WHERE
mi_id=11 AND t_id=mi_trip_id AND co_id=mi_conteneur_id 
AND vr_id=mi_vehicle_remorque_id 
AND t_compagnie=cc_id AND cc_id=clr_compagnie_id
 AND d_id=mi_driver_id GROUP BY mi_id"; //exit;*/

/*	   $this->db->where("mi_id=$ei_mission_id AND t_id=mi_trip_id AND co_id=mi_conteneur_id 
AND vr_id=mi_vehicle_remorque_id 
AND t_compagnie=cc_id AND cc_id=clr_compagnie_id
 AND d_id=mi_driver_id");
  $this->db->group_by('mi_id');
  $query = $this->db->get('trip_mission,trips,trip_conteneur,drivers,vehicles,vehicle_remorque,compagnie_lieu_restitution,compagnie');*/

/*      $this->db->select("mi_conteneur_id,mi_numero");
	  $this->db->from('trip_mission');
	  $this->db->join('trips', 'trips.t_id=trip_mission.mi_trip_id','LEFT');
//	  $this->db->join('vehicle_group', 'vehicle_group.gr_id=vehicles.v_group','LEFT');
//	  $this->db->order_by('v_id','desc');
	 // $query = $this->db->get();	 
 // $this->db->group_by('mi_id');
	 //  $query = $this->db->get('trip_mission,trips');
	  $query = $this->db->get();*/

      $this->db->select("mi_conteneur_id,mi_numero,t_num_facture,co_numero_conteneur,v_name,d_name,vr_name");
	  $this->db->from('trip_mission');
	  $this->db->join('trips', 'trips.t_id=trip_mission.mi_trip_id','LEFT');
	  $this->db->join('trip_conteneur', 'trip_conteneur.co_trip_id=trip_mission.mi_trip_id','LEFT');
	  $this->db->join('vehicles', 'vehicles.v_id=trip_mission.mi_vehicle_id','LEFT');
	  $this->db->join('drivers', 'drivers.d_id=trip_mission.mi_driver_id','LEFT');
	  $this->db->join('vehicle_remorque', 'vehicle_remorque.vr_id=trip_mission.mi_vehicle_remorque_id','LEFT');
/*	  $this->db->join('trips', 'trips.t_id=trip_mission.mi_trip_id','LEFT');
	  $this->db->join('vehicle_group', 'vehicle_group.gr_id=vehicles.v_group','LEFT');
	  $this->db->order_by('v_id','desc');*/
	  $query = $this->db->get();	 
	 
	 /*	 $where = "mi_id='$ei_mission_id'";
  $information = $this->db->select('*')->from('trip_mission')->where($where)->get()->result_array();*/
	 
	 
//$query = $this->db->query("YOUR QUERY");

$row = $query->row();

if (isset($row))
{

//echo "bonjour";exit;	 
	 
	 
/*	 if(isset($information[0]['mi_id'])) {

		 $newinformation[$key] = $information;*/

		 
		 
		 
/*				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();*/
	// }	 
	 
/*	  $output = '<option value="">Selectionnez le mission</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->mi_id.'">'.$row->mi_numero.'</option>';
  }*/
	 
//  $row = $query->result();
	 
$output = '

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Mission</th>
                      <th>Facture</th>
                      <th>Conteneur</th>
                      <th>Véhicule</th>
                      <th>Chauffeur</th>
                      <th>Remorque</th>
<!--                      <th>Chauffeur</th>
                      <th>Remorque</th>-->
					 </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>'.$row->mi_numero.'</td>
                      <td>'.$row->t_num_facture.'</td>
                      <td>'.$row->co_numero_conteneur.'</td>
                      <td>'.$row->v_name.'</td>
                      <td>'.$row->d_name.'</td>
                      <td>'.$row->vr_name.'</td>

                   
                  </tbody>
                </table>
			   ';	 
}
//	$output = 'numéro' .$row->mi_numero.' zz'.$row->mi_id.'';

  return $output;
 }	
	
/*END AJAX*/	
	
	
 function fetch_pregate()
 {
  $this->db->order_by("pr_date_reception", "ASC");
  $query = $this->db->get("trip_pregate");
  return $query->result();
 }	

 function fetch_conteneur($mi_trip_id)
 { 
  $this->db->where('co_trip_id', $mi_trip_id);
  $this->db->order_by('co_id', 'ASC');
  $query = $this->db->get('trip_conteneur');
  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->co_id.'">'.$row->co_numero_conteneur.'</option>';
  }
  return $output;
 }		
	
} 