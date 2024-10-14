<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nature_model extends CI_Model{
	
	public function add_nature($data) {
		$natureins = $data;
/*		if(isset($data['t_pwd'])) {
			$natureins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('trip_nature',$natureins);
	} 
    public function getall_nature() { 
		return $this->db->select('*')->from('trip_nature')->order_by('na_id','desc')->get()->result_array();
	} 
	public function get_naturedetails($c_id) { 
		return $this->db->select('*')->from('trip_nature')->where('na_id',$c_id)->get()->result_array();
	} 
	public function update_nature() { 
		$this->db->where('na_id',$this->input->post('na_id'));
		return $this->db->update('trip_nature',$this->input->post());
	}
    
/*	public function nature_delete($na_id) { 
		$groupinfo = $this->db->select('*')->from('nature')->where('na_id',$na_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('na_id', $na_id);
    		$this->db->delete('nature');
    		return true;
		}
	} */   
} 