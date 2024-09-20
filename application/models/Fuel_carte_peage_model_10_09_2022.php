<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuel_carte_peage_model extends CI_Model{
	
	public function add_fuel_carte_peage($data) {
		$fuel_carte_peageins = $data;
/*		if(isset($data['t_pwd'])) {
			$fuel_carte_peageins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('fuel_carte_peage',$fuel_carte_peageins);
	} 
    public function getall_fuel_carte_peage() { 
		//return $this->db->select('*')->from('fuel_carte_peage')->order_by('cc_id','desc')->get()->result_array();
		
		$requete="";
		$requete="cpc_id=cp_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_peage,fuel_carte_peage_compagnie')->where($requete)->order_by('cp_id','desc')->get()->result_array();		
	} 
	public function get_fuel_carte_peagedetails($cc_id) { 
		return $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$cp_id)->get()->result_array();
	} 
	public function update_fuel_carte_peage() { 
		$this->db->where('cp_id',$this->input->post('cp_id'));
		return $this->db->update('fuel_carte_peage',$this->input->post());
	}
	
	    public function getall_fuel_carte_peage_compagnielist() { 
		return $this->db->select('*')->from('fuel_carte_peage_compagnie')->order_by('cpc_name','desc')->get()->result_array();
	}	
	
	
    public function getall_fuel_carte_peage_compagnie() { 
		$requete="";
		$requete="cpc_id=cp_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_peage, Table: fuel_carte_peage_compagnie')->where($requete)->order_by('cp_id','desc')->get()->result_array();
		
		
/*		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['compagnie'] =  $this->db->select('ccc_name')->from('fuel_carte_peage_compagnie')->where('ccc_id',$fuels['cc_compagnie_id'])->get()->row();
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