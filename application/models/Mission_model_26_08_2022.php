<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mission_model extends CI_Model{
	
	public function add_mission($data) { 

		$this->db->insert('trip_mission',$data);
		
$dataCompteur_mission = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

return $this->db->insert('trip_compteur_mission', $dataCompteur_mission); 		
	}
	
//https://www.webslesson.info/2018/06/codeigniter-dynamic-dependent-select-box-using-ajax.html	

	public function get_missiondetails($mi_id) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
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
	
	
	public function getall_vehicle_remorque_mission() { 
		   
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
    
     public function get_numeromission() { 
			return $this->db->count_all_results('trip_compteur_mission');
}	 
	
	
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
    
    public function getall_mission() { 
		$mission = $this->db->select('*')->from('trip_mission')->order_by('mi_id','desc')->get()->result_array();
		if(!empty($mission)) {
			foreach ($mission as $key => $missions) {
				$newmission[$key] = $missions;
				//$newmission[$key]['mi_conteneur'] =  $this->db->select('mi_conteneur')->from('trip_mission')->where('mi_id',$missions['mi_trip'])->get()->row();
//				$newmission[$key]['t_num_facture'] =  $this->db->select('t_num_facture')->from('trips')->where('pr_id',$missions['pr_trip'])->get()->row();
			}
			return $newmission;
		} else 
		{
			return false;
		}
	} 
	public function editmission($conteneur) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
	}
	
/*	public function editmission($e_id) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_id',$e_id)->get()->result_array();
	}	*/
	
	public function updatemission() { 
		$this->db->where('mi_id',$this->input->post('mi_id'));
		return $this->db->update('trip_mission',$this->input->post());
	}
	public function getvechicle_mission($mi_id) { 
		return $this->db->select('*')->from('trip_mission')->where('ie_pr_id',$pr_id)->order_by('mi_id','DESC')->get()->result_array();
	} 
	public function mission_reports($from,$to,$pr_id) { 
		$newmission = array();
		if($pr_id=='all') {
			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to);
		} else {
			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to,'ie_pr_id'=>$pr_id);
		}

        
        		$mission = $this->db->select('*')->from('trips')->where($where)->order_by('t_id','desc')->get()->result_array();
		if(!empty($mission)) {
			foreach ($tripdata as $key => $tripdataval) {
				$newmission[$key] = $tripdataval;
				$newmission[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				$newmission[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['t_vechicle'])->get()->row();
				$newmission[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
/* Debut ajout*/
				$newmission[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$tripdataval['t_zone'])->get()->row();

				$newmission[$key]['t_destinataire_details'] =   $this->db->select('*')->from('destinataire')->where('d_id',$tripdataval['t_destinataire'])->get()->row();

				$newmission[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$tripdataval['t_carte_carburant'])->get()->row();

				$newmission[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$tripdataval['t_carte_peage'])->get()->row();
                
                
/* Fin ajout*/
                
            }
			return $newmission;
		}
        
        else 
		{
			return array();
		}
	}
/*BEGIN AJAX*/	
	
 function fetch_country()
 {
  $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("country");
  return $query->result();
 }

 function fetch_state($country_id)
 { echo "zer";
  $this->db->where('country_id', $country_id);
  $this->db->order_by('state_name', 'ASC');
  $query = $this->db->get('state');
  $output = '<option value="">Select State model</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'hgjhhhghg</option>';
  }
  return $output;
 }

 function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
  }
  return $output;
 }	
	
	
/*	function ajax_pregate_conteneur($pr_trip_id)
 {
  $this->db->where('co_trip_id', $pr_trip_id);
  $this->db->order_by('co_numero_conteneur', 'ASC');
  $query = $this->db->get('trip_conteneur');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->co_id.'">'.$row->co_numero_conteneur.'</option>';
  }
  return $output;
 }*/

	
/*function fetch_country()
 { //exit;
  $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("country");
  return $query->result();
 }

 function fetch_state($country_id)
 {exit;
  $this->db->where('country_id', $country_id);
  $this->db->order_by('state_name', 'ASC');
  $query = $this->db->get('state');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
  }
  return $output;
 }

 function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
  }
  return $output;
 }	*/
	
/*END AJAX*/	
	
	
	
	
} 