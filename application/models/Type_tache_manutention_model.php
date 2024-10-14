<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class type_tache_manutention_model extends CI_Model{
	
	public function add_type_tache_manutention($data) {
		$type_tache_manutentionins = $data;
/*		if(isset($data['t_pwd'])) {
			$type_tache_manutentionins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('trip_type_tache_manutention',$type_tache_manutentionins);
	} 
    public function getall_type_tache_manutention() { 
		return $this->db->select('*')->from('trip_type_tache_manutention')->order_by('ttach_id','desc')->get()->result_array();
	} 
	public function get_type_tache_manutentiondetails($c_id) { 
		return $this->db->select('*')->from('trip_type_tache_manutention')->where('ttach_id',$c_id)->get()->result_array();
	} 
	public function update_type_tache_manutention() { 
		$this->db->where('ttach_id',$this->input->post('ttach_id'));
		return $this->db->update('trip_type_tache_manutention',$this->input->post());
	}
    
/*	public function type_tache_manutention_delete($ttach_id) { 
		$groupinfo = $this->db->select('*')->from('type_tache_manutention')->where('ttach_id',$ttach_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('ttach_id', $ttach_id);
    		$this->db->delete('type_tache_manutention');
    		return true;
		}
	} */   
} 