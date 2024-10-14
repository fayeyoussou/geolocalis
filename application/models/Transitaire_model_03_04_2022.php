<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transitaire_model extends CI_Model{
	
	public function add_transitaire($data) {
		$transitaireins = $data;
		if(isset($data['t_pwd'])) {
			$transitaireins['t_pwd'] = md5($data['t_pwd']); 
		}
		return	$this->db->insert('transitaire',$transitaireins);
	} 
    public function getall_transitaire() { 
		return $this->db->select('*')->from('transitaire')->order_by('tra_id','desc')->get()->result_array();
	} 
	public function get_transitairedetails($c_id) { 
		return $this->db->select('*')->from('transitaire')->where('tra_id',$c_id)->get()->result_array();
	} 
	public function update_transitaire() { 
		$this->db->where('tra_id',$this->input->post('tra_id'));
		return $this->db->update('transitaire',$this->input->post());
	}
} 