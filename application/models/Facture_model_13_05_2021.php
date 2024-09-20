<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class facture_model extends CI_Model{
	public function add_facture($data) {   
		unset($data['bookingemail']);
		$insertdata = $data;
		$insertdata['t_trackingcode'] = uniqid();
	//	$this->db->insert('facture',$insertdata);
		$this->db->insert('trips',$insertdata);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	} 
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_name','asc')->get()->result_array();
	} 
	public function getall_vechicle() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	} 
    
	public function getall_vehicle_remorque() { 
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	}     
    
	public function getall_mybookings($c_id) { 
		return $this->db->select('*')->from('trips')->where('t_customer_id',$c_id)->order_by('t_id','asc')->get()->result_array();
	}
	public function getall_driverlist() { 
		return $this->db->select('*')->from('drivers')->get()->result_array();
	}
    
 /* debut zone*/   
	public function getall_zonelist() { 
		return $this->db->select('*')->from('zone')->get()->result_array();
	}    
 /* Fin zone*/   

  /* debut Carte carburant*/   
	public function getall_carte_carburantlist() { 
		return $this->db->select('*')->from('fuel_carte_carburant')->get()->result_array();
	}    
 /* Fin Carte carburant*/
    
    
  /* debut carte péage*/   
	public function getall_carte_peagelist() { 
		return $this->db->select('*')->from('fuel_carte_peage')->get()->result_array();
	}    
 /* Fin carte péage*/
    
  /* debut transitaire*/   
	public function getall_transitairelist() { 
		return $this->db->select('*')->from('transitaire')->get()->result_array();
	}    
 /* Fin transitaire*/    
  
    
  /* debut trip_type_reglement*/   
	public function getall_type_reglementlist() { 
		return $this->db->select('*')->from('trip_type_reglement')->get()->result_array();
	}    
 /* Fin trip_type_reglement*/ 
    
 /* debut trip_reglement*/   
	public function getall_reglementlist() { 
		return $this->db->select('*')->from('trip_reglement')->get()->result_array();
	}    
 /* Fin trip_reglement*/     
 
    
 /* debut compagnie*/   
	public function getall_compagnielist() { 
		return $this->db->select('*')->from('compagnie')->get()->result_array();
	}    
 /* Fin trip_reglement*/      
    
	public function getall_facture_expense($t_id) { 
		return $this->db->select('*')->from('facture_expense')->where('e_facture_id',$t_id)->get()->result_array();
	} 
	public function get_paymentdetails($t_id) { 
		return $this->db->select('*')->from('facture_payments')->where('tp_facture_id',$t_id)->get()->result_array();
	}

/* debut conteneur*/    
 	public function get_conteneurdetails($t_id) { 
		return $this->db->select('*')->from('trip_conteneur')->where('co_trip_id',$t_id)->get()->result_array();
	}   
    
/* fin conteneur*/    
	
	public function getall_facture($trackingcode=false) { 
		$newfacturedata = array();
		if($trackingcode) {
			$facturedata = $this->db->select('*')->from('trips')->where('t_trackingcode',$trackingcode)->order_by('t_id','desc')->get()->result_array();
		} else {
			$facturedata = $this->db->select('*')->from('trips')->order_by('t_id','desc')->get()->result_array();
		}
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();

/*debut ajout*/
				$newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                
                $newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_transitaire_details'] =   $this->db->select('*')->from('transitaire')->where('tra_id',$facturedataval['t_transitaire'])->get()->row();
 
				$newfacturedata[$key]['t_type_reglement_details'] =   $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$facturedataval['t_type_reglement'])->get()->row();                
                
				$newfacturedata[$key]['t_reglement_details'] =   $this->db->select('*')->from('trip_reglement')->where('tg_id',$facturedataval['t_reglement'])->get()->row();                  
  
				$newfacturedata[$key]['t_compagnie_details'] =   $this->db->select('*')->from('compagnie')->where('cc_id',$facturedataval['t_compagnie'])->get()->row();                 
                
				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
/* Fin ajout*/                
            
            
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
		return $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
	}
    
	public function get_facturemanagement($t_id) { 
		return $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
	}    
    
	public function update_facture($data) { 
		$this->db->where('t_id',$this->input->post('t_id'));
		$this->db->update('trips',$data);
		return $this->input->post('t_id');
	}
	public function facture_reports($from,$to,$v_id) { 
		$newfacturedata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}
		
		$facturedata = $this->db->select('*')->from('trips')->where($where)->order_by('t_id','desc')->get()->result_array();
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();

                $newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                $newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();
/* Debut ajout*/
				$newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_destinataire_details'] =   $this->db->select('*')->from('destinataire')->where('d_id',$facturedataval['t_destinataire'])->get()->row();

				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
                
/* Fin ajout*/
                
            }
			return $newfacturedata;
		} else 
		{
			return array();
		}
	}
    
/* DEBUT SUPP*/
    
	public function facture_delete($t_id) { 
		$groupinfo = $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('t_id', $t_id);
    		$this->db->delete('trips');
    		return true;
		}
	}    
/* FIN SUPP*/
    
} 