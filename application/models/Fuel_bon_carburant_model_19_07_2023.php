<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_bon_carburant_model extends CI_Model{
	
	public function add_fuel_bon_carburant($data) { 
		return  $this->db->insert('fuel_carte_carburant_recharge_payments',$data);
		
$dataCompteur_bon_carburant = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

return $this->db->insert('trip_compteur_bon_carburant', $dataCompteur_bon_carburant);		
		
	} 
	
     public function get_numerocarburant() { 
			return $this->db->count_all_results('trip_compteur_bon_carburant');
}	
	
	public function getall_fuel_bon_carburant_reports($from,$to,$vehicle){ 
		//fuel_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($vehicle=='all') {
			$where = array('bc_date >='=>$from,'bc_date<='=>$to);
		} else {
			$where = array('bc_date >='=>$from,'bc_date<='=>$to,'bc_vehicule_id'=>$vehicle);
		}
		$fuel = $this->db->select('*')->from('fuel_bon_carburant')->where($where)->order_by('bc_id','desc')->get()->result_array();
		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name,v_quantite_restant')->from('vehicles')->where('v_id',$fuels['bc_vehicule_id'])->get()->row();
				$newfuel[$key]['compagnie'] =  $this->db->select('ccc_name')->from('fuel_carte_carburant_compagnie')->where('ccc_id',$fuels['bc_compagnie_id'])->get()->row();
			}
			return $newfuel;
		} else {
			return false;
		}
	}	
	
	
    public function getall_fuel_bon_carburant() { 
		
/*
		$requete="";
		$requete="bc_vehicule_id=v_id AND bc_compagnie_id=ccc_id";
		return $this->db->select('*')->from('fuel_bon_carburant,vehicles,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();*/		
		
		
		$fuel_bon_carburant = $this->db->select('*')->from('fuel_bon_carburant')->order_by('bc_id','desc')->get()->result_array();
		if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vehicule'] =  $this->db->select('v_registration_no,v_name,v_quantite_restant')->from('vehicles')->where('v_id',$fuel_bon_carburants['bc_vehicule_id'])->get()->row();
				$newfuel_bon_carburant[$key]['chauffeur'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['bc_driver_id'])->get()->row();
				$newfuel_bon_carburant[$key]['compagnie'] =  $this->db->select('ccc_name')->from('fuel_carte_carburant_compagnie')->where('ccc_id',$fuel_bon_carburants['bc_compagnie_id'])->get()->row();				
			}
			return $newfuel_bon_carburant;
		} else {
			return false;
		}
	} 
	
    public function getall_fuel_bon_carburant_paiement() { 
		
		$requete="";
		$requete="ccrp_compagnie_id=ccc_id";
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();		

	} 	

    public function getall_fuel_bon_carburant_paiement_non_valide() { 
		
/**/
		$requete="";
		//$statutType = "N";
		$requete="ccrp_compagnie_id=ccc_id AND ccrp_statut=0";
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();		

	} 	
	
    public function getall_fuel_bon_carburant_non_valide() { 
		
/**/
		$requete="";
		$statutType = 0;
		$requete="bc_vehicule_id=v_id AND bc_compagnie_id=ccc_id AND bc_type=0";
		return $this->db->select('*')->from('fuel_bon_carburant,vehicles,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();		
		
/*		$fuel_bon_carburant = $this->db->select('*')->from('fuel_bon_carburant')->where($where)->order_by('v_fuel_bon_carburant_id','desc')->get()->result_array();
		if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_bon_carburants['v_id'])->get()->row();
				$newfuel_bon_carburant[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['v_fuel_bon_carburantaddedby'])->get()->row();
			}
			return $newfuel_bon_carburant;
		} else {
			return false;
		}*/		

	}	

/*BEGIN PAIEMENT BC*/	
  
	public function getpaiement_fuel_bon_carburant() { 
	
		
	 return $this->db->select('*')->from('fuel_bon_carburant')->order_by('bc_id','desc')->get()->result_array();

	} 	
/*END PAIEMENT BC*/		
	
	public function getallpaiement_fuel_bon_carburant() { 
		
		
		$where = "";
		$where= "ccc_id=ccrp_bon_carburant_id ";//exit;

		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_carte_carburant_compagnie')->where($where)->order_by('ccrp_bon_carburant_id','desc')->group_by('ccrp_bon_carburant_id')->get()->result_array();		
		
/*		$where = "";
		$where= "cc_id=ccrp_carte_carburant_id ";//exit;

		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,incomeexpense,fuel_carte_carburant')->where($where)->order_by('ccrp_incomeexpense_id','desc')->group_by('ccrp_incomeexpense_id')->get()->result_array();*/

	}
	
	/*END PREGATE INSTANCE LIST*/	
	
	public function fuel_bon_carburant_quantitevehicule($f_id) { 
		return $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id',$f_id)->get()->result_array();
	}
	
	
	public function editfuel_bon_carburant($f_id) { 
		return $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id',$f_id)->get()->result_array();
	}
	
	
	public function updatefuel_bon_carburant() { 
		$this->db->where('bc_id',$this->input->post('bc_id'));
		return $this->db->update('fuel_bon_carburant',$this->input->post());
	}

	public function fuel_bon_carburant_reports($from,$to,$bc_vehicule_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('bc_date >='=>$from,'bc_date<='=>$to);
		} else {
			$where = array('bc_date >='=>$from,'bc_date<='=>$to,'bc_vehicule_id'=>$bc_vehicule_id);
		}
		$fuel_bon_carburant = $this->db->select('*')->from('fuel_bon_carburant')->where($where)->order_by('v_fuel_bon_carburant_id','desc')->get()->result_array();
		if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_bon_carburants['v_id'])->get()->row();
				$newfuel_bon_carburant[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['v_fuel_bon_carburantaddedby'])->get()->row();
			}
			return $newfuel_bon_carburant;
		} else {
			return false;
		}
	} 

/* debut carte péage*/
	
	public function get_carte_peage() { 
		return $this->db->select('*')->from('carte_peage')->get()->result_array();
	}
	public function carte_peage_delete($gr_id) { 
		$groupinfo = $this->db->select('*')->from('vehicles')->where('v_group',$gr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('gr_id', $gr_id);
    		$this->db->delete('carte_peage');
    		return true;
		}
	} 	
/* debut carte péage*/	
	
	
    public function get_restant_fuel_carte_carburant() { 
		//return $this->db->select('*')->from('fuel_carte_carburant')->order_by('cc_id','desc')->get()->result_array();
		
		$requete="";
		$requete="ccc_id=cc_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_carburant,fuel_carte_carburant_compagnie')->where($requete)->order_by('cc_id','desc')->get()->result_array();		
	} 	

	
	public function journal($from,$to,$v_id) { 
		$fuel_bon_carburant = array();
		if($v_id=='all') {
			$where = array('bc_date>='=>$from,'bc_date<='=>$to);
		} else {
			$where = array('bc_date>='=>$from,'bc_date<='=>$to,'bc_vehicule_id'=>$v_id);
		}
		
		$fuel_bon_carburant = $this->db->select('*')->from('fuel_bon_carburant')->where($where)->order_by('bc_id','desc')->get()->result_array();
		if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_bon_carburants['bc_vehicule_id'])->get()->row();
				$newfuel_bon_carburant[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['bc_driver_id'])->get()->row();
			}
			return $newfuel_bon_carburant;
		} else 
		{
			return array();
		}
	}	
	
/*BEGIN DEMANDE PAIEMENT*/
 function fetch_station_service()
 { 
/*$where="";
	 $where=" pr_trip_id NOT IN (SELECT mi_trip_id FROM trip_mission )";	//exit; 

 

	 $this->db->where($where);	*/ 

  $this->db->order_by("ccc_name", "ASC");
  $query = $this->db->get("fuel_carte_carburant_compagnie");
  return $query->result();	 
 
	 
 
}
	
 function fetch_numero_bon_commande($mi_trip_id)
 { 
  $this->db->where('bc_compagnie_id', $mi_trip_id);
  $this->db->order_by('bc_id', 'ASC');
  $query = $this->db->get('fuel_bon_carburant');
  $output = '<option value="">Selectionnez le conteneur ok</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->bc_id.'">'.$row->bc_numero.'</option>';
  }
  return $output;
 }
	
 function fetch_conteneur($mi_trip_id)
 { 
/*$where="bc_id NOT IN (SELECT ccrp_bon_carburant_id FROM fuel_carte_carburant_recharge_payments )";
return $this->db->select('*')->from('trips')->where($where)->get()->result_array();	*/ 
	 
	 
  $this->db->where('bc_compagnie_id', $mi_trip_id);
  $this->db->where('bc_id NOT IN (SELECT ccrp_bon_carburant_id FROM fuel_carte_carburant_recharge_payments)');	 
  $this->db->order_by('bc_id', 'ASC');
  $query = $this->db->get('fuel_bon_carburant');	 
  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->bc_id.'">'.$row->bc_numero.'</option>';
  }
  return $output;
 }	
	
/*END DEMANDE PAIEMENT*/	
	
/*	public function journal($from,$to,$v_id) { 
		$newtripdata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}*/	
	
} 