<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice_model extends CI_Model{
	
	public function add_invoice($data) {
		$invoiceins = $data;
/*		if(isset($data['t_pwd'])) {
			$invoiceins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('invoice',$invoiceins);
	} 
    public function getall_invoice() { 
		return $this->db->select('*')->from('invoice')->order_by('i_id','desc')->get()->result_array();
	} 
	public function get_invoicedetails($i_id) { 
		return $this->db->select('*')->from('invoice')->where('i_id',$i_id)->get()->result_array();
	} 
	public function update_invoice() { 
		$this->db->where('i_id',$this->input->post('i_id'));
		return $this->db->update('invoice',$this->input->post());
	}
} 