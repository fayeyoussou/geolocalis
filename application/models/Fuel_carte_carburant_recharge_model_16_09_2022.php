<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_carte_carburant_recharge_model extends CI_Model{
	
	public function add_fuel($data) { 
		//unset($data['exp']);
		 	$this->db->insert('fuel_carte_carburant_recharge',$data);//exit;
	} 
	
	public function add_incomexpense($data) { 
		return	$this->db->insert('incomeexpense', $data);
	} 	
	
    public function getall_fuel() { 
		$fuel = $this->db->select('*')->from('fuel_carte_carburant_recharge')->order_by('ccr_id','desc')->get()->result_array();
		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['cc_name'] =  $this->db->select('cc_numero,cc_name')->from('fuel_carte_carburant')->where('cc_id',$fuels['ccr_carte_id'])->get()->row();
//				$newfuel[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuels['v_id'])->get()->row();
				//$newfuel[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuels['v_fueladdedby'])->get()->row();
			}
			return $newfuel;
		} else 
		{
			return false;
		}
	} 
	public function editfuel($ccr_id) { 
		return $this->db->select('*')->from('fuel_carte_carburant_recharge')->where('ccr_id',$ccr_id)->get()->result_array();
	}
	public function updatefuel() { 
		$this->db->where('ccr_id',$this->input->post('ccr_id'));
		return $this->db->update('fuel_carte_carburant_recharge',$this->input->post());
	}

	public function fuel_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('v_fuelfilldate >='=>$from,'v_fuelfilldate<='=>$to);
		} else {
			$where = array('v_fuelfilldate >='=>$from,'v_fuelfilldate<='=>$to,'v_id'=>$v_id);
		}
		$fuel = $this->db->select('*')->from('fuel')->where($where)->order_by('v_fuel_id','desc')->get()->result_array();
		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuels['v_id'])->get()->row();
				$newfuel[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuels['v_fueladdedby'])->get()->row();
			}
			return $newfuel;
		} else {
			return false;
		}
	} 

/* debut carte péage*/
	
/*	public function get_carte_peage() { 
		return $this->db->select('*')->from('carte_peage')->get()->result_array();
	}*/
    
	public function deletefuel($ccr_id) { 
		$groupinfo = $this->db->select('*')->from('fuel_carte_carburant_recharge')->where('ccr_id',$ccr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('ccr_id', $ccr_id);
    		$this->db->delete('fuel_carte_carburant_recharge');
    		return true;
		}
	} 	
/* debut carte péage*/	

		public function getall_fuel_incomeexpense() { 
//		return $this->db->select('*')->from('transitaire')->get()->result_array();
		$requete="";
		$compte=174;
		$requete="ie_compte_id='$compte'";
//		$requete="ie_id=ccr_incomeexpense_id AND ie_compte_id='$compte'";
		return $this->db->select('*')->from('incomeexpense')->where($requete)->order_by('ie_id','desc')->get()->result_array();
		
		}
	
} 