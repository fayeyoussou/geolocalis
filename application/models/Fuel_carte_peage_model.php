<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fuel_carte_peage_model extends CI_Model{
	
	public function add_fuel_carte_peage($data) {
		$fuel_carte_peageins = $data;
/*		if(isset($data['t_pwd'])) {
			$fuel_carte_peageins['t_pwd'] = md5($data['t_pwd']); 
		}*/
		return	$this->db->insert('fuel_carte_peage',$fuel_carte_peageins);
	} 
    public function getall_fuel_carte_peage() { 
		//return $this->db->select('*')->from('fuel_carte_peage')->order_by('cp_id','desc')->get()->result_array();
		
		$requete="";
		$requete="cpc_id=cp_compagnie_id AND v_id=cp_v_id ";
		return $this->db->select('*')->from('fuel_carte_peage,fuel_carte_peage_compagnie,vehicles')->where($requete)->order_by('cp_id','desc')->get()->result_array();		
	} 
	public function get_fuel_carte_peagedetails($cp_id) { 
		return $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$cp_id)->get()->result_array();
	} 
	public function update_fuel_carte_peage() { 
		$this->db->where('cp_id',$this->input->post('cp_id'));
		return $this->db->update('fuel_carte_peage',$this->input->post());
	}
	
	    public function getall_fuel_carte_peage_compagnielist() { 
		return $this->db->select('*')->from('fuel_carte_peage_compagnie')->order_by('cpc_name','desc')->get()->result_array();
	}	
	
	
    public function getall_fuel_carte_peage_compagnie() { 
		$requete="";
		$requete="cpc_id=cp_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_peage, Table: fuel_carte_peage_compagnie')->where($requete)->order_by('cp_id','desc')->get()->result_array();
		

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
//			$where .= " AND cp_id=t_compagnie AND co_type_conteneur='$pied'";	
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
		//echo $where.= " AND trip_pregate.pr_trip_id=trips.t_id AND compagnie.cp_id=trips.t_compagnie";//exit;
		
		$where.= " AND 
pr_trip_id=t_id AND cp_id=t_compagnie AND co_trip_id=pr_trip_id";//exit;
		
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