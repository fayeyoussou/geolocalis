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
		
		$where="";
		$validation="valide";

		//$where="t_id NOT IN (910,1,2,3,4,5)";
				$where=" t_validation = '".$validation."'  AND t_id NOT IN (SELECT pr_trip_id FROM trip_pregate )";
		
		return $this->db->select('*')->from('trips')->where($where)->get()->result_array();
	}    
  
	public function getall_facture_edit() { 
		
		
		return $this->db->select('*')->from('trips')->get()->result_array();
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

	/*BEGIN PREGATE INSTANCE LIST*/
public function getall_pregateinstance() { 
		//$pregate = $this->db->select('*')->from('trip_pregate')->order_by('pr_id','desc')->get()->result_array();
	    //SELECT * FROM trips WHERE t_id NOT IN ( SELECT pr_trip_id FROM trip_pregate )
		$where = "";
		//$where= "t_transitaire=tra_id AND cc_id=t_compagnie ";//exit;
		//t_transitaire=tra_id AND cc_id=t_compagnie 
		$where = "t_id NOT IN ( SELECT pr_trip_id FROM trip_pregate )";//exit;
		
		$pregate = "";

		  $pregate = $this->db->select('*')->from('trip_pregate,trips')->where($where)->order_by('t_id','desc')->group_by('t_id')->get()->result_array();		
		
		if(!empty($pregate)) {
			foreach ($pregate as $key => $pregates) {
				$newpregate[$key] = $pregates;
				$newpregate[$key]['compagnie'] =  $this->db->select('cc_name')->from('compagnie')->where('cc_id',$pregates['t_compagnie'])->get()->row();
				
				//$newpregate[$key]['facture'] =  $this->db->select('t_num_facture')->from('trips')->where('t_id',$pregates['t_id'])->get()->row();
				$newpregate[$key]['transitaire'] =   $this->db->select('tra_name')->from('transitaire')->where('tra_id',$pregates['t_transitaire'])->get()->row();				
//				$newpregate[$key]['t_num_facture'] =  $this->db->select('t_num_facture')->from('trips')->where('pr_id',$pregates['pr_trip'])->get()->row();
			}
			return $newpregate;
		} else 
		{
			return false;
		}
	} 
	
	/*END PREGATE INSTANCE LIST*/
	
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
	
/*BEGIN REPORT GESTION TRANSPORT*/	
		public function pregate_reports_transport($from,$to) { 
	//pregate_reports_transport($from,$to,$pr_statut,$type,$compagnie,$pied) { 		
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
/*END REPORT GESTION TRANSPORT*/	

/*BEGIN LIST DRIVER MANAGER*/	
	
   public function getall_pregate_transport_reports($from,$to) { 
	   
	    $where = "";
	   
		//$pregate = $this->db->select('*')->from('trip_pregate')->order_by('pr_id','desc')->get()->result_array();
$where= "trip_mission_eir_plein.ei_pregate_id=t_id
AND trip_mission_eir_vide.ei_pregate_id=t_id

AND trip_mission_eir_plein.ei_conteneur_id=co_id
AND trip_mission_eir_vide.ei_conteneur_id=co_id

AND t_compagnie=cc_id
AND clr_compagnie_id=cc_id

AND mi_trip_id=t_id
AND c_id=t_customer_id
AND tra_id=t_transitaire
AND z_id=co_zone
AND v_id=mi_vehicle_id
AND t_date_facture BETWEEN '$from' AND '$to'

";//exit;
		
/*AND trip_mission_eir_plein.ei_mission_id=mi_id
AND trip_mission_eir_vide.ei_mission_id=mi_id*/
	   $pregate = "";

		  $newpregate = $this->db->select('*')->from('trip_mission,trip_pregate, trips, trip_mission_eir_plein, trip_mission_eir_vide, trip_conteneur, 
compagnie, compagnie_lieu_restitution,customers,transitaire,zone,vehicles')->where($where)->order_by('co_id','desc')->group_by('co_id')->get()->result_array();	
	   return $newpregate;

	}
	
	
   public function getall_pregate_transport() { 
		//$pregate = $this->db->select('*')->from('trip_pregate')->order_by('pr_id','desc')->get()->result_array();
		$where = "";
		$where= "trip_mission_eir_plein.ei_pregate_id=t_id
AND trip_mission_eir_vide.ei_pregate_id=t_id

AND trip_mission_eir_plein.ei_conteneur_id=co_id
AND trip_mission_eir_vide.ei_conteneur_id=co_id

AND t_compagnie=cc_id
AND clr_compagnie_id=cc_id

AND mi_trip_id=t_id
AND c_id=t_customer_id
AND tra_id=t_transitaire
AND z_id=co_zone
AND v_id=mi_vehicle_id

";//exit;
		
/*AND trip_mission_eir_plein.ei_mission_id=mi_id
AND trip_mission_eir_vide.ei_mission_id=mi_id*/
	   $pregate = "";

		  $newpregate = $this->db->select('*')->from('trip_mission,trip_pregate, trips, trip_mission_eir_plein, trip_mission_eir_vide, trip_conteneur, 
compagnie, compagnie_lieu_restitution,customers,transitaire,zone,vehicles')->where($where)->order_by('co_id','desc')->group_by('co_id')->get()->result_array();	
	   return $newpregate;

	} 	
/*END*/	
	
	public function get_pregatedetails_pdf($pr_id) { 

		$where= "pr_trip_id=t_id AND pr_id='$pr_id'";
		return $this->db->select('*')->from('trip_pregate,trips')->where($where)->get()->result_array();
	}
	
		public function get_customerdetails($t_customer_id) { 
		return $this->db->select('*')->from('customers')->where('c_id',$t_customer_id)->get()->result_array();
	} 
	
	public function get_pregatedetails($pr_id) { 
		return $this->db->select('*')->from('trip_pregate')->where('pr_id',$pr_id)->get()->result_array();
	}

	
/*	public function get_missiondetails($pr_id) { 
		return $this->db->select('*')->from('trip_pregate')->where('pr_id',$pr_id)->get()->result_array();
	}*/	
	
	/* BEGIN SHOW FACTURE*/
	
	public function get_facture($pr_trip_id) { 
		$bookings = $this->db->select('*')->from('trips')->where('t_id',$pr_trip_id)->order_by('t_id','desc')->get()->result_array();
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
/*END SHOW FACTURE*/	
	
	
		/* BEGIN SHOW FACTURE*/
	
	public function get_eir_plein($pr_mission_id) { 

		 $where = "mi_id=ei_mission_id AND ei_mission_id=$pr_mission_id";
//'ie_date,ei_heure,ei_numero_transaction'
		$eir_plein = $this->db->select('*')->from('trip_mission_eir_plein,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();
//		$eir_plein = $this->db->select('*')->from('trip_mission_eir_plein,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();
		if(!empty($eir_plein)) {
			foreach ($eir_plein as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				//$newtripdata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				//$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
			}
			return $newtripdata;
		} else {
			return array();
		}

	} 	
	
	
		public function get_eir_vide($pr_mission_id) { 

		 $where = "mi_id=ei_mission_id AND ei_mission_id=$pr_mission_id";
//'ie_date,ei_heure,ei_numero_transaction'
		$eir_vide = $this->db->select('*')->from('trip_mission_eir_vide,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();
//		$eir_plein = $this->db->select('*')->from('trip_mission_eir_plein,trip_mission')->where($where)->order_by('ei_id','desc')->get()->result_array();
		if(!empty($eir_vide)) {
			foreach ($eir_vide as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				//$newtripdata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				//$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
			}
			return $newtripdata;
		} else {
			return array();
		}

	} 
/*END SHOW FACTURE*/
	
	
	/* BEGIN SHOW MISSION*/
	
	public function get_mission($pr_trip_id) { 
		$bookings = $this->db->select('*')->from('trips')->where('t_id',$pr_trip_id)->order_by('t_id','desc')->get()->result_array();
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
/*END SHOW MISSION*/	

/* BEGIN SHOW CONTAINER*/	
	
    	public function get_conteneur($pr_trip_id) { 
			$where = "co_trip_id=t_id AND t_id=$pr_trip_id";
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
	

 /*BEGIN STATUT*/
	
	public function get_pregatestatut() { 
		return $this->db->select('*')->from('pregate_statut')->get()->result_array();
	}

	
	public function pregatestatut_delete($pr_id) { 
		$groupinfo = $this->db->select('*')->from('trip_pregate')->where('pr_statut_id',$pr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('st_id', $pr_id);
    		$this->db->delete('pregate_statut');
    		return true;
		}
	} 
/*END STATUT*/	
	
} 