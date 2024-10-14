<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuel_compagnie_model extends CI_Model{
	
	public function add_fuel_compagnie($data) {
		$fuel_compagnieins = $data;
/*		if(isset($data['t_pwd'])) {
			$fuel_compagnieins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('fuel_carte_carburant_compagnie',$fuel_compagnieins);
	} 
    public function getall_fuel_compagnie() { 
		return $this->db->select('*')->from('fuel_carte_carburant_compagnie')->order_by('ccc_id','desc')->get()->result_array();
	} 
	public function get_fuel_compagniedetails($ccc_id) { 
		return $this->db->select('*')->from('fuel_carte_carburant_compagnie')->where('ccc_id',$ccc_id)->get()->result_array();
	} 
	public function update_fuel_compagnie() { 
		$this->db->where('ccc_id',$this->input->post('ccc_id'));
		return $this->db->update('fuel_carte_carburant_compagnie',$this->input->post());
	}
    
/*	public function fuel_compagnie_delete($ccc_id) { 
		$groupinfo = $this->db->select('*')->from('fuel_compagnie')->where('ccc_id',$ccc_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('ccc_id', $ccc_id);
    		$this->db->delete('fuel_compagnie');
    		return true;
		}
	} */   
} 