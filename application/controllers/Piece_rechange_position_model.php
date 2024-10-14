<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piece_rechange_position_model extends CI_Model{
	

	public function get_piece_rechange_position() { 
		return $this->db->select('*')->from('piece_rechange_position')->get()->result_array();
	}

	
	public function piece_rechange_position_delete($p_id) { 
/*		$groupinfo =  $this->db->select('*')->from('piece_rechange_position')->where('p_id',$p_id)->get()->result_array();

		if(count($groupinfo)>0) {
			return false;
		} else {*/
			$this->db->where('p_id',$p_id);
    		$this->db->delete('piece_rechange_position');
    		return true;
		//}		
	} 
	
	
	
} 