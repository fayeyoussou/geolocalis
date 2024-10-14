<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class facture_model extends CI_Model{
	public function add_facture($data) {   
		unset($data['bookingemail']);
		$insertdata = $data;
		$insertdata['t_trackingcode'] = uniqid();
		$this->db->insert('facture',$insertdata);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	} 
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_name','asc')->get()->result_array();
	} 
	public function getall_vechicle() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	} 
	public function getall_mybookings($c_id) { 
		return $this->db->select('*')->from('facture')->where('t_customer_id',$c_id)->order_by('t_id','asc')->get()->result_array();
	}
	public function getall_driverlist() { 
		return $this->db->select('*')->from('drivers')->get()->result_array();
	}
	public function getall_facture_expense($t_id) { 
		return $this->db->select('*')->from('facture_expense')->where('e_facture_id',$t_id)->get()->result_array();
	} 
	public function get_paymentdetails($t_id) { 
		return $this->db->select('*')->from('facture_payments')->where('tp_facture_id',$t_id)->get()->result_array();
	}
	
	public function getall_facture($trackingcode=false) { 
		$newfacturedata = array();
		if($trackingcode) {
			$facturedata = $this->db->select('*')->from('facture')->where('t_trackingcode',$trackingcode)->order_by('t_id','desc')->get()->result_array();
		} else {
			$facturedata = $this->db->select('*')->from('facture')->order_by('t_id','desc')->get()->result_array();
		}
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();
			}
			return $newfacturedata;
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
	public function get_facturedetails($t_id) { 
		return $this->db->select('*')->from('facture')->where('t_id',$t_id)->get()->result_array();
	}
	public function update_facture($data) { 
		$this->db->where('t_id',$this->input->post('t_id'));
		$this->db->update('facture',$data);
		return $this->input->post('t_id');
	}
	public function facture_reports($from,$to,$v_id) { 
		$newfacturedata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}
		
		$facturedata = $this->db->select('*')->from('facture')->where($where)->order_by('t_id','desc')->get()->result_array();
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();
			}
			return $newfacturedata;
		} else 
		{
			return array();
		}
	}
} 