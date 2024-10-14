<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pregate_model extends CI_Model{
	
	public function add_pregate($data) { 
		return	$this->db->insert('trip_pregate',$data);
	}
    
/*	public function getall_facturelist() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	} */
    
	public function getall_facture() { 
		 $id_facture = $this->db->select('pr_trip_id')->from('trip_pregate')->order_by('pr_id','desc')->get()->result_array();
		
/*				if(!empty($id_facture)) {
			foreach ($id_facture as $key => $facture) {
				print $tabfacture[$key] = $facture;

			}
			//return $newpregate;
		}*/
		
		$where="";
		$where="t_id NOT IN (910,1,2,3,4,5)";
		return $this->db->select('*')->from('trips')->where($where)->get()->result_array();
	}    
  
	/**/ public function getall_conteneur() { 
		return $this->db->select('*')->from('trip_conteneur')->get()->result_array();
	}    
    
    public function getall_pregate() { 
		//$pregate = $this->db->select('*')->from('trip_pregate')->order_by('pr_id','desc')->get()->result_array();
		$where = "";
		$where= "pr_trip_id=t_id AND cc_id=t_compagnie AND co_trip_id=pr_trip_id";//exit;
		
		$pregate = "";

		  $pregate = $this->db->select('*')->from('trip_pregate,trips,compagnie,trip_conteneur')->where($where)->order_by('pr_id','desc')->group_by('pr_id')->get()->result_array();		
		
		if(!empty($pregate)) {
			foreach ($pregate as $key => $pregates) {
				$newpregate[$key] = $pregates;
				$newpregate[$key]['pr_conteneur'] =  $this->db->select('pr_conteneur')->from('trip_pregate')->where('pr_id',$pregates['pr_trip_id'])->get()->row();
				
				$newpregate[$key]['facture'] =  $this->db->select('t_num_facture')->from('trips')->where('t_id',$pregates['pr_trip_id'])->get()->row();
				
//				$newpregate[$key]['t_num_facture'] =  $this->db->select('t_num_facture')->from('trips')->where('pr_id',$pregates['pr_trip'])->get()->row();
			}
			return $newpregate;
		} else 
		{
			return false;
		}
	} 
	
	
	public function editpregate($e_id) { 
		return $this->db->select('*')->from('trip_pregate')->where('pr_id',$e_id)->get()->result_array();
	}
	public function updatepregate() { 
		$this->db->where('pr_id',$this->input->post('pr_id'));
		return $this->db->update('trip_pregate',$this->input->post());
	}
	public function getvechicle_pregate($pr_id) { 
		return $this->db->select('*')->from('trip_pregate')->where('ie_pr_id',$pr_id)->order_by('pr_id','DESC')->get()->result_array();
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
	
	
    	public function get_pregatedetails($pr_id) { 
			
/*		$where = "";
		$where= "pr_trip_id=t_id AND cc_id=t_compagnie AND co_trip_id=pr_trip_id";//exit;
		
		$pregate = "";

		  $pregate = $this->db->select('*')->from('trip_pregate,trips,compagnie,trip_conteneur')->where($where)->order_by('pr_id','desc')->group_by('pr_id')->get()->result_array();*/				
			
//		$pregate =  $this->db->select('*')->from('trip_pregate')->where('co_trip_id',$pr_id)->get()->result_array();

			
			$pregate =  $this->db->select('*')->from('trip_pregate')->where('pr_id',$pr_id)->get()->result_array();
 		if(!empty($pregate)) {
			foreach ($pregate as $key => $pregates) {
				$newpregate[$key] = $pregates;                
				//$newpregate[$key]['nature_name'] =  $this->db->select('*')->from('trip_nature')->where('na_id',$pregates['co_nature'])->get()->row();
                
				$newpregate[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$pregates['pr_trip_id'])->get()->row();                
                
				//$newpregate[$key]['zone_name'] =  $this->db->select('*')->from('zone')->where('z_id',$pregates['co_zone'])->get()->row();                

				//$newpregate[$key]['v_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$pregates['co_zone'])->get()->row();                
 
				//$newpregate[$key]['cc_name'] =  $this->db->select('*')->from('compagnie')->where('cc_id',$pregates['co_zone'])->get()->row();                  
                

			}
			return $newpregate;
		} else 
		{
			return false;
		}       
	}  
    
/* fin pregate*/	
	
/*	public function incomexpense_reports($from,$to,$facture) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
		
		if($facture=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_ieb_id'=>$facture);
		}
		
		
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}*/
	
} 