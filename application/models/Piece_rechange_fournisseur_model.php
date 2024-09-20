<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piece_rechange_fournisseur_model extends CI_Model{
	
	public function add_piece_rechange_fournisseur($data) {
		$piece_rechange_fournisseurins = $data;
		if(isset($data['f_pwd'])) {
			$piece_rechange_fournisseurins['f_pwd'] = md5($data['f_pwd']); 
		}
// Insertion dans la table  piece_rechange_fournisseur_compteur        
$dataCompteur = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('piece_rechange_fournisseur_compteur', $dataCompteur);           
		return	$this->db->insert('piece_rechange_fournisseurs',$piece_rechange_fournisseurins);
        
	} 
    
    public function get_insert_id() { //$this->db->count_all_results('Employees');
//		return $this->db->count_all_results('trip_compteur');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();

        
        return $this->db->insert_id();

    } 
    
/**/     public function get_numeropiece_rechange_fournisseur() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('piece_rechange_fournisseur_compteur');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}    
    
    public function getall_piece_rechange_fournisseur() { 
		return $this->db->select('*')->from('piece_rechange_fournisseurs')->order_by('f_id','desc')->get()->result_array();
	} 
	public function get_piece_rechange_fournisseurdetails($f_id) { 
		return $this->db->select('*')->from('piece_rechange_fournisseurs')->where('f_id',$f_id)->get()->result_array();
	} 
	public function update_piece_rechange_fournisseur() { 
		$this->db->where('f_id',$this->input->post('f_id'));
		return $this->db->update('piece_rechange_fournisseurs',$this->input->post());
	}
/*	public function getall_piece_rechange_fournisseur_typelist() { 
		return $this->db->select('*')->from('piece_rechange_fournisseur_type')->get()->result_array();
	} */   
    
} 