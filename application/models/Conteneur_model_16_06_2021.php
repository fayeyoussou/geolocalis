<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class conteneur_model extends CI_Model{
	
	public function add_conteneur($data) { 
		unset($data['exp']);
		return	$this->db->insert('trip_conteneur',$data);
	} 
    public function getall_conteneur() { 
		$conteneur = $this->db->select('*')->from('trip_conteneur')->order_by('co_id','desc')->get()->result_array();
		if(!empty($conteneur)) {
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;
				$newconteneur[$key]['nature_name'] =  $this->db->select('*')->from('trip_nature')->where('na_id',$conteneurs['co_nature'])->get()->row();
                
//				$newfuel[$key]['facture_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuels['v_id'])->get()->row();                
                
				$newconteneur[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$conteneurs['co_zone'])->get()->row();

/*				$newconteneur[$key] = $conteneurs;
				$newconteneur[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('co_nature',$conteneurs['co_nature'])->get()->row();
				$newconteneur[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$conteneurs['co_zone'])->get()->row();   */         
            }
			return $newconteneur;
		} else 
		{
			return false;
		}
	} 
	public function editconteneur($f_id) { 
		return $this->db->select('*')->from('trip_conteneur')->where('co_id',$f_id)->get()->result_array();
	}
	public function updateconteneur() { 
		$this->db->where('co_id',$this->input->post('co_id'));
		return $this->db->update('trip_conteneur',$this->input->post());
	}

	public function conteneur_reports($from,$to,$co_nature) { 
		$newincomexpense = array();
		if($co_nature=='all') {
			$where = array('co_numero_conteneur >='=>$from,'co_numero_conteneur<='=>$to);
		} else {
			$where = array('co_numero_conteneur >='=>$from,'co_numero_conteneur<='=>$to,'co_nature'=>$co_nature);
		}
		$conteneur = $this->db->select('*')->from('trip_conteneur')->where($where)->order_by('co_id','desc')->get()->result_array();
		if(!empty($conteneur)) {
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;
				$newconteneur[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('co_nature',$conteneurs['co_nature'])->get()->row();
				$newconteneur[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$conteneurs['co_zone'])->get()->row();
			}
			return $newconteneur;
		} else {
			return false;
		}
	} 

/* debut carte péage*/
	
/*	public function get_carte_peage() { 
		return $this->db->select('*')->from('carte_peage')->get()->result_array();
	}
	public function carte_peage_delete($gr_id) { 
		$groupinfo = $this->db->select('*')->from('vehicles')->where('v_group',$gr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('gr_id', $gr_id);
    		$this->db->delete('carte_peage');
    		return true;
		}
	}*/ 	
/* debut carte péage*/	
	
	
} 