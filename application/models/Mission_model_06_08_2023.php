<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mission_model extends CI_Model{
	
	public function add_mission($data) { 

		  $this->db->insert('trip_mission',$data);
		
		
/**/$dataCompteur_mission = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

return $this->db->insert('trip_compteur_mission', $dataCompteur_mission);
	}
	
    public function getall_mission_non_valide() { 
	
		$requete="";
		$requete="mi_validation=0";		
		$missions = $this->db->select('*')->from('trip_mission')->where($requete)->order_by('mi_id','desc')->get()->result_array();
		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
			}
			return $newtripdata;
		} else {
			return array();
		}

	} 	
	
	public function updatemission($data) { 
		$this->db->where('mi_id',$this->input->post('mi_id'));
		return $this->db->update('trip_mission',$data);
//		return $this->db->update('trip_mission',$this->input->post());
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
	
		public function getall_lieu_livraison() { 
		return $this->db->select('*')->from('trip_mission_lieu_livraison')->get()->result_array();
	}  
	
/**/		public function getall_lieulivraison() { 
		return $this->db->select('*')->from('trip_mission_lieu_livraison')->get()->result_array();
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
    
/* 42 01 2023
public function getall_mission() { 


		$requete="";
		$requete="v_id=mi_vehicle_id AND mi_trip_id=t_id AND mi_driver_id=d_id";
		return $this->db->select('mi_id,mi_numero,v_registration_no,mi_date_mission,d_name,mi_annulation,t_num_facture')->from('trip_mission,vehicles,trips,drivers')->where($requete)->order_by('mi_id','desc')->group_by('mi_id')->get()->result_array();	

	} */

	public function getall_mission() { 
		$missions = $this->db->select('*')->from('trip_mission')->order_by('mi_id','desc')->get()->result_array();
		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
				/**/
			}
			return $newtripdata;
		} else {
			return array();
		}

	} 	

/*DEBUT LIVRAISON*/	
	public function getall_mission_livraison() { 
		$requete = "LIVRAISON";		
		$missions = $this->db->select('*')->from('trip_mission')->where('mi_type_mission',$requete)->order_by('mi_id','desc')->get()->result_array();
		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
				/**/
			}
			return $newtripdata;
		} else {
			return array();
		}

	}	
/*FIN LIVRAISON*/	
	
/*DEBUT MISE A TERRE */
	public function getall_mission_mise_a_terre() { 
		$requete = "MISE_A_TERRE";		
		$missions = $this->db->select('*')->from('trip_mission')->where('mi_type_mission',$requete)->order_by('mi_id','desc')->get()->result_array();
		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
				/**/
			}
			return $newtripdata;
		} else {
			return array();
		}

	}	
/*FIN MISE A TERRE*/	

/*DEBUT DECROCHAGE*/
	public function getall_mission_decrochage() { 
		$requete = "DECROCHAGE";		
		$missions = $this->db->select('*')->from('trip_mission')->where('mi_type_mission',$requete)->order_by('mi_id','desc')->get()->result_array();

		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
				/**/
			}
			return $newtripdata;
		} else {
			return array();
		}

	}	
/*FIN DECROCHAGE*/	
	
/*DEBUT GARAGE */
	public function getall_mission_garage() { 
		$requete = "GARAGE";		
		$missions = $this->db->select('*')->from('trip_mission')->where('mi_type_mission',$requete)->order_by('mi_id','desc')->get()->result_array();

		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
				/**/
			}
			return $newtripdata;
		} else {
			return array();
		}

	}	
/*FIN GARAGE*/	
	
	public function editmission($mi_id) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
	}
	
/*	public function viewmission_suite($mi_id) { 
	
	
	
		$requete="";
		$requete="mi_trip_id=t_id AND mi_conteneur_id=co_id AND mi_trip_id=pr_trip_id AND mi_id=$mi_id";
		return $this->db->select('pr_numero,mi_conteneur_id,mi_date_mission,mi_numero,mi_type_mission,mi_trip_id')->from('trip_mission,trips,trip_conteneur,trip_pregate')->where($requete)->get()->result_array();	
	

	}	*/
	
	
	public function viewmission_suite($mi_id) { 
		$missions = $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
		if(!empty($missions)) {
			foreach ($missions as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['pregate'] =  $this->db->select('*')->from('trip_pregate')->where('pr_trip_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['facture'] = $this->db->select('*')->from('trips')->where('t_id',$tripdataval['mi_trip_id'])->get()->row();
				$newtripdata[$key]['lieu_livraison'] = $this->db->select('*')->from('trip_mission_lieu_livraison')->where('ll_id',$tripdataval['mi_lieu_livraison'])->get()->row();
				$newtripdata[$key]['conducteur'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['mi_driver_id'])->get()->row();
				$newtripdata[$key]['vehicule'] =   $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['mi_vehicle_id'])->get()->row();
				$newtripdata[$key]['conteneur'] =   $this->db->select('*')->from('trip_conteneur')->where('co_id',$tripdataval['mi_conteneur_id'])->get()->row();
				$newtripdata[$key]['lieu_restitution'] =   $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$tripdataval['mi_lieu_restitution_id'])->get()->row();

				$newtripdata[$key]['type_transport'] =   $this->db->select('*')->from('trip_mission_type_transport')->where('ta_id',$tripdataval['mi_type_transport'])->get()->row();				
				
			}
			return $newtripdata;
		} else {
			return array();
		}

	} /**/	
	
	public function mission_demande_annulation($mi_id) { 

				$requete="";
		$requete="mi_trip_id=pr_trip_id AND v_id=mi_vehicle_id AND co_trip_id=mi_trip_id AND mi_trip_id=t_id AND mi_lieu_restitution_id=clr_id AND mi_driver_id=d_id AND mi_id=$mi_id";
		return $this->db->select('mi_id,v_registration_no,mi_date_mission,pr_numero,clr_name,co_numero_conteneur,d_name,mi_annulation,mi_numero,mi_quantite_carburant,mi_carte_peage_amount,mi_frais_ags,mi_autre_frais,mi_description,pr_numero,pr_id,co_id,co_numero_conteneur,mi_vehicle_id,mi_driver_id,mi_vehicle_remorque_id,mi_carte_peage_id')->from('trip_mission,trip_pregate,vehicles,trip_conteneur,trips,compagnie_lieu_restitution,drivers')->where($requete)->order_by('mi_id','desc')->group_by('mi_id')->get()->result_array();	
		
	//	return $this->db->select('*')->from('trip_mission')->where('mi_id',$mi_id)->get()->result_array();
	}	

	public function getall_bookings($v_id) { 
		$bookings = $this->db->select('*')->from('trips')->where('t_vechicle',$v_id)->order_by('t_id','desc')->get()->result_array();
		if(!empty($bookings)) {
			foreach ($bookings as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				$newtripdata[$key]['t_conteneur'] = $this->db->select('*')->from('trip_conteneur')->where('co_trip_id',$tripdataval['t_id'])->get()->row();
/*				$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
				$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();*/
			}
			return $newtripdata;
		} else {
			return array();
		}

	} 	
	
/*	public function editmission($conteneur) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
	}*/	
	
/*	public function editmission($e_id) { 
		return $this->db->select('*')->from('trip_mission')->where('mi_id',$e_id)->get()->result_array();
	}	*/
	

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
/*$where="";
	 $where=" pr_trip_id NOT IN (SELECT mi_trip_id FROM trip_mission )";	//exit; 

 

	 $this->db->where($where);*/	 

/*  $this->db->order_by("pr_date_reception", "ASC");
  $query = $this->db->get("trip_pregate");
  return $query->result();*/	 
 
		return $this->db->select('*')->from('trip_pregate')->get()->result_array();	 
 }
	
 function fetch_type_transport()
 { 

 // $this->db->order_by("ta_name", "ASC");
/*  $query = $this->db->get("trip_mission_type_transport");
//	   $query = $this->db->get("trip_pregate");
  return $query->result();	 
*/
	 
		return $this->db->select('*')->from('trip_mission_type_transport')->get()->result_array();	 
	 
	 
 }	
	
 function fetch_lieu_transport($mi_type_transport)
 { 

  $query = $this->db->get('trip_mission_lieu_livraison');
  $output = '<option value="">Selectionnez le lieu ok</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->ll_id.'">'.$row->ll_name.'</option>';
  }
  return $output;	 
 }	

 function fetch_conteneur($mi_trip_id)
 { 
	 
	 
 // $this->db->where('bc_compagnie_id', $mi_trip_id);
   $this->db->where('co_trip_id', $mi_trip_id);
 //$this->db->where('co_id NOT IN (SELECT mi_conteneur_id FROM trip_mission)');	 
	 
  //$this->db->where('co_trip_id', $mi_trip_id);
  $this->db->order_by('co_id', 'ASC');
  $query = $this->db->get('trip_conteneur');
  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result_array() as $row)
  {
   $output .= '<option value="'.$row['co_id'].'">'.$row['co_numero_conteneur'].'</option>';
  }

	 
  return $output;
 }	

/*BEGIN LIVRAISON */
 function fetch_conteneur_livraison($mi_trip_id_livraison)
 { 
   $this->db->where('co_trip_id', $mi_trip_id_livraison);
 //  $this->db->where('co_id NOT IN (SELECT mi_conteneur_id FROM trip_mission)');	 
	 
  $this->db->order_by('co_id', 'ASC');
  $query = $this->db->get('trip_conteneur');
  $output = '<option value="">Selectionnez le conteneurA</option>';
  foreach($query->result_array() as $row)
  {
   $output .= '<option value="'.$row['co_id'].'">'.$row['co_numero_conteneur'].'</option>';
  }
	 
  return $output;
 }	
	
 function fetch_bon_carburant_livraison($mi_vehicle_id_livraison)
 { 
$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$mi_vehicle_id_livraison";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = '';
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
	 }
	 

	 if($carburant_restant != ''){
$output = '<h3> La quantité de carburant restante est égale à: '.$carburant_restant.' litres</h3>';		 
	 }else{
$output = '<h3> La quantité de carburant restante est égale à: 0 litre</h3>';		 
	 }


return $output;	 

 }	
/*END LIVRAISON*/	

	
/*BEGIN DECROCHAGE */
 function fetch_conteneur_decrochage($mi_trip_id_decrochage)
 { 
   $this->db->where('co_trip_id', $mi_trip_id_decrochage);
// $this->db->where('co_id NOT IN (SELECT mi_conteneur_id FROM trip_mission)');	 
	 
  $this->db->order_by('co_id', 'ASC');
  $query = $this->db->get('trip_conteneur');
  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result_array() as $row)
  {
   $output .= '<option value="'.$row['co_id'].'">'.$row['co_numero_conteneur'].'</option>';
  }

	 
  return $output;
 }	
	
 function fetch_bon_carburant_decrochage($mi_vehicle_id_decrochage)
 { 
$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$mi_vehicle_id_decrochage";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = '';
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
	 }
	 

	 if($carburant_restant != ''){
$output = '<h3> La quantité de carburant restante est égale à: '.$carburant_restant.' litres</h3>';		 
	 }else{
$output = '<h3> La quantité de carburant restante est égale à: 0 litre</h3>';		 
	 }


return $output;	 

 }	
/*END DECROCHAGE*/	
	
	
/*BEGIN MISE A TERRE */
 function fetch_conteneur_mise_terre($mi_trip_id_mise_terre)
 { 
   $this->db->where('co_trip_id', $mi_trip_id_mise_terre);
// $this->db->where('co_id NOT IN (SELECT mi_conteneur_id FROM trip_mission)');	 
	 
  $this->db->order_by('co_id', 'ASC');
  $query = $this->db->get('trip_conteneur');
  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result_array() as $row)
  {
   $output .= '<option value="'.$row['co_id'].'">'.$row['co_numero_conteneur'].'</option>';
  }

	 
  return $output;
 }	
	
 function fetch_bon_carburant_mise_terre($mi_vehicle_id_mise_terre)
 { 
$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$mi_vehicle_id_mise_terre";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = '';
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
	 }
	 

	 if($carburant_restant != ''){
$output = '<h3> La quantité de carburant restante est égale à: '.$carburant_restant.' litres</h3>';		 
	 }else{
$output = '<h3> La quantité de carburant restante est égale à: 0 litre</h3>';		 
	 }


return $output;	 

 }	
/*END MISE A TERRE*/	

	
/*BEGIN GARAGE / REPARATION*/	
	
 function fetch_bon_carburant_garage($mi_vehicle_id_garage)
 { 
$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$mi_vehicle_id_garage";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = '';
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
	 }
	 

	 if($carburant_restant != ''){
$output = '<h3> La quantité de carburant restante est égale à: '.$carburant_restant.' litres</h3>';		 
	 }else{
$output = '<h3> La quantité de carburant restante est égale à: 0 litre</h3>';		 
	 }


return $output;	 

 }	
/*END MISE A TERRE*/	
	
	
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
	
	
	
	
	
/* BEGIN AJAX VEHICULE - CHAUFFEUR - BON CARBURANT*/	
	
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
	 $requete = "v_id=$mi_vehicle_id";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = '';
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
	 }
	 

	 if($carburant_restant != ''){
$output = '<h3> La quantité de carburant restante est égale à: '.$carburant_restant.' litres</h3>';		 
	 }else{
$output = '<h3> La quantité de carburant restante est égale à: 0 litre</h3>';		 
	 }


return $output;	 

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

	
/*DEBUT TYPE TRANSPORT*/
	
	public function get_mission_type_transport() { 
		return $this->db->select('*')->from('trip_mission_type_transport')->get()->result_array();
	}

	public function mission_type_transport_delete($ta_id) { 

			$this->db->where('ta_id', $ta_id);
    		$this->db->delete('trip_mission_type_transport');
    		return true;
	//	}
	} 	
/*FIN TYPE TRANSPORT*/	
	
/*DEBUT LIEU LIVRAISON*/
	
	public function get_mission_lieu_livraison() { 
		return $this->db->select('*')->from('trip_mission_lieu_livraison')->get()->result_array();
	}

	public function mission_lieu_livraison_delete($ta_id) { 

			$this->db->where('ll_id', $ta_id);
    		$this->db->delete('trip_mission_lieu_livraison');
    		return true;
	//	}
	} 	
/*FIN LIEU LIVRAISON*/	
	
	
/*DEBUT REPORT JOURNAL*/
	
	public function ags_reports($from,$to,$facture) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
		
		if($facture=='all') {
			$where = array('tja_date>='=>$from,'tja_date<='=>$to);
		} else {
			$where = array('tja_date>='=>$from,'tja_date<='=>$to,'tja_mi_v_id'=>$facture);
		}
		
		
		$incomexpense = $this->db->select('*')->from('trip_journal_ags')->where($where)->order_by('tja_id','desc')->get()->result_array();//exit;
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				/*$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();*/

				$newincomexpense[$key]['mission'] =  $this->db->select('mi_numero')->from('trip_mission')->where('mi_id',$incomexpenses['tja_mi_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				$newincomexpense[$key]['vech_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$incomexpenses['tja_mi_v_id'])->get()->row(); 		
				
				
				$newincomexpense[$key]['incomeexpense'] =  $this->db->select('ie_numero_enregistrement')->from('incomeexpense')->where('ie_id',$incomexpenses['tja_ie_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/*			$newincomexpense[$key]['customer'] =  $this->db->selesct('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();*/					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
/*FIN REPORT AGS*/	


/*DEBUT REPORT JOURNAL*/
	
	public function reports_journal($from,$to,$type_transport) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
		
		if($type_transport=='all') {
			$where = array('mi_date_mission>='=>$from,'mi_date_mission<='=>$to);
		} else {
			$where = array('mi_date_mission>='=>$from,'mi_date_mission<='=>$to,'mi_type_transport'=>$type_transport);
		}
		
		
		$incomexpense = $this->db->select('*')->from('trip_mission')->where($where)->order_by('mi_id','desc')->get()->result_array();//exit;
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				/*$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();*/

				/*$newincomexpense[$key]['mission'] =  $this->db->select('mi_numero')->from('trip_mission')->where('mi_id',$incomexpenses['tja_mi_id'])->get()->row();*/// pour afficher les noms des banques receptrices
				
				/*$newincomexpense[$key]['vech_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$incomexpenses['tja_mi_v_id'])->get()->row(); 		
				
				
				$newincomexpense[$key]['incomeexpense'] =  $this->db->select('ie_numero_enregistrement')->from('incomeexpense')->where('ie_id',$incomexpenses['tja_ie_id'])->get()->row();*/// pour afficher les noms des banques receptrices
				
				
/*			$newincomexpense[$key]['customer'] =  $this->db->selesct('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();*/					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
/*FIN REPORT JOURNAL*/	
	
} 