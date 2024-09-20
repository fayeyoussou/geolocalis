<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piece_rechange_type_pneu_model extends CI_Model{
	

	public function get_piece_rechange_type_pneu() { 
		return $this->db->select('*')->from('piece_rechange_type_pneu')->get()->result_array();
	}

	
	public function piece_rechange_type_pneu_delete($tp_id) { 
/*		$groupinfo =  $this->db->select('*')->from('piece_rechange_type_pneu')->where('tp_id',$tp_id)->get()->result_array();

		if(count($groupinfo)>0) {
			return false;
		} else {*/
			$this->db->where('tp_id',$tp_id);
    		$this->db->delete('piece_rechange_type_pneu');
    		return true;
		//}		
	} 
	
	
	
} 