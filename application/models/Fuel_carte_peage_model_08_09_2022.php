<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuel_carte_peage_model extends CI_Model{
	
	public function add_fuel_carte_peage($data) {
		$fuel_carte_peageins = $data;
/*		if(isset($data['t_pwd'])) {
			$fuel_carte_peageins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('fuel_carte_peage',$fuel_carte_peageins);
	} 
    public function getall_fuel_carte_peage() { 
		return $this->db->select('*')->from('fuel_carte_peage')->order_by('cp_id','desc')->get()->result_array();
	} 
	public function get_fuel_carte_peagedetails($cp_id) { 
		return $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$cp_id)->get()->result_array();
	} 
	public function update_fuel_carte_peage() { 
		$this->db->where('cp_id',$this->input->post('cp_id'));
		return $this->db->update('fuel_carte_peage',$this->input->post());
	}
} 