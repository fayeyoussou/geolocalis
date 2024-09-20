<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuel_peage_compagnie_model extends CI_Model{
	
	public function add_fuel_peage_compagnie($data) {
		$fuel_peage_compagnieins = $data;
/*		if(isset($data['t_pwd'])) {
			$fuel_peage_compagnieins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('fuel_carte_peage_compagnie',$fuel_peage_compagnieins);
	} 
    public function getall_fuel_peage_compagnie() { 
		return $this->db->select('*')->from('fuel_carte_peage_compagnie')->order_by('cpc_id','desc')->get()->result_array();
	} 
	public function get_fuel_peage_compagniedetails($cpc_id) { 
		return $this->db->select('*')->from('fuel_carte_peage_compagnie')->where('cpc_id',$cpc_id)->get()->result_array();
	} 
	public function update_fuel_peage_compagnie() { 
		$this->db->where('cpc_id',$this->input->post('cpc_id'));
		return $this->db->update('fuel_carte_peage_compagnie',$this->input->post());
	}
    
/*	public function fuel_peage_compagnie_delete($cpc_id) { 
		$groupinfo = $this->db->select('*')->from('fuel_peage_compagnie')->where('cpc_id',$cpc_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('cpc_id', $cpc_id);
    		$this->db->delete('fuel_peage_compagnie');
    		return true;
		}
	} */   
} 