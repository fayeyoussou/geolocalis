<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incomexpense_model extends CI_Model{
	
//	public function add_incomexpense($data) { 
	public function add_incomexpense($data) { 
		return	$this->db->insert('incomeexpense', $data);
	} 
	
/*    function create($data){
        if($this->db->insert('meetings', $data))
            return $this->db->insert_id();
        else
            return false; 
    }	
	*/
	public function getall_facture() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	} 	
    public function getall_incomexpense() { 
		$incomexpense = $this->db->select('*')->from('incomeexpense')->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
				
/*//if(!function_exists('join_multi_select')) {
	function join_multi_select($values = null, 
		$relation_table = null, 
		$relation_value = null, 
		$relation_label = null) {

		if ($values) {
			$result = app()->db
				->select($relation_label)
			    ->where_in($relation_value, explode(',', $values))
			    ->get($relation_table)->result();
		    $labels = [];
		    foreach ($result as $row) {
		    	$labels[] = $row->{$relation_label};
		    }
		    return implode(',', $labels);
		}
		return '-';	
	}
//}*/					
				
//				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('customers')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();				
				
				//$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 
	public function editincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}
	
	public function editbanqueincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}	
	
	public function updateincomexpense() { 
		$this->db->where('ie_id',$this->input->post('ie_id'));
		return $this->db->update('incomeexpense',$this->input->post());
	}
	public function getvechicle_incomexpense($v_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_v_id',$v_id)->order_by('ie_id','DESC')->get()->result_array();
	} 
//	public function incomexpense_reports($from,$to,$v_id) { 
	public function incomexpense_reports($from,$to) { 
		$newincomexpense = array();
		//if($v_id=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
/*		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_v_id'=>$v_id);
		}*/

		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				//$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}
  
/*//if(!function_exists('join_multi_select')) {
	public function join_multi_select($values = null, 
		$relation_table = null, 
		$relation_value = null, 
		$relation_label = null) {

		if ($values) {
			$result = app()->db
				->select($relation_label)
			    ->where_in($relation_value, explode(',', $values))
			    ->get($relation_table)->result();
		    $labels = [];
		    foreach ($result as $row) {
		    	$labels[] = $row->{$relation_label};
		    }
		    return implode(',', $labels);
		}
		return '-';	
	}
//}	*/
	
	/*public function incomexpense_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_v_id'=>$v_id);
		}

		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}   */ 
} 