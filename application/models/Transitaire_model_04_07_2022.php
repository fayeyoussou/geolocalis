<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transitaire_model extends CI_Model{
	
	public function add_transitaire($data) {
		$transitaireins = $data;
		if(isset($data['t_pwd'])) {
			$transitaireins['t_pwd'] = md5($data['t_pwd']); 
		}
		return	$this->db->insert('transitaire',$transitaireins);
	} 
    public function getall_transitaire() { 
		return $this->db->select('*')->from('transitaire')->order_by('tra_id','desc')->get()->result_array();
	} 
	public function get_transitairedetails($tra_id) { 
		return $this->db->select('*')->from('transitaire')->where('tra_id',$tra_id)->get()->result_array();
	} 
	public function update_transitaire() { 
		$this->db->where('tra_id',$this->input->post('tra_id'));
		return $this->db->update('transitaire',$this->input->post());
	}
	
/* BEGIN SHOW FARWARDING AGENT*/
	
	public function get_facture($tra_id) { 
		$bookings = $this->db->select('*')->from('trips')->where('t_transitaire',$tra_id)->order_by('t_id','desc')->get()->result_array();
		if(!empty($bookings)) {
			foreach ($bookings as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				//$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
			}
			return $newtripdata;
		} else {
			return array();
		}

	} 	
/*END SHOW FORWARDING AGENT*/	

/* BEGIN SHOW CONTAINER*/	
	
    	public function get_conteneur($tra_id) { 
			$where = "co_trip_id=t_id AND t_transitaire=$tra_id";
		$conteneur =  $this->db->select('*')->from('trips,trip_conteneur')->where($where)->get()->result_array();
 		if(!empty($conteneur)) {
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;                
				$newconteneur[$key]['nature_name'] =  $this->db->select('*')->from('trip_nature')->where('na_id',$conteneurs['co_nature'])->get()->row();
                
				$newconteneur[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['co_trip_id'])->get()->row();                
                
				$newconteneur[$key]['zone_name'] =  $this->db->select('*')->from('zone')->where('z_id',$conteneurs['co_zone'])->get()->row();                

/*				$newconteneur[$key]['v_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$conteneurs['co_zone'])->get()->row();  */              
 
				$newconteneur[$key]['cc_name'] =  $this->db->select('*')->from('compagnie')->where('cc_id',$conteneurs['co_zone'])->get()->row();                  
                

			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  	
	
	
/* BEGIN SHOW CUSTOMER*/	
	
    	public function get_customer($tra_id) { 
			$where = "c_id=t_customer_id AND t_transitaire=$tra_id";
		$customer =  $this->db->select('*')->from('trips,customers')->where($where)->get()->result_array();
 		if(!empty($customer)) {
			foreach ($customer as $key => $customer) {
				$newcustomer[$key] = $customer;                
			$newcustomer[$key]['customer_type'] =  $this->db->select('*')->from('customer_type')->where('typc_id',$customer['c_type_customer'])->get()->row();
                
/*					$newcustomer[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$customers['co_trip_id'])->get()->row();                
                
				$newcustomer[$key]['zone_name'] =  $this->db->select('*')->from('zone')->where('z_id',$customers['co_zone'])->get()->row();                

				$newcustomer[$key]['v_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$customers['co_zone'])->get()->row();                
 
				$newcustomer[$key]['cc_name'] =  $this->db->select('*')->from('compagnie')->where('cc_id',$customers['co_zone'])->get()->row();   */               
                

			}
			return $newcustomer;
		} else 
		{
			return false;
		}       
	}  	
	
/* END SHOW CUSTOMER*/	

	
	
	
	
} 