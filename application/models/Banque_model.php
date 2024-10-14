<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banque_model extends CI_Model{
	
	public function add_banque($data) { 
		return	$this->db->insert('incomeexpense_banque',$data);
	} 
    public function getall_banque() { 
		$banque = $this->db->select('*')->from('incomeexpense_banque')->order_by('ieb_name','ASC')->get()->result_array();
		if(!empty($banque)) {
			foreach ($banque as $key => $banques) {
				$newbanque[$key] = $banques;
				//$newbanque[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$banques['ieb_v_id'])->get()->row();
			}
			return $newbanque;
		} else 
		{
			return false;
		}
	} 
	public function editbanque($e_id) { 
		return $this->db->select('*')->from('incomeexpense_banque')->where('ieb_id',$e_id)->get()->result_array();
	}
	public function updatebanque() { 
		$this->db->where('ieb_id',$this->input->post('ieb_id'));
		return $this->db->update('incomeexpense_banque',$this->input->post());
	}
	public function getvechicle_banque($v_id) { 
		return $this->db->select('*')->from('incomeexpense_banque')->where('ieb_v_id',$v_id)->order_by('ieb_name','ASC')->get()->result_array();
	} 
//	public function banque_reports($from,$to,$v_id) { 
	public function banque_reports($from,$to) { 
		$newbanque = array();
		//if($v_id=='all') {
			$where = array('ieb_date>='=>$from,'ieb_date<='=>$to);
/*		} else {
			$where = array('ieb_date>='=>$from,'ieb_date<='=>$to,'ieb_v_id'=>$v_id);
		}*/

		$banque = $this->db->select('*')->from('incomeexpense_banque')->where($where)->order_by('ieb_name','ASC')->get()->result_array();
		if(!empty($banque)) {
			foreach ($banque as $key => $banques) {
				$newbanque[$key] = $banques;
				//$newbanque[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$banques['ieb_v_id'])->get()->row();
			}
			return $newbanque;
		} else 
		{
			return array();
		}
	}
    
	/*public function banque_reports($from,$to,$v_id) { 
		$newbanque = array();
		if($v_id=='all') {
			$where = array('ieb_date>='=>$from,'ieb_date<='=>$to);
		} else {
			$where = array('ieb_date>='=>$from,'ieb_date<='=>$to,'ieb_v_id'=>$v_id);
		}

		$banque = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ieb_id','desc')->get()->result_array();
		if(!empty($banque)) {
			foreach ($banque as $key => $banques) {
				$newbanque[$key] = $banques;
				$newbanque[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$banques['ieb_v_id'])->get()->row();
			}
			return $newbanque;
		} else 
		{
			return array();
		}
	}   */ 
} 