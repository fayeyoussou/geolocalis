<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_carte_carburant_recharge_model extends CI_Model{
	
	public function add_fuel_carte_carburant_recharge($data) { 
		unset($data['exp']);
		return	$this->db->insert('fuel_carte_carburant_recharge',$data);
	} 
    public function getall_fuel_carte_carburant_recharge() { 
		$fuel_carte_carburant_recharge = $this->db->select('*')->from('fuel_carte_carburant_recharge')->order_by('v_fuel_carte_carburant_recharge_id','desc')->get()->result_array();
		if(!empty($fuel_carte_carburant_recharge)) {
			foreach ($fuel_carte_carburant_recharge as $key => $fuel_carte_carburant_recharges) {
				$newfuel_carte_carburant_recharge[$key] = $fuel_carte_carburant_recharges;
				$newfuel_carte_carburant_recharge[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_carte_carburant_recharges['v_id'])->get()->row();
				$newfuel_carte_carburant_recharge[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_carte_carburant_recharges['v_fuel_carte_carburant_rechargeaddedby'])->get()->row();
			}
			return $newfuel_carte_carburant_recharge;
		} else 
		{
			return false;
		}
	} 
	public function editfuel_carte_carburant_recharge($f_id) { 
		return $this->db->select('*')->from('fuel_carte_carburant_recharge')->where('v_fuel_carte_carburant_recharge_id',$f_id)->get()->result_array();
	}
	public function updatefuel_carte_carburant_recharge() { 
		$this->db->where('v_fuel_carte_carburant_recharge_id',$this->input->post('v_fuel_carte_carburant_recharge_id'));
		return $this->db->update('fuel_carte_carburant_recharge',$this->input->post());
	}

	public function fuel_carte_carburant_recharge_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('v_fuel_carte_carburant_rechargefilldate >='=>$from,'v_fuel_carte_carburant_rechargefilldate<='=>$to);
		} else {
			$where = array('v_fuel_carte_carburant_rechargefilldate >='=>$from,'v_fuel_carte_carburant_rechargefilldate<='=>$to,'v_id'=>$v_id);
		}
		$fuel_carte_carburant_recharge = $this->db->select('*')->from('fuel_carte_carburant_recharge')->where($where)->order_by('v_fuel_carte_carburant_recharge_id','desc')->get()->result_array();
		if(!empty($fuel_carte_carburant_recharge)) {
			foreach ($fuel_carte_carburant_recharge as $key => $fuel_carte_carburant_recharges) {
				$newfuel_carte_carburant_recharge[$key] = $fuel_carte_carburant_recharges;
				$newfuel_carte_carburant_recharge[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_carte_carburant_recharges['v_id'])->get()->row();
				$newfuel_carte_carburant_recharge[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_carte_carburant_recharges['v_fuel_carte_carburant_rechargeaddedby'])->get()->row();
			}
			return $newfuel_carte_carburant_recharge;
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
	
	
} 