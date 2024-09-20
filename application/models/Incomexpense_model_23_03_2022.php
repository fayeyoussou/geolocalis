<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incomexpense_model extends CI_Model{
	
//	public function add_incomexpense($data) { 
	public function add_incomexpense($data) { 
		return	$this->db->insert('incomeexpense', $data);
	} 
	
/*    function create($data){
        if($this->db->insert('meetings', $data))
            return $this->db->insert_id();
        else
            return false; 
    }	
	*/
	public function getall_facture() { 
		return $this->db->select('*')->from('trips')->get()->result_array();
	} 
	
	public function getall_facture_validee() { //Lister toutes les factures validées
		$t_validation='valide';
		return $this->db->select('*')->from('trips')->where('t_validation',$t_validation)->get()->result_array();
	}	
	
	
/**/     public function get_numero_reglement_facture() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('incomeexpense_compteur_reglement_facture');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}	


/**/     public function get_numero_compteur_banque() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('incomeexpense_compteur_banque');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}	
	
	
    public function getall_incomexpense() { 
		$incomexpense = $this->db->select('*')->from('incomeexpense')->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 
	
	
    public function get_incomexpense_reglementfacture() { 
		$reglement='Reglement';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;
				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();		
				
			
			}
			return $newincomexpense;
		} else 
		{
			return false;
		}
	} 	

 	public function get_paymentdetails($t_id) { 
		return $this->db->select('*')->from('trip_payments')->where('tp_trip_id',$t_id)->get()->result_array();
	}	

 	public function get_banquedetails($ieb_id) { 
		return $this->db->select('*')->from('incomeexpense_banque')->where('ieb_id',$ieb_id)->get()->result_array();
	}	
	
	
	public function get_incomexpensedetails($ie_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$ie_id)->get()->result_array();
	}	
	
	public function editincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}
	
	public function editbanqueincomexpense($e_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	}	
	
	public function updateincomexpense() { 
		$this->db->where('ie_id',$this->input->post('ie_id'));
		return $this->db->update('incomeexpense',$this->input->post());
	}
	public function getvechicle_incomexpense($v_id) { 
		return $this->db->select('*')->from('incomeexpense')->where('ie_v_id',$v_id)->order_by('ie_id','DESC')->get()->result_array();
	} 

/* DEBUT JOURNAL RELGEMENT*/
	public function journalreglement_facture_reports($from,$to,$facture,$numero,$emettrice,$receptrice) { 
//	public function incomexpense_reports($from,$to,$facture,$emettrice,$receptrice) { 
		$newincomexpense = array();
$afrom='';
$ato='';
$anumero='';
$aemettrice='';
$areceptrice='';

//$this->db->where_in('id', [1,2,3]);		
		
/*$where = "name='Jaydeep' AND title='Gondaliya' OR isactive='active'";
$this->db->where($where);		
$where = "'community_id'=".$data['id']." AND user_id=".$this->session-user_id." AND status='invited_to_join'";

		$reglement='Reglement';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();*/
		$reglement='Reglement';
	$where = "ie_type_mouvement='$reglement'";
		
		
		
		if($from!=''){
		$afrom=$from;
//		$where=array('ie_date'=>$from);
			$fromif=1;
		}

		if($to!=''){
		$ato=$to;
//		$where=array('ie_date'=>$from,'ie_date'=>$to);
			$toif=1;
		}		
		$dateif=0;

		if(($from!='') || ($to!='')){
	$where .= "AND ie_date>='$from' || ie_date<='$to'";
		$dateif=1;
	}	
		
/*		if($facture!=''){
		$afacture=array('ie_date>='=>$facture);
//			$fromif=1;
		}*/
		$numeroif=0;
		if($numero!=''){
		$anumero=$numero;
			//if($dateif==1){
			$where .= " AND ie_numero_enregistrement='$numero'";
/*			}else{
			$where = "ie_numero_enregistrement='$numero'";
				}
			$numeroif=1;*/
		}
		$emettriceif=0;
		if($emettrice!=''){
		$aemettrice=$emettrice;
		
			if(($dateif==1) ||($numeroif==1)) {
			$where .= " AND ie_banque_emettrice_id='$emettrice'";
			}else{
			$where = "ie_banque_emettrice_id='$emettrice'";
				}						   
						   $emettriceif=1;
		}
		
		if($receptrice!=''){
		$areceptrice=$receptrice;
			
			if(($dateif==1) ||($numeroif==1) || ($emettriceif==1) ) {
			$where .= " AND ie_banque_receptrice_id='$receptrice'";
			}else{
			$where = "ie_banque_receptrice_id='$receptrice'";
				}			
			
			$receptriceif=1;
		}		

//					$where = array('ie_date>='=>$from,'ie_date<='=>$to);

//$where = "ie_date>='$from' AND ie_date<='$to'";

//$where = "ie_date>='$from' OR ie_date<='$to' OR ie_numero_enregistrement='$numero' OR ie_banque_emettrice_id='$emettrice' OR ie_banque_receptrice_id='$receptrice'";
		
		
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();//exit;
		
		
//$where = array('ie_date>='=>$from,'ie_date<='=>$to);		
/*    $incomexpense = $this->db->select ('*'); 
    $this->db->from ('incomeexpense');
	$this->db->where($where);
	 $this->db->order_by('ie_id','desc')->get()->result_array();	*/	
		
/*$where = array('ie_date>='=>$from,'ie_date<='=>$to);		
    $incomexpense = $this->db->select ( '*' ); 
    $this->db->from ( 'incomeexpense' );
	$this->db->where($where);
	$this->db->order_by('ie_id','desc')->get()->result_array();	*/
/*    $this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
    $this->db->join ( 'Soundtrack', 'Soundtrack.album_id = Album.album_id' , 'left' );
    $query = $this->db->get ();	*/	//$where = "ie_date>='$from' AND ie_date<='$to' AND ie_numero_enregistrement='$numero' AND ie_banque_emettrice_id='$emettrice' AND ie_banque_receptrice_id='$receptrice'";
		
/*		if($facture=='all') {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to);
		} else {
			$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_ieb_id'=>$facture);
		}*/
		
//$where = array_merge($afrom,$ato,$anumero,$aemettrice,$areceptrice);
//$where = $afrom + $ato + $anumero + $aemettrice + $areceptrice;
	
/*    $this->db->join ( 'Category', 'Category.cat_id = Album.cat_id' , 'left' );
    $this->db->join ( 'Soundtrack', 'Soundtrack.album_id = Album.album_id' , 'left' );
    $query = $this->db->get ();	*/	
		
		if(!empty($incomexpense)) {
			foreach ($incomexpense as $key => $incomexpenses) {
				$newincomexpense[$key] = $incomexpenses;

				$newincomexpense[$key]['facture'] =  $this->db->select('t_num_facture,t_customer_id')->from('trips')->where('t_id',$incomexpenses['ie_trip_id'])->get()->row();

				$newincomexpense[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_emettrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newincomexpense[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$incomexpenses['ie_banque_receptrice_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
/* FIN JOURNAL REGLEMENT*/	
	
	
	public function incomexpense_reports($from,$to,$facture) { 
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
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}

	
    	public function get_paiementdetails($t_id) { 
		//$conteneur =  $this->db->select('*')->from('trip_payments')->get()->result_array();
  		$conteneur =  $this->db->select('*')->from('trips,trip_payments')->where('tp_ie_id',$t_id)->get()->result_array();
//		$conteneur =  $this->db->select('*')->from('trip_payments')->where('tp_ie_id',$t_id)->get()->result_array();
		if(!empty($conteneur)) {
			//exit;
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;                
                
				$newconteneur[$key]['banque_emettrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$conteneurs['tp_ie_id'])->get()->row();// pour afficher les noms des banques receptrices
				
				
				$newconteneur[$key]['banque_receptrice'] =  $this->db->select('ieb_name')->from('incomeexpense_banque')->where('ieb_id',$conteneurs['tp_ie_id'])->get()->row();// pour afficher les noms des banques receptrices				
 
			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/   	

	
//    	public function get_conteneurdetails($t_id) { 
//    	public function get_trip_paymentsdetails($t_id) { 
    	public function get_conteneurdetails($t_id) { 
		$conteneur =  $this->db->select('*')->from('incomeexpense')->get()->result_array();
//		$conteneur =  $this->db->select('*')->from('trip_payments')->where('tp_trip_id',$t_id)->get()->result_array();
 		if(!empty($conteneur)) {
			foreach ($conteneur as $key => $conteneurs) {
/*				$newconteneur[$key] = $conteneurs;                
				$newconteneur[$key]['nature_name'] =  $this->db->select('*')->from('trip_nature')->where('na_id',$conteneurs['co_nature'])->get()->row();
                
//				$newconteneur[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['co_trip_id'])->get()->row();                
				$newconteneur[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['tp_ie_id'])->get()->row();                
                
				$newconteneur[$key]['zone_name'] =  $this->db->select('*')->from('zone')->where('z_id',$conteneurs['co_zone'])->get()->row();                

				$newconteneur[$key]['v_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$conteneurs['co_zone'])->get()->row();                
 
				$newconteneur[$key]['cc_name'] =  $this->db->select('*')->from('compagnie')->where('cc_id',$conteneurs['co_zone'])->get()->row();                  
       */         

			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/	
	
/* DEBUT BANQUE*/
	public function incomexpense_banque_reports($from,$to,$facture) { 
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
				
				
/**/			$newincomexpense[$key]['customer'] =  $this->db->select('c_name')->from('customers')->where('c_id',$incomexpenses['ie_beneficiaire'])->get()->row();					
				
			}
			return $newincomexpense;
		} else 
		{
			return array();
		}
	}	
	
    public function get_incomexpense_banque() { 
		$reglement='Reglement';
		$incomexpense = $this->db->select('*')->from('incomeexpense')->where('ie_type_mouvement',$reglement)->order_by('ie_id','desc')->get()->result_array();
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
			return false;
		}
	} 	
	
/*FIN BANQUE*/	
	

} 