<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pregate_model extends CI_Model{
	
	public function add_pregate($data) { 
		return	$this->db->insert('trip_pregate',$data);
	}
    
/*	public function getall_facturelist() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	} */
    
	public function getall_facture() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	}    
  
	/**/ public function getall_conteneur() { 
		return $this->db->select('*')->from('trip_conteneur')->get()->result_array();
	}    
    
    public function getall_pregate() { 
		$pregate = $this->db->select('*')->from('trip_pregate')->order_by('pr_id','desc')->get()->result_array();
		if(!empty($pregate)) {
			foreach ($pregate as $key => $pregates) {
				$newpregate[$key] = $pregates;
				$newpregate[$key]['pr_conteneur'] =  $this->db->select('pr_conteneur')->from('trip_pregate')->where('pr_id',$pregates['pr_trip'])->get()->row();
//				$newpregate[$key]['t_num_facture'] =  $this->db->select('t_num_facture')->from('trips')->where('pr_id',$pregates['pr_trip'])->get()->row();
			}
			return $newpregate;
		} else 
		{
			return false;
		}
	} 
	public function editpregate($e_id) { 
		return $this->db->select('*')->from('trip_pregate')->where('pr_id',$e_id)->get()->result_array();
	}
	public function updatepregate() { 
		$this->db->where('pr_id',$this->input->post('pr_id'));
		return $this->db->update('trip_pregate',$this->input->post());
	}
	public function getvechicle_pregate($pr_id) { 
		return $this->db->select('*')->from('trip_pregate')->where('ie_pr_id',$pr_id)->order_by('pr_id','DESC')->get()->result_array();
	} 
	public function pregate_reports($from,$to,$pr_id) { 
		$newpregate = array();
		if($pr_id=='all') {
			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to);
		} else {
			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to,'ie_pr_id'=>$pr_id);
		}

		$pregate = $this->db->select('*')->from('trip_pregate')->where($where)->order_by('pr_id','desc')->get()->result_array();
		if(!empty($pregate)) {
			foreach ($pregate as $key => $pregates) {
				$newpregate[$key] = $pregates;
				$newpregate[$key]['pr_statut'] =  $this->db->select('*')->from('trip_pregate')->where('pr_id',$pregates['pr_id'])->get()->row();
			}
			return $newpregate;
		} else 
		{
			return array();
		}
	}
} 