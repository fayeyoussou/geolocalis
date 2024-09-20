<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_bon_carburant_model extends CI_Model{
	
	public function add_fuel_bon_carburant($data) { 
		unset($data['exp']);
		return	$this->db->insert('fuel_bon_carburant',$data);
	} 
    public function getall_fuel_bon_carburant() { 
		
/**/
		$requete="";
		$requete="bc_vehicule_id=v_id AND bc_carte_id=cc_id";
		return $this->db->select('*')->from('fuel_bon_carburant,vehicles,fuel_carte_carburant')->where($requete)->get()->result_array();		
		
		
/*			return $this->db->select('*')->from('fuel_bon_carburant')->order_by('bc_id','desc')->get()->result_array();
	if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_bon_carburants['bc_vehicule_id'])->get()->row();
				$newfuel_bon_carburant[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['bc_driver_id'])->get()->row();
			}
			return $newfuel_bon_carburant;
		} else 
		{
			return false;
		}*/
	} 

/*BEGIN PAIEMENT BC*/	
  
	public function getpaiement_fuel_bon_carburant() { 
	/*	$where = "";
		//$where= "t_transitaire=tra_id AND cc_id=t_compagnie ";//exit;
		//t_transitaire=tra_id AND cc_id=t_compagnie 
	  	$where = "bc_id NOT IN (SELECT ccrp_bc_id FROM fuel_carte_carburant_recharge_payments)";//exit;

		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_bon_carburant')->where($where)->order_by('bc_id','desc')->group_by('bc_id')->get()->result_array();	*/	
		
	 return $this->db->select('*')->from('fuel_bon_carburant')->order_by('bc_id','desc')->get()->result_array();

	} 	
/*END PAIEMENT BC*/		
	
	public function getallpaiement_fuel_bon_carburant() { 
		$where = "";
		$where= "cc_id=ccrp_carte_carburant_id AND ie_id=ccrp_incomeexpense_id ";//exit;
		//t_transitaire=tra_id AND cc_id=t_compagnie 
	 /* 	$where = "bc_id NOT IN (SELECT ccrp_bc_id FROM fuel_carte_carburant_recharge_payments)";//exit;

		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_bon_carburant')->where($where)->order_by('bc_id','desc')->group_by('bc_id')->get()->result_array();*/	
		
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,incomeexpense,fuel_carte_carburant')->where($where)->order_by('ccrp_incomeexpense_id','desc')->group_by('ccrp_incomeexpense_id')->get()->result_array();

	}
	
	/*END PREGATE INSTANCE LIST*/	
	

	
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
	
	
	
/*	public function journal($from,$to,$v_id) { 
		$newtripdata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}*/	
	
} 