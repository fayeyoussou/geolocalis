<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reglement_model extends CI_Model{
	
	public function add_reglement($data) {
		$reglementins = $data;
/*		if(isset($data['t_pwd'])) {
			$reglementins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('trip_payments',$reglementins);
	} 
    public function getall_reglement() { 
//		return $this->db->select('*')->from('trip_payments')->order_by('tp_id','desc')->get()->result_array();
 		$reglement = $this->db->select('*')->from('trip_payments')->order_by('tp_id','desc')->get()->result_array();
       
		if(!empty($reglement)) {
			foreach ($reglement as $key => $reglements) {
				$newreglement[$key] = $reglements;
//				$newreglement[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$reglements['v_id'])->get()->row();
				//$newreglement[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$reglements['v_id'])->get()->row();
				$newreglement[$key]['t_num_facture'] =  $this->db->select('t_num_facture')->from('trips')->where('t_id',$reglements['tp_trip_id'])->get()->row();
				$newreglement[$key]['t_customer_id'] =  $this->db->select('t_customer_id')->from('trips')->where('t_id',$reglements['tp_trip_id'])->get()->row();
				$newreglement[$key]['c_name'] =  $this->db->select('c_name')->from('customers')->where('t_id',$reglements['t_customer_id'])->get()->row();
			}
			return $newreglement;
		} else 
		{
			return false;
		}        
        
        
	} 
	public function get_reglementdetails($tp_id) { 
		return $this->db->select('*')->from('trip_payments')->where('tp_id',$tp_id)->get()->result_array();
	} 
	public function update_reglement() { 
		$this->db->where('tp_id',$this->input->post('tp_id'));
		return $this->db->update('trip_payments',$this->input->post());
	}

	public function getall_facture() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
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