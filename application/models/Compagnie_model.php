<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class compagnie_model extends CI_Model{
	
	public function add_compagnie($data) {
		$compagnieins = $data;
/*		if(isset($data['t_pwd'])) {
			$compagnieins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('compagnie',$compagnieins);
	} 
    public function getall_compagnie() { 
		return $this->db->select('*')->from('compagnie')->order_by('cc_id','desc')->get()->result_array();
	} 
	public function get_compagniedetails($cc_id) { 
		return $this->db->select('*')->from('compagnie')->where('cc_id',$cc_id)->get()->result_array();
	} 
	public function update_compagnie() { 
		$this->db->where('cc_id',$this->input->post('cc_id'));
		return $this->db->update('compagnie',$this->input->post());
	}
    
/*	public function compagnie_delete($cc_id) { 
		$groupinfo = $this->db->select('*')->from('compagnie')->where('cc_id',$cc_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('cc_id', $cc_id);
    		$this->db->delete('compagnie');
    		return true;
		}
	} */   
} 