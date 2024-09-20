<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class compagnie_lieu_restitution_model extends CI_Model{
	
	public function add_compagnie_lieu_restitution($data) {
		$compagnie_lieu_restitutionins = $data;
/*		if(isset($data['t_pwd'])) {
			$compagnie_lieu_restitutionins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('compagnie_lieu_restitution',$compagnie_lieu_restitutionins);
	} 
    public function getall_compagnie_lieu_restitution() { 
		//return $this->db->select('*')->from('compagnie_lieu_restitution')->order_by('cc_id','desc')->get()->result_array();
		
		$requete="";
		$requete="cc_id=clr_compagnie_id";
		return $this->db->select('*')->from('compagnie_lieu_restitution,compagnie')->where($requete)->get()->result_array();		
	} 
	public function get_compagnie_lieu_restitutiondetails($clr_id) { 
		return $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_id',$clr_id)->get()->result_array();
	} 
	public function update_compagnie_lieu_restitution() { 
		$this->db->where('clr_id',$this->input->post('clr_id'));
		return $this->db->update('compagnie_lieu_restitution',$this->input->post());
	}
	
	    public function getall_compagnielist() { 
		return $this->db->select('*')->from('compagnie')->order_by('cc_name','desc')->get()->result_array();
	}	
	
	
    public function getall_compagnie() { 
		$requete="";
		$requete="cc_id=clr_compagnie_id";
		return $this->db->select('*')->from('compagnie_lieu_restitution,compagnie')->where($requete)->order_by('clr_id','desc')->get()->result_array();
		
		
/*		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['compagnie'] =  $this->db->select('ccc_name')->from('compagnie')->where('ccc_id',$fuels['cc_compagnie_id'])->get()->row();
//				$newfuel[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuels['v_id'])->get()->row();
				//$newfuel[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuels['v_fueladdedby'])->get()->row();
			}
			return $newfuel;
		} else 
		{
			return false;
		}*/
	}	
	
} 