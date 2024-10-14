<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class type_reglement_model extends CI_Model{
	
	public function add_type_reglement($data) {
		$type_reglementins = $data;
/*		if(isset($data['t_pwd'])) {
			$type_reglementins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('trip_type_reglement',$type_reglementins);
	} 
    public function getall_type_reglement() { 
		return $this->db->select('*')->from('trip_type_reglement')->order_by('tr_id','desc')->get()->result_array();
	} 
	public function get_type_reglementdetails($c_id) { 
		return $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$c_id)->get()->result_array();
	} 
	public function update_type_reglement() { 
		$this->db->where('tr_id',$this->input->post('tr_id'));
		return $this->db->update('trip_type_reglement',$this->input->post());
	}
    
/*	public function type_reglement_delete($tr_id) { 
		$groupinfo = $this->db->select('*')->from('type_reglement')->where('tr_id',$tr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('tr_id', $tr_id);
    		$this->db->delete('type_reglement');
    		return true;
		}
	} */   
} 