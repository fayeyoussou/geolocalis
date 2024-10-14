<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuel_carte_carburant_model extends CI_Model{
	
	public function add_fuel_carte_carburant($data) {
		$fuel_carte_carburantins = $data;
/*		if(isset($data['t_pwd'])) {
			$fuel_carte_carburantins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('fuel_carte_carburant',$fuel_carte_carburantins);
	} 
    public function getall_fuel_carte_carburant() { 
		//return $this->db->select('*')->from('fuel_carte_carburant')->order_by('cc_id','desc')->get()->result_array();
		
		$requete="";
		$requete="ccc_id=cc_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_carburant,fuel_carte_carburant_compagnie')->where($requete)->order_by('cc_id','desc')->get()->result_array();		
	} 
	
	
	
	public function get_fuel_carte_carburantdetails($cc_id) { 
		return $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$cc_id)->get()->result_array();
	} 

/*BEGIN DETAIL*/	
	
	public function get_cartedetails($cc_id) { 
		return $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$cc_id)->get()->result_array();
	} 

    public function getall_fuel_carte_carburant_recharge($cc_id) { 
		

		$requete="";
		$requete="fuel_carte_carburant_recharge.ccr_carte_id=fuel_carte_carburant.cc_id
AND incomeexpense.ie_id=fuel_carte_carburant_recharge.ccr_incomeexpense_id AND fuel_carte_carburant.cc_id=$cc_id";
		return $this->db->select('*')->from('fuel_carte_carburant_recharge,fuel_carte_carburant,incomeexpense')->where($requete)->order_by('cc_id','desc')->get()->result_array();		
		

	} 	
	
	public function get_rechargedetails($cc_id) { 
		return $this->db->select('*')->from('fuel_carte_carburant_recharge')->where('ccr_carte_id',$cc_id)->get()->result_array();
	
	}
	
	 	public function get_boncarburantdetails($cc_id) { 
		return $this->db->select('*')->from('fuel_bon_carburant')->where('bc_carte_id',$cc_id)->get()->result_array();
	
	}	
	
			public function getall_fuel_incomeexpense() { 
				
		$requete="";
		$compte=174;
		/*$carte="";
		$carte=$cc_id;*/
		$requete="ie_id NOT IN (SELECT ccr_incomeexpense_id FROM fuel_carte_carburant_recharge) AND ie_compte_id='$compte'";
		return $this->db->select('*')->from('incomeexpense,fuel_carte_carburant_recharge')->where($requete)->order_by('ie_id','desc')->get()->result_array();
		
		}	

	
		public function getall_vechicle() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	} 
	
    public function getall_fuel_bon_carburant($cc_id) { 
		

		$requete="";
		$requete="cc_id=bc_carte_id AND bc_vehicule_id=v_id AND bc_carte_id=$cc_id";
/*		return $this->db->select('*')->from('fuel_carte_carburant_recharge,fuel_carte_carburant,incomeexpense')->where($requete)->order_by('cc_id','desc')->get()->result_array();	*/	
		
		
		return $this->db->select('*')->from('fuel_bon_carburant,vehicles,fuel_carte_carburant')->order_by('bc_id','desc')->group_by('bc_id')->get()->result_array();	
	} 	

	
/*    public function getall_fuel_carte_carburant_compagnie($cc_id) { 
		$requete="";
		$requete="ccc_id=cc_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_carburant, fuel_carte_carburant_compagnie')->where($requete)->order_by('cc_id','desc')->get()->result_array();

	}	*/
/*END DETAIL*/	
	
	public function update_fuel_carte_carburant() { 
		$this->db->where('cc_id',$this->input->post('cc_id'));
		return $this->db->update('fuel_carte_carburant',$this->input->post());
	}
	
	    public function getall_fuel_carte_carburant_compagnielist() { 
		return $this->db->select('*')->from('fuel_carte_carburant_compagnie')->order_by('ccc_name','desc')->get()->result_array();
	}	
	
	
    public function getall_fuel_carte_carburant_compagnie() { 
		$requete="";
		$requete="ccc_id=cc_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_carburant, fuel_carte_carburant_compagnie')->where($requete)->order_by('cc_id','desc')->get()->result_array();

	}

	public function pregate_reports($from,$to,$pr_statut,$type,$compagnie,$pied) { 
	//pregate_reports($from_reception,$to_reception,$pr_statut,$from_line,$to_line) { 	
		$newpregate = array();
		$where="";		
		
/**/		if($pr_statut=='all') {
				if($type=='reception') {
					//	$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to);//exit;
			$where = " pr_date_reception BETWEEN '$from' AND '$to'";//exit;

				}else
				{
					//	$where = array('pr_date_line>='=>$from,'pr_date_line<='=>$to);//exit;
			$where = " pr_date_line BETWEEN '$from' AND '$to'";//exit;

				}
		} else {
	
	
				if($type=='reception') {
						//$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to);//exit;
		//	$where = " pr_date_reception BETWEEN '$from_reception' AND '$to_reception' AND ";
/*			$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to,'pr_statut'=>$pr_statut);*/
				$where = " pr_date_reception BETWEEN '$from' AND '$to' AND pr_statut='$pr_statut'";//exit;

				}else
				{
					//	$where = array('pr_date_line>='=>$from,'pr_date_line<='=>$to);//exit;

			//$where = array('pr_date_line>='=>$from,'pr_date_line<='=>$to,'pr_statut'=>$pr_statut);
				$where = " pr_date_line BETWEEN '$from' AND '$to' AND pr_statut='$pr_statut'";//exit;
					
				}	
	
	//		$where = array('pr_date_reception>='=>$from,'pr_date_reception<='=>$to,'pr_statut'=>$pr_statut);
		}		
		
				if($compagnie!='') {
			$where .= " AND t_compagnie='$compagnie'";	
					//pr_trip_id
		}
		
				if($pied!='') {
			$where .= " AND co_type_conteneur='$pied'";	
//			$where .= " AND cc_id=t_compagnie AND co_type_conteneur='$pied'";	
					//pr_trip_id
		}		
		
/*BEGIN QUERY*/		
/*	
	
*//*		if(($facture!='')){
			
			$where .= " AND ie_id=tp_ie_id AND tp_trip_id='$facture'";
			$incomexpense = $this->db->select('*')->from('incomeexpense,trip_payments')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
			
		}else
		{ //exit;
			$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
			
		}*/		
/*END QUERY*/		
		
		
		

		//echo $where;//exit;
		//echo $where.= " AND trip_pregate.pr_trip_id=trips.t_id AND compagnie.cc_id=trips.t_compagnie";//exit;
		
		$where.= " AND 
pr_trip_id=t_id AND cc_id=t_compagnie AND co_trip_id=pr_trip_id";//exit;
		
		$pregate = "";

		  $pregate = $this->db->select('*')->from('trip_pregate,trips,compagnie,trip_conteneur')->where($where)->order_by('pr_id','desc')->group_by('pr_id')->get()->result_array();//exit;
		if(!empty($pregate)) {
			foreach ($pregate as $key => $pregates) {
				$newpregate[$key] = $pregates;
				$newpregate[$key]['pr_statut'] =  $this->db->select('*')->from('trip_pregate')->where('pr_id',$pregates['pr_id'])->get()->row();
			}
			return $newpregate;
		} else 
		{
			return array();
		}
	}
	
	
} 