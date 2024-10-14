<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vehicle_remorque_model extends CI_Model{
	
	public function add_vehicle_remorque($data) {
		$vehicle_remorqueins = $data;
/*		if(isset($data['t_pwd'])) {
			$vehicle_remorqueins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('vehicle_remorque',$vehicle_remorqueins);
	} 
    public function getall_vehicle_remorque() { 
		return $this->db->select('*')->from('vehicle_remorque')->order_by('vr_id','desc')->get()->result_array();
	} 
	public function get_vehicle_remorquedetails($vr_id) { 
		return $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$vr_id)->get()->result_array();
	} 
	public function update_vehicle_remorque() { 
		$this->db->where('vr_id',$this->input->post('vr_id'));
		return $this->db->update('vehicle_remorque',$this->input->post());
	}
} 