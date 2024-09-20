<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piece_rechange_marque_model extends CI_Model{
	

	public function get_piece_rechange_marque() { 
		return $this->db->select('*')->from('piece_rechange_marque')->get()->result_array();
	}

	
	public function piece_rechange_marque_delete($c_id) { 
/*		$groupinfo =  $this->db->select('*')->from('piece_rechange_marque')->where('c_id',$c_id)->get()->result_array();

		if(count($groupinfo)>0) {
			return false;
		} else {*/
			$this->db->where('c_id',$c_id);
    		$this->db->delete('piece_rechange_marque');
    		return true;
		//}		
	} 
	
	
	
} 