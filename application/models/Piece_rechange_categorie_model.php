<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piece_rechange_categorie_model extends CI_Model{
	

	public function get_piece_rechange_categorie() { 
		return $this->db->select('*')->from('piece_rechange_categorie')->get()->result_array();
	}

	
	public function piece_rechange_categorie_delete($c_id) { 
/*		$groupinfo =  $this->db->select('*')->from('piece_rechange_categorie')->where('c_id',$c_id)->get()->result_array();

		if(count($groupinfo)>0) {
			return false;
		} else {*/
			$this->db->where('c_id',$c_id);
    		$this->db->delete('piece_rechange_categorie');
    		return true;
		//}		
	} 
	
	
	
} 