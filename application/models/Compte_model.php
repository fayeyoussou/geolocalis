<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class compte_model extends CI_Model{
	
	public function add_compte($data) {
		$compteins = $data;
		if(isset($data['t_pwd'])) {
			$compteins['t_pwd'] = md5($data['t_pwd']); 
		}
		return	$this->db->insert('incomeexpense_compte',$compteins);
	} 
    public function getall_compte() { 
		return $this->db->select('*')->from('incomeexpense_compte')->order_by('iec_id','desc')->get()->result_array();
	} 
	public function get_comptedetails($c_id) { 
		return $this->db->select('*')->from('incomeexpense_compte')->where('iec_id',$c_id)->get()->result_array();
	} 
	public function update_compte() { 
		$this->db->where('iec_id',$this->input->post('iec_id'));
		return $this->db->update('incomeexpense_compte',$this->input->post());
	}
    
/*	public function compte_delete($iec_id) { 
		$groupinfo = $this->db->select('*')->from('compte')->where('iec_id',$iec_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('iec_id', $iec_id);
    		$this->db->delete('compte');
    		return true;
		}
	} */   
} 