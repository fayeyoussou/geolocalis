<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model{
	
	public function add_customer($data) {
		$customerins = $data;
		if(isset($data['c_pwd'])) {
			$customerins['c_pwd'] = md5($data['c_pwd']); 
		}
// Insertion dans la table  customer_compteur        
$dataCompteur = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('customer_compteur', $dataCompteur);           
		return	$this->db->insert('customers',$customerins);
        
	} 
    
    public function get_insert_id() { //$this->db->count_all_results('Employees');
//		return $this->db->count_all_results('trip_compteur');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();

        
        return $this->db->insert_id();

    } 
    
/**/     public function get_numerocustomer() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('customer_compteur');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}    
    
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_id','desc')->get()->result_array();
	} 
	public function get_customerdetails($c_id) { 
		return $this->db->select('*')->from('customers')->where('c_id',$c_id)->get()->result_array();
	} 
	public function update_customer() { 
		$this->db->where('c_id',$this->input->post('c_id'));
		return $this->db->update('customers',$this->input->post());
	}
/**/	public function getall_customer_typelist() { 
		return $this->db->select('*')->from('customer_type')->get()->result_array();
	}    
    
} 