<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class zone_model extends CI_Model{
	
	public function add_zone($data) {
		$zoneins = $data;
		if(isset($data['t_pwd'])) {
			$zoneins['t_pwd'] = md5($data['t_pwd']); 
		}
		return	$this->db->insert('zone',$zoneins);
	} 
    public function getall_zone() { 
		return $this->db->select('*')->from('zone')->order_by('z_id','asc')->get()->result_array();
	} 
	public function get_zonedetails($c_id) { 
		return $this->db->select('*')->from('zone')->where('z_id',$c_id)->get()->result_array();
	} 
	public function update_zone() { 
		$this->db->where('z_id',$this->input->post('z_id'));
		return $this->db->update('zone',$this->input->post());
	}
    
/*	public function zone_delete($z_id) { 
		$groupinfo = $this->db->select('*')->from('zone')->where('z_id',$z_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('z_id', $z_id);
    		$this->db->delete('zone');
    		return true;
		}
	} */   
} 