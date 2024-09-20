<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class zone_destination_model extends CI_Model{
	
	public function add_zone_destination($data) {
		$zone_destinationins = $data;
/*		if(isset($data['t_pwd'])) {
			$zone_destinationins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('zone_destination',$zone_destinationins);
	} 
    public function getall_zone_destination() { 
		//return $this->db->select('*')->from('zone_destination')->order_by('cc_id','desc')->get()->result_array();
		
		$requete="";
		$requete="z_id=zd_zone_id";
		return $this->db->select('*')->from('zone_destination,zone')->where($requete)->get()->result_array();		
	} 
	public function get_zone_destinationdetails($zd_id) { 
		return $this->db->select('*')->from('zone_destination')->where('zd_id',$zd_id)->get()->result_array();
	} 
	public function update_zone_destination() { 
		$this->db->where('zd_id',$this->input->post('zd_id'));
		return $this->db->update('zone_destination',$this->input->post());
	}
	
	    public function getall_zonelist() { 
		return $this->db->select('*')->from('zone')->order_by('z_destination','desc')->get()->result_array();
	}	
	
    public function getall_zone() { 
		$requete="";
		$requete="cc_id=zd_zone_id";
		return $this->db->select('*')->from('zone_destination,zone')->where($requete)->order_by('zd_id','desc')->get()->result_array();

	}	
	
} 