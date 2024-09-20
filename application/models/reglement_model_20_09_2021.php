<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reglement_model extends CI_Model{
	
	public function add_reglement($data) {
		$reglementins = $data;
/*		if(isset($data['t_pwd'])) {
			$reglementins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('trip_reglement',$reglementins);
	} 
    public function getall_reglement() { 
		return $this->db->select('*')->from('trip_reglement')->order_by('tg_id','desc')->get()->result_array();
	} 
	public function get_reglementdetails($c_id) { 
		return $this->db->select('*')->from('trip_reglement')->where('tg_id',$c_id)->get()->result_array();
	} 
	public function update_reglement() { 
		$this->db->where('tg_id',$this->input->post('tg_id'));
		return $this->db->update('trip_reglement',$this->input->post());
	}
    
/*	public function reglement_delete($tg_id) { 
		$groupinfo = $this->db->select('*')->from('reglement')->where('tg_id',$tg_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('tg_id', $tg_id);
    		$this->db->delete('reglement');
    		return true;
		}
	} */   
} 