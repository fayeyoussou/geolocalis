<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mission_model extends CI_Model{
	
	public function add_mission($data) { 

		$this->db->insert('trip_mission',$data);
		//$data['website_setting'] = $this->db->select('*')->from('settings')->get()->result_array();		
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

	public function get_demande_annulation($mi_id) { 
	
		$requete = "mo_mission_id=$mi_id";
		return $this->db->select('*')->from('trip_mission_motif_annulation')->where($requete)->get()->result_array();
	} 
	
	public function get_demande_annulationlist() { 

		$requete="";
		$statut=0;
		//$requete="";
		$requete="mi_trip_id=pr_trip_id AND v_id=mi_vehicle_id AND co_trip_id=mi_trip_id AND mi_trip_id=t_id AND mi_lieu_restitution_id=clr_id AND mi_driver_id=d_id AND ta_id=mo_motif_id AND mi_validation=$statut";
		return $this->db->select('mi_id,v_registration_no,mi_date_mission,pr_numero,clr_name,co_numero_conteneur,d_name,mi_annulation,ta_name,mi_validation')->from('trip_mission,trip_pregate,vehicles,trip_conteneur,trips,compagnie_lieu_restitution,drivers,trip_mission_type_annulation,trip_mission_motif_annulation')->where($requete)->order_by('mi_id','desc')->group_by('mi_id')->get()->result_array();		
		
/*		$requete = "mo_mission_id=mi_id";
		return $this->db->select('*')->from('trip_mission_motif_annulation,trip_mission')->where($requete)->get()->result_array();*/
	} 	
	
		public function websitesetting_price() { 
		return $this->db->select('*')->from('settings')->get()->result_array();		
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
    
	public function getall_bon_carburant() { 
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


		$requete="";
		$requete="v_id=mi_vehicle_id AND mi_trip_id=t_id AND mi_driver_id=d_id";
		return $this->db->select('mi_id,mi_numero,v_registration_no,mi_date_mission,d_name,mi_annulation,t_num_facture')->from('trip_mission,vehicles,trips,drivers')->where($requete)->order_by('mi_id','desc')->group_by('mi_id')->get()->result_array();	

/*

		$requete="";
		$requete="mi_trip_id=pr_trip_id AND v_id=mi_vehicle_id AND co_trip_id=mi_trip_id AND mi_trip_id=t_id AND mi_lieu_restitution_id=clr_id AND mi_driver_id=d_id";
		return $this->db->select('mi_id,mi_numero,v_registration_no,mi_date_mission,pr_numero,clr_name,co_numero_conteneur,d_name,mi_annulation,t_num_facture')->from('trip_mission,trip_pregate,vehicles,trip_conteneur,trips,compagnie_lieu_restitution,drivers')->where($requete)->order_by('mi_id','desc')->group_by('mi_id')->get()->result_array();	

*/		

	} 
	
	
	public function editmission($mi_id) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
	}
	
	public function mission_demande_annulation($mi_id) { 

				$requete="";
		$requete="mi_trip_id=pr_trip_id AND v_id=mi_vehicle_id AND co_trip_id=mi_trip_id AND mi_trip_id=t_id AND mi_lieu_restitution_id=clr_id AND mi_driver_id=d_id AND mi_id=$mi_id";
		return $this->db->select('mi_id,v_registration_no,mi_date_mission,pr_numero,clr_name,co_numero_conteneur,d_name,mi_annulation,mi_numero,mi_quantite_carburant,mi_carte_peage_amount,mi_frais_ags,mi_autre_frais,mi_description,pr_numero,pr_id,co_id,co_numero_conteneur,mi_vehicle_id,mi_driver_id,mi_vehicle_remorque_id,mi_carte_peage_id')->from('trip_mission,trip_pregate,vehicles,trip_conteneur,trips,compagnie_lieu_restitution,drivers')->where($requete)->order_by('mi_id','desc')->group_by('mi_id')->get()->result_array();	
		
	//	return $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
	}	
	
	
/*	public function editmission($conteneur) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
	}*/	
	
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
  $output = '<option value="">Selectionnez le conteneur ok</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->co_id.'">'.$row->co_numero_conteneur.'</option>';
  }
  return $output;
 }	
	
 function fetch_lieu_restitution($mi_trip_id)
 { 
  
  $where = ""; 	 
 /* $where = "";	*/ 
	 $where = "t_id=$mi_trip_id AND t_compagnie=cc_id AND cc_id=clr_compagnie_id";
  $this->db->where($where);
//  $this->db->where('t_id', $mi_trip_id,'t_compagnie','clr_compagnie_id');
  $this->db->order_by('clr_id', 'ASC');
  $query = $this->db->get('trips,compagnie,compagnie_lieu_restitution');
  $output = '<option value="">Selectionnez le lieu</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->clr_id.'">'.$row->clr_name.'</option>';
  }
  return $output;
 }	
	
 function fetch_country()
 {
 // $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("trip_pregate");
  return $query->result();
 }	
	

	
/*	27 08 2022
 function fetch_country()
 {
  $this->db->order_by("country_name", "ASC");
  $query = $this->db->get("country");
  return $query->result();
 }	
	
	*/

 function fetch_state($country_id)
 { //echo "zer";
  $this->db->where('country_id', $country_id);
  $this->db->order_by('state_name', 'ASC');
  $query = $this->db->get('state');
  $output = '<option value="">Select State model</option>';
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
	
	
	
/* BEGIN AJAX VEHICULE - CHAEUFFEUR - BON CARBURANT*/	
	
	 function fetch_vehicule_bc()
 {
  $this->db->order_by("v_name", "ASC");
  $query = $this->db->get("vehicles");
  return $query->result();
 }	

 function fetch_bon_carburant($mi_vehicle_id)
 { 
$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "bc_vehicule_id=$mi_vehicle_id";
//	 $requete = "bc_vehicule_id=$mi_vehicle_id";
//	   $this->db->where('bc_vehicule_id', $mi_vehicle_id);

//	   $this->db->where('bc_vehicule_id', $mi_vehicle_id,'bc_vehicule_id', $mi_vehicle_id);
  $this->db->where($requete);
  $this->db->order_by('bc_id', 'desc');
  $query = $this->db->get('fuel_bon_carburant');
$row_quantite = $query->row();
	 $carburant_restant = '';
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->bc_restant;		 
	 }
	 
/*  03 01 2023
$row_quantite = $query->row();
	 $carte_carburant = '';
	 $carte_carburant = $row_quantite->bc_carte_id;

	 $carburant_restant = '';
	 $carburant_restant = $this->db->select('cc_restant')->from('fuel_carte_carburant')->where('cc_id', $carte_carburant)->get()->row()->cc_restant;*/
	 if($carburant_restant != ''){
$output = '<h3> La quantité de carburant restante est égale à: '.$carburant_restant.' litres</h3>';		 
	 }else{
$output = '<h3> La quantité de carburant restante est égale à: 0 litre</h3>';		 
	 }

/*	 $output = '<input type="text" value="'.$row_quantite->bc_restant.'" name="mi_quantite_carburant" id="mi_quantite_carburant" class="form-control" placeholder="Quantité carburant" readonly>';*/
		 

  
	// $output = '<input type="text" value="" name="mi_quantite_carburant" id="mi_quantite_carburant" class="form-control" placeholder="Quantité carburant">';
return $output;	 
	 /* 17 10 2022  - MODIFICATION LISTE PAR CHAMP INPUT
	
	 
	 $output = '<option value="">le bon de carburant</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->bc_id.'">'.$row->bc_numero.' - Quantité: '.$row->bc_restant.'</option>';
  }
  return $output;*/
 

 
 }	
	
	
	
	
 function fetch_bon_carburant_quantite($mi_bon_carburant_id)
 { //exit;
  $this->db->where('bc_id', $mi_bon_carburant_id);
//  $this->db->order_by('bc_id', 'ASC');
  $query = $this->db->get('fuel_bon_carburant');
   $row_quantite = $query->row();
//  $output = '<input type="text" value="'.$row_quantite->bc_restant.'" name="mi_quantite_carburant" id="mi_quantite_carburant" class="form-control" placeholder="Quantité carburant">';

  
	 $output = '<input type="text" value="" name="mi_quantite_carburant" id="mi_quantite_carburant" class="form-control" placeholder="Quantité carburant">';
/*  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->bc_id.'">'.$row->bc_numero.'</option>';
  }*/
  return $output;
 }		
	
	
/* BEGIN AJAX VEHICULE - BON CARBURANT*/	
	
	
	public function getById($id)
	{
		return $this->db->get_where($this->table, [ $this->table_key => $id ])->row();
	}
	

		public function get_eir_vide($mi_id) { 

		 $where = "mi_id=ei_mission_id AND ei_mission_id=$mi_id";
//'ie_date,ei_heure,ei_numero_transaction'
		$return = $this->db->select('*')->from('trip_mission_eir_vide,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();
//		$eir_plein = $this->db->select('*')->from('trip_mission_eir_plein,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();
/*		if(!empty($eir_vide)) {
			foreach ($eir_vide as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				//$newtripdata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				//$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
			}
			return $newtripdata;
		} else {
			return array();
		}*/

	} 
/*END SHOW EIR VIDE*/	
	
	
		public function get_eir_plein($mi_id) { 

		 $where = "mi_id=ei_mission_id AND ei_mission_id=$mi_id";
//'ie_date,ei_heure,ei_numero_transaction'
		$return = $this->db->select('*')->from('trip_mission_eir_plein,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();

/*			if(!empty($eir_plein)) {
			foreach ($eir_plein as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;

			}
			return $newtripdata;
		} else {
			return array();
		}*/

	} 
/*END SHOW FACTURE*/	
	
/*	public function get_missiondetails($mi_id) { 
		
		return $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
	}*/ 		

	public function get_mission_type_annulation() { 
		return $this->db->select('*')->from('trip_mission_type_annulation')->get()->result_array();
	}

	public function mission_type_annulation_delete($ta_id) { 
/*		$groupinfo = $this->db->select('*')->from('vehicles')->where('v_group',$gr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {*/
			$this->db->where('ta_id', $ta_id);
    		$this->db->delete('trip_mission_type_annulation');
    		return true;
	//	}
	} 	

	public function get_mission_motif_perte() { 
		return $this->db->select('*')->from('trip_mission_motif_perte')->get()->result_array();
	}

	public function mission_motif_perte_delete($mp_id) { 

			$this->db->where('mp_id', $mp_id);
    		$this->db->delete('trip_mission_motif_perte');
    		return true;
	//	}
	} 	
	
} 