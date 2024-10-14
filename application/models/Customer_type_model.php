<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_type_model extends CI_Model{
	
	public function add_customer_type($data) {
		$customer_typeins = $data;
/*		if(isset($data['t_pwd'])) {
			$customer_typeins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('customer_type',$customer_typeins);
	} 
    public function getall_customer_type() { 
		return $this->db->select('*')->from('customer_type')->order_by('typc_id','desc')->get()->result_array();
	} 
	public function get_customer_typedetails($c_id) { 
		return $this->db->select('*')->from('customer_type')->where('typc_id',$c_id)->get()->result_array();
	} 
	public function update_customer_type() { 
		$this->db->where('typc_id',$this->input->post('typc_id'));
		return $this->db->update('customer_type',$this->input->post());
	}
    
/*	public function customer_type_delete($typc_id) { 
		$groupinfo = $this->db->select('*')->from('customer_type')->where('typc_id',$typc_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('typc_id', $typc_id);
    		$this->db->delete('customer_type');
    		return true;
		}
	} */   
} 