<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article_model extends CI_Model{
	
	public function add_article($data) {
		$articleins = $data;
/*		if(isset($data['t_pwd'])) {
			$articleins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('trip_article',$articleins);
	} 
    public function getall_article() { 
		return $this->db->select('*')->from('trip_article')->order_by('art_id','desc')->get()->result_array();
	} 
	public function get_articledetails($c_id) { 
		return $this->db->select('*')->from('trip_article')->where('art_id',$c_id)->get()->result_array();
	} 
	public function update_article() { 
		$this->db->where('art_id',$this->input->post('art_id'));
		return $this->db->update('trip_article',$this->input->post());
	}
    
/*	public function article_delete($art_id) { 
		$groupinfo = $this->db->select('*')->from('article')->where('art_id',$art_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('art_id', $art_id);
    		$this->db->delete('article');
    		return true;
		}
	} */   
} 