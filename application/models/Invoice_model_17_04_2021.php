<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoice_model extends CI_Model{
	public function add_invoice($data) {   
		unset($data['bookingemail']);
		$insertdata = $data;
		//$insertdata['t_trackingcode'] = uniqid();
		$this->db->insert('invoice',$insertdata);
		$this->db->last_query();
		return $this->db->insert_id();
	} 
	
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_name','asc')->get()->result_array();
	} 
	
	public function getall_vechicle() { // modifier veclie par zone
		return $this->db->select('*')->from('zone')->get()->result_array();
	} 
	
	public function getall_mybookings($c_id) { 
		return $this->db->select('*')->from('invoice')->where('i_customer_id',$c_id)->order_by('i_id','asc')->get()->result_array();
	}
	public function getall_driverlist() { 
		return $this->db->select('*')->from('drivers')->get()->result_array();
	}
	public function getall_invoice_expense($t_id) { 
		return $this->db->select('*')->from('invoice_expense')->where('e_invoice_id',$t_id)->get()->result_array();
	} 
	public function get_paymentdetails($t_id) { 
		return $this->db->select('*')->from('invoice_payments')->where('tp_invoice_id',$t_id)->get()->result_array();
	}
	
/* debut des ajouts*/

	public function getall_zonelist() { 
		return $this->db->select('*')->from('zone')->get()->result_array();
	}	
	
/**/	
	
	
	public function getall_invoice($trackingcode=false) { 
		$newinvoicedata = array();
		if($trackingcode) {
			$invoicedata = $this->db->select('*')->from('invoice')->where('t_trackingcode',$trackingcode)->order_by('i_id','desc')->get()->result_array();
		} else {
			$invoicedata = $this->db->select('*')->from('invoice')->order_by('i_id','desc')->get()->result_array();
		}
		if(!empty($invoicedata)) {
			foreach ($invoicedata as $key => $invoicedataval) {
				$newinvoicedata[$key] = $invoicedataval;
				$newinvoicedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$invoicedataval['i_customer_id'])->get()->row();
				$newinvoicedata[$key]['i_vechicle_details'] =  $this->db->select('*')->from('zone')->where('z_id',$invoicedataval['i_zone_id'])->get()->row();//modifier par zone
				$newinvoicedata[$key]['i_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$invoicedataval['i_driver_id'])->get()->row();
			}
			return $newinvoicedata;
		} else 
		{
			return false;
		}
	}
	public function getaddress($lat,$lng)
	{
	 $google_api_key = $this->config->item('google_api_key'); 
	 $url = 'https://maps.googleapis.com/maps/api/geocode/json?key='.$google_api_key.'&latlng='.trim($lat).','.trim($lng).'&sensor=false';
	$json = @file_get_contents($url);
	$data = json_decode($json);
        if (!empty($data)) {
            $status = $data->status;
            if ($status == "OK") {
                return $data->results[1]->formatted_address;
            } else {
                return false;
            }
        } else {
            return '';
        }
    }
	public function get_invoicedetails($t_id) { 
		return $this->db->select('*')->from('invoice')->where('i_id',$t_id)->get()->result_array();
	}
	public function update_invoice($data) { 
		$this->db->where('i_id',$this->input->post('i_id'));
		$this->db->update('invoice',$data);
		return $this->input->post('i_id');
	}
	public function invoice_reports($from,$to,$v_id) { 
		$newinvoicedata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}
		
		$invoicedata = $this->db->select('*')->from('invoice')->where($where)->order_by('i_id','desc')->get()->result_array();
		if(!empty($invoicedata)) {
			foreach ($invoicedata as $key => $invoicedataval) {
				$newinvoicedata[$key] = $invoicedataval;
				$newinvoicedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$invoicedataval['i_customer_id'])->get()->row();
				$newinvoicedata[$key]['i_zone_details'] =  $this->db->select('*')->from('zone')->where('i_id',$invoicedataval['i_zone'])->get()->row();
				$newinvoicedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$invoicedataval['t_driver'])->get()->row();
			}
			return $newinvoicedata;
		} else 
		{
			return array();
		}
	}
} 